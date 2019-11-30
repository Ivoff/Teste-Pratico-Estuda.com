<?php

use Controllers\AlunoController;
use Controllers\HomeController;

$routes = [
    '/' => function(){
        HomeController::index();
    },
    'alunos' => function(){
        AlunoController::index();
    },
    'alunos/create' => function(){
        AlunoController::store();
    },
    'alunos/destroy' => function(){
        AlunoController::destroy();
    }
];
