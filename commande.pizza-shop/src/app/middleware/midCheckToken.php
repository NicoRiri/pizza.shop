<?php

namespace pizzashop\commande\app\middleware;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpUnauthorizedException;

class midCheckToken implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);
        $headers = $request->getHeaders();

        $client = new Client();
        try {
            $res = $client->request('GET', "http://api.pizza-auth/api/users/validate", ['headers' => $headers]);
        } catch (ClientException $e) {
            throw new HttpUnauthorizedException($request, "Token invalide");
        }
        return $response;
    }
}