<?php

namespace Level3\Demo\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Track")
 */
class Track extends Entity
{
    /**
     * @ORM\Id()
     * @ORM\Column(name="TrackId", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    public $id;
     
    /**
     * @ORM\Column(name="Name", type="string", length=255)
     * @var string
     */
    public $name;

    /**
     * @ORM\Column(name="Composer", type="string", length=255)
     * @var string
     */
    public $composer;

    /**
     * @ORM\Column(name="Milliseconds", type="integer")
     * @var integer
     */
    public $milliseconds;

    /**
     * @ORM\Column(name="Bytes", type="integer")
     * @var integer
     */
    public $bytes;

    /**
     * @ORM\Column(name="UnitPrice", type="float")
     * @var float
     */
    public $unitPrice;
    
    /**
     * @ORM\ManyToOne(targetEntity="Album", inversedBy="tracks")
     * @ORM\JoinColumn(name="AlbumId", referencedColumnName="AlbumId")
     **/
    private $album;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
     
    public function setName($name)
    {
        $this->name = (string) $name;
    }
}