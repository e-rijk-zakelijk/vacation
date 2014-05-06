<?php

	namespace Application\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * City
	 *
	 * @ORM\Table(name="city")
	 * @ORM\Entity
	 */
	class City
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
	     * @ORM\OneToMany(targetEntity="Travel", mappedBy="city")
	     */
	    private $travels;
	
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
	     * @return City
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
	     * Constructor
	     */
	    public function __construct()
	    {
	        $this->travels = new \Doctrine\Common\Collections\ArrayCollection();
	    }
	
	    /**
	     * Add travels
	     *
	     * @param \Application\Entity\Travel $travels
	     * @return City
	     */
	    public function addTravel(\Application\Entity\Travel $travels)
	    {
	        $this->travels[] = $travels;
	
	        return $this;
	    }
	
	    /**
	     * Remove travels
	     *
	     * @param \Application\Entity\Travel $travels
	     */
	    public function removeTravel(\Application\Entity\Travel $travels)
	    {
	        $this->travels->removeElement($travels);
	    }
	
	    /**
	     * Get travels
	     *
	     * @return \Doctrine\Common\Collections\Collection 
	     */
	    public function getTravels()
	    {
	        return $this->travels;
	    }
	}
