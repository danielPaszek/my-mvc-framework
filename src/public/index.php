<?php

require_once realpath('../../vendor/autoload.php');

use app\controllers\SiteController;
use app\core\Application;

$app = new Application();

$app->router->get('/', [SiteController::class, 'getHome']);
$app->router->get('/contact', [SiteController::class, 'getContact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);
$app->router->get('/login', [SiteController::class, 'getLogin']);
$app->router->post('/login', [SiteController::class, 'handleLogin']);
$app->router->get('/register', [SiteController::class, 'getRegister']);
$app->router->post('/register', [SiteController::class, 'handleRegister']);

$app->run();