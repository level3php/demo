<?php
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Level3\Demo\Providers\ControllerProvider;
use Level3\Demo\Providers\LocalLevel3Provider;
use Level3\Silex\ServiceProvider as Level3Provider;
use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Dflydev\Silex\Provider\Psr0ResourceLocator\Psr0ResourceLocatorServiceProvider;
use Dflydev\Silex\Provider\Psr0ResourceLocator\Composer\ComposerResourceLocatorServiceProvider;

$app = new Silex\Application();
$app->register(new Level3Provider(), [
    'level3.enable.limiter' => true,
    'level3.enable.cors' => true,
    'level3.enable.logger' => true
]);

$app->register(new LocalLevel3Provider());
$app->register(new ControllerProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new Psr0ResourceLocatorServiceProvider);
$app->register(new ComposerResourceLocatorServiceProvider);
$app->register(new DoctrineServiceProvider(), [
    'db.options' => [
        'driver'   => 'pdo_sqlite',
        'path'     => __DIR__.'/../data/Chinook_Sqlite.sqlite',
    ]
]);

$app->register(new DoctrineOrmServiceProvider(), [
    'orm.em.options' => [
        'mappings' => [
            [
                'type' => 'annotation',
                'namespace' => 'Level3\Demo\Entities',
                'resources_namespace' => 'Level3\Demo\Entities',
                'use_simple_annotation_reader' => false,
            ]
        ],
    ]
]);

return $app;
