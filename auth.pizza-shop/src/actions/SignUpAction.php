<?php

namespace pizzashop\auth\api\actions;

use pizzashop\auth\api\service\sAuthentification;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpInternalServerErrorException;
use Slim\Exception\HttpUnauthorizedException;

class SignUpAction extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $body = $request->getBody();
        $body = json_decode($body, true);
        $mail = $body["email"];
        $password = $body["password"];
        $password = password_hash($password, PASSWORD_BCRYPT);
        $username = $body["username"];

        $sAuth = new sAuthentification();
        try {
            $sAuth->signUp($mail, $password,$username);
        } catch (\Exception $exception) {
            throw new HttpInternalServerErrorException($request, $exception);
        }

        $response->getBody()->write("Compte créé");
        return $response;
    }
}