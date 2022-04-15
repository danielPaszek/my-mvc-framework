<?php
namespace app\core;


class Application {
    public static $ROOT;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public View $view;
    public static Application $app;
    public function __construct(string $root, array $config)
    {
        self::$ROOT = $root;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();
        $this->db = new Database($config['db']);
        self::$app = $this;
    }
    public function run() {
        echo $this->router->resolve();
    }
}