<?php

namespace pizzashop\shop\app\middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpUnauthorizedException;

class midCors implements MiddlewareInterface
{

    public function process(Request $request, RequestHandlerInterface $handler): Response
    {
        $response = $handler->handle($request);

        // Ajoute les en-têtes CORS
        $response
            ->withHeader("Access-Control-Allow-Origin", "*")
            ->withHeader('Access-Control-Allow-Methods', 'POST, PUT, GET, PATCH')
            ->withHeader('Access-Control-Allow-Headers', 'Authorization');

        return $response;
    }
}