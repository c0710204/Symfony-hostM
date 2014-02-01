<?php

namespace c0710204\mirrorSite\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * mirrorstatus
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class mirrorstatus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="string", length=255)
     */
    private $size;

    /**
     * @var integer
     *
     * @ORM\Column(name="filecount", type="integer")
     */
    private $filecount;

    /**
     * @var string
     *
     * @ORM\Column(name="updatetime", type="string", length=255)
     */
    private $updatetime;


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
     * Set status
     *
     * @param integer $status
     * @return mirrorstatus
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return mirrorstatus
     */
    public function setsize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getsize()
    {
        return $this->size;
    }

    /**
     * Set filecount
     *
     * @param integer $filecount
     * @return mirrorstatus
     */
    public function setFilecount($filecount)
    {
        $this->filecount = $filecount;

        return $this;
    }

    /**
     * Get filecount
     *
     * @return integer 
     */
    public function getFilecount()
    {
        return $this->filecount;
    }

    /**
     * Set updatetime
     *
     * @param string $updatetime
     * @return mirrorstatus
     */
    public function setUpdatetime($updatetime)
    {
        $this->updatetime = $updatetime;

        return $this;
    }

    /**
     * Get updatetime
     *
     * @return string 
     */
    public function getUpdatetime()
    {
        return $this->updatetime;
    }
}
