<?php

namespace App\Controllers;

use App\Models\Aluno;
use App\Models\AlunoTurma;
use App\Models\Escola;
use App\Models\Turma;
use Resources\Views\View;

class AlunoTurmaController extends Controller
{
    public static function index()
    {
        if(isset($_GET['aluno_id']))
        {
            $aluno = new Aluno();
            $aluno->read($_GET['aluno_id']);

            session_destroy();
            session_start();

            $_SESSION['aluno'] = $aluno;

            $view = new View('resources/views/alunos/aluno_turmas.php');
            $view->with(['aluno' => $aluno])
                ->with(['turmas' => AlunoTurma::turmasFromAluno($_GET['aluno_id'])])
                ->redirect();
        }
    }

    public static function store()
    {
        if(isset($_POST['turmas_id']))
        {
            var_dump($_POST['turmas_id']);
        }
    }

    public static function escolaSearch()
    {
        if(isset($_GET['query']))
        {
            $nome = $_GET['query'];

            $query = null;

            $pieces = explode(' ', $nome);

            if (count($pieces) == 1) {
                $query = $pieces[0];
                $query = '+' . $query . '*';
            } else {
                for ($i = 0; $i < count($pieces); $i += 1) {
                    if ($i == count($pieces) - 1)
                        $query = $query . '+' . $pieces[$i];
                    else
                        $query = $query . '+' . $pieces[$i] . ' ';
                }
            }

            $turmaView = new View('resources/views/alunos/aluno_turmas.php');
            $turmaView->with(["escola_list" => Escola::search($query)])
                ->redirect();
        }
    }

    public static function getTurmas()
    {
        if(isset($_GET['escola_id']))
        {
            $view = new View('resources/views/alunos/aluno_turmas.php');
            $view->with(['turmas_list' => Escola::fetchTurmas($_GET['escola_id'])])
                ->redirect();
        }
    }

    public static function turmasFromAluno(){
        if(isset($_GET['aluno_id']))
        {
            //return AlunoTurma::turmasFromAluno($_GET['aluno_id']);
            return "asdasd";
        }
    }
}
