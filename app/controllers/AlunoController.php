<?php

namespace App\Controllers;

use Resources\Views\View;
use Routes\Router;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public static function index()
    {
        //'resources/views/alunos/index.php'
        $alunoView = new View('resources/views/alunos/index.php');
        $alunoView->with(["list" => Aluno::all()], "POST")->redirect();
    }

    public static function store()
    {
        if(isset($_POST['aluno_create']))
        {
            $aluno = new Aluno();

            $aluno->setId((int) $_POST['aluno_id']);
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
        if(isset($_GET['edit']))
        {
            $aluno = new Aluno();
            $aluno->read($_GET['edit_id']);

            $alunoView = new View('resources/views/alunos/register.php');
            $alunoView->with(['edit_data' => $aluno], "SESSION")->redirect();
        }
    }

    public static function destroy()
    {
        if(isset($_POST['destroy']))
        {
            $aluno = new Aluno();
            $aluno->read($_POST['destroy_id']);
            $aluno->delete();
        }
        Router::route("alunos");
    }

    public static function search()
    {
        if(isset($_GET['search'])) {
            $nome = $_GET['query'];

            $query = null;

            $pieces = explode(' ', $nome);

            if(count($pieces) == 1)
            {
                $query = $pieces[0];
                $query = '+'.$query.'*';
            }
            else
            {
                for($i = 0; $i < count($pieces); $i += 1)
                {
                    if($i == count($pieces)-1)
                        $query = $query . '+' . $pieces[$i];
                    else
                        $query = $query . '+' . $pieces[$i] . ' ';
                }
            }

            $alunoView = new View('resources/views/alunos/index.php');
            $alunoView->with(["list" => Aluno::search($query)], "POST")->redirect();
        }
    }
}
