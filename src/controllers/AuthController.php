<?php

use app\core\BaseController;
use app\core\Request;

class AuthController extends BaseController {
    public static function getLogin() {
        return self::render('login');
    }
    public static function getRegister() {
        return self::render('register');
    }
    public static function handleLogin(Request $req)
    {
        
    }
    public static function handleRegister(Request $req)
    {
        return 'handle register';
    }

}