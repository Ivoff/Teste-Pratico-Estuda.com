<!DOCTYPE HTML>

<?php

    if(isset($_POST['turma_create']) or isset($_POST['destroy']))
    {
        header("Location: /turmas");
        return;
    }

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="/resources/css/bootstrap">
    <link rel="stylesheet" type="text/css" href="/resources/css/index">
    <script src="/resources/js/jquery"></script>
    <title>Turmas</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark row">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav col">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="alunos">Alunos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="escolas">Escolas</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="turmas">Turmas</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">

        <p class="text-center"><a class="btn btn-outline-success" href="/turmas/view/create">Adicionar turmas</a></p>

    <?php
    if(!empty($list)){
    ?>
        <table class="table shadow">
            <thead class="thead-dark">
                <th>Escola</th>
                <th>Ano</th>
                <th>Nivel de Ensino</th>
                <th>Serie</th>
                <th>Turno</th>
                <th colspan="3"></th>
            </thead>
            <tbody>
                <?php
                    foreach ($list as $value){
                ?>
                        <tr>
                            <td><?=$value['escola']->getNome()?></td>
                            <td><?=$value['ano']?></td>
                            <td><?=$value['nivel_ensino']?></td>
                            <td><?=$value['serie']?></td>
                            <td><?=$value['turno']?></td>
                            <td>
                                <form action="/turmas/edit" method="GET">
                                    <input type="hidden" name="edit" value="true">
                                    <input type="hidden" name="edit_id" value="<?=$value['id']?>">
                                    <button class="btn btn-outline-info" type="submit">editar</button>
                                </form>
                            </td>
                            <td>
                                <form action="/turmas/more" method="GET">
                                    <input type="hidden" name="turma_id" value="<?=$value['id']?>">
                                    <button class="btn btn-outline-primary" type="submit">mais</button>
                                </form>
                            </td>
                            <td>
                                <form action="/turmas/destroy" method="POST">
                                    <input type="hidden" name="destroy" value="true">
                                    <input type="hidden" name="destroy_id" value="<?=$value['id']?>">
                                    <button class="btn btn-outline-danger" type="submit">excluir</button>
                                </form>
                            </td>
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <?php
        }
        ?>
    </div>
</body>
</html>
