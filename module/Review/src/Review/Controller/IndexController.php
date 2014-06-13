<?php

	namespace Review\Controller;
	
	use Zend\Mvc\Controller\AbstractActionController;
	use Review\Form\Model\ReviewModel;
	use Review\Form\ReviewForm;
	use Application\Entity\Review;
	
	class IndexController extends AbstractActionController
	{
		public function indexAction()
		{
			$oObjectManager = $this->getServiceLocator()->get( 'Doctrine\ORM\EntityManager' );
			
			$oReview = $oObjectManager->find( '\Application\Entity\Review', $this->getEvent()->getRouteMatch()->getParam( 'id' ) );

			return array
			(
				'oReview' => $oReview
			);
		}

		public function addAction()
		{
			$oObjectManager = $this->getServiceLocator()->get( 'Doctrine\ORM\EntityManager' );

			$oReview = new Review();
			$oForm = new ReviewForm();
			$oRequest = $this->getRequest();

			if( $oRequest->isPost() )
			{
				$oReviewModel = new ReviewModel();
				$oForm->setInputFilter( $oReviewModel->getInputFilter() );
				$oForm->setData( $oRequest->getPost() );

				if( $oForm->isValid() )
				{
					$aFormData = $oForm->getData();

					$oReview->setAccountId( 1 );
					$oReview->setTitle( $aFormData['title'] );
					$oReview->setMessage( $aFormData['message'] );

					$oObjectManager->persist( $oReview );
					$oObjectManager->flush();
				}
			}

			return array
			(
				'oForm' => $oForm
			);
		}

		public function editAction()
		{

		}
	}