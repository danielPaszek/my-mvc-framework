<?php

namespace app\core\form;

use app\core\Model;

class Field {
    public Model $model;
    public string $name;
    public string $label;
    public string $type;
    public string $classes;
    
    public function __construct(Model $model, string $name)
    {
        $this->model = $model;
        $this->name = $name;
        $this->type = 'text';
        $this->label = $name;
    }
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
    public function setLabel(string $label)
    {
        $this->label = $label;
        return $this;
    }
    public function setClasses(string $classes) {
        $this->classes = $classes;
        return $this;
    }
    public function __toString()
    {
        $isError = $this->model->hasError($this->name) ? ' is-invalid' : '';
        return sprintf('
            <div class="form-group">
                <label>%s</label>
                <input type="%s" class="form-control %s" name="%s" value="%s">
                <div class="invalid-feedback">
                    %s
                </div>
            </div>
        ',$this->label, $this->type, $isError, $this->name, $this->model->{$this->name}, $this->model->getFirstError($this->name));
    }

}