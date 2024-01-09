<?php

namespace pizzashop\gateway\app\actions;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class getProduitsById extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        try{
            $client = new Client();
            $res = $client->request('GET', "http://api.catalogue.pizza-shop/produits/{$args["id"]}");
            $res = $res->getBody()->getContents();
            $response->getBody()->write($res);
            $response->withStatus(200);
            return $response;
        } catch(HttpNotFoundException $e){
            return $response->withStatus(404);
        } catch(HttpBadRequestException $e){
            return $response->withStatus(400);
        }
    }
}