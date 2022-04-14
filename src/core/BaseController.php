<?php
namespace app\core;

class BaseController {
    public static function render($view, $params = []) {
        return Application::$app->router->renderView($view, $params);
    }
}