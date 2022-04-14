<?php
namespace app\core;


class Application {
    public static $ROOT;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public function __construct()
    {
        self::$ROOT = realpath('../').'/';
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        self::$app = $this;
    }
    public function run() {
        echo $this->router->resolve();
    }
}