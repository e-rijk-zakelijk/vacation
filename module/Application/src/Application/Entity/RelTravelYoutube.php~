<?php

	namespace Application\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * RelTravelYoutube
	 *
	 * @ORM\Table(name="rel_travel_youtube")
	 * @ORM\Entity
	 */
	class RelTravelYoutube
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
	     * @var integer
	     *
	     * @ORM\Column(name="travel_id", type="integer", nullable=false)
	     */
	    private $travelId;
	
	    /**
	     * @var integer
	     *
	     * @ORM\Column(name="youtube_id", type="integer", nullable=false)
	     */
	    private $youtubeId;
	
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
	     * Set travelId
	     *
	     * @param integer $travelId
	     * @return RelTravelYoutube
	     */
	    public function setTravelId($travelId)
	    {
	        $this->travelId = $travelId;
	
	        return $this;
	    }
	
	    /**
	     * Get travelId
	     *
	     * @return integer 
	     */
	    public function getTravelId()
	    {
	        return $this->travelId;
	    }
	
	    /**
	     * Set youtubeId
	     *
	     * @param integer $youtubeId
	     * @return RelTravelYoutube
	     */
	    public function setYoutubeId($youtubeId)
	    {
	        $this->youtubeId = $youtubeId;
	
	        return $this;
	    }
	
	    /**
	     * Get youtubeId
	     *
	     * @return integer 
	     */
	    public function getYoutubeId()
	    {
	        return $this->youtubeId;
	    }
	}
