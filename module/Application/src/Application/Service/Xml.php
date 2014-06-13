<?php

	namespace Application\Service;
	
	set_time_limit( 0 );
	ini_set( 'memory_limit', '-1' );
	
	use Application\Entity\Travel;
	use Application\Entity\City;
	use Application\Entity\Region;
	use Application\Entity\Accommodation;
	use Application\Entity\Country;
	use Application\Entity\Youtube;
	use Application\Entity\TravelCoordinates;
				
	class Xml
	{
		const ACTIVE 				= 'active';
		const GROUP_ELEMENT_NAME 	= 'item';
		
		private $oAccommodation;
		private $oCity;
		private $oRegion;
		private $oTravel;
		private $oTravelCoordinates;
		private $oYoutube;

		private $objectManager;
		
		private $aExcludedProperties = array
		(
			'daisycon_unique_id',
			'unique_integer',
			'update_hash',
			'img_small',
			'transportation_type',
			'board_type',
			'img_large',
			'internal_id',
			'departure_date',
			'usp',
			'city_link',
			'country_link',
			'region_link',
			'item',
			'duration',
			'trip_length',
			'stars',
			'priority',
			'category',
			'coordinate_longitude',
			'coordinate_latitude',
			'continent',
			'airline',
			'zoover_rating',
			'continent_of_destination',
			'continent_of_origin',
			'port_of_arrival',
			'address',
			'zipcode',
			'offer_valid_from_date',
			'keywords',
			'offer_valid_to_date'
		);
		
		private $aXmlFiles = array
		(
// 			'http://xml.ds1.nl/update/?wi=120583&xid=219&si=170&type=xml&encoding=UTF-8&general=false',
// 			'http://xml.ds1.nl/update/?wi=81403&xid=2733&si=1257&type=xml&encoding=UTF-8&general=false',
// 			'http://xml.ds1.nl/update/?wi=81403&xid=1824&si=1112&type=xml&encoding=UTF-8&general=false'
			'http://xml.ds1.nl/update/?wi=81403&xid=5662&si=6813&type=xml&encoding=ISO-8859-15&general=false'
		);
		
		public function __call( $sFunctionName, $aValue )
		{
			if( !in_array( $sFunctionName, $this->aExcludedProperties ) )
			{
				$sFunction = 'set' . ucfirst( $sFunctionName );

				$aValues = array();
				if( false !== strpos( $sFunctionName, '_' ) )
				{
					$aExploded = explode( '_', $sFunctionName );
					foreach( $aExploded as $sValue )
					{
						$aValues[$sValue] = ucfirst( $sValue );
					}
					$sFunction = 'set' . implode( '', $aValues );
				}
				if( method_exists( $this, $sFunction ) )
				{
					$this->$sFunction( $aValue[0] );
				}
				else
				{
					echo 'method <strong>' . $sFunctionName . '</strong> does not exists';die;
				}
			}
		}
		
		public function __construct()
		{
			$this->init();
		}
		
		public function handleXml()
		{
			$oXmlReader = new \XMLReader();

			foreach( $this->aXmlFiles as $sFilename )
			{
				$oXmlReader->open( $sFilename );
			
				$aRow = array( 'status' => 'active' );
				while( $oXmlReader->read() )
				{
					if( $oXmlReader->nodeType == \XMLReader::ELEMENT && $oXmlReader->name == self::GROUP_ELEMENT_NAME )
					{
						while( $oXmlReader->read() )
						{
							if( $oXmlReader->nodeType === \XMLReader::ELEMENT )
							{
								$o = $oXmlReader->expand();
								if( !empty( $o->nodeValue ) && strtolower( $o->nodeName ) != 'item' )
								{
									$sNodeName = strtolower( $o->nodeName );
									$aRow[$sNodeName] = $o->nodeValue;
								}
							}
							if( $oXmlReader->nodeType == \XMLReader::END_ELEMENT && $oXmlReader->name == self::GROUP_ELEMENT_NAME )
							{
								foreach( $aRow as $sKey => $sValue )
								{
									$this->$sKey( $sValue );
									unset( $aRow[$sKey] );
								}
								if( empty( $aRow ) )
								{
									$this->handleEntities();
								}
							}
						}
					}
				}
			}
		}

		private function init()
		{
			$this->oAccommodation 		= new Accommodation();
			$this->oCity 				= new City();
			$this->oCountry 			= new Country();
			$this->oRegion 				= new Region();
			$this->oTravel 				= new Travel();
			$this->oYoutube 			= new Youtube();
			$this->oTravelCoordinates	= new TravelCoordinates();
		}
		
		public function setObjectManager( $oObjectManager )
		{
			$this->oObjectManager = $oObjectManager;
		}
		
		public function setSeoUrl( $oSeoUrl )
		{
			$this->oSeoUrl = $oSeoUrl;
		}
		
		public function setLatitude( $sValue )
		{
			$this->oTravelCoordinates->setLatitude( $sValue );
		}
		
		public function setLongitude( $sValue )
		{
			$this->oTravelCoordinates->setLongitude( $sValue );
		}
		
		public function setTitle( $sValue )
		{
			$this->oTravel->setName( $sValue );
			$this->oTravel->setSlug( $this->oSeoUrl->create( $sValue ) );
		}
		
		public function setLink( $sValue )
		{
			$this->oTravel->setLink( $sValue );
		}
		
		public function setDescription( $sValue )
		{
			$this->oTravel->setDescription( $sValue );
		}
		
		public function setImgMedium( $sValue )
		{
			$this->oTravel->setImgMedium( $sValue );
		}
		
		public function setCityOfDestination( $sValue )
		{
			if( null === ( $oCity = $this->oObjectManager->getRepository( '\Application\Entity\City' )->findOneBy( array( 'name' => $sValue ) ) ) )
			{
				$this->oCity->setName( $sValue );
			}
			$this->oTravel->setCity( null !== $oCity ? $oCity : $this->oCity );
		}

		public function setRegionOfDestination( $sValue )
		{
			if( null === ( $oRegion = $this->oObjectManager->getRepository( '\Application\Entity\Region' )->findOneBy( array( 'name' => $sValue ) ) ) )
			{
				$this->oRegion->setName( $sValue );
			}
			$this->oTravel->setRegion( null !== $oRegion ? $oRegion : $this->oRegion );
		}
		
		public function setAccommodationName( $sValue )
		{
			if( null === ( $oAccommodation = $this->oObjectManager->getRepository( '\Application\Entity\Accommodation' )->findOneBy( array( 'name' => $sValue ) ) ) )
			{
				$this->oAccommodation->setName( $sValue );
			}
			$this->oTravel->addAccommodation( null !== $oAccommodation ? $oAccommodation : $this->oAccommodation );
		}
		
		public function setAccommodationType( $sValue )
		{
			if( $this->oAccommodation instanceof \Application\Entity\Accommodation )
			{
				$this->oAccommodation->setType( $sValue );
			}
		}
		
		public function setCountryOfOrigin( $sValue )
		{
			$this->setCountryOfDestination( $sValue );
		}

		public function setCountryOfDestination( $sValue )
		{
			if( null === ( $oCountry = $this->oObjectManager->getRepository( '\Application\Entity\Country' )->findOneBy( array( 'name' => $sValue ) ) ) )
			{
				$this->oCountry->setAbbreviation( $sValue );
				$this->oCountry->setName( $sValue );
			}
			$this->oTravel->setCountry( null !== $oCountry ? $oCountry : $this->oCountry );
		}

		public function setMinimumPrice( $sValue )
		{
			$this->oTravel->setPrice( $sValue );
		}
		
		public function setMaxNrPeople( $sValue )
		{
			$this->setMinNrPeople( $sValue );
		}

		public function setMinNrPeople( $sValue )
		{
			$this->oTravel->setNrOfGuests( $sValue );
		}

		public function setStatus( $sValue )
		{
			$this->oTravel->setStatus( $sValue );
		}
		
		public function setYoutubeVideoKey( $sValue )
		{
			if( null === ( $oYoutube = $this->oObjectManager->getRepository( '\Application\Entity\Youtube' )->findOneBy( array( 'video' => $sValue ) ) ) )
			{
				$this->oYoutube->setVideo( $sValue );
			}
			$this->oTravel->addYoutube( null !== $oYoutube ? $oYoutube : $this->oYoutube );
		}

		public function handleEntities()
		{
			$this->oObjectManager->persist( $this->oTravel );
			$this->oObjectManager->flush();
			
			if( !empty( $this->oTravelCoordinates->getLatitude() ) && !empty( $this->oTravelCoordinates->getLongitude() ) )
			{
				$this->oTravelCoordinates->setTravel( $this->oTravel );
				$this->oObjectManager->persist( $this->oTravelCoordinates );
				$this->oObjectManager->flush();
			}
			$this->oObjectManager->clear();
		}
	}