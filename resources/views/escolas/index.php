<!DOCTYPE HTML>

<?php
    if(isset($_POST['destroy']) or isset($_POST['escola_create']))
    {
        header("Location: /escolas");
        return;
    }
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="/resources/css/bootstrap">
    <link rel="stylesheet" type="text/css" href="/resources/css/index">
    <script src="/resources/js/jquery"></script>
    <title>Escolas</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark row">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav col">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="turmas">Turmas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="alunos">Alunos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="escolas">Escolas</a>
                </li>
            </ul>

            <form class="form-inline col d-flex flex-row-reverse" action="/escolas/search" method="GET">
                <input type="hidden" name="search" value="true">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                <input class="form-control mr-sm-2" type="text" name="query" placeholder="Escola" aria-label="Search">
            </form>
        </div>
    </nav>

    <div class="container">
        <p class="text-center"><a class="btn btn-outline-success" href="/escolas/view/create">Adicionar escolas</a></p>
        <table class="table border shadow">
            <thead>
                <th>Nome</th>
                <th>Endereco</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Situacao</th>
                <th>Alunos</th>
                <th colspan="3"></th>
            </thead>
            <tbody>
                <?php
                    foreach ($list as $value){
                ?>
                        <tr>
                            <td><?=$value['escola']['nome']?></td>
                            <td><?=$value['escola']['endereco']?></td>
                            <td><?=$value['escola']['cidade']?></td>
                            <td><?=$value['escola']['estado']?></td>
                            <td><?=$value['escola']['situacao']?></td>
                            <td><?=!empty($value['qnt_alunos']) ?
                                    $value['qnt_alunos'] : "0"?></td>
                            <td>
                                <form action="/escolas/edit" method="GET">
                                    <input type="hidden" name="edit" value="true">
                                    <input type="hidden" name="edit_id" value="<?=$value['escola']['id']?>">
                                    <button class="btn btn-outline-info" type="submit">editar</button>
                                </form>
                            </td>
                            <td>
                                <form action="/escolas/more" method="GET">
                                    <input type="hidden" name="escola_id" value="<?=$value['escola']['id']?>">
                                    <button class="btn btn-outline-primary" type="submit">mais</button>
                                </form>
                            </td>
                            <td>
                                <form action="/escolas/destroy" method="POST">
                                    <input type="hidden" name="destroy" value="true">
                                    <input type="hidden" name="destroy_id" value="<?=$value['escola']['id']?>">
                                    <button class="btn btn-outline-danger" type="submit">excluir</button>
                                </form>
                            </td>
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
