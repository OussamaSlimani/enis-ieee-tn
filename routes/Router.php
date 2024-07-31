<?php

class Router
{
    private $routes = [];

    public function addRoute($route, $controller, $method)
    {
        $this->routes[$route] = ['controller' => $controller, 'method' => $method];
    }

    public function execute()
    {
        // Get the URL from the query string parameter 'url'
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

        if (array_key_exists($url, $this->routes)) {
            $route = $this->routes[$url];
            $controllerName = $route['controller'];
            $methodName = $route['method'];

            require_once "controllers/$controllerName.php";

            $controller = new $controllerName();
            $controller->$methodName();
        }
    }
}
