<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Directory
 *
 * @ORM\Table(name="directory")
 * @ORM\Entity
 */
class Directory
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
     * @var string $base
     *
     * @ORM\Column(name="base", type="text", nullable=true)
     */
    private $base;

    /**
     * @var string $indexFile
     *
     * @ORM\Column(name="index_file", type="text", nullable=true)
     */
    private $indexFile;

    /**
     * @var string $defaultCtype
     *
     * @ORM\Column(name="default_ctype", type="text", nullable=true)
     */
    private $defaultCtype;

    /**
     * @var integer $cacheTtl
     *
     * @ORM\Column(name="cache_ttl", type="integer", nullable=true)
     */
    private $cacheTtl;


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
     * Set base
     *
     * @param string $base
     * @return Directory
     */
    public function setBase($base)
    {
        $this->base = $base;
    
        return $this;
    }

    /**
     * Get base
     *
     * @return string 
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * Set indexFile
     *
     * @param string $indexFile
     * @return Directory
     */
    public function setIndexFile($indexFile)
    {
        $this->indexFile = $indexFile;
    
        return $this;
    }

    /**
     * Get indexFile
     *
     * @return string 
     */
    public function getIndexFile()
    {
        return $this->indexFile;
    }

    /**
     * Set defaultCtype
     *
     * @param string $defaultCtype
     * @return Directory
     */
    public function setDefaultCtype($defaultCtype)
    {
        $this->defaultCtype = $defaultCtype;
    
        return $this;
    }

    /**
     * Get defaultCtype
     *
     * @return string 
     */
    public function getDefaultCtype()
    {
        return $this->defaultCtype;
    }

    /**
     * Set cacheTtl
     *
     * @param integer $cacheTtl
     * @return Directory
     */
    public function setCacheTtl($cacheTtl)
    {
        $this->cacheTtl = $cacheTtl;
    
        return $this;
    }

    /**
     * Get cacheTtl
     *
     * @return integer 
     */
    public function getCacheTtl()
    {
        return $this->cacheTtl;
    }
}