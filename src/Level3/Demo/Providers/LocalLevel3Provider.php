<?php

namespace Level3\Demo\Providers;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Level3\Demo\Repositories;
use Level3\Level3;
use Level3\Hub;
use Redis;

class LocalLevel3Provider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['level3.redis'] = $app->share(function(Application $app) {
            $redis = new Redis();
            $redis->connect('127.0.0.1', 6379);

            return $redis;
        });

        $app['level3.hub'] = $app->extend('level3.hub', function(Hub $hub, Application $app) {
            $hub->registerDefinition('album', function(Level3 $level3) use ($app) {
                return new Repositories\Album($level3, $app['orm.em']);
            }); 

            $hub->registerDefinition('artist', function(Level3 $level3) use ($app) {
                return new Repositories\Artist($level3, $app['orm.em']);
            }); 

            $hub->registerDefinition('track', function(Level3 $level3) use ($app) {
                return new Repositories\Track($level3, $app['orm.em']);
            });

            $hub->registerDefinition('playlist', function(Level3 $level3) use ($app) {
                return new Repositories\Playlist($level3, $app['orm.em']);
            });

            return $hub;
        });
    }

    public function boot(Application $app)
    {
    }
}


