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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Travel", mappedBy="youtube")
     */
    private $travel;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->travel = new \Doctrine\Common\Collections\ArrayCollection();
    }


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

    /**
     * Add travel
     *
     * @param \Application\Entity\Travel $travel
     * @return Youtube
     */
    public function addTravel(\Application\Entity\Travel $travel)
    {
        $this->travel[] = $travel;

        return $this;
    }

    /**
     * Remove travel
     *
     * @param \Application\Entity\Travel $travel
     */
    public function removeTravel(\Application\Entity\Travel $travel)
    {
        $this->travel->removeElement($travel);
    }

    /**
     * Get travel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTravel()
    {
        return $this->travel;
    }
}
