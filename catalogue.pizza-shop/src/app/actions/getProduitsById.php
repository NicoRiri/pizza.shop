<?php

namespace pizzashop\catalogue\app\actions;

use pizzashop\catalogue\domain\dto\CommandeDTO;
use pizzashop\catalogue\domain\dto\ItemDTO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Ramsey\Uuid\Uuid;
use Slim\Exception\HttpBadRequestException;

class getProduitsById extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $sca = $this->container->get("sCatalogue");

        $res = $sca->getProduit($args['id']);

        $response->getBody()->write(json_encode($res));
        return $response;
    }
}