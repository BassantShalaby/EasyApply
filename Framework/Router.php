<?php

namespace Framework;

class Router
{
    protected $routes = [];

  /**
   * Add a new route
   *
   * @param string $method
   * @param string $uri
   * @param string $action
//    * @param array $middleware
   * 
   * @return void
   */
//   public function registerRoute($method, $uri, $action, $middleware = [])
  public function registerRoute($method, $uri, $action)
  {
    list($controller, $controllerMethod) = explode('@', $action);

    // var_dump($controller);
    // var_dump($controllerMethod);
    // exit();
    $this->routes[] = [
      'method' => $method,
      'uri' => $uri,
      'controller' => $controller,
      'controllerMethod' => $controllerMethod,
    //   'middleware' => $middleware
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
                $controller = 'App\\Controllers\\'. $route['controller'];
                $controllerMethod = $route['controllerMethod'];
                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod();
                return;


                /////////  jobs ??????
                // $listing = new ListingController;
                // $listing->$controllerMethod();

            }
        }

        $this->error();


    }

}