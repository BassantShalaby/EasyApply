<?php
namespace Framework;

class Session
{

    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        ;

    }
    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key ,$default = null){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    public static function has($key){
        return isset($_SESSION[$key]) ? true : false;
}

    public static function unset($key){
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
    }
    }

    public static function destroy(){
        session_unset();
        session_destroy();
    }
}