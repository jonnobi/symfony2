<?php

namespace Lv\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShopAccount
 */
class ShopAccount
{
    /**
     * @var integer
     */
    private $shopAccountId;

    /**
     * @var string
     */
    private $shopAccountName;

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
     * Get shopAccountId
     *
     * @return integer 
     */
    public function getShopAccountId()
    {
        return $this->shopAccountId;
    }

    /**
     * Set shopAccountName
     *
     * @param string $shopAccountName
     * @return ShopAccount
     */
    public function setShopAccountName($shopAccountName)
    {
        $this->shopAccountName = $shopAccountName;
    
        return $this;
    }

    /**
     * Get shopAccountName
     *
     * @return string 
     */
    public function getShopAccountName()
    {
        return $this->shopAccountName;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return ShopAccount
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
     * @return ShopAccount
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
     * @return ShopAccount
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
