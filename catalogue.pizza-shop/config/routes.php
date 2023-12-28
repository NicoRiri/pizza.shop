<?php
declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

return function( \Slim\App $app):void {

    $app->get('/produits[/]', \pizzashop\catalogue\app\actions\getProduits::class);
    $app->get('/produits/{id}[/]', \pizzashop\catalogue\app\actions\getProduitsById::class);
    $app->get("/categories/{id}/produits[/]", \pizzashop\catalogue\app\actions\getProduitsByCategorie::class);
};