<?php

namespace Administration\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class FeedController extends AbstractActionController {
	public function indexAction() {
		return new ViewModel ();
	}
}