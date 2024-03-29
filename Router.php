<?php
class Router
{
    protected $routes = [];

    public function registerRoute($method, $uri, $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
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

    public function error($statusCode = 404)
    {
        http_response_code($statusCode);
        loadView("errors/$statusCode");
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                require basePath($route['controller']);
                return;
            }
        }

        $this->error();


    }

}