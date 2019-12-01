<?php

use Controllers\AlunoController;
use Controllers\HomeController;
use Controllers\TurmaController;

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
    },
    'alunos/edit' => function(){
        AlunoController::edit();
    },
    'alunos/search' => function(){
        AlunoController::search();
    },
    'turmas' => function(){
        TurmaController::index();
    },
    'turmas/create' => function(){
        TurmaController::store();
    },
    'turmas/destroy' => function(){
        TurmaController::destroy();
    },
    'turmas/edit' => function(){
        TurmaController::edit();
    }
];
