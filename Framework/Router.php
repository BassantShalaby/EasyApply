<?php
namespace Framework;

use App\Controllers\ErrorController;
use Framework\Middleware\Authorize;;

class Router
{
    protected $routes = [];
    public function registerRoute($method, $uri, $action , $middleware = [])
    {
        list($controller, $controllerMethod) = explode('@', $action);
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod,
            'middleware' => $middleware
        ];
    }

    public function get($uri, $controller , $middleware =[])
    {
        $this->registerRoute('GET', $uri, $controller , $middleware);

    }
    public function post($uri, $controller )
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

    public function route($uri, $method)
    {

        foreach ($this->routes as $route) {
            foreach ($route['middleware'] as $middleware) {
                // (new Authorize())->handle($middleware);
            }
            if ($route['uri'] === $uri && $route['method'] === $method) {
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