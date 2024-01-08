<?php

namespace pizzashop\auth\api\service;

use DateTime;
use pizzashop\auth\api\DTO\CoupleJWTDTO;
use pizzashop\auth\api\models\Users;
use Ramsey\Uuid\Uuid;

class sAuthentification implements isAuthentification
{

    public function signIn($email, $password)
    {
        $pro = new AuthentificationProvider();
        $jwt = new ManagerJWT();
        if ($pro->authCredentials($email, $password)){
            $aToken = $jwt->createToken($email);
            $refreshtoken = Uuid::uuid4();
            $date = new DateTime();
            $date->modify('+1 hour');
            Users::where('email', $email)->update(['refresh_token' => $refreshtoken]);
            Users::where('email', $email)->update(['refresh_token_expiration_date' => $date]);
            return new CoupleJWTDTO($aToken, $refreshtoken);
        }



    }

    public function validate($token)
    {
        $jwt = new ManagerJWT();
        $ap = new AuthentificationProvider();
        if ($jwt->validateToken($token)) {
            return $ap->getProfile($jwt->getIdToken($token));
        }
        return null;

    }

    public function refresh($refresh_token)
    {
        $jwt = new ManagerJWT();
        $ap = new AuthentificationProvider();
        $id = "";

        $res = Users::where('refresh_token', $refresh_token)->first();
        if ($res != null) {
            $date = new DateTime();
            if ($res->refresh_token_expiration_date > $date){
                throw new \Exception("Refresh token expiré");
            }
            $email = $res->email;
            $accessToken = $jwt->createToken($id);
            $refreshtoken = Uuid::uuid4();
            $date->modify('+1 hour');
            Users::where('email', $email)->update(['refresh_token' => $refreshtoken]);
            Users::where('email', $email)->update(['refresh_token_expiration_date' => $date]);
            return new CoupleJWTDTO($accessToken, $refreshtoken);
        }
        throw new \Exception("Pas le bon refresh token");
    }

    public function signUp($email, $password, $username)
    {
        $newUser = new Users();
        $newUser->email = $email;
        $newUser->password = $password;
        $newUser->username = $username;
        $newUser->save();
    }

    public function activate($token_activation)
    {
        // TODO: Implement activate() method.
    }
}