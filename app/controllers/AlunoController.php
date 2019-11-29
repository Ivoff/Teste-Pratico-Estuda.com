<?php

namespace Controllers;

use Routes\Router;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public static function index()
    {
        require 'resources/views/alunos/index.php';
    }

    public static function store()
    {
        if(isset($_POST['aluno_create']))
        {
            $aluno = new Aluno();
            $aluno->setNome($_POST['aluno_nome']);
            $aluno->setDatNasc($_POST['aluno_nasc']);
            $aluno->setEmail($_POST['aluno_email']);
            $aluno->setTelefone($_POST['aluno_telefone']);
            $aluno->setGenero($_POST['aluno_genero']);
            $aluno->save();
        }
    }

    public static function edit()
    {
        // TODO: Implement edit() method.
    }

    public static function destroy()
    {
        // TODO: Implement destroy() method.
    }
}
