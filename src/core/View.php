<?php

namespace app\core;

class View {
    public string $title = "My website";
    public function renderView($name, array $params = []) {
        $viewContent = $this->_render($name, $params);
        $layout = $this->_render('_app', $params);
        return str_replace('{{content}}', $viewContent, $layout);
    }
    protected function _render($name, $params) {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT."views/$name.php";
        return ob_get_clean();
    }
}