<?php

	namespace Application\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * Account
	 *
	 * @ORM\Table(name="account")
	 * @ORM\Entity
	 */
	class Account
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
	     * @ORM\Column(name="email", type="string", length=255, nullable=false)
	     */
	    private $email;
	
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
	     * Set email
	     *
	     * @param string $email
	     * @return Account
	     */
	    public function setEmail($email)
	    {
	        $this->email = $email;
	
	        return $this;
	    }
	
	    /**
	     * Get email
	     *
	     * @return string 
	     */
	    public function getEmail()
	    {
	        return $this->email;
	    }
	}
