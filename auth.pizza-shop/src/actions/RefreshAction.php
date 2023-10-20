<?php

namespace pizzashop\auth\api\actions;

use pizzashop\auth\api\service\sAuthentification;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpUnauthorizedException;

class RefreshAction extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $auth = $request->getHeader("Authorization");
        $arr = explode(" ", $auth[0]);
        $token = $arr[1];
        $sAuth = new sAuthentification();

        try {
            $cpl = $sAuth->refresh($token);
        } catch (\Exception $e){
            throw new HttpUnauthorizedException($request, $e->getMessage());
        }


        if ($cpl != null){
            $response->withStatus(200);
            $response->getBody()->write(json_encode($cpl));
        } else {
            throw new HttpUnauthorizedException($request, "Mauvais token");
        }

        return $response;
    }
}