<?php

	namespace Review\Form\Model;
	
	use Zend\InputFilter\Factory as InputFactory;
	use Zend\InputFilter\InputFilter;
	use Zend\InputFilter\InputFilterAwareInterface;
	use Zend\InputFilter\InputFilterInterface;

	class ReviewModel implements InputFilterAwareInterface
	{
	    public $title;
	    public $message;
	    protected $oInputFilter;
	
	    public function exchangeArray( $aData )
	    {
	        $this->title 	= isset( $aData['title'] ) 		? $aData['title'] 	: null;
	        $this->message 	= isset( $aData['message'] ) 	? $aData['message'] : null;
	    }

	    public function setInputFilter( InputFilterInterface $oInputFilter )
	    {
	        throw new \Exception( 'Not used' );
	    }
	
	    public function getInputFilter()
	    {
	        if( !$this->oInputFilter )
	        {
	            $oInputFilter = new InputFilter();
	            $oFactory     = new InputFactory();
	
	            $oInputFilter->add( $oFactory->createInput( array(
	                'name'     => 'title',
	                'required' => true,
	                'filters'  => array(
	                    array( 'name' => 'StripTags' ),
	                    array( 'name' => 'StringTrim' ),
	                ),
	                'validators' => array(
	                    array(
	                        'name'    => 'StringLength',
	                        'options' => array(
	                            'encoding' => 'UTF-8',
	                            'min'      => 2,
	                            'max'      => 255,
	                        ),
	                    ),
	                ),
	            ) ) );
	            
	            $oInputFilter->add( $oFactory->createInput( array(
					'name'     => 'message',
					'required' => true,
					'filters'  => array(
						array( 'name' => 'StripTags' ),
						array( 'name' => 'StringTrim' ),
					)
				) ) );

	            $this->oInputFilter = $oInputFilter;
	        }
	        return $this->oInputFilter;
	    }
	}