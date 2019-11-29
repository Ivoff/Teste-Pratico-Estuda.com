<?php

require $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

use Routes\Router;

$uri = $_SERVER['REQUEST_URI'];
Router::route($uri);