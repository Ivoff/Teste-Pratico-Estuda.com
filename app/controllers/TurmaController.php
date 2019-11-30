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

            $turma->setAno($_POST['turma_ano']);
            $turma->setNivelEnsino($_POST['turma_nivelEnsino']);
            $turma->setSerie($_POST['turma_serie']);
            $turma->setEscola($_POST['turma_turno']);

            $turma->save();
        }
        Router::route('turmas');
    }

    public static function edit()
    {
        //TODO: implement this controller
    }

    public static function destroy()
    {
        //TODO: implement this controller
    }
}
