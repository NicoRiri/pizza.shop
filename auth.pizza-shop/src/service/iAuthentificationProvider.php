<?php

namespace pizzashop\auth\api\service;

interface iAuthentificationProvider
{
    public function authCredentials(string $email, string $password);
    public function authRefreshToken(string $token, string $refreshToken);
    public function getProfile(string $id);
    public function registerNewUser();
    public function activateAccount();

}