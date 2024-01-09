<?php

namespace pizzashop\gateway\app\actions;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpMethodNotAllowedException;
use Slim\Exception\HttpNotFoundException;

class SignUpAction extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        try {


            $body = $request->getBody();

            $client = new Client();
            $res = $client->request('POST', "http://api.pizza-auth/api/users/signup", ['body' => $body]);
            $res = $res->getBody()->getContents();
            $response->getBody()->write($res);
            $response->withStatus(201);
            return $response;
        } catch (HttpNotFoundException $e) {
            return $response->withStatus(404);
        } catch (HttpBadRequestException $e) {
            return $response->withStatus(400);
        } catch (HttpMethodNotAllowedException $e) {
            return $response->withStatus(405);
        }
    }
}