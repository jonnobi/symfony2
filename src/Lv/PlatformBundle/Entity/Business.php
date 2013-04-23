<?php

namespace Lv\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Business
 */
class Business
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $businessName;

    /**
     * @var integer
     */
    protected $sortNo;

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
        return $this->getBusinessName();
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
