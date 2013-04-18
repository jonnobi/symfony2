<?php

namespace Lv\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prefecture
 */
class Prefecture
{
    /**
     * @var integer
     */
    private $prefectureId;

    /**
     * @var string
     */
    private $prefectureName;

    /**
     * @var integer
     */
    private $areaId;

    /**
     * @var integer
     */
    private $areaSort;

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
     * @var \Lv\TestBundle\Entity\Area
     */
    private $area;


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
     * Set prefectureName
     *
     * @param string $prefectureName
     * @return Prefecture
     */
    public function setPrefectureName($prefectureName)
    {
        $this->prefectureName = $prefectureName;

        return $this;
    }

    /**
     * Get prefectureName
     *
     * @return string
     */
    public function getPrefectureName()
    {
        return $this->prefectureName;
    }

    /**
     * Set areaId
     *
     * @param integer $areaId
     * @return Prefecture
     */
    public function setAreaId($areaId)
    {
        $this->areaId = $areaId;

        return $this;
    }

    /**
     * Get areaId
     *
     * @return integer
     */
    public function getAreaId()
    {
        return $this->areaId;
    }

    /**
     * Set areaSort
     *
     * @param integer $areaSort
     * @return Prefecture
     */
    public function setAreaSort($areaSort)
    {
        $this->areaSort = $areaSort;

        return $this;
    }

    /**
     * Get areaSort
     *
     * @return integer
     */
    public function getAreaSort()
    {
        return $this->areaSort;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Prefecture
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
     * @return Prefecture
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
     * @return Prefecture
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

    /**
     * Set area
     *
     * @param \Lv\TestBundle\Entity\Area $area
     * @return Prefecture
     */
    public function setArea(\Lv\TestBundle\Entity\Area $area = null)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return \Lv\TestBundle\Entity\Area
     */
    public function getArea()
    {
        return $this->area;
    }

    public function __toString()
    {
        return $this->getPrefectureName();
    }
}