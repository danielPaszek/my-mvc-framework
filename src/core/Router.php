<?php
namespace app\core;


class Router {
    protected array $routes = []; //['get' => [], 'post' => []]
    public Request $request;
    public Response $response;
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;   
        $this->response = $response;    
    }
    public function get($path, $cb) {
        $this->routes['get'][$path] = $cb;
    }
    public function post($path, $cb) {
        $this->routes['post'][$path] = $cb;
    }
    public function resolve() {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false) {
            $this->response->setStatusCode(404);
            return Application::$app->view->renderView('404');
        }
        // name of view file
        if(is_string($callback)) {
            return  Application::$app->view->renderView($callback);
        }
        return call_user_func($callback, $this->request);
    }
    
    // protected function getLayout() {
    //     ob_start();
    //     include_once Application::$ROOT."views/_app.php";
    //     return ob_get_clean();
    // }
    protected function getView(string $name) {
        ob_start();
        include_once Application::$ROOT."views/$name.php";
        return ob_get_clean();
    }

        
    
}