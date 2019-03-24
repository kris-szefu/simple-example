<?php

require_once __DIR__.'/../vendor/autoload.php';

use SimpleExampleApp\Application\PricesController;
use SimpleExampleApp\Application\DependencyContainer;

$containerBuilder = new DependencyContainer();
$app = new DI\Bridge\Silex\Application($containerBuilder);
$app['debug'] = true;

$app->get('/items/{itemId}/price/{countryCode}/', [PricesController::class, 'getItemPrice']);

$app->run();
