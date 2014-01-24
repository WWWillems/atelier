<?php
/**
 * Created by PhpStorm.
 * User: WWWillems
 * Date: 24/01/14
 * Time: 21:00

    // /app/app.php
    require_once __DIR__.'/bootstrap.php';

    use Symfony\Component\HttpFoundation\Response;

    $app = new Silex\Application();

    $app->get('/', function() {
        return new Response('Welcome to my new Silex app');
    });

    return $app; */
