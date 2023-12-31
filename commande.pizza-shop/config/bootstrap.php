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

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    // Exemple d'injection d'une dépendance
    'sCommande' => function () {
        return new \pizzashop\commande\domain\service\Commande\sCommande();
    },

    // Vous pouvez ajouter d'autres dépendances ici
]);

$container = $containerBuilder->build();

$app = AppFactory::createFromContainer($container);
$app->addBodyParsingMiddleware();


// Ajoute le routing middleware
$app->addRoutingMiddleware();

// Ajoute le middleware d'erreurs
$app->addErrorMiddleware(true, false, false);

/**
* ajouter le middleware CORS sur toutes les routes
*/
$app->add(\pizzashop\commande\app\middleware\midCors::class);

// Définit le chemin de base
$app->setBasePath('');

$db = new Manager();
$db->addConnection(parse_ini_file(__DIR__ . '/../config/commande.db.ini'), "commande");
$db->setAsGlobal();
$db->bootEloquent();

// Initialise la session
session_start();

return $app;