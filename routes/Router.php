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

    public static function doGet($path){
        $uri = explode('?', $path)[0];

        $paramsRaw = explode('?', $path)[1];
        $paramsRaw = explode('&', $paramsRaw);
        $paramsRaw = explode('=', $paramsRaw);

        for($i = 0; $i < sizeof($paramsRaw) - 2; $i += 2)
        {
            $_GET[$paramsRaw[$i]] = $paramsRaw[$i+1];
        }

        if(strcmp($uri, "/") != 0)
            $path = trim($uri, "/");

        require 'routes.php';

        if(key_exists($path, $routes))
            call_user_func($routes[$path]);
        else
            die("Rota nao existe");
    }

}