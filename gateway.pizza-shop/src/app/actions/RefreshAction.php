<?php

namespace pizzashop\gateway\app\actions;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class RefreshAction extends AbstractAction
{


    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        try {


        $headers = $request->getHeaders();

        $client = new Client();
        $res = $client->request('POST', "http://api.pizza-auth/api/users/refresh", ['headers' => $headers]);
        $res = $res->getBody()->getContents();
        $response->withStatus(200);
        $response->getBody()->write($res);
        return $response;
    } catch(HttpNotFoundException $e){
        return $response->withStatus(404);
    } catch(HttpBadRequestException $e){
        return $response->withStatus(400);
    }
    }
}