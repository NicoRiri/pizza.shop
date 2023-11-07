<?php
declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

return function( \Slim\App $app):void {

    $app->post('/api/users/signin[/]', \pizzashop\auth\api\actions\SignInAction::class)
        ->setName('signin');
    $app->get('/api/users/validate[/]', \pizzashop\auth\api\actions\ValidateAction::class)
        ->setName('valider');
    $app->post("/api/users/refresh[/]", \pizzashop\auth\api\actions\RefreshAction::class)
        ->setName('refresh');
};