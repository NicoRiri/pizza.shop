<?php

use DI\ContainerBuilder;
use Illuminate\Database\Capsule\Manager;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use pizzashop\shop\domain\service\Eloquent\Eloquent;
use Slim\Factory\AppFactory;
//
//$builder = new ContainerBuilder();
//
//$container=$builder->build();

$app = AppFactory::create();

// Ajoute le routing middleware
$app->addRoutingMiddleware();

// Ajoute le middleware d'erreurs
$app->addErrorMiddleware(true, false, false);

// Définit le chemin de base
$app->setBasePath('');

$db = new Manager();
$db->addConnection(parse_ini_file(__DIR__ . '/../config/commande.db.ini'), "commande");
$db->addConnection(parse_ini_file(__DIR__ . '/../config/catalogue.db.ini'), "catalogue");
$db->setAsGlobal();
$db->bootEloquent();

// Initialise la session
session_start();

return $app;