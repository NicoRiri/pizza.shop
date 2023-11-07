<?php

namespace pizzashop\shop\app\actions;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpUnauthorizedException;

class SignInAction extends AbstractAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $auth = $request->getHeader("Authorization");
        $idmdp = explode(" ", $auth[0]);
        $idmdp = base64_decode($idmdp[1]);
        $idmdp = explode(":", $idmdp);
        $mail = $idmdp[0];
        $mdp = $idmdp[1];

        $client = new Client();
        try {
            $res = $client->request('POST', "http://api.pizza-auth/api/users/signin", ['auth' => [$mail, $mdp]]);
            $res = $res->getBody()->getContents();
            $res = json_decode($res, true);
            $response->getBody()->write("Vous êtes connectés, votre access token est : ".$res["accesToken"].", votre refresh token est ".$res["accesToken"]);
        } catch (ClientException $e){
            throw new HttpUnauthorizedException($request, "Ces informations auront pas permis de vous authentifier");
        }
        return $response;
    }
}