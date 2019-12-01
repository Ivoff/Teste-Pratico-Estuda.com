<?php

namespace App\Controllers;

use App\Models\Escola;
use App\Models\Turma;
use Resources\Views\View;
use Routes\Router;

class TurmaController extends Controller
{
    public static function index()
    {
        $turmaView = new View('resources/views/turmas/index.php');
        $turmaView->with(['list' => Turma::all()], 'POST')->redirect();
    }

    public static function store()
    {
        if(isset($_POST['turma_create']))
        {
            $turma = new Turma();
            $escola = new Escola();

            $escola->read($_POST['turma_escola']);

            $turma->setEscola($escola);
            $turma->setId((int) $_POST['turma_id']);
            $turma->setAno($_POST['turma_ano']);
            $turma->setNivelEnsino($_POST['turma_nivelEnsino']);
            $turma->setSerie($_POST['turma_serie']);
            $turma->setTurno($_POST['turma_turno']);

            $turma->save();
        }
        Router::route('turmas');
    }

    public static function edit()
    {
        if(isset($_GET['edit']))
        {
            $turma = new Turma();
            $turma->read($_GET['edit_id']);

            $turmaView = new View('resources/views/turmas/index.php');
            $turmaView->with(['list' => Turma::all()], 'POST')
                ->with(['edit_data' => $turma], 'SESSION')
                ->redirect();
        }
    }

    public static function destroy()
    {
        if(isset($_POST['destroy']))
        {
            $turma = new Turma();
            $turma->read($_POST['destroy_id']);
            $turma->delete();
        }

        Router::route('turmas');
    }

    public static function escolaSearch()
    {
        if(isset($_GET['search']))
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

            $turmaView = new View('resources/views/turmas/index.php');
            $turmaView->with(["escola_list" => Escola::search($query)], "SESSION")
                    ->with(['list' => Turma::all()], "POST")
                    ->redirect();
        }
    }
}
