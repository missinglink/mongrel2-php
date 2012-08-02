<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Proxy
 *
 * @ORM\Table(name="proxy")
 * @ORM\Entity
 */
class Proxy
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
     * @var string $addr
     *
     * @ORM\Column(name="addr", type="text", nullable=true)
     */
    private $addr;

    /**
     * @var integer $port
     *
     * @ORM\Column(name="port", type="integer", nullable=true)
     */
    private $port;


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
     * Set addr
     *
     * @param string $addr
     * @return Proxy
     */
    public function setAddr($addr)
    {
        $this->addr = $addr;
    
        return $this;
    }

    /**
     * Get addr
     *
     * @return string 
     */
    public function getAddr()
    {
        return $this->addr;
    }

    /**
     * Set port
     *
     * @param integer $port
     * @return Proxy
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
}