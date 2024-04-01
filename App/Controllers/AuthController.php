<?php
namespace App\Controllers;
use Framework\Session;
class AuthController {
    function Index()
    {
        view("auth/type");
    }

    public function Logout(){
            Session::destroy();

            $params = session_get_cookie_params();
            setcookie('PHPSESSID' ,'',time() , - 86400,$params['path'] , $params['domain']);
            header("Location:/");
            exit;

    }
}