<?php
namespace app\core;

class BaseController {
    public static function render($view, $params = []) {
        return Application::$app->view->renderView($view, $params);
    }
}