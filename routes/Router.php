<?php

namespace Routes;

class Router
{
    private $routes = [];

    public static function route($path)
    {
        $router = new self();
        call_user_func($router->routes[$path]);
    }

}
