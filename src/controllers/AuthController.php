<?php

namespace app\controllers;

use app\core\BaseController;
use app\core\Request;
use app\models\RegisterModel;

class AuthController extends BaseController {
    public static function getLogin() {
        return self::render('login');
    }
    public static function getRegister() {
        $registerModel = new RegisterModel();
        return self::render('register', ['model' => $registerModel]);
    }
    public static function handleLogin(Request $req)
    {
        
    }
    public static function handleRegister(Request $req)
    {
        $registerModel = new RegisterModel();
        $registerModel->loadData(($req->getBody()));
        if($registerModel->validate()) {
            return 'Success';
        }
        return self::render('register', [
            'model' => $registerModel
        ]);
    }

}