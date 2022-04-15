<?php
use app\controllers\SiteController;
use app\controllers\AuthController;
use app\core\Application;

require_once realpath('../../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(realpath('../../'));
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']

        ]
    ];

$app = new Application(dirname(__DIR__).'/',$config);

$app->router->get('/', [SiteController::class, 'getHome']);
$app->router->get('/contact', [SiteController::class, 'getContact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);
$app->router->get('/login', [AuthController::class, 'getLogin']);
$app->router->post('/login', [AuthController::class, 'handleLogin']);
$app->router->get('/register', [AuthController::class, 'getRegister']);
$app->router->post('/register', [AuthController::class, 'handleRegister']);

$app->run();