<?php

use Slim\Factory\AppFactory;

$app = AppFactory::create();
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();

$app->addErrorMiddleware(true, false, false);

$app->add(\pizzashop\gateway\app\middleware\midCors::class);

$app->setBasePath('');

session_start();

return $app;