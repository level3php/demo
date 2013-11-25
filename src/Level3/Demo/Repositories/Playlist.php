<?php

namespace Level3\Demo\Repositories;

use Level3\Resource\Resource;
use Level3\Demo\Entities\Entity;

class Playlist extends WritableRepository
{
    const ENTITY_CLASS = 'Level3\Demo\Entities\Playlist';

    public function entityToResource(Entity $playlist)
    {
        $resource = new Resource();
        $resource->setTitle($playlist->getName());
        $resource->setData($playlist->toArray());

        return $resource;
    }


}
