<?php

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use pizzashop\shop\domain\service\Eloquent\Eloquent;
use Slim\Factory\AppFactory;

$builder = new ContainerBuilder();

$container=$builder->build();

$app = AppFactory::create();

// Ajoute le routing middleware
$app->addRoutingMiddleware();

// Ajoute le middleware d'erreurs
$app->addErrorMiddleware(true, false, false);

// Définit le chemin de base
$app->setBasePath('');

// Initialise Eloquent avec le fichier de configuration
Eloquent::init(__DIR__ . '/../config/commande.db.ini');
Eloquent::init(__DIR__ . '/../config/catalog.db.ini');

// Initialise la session
session_start();

return $app;