<?php

namespace pizzashop\gateway\app\actions;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class SignUpAction extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $body = $request->getBody();

        $client = new Client();
        $res = $client->request('POST', "http://api.pizza-auth/api/users/signup", ['body' => $body]);
        $res = $res->getBody()->getContents();
        $response->getBody()->write($res);
        return $response;
    }
}