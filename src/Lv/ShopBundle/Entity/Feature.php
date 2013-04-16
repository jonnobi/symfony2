<?php

namespace Lv\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feature
 */
class Feature
{
    /**
     * @var integer
     */
    private $featureId;

    /**
     * @var string
     */
    private $featureCd;

    /**
     * @var string
     */
    private $featureName;

    /**
     * @var string
     */
    private $fieldName;

    /**
     * @var integer
     */
    private $sortNo;

    /**
     * @var integer
     */
    private $dispFlg;

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
     * Get featureId
     *
     * @return integer 
     */
    public function getFeatureId()
    {
        return $this->featureId;
    }

    /**
     * Set featureCd
     *
     * @param string $featureCd
     * @return Feature
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
     * Set featureName
     *
     * @param string $featureName
     * @return Feature
     */
    public function setFeatureName($featureName)
    {
        $this->featureName = $featureName;
    
        return $this;
    }

    /**
     * Get featureName
     *
     * @return string 
     */
    public function getFeatureName()
    {
        return $this->featureName;
    }

    /**
     * Set fieldName
     *
     * @param string $fieldName
     * @return Feature
     */
    public function setFieldName($fieldName)
    {
        $this->fieldName = $fieldName;
    
        return $this;
    }

    /**
     * Get fieldName
     *
     * @return string 
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * Set sortNo
     *
     * @param integer $sortNo
     * @return Feature
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
     * Set dispFlg
     *
     * @param integer $dispFlg
     * @return Feature
     */
    public function setDispFlg($dispFlg)
    {
        $this->dispFlg = $dispFlg;
    
        return $this;
    }

    /**
     * Get dispFlg
     *
     * @return integer 
     */
    public function getDispFlg()
    {
        return $this->dispFlg;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Feature
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
     * @return Feature
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
     * @return Feature
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