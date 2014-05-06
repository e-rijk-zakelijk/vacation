<?php

	namespace Application\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * Youtube
	 *
	 * @ORM\Table(name="youtube")
	 * @ORM\Entity
	 */
	class Youtube
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
	     * @ORM\Column(name="video", type="string", length=255, nullable=false)
	     */
	    private $video;
	
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
	     * Set video
	     *
	     * @param string $video
	     * @return Youtube
	     */
	    public function setVideo($video)
	    {
	        $this->video = $video;
	
	        return $this;
	    }
	
	    /**
	     * Get video
	     *
	     * @return string 
	     */
	    public function getVideo()
	    {
	        return $this->video;
	    }
	}
