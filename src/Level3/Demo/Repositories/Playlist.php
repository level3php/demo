<?php

namespace Level3\Demo\Repositories;

use Level3\Resource\Resource;
use Level3\Demo\Entities\Entity;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Playlist, describes playlist with name, this is a demo from a writable repository but the patch method throw a exception to demostrate the error handling.
 */
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

    public function patch(ParameterBag $attributes, ParameterBag $data)
    {
        throw new \RuntimeException('Just sample example of a Exception. :D');
    }
}
