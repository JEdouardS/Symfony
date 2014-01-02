<?php

namespace iim\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="iim\BlogBundle\Entity\ArticleRepository")
 * @Vich\Uploadable
 */
class Article
{
    use ORMBehaviors\Timestampable\Timestampable;

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
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $author;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @Assert\File(
     *     maxSize="20M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg", "audio/mpeg"}
     * )
     * @Vich\UploadableField(mapping="article_sound", fileNameProperty="soundName")
     *
     * @var File $sound
     */
    protected $sound;

    /**
     * @ORM\Column(type="string", length=255, name="sound_name")
     *
     * @var string $soundName
     */
    protected $soundName;



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
     * @return Article
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
     * Set content
     *
     * @param string $content
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set author
     *
     * @param integer $author
     * @return Article
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return integer
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Article
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set soundName
     *
     * @param string $soundName
     * @return Article
     */
    public function setSoundName($soundName)
    {
        $this->soundName = $soundName;

        return $this;
    }

    /**
     * Get soundName
     *
     * @return string
     */
    public function getSoundName()
    {
        return $this->soundName;
    }


    public function setSound($sound)
    {
        $this->sound = $sound;

        return $this;

    }
    public function getSound()
    {
        return $this->sound;


    }




}
