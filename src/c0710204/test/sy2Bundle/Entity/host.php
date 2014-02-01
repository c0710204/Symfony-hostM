<?php

namespace c0710204\test\sy2Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * host
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="c0710204\test\sy2Bundle\Entity\hostRepository")
 */
class host
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
     * @var array
     *
     * @ORM\Column(name="sites", type="string", length=255)
     */
    private $sites;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="renewtime", type="datetime")
     */
    private $renewtime;

    /**
     * @var string
     *
     * @ORM\Column(name="information", type="text")
     */
    private $information;

    /**
     * @var string
     *
     * @ORM\Column(name="host_site", type="string", length=255)
     */
    private $hostSite;

    /**
     * @var string
     *
     * @ORM\Column(name="host_ip", type="string", length=255)
     */
    private $hostIp;

    /**
     * @var string
     *
     * @ORM\Column(name="host_user", type="string", length=255)
     */
    private $hostUser;

    /**
     * @var string
     *
     * @ORM\Column(name="host_pass", type="string", length=255)
     */
    private $hostPass;

    /**
     * @var string
     *
     * @ORM\Column(name="ftp_site", type="string", length=255)
     */
    private $ftpSite;

    /**
     * @var string
     *
     * @ORM\Column(name="ftp_user", type="string", length=255)
     */
    private $ftpUser;

    /**
     * @var string
     *
     * @ORM\Column(name="ftp_pass", type="string", length=255)
     */
    private $ftpPass;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="integer")
     */
    private $size;

    /**
     * @var integer
     *
     * @ORM\Column(name="bandwidth", type="integer")
     */
    private $bandwidth;

    /**
     * @var float
     *
     * @ORM\Column(name="cputime", type="float")
     */
    private $cputime;

    /**
     * @var integer
     *
     * @ORM\Column(name="ram", type="integer")
     */
    private $ram;


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
     * @return host
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
     * Set sites
     *
     * @param array $sites
     * @return host
     */
    public function setSites($sites)
    {
        $this->sites = $sites;

        return $this;
    }

    /**
     * Get sites
     *
     * @return array 
     */
    public function getSites()
    {
        return $this->sites;
    }

    /**
     * Set renewtime
     *
     * @param \DateTime $renewtime
     * @return host
     */
    public function setRenewtime($renewtime)
    {
        $this->renewtime = $renewtime;

        return $this;
    }

    /**
     * Get renewtime
     *
     * @return \DateTime 
     */
    public function getRenewtime()
    {
        return $this->renewtime;
    }

    /**
     * Set information
     *
     * @param string $information
     * @return host
     */
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Get information
     *
     * @return string 
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Set hostSite
     *
     * @param string $hostSite
     * @return host
     */
    public function setHostSite($hostSite)
    {
        $this->hostSite = $hostSite;

        return $this;
    }

    /**
     * Get hostSite
     *
     * @return string 
     */
    public function getHostSite()
    {
        return $this->hostSite;
    }

    /**
     * Set hostIp
     *
     * @param string $hostIp
     * @return host
     */
    public function setHostIp($hostIp)
    {
        $this->hostIp = $hostIp;

        return $this;
    }

    /**
     * Get hostIp
     *
     * @return string 
     */
    public function getHostIp()
    {
        return $this->hostIp;
    }

    /**
     * Set hostUser
     *
     * @param string $hostUser
     * @return host
     */
    public function setHostUser($hostUser)
    {
        $this->hostUser = $hostUser;

        return $this;
    }

    /**
     * Get hostUser
     *
     * @return string 
     */
    public function getHostUser()
    {
        return $this->hostUser;
    }

    /**
     * Set hostPass
     *
     * @param string $hostPass
     * @return host
     */
    public function setHostPass($hostPass)
    {
        $this->hostPass = $hostPass;

        return $this;
    }

    /**
     * Get hostPass
     *
     * @return string 
     */
    public function getHostPass()
    {
        return $this->hostPass;
    }

    /**
     * Set ftpSite
     *
     * @param string $ftpSite
     * @return host
     */
    public function setFtpSite($ftpSite)
    {
        $this->ftpSite = $ftpSite;

        return $this;
    }

    /**
     * Get ftpSite
     *
     * @return string 
     */
    public function getFtpSite()
    {
        return $this->ftpSite;
    }

    /**
     * Set ftpUser
     *
     * @param string $ftpUser
     * @return host
     */
    public function setFtpUser($ftpUser)
    {
        $this->ftpUser = $ftpUser;

        return $this;
    }

    /**
     * Get ftpUser
     *
     * @return string 
     */
    public function getFtpUser()
    {
        return $this->ftpUser;
    }

    /**
     * Set ftpPass
     *
     * @param string $ftpPass
     * @return host
     */
    public function setFtpPass($ftpPass)
    {
        $this->ftpPass = $ftpPass;

        return $this;
    }

    /**
     * Get ftpPass
     *
     * @return string 
     */
    public function getFtpPass()
    {
        return $this->ftpPass;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return host
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set bandwidth
     *
     * @param integer $bandwidth
     * @return host
     */
    public function setBandwidth($bandwidth)
    {
        $this->bandwidth = $bandwidth;

        return $this;
    }

    /**
     * Get bandwidth
     *
     * @return integer 
     */
    public function getBandwidth()
    {
        return $this->bandwidth;
    }

    /**
     * Set cputime
     *
     * @param float $cputime
     * @return host
     */
    public function setCputime($cputime)
    {
        $this->cputime = $cputime;

        return $this;
    }

    /**
     * Get cputime
     *
     * @return float 
     */
    public function getCputime()
    {
        return $this->cputime;
    }

    /**
     * Set ram
     *
     * @param integer $ram
     * @return host
     */
    public function setRam($ram)
    {
        $this->ram = $ram;

        return $this;
    }

    /**
     * Get ram
     *
     * @return integer 
     */
    public function getRam()
    {
        return $this->ram;
    }
}
