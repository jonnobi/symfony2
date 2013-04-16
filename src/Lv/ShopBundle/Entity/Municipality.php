<?php

namespace Lv\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Municipality
 */
class Municipality
{
    /**
     * @var integer
     */
    private $municipalityId;

    /**
     * @var string
     */
    private $municipalityCd;

    /**
     * @var integer
     */
    private $prefectureId;

    /**
     * @var string
     */
    private $municipalityName;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $deleted;


    /**
     * Get municipalityId
     *
     * @return integer 
     */
    public function getMunicipalityId()
    {
        return $this->municipalityId;
    }

    /**
     * Set municipalityCd
     *
     * @param string $municipalityCd
     * @return Municipality
     */
    public function setMunicipalityCd($municipalityCd)
    {
        $this->municipalityCd = $municipalityCd;
    
        return $this;
    }

    /**
     * Get municipalityCd
     *
     * @return string 
     */
    public function getMunicipalityCd()
    {
        return $this->municipalityCd;
    }

    /**
     * Set prefectureId
     *
     * @param integer $prefectureId
     * @return Municipality
     */
    public function setPrefectureId($prefectureId)
    {
        $this->prefectureId = $prefectureId;
    
        return $this;
    }

    /**
     * Get prefectureId
     *
     * @return integer 
     */
    public function getPrefectureId()
    {
        return $this->prefectureId;
    }

    /**
     * Set municipalityName
     *
     * @param string $municipalityName
     * @return Municipality
     */
    public function setMunicipalityName($municipalityName)
    {
        $this->municipalityName = $municipalityName;
    
        return $this;
    }

    /**
     * Get municipalityName
     *
     * @return string 
     */
    public function getMunicipalityName()
    {
        return $this->municipalityName;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Municipality
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Municipality
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set deleted
     *
     * @param \DateTime $deleted
     * @return Municipality
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    
        return $this;
    }

    /**
     * Get deleted
     *
     * @return \DateTime 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
}
