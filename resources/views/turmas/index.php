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
    <title>Turmas</title>
</head>
<body>

    <form>
        <input type="hidden" name="search" value="true">
        Busca<input type="text" name="query" autocomplete="false">
        <button type="submit">buscar</button>
    </form>

    <br/>

    <form action="/turmas/create" METHOD="POST">
        <input type="hidden" name="turma_create" value="true">

        <div>
            <label for="turma_ano">Ano</label>
            <input type="text" name="turma_ano" id="turma_ano">
        </div>

        <div>
            <label for="turma_nivelEnsino">Nivel de Ensino</label>
            <input type="text" name="turma_nivelEnsino" id="turma_nivelEnsino">
        </div>

        <div>
            <label for="turma_serie">Serie</label>
            <input type="text" name="turma_serie" id="turma_serie">
        </div>

        <div>
            <label for="turma_turno">Turno</label>
            <input type="text" name="turma_turno" id="turma_turno">
        </div>

        <button type="submit">enviar</button>
    </form>

    <table>
        <thead>
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
                            <form>
                                <input type="hidden" name="edit" value="">
                            </form>
                        </td>
                    </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

</body>
</html>
