<?php

namespace pizzashop\shop\app\actions;

class InscriptionProcessAction extends AbstractAction {

    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args){
        //TODO: Enregistrement dans la bdd
        return $response;
    }
}