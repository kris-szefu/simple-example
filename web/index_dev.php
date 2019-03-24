<?php

use SimpleExampleApp\Application\PricesController;

require_once __DIR__.'/../vendor/autoload.php';

$app = new DI\Bridge\Silex\Application();
$app['debug'] = true;

$app->get('/items/{itemId}/price/{countryCode}/', [PricesController::class, 'getItemPrice']);

$app->run();
