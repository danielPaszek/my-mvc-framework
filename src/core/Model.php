<?php
namespace app\core;

abstract class Model {
    public const RULE_REQUIRED = 'req';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';

    public array $errors = [];

    public function loadData($data) {
        foreach($data as $key => $value) {
            if(property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
    abstract public function rules(): array;
    public function validate() {
        foreach($this->rules() as $name => $rules) {
            $value = $this->{$name};
            foreach($rules as $rule) {
                $ruleName = $rule;
                if(!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }
                if($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($name, self::RULE_REQUIRED);
                }
                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($name, self::RULE_EMAIL);
                }
                if($ruleName === self::RULE_MIN && strlen($value) < $rule[1]) {
                    $this->addError($name, self::RULE_MIN, $rule[1]);
                }
                if($ruleName === self::RULE_MAX && strlen($value) > $rule[1]) {
                    $this->addError($name, self::RULE_MIN, $rule[1]);
                }
                if($ruleName === self::RULE_MATCH && $value !== $this->{$rule[1]}) {
                    $this->addError($name, self::RULE_MATCH, $rule[1]);
                }
            }
        }
        return empty($this->errors);
    }
    public function addError(string $attr, string $rule, $param = null) {
        //null overrides default value
        if($param)
        $this->errors[$attr][] = $this->getErrorMsg($rule, $param);
        else $this->errors[$attr][] = $this->getErrorMsg($rule);
    }
    public function getErrorMsg(string $rule, $param = '') {
        return match($rule) {
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This field must be valid email address',
            self::RULE_MATCH => "This field must be the same as $param",
            self::RULE_MAX => "Max length of this filed is $param",
            self::RULE_MIN => "Min length of this filed is $param",
            self::RULE_UNIQUE => "This $param must be unique"
        };
    }
    public function getFirstError($attribute)
    {
        $errors = $this->errors[$attribute] ?? [];
        return $errors[0] ?? '';
    }
    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }
}