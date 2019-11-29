<?php

namespace Routes;

class Router
{
    public static function route($path)
    {
        if(strcmp($path, "/") != 0)
            $path = trim($path, "/");

        require 'routes.php';

        if(key_exists($path, $routes))
            call_user_func($routes[$path]);
        else
            die("Rota nao existe");
    }

}
