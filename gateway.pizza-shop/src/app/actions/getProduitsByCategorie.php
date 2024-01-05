<?php

namespace pizzashop\gateway\app\actions;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class getProduitsByCategorie extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $client = new Client();
        $res = $client->request('GET', "http://api.catalogue.pizza-shop/categories/{$args["id"]}/produits");
        $res = $res->getBody()->getContents();
        $response->getBody()->write($res);
        return $response;
    }
}