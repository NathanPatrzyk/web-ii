<?php

use class\Login as Login;
use api\Login as LoginApi;

class Sistema
{
    public function realizaLogin($usuario, $senha)
    {
        $login = new Login();
    }

    public function realizaLoginApi($email, $senha)
    {
        $login = new LoginApi();
    }
}
