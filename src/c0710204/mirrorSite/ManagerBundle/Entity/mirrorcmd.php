<?php

namespace c0710204\mirrorSite\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * mirrorcmd
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class mirrorcmd
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
     * @ORM\Column(name="mirrorid", type="integer")
     */
    private $mirrorid;

    /**
     * @var string
     *
     * @ORM\Column(name="cmd", type="string", length=511)
     */
    private $cmd;


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
     * Set mirrorid
     *
     * @param integer $mirrorid
     * @return mirrorcmd
     */
    public function setMirrorid($mirrorid)
    {
        $this->mirrorid = $mirrorid;

        return $this;
    }

    /**
     * Get mirrorid
     *
     * @return integer 
     */
    public function getMirrorid()
    {
        return $this->mirrorid;
    }

    /**
     * Set cmd
     *
     * @param string $cmd
     * @return mirrorcmd
     */
    public function setCmd($cmd)
    {
        $this->cmd = $cmd;

        return $this;
    }

    /**
     * Get cmd
     *
     * @return string 
     */
    public function getCmd()
    {
        return $this->cmd;
    }
}
