<?php

namespace Level3\Demo\Repositories;

use Level3\Level3;
use Level3\Resource\Resource;
use Level3\Repository as BaseRepository;
use Level3\Repository\Finder;
use Level3\Repository\Getter;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\ParameterBag;
use Level3\Demo\Entities\Entity;
use Level3\Exceptions\NotFound;

abstract class Repository extends BaseRepository implements Finder, Getter
{
    protected $em;

    public function __construct(Level3 $level3, EntityManager $em)
    {
        parent::__construct($level3);

        $this->em = $em;
    }

    public function find(ParameterBag $attributes, ParameterBag $queryParams)
    {
        $resources = [];
        foreach ($this->em->getRepository(static::ENTITY_CLASS)->findBy([]) as $entity) {
            $resources[] = $this->entityToResource($entity);
        }
        
        $resource = new Resource();
        $resource->addResources(sprintf('%ss', $this->getKey()), $resources);
        $resource->setRepositoryKey($this->getKey());

        return $resource;
    }

    public function get(ParameterBag $attributes)
    {
        $entity = $this->getEntity($attributes);
     
        return $this->entityToResource($entity);
    }

    abstract public function entityToResource(Entity $entity);

    public function getEntityURI(Entity $entity)
    {
        $attributes = new ParameterBag(array(
            $this->getResourceIdVar() => (string) $entity->getId()
        ));

        return $this->getURI($attributes);
    }

    protected function getEntity(ParameterBag $attributes)
    {
        $key = $this->getResourceIdVar();
        $entity = $this->em->find(static::ENTITY_CLASS, $attributes->get($key));
        if (!$entity) {
            throw new NotFound();
        }

        return $entity;
    }

    protected function getResourceIdVar()
    {
        return $this->getKey() . 'Id';
    }

    protected function getRepository($repositoryKey)
    {
        return $this->level3->getHub()->get($repositoryKey);
    }
}
