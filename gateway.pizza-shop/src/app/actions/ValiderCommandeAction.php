<?php

namespace pizzashop\gateway\app\actions;

use GuzzleHttp\Client;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpInternalServerErrorException;
use Slim\Exception\HttpNotFoundException;
use Slim\Exception\HttpUnauthorizedException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ValiderCommandeAction extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        try {


        $headers = $request->getHeaders();
        $body = $request->getBody();

        $client = new Client();

        $res = $client->request('PATCH', "http://api.commande.pizza-shop/commandes/{$args['id']}", [['headers' => $headers], ["body" => $body]]);
        $res = $res->getBody()->getContents();
        $response->getBody()->write($res);
        $response->withStatus(204);
        return $response;
    }catch (HttpNotFoundException $e){
        return $response->withStatus(404);
    } catch(HttpBadRequestException $e){
        return $response->withStatus(400);
    } catch(HttpUnauthorizedException $e){
        return $response->withStatus(401);
    }
    }

}