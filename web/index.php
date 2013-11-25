<?php
$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

$local = __DIR__.'/../vendor/autoload.php';
if (file_exists($local)) {
    require_once $local;
}

$parent = __DIR__.'/../../../../vendor/autoload.php';
if (file_exists($parent)) {
    require_once $parent;
}

$app = require __DIR__ . '/../src/App.php';
$app['debug'] = true;

$app->run(\Level3\Messages\Request::createFromGlobals());
