<?php

use App\Controllers\AlunoController;
use App\Controllers\EscolaController;
use App\Controllers\HomeController;
use App\Controllers\TurmaController;

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
    },
    'turmas/escolas/search' => function(){
        TurmaController::escolaSearch();
    },
    'escolas' => function(){
        EscolaController::index();
    },
    'escolas/create' => function(){
        EscolaController::store();
    },
    'escolas/destroy' => function(){
        EscolaController::destroy();
    },
    'escolas/edit' => function(){
        EscolaController::edit();
    },
    'escolas/search' => function(){
        EscolaController::search();
    }
];
