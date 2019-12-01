<?php

namespace Controllers;

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
}
