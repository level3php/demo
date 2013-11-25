<?php

namespace Level3\Demo\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Playlist")
 */
class Playlist extends Entity
{
    /**
     * @ORM\Id()
     * @ORM\Column(name="PlaylistId", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    public $id;
     
    /**
     * @ORM\Column(name="Name", type="string", length=255)
     * @var string
     */
    public $name;

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
