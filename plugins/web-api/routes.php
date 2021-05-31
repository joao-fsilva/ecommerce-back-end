<?php

/** @var $app \Slim\App */

use Ecommerce\Controller\UserController;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/user', [UserController::class, 'index']);



