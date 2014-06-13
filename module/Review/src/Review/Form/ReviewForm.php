<?php

	namespace Review\Form;
	
	use Zend\Form\Form;
	
	class ReviewForm extends Form
	{
		public function __construct()
		{
			parent::__construct( 'add' );
			
			$this->add( array(
				'name'	=> 'title',
				'attributes' => array(
					'type'	=> 'text'
				),
				'options'	=> array(
					'label'	=> 'Title'
				)
			) );

			$this->add( array(
				'name'	=> 'message',
				'attributes' => array(
					'type'	=> 'textarea'
				),
				'options'	=> array(
					'label'	=> 'Message'
				)
			) );
			
			$this->add( array(
				'name'	=> 'submit',
				'attributes' => array(
					'type'	=> 'submit',
					'value' => 'submit'
				),
			) );
		}
	}