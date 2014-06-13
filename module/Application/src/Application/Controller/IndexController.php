<?php

	namespace Application\Controller;

	use Zend\Mvc\Controller\AbstractActionController;
	use Application\Service\Xml;

	class IndexController extends AbstractActionController
	{
		public function indexAction()
		{
			$oObjectManager = $this->getServiceLocator()->get( 'Doctrine\ORM\EntityManager' );
			$oSeoUrl 		= $this->getServiceLocator()->get( 'SeoUrl\Slug' );
			
			$oXml = new Xml();
			$oXml->setObjectManager( $oObjectManager );
			$oXml->setSeoUrl( $oSeoUrl );
			$oXml->handleXml();
		}
	}