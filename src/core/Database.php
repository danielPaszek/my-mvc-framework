<?php
namespace app\core;

use app\core\Application;

class Database {
    public \PDO $pdo;
    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    public function applyMigrations() {
        $this->createMigrationsTable();
        $applied = $this->getAppliedMigrations();
        $toSaveMigrations = [];

        $files = scandir(Application::$ROOT.'migrations');
        $todoMigrations = array_diff($files, $applied);
        foreach($todoMigrations as $migration) {
            if($migration === '.' || $migration === '..') continue;
            require_once Application::$ROOT.'migrations/'.$migration;

            $className = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $className();
            echo 'Apllying migration:'.$migration.PHP_EOL;
            $instance->up();
            echo 'Done'.PHP_EOL;
            $toSaveMigrations[] = $migration;
        }
        if(!empty($toSaveMigrations)) {
            $this->saveMigrations($toSaveMigrations);
        } else {
            echo "All migrations are applied!".PHP_EOL;
        }
    }
    public function saveMigrations(array $migrations) {
        $tosave = array_reduce($migrations, fn($acc, $el) => $acc."('$el'), " , '');
        $tosave = substr($tosave, 0, -2);
        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES $tosave");
        $statement->execute();
    }
    public function createMigrationsTable() {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        ");
    }
    public function getAppliedMigrations() {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }
    public static function prepare($sql) {
        return Application::$app->db->pdo->prepare($sql);
    }
}