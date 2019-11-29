<?php

use Controllers\AlunoController;

$routes = [
    'alunos' => AlunoController::index(),
    'alunos/create' => AlunoController::store()
];
