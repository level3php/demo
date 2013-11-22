<?php
use Silex\Provider\ServiceControllerServiceProvider;
use Level3\Demo\Providers\ControllerProvider;

$app->register(new ServiceControllerServiceProvider());
$app->register(new ControllerProvider());

return $app;