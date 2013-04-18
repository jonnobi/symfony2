<?php

namespace Lv\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shop
 */
class Shop
{
    /**
     * @var integer
     */
    private $shopId;

    /**
     * @var integer
     */
    private $shopAccountId;

    /**
     * @var integer
     */
    private $businessId;

    /**
     * @var string
     */
    private $companyName;

    /**
     * @var integer
     */
    private $prefectureId;

    /**
     * @var string
     */
    private $municipalityCd;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $buildingName;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $tel;

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
     * @var \Lv\TestBundle\Entity\ShopAccount
     */
    private $shopAccount;

    /**
     * @var \Lv\TestBundle\Entity\Business
     */
    private $business;

    /**
     * @var \Lv\TestBundle\Entity\Prefecture
     */
    private $prefecture;


    /**
     * Get shopId
     *
     * @return integer
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * Set shopAccountId
     *
     * @param integer $shopAccountId
     * @return Shop
     */
    public function setShopAccountId($shopAccountId)
    {
        $this->shopAccountId = $shopAccountId;

        return $this;
    }

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
     * Set businessId
     *
     * @param integer $businessId
     * @return Shop
     */
    public function setBusinessId($businessId)
    {
        $this->businessId = $businessId;

        return $this;
    }

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
     * Set companyName
     *
     * @param string $companyName
     * @return Shop
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set prefectureId
     *
     * @param integer $prefectureId
     * @return Shop
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
     * Set municipalityCd
     *
     * @param string $municipalityCd
     * @return Shop
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
     * Set address
     *
     * @param string $address
     * @return Shop
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set buildingName
     *
     * @param string $buildingName
     * @return Shop
     */
    public function setBuildingName($buildingName)
    {
        $this->buildingName = $buildingName;

        return $this;
    }

    /**
     * Get buildingName
     *
     * @return string
     */
    public function getBuildingName()
    {
        return $this->buildingName;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Shop
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Shop
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Shop
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
     * @return Shop
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
     * @return Shop
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
     * Set shopAccount
     *
     * @param \Lv\TestBundle\Entity\ShopAccount $shopAccount
     * @return Shop
     */
    public function setShopAccount(\Lv\TestBundle\Entity\ShopAccount $shopAccount = null)
    {
        $this->shopAccount = $shopAccount;

        return $this;
    }

    /**
     * Get shopAccount
     *
     * @return \Lv\TestBundle\Entity\ShopAccount
     */
    public function getShopAccount()
    {
        return $this->shopAccount;
    }

    /**
     * Set business
     *
     * @param \Lv\TestBundle\Entity\Business $business
     * @return Shop
     */
    public function setBusiness(\Lv\TestBundle\Entity\Business $business = null)
    {
        $this->business = $business;

        return $this;
    }

    /**
     * Get business
     *
     * @return \Lv\TestBundle\Entity\Business
     */
    public function getBusiness()
    {
        return $this->business;
    }

    /**
     * Set prefecture
     *
     * @param \Lv\TestBundle\Entity\Prefecture $prefecture
     * @return Shop
     */
    public function setPrefecture(\Lv\TestBundle\Entity\Prefecture $prefecture = null)
    {
        $this->prefecture = $prefecture;

        return $this;
    }

    /**
     * Get prefecture
     *
     * @return \Lv\TestBundle\Entity\Prefecture
     */
    public function getPrefecture()
    {
        return $this->prefecture;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedValue()
    {
        if(!$this->getCreated())
        {
            $this->created = new \DateTime();
        }
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedValue()
    {
        $this->updated = new \DateTime();
    }
}
