<?php

use App\Router;

require '../vendor/autoload.php';

define('DEBUG_TIME', microtime(true));
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//initialisation du routeur

$router = new Router(dirname(__DIR__) . ('/views'));
$router
    ->get('/','/index','home')
    ->get('/calendrier/planning/day=[i:day]', '/index', 'planning')
    ->run();
