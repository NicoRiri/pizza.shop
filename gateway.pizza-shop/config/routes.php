<?php
declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

return function( \Slim\App $app):void {

    //API Authentification

    $app->post('/signin[/]', \pizzashop\gateway\app\actions\SignInAction::class);
    $app->post('/signup[/]', \pizzashop\gateway\app\actions\SignUpAction::class);
    $app->post("/refresh[/]", \pizzashop\gateway\app\actions\RefreshAction::class);

    //API Catalogue

    $app->get('/produits[/]', \pizzashop\gateway\app\actions\getProduits::class);
    $app->get('/produits/{id}[/]', \pizzashop\gateway\app\actions\getProduitsById::class);
    $app->get("/categories/{id}/produits[/]", \pizzashop\gateway\app\actions\getProduitsByCategorie::class);

    //API Commande

    $app->post('/commandes[/]', \pizzashop\gateway\app\actions\CreerCommandeAction::class);
    $app->get('/commandes/{id}[/]', \pizzashop\gateway\app\actions\AccederCommandeAction::class);
    $app->patch("/commandes/{id}[/]", \pizzashop\gateway\app\actions\ValiderCommandeAction::class);

};