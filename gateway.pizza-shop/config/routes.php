<?php
declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

return function( \Slim\App $app):void {

    //API Authentification

    $app->post('/signin[/]', \pizzashop\gateway\app\actions\SignInAction::class);
    $app->post("/refresh[/]", \pizzashop\gateway\app\actions\RefreshAction::class);

    //API Catalogue

    $app->post('/commandes[/]', \pizzashop\gateway\app\actions\CreerCommandeAction::class);
    $app->get('/commandes/{id}[/]', \pizzashop\gateway\app\actions\AccederCommandeAction::class);
    $app->patch("/commandes/{id}[/]", \pizzashop\gateway\app\actions\ValiderCommandeAction::class);

    //API Commande

    
};