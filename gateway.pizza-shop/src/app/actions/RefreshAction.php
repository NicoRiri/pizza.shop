<?php

namespace pizzashop\gateway\app\actions;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class RefreshAction extends AbstractAction
{


    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $headers = $request->getHeaders();

        $client = new Client();
        $res = $client->request('POST', "http://api.pizza-auth/api/users/refresh", ['headers' => $headers]);
        $res = $res->getBody()->getContents();
        $response->getBody()->write($res);
        return $response;
    }
}