<?php

namespace App;

class Router
{
    private $routes;

    public function get($path, $callback)
    {
        $this->routes[] = new Route('GET', $path, $callback);
    }

    public function post()
    {
        $this->routes[] = new Route('POST', $path, $callback);
    }

    public function dispatch()
    {
        foreach ($this->routes as $route) {
            if ($route->math($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI'])) {
                return $route->run($_SERVER['REQUEST_URI']);
                break;
            }
        }
        throw new \App\Exception\NotFoundException("Маршрут не зарегистрирован");
    }
}