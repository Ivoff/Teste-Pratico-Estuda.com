<?php

namespace App\Controllers;

use App\Models\Escola;
use Resources\Views\View;

class EscolaController extends Controller
{
    public static function index()
    {
        $escolaView = new View('resources/views/escolas/index.php');
        $escolaView->with(['list' => Escola::all()], "POST")->redirect();
    }

    public static function store()
    {

    }

    public static function edit()
    {

    }

    public static function destroy()
    {

    }
}