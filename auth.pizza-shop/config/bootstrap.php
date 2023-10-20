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

date_default_timezone_set('Europe/Paris');

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    // Exemple d'injection d'une dépendance
    'sCommande' => function () {
        return new \pizzashop\shop\domain\service\Commande\sCommande();
    },

    // Vous pouvez ajouter d'autres dépendances ici
]);

$container = $containerBuilder->build();

$app = AppFactory::createFromContainer($container);


// Ajoute le routing middleware
$app->addRoutingMiddleware();

// Ajoute le middleware d'erreurs
$app->addErrorMiddleware(true, false, false);

// Définit le chemin de base
$app->setBasePath('');

$db = new Manager();
$db->addConnection(parse_ini_file(__DIR__ . '/../config/user.db.ini'));
$db->setAsGlobal();
$db->bootEloquent();

// Initialise la session
session_start();

return $app;