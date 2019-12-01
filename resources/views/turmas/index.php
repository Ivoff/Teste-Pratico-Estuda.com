<!DOCTYPE HTML>

<?php

    if(isset($_POST['turma_create']) or isset($_POST['destroy']))
    {
        header("Location: /turmas");
        return;
    }
    elseif (isset($_SESSION['edit_data']) or isset($_SESSION['escola_list']))
    {
        session_destroy();
    }

?>

<html>
<head>
    <script src="/resources/js/jquery"></script>
    <title>Turmas</title>
</head>
<body>

    <form>
        <input type="hidden" name="search" value="true">
        Busca<input type="text" name="query" autocomplete="false">
        <button type="submit">buscar</button>
    </form>

    <br/>

    <form action="/turmas/escolas/search" method="GET">
        <input type="hidden" name="search" value="true">
        Busca Escola<input type="text" name="query" placeholder="search">
        <button type="submit">buscar</button>
    </form>

    <?php
        if(isset($_SESSION['escola_list'])) {
            ?>
            <table id="escolas">
                <thead>
                    <th>Nome</th>
                    <th>Endereco</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Situacao</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                        foreach ($_SESSION['escola_list'] as $value) {
                            ?>
                            <tr>
                                <td><?=$value['nome']?></td>
                                <td><?=$value['endereco']?></td>
                                <td><?=$value['cidade']?></td>
                                <td><?=$value['estado']?></td>
                                <td><?=$value['situacao']?></td>
                                <td>
                                    <input type="radio"  name="selected" id="selected" value="<?=$value['id']?>">
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

    <form action="/turmas/create" METHOD="POST">
        <input type="hidden" name="turma_create" value="true">

        <input type="hidden" name="turma_escola" id="turma_escola">

        <input type="hidden" name="turma_id" id="turma_id"
               value="<?= isset($_SESSION['edit_data']) ? $_SESSION['edit_data']->getId() : "" ?>">

        <div>
            <label for="turma_ano">Ano</label>
            <input type="text" name="turma_ano" id="turma_ano" required
                   value="<?= isset($_SESSION['edit_data']) ? $_SESSION['edit_data']->getAno() : "" ?>">
        </div>

        <div>
            <label for="turma_nivelEnsino">Nivel de Ensino</label>
            <input type="text" name="turma_nivelEnsino" id="turma_nivelEnsino" required
                   value="<?= isset($_SESSION['edit_data']) ? $_SESSION['edit_data']->getNivelEnsino() : "" ?>">
        </div>

        <div>
            <label for="turma_serie">Serie</label>
            <input type="text" name="turma_serie" id="turma_serie" required
                   value="<?= isset($_SESSION['edit_data']) ? $_SESSION['edit_data']->getSerie() : "" ?>">
        </div>

        <div>
            <label for="turma_turno">Turno</label>
            <input type="text" name="turma_turno" id="turma_turno" required
                   value="<?= isset($_SESSION['edit_data']) ? $_SESSION['edit_data']->getTurno() : "" ?>">
        </div>

        <button type="submit" id="create_button">enviar</button>
    </form>

    <table>
        <thead>
            <th>Escola</th>
            <th>Ano</th>
            <th>Nivel de Ensino</th>
            <th>Serie</th>
            <th>Turno</th>
            <th colspan="2"></th>
        </thead>
        <tbody>
            <?php
                foreach ($_POST['list'] as $value){
            ?>
                    <tr>
                        <td><?=$value['escola']->getNome()?></td>
                        <td><?=$value['ano']?></td>
                        <td><?=$value['nivel_ensino']?></td>
                        <td><?=$value['serie']?></td>
                        <td><?=$value['turno']?></td>
                        <td>
                            <form action="/turmas/destroy" method="POST">
                                <input type="hidden" name="destroy" value="true">
                                <input type="hidden" name="destroy_id" value="<?=$value['id']?>">
                                <button type="submit">excluir</button>
                            </form>
                        </td>
                        <td>
                            <form action="/turmas/edit" method="GET">
                                <input type="hidden" name="edit" value="true">
                                <input type="hidden" name="edit_id" value="<?=$value['id']?>">
                                <button type="submit">editar</button>
                            </form>
                        </td>
                    </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

    <script>
        $(document).ready(() => {
            $('#create_button').on('click', function(){
                var selected = $('input[name=selected]:checked').val();
                $('#turma_escola').val(selected);
            });
        })
    </script>

</body>
</html>
