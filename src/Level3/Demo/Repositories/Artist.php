<?php

namespace Level3\Demo\Repositories;

use Level3\Resource\Resource;
use Level3\Demo\Entities\Entity;

class Artist extends Repository
{
    const ENTITY_CLASS = 'Level3\Demo\Entities\Artist';

    public function entityToResource(Entity $artist)
    {
        $resource = new Resource();
        $resource->setURI($this->getEntityURI($artist));
        $resource->setTitle($artist->getName());
        $resource->setData($artist->toArray());

        return $resource;
    }
}
