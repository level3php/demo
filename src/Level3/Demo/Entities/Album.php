<?php

namespace Level3\Demo\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Album")
 */
class Album extends Entitiy
{
    /**
     * @ORM\Id()
     * @ORM\Column(name="AlbumId", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    public $id;
     
    /**
     * @ORM\Column(name="Title", type="string", length=255)
     * @var string
     */
    public $title;
     
    /**
     * @ORM\Column(name="ArtistId", type="integer")
     * @var int
     */
    public $artistId;

    /**
     * @ORM\ManyToOne(targetEntity="Artist")
     * @ORM\JoinColumn(name="ArtistId", referencedColumnName="ArtistId")
     */
    private $artist;

    /**
     * @ORM\OneToMany(targetEntity="Track", mappedBy="album")
     **/
    private $tracks = [];

    public function getId()
    {
        return $this->id;
    }
     
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = (string) $title;
    }

    public function getArtistId()
    {
        return $this->artist;
    }

    public function setArtistId($artistId)
    {
        $this->artistId = (int) $artistId;
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function getTracks()
    {
        return $this->tracks;
    }
}