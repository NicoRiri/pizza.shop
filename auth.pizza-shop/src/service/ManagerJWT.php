<?php

namespace pizzashop\auth\api\service;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ManagerJWT
{
    private $secret = "grgr";


    public function createToken($user): string
    {
        $payload = [
            'iss'=>'localhost',
            'iat'=>time(), 'exp'=>time()+3600,
            'uid' => $user
        ] ;
        return JWT::encode( $payload, $this->secret, 'HS256');
    }

    /**
     * @throws Exception
     */
    public function validateToken($token) {
        try {
            $payload = JWT::decode($token, new Key($this->secret, 'HS256'));
            if (time() > $payload->exp) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function getIdToken($token){
        $payload = JWT::decode($token, new Key($this->secret, 'HS256'));
        return $payload->uid;
    }

}