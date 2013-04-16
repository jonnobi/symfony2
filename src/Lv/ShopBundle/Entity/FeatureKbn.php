<?php

namespace Lv\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FeatureKbn
 */
class FeatureKbn
{
    /**
     * @var integer
     */
    private $featureKbnId;

    /**
     * @var string
     */
    private $featureCd;

    /**
     * @var string
     */
    private $featureKbnCd;

    /**
     * @var string
     */
    private $featureKbnName;

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
     * @var \Lv\ShopBundle\Entity\Feature
     */
    private $feature;


    /**
     * Get featureKbnId
     *
     * @return integer 
     */
    public function getFeatureKbnId()
    {
        return $this->featureKbnId;
    }

    /**
     * Set featureCd
     *
     * @param string $featureCd
     * @return FeatureKbn
     */
    public function setFeatureCd($featureCd)
    {
        $this->featureCd = $featureCd;
    
        return $this;
    }

    /**
     * Get featureCd
     *
     * @return string 
     */
    public function getFeatureCd()
    {
        return $this->featureCd;
    }

    /**
     * Set featureKbnCd
     *
     * @param string $featureKbnCd
     * @return FeatureKbn
     */
    public function setFeatureKbnCd($featureKbnCd)
    {
        $this->featureKbnCd = $featureKbnCd;
    
        return $this;
    }

    /**
     * Get featureKbnCd
     *
     * @return string 
     */
    public function getFeatureKbnCd()
    {
        return $this->featureKbnCd;
    }

    /**
     * Set featureKbnName
     *
     * @param string $featureKbnName
     * @return FeatureKbn
     */
    public function setFeatureKbnName($featureKbnName)
    {
        $this->featureKbnName = $featureKbnName;
    
        return $this;
    }

    /**
     * Get featureKbnName
     *
     * @return string 
     */
    public function getFeatureKbnName()
    {
        return $this->featureKbnName;
    }

    /**
     * Set sortNo
     *
     * @param integer $sortNo
     * @return FeatureKbn
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
     * @return FeatureKbn
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
     * @return FeatureKbn
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
     * @return FeatureKbn
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
     * Set feature
     *
     * @param \Lv\ShopBundle\Entity\Feature $feature
     * @return FeatureKbn
     */
    public function setFeature(\Lv\ShopBundle\Entity\Feature $feature = null)
    {
        $this->feature = $feature;
    
        return $this;
    }

    /**
     * Get feature
     *
     * @return \Lv\ShopBundle\Entity\Feature 
     */
    public function getFeature()
    {
        return $this->feature;
    }
}