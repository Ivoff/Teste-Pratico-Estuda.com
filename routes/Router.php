<?php

namespace Routes;

class Router
{

    private $routes = [];

    public static function route($path)
    {
        if(strcmp($path, "/") != 0)
            $path = trim($path, "/");

        $router = new self();

        $router->routes = require 'routes.php';

        call_user_func($router->routes[$path]);
    }

}
