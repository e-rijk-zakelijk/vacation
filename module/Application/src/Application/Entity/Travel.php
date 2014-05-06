<?php

	namespace Application\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * Travel
	 *
	 * @ORM\Table(name="travel")
	 * @ORM\Entity
	 */
	class Travel {
		/**
		 *
		 * @var integer @ORM\Column(name="id", type="integer", nullable=false)
		 *      @ORM\Id
		 *      @ORM\GeneratedValue(strategy="IDENTITY")
		 */
		private $id;
		
		/**
		 *
		 * @var string @ORM\Column(name="name", type="string", length=255, nullable=false)
		 */
		private $name;
		
		/**
		 *
		 * @var string @ORM\Column(name="slug", type="string", length=255, nullable=false)
		 */
		private $slug;
		
		/**
		 *
		 * @var string @ORM\Column(name="description", type="text", nullable=false)
		 */
		private $description;
		
		/**
		 *
		 * @var string @ORM\Column(name="img_medium", type="string", length=255, nullable=false)
		 */
		private $imgMedium;
		
		/**
		 *
		 * @var string @ORM\Column(name="link", type="text", nullable=false)
		 */
		private $link;
		
		/**
		 * @ORM\Column(name="price", type="decimal", precision=6, scale=2, nullable=false)
		 */
		private $price;
		
		/**
		 *
		 * @var string @ORM\Column(name="status", type="string", length=8, nullable=false)
		 */
		private $status;
		
		/**
		 *
		 * @var integer * @ORM\ManyToOne(targetEntity="City", inversedBy="travels", cascade={"persist"})
		 */
		private $city;
		
		/**
		 *
		 * @var integer * @ORM\ManyToOne(targetEntity="Country", inversedBy="travels", cascade={"persist"})
		 */
		private $country;
		
		/**
		 * Get id
		 *
		 * @return integer
		 */
		public function getId() {
			return $this->id;
		}
		
		/**
		 * Set name
		 *
		 * @param string $name        	
		 * @return Travel
		 */
		public function setName($name) {
			$this->name = $name;
			
			return $this;
		}
		
		/**
		 * Get name
		 *
		 * @return string
		 */
		public function getName() {
			return $this->name;
		}
		
		/**
		 * Set description
		 *
		 * @param string $description        	
		 * @return Travel
		 */
		public function setDescription($description) {
			$this->description = $description;
			
			return $this;
		}
		
		/**
		 * Get description
		 *
		 * @return string
		 */
		public function getDescription() {
			return $this->description;
		}
		
		/**
		 * Set status
		 *
		 * @param string $status        	
		 * @return Travel
		 */
		public function setStatus($status) {
			$this->status = $status;
			
			return $this;
		}
		
		/**
		 * Get status
		 *
		 * @return string
		 */
		public function getStatus() {
			return $this->status;
		}
		
		/**
		 * Set country
		 *
		 * @param \Application\Entity\Country $country        	
		 * @return Travel
		 */
		public function setCountry(\Application\Entity\Country $country = null) {
			$this->country = $country;
			
			return $this;
		}
		
		/**
		 * Get country
		 *
		 * @return \Application\Entity\Country
		 */
		public function getCountry() {
			return $this->country;
		}
		
		/**
		 * Set link
		 *
		 * @param string $link        	
		 * @return Travel
		 */
		public function setLink($link) {
			$this->link = $link;
			
			return $this;
		}
		
		/**
		 * Get link
		 *
		 * @return string
		 */
		public function getLink() {
			return $this->link;
		}
		
		/**
		 * Set imgMedium
		 *
		 * @param string $imgMedium        	
		 * @return Travel
		 */
		public function setImgMedium($imgMedium) {
			$this->imgMedium = $imgMedium;
			
			return $this;
		}
		
		/**
		 * Get imgMedium
		 *
		 * @return string
		 */
		public function getImgMedium() {
			return $this->imgMedium;
		}
		
		/**
		 * Set slug
		 *
		 * @param string $slug        	
		 * @return Travel
		 */
		public function setSlug($slug) {
			$this->slug = $slug;
			
			return $this;
		}
		
		/**
		 * Get slug
		 *
		 * @return string
		 */
		public function getSlug() {
			return $this->slug;
		}
		
		/**
		 * Set price
		 *
		 * @param string $price        	
		 * @return Travel
		 */
		public function setPrice($price) {
			$this->price = $price;
			
			return $this;
		}
		
		/**
		 * Get price
		 *
		 * @return string
		 */
		public function getPrice() {
			return $this->price;
		}
	
	    /**
	     * Set city
	     *
	     * @param \Application\Entity\City $city
	     * @return Travel
	     */
	    public function setCity(\Application\Entity\City $city = null)
	    {
	        $this->city = $city;
	
	        return $this;
	    }
	
	    /**
	     * Get city
	     *
	     * @return \Application\Entity\City 
	     */
	    public function getCity()
	    {
	        return $this->city;
	    }
	}
