<?php

namespace c0710204\mirrorSite\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * platform
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class platform
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="aptname", type="string", length=255)
     */
    private $aptname;

    /**
     * @var string
     *
     * @ORM\Column(name="yumname", type="string", length=255)
     */
    private $yumname;


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
     * Set name
     *
     * @param string $name
     * @return platform
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set aptname
     *
     * @param string $aptname
     * @return platform
     */
    public function setAptname($aptname)
    {
        $this->aptname = $aptname;

        return $this;
    }

    /**
     * Get aptname
     *
     * @return string 
     */
    public function getAptname()
    {
        return $this->aptname;
    }

    /**
     * Set yumname
     *
     * @param string $yumname
     * @return platform
     */
    public function setYumname($yumname)
    {
        $this->yumname = $yumname;

        return $this;
    }

    /**
     * Get yumname
     *
     * @return string 
     */
    public function getYumname()
    {
        return $this->yumname;
    }
    /**
     * Get description
     *
     * @return string 
     */    
    public function __tostring()
    {
        return $this->name;
    }    
}
