<?php

namespace Level3\Demo\Repositories;

use Level3\Level3;
use Level3\Resource\Resource;
use Level3\Repository\Deleter;
use Level3\Repository\Poster;
use Level3\Repository\Putter;
use Level3\Repository\Patcher;

use Level3\Exceptions\NotFound;
use Symfony\Component\HttpFoundation\ParameterBag;
use Level3\Demo\Entities\Entity;

abstract class WritableRepository extends Repository implements Poster, Deleter, Putter, Patcher
{
    public function post(ParameterBag $attributes, ParameterBag $data)
    {
        $data->remove('id');

        $class = static::ENTITY_CLASS;
        $entity = new $class;

        $this->applayParamsToEntity($data, $entity);

        $this->em->persist($entity);
        $this->em->flush();

        return $this->entityToResource($entity);
    }

    public function put(ParameterBag $attributes, ParameterBag $data)
    {
        $oldEntity = $this->getEntity($attributes);
        $data->set('id', $oldEntity->getId());

        $this->em->remove($oldEntity);
        $this->em->flush();

        $class = static::ENTITY_CLASS;
        $entity = new $class;
        $this->applayParamsToEntity($data, $entity);

        $this->em->persist($entity);
        $this->em->flush();

        return $this->entityToResource($entity);
    }

    public function patch(ParameterBag $attributes, ParameterBag $data)
    {
        $data->remove('id');
        $entity = $this->getEntity($attributes);
        $this->applayParamsToEntity($data, $entity);

        $this->em->persist($entity);
        $this->em->flush();

        return $this->entityToResource($entity);
    }


    public function delete(ParameterBag $attributes)
    {
        $entity = $this->getEntity($attributes);

        $this->em->remove($entity);
        $this->em->flush();
    }

    protected function applayParamsToEntity(ParameterBag $data, Entity $entity)
    {
        foreach ($data->all() as $key => $value) {
            $method = sprintf('set%s', ucfirst($key));
            if (is_callable([$entity, $method])) {
                $entity->$method($value);
            }
        } 
    }
}
