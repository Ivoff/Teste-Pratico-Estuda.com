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

            $view = new View('resources/views/alunos/aluno_turmas.php');
            $view->with(['turmas' => AlunoTurma::turmasFromAluno($_GET['aluno_id'])], 'SESSION')
                ->with(['aluno' => $aluno], 'SESSION')
                ->redirect();
        }
    }

    public static function store()
    {
        //if(isset($_POST[]))
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
            $turmaView->with(["escola_list" => Escola::search($query)], "SESSION")
                ->redirect();
        }
    }
}
