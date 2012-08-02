<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Server
 *
 * @ORM\Table(name="server")
 * @ORM\Entity
 */
class Server
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $uuid
     *
     * @ORM\Column(name="uuid", type="text", nullable=true)
     */
    private $uuid;

    /**
     * @var string $accessLog
     *
     * @ORM\Column(name="access_log", type="text", nullable=true)
     */
    private $accessLog;

    /**
     * @var string $errorLog
     *
     * @ORM\Column(name="error_log", type="text", nullable=true)
     */
    private $errorLog;

    /**
     * @var string $chroot
     *
     * @ORM\Column(name="chroot", type="text", nullable=true)
     */
    private $chroot;

    /**
     * @var string $pidFile
     *
     * @ORM\Column(name="pid_file", type="text", nullable=true)
     */
    private $pidFile;

    /**
     * @var string $defaultHost
     *
     * @ORM\Column(name="default_host", type="text", nullable=true)
     */
    private $defaultHost;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="text", nullable=true)
     */
    private $name;

    /**
     * @var string $bindAddr
     *
     * @ORM\Column(name="bind_addr", type="text", nullable=true)
     */
    private $bindAddr;

    /**
     * @var integer $port
     *
     * @ORM\Column(name="port", type="integer", nullable=true)
     */
    private $port;

    /**
     * @var integer $useSsl
     *
     * @ORM\Column(name="use_ssl", type="integer", nullable=true)
     */
    private $useSsl;


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
     * Set uuid
     *
     * @param string $uuid
     * @return Server
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    
        return $this;
    }

    /**
     * Get uuid
     *
     * @return string 
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set accessLog
     *
     * @param string $accessLog
     * @return Server
     */
    public function setAccessLog($accessLog)
    {
        $this->accessLog = $accessLog;
    
        return $this;
    }

    /**
     * Get accessLog
     *
     * @return string 
     */
    public function getAccessLog()
    {
        return $this->accessLog;
    }

    /**
     * Set errorLog
     *
     * @param string $errorLog
     * @return Server
     */
    public function setErrorLog($errorLog)
    {
        $this->errorLog = $errorLog;
    
        return $this;
    }

    /**
     * Get errorLog
     *
     * @return string 
     */
    public function getErrorLog()
    {
        return $this->errorLog;
    }

    /**
     * Set chroot
     *
     * @param string $chroot
     * @return Server
     */
    public function setChroot($chroot)
    {
        $this->chroot = $chroot;
    
        return $this;
    }

    /**
     * Get chroot
     *
     * @return string 
     */
    public function getChroot()
    {
        return $this->chroot;
    }

    /**
     * Set pidFile
     *
     * @param string $pidFile
     * @return Server
     */
    public function setPidFile($pidFile)
    {
        $this->pidFile = $pidFile;
    
        return $this;
    }

    /**
     * Get pidFile
     *
     * @return string 
     */
    public function getPidFile()
    {
        return $this->pidFile;
    }

    /**
     * Set defaultHost
     *
     * @param string $defaultHost
     * @return Server
     */
    public function setDefaultHost($defaultHost)
    {
        $this->defaultHost = $defaultHost;
    
        return $this;
    }

    /**
     * Get defaultHost
     *
     * @return string 
     */
    public function getDefaultHost()
    {
        return $this->defaultHost;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Server
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
     * Set bindAddr
     *
     * @param string $bindAddr
     * @return Server
     */
    public function setBindAddr($bindAddr)
    {
        $this->bindAddr = $bindAddr;
    
        return $this;
    }

    /**
     * Get bindAddr
     *
     * @return string 
     */
    public function getBindAddr()
    {
        return $this->bindAddr;
    }

    /**
     * Set port
     *
     * @param integer $port
     * @return Server
     */
    public function setPort($port)
    {
        $this->port = $port;
    
        return $this;
    }

    /**
     * Get port
     *
     * @return integer 
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set useSsl
     *
     * @param integer $useSsl
     * @return Server
     */
    public function setUseSsl($useSsl)
    {
        $this->useSsl = $useSsl;
    
        return $this;
    }

    /**
     * Get useSsl
     *
     * @return integer 
     */
    public function getUseSsl()
    {
        return $this->useSsl;
    }
}