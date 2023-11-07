<?php

namespace pizzashop\shop\app\middleware;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpUnauthorizedException;
use Slim\Handlers\Strategies\RequestHandler;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class midCheckToken implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);
        $auth = $request->getHeader("Authorization");
        $arr = explode(" ", $auth[0]);
        $token = $arr[1];

        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];

        $client = new Client();
        try {
            $res = $client->request('GET', "http://api.pizza-auth/api/users/validate", ['headers' => $headers]);
        } catch (ClientException $e) {
            throw new HttpUnauthorizedException($request, "Token invalide");
        }
        return $response;
    }
}