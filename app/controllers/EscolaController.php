<?php

namespace App\Controllers;

use App\Models\Escola;
use App\Models\Turma;
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
        if(isset($_GET['edit']))
        {
            $escola = new Escola();
            $escola->read($_GET['edit_id']);

            $escolaView = new View('resources/views/escolas/index.php');
            $escolaView->with(['list' => Escola::all()], "POST")
                ->with(['edit_data' => $escola], "SESSION")
                ->redirect();
        }
    }

    public static function destroy()
    {
        if(isset($_POST['destroy']))
        {
            $escola = new Escola();
            $escola->read($_POST['destroy_id']);
            $escola->delete();
        }
        Router::route('escolas');
    }

    public static function search()
    {
        if(isset($_GET['query']))
        {
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

            if(isset($_GET['search']))
            {
                $escolaView = new View('resources/views/escolas/index.php');
                $escolaView->with(["list" => Escola::search($query)], "POST")
                    ->redirect();
            }
            elseif(isset($_GET['turma_search']))
            {
                $turmaView = new View('resources/views/turmas/index.php');
                $turmaView->with(["escola_list" => Escola::search($query)], "SESSION")
                    ->with(['list' => Turma::all()], "POST")
                    ->redirect();
            }
        }
    }
}