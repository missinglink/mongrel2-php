<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Log
 *
 * @ORM\Table(name="log")
 * @ORM\Entity
 */
class Log
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
     * @var string $who
     *
     * @ORM\Column(name="who", type="text", nullable=true)
     */
    private $who;

    /**
     * @var string $what
     *
     * @ORM\Column(name="what", type="text", nullable=true)
     */
    private $what;

    /**
     * @var string $location
     *
     * @ORM\Column(name="location", type="text", nullable=true)
     */
    private $location;

    /**
     * @var \DateTime $happenedAt
     *
     * @ORM\Column(name="happened_at", type="datetime", nullable=true)
     */
    private $happenedAt;

    /**
     * @var string $how
     *
     * @ORM\Column(name="how", type="text", nullable=true)
     */
    private $how;

    /**
     * @var string $why
     *
     * @ORM\Column(name="why", type="text", nullable=true)
     */
    private $why;


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
     * Set who
     *
     * @param string $who
     * @return Log
     */
    public function setWho($who)
    {
        $this->who = $who;
    
        return $this;
    }

    /**
     * Get who
     *
     * @return string 
     */
    public function getWho()
    {
        return $this->who;
    }

    /**
     * Set what
     *
     * @param string $what
     * @return Log
     */
    public function setWhat($what)
    {
        $this->what = $what;
    
        return $this;
    }

    /**
     * Get what
     *
     * @return string 
     */
    public function getWhat()
    {
        return $this->what;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Log
     */
    public function setLocation($location)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set happenedAt
     *
     * @param \DateTime $happenedAt
     * @return Log
     */
    public function setHappenedAt($happenedAt)
    {
        $this->happenedAt = $happenedAt;
    
        return $this;
    }

    /**
     * Get happenedAt
     *
     * @return \DateTime 
     */
    public function getHappenedAt()
    {
        return $this->happenedAt;
    }

    /**
     * Set how
     *
     * @param string $how
     * @return Log
     */
    public function setHow($how)
    {
        $this->how = $how;
    
        return $this;
    }

    /**
     * Get how
     *
     * @return string 
     */
    public function getHow()
    {
        return $this->how;
    }

    /**
     * Set why
     *
     * @param string $why
     * @return Log
     */
    public function setWhy($why)
    {
        $this->why = $why;
    
        return $this;
    }

    /**
     * Get why
     *
     * @return string 
     */
    public function getWhy()
    {
        return $this->why;
    }
}