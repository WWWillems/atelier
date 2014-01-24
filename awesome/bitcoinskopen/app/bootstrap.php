<?php
/**
 * Created by PhpStorm.
 * User: WWWillems
 * Date: 24/01/14
 * Time: 21:00
 */
// /app/bootstrap.php

//require_once __DIR__.'./../vendor/silex.phar';

$app = new Silex\Application();

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

# DEFINITIONS
$app->get('/', function (){
    return 'Lander';

});

$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello '.$app->escape($name);

});

// store session data
$_SESSION['views']+=1;

$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

# CREATE SERVICE
$app['atelier.service'] = $app->share(function() use ($app) {
    // Retrieve the db instance and create an instance of myClass
    return new \Atelier\myClass($app['db']);
});

# SET DEBUG MODE
$app['debug'] = true;

$app->run();

echo 'The End';