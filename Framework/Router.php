<?php
namespace Framework;

use App\Controllers\ErrorController;

class Router
{
    protected $routes = [];
    public function registerRoute($method, $uri, $action)
    {
        list($controller, $controllerMethod) = explode('@', $action);
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod,
        ];
    }

    public function get($uri, $controller)
    {
        $this->registerRoute('GET', $uri, $controller);

    }
    public function post($uri, $controller)
    {
        $this->registerRoute('POST', $uri, $controller);

    }
    public function put($uri, $controller)
    {
        $this->registerRoute('PUT', $uri, $controller);
    }
    public function delete($uri, $controller)
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }

    public function route($uri)
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if ($requestMethod === 'POST' && isset($_POST['_method'])) {
            $requestMethod = strtoupper($_POST['_method']);
        }

        // dd($requestMethod);
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $requestMethod) {
                $controller = 'App\\Controllers\\' . $route['controller'];
                $controllerMethod = $route['controllerMethod'];
                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod();
                return;
            }
        }

        ErrorController::notFound();
    }

}