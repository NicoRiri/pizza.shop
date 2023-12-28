<?php

namespace pizzashop\catalogue\app\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpNotFoundException;

class AccederCommandeAction extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $sco = $this->container->get("sCommande");


        $res = $sco->accederCommande($args['id']);

        if ($res->date_commande == 0){
            throw new HttpNotFoundException($request, "Commande {$res->id} not found");
        }

        $rep = [
            "type" => "ressource",
            "commande" => $res,
            "link" => [
                "self" => [
                    "href" => "/commandes/$res->id"
                ],
                "valider" => [
                    "href" => "/commandes/$res->id"
                ]
            ]
        ];


        $response->getBody()->write(json_encode($rep));
        return $response;
    }
}