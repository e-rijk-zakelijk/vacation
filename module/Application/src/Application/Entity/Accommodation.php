<?php

	namespace Application\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
use Zend\XmlRpc\Value\String;
		
	/**
	 * Accommodation
	 *
	 * @ORM\Table(name="accommodation")
	 * @ORM\Entity
	 */
	class Accommodation
	{
	    /**
	     * @var integer
	     *
	     * @ORM\Column(name="id", type="integer", nullable=false)
	     * @ORM\Id
	     * @ORM\GeneratedValue(strategy="IDENTITY")
	     */
	    private $id;
	
	    /**
	     * @var string
	     *
	     * @ORM\Column(name="name", type="string", length=255, nullable=false)
	     */
	    private $name;
	    
	    /**
	     * @var String
	     * 
	     * @ORM\Column(name="type", type="string", length=255, nullable=false)
	     */
	    private $type;
	
	    /**
	     * Get id
	     *
	     * @return integer 
	     */
	    public function getId()
	    {
	        return $this->id;
	    }
	
	    /**
	     * Set name
	     *
	     * @param string $name
	     * @return Accommodation
	     */
	    public function setName($name)
	    {
	        $this->name = $name;
	
	        return $this;
	    }
	
	    /**
	     * Get name
	     *
	     * @return string 
	     */
	    public function getName()
	    {
	        return $this->name;
	    }
	
    /**
     * Set type
     *
     * @param string $type
     * @return Accommodation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
