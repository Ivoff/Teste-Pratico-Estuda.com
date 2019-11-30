<?php

use App\Models\Turma;
use Controllers\Controller;
use Resources\Views\View;

class TurmaController extends Controller
{
    public static function index()
    {
        $turmaView = new View('resources/views/turmas/index.php');
        $turmaView->with(['list' => Turma::all()], 'POST')->redirect();
    }

    public static function store()
    {
        //TODO: implement this controller
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
