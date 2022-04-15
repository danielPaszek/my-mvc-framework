<?php

namespace app\controllers;

use app\core\BaseController;
use app\core\Request;

class SiteController extends BaseController {
    public static function handleContact(Request $req) {
        $body = $req->getBody();
        return var_dump($body);
    }
    public static function getContact() {
        $params = [
            'hello' => 'world'
        ];
        return self::render('contact', $params);
    }
    public static function getHome() {
        $params = [
            'hello' => 'world'
        ];
        return self::render('home', $params);
    }
}