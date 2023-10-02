<?php

namespace pizzashop\shop\app\actions;

use pizzashop\shop\domain\service\Commande\sCommande;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AccederCommandeAction extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $sco = new sCommande();
        $res = $sco->accederCommande($args['id']);
        $response->getBody()->write($res->toJSON());
        return $response;
    }
}