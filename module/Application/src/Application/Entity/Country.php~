<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity
 */
class Country {
	/**
	 *
	 * @var integer @ORM\Column(name="id", type="integer", nullable=false)
	 *      @ORM\Id
	 *      @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;
	
	/**
	 *
	 * @var string @ORM\Column(name="abbreviation", type="string", length=3, nullable=false)
	 */
	private $abbreviation;
	
	/**
	 *
	 * @var string @ORM\Column(name="name", type="string", length=255, nullable=false)
	 */
	private $name;
	
	/**
	 * @ORM\OneToMany(targetEntity="Travel", mappedBy="country")
	 */
	private $travels;
	
	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Set abbreviation
	 *
	 * @param string $abbreviation        	
	 * @return Country
	 */
	public function setAbbreviation($abbreviation) {
		$this->abbreviation = $abbreviation;
		
		return $this;
	}
	
	/**
	 * Get abbreviation
	 *
	 * @return string
	 */
	public function getAbbreviation() {
		return $this->abbreviation;
	}
	/**
	 * Constructor
	 */
	public function __construct() {
		$this->travels = new \Doctrine\Common\Collections\ArrayCollection ();
	}
	
	/**
	 * Add travels
	 *
	 * @param \Application\Entity\Travel $travels        	
	 * @return Country
	 */
	public function addTravel(\Application\Entity\Travel $travels) {
		$this->travels [] = $travels;
		
		return $this;
	}
	
	/**
	 * Remove travels
	 *
	 * @param \Application\Entity\Travel $travels        	
	 */
	public function removeTravel(\Application\Entity\Travel $travels) {
		$this->travels->removeElement ( $travels );
	}
	
	/**
	 * Get travels
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getTravels() {
		return $this->travels;
	}

    /**
     * Set name
     *
     * @param string $name
     * @return Country
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
}
