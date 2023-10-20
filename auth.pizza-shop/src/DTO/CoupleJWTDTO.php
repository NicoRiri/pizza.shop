<?php

namespace pizzashop\auth\api\DTO;

class CoupleJWTDTO
{

    public string $accesToken;
    public string $refreshToken;

    /**
     * @param string $accesToken
     * @param string $refreshToken
     */
    public function __construct(string $accesToken, string $refreshToken)
    {
        $this->accesToken = $accesToken;
        $this->refreshToken = $refreshToken;
    }


}