<?php

namespace pizzashop\catalogue\app\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class getProduitsByCategorieAndLibelle  extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $sca = $this->container->get("sCatalogue");
        $res = $sca->getProduitsParCategorieEtLibelle($args['id'], $args['libelle']);
        $response->getBody()->write(json_encode($res));
        return $response;
    }
}