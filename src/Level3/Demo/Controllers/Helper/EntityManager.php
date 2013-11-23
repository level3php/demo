<?php

namespace Level3\Demo\Controllers\Helper;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

trait EntityManager {
    protected $baseEntityNamespace = 'Level3\Demo\Entities\\';

    protected function getRepository($class)
    {
        $entity = $this->baseEntityNamespace . $class;
        
        return $this->app['orm.em']->getRepository($entity);
    }
}