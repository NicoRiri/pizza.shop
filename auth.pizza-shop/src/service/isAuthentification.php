<?php

namespace pizzashop\auth\api\service;

interface isAuthentification
{
    public function signIn($email, $password);
    public function validate($acces_token);
    public function refresh($accessToken, $refresh_token);
    public function signUp($email, $password);
    public function activate($token_activation);

}