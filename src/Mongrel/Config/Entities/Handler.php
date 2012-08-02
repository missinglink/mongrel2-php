<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Handler
 *
 * @ORM\Table(name="handler")
 * @ORM\Entity
 */
class Handler
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
     * @var string $sendSpec
     *
     * @ORM\Column(name="send_spec", type="text", nullable=true)
     */
    private $sendSpec;

    /**
     * @var string $sendIdent
     *
     * @ORM\Column(name="send_ident", type="text", nullable=true)
     */
    private $sendIdent;

    /**
     * @var string $recvSpec
     *
     * @ORM\Column(name="recv_spec", type="text", nullable=true)
     */
    private $recvSpec;

    /**
     * @var string $recvIdent
     *
     * @ORM\Column(name="recv_ident", type="text", nullable=true)
     */
    private $recvIdent;

    /**
     * @var integer $rawPayload
     *
     * @ORM\Column(name="raw_payload", type="integer", nullable=true)
     */
    private $rawPayload;

    /**
     * @var string $protocol
     *
     * @ORM\Column(name="protocol", type="text", nullable=true)
     */
    private $protocol;


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
     * Set sendSpec
     *
     * @param string $sendSpec
     * @return Handler
     */
    public function setSendSpec($sendSpec)
    {
        $this->sendSpec = $sendSpec;
    
        return $this;
    }

    /**
     * Get sendSpec
     *
     * @return string 
     */
    public function getSendSpec()
    {
        return $this->sendSpec;
    }

    /**
     * Set sendIdent
     *
     * @param string $sendIdent
     * @return Handler
     */
    public function setSendIdent($sendIdent)
    {
        $this->sendIdent = $sendIdent;
    
        return $this;
    }

    /**
     * Get sendIdent
     *
     * @return string 
     */
    public function getSendIdent()
    {
        return $this->sendIdent;
    }

    /**
     * Set recvSpec
     *
     * @param string $recvSpec
     * @return Handler
     */
    public function setRecvSpec($recvSpec)
    {
        $this->recvSpec = $recvSpec;
    
        return $this;
    }

    /**
     * Get recvSpec
     *
     * @return string 
     */
    public function getRecvSpec()
    {
        return $this->recvSpec;
    }

    /**
     * Set recvIdent
     *
     * @param string $recvIdent
     * @return Handler
     */
    public function setRecvIdent($recvIdent)
    {
        $this->recvIdent = $recvIdent;
    
        return $this;
    }

    /**
     * Get recvIdent
     *
     * @return string 
     */
    public function getRecvIdent()
    {
        return $this->recvIdent;
    }

    /**
     * Set rawPayload
     *
     * @param integer $rawPayload
     * @return Handler
     */
    public function setRawPayload($rawPayload)
    {
        $this->rawPayload = $rawPayload;
    
        return $this;
    }

    /**
     * Get rawPayload
     *
     * @return integer 
     */
    public function getRawPayload()
    {
        return $this->rawPayload;
    }

    /**
     * Set protocol
     *
     * @param string $protocol
     * @return Handler
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
    
        return $this;
    }

    /**
     * Get protocol
     *
     * @return string 
     */
    public function getProtocol()
    {
        return $this->protocol;
    }
}