<?php

namespace Lv\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Area
 */
class Area
{
    /**
     * @var integer
     */
    private $areaId;

    /**
     * @var string
     */
    private $areaName;

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
     * Get areaId
     *
     * @return integer 
     */
    public function getAreaId()
    {
        return $this->areaId;
    }

    /**
     * Set areaName
     *
     * @param string $areaName
     * @return Area
     */
    public function setAreaName($areaName)
    {
        $this->areaName = $areaName;
    
        return $this;
    }

    /**
     * Get areaName
     *
     * @return string 
     */
    public function getAreaName()
    {
        return $this->areaName;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Area
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
     * @return Area
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
     * @return Area
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