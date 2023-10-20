<?php

namespace pizzashop\auth\api\actions;

use pizzashop\auth\api\service\AuthentificationProvider;
use pizzashop\auth\api\service\sAuthentification;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpUnauthorizedException;

class SignInAction extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $auth = $request->getHeader("Authorization");
        $arr = explode(" ", $auth[0]);
        $token = $arr[1];

        $sAuth = new sAuthentification();
        $cpl = $sAuth->signIn($mail, $mdp);
        if ($cpl != null){
            $response->withStatus(200);
            $response->getBody()->write(json_encode($cpl));
        } else {
            throw new HttpUnauthorizedException($request, "Pas les bons credentials");
        }

        return $response;
    }
}