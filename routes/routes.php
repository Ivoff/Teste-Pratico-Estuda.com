<?php

use Controllers\AlunoController;
use Controllers\HomeController;

$routes = [
    '/' => HomeController::index(),
    'alunos' => AlunoController::index(),
    'alunos/create' => AlunoController::store()
];
