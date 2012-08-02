<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Mimetype
 *
 * @ORM\Table(name="mimetype")
 * @ORM\Entity
 */
class Mimetype
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
     * @var string $mimetype
     *
     * @ORM\Column(name="mimetype", type="text", nullable=true)
     */
    private $mimetype;

    /**
     * @var string $extension
     *
     * @ORM\Column(name="extension", type="text", nullable=true)
     */
    private $extension;


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
     * Set mimetype
     *
     * @param string $mimetype
     * @return Mimetype
     */
    public function setMimetype($mimetype)
    {
        $this->mimetype = $mimetype;
    
        return $this;
    }

    /**
     * Get mimetype
     *
     * @return string 
     */
    public function getMimetype()
    {
        return $this->mimetype;
    }

    /**
     * Set extension
     *
     * @param string $extension
     * @return Mimetype
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    
        return $this;
    }

    /**
     * Get extension
     *
     * @return string 
     */
    public function getExtension()
    {
        return $this->extension;
    }
}