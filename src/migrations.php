<?php
use app\core\Application;

require_once realpath('../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(realpath('../'));
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
        ]
    ];

$app = new Application(__DIR__.'/',$config);

$app->db->applyMigrations();

// $app->run();