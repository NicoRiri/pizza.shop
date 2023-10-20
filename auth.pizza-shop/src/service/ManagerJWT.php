<?php

namespace pizzashop\auth\api\service;

use Exception;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;

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
    public function validateToken($token)
    {
        try {
            $payload = JWT::decode($token, new Key($this->secret, 'HS256'));
            return true;
        } catch (ExpiredException $expiredException) {
            throw new Exception("Token expiré");
        } catch (Exception $signatureInvalidException) {
            throw new Exception("Token invalide");
        }
    }

    public function getIdToken($token){
        $payload = JWT::decode($token, new Key($this->secret, 'HS256'));
        return $payload->uid;
    }

}