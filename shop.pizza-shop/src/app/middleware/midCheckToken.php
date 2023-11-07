<?php

namespace pizzashop\shop\app\middleware;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Slim\Exception\HttpUnauthorizedException;
use Slim\Handlers\Strategies\RequestHandler;
use Slim\Psr7\Request;

class midCheckToken
{
    public function __invoke(Request $request, RequestHandler $handler)
    {
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