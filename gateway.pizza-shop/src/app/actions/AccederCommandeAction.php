<?php

namespace pizzashop\gateway\app\actions;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AccederCommandeAction extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $headers = $request->getHeaders();
        $body = $request->getBody();

        $client = new Client();

        $res = $client->request('GET', "http://api.commande.pizza-shop/commandes/{$args['id']}", [['headers' => $headers], ["body" => $body]]);
        $res = $res->getBody()->getContents();
        $response->getBody()->write($res);
        return $response;
    }
}