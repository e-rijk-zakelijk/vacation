<?php

	namespace Application\Controller;

	use Zend\Mvc\Controller\AbstractActionController;
	use Zend\View\Model\ViewModel;
	use Application\Entity\Travel;
	use Application\Entity\Country;
	use Application\Entity\Youtube;
	use Application\Entity\City;
	use Application\Entity\Region;
			
	set_time_limit( 0 );

	class IndexController extends AbstractActionController
	{
		const ACTIVE 				= 'active';
		const GROUP_ELEMENT_NAME 	= 'item';

		private $aXmlFiles = array(
			'http://xml.ds1.nl/update/?wi=120583&xid=219&si=170&type=xml&encoding=UTF-8&general=true',
			'http://xml.ds1.nl/update/?wi=81403&xid=2733&si=1257&type=xml&encoding=UTF-8&general=true'
		);

		public function indexAction()
		{
			$oObjectManager = $this->getServiceLocator()->get( 'Doctrine\ORM\EntityManager' );

			$oCity				= new City();
			$oCountry 			= new Country();
			$oRegion			= new Region();
			$oTravel 			= new Travel();
			$oYoutube			= new Youtube();

			$oXmlReader = new \XMLReader();

			foreach( $this->aXmlFiles as $sFilename )
			{
				$oXmlReader->open( $sFilename );
				
				while( $oXmlReader->read() )
				{
					if( $oXmlReader->nodeType == \XMLReader::ELEMENT )
					{
						if( $oXmlReader->name == self::GROUP_ELEMENT_NAME )
						{
							while( $oXmlReader->read() )
							{
								if( $oXmlReader->nodeType === \XMLReader::ELEMENT )
								{
									$o = $oXmlReader->expand();
				
									if( !empty( $o->nodeValue ) )
									{
										switch( strtolower( $o->nodeName ) )
										{
											case 'accommodation_type':
												
											break;
											case 'title':
												$oSeoUrl = $this->getServiceLocator()->get( 'SeoUrl\Slug' );
												
												$oTravel->setName( $o->nodeValue );
												$oTravel->setSlug( $oSeoUrl->create( $o->nodeValue ) );
											break;
											
											case 'city_of_destination':
												$oObj = $oObjectManager->getRepository( '\Application\Entity\City' )->findOneBy( array( 'name' => $o->nodeValue ) );
												if( null !== $oObj )
												{
													$oTravel->setCity( $oObj );
												}
												else
												{
													$oCity->setName( $o->nodeValue );
													$oObjectManager->persist( $oCity );
													$oObjectManager->flush();
												}
											break;
											
											case 'description':
												$oTravel->setDescription( $o->nodeValue );
											break;
											
											case 'img_medium':
												$oTravel->setImgMedium( $o->nodeValue );
											break;
											
											case 'link':
												$oTravel->setLink( $o->nodeValue );
											break;
											
											case 'min_nr_people':
												$oTravel->setNrOfGuests( $o->nodeValue );
											break;
											
											case 'minimum_price':
												$oTravel->setPrice( $o->nodeValue );
											break;
											
											case 'country_of_destination':
												$oObj = $oObjectManager->getRepository( '\Application\Entity\Country' )->findOneBy( array( 'abbreviation' => $o->nodeValue ) );
												if( null !== $oObj )
												{
													$oTravel->setCountry( $oObj );
												}
												else
												{
													$oCountry->setAbbreviation( $o->nodeValue );
													$oCountry->setName( $o->nodeValue );
													$oObjectManager->persist( $oCountry );
													$oObjectManager->flush();
													
													$oTravel->setCountry( $oObjectManager->find( '\Application\Entity\Country', $oCountry->getId() ) );
												}
											break;
											
											case 'region_of_destination':
												$oObj = $oObjectManager->getRepository( '\Application\Entity\Region' )->findOneBy( array( 'name' => $o->nodeValue ) );
												if( null !== $oObj )
												{
													$oTravel->setRegion( $oObj );
												}
												else
												{
													$oRegion->setName( $o->nodeValue );
													$oObjectManager->persist( $oRegion );
													$oObjectManager->flush();
														
													$oTravel->setRegion( $oRegion );
												}
											break;
	
											case 'youtube_video_key':
												$oObj = $oObjectManager->getRepository( '\Application\Entity\Youtube' )->findOneBy( array( 'video' => $o->nodeValue ) );
												if( null !== $oObj )
												{
													$oTravel->addYoutube( $oObj );												
												}
												else
												{
													$oYoutube->setVideo( $o->nodeValue );
													$oObjectManager->persist( $oYoutube );
													$oObjectManager->flush();
													
													$oTravel->addYoutube( $oYoutube );
												}
											break;
										}
									}
								}
								if( $oXmlReader->nodeType == \XMLReader::END_ELEMENT && $oXmlReader->name == self::GROUP_ELEMENT_NAME )
								{
									$oTravel->setStatus( self::ACTIVE );
					
									$oObjectManager->persist( $oTravel );
									$oObjectManager->flush();
									$oObjectManager->clear();
								}
							}
						}
					}
				}
			}
			return new ViewModel ();
		}
	}