<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TravelCoordinates
 *
 * @ORM\Table(name="travel_coordinates")
 * @ORM\Entity
 */
class TravelCoordinates
{
    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=255, nullable=false)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=255, nullable=false)
     */
    private $longitude;

    /**
     * @var \Travel
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Travel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="travel_id", referencedColumnName="id")
     * })
     */
    private $travel;



    /**
     * Set latitude
     *
     * @param string $latitude
     * @return TravelCoordinates
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return TravelCoordinates
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set travel
     *
     * @param \Application\Entity\Travel $travel
     * @return TravelCoordinates
     */
    public function setTravel(\Application\Entity\Travel $travel)
    {
        $this->travel = $travel;

        return $this;
    }

    /**
     * Get travel
     *
     * @return \Application\Entity\Travel 
     */
    public function getTravel()
    {
        return $this->travel;
    }
}
