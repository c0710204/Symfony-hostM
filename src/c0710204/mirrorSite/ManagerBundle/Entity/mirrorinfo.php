<?php

namespace c0710204\mirrorSite\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * mirrorinfo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class mirrorinfo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="rootpath", type="string", length=255)
     */
    public $rootpath;

    /**
     * @var string
     *
     * @ORM\Column(name="href", type="string", length=255)
     */
    public $href;

    /**
     * @var string
     *
     * @ORM\Column(name="intro", type="text")
     */
    public $intro;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    public $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    public $title;

    /**
     * @var boolean
     *
     * @ORM\Column(name="official", type="boolean")
     */
    public $official;

    /**
     * @var string
     *
     * @ORM\Column(name="worker_link", type="string", length=255)
     */
    public $workerLink;

    /**
     * @var string
     *
     * @ORM\Column(name="worker_name", type="string", length=255)
     */
    public $workerName;

    /**
     * @var integer
     * @ORM\OneToOne(targetEntity="mirrorstatus", cascade={"all"}, fetch="EAGER")
     */
    public $status;

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
     * Set rootpath
     *
     * @param string $rootpath
     * @return mirrorinfo
     */
    public function setRootpath($rootpath)
    {
        $this->rootpath = $rootpath;

        return $this;
    }

    /**
     * Get rootpath
     *
     * @return string 
     */
    public function getRootpath()
    {
        return $this->rootpath;
    }

    /**
     * Set href
     *
     * @param string $href
     * @return mirrorinfo
     */
    public function setHref($href)
    {
        $this->href = $href;

        return $this;
    }

    /**
     * Get href
     *
     * @return string 
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * Set intro
     *
     * @param string $intro
     * @return mirrorinfo
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;

        return $this;
    }

    /**
     * Get intro
     *
     * @return string 
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return mirrorinfo
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
     * Set title
     *
     * @param string $title
     * @return mirrorinfo
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set official
     *
     * @param boolean $official
     * @return mirrorinfo
     */
    public function setOfficial($official)
    {
        $this->official = $official;

        return $this;
    }

    /**
     * Get official
     *
     * @return boolean 
     */
    public function getOfficial()
    {
        return $this->official;
    }

    /**
     * Set workerLink
     *
     * @param string $workerLink
     * @return mirrorinfo
     */
    public function setWorkerLink($workerLink)
    {
        $this->workerLink = $workerLink;

        return $this;
    }

    /**
     * Get workerLink
     *
     * @return string 
     */
    public function getWorkerLink()
    {
        return $this->workerLink;
    }

    /**
     * Set workerName
     *
     * @param string $workerName
     * @return mirrorinfo
     */
    public function setWorkerName($workerName)
    {
        $this->workerName = $workerName;

        return $this;
    }

    /**
     * Get workerName
     *
     * @return string 
     */
    public function getWorkerName()
    {
        return $this->workerName;
    }
    /**
     * Set status
     *
     * @param integer $status
     * @return mirrorinfo
     */
    public function setstatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getstatus()
    {
        return $this->status;
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
