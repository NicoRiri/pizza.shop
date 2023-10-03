<?php
declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

return function( \Slim\App $app):void {

    $app->post('/commandes[/]', \pizzashop\shop\app\actions\CreerCommandeAction::class)
        ->setName('creer_commande');

    $app->get('/commandes/{id}[/]', \pizzashop\shop\app\actions\AccederCommandeAction::class)
        ->setName('accederCommande');
    $app->patch("/commandes/{id}[/]", \pizzashop\shop\app\actions\ValiderCommandeAction::class)
        ->setName('validerCommande');

    $app->get('/inscription[/]', \pizzashop\shop\app\actions\InscriptionAction::class)
        ->setName('inscription');
    $app->post('/inscription[/]', \pizzashop\shop\app\actions\InscriptionProcessAction::class);

    $app->get('/connexion[/]', \pizzashop\shop\app\actions\ConnexionAction::class)
        ->setName('connexion');
    $app->post('/connexion[/]', \pizzashop\shop\app\actions\ConnexionProcessAction::class);
};