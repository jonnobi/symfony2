<?php

namespace Lv\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Municipality
 */
class Municipality
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $municipalityCd;

    /**
     * @var integer
     */
    protected $prefectureId;

    /**
     * @var string
     */
    protected $municipalityName;

    /**
     * @var \DateTime
     */
    protected $updated;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var \DateTime
     */
    protected $deleted;


    public function __construct()
    {
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
    }

    public function __toString()
    {
        return $this->getMunicipalityName();
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
