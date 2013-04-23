<?php

namespace Lv\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Holiday
 */
class Holiday
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $holiday;

    /**
     * @var integer
     */
    private $week;

    /**
     * @var integer
     */
    private $htype;

    /**
     * @var string
     */
    private $hname;

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


    public function __construct()
    {
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
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
     * Set holiday
     *
     * @param \DateTime $holiday
     * @return Holiday
     */
    public function setHoliday($holiday)
    {
        $this->holiday = $holiday;

        return $this;
    }

    /**
     * Get holiday
     *
     * @return \DateTime
     */
    public function getHoliday()
    {
        return $this->holiday;
    }

    /**
     * Set week
     *
     * @param integer $week
     * @return Holiday
     */
    public function setWeek($week)
    {
        $this->week = $week;

        return $this;
    }

    /**
     * Get week
     *
     * @return integer
     */
    public function getWeek()
    {
        return $this->week;
    }

    /**
     * Set htype
     *
     * @param integer $htype
     * @return Holiday
     */
    public function setHtype($htype)
    {
        $this->htype = $htype;

        return $this;
    }

    /**
     * Get htype
     *
     * @return integer
     */
    public function getHtype()
    {
        return $this->htype;
    }

    /**
     * Set hname
     *
     * @param string $hname
     * @return Holiday
     */
    public function setHname($hname)
    {
        $this->hname = $hname;

        return $this;
    }

    /**
     * Get hname
     *
     * @return string
     */
    public function getHname()
    {
        return $this->hname;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Holiday
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
     * @return Holiday
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
     * @return Holiday
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
