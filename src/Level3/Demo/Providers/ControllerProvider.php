<?php

namespace Level3\Demo\Providers;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Level3\Demo\Controllers;

class ControllerProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['controller.index'] = $app->share(function($app) {
            return new Controllers\Index($app);
        });

        $app->get('/', 'controller.index:main');

    }

    public function boot(Application $app)
    {
    }
}


