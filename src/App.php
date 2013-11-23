<?php
use  Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Level3\Demo\Providers\ControllerProvider;
use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Dflydev\Silex\Provider\Psr0ResourceLocator\Psr0ResourceLocatorServiceProvider;
use Dflydev\Silex\Provider\Psr0ResourceLocator\Composer\ComposerResourceLocatorServiceProvider;

$app->register(new ServiceControllerServiceProvider());
$app->register(new ControllerProvider());
$app->register(new Psr0ResourceLocatorServiceProvider);
$app->register(new ComposerResourceLocatorServiceProvider);
$app->register(new DoctrineServiceProvider(), [
    'db.options' => [
        'driver'   => 'pdo_sqlite',
        'path'     => __DIR__.'/../data/Chinook_Sqlite.sqlite',
    ]
]);

$app->register(new DoctrineOrmServiceProvider(), [
    'orm.em.options' => array(
        'mappings' => array(
            array(
                'type' => 'annotation',
                'namespace' => 'Level3\Demo\Entities',
                'resources_namespace' => 'Level3\Demo\Entities',
                'use_simple_annotation_reader' => false,
            )
        ),
    )
]);
/*
$app->register(new DoctrineOrmServiceProvider, array(
    "orm.em.options" => array(
         "mappings" => array(
            array(
               "type"      => "yml",
               'namespace' => 'Level3\Demo\Entities',
               "path"      => realpath(__DIR__."/../config/doctrine"),
              ),
            ),
         ),
));
*/

return $app;