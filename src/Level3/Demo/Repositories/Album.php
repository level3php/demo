<?php

namespace Level3\Demo\Repositories;

use Level3\Resource\Resource;
use Level3\Demo\Entities\Entity;


/**
 * Album, describes album with name, artist and tracks, this is a demo from a simple repository
 */
class Album extends Repository
{
    const ENTITY_CLASS = 'Level3\Demo\Entities\Album';

    public function entityToResource(Entity $album)
    {
        $resource = new Resource();
        $resource->setURI($this->getEntityURI($album));
        $resource->setTitle($album->getTitle());
        $resource->setData($album->toArray());

        $artist = $this->getRepository('artist')->entityToResource($album->getArtist());
        $resource->linkResource('artist', $artist);

        $tracks = [];
        foreach ($album->getTracks() as $track) {
            $tracks[] = $this->getRepository('track')->entityToResource($track);
        }

        $resource->linkResources('tracks', $tracks);

        return $resource;
    }
}
