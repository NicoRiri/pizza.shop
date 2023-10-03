<?php

namespace pizzashop\shop\app\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpInternalServerErrorException;
use Slim\Exception\HttpNotFoundException;

class ValiderCommandeAction extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $sco = $this->container->get("sCommande");
        $json = $request->getBody();
        $json = json_decode($json, true);
        $etat = $json["etat"];
        if ($etat == "validee"){
            //Checker si la commande existe
            if (!$sco->existeCommande($args['id'])) {
                throw new HttpNotFoundException($request, "Commande inexistante");
            }

            try {
                $comm = $sco->accederCommande($args['id']);
                if ($comm->etat == 1){
                    $sco->validerCommande($args['id']);
                } else {
                    throw new HttpBadRequestException($request, "Transition pas correcte");
                }

            } catch (\Error $e) {
                throw new HttpInternalServerErrorException($request, "Problème interne");
            }
        }

        $res = $sco->accederCommande($args['id']);

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