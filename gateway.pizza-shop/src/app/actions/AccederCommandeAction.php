<?php

namespace pizzashop\gateway\app\actions;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpMethodNotAllowedException;
use Slim\Exception\HttpNotFoundException;
use Slim\Exception\HttpUnauthorizedException;

class AccederCommandeAction extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        try{
            $headers = $request->getHeaders();
            $body = $request->getBody();

            $client = new Client();

            $res = $client->request('GET', "http://api.commande.pizza-shop/commandes/{$args['id']}", [['headers' => $headers], ["body" => $body]]);
            $res = $res->getBody()->getContents();
            $response->getBody()->write($res);
            $response->withStatus(200);
            return $response;
        } catch(HttpUnauthorizedException $e){
            return $response->withStatus(401);
        } catch(HttpMethodNotAllowedException $e){
            return $response->withStatus(405);
        } catch(HttpBadRequestException $e){
            return $response->withStatus(400);
        } catch(HttpNotFoundException $e){
            return $response->withStatus(404);
        }
    }
}