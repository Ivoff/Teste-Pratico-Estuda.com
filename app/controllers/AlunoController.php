<?php

namespace Controllers;

use Resources\Views\View;
use Routes\Router;
use App\Models\Aluno\Aluno;

class AlunoController extends Controller
{
    public static function index()
    {
        $alunoView = new View('resources/views/alunos/index.php');
        $alunoView->with("list", Aluno::all())->redirect();
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
        Router::route("alunos");
    }

    public static function edit()
    {
        // TODO: Implement edit() method.
    }

    public static function destroy()
    {
        if(isset($_POST['destroy']))
        {
            $aluno = new Aluno();
            $aluno->read($_POST['id']);
            var_dump($aluno->getId());
            $aluno->delete();
        }
        echo " saiu?";
        Router::route("alunos");
    }
}
