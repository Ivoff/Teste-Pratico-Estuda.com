<?php

use App\Controllers\AlunoController;
use App\Controllers\AlunoTurmaController;
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
    'alunos/view/create' => function(){
        require 'resources/views/alunos/register.php';
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
    'alunos/turmas' => function(){
        AlunoTurmaController::index();
    },
    'alunos/turmas/create' => function(){
        AlunoTurmaController::store();
    },
    'alunos/turmas/search' => function(){
        AlunoTurmaController::escolaSearch();
    },
    'alunos/escola/destroy' => function(){
        AlunoTurmaController::destroy();
    },
    'alunos/escola/turmas' => function(){
        AlunoTurmaController::getTurmas();
    },
    'turmas' => function(){
        TurmaController::index();
    },
    'turmas/view/create' => function(){
        require 'resources/views/turmas/register.php';
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
    'turmas/more' => function(){
        AlunoTurmaController::getAlunos();
    },
    'escolas' => function(){
        EscolaController::index();
    },
    'escolas/view/create' => function(){
        require 'resources/views/escolas/register.php';
    },
    'escolas/more' => function(){
        EscolaController::more();
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
    },
    'resources/js/jquery' => function(){
        require 'resources/assets/js/jquery-3.4.1.min.js';
    },
];
