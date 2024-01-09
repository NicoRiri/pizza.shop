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

        $client = new Client();

        $res = $client->request('GET', "http://api.commande.pizza-shop/commandes/{$args['id']}", ['headers' => $headers]);
        $res = $res->getBody()->getContents();
        $response->getBody()->write($res);
        return $response;
    }
}