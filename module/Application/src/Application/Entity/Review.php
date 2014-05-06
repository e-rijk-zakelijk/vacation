<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Review
 *
 * @ORM\Table(name="review")
 * @ORM\Entity
 */
class Review {
	/**
	 *
	 * @var integer @ORM\Column(name="id", type="integer", nullable=false)
	 *      @ORM\Id
	 *      @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;
	
	/**
	 *
	 * @var integer @ORM\Column(name="account_id", type="integer", nullable=false)
	 */
	private $accountId;
	
	/**
	 *
	 * @var string @ORM\Column(name="title", type="string", length=255, nullable=false)
	 */
	private $title;
	
	/**
	 *
	 * @var string @ORM\Column(name="message", type="text", nullable=false)
	 */
	private $message;
	
	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Set accountId
	 *
	 * @param integer $accountId        	
	 * @return Review
	 */
	public function setAccountId($accountId) {
		$this->accountId = $accountId;
		
		return $this;
	}
	
	/**
	 * Get accountId
	 *
	 * @return integer
	 */
	public function getAccountId() {
		return $this->accountId;
	}
	
	/**
	 * Set title
	 *
	 * @param string $title        	
	 * @return Review
	 */
	public function setTitle($title) {
		$this->title = $title;
		
		return $this;
	}
	
	/**
	 * Get title
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * Set message
	 *
	 * @param string $message        	
	 * @return Review
	 */
	public function setMessage($message) {
		$this->message = $message;
		
		return $this;
	}
	
	/**
	 * Get message
	 *
	 * @return string
	 */
	public function getMessage() {
		return $this->message;
	}
}
