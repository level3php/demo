<?php

namespace Level3\Demo\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Artist")
 */
class Artist extends Entitiy
{
    /**
     * @ORM\Id()
     * @ORM\Column(name="ArtistId", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;
     
    /**
     * @ORM\Column(name="Name", type="string", length=255)
     * @var string
     */
    protected $name;

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