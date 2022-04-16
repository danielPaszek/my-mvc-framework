<?php
namespace app\models;

use app\core\DBModel;

class User extends DBModel {
    public const STATUS_INACTIVE = 0;
    public const STATUS_ACTIVE = 1;
    public const STATUS_DELETED = 2;
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';
    public int $status = self::STATUS_INACTIVE;

    public function tableName(): string {
        return 'users'; 
    }
    public function columns(): array
    {
        return [
            'firstname', 'lastname', 'email', 'password'
        ];
    }
    public function save() {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        return parent::save();
    }

    public function rules(): array {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MAX, 20], [self::RULE_MIN, 8]],
            'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'password']]
        ];
    }

}