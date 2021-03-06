<?php

namespace Level3\Demo\Repositories;

use Level3\Resource\Resource;
use Level3\Demo\Entities\Entity;

/**
 * Track, describes track with name, composer, duration, size and price, this is a demo from a writable repository
 */
class Track extends WritableRepository
{
    const ENTITY_CLASS = 'Level3\Demo\Entities\Track';

    public function entityToResource(Entity $track)
    {
        $resource = new Resource();
        $resource->setURI($this->getEntityURI($track));
        $resource->setTitle($track->getName());
        $resource->setData($track->toArray());

        return $resource;
    }
}
