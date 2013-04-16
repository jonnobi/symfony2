<?php

namespace Lv\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Business
 */
class Business
{
    /**
     * @var integer
     */
    private $businessId;

    /**
     * @var string
     */
    private $businessName;

    /**
     * @var integer
     */
    private $sortNo;

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
     * Get businessId
     *
     * @return integer 
     */
    public function getBusinessId()
    {
        return $this->businessId;
    }

    /**
     * Set businessName
     *
     * @param string $businessName
     * @return Business
     */
    public function setBusinessName($businessName)
    {
        $this->businessName = $businessName;
    
        return $this;
    }

    /**
     * Get businessName
     *
     * @return string 
     */
    public function getBusinessName()
    {
        return $this->businessName;
    }

    /**
     * Set sortNo
     *
     * @param integer $sortNo
     * @return Business
     */
    public function setSortNo($sortNo)
    {
        $this->sortNo = $sortNo;
    
        return $this;
    }

    /**
     * Get sortNo
     *
     * @return integer 
     */
    public function getSortNo()
    {
        return $this->sortNo;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Business
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
     * @return Business
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
     * @return Business
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
