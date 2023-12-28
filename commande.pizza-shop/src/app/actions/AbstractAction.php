<?php

namespace pizzashop\commande\app\actions;

use DI\Container;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class AbstractAction
{
    public $container;

    public function __construct(Container $container)
    {

        $this->container = $container;
    }

    public abstract function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface;

}