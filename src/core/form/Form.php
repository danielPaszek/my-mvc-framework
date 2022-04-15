<?php
namespace app\core\form;

use app\core\Model;

class Form {
    public function begin($action, $method, $options = [] ) {
        $attributes = [];
        foreach ($options as $key => $value) {
            $attributes[] = "$key=\"$value\"";
        }
        echo sprintf('<form action="%s" method="%s" %s>', $action, $method, implode(" ", $attributes));
        return $this;
    }
    public function end() {
        echo '</form>';
    }
    public function field(Model $model, $attributes) {
        return new Field($model, $attributes);
    }
}