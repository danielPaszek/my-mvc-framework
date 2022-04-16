<?php

namespace app\controllers;

use app\core\BaseController;
use app\core\Request;
use app\models\User;

class AuthController extends BaseController {
    public static function getLogin() {
        return self::render('login');
    }
    public static function getRegister() {
        $user = new User();
        return self::render('register', ['model' => $user]);
    }
    public static function handleLogin(Request $req)
    {
        
    }
    public static function handleRegister(Request $req)
    {
        $user = new User();
        $user->loadData(($req->getBody()));
        if($user->validate()) {
            $user->save();
            return 'Success';
        }
        return self::render('register', [
            'model' => $user
        ]);
    }

}