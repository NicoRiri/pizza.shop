<?php
declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

return function( \Slim\App $app):void {

    $app->post('/commandes[/]', \pizzashop\catalogue\app\actions\CreerCommandeAction::class)
        ->add(\pizzashop\catalogue\app\middleware\midCheckToken::class)
        ->setName('creer_commande');
    $app->get('/commandes/{id}[/]', \pizzashop\catalogue\app\actions\AccederCommandeAction::class)
        ->add(\pizzashop\catalogue\app\middleware\midCheckToken::class)
        ->setName('accederCommande');
    $app->patch("/commandes/{id}[/]", \pizzashop\catalogue\app\actions\ValiderCommandeAction::class)
        ->add(\pizzashop\catalogue\app\middleware\midCheckToken::class)
        ->setName('validerCommande');
    $app->post("/connexion[/]", \pizzashop\catalogue\app\actions\SignInAction::class)
        ->setName("connexion");
};