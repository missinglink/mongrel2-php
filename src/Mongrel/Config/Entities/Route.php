<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Route
 *
 * @ORM\Table(name="route")
 * @ORM\Entity
 */
class Route
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
     * @var string $path
     *
     * @ORM\Column(name="path", type="text", nullable=true)
     */
    private $path;

    /**
     * @var boolean $reversed
     *
     * @ORM\Column(name="reversed", type="boolean", nullable=true)
     */
    private $reversed;

    /**
     * @var integer $hostId
     *
     * @ORM\Column(name="host_id", type="integer", nullable=true)
     */
    private $hostId;

    /**
     * @var integer $targetId
     *
     * @ORM\Column(name="target_id", type="integer", nullable=true)
     */
    private $targetId;

    /**
     * @var string $targetType
     *
     * @ORM\Column(name="target_type", type="text", nullable=true)
     */
    private $targetType;


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
     * Set path
     *
     * @param string $path
     * @return Route
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set reversed
     *
     * @param boolean $reversed
     * @return Route
     */
    public function setReversed($reversed)
    {
        $this->reversed = $reversed;
    
        return $this;
    }

    /**
     * Get reversed
     *
     * @return boolean 
     */
    public function getReversed()
    {
        return $this->reversed;
    }

    /**
     * Set hostId
     *
     * @param integer $hostId
     * @return Route
     */
    public function setHostId($hostId)
    {
        $this->hostId = $hostId;
    
        return $this;
    }

    /**
     * Get hostId
     *
     * @return integer 
     */
    public function getHostId()
    {
        return $this->hostId;
    }

    /**
     * Set targetId
     *
     * @param integer $targetId
     * @return Route
     */
    public function setTargetId($targetId)
    {
        $this->targetId = $targetId;
    
        return $this;
    }

    /**
     * Get targetId
     *
     * @return integer 
     */
    public function getTargetId()
    {
        return $this->targetId;
    }

    /**
     * Set targetType
     *
     * @param string $targetType
     * @return Route
     */
    public function setTargetType($targetType)
    {
        $this->targetType = $targetType;
    
        return $this;
    }

    /**
     * Get targetType
     *
     * @return string 
     */
    public function getTargetType()
    {
        return $this->targetType;
    }
}