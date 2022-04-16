<?php
namespace app\core;

abstract class DBModel extends Model {
    abstract public function tableName(): string;
    abstract public function columns(): array;
    public function save() {
        $tableName = $this->tableName();
        $columns = $this->columns();
        $params = array_map(fn($col) => ":$col", $columns);
        $statement = self::prepare("INSERT INTO $tableName 
        (".implode(', ', $columns).") VALUES (".
        implode(', ',$params) .")");
        foreach ($columns as $col) {
            $statement->bindValue(":$col", $this->{$col});
        }
        var_dump($statement);
        $statement->execute();
        return true;
    }
    public static function prepare($sql) {
        return Application::$app->db->pdo->prepare($sql);
    }
}