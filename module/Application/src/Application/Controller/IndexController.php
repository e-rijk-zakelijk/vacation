<?php

	namespace Application\Controller;

	use Zend\Mvc\Controller\AbstractActionController;
	use Zend\View\Model\ViewModel;
	use Application\Entity\Travel;
	use Application\Entity\Country;
	use Application\Entity\Youtube;
	use Application\Entity\RelTravelYoutube;

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

			$oTravel 			= new Travel();
			$oCountry 			= new Country();
			$oYoutube			= new Youtube();
			$oRelTravelYoutube	= new RelTravelYoutube();

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
				
									switch( strtolower( $o->nodeName ) )
									{
										case 'title':
											$oSeoUrl = $this->getServiceLocator()->get( 'SeoUrl\Slug' );
											
											$oTravel->setName( $o->nodeValue );
											$oTravel->setSlug( $oSeoUrl->create( $o->nodeValue ) );
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
										
										case 'minimum_price':
											$oTravel->setPrice( $o->nodeValue );
										break;
										
										case 'country_of_destination':
											$oObj = $oObjectManager->getRepository( '\Application\Entity\Country' )->findOneBy( array( 'abbreviation' => $o->nodeValue ) );
										
											if( null !== $oObj )
											{
												$oTravel->setCountry( $oObjectManager->find( '\Application\Entity\Country' , $oObj->getId() ) );
											}
											else
											{
												$oCountry->setAbbreviation( $o->nodeValue );
												$oObjectManager->persist( $oCountry );
												$oObjectManager->flush();
												
												$oTravel->setCountry( $oObjectManager->find( '\Application\Entity\Country', $oCountry->getId() ) );
											}
										break;

										case 'youtube_video_key':
											$oYoutube->setVideo( $o->nodeValue );
											$oObjectManager->persist( $oYoutube );
											$oObjectManager->flush();
										break;
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