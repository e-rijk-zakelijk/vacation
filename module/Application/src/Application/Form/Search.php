<?php

namespace Application\Form;

use Zend\Form\Form;
use Application\Entity\Country;

class Search extends Form {
	public function __construct() {
		parent::__construct ( 'search' );
		
		$this->setAttribute ( 'method', 'post' );
		
		$oCountry = new Country ();
		
		$this->add ( array (
				'type' => 'Zend\Form\Element\Select',
				'name' => 'countries',
				'attributes' => array (
						'id' => 'countries',
						'options' => array (
								'a' => 'a',
								'b' => 'b' 
						) 
				) 
		) );
	}
}