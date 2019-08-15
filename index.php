<?php

require __DIR__ . '/vendor/autoload.php';

use Slim\Psr7\Response as Response;
use Slim\Psr7\Request as Request;
use Slim\Factory\AppFactory;

use \CompressImages\Controller\IndexController;

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $ctr = new IndexController;
    return $ctr->run($request, $response, $args);
});

$app->run();
