<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Travel
 *
 * @ORM\Table(name="travel", indexes={@ORM\Index(name="IDX_2D0B6BCEF92F3E70", columns={"country_id"}), @ORM\Index(name="IDX_2D0B6BCE8BAC62AF", columns={"city_id"})})
 * @ORM\Entity
 */
class Travel
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
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=8, nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="text", nullable=false)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="img_medium", type="string", length=255, nullable=false)
     */
    private $imgMedium;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=6, scale=2, nullable=false)
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="nr_of_guests", type="integer", nullable=false)
     */
    private $nrOfGuests;

    /**
     * @var \City
     *
     * @ORM\ManyToOne(targetEntity="City", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     * })
     */
    private $city;
    
    /**
     * @var \Region
     *
     * @ORM\ManyToOne(targetEntity="Region")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * })
     */
    private $region;

    /**
     * @var \Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * })
     */
    private $country;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Accommodation", inversedBy="travel")
     * @ORM\JoinTable(name="rel_travel_accommodation",
     *   joinColumns={
     *     @ORM\JoinColumn(name="travel_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="accommodation_id", referencedColumnName="id")
     *   }
     * )
     */
    private $accommodation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Youtube", inversedBy="travel", cascade={"persist"})
     * @ORM\JoinTable(name="rel_travel_youtube",
     *   joinColumns={
     *     @ORM\JoinColumn(name="travel_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="youtube_id", referencedColumnName="id")
     *   }
     * )
     */
    private $youtube;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->accommodation = new \Doctrine\Common\Collections\ArrayCollection();
        $this->youtube = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Travel
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
     * Set description
     *
     * @param string $description
     * @return Travel
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Travel
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Travel
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set imgMedium
     *
     * @param string $imgMedium
     * @return Travel
     */
    public function setImgMedium($imgMedium)
    {
        $this->imgMedium = $imgMedium;

        return $this;
    }

    /**
     * Get imgMedium
     *
     * @return string 
     */
    public function getImgMedium()
    {
        return $this->imgMedium;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Travel
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Travel
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set nrOfGuests
     *
     * @param integer $nrOfGuests
     * @return Travel
     */
    public function setNrOfGuests($nrOfGuests)
    {
        $this->nrOfGuests = $nrOfGuests;

        return $this;
    }

    /**
     * Get nrOfGuests
     *
     * @return integer 
     */
    public function getNrOfGuests()
    {
        return $this->nrOfGuests;
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

    /**
     * Set country
     *
     * @param \Application\Entity\Country $country
     * @return Travel
     */
    public function setCountry(\Application\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Application\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add accommodation
     *
     * @param \Application\Entity\Accommodation $accommodation
     * @return Travel
     */
    public function addAccommodation(\Application\Entity\Accommodation $accommodation)
    {
        $this->accommodation[] = $accommodation;

        return $this;
    }

    /**
     * Remove accommodation
     *
     * @param \Application\Entity\Accommodation $accommodation
     */
    public function removeAccommodation(\Application\Entity\Accommodation $accommodation)
    {
        $this->accommodation->removeElement($accommodation);
    }

    /**
     * Get accommodation
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAccommodation()
    {
        return $this->accommodation;
    }

    /**
     * Add youtube
     *
     * @param \Application\Entity\Youtube $youtube
     * @return Travel
     */
    public function addYoutube(\Application\Entity\Youtube $youtube)
    {
        $this->youtube[] = $youtube;

        return $this;
    }

    /**
     * Remove youtube
     *
     * @param \Application\Entity\Youtube $youtube
     */
    public function removeYoutube(\Application\Entity\Youtube $youtube)
    {
        $this->youtube->removeElement($youtube);
    }

    /**
     * Get youtube
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    /**
     * Set region
     *
     * @param \Application\Entity\Region $region
     * @return Travel
     */
    public function setRegion(\Application\Entity\Region $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \Application\Entity\Region 
     */
    public function getRegion()
    {
        return $this->region;
    }
}
