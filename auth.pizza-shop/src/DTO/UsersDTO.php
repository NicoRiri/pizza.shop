<?php

namespace pizzashop\auth\api\DTO;

class UsersDTO
{

    public $email;
    public $active;
    public $activation_token;
    public $activation_token_expiration_date;
    public $refresh_token;
    public $refresh_token_expiration_date;
    public $reset_passwd_token;
    public $reset_passwd_token_expiration_date;
    public $username;

    /**
     * @param $email
     * @param $active
     * @param $activation_token
     * @param $activation_token_expiration_date
     * @param $refresh_token
     * @param $refresh_token_expiration_date
     * @param $reset_passwd_token
     * @param $reset_passwd_token_expiration_date
     * @param $username
     */
    public function __construct($email, $active, $activation_token, $activation_token_expiration_date, $refresh_token, $refresh_token_expiration_date, $reset_passwd_token, $reset_passwd_token_expiration_date, $username)
    {
        $this->email = $email;
        $this->active = $active;
        $this->activation_token = $activation_token;
        $this->activation_token_expiration_date = $activation_token_expiration_date;
        $this->refresh_token = $refresh_token;
        $this->refresh_token_expiration_date = $refresh_token_expiration_date;
        $this->reset_passwd_token = $reset_passwd_token;
        $this->reset_passwd_token_expiration_date = $reset_passwd_token_expiration_date;
        $this->username = $username;
    }


}