<?php

namespace pizzashop\shop\app\actions;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class AbstractAction
{
    public abstract function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface;

}