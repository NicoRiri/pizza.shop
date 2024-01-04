<?php

namespace pizzashop\catalogue\app\actions;

use pizzashop\catalogue\domain\service\Produit\sCatalogue;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpNotFoundException;

class getProduits extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $sca = $this->container->get("sCatalogue");
        $res = $sca->getAllProduct();
        $response->getBody()->write(json_encode($res));
        return $response;
    }
}