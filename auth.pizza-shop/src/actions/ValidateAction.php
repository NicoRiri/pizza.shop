<?php

namespace pizzashop\auth\api\actions;

use Cassandra\Exception\UnauthorizedException;
use pizzashop\auth\api\service\sAuthentification;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpUnauthorizedException;

class ValidateAction extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        try {
            $auth = $request->getHeader("Authorization");
            $arr = explode(" ", $auth[0]);
            $token = $arr[1];
            $sAuth = new sAuthentification();
            $res = $sAuth->validate($token);
            if ($res != null){
                $response->withStatus(200);
                $response->getBody()->write(json_encode($res));
            }
            if ($res == null){
                throw new HttpUnauthorizedException($request, "Token expiré");
            }
        } catch (\Exception $exception){
            throw new HttpUnauthorizedException($request, $exception);
        }


        return $response;
    }
}