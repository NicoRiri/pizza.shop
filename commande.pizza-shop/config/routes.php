<?php
declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

return function( \Slim\App $app):void {

    $app->post('/commandes[/]', \pizzashop\commande\app\actions\CreerCommandeAction::class)
        ->add(\pizzashop\commande\app\middleware\midCheckToken::class)
        ->setName('creer_commande');
    $app->get('/commandes/{id}[/]', \pizzashop\commande\app\actions\AccederCommandeAction::class)
        ->add(\pizzashop\commande\app\middleware\midCheckToken::class)
        ->setName('accederCommande');
    $app->patch("/commandes/{id}[/]", \pizzashop\commande\app\actions\ValiderCommandeAction::class)
        ->add(\pizzashop\commande\app\middleware\midCheckToken::class)
        ->setName('validerCommande');
};