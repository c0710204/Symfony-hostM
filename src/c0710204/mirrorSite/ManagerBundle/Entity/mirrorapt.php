<?php

namespace c0710204\mirrorSite\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * mirrorapt
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class mirrorapt
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
     * @ORM\JoinColumn(name="mirrorid_id",referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="mirrorinfo", cascade={"all"}, fetch="EAGER")
     * 
     * ORM\OneToMany(targetEntity="mirrorinfo",mappedBy="apts", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
     */
    private $mirrorid;

    /**
     * @var integer
     *
     * @ORM\JoinColumn(name="kind",referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="platform", cascade={"all"}, fetch="EAGER")
     */
    private $kind;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255)
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="softtype", type="string", length=255)
     */
    private $softtype;


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
     * @return mirrorapt
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
     * Set kind
     *
     * @param string $kind
     * @return mirrorapt
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Get kind
     *
     * @return string 
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return mirrorapt
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return mirrorapt
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set softtype
     *
     * @param string $softtype
     * @return mirrorapt
     */
    public function setSofttype($softtype)
    {
        $this->softtype = $softtype;

        return $this;
    }

    /**
     * Get softtype
     *
     * @return string 
     */
    public function getSofttype()
    {
        return $this->softtype;
    }
}
