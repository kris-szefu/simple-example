<?php

require_once __DIR__.'/../vendor/autoload.php';

use SimpleExampleApp\Application\PricesController;
use SimpleExampleApp\Application\DependencyContainer;

$containerBuilder = new DependencyContainer();
$app = new DI\Bridge\Silex\Application($containerBuilder);
$app['debug'] = true;
unset($app['exception_handler']);

$app->get('/items/{itemId}/price/{countryCode}/', [PricesController::class, 'getItemPrice']);

return $app;
