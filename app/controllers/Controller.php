<?php

namespace App\Controllers;

use Resources\Views\View;
use Routes\Router;

abstract class Controller
{

//    private $index;
//
//    public function __construct($indexUrl)
//    {
//        $this->index = new View($indexUrl);
//    }

    public static function index(){}
    public static function store(){}
    public static function edit(){}
    public static function destroy(){}

//    public static function returnTo($url)
//    {
//        Router::route($url);
//    }
}
