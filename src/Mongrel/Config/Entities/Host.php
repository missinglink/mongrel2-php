<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Host
 *
 * @ORM\Table(name="host")
 * @ORM\Entity
 */
class Host
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
     * @var integer $serverId
     *
     * @ORM\Column(name="server_id", type="integer", nullable=true)
     */
    private $serverId;

    /**
     * @var boolean $maintenance
     *
     * @ORM\Column(name="maintenance", type="boolean", nullable=true)
     */
    private $maintenance;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="text", nullable=true)
     */
    private $name;

    /**
     * @var string $matching
     *
     * @ORM\Column(name="matching", type="text", nullable=true)
     */
    private $matching;


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
     * Set serverId
     *
     * @param integer $serverId
     * @return Host
     */
    public function setServerId($serverId)
    {
        $this->serverId = $serverId;
    
        return $this;
    }

    /**
     * Get serverId
     *
     * @return integer 
     */
    public function getServerId()
    {
        return $this->serverId;
    }

    /**
     * Set maintenance
     *
     * @param boolean $maintenance
     * @return Host
     */
    public function setMaintenance($maintenance)
    {
        $this->maintenance = $maintenance;
    
        return $this;
    }

    /**
     * Get maintenance
     *
     * @return boolean 
     */
    public function getMaintenance()
    {
        return $this->maintenance;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Host
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
     * Set matching
     *
     * @param string $matching
     * @return Host
     */
    public function setMatching($matching)
    {
        $this->matching = $matching;
    
        return $this;
    }

    /**
     * Get matching
     *
     * @return string 
     */
    public function getMatching()
    {
        return $this->matching;
    }
}