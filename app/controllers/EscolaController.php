<?php

namespace App\Controllers;

use App\Models\Escola;
use Resources\Views\View;
use Routes\Router;

class EscolaController extends Controller
{
    public static function index()
    {
        $escolaView = new View('resources/views/escolas/index.php');
        $escolaView->with(['list' => Escola::all()], "POST")->redirect();
    }

    public static function store()
    {
        if(isset($_POST['escola_create']))
        {
            $escola = new Escola();

            $escola->setId((int) $_POST['escola_id']);
            $escola->setNome($_POST['escola_nome']);
            $escola->setEndereco($_POST['escola_endereco']);
            $escola->setCidade($_POST['escola_cidade']);
            $escola->setEstado($_POST['escola_estado']);
            $escola->setSituacao($_POST['escola_situacao']);

            $escola->save();
        }
        Router::route('escolas');
    }

    public static function edit()
    {

    }

    public static function destroy()
    {

    }
}