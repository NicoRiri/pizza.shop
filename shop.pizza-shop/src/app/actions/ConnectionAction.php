<?php

namespace pizzashop\shop\app\actions;

class ConnectionAction extends AbstractAction {

    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args){
        
        $html = "<h1>Connexion</h1>
                <form>
                    <input type='text' name='username' placeholder='username'>
                    <input type='password' name='password' placeholder='password'>
                    <input type='submit' value='Valider'>
                </form>";
            
        $response->getBody()->write($html);

        return $response;
    }
}