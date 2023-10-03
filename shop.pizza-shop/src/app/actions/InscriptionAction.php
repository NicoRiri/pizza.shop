<?php

namespace pizzashop\shop\app\actions;

class InscriptionAction extends AbstractAction
{
    public function __invoke($request, $response, $args): \Psr\Http\Message\ResponseInterface
    {
        $html = "<h1>Inscription</h1>
                <form>
                    <input type='text' name='username' placeholder='username'>
                    <input type='password' name='password' placeholder='password'>
                    <input type='text' name='email' placeholder='email'>
                    <input type='submit' value='Valider'>
                </form>";
            
        $response->getBody()->write($html);
        return $response;
    }
}
