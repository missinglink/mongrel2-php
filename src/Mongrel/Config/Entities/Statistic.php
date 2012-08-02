<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Statistic
 *
 * @ORM\Table(name="statistic")
 * @ORM\Entity
 */
class Statistic
{
    /**
     * @var string $otherType
     *
     * @ORM\Column(name="other_type", type="text", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $otherType;

    /**
     * @var integer $otherId
     *
     * @ORM\Column(name="other_id", type="integer", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $otherId;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="text", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $name;

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=true)
     */
    private $id;

    /**
     * @var float $sum
     *
     * @ORM\Column(name="sum", type="float", nullable=true)
     */
    private $sum;

    /**
     * @var float $sumsq
     *
     * @ORM\Column(name="sumsq", type="float", nullable=true)
     */
    private $sumsq;

    /**
     * @var integer $n
     *
     * @ORM\Column(name="n", type="integer", nullable=true)
     */
    private $n;

    /**
     * @var float $min
     *
     * @ORM\Column(name="min", type="float", nullable=true)
     */
    private $min;

    /**
     * @var float $max
     *
     * @ORM\Column(name="max", type="float", nullable=true)
     */
    private $max;

    /**
     * @var float $mean
     *
     * @ORM\Column(name="mean", type="float", nullable=true)
     */
    private $mean;

    /**
     * @var float $sd
     *
     * @ORM\Column(name="sd", type="float", nullable=true)
     */
    private $sd;


    /**
     * Set otherType
     *
     * @param string $otherType
     * @return Statistic
     */
    public function setOtherType($otherType)
    {
        $this->otherType = $otherType;
    
        return $this;
    }

    /**
     * Get otherType
     *
     * @return string 
     */
    public function getOtherType()
    {
        return $this->otherType;
    }

    /**
     * Set otherId
     *
     * @param integer $otherId
     * @return Statistic
     */
    public function setOtherId($otherId)
    {
        $this->otherId = $otherId;
    
        return $this;
    }

    /**
     * Get otherId
     *
     * @return integer 
     */
    public function getOtherId()
    {
        return $this->otherId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Statistic
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
     * Set id
     *
     * @param integer $id
     * @return Statistic
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }

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
     * Set sum
     *
     * @param float $sum
     * @return Statistic
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
    
        return $this;
    }

    /**
     * Get sum
     *
     * @return float 
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * Set sumsq
     *
     * @param float $sumsq
     * @return Statistic
     */
    public function setSumsq($sumsq)
    {
        $this->sumsq = $sumsq;
    
        return $this;
    }

    /**
     * Get sumsq
     *
     * @return float 
     */
    public function getSumsq()
    {
        return $this->sumsq;
    }

    /**
     * Set n
     *
     * @param integer $n
     * @return Statistic
     */
    public function setN($n)
    {
        $this->n = $n;
    
        return $this;
    }

    /**
     * Get n
     *
     * @return integer 
     */
    public function getN()
    {
        return $this->n;
    }

    /**
     * Set min
     *
     * @param float $min
     * @return Statistic
     */
    public function setMin($min)
    {
        $this->min = $min;
    
        return $this;
    }

    /**
     * Get min
     *
     * @return float 
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * Set max
     *
     * @param float $max
     * @return Statistic
     */
    public function setMax($max)
    {
        $this->max = $max;
    
        return $this;
    }

    /**
     * Get max
     *
     * @return float 
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * Set mean
     *
     * @param float $mean
     * @return Statistic
     */
    public function setMean($mean)
    {
        $this->mean = $mean;
    
        return $this;
    }

    /**
     * Get mean
     *
     * @return float 
     */
    public function getMean()
    {
        return $this->mean;
    }

    /**
     * Set sd
     *
     * @param float $sd
     * @return Statistic
     */
    public function setSd($sd)
    {
        $this->sd = $sd;
    
        return $this;
    }

    /**
     * Get sd
     *
     * @return float 
     */
    public function getSd()
    {
        return $this->sd;
    }
}