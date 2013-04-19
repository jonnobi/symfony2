<?php

namespace Lv\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Area
 * Shop Entity をSessionにStoreできない事象対応を
 * \Serializable でなく、private→protectedにすることで対応
 */

class Area implements \Serializable
//class Area
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
     * Implementation for the \Serializable interface
     *
     * @return string
     * @deprecated implements \Serializable を解除したので未使用.
     */
    public function serialize()
    {
        return serialize(array(
            $this->areaId,
            $this->areaName,
            $this->created,
            $this->deleted,
            $this->updated,
        ));
    }

    /**
     * Implementation for the \Serializable interface
     *
     * @param string $serialized
     * @return void
     * @deprecated implements \Serializable を解除したので未使用.
     */
    public function unserialize($serialized)
    {
        list($this->areaId,
             $this->areaName,
             $this->created,
             $this->deleted,
             $this->updated,
        ) = unserialize($serialized);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getAreaName();
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