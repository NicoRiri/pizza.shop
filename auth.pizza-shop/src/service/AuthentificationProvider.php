<?php

namespace pizzashop\auth\api\service;

use DateTime;
use pizzashop\auth\api\DTO\CoupleJWTDTO;
use pizzashop\auth\api\DTO\UsersDTO;
use pizzashop\auth\api\models\Users;
use Slim\Exception\HttpUnauthorizedException;

class AuthentificationProvider implements iAuthentificationProvider
{

    public function authCredentials(string $email, string $password) : bool
    {
        $res = Users::where('email', $email)->first();
        if ($res != null) {
            if (password_verify($password, $res->password)) {
                return true;
            }
        }
        return false;
    }

    public function authRefreshToken(string $token, string $refreshToken)
    {
        $jwt = new ManagerJWT();
        if ($jwt->validateToken($token)){
            $id = $jwt->getIdToken($token);
            $res = Users::where([
                ['id', $id],
                ['refresh_token', $refreshToken]
            ])->first();
            if ($res != null){
                $date = new DateTime();
                if ($res->refresh_token_expiration_date < $date)
                return true;
            }
        }
        return false;

    }

    public function getProfile(string $email)
    {
        $res = Users::where('email', $email)->first();
        return new UsersDTO($res->email, $res->active, $res->activation_token, $res->activation_token_expiration_date, $res->refresh_token, $res->refresh_token_expiration_date, $res->reset_passwd_token, $res->reset_passwd_token_expiration_date, $res->username);

    }

    public function registerNewUser()
    {
        // TODO: Implement registerNewUser() method.
    }

    public function activateAccount()
    {
        // TODO: Implement activateAccount() method.
    }
}