<?php

require $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

use Routes\Router;

$uri = $_SERVER['REQUEST_URI'];

if(strpos($uri, "?") !== false)
{
    Router::doGet($uri);
}
else
    Router::route($uri);