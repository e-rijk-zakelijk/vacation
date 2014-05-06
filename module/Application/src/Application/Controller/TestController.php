<?php

	namespace Application\Controller;

	use Zend\Mvc\Controller\AbstractActionController;
	use Application\Form\Search;

	class TestController extends AbstractActionController
	{
		public function testAction()
		{
			$oObjectManager = $this->getServiceLocator()->get ( 'Doctrine\ORM\EntityManager' );
			$oTravel = $oObjectManager->find( '\Application\Entity\Travel', $this->getEvent()->getRouteMatch()->getParam ( 'id' ) );

			$oForm = new Search();

			return array (
				'oTravel' 	=> $oTravel,
				'oForm' 	=> $oForm 
			);
		}
	}