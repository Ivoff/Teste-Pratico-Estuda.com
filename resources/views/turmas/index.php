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

    <a href="/turmas/view/create">Adicionar turmas</a>

    <table>
        <thead>
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
                        <td>
                            <form action="/turmas/more" method="GET">
                                <input type="hidden" name="turma_id" value="<?=$value['id']?>">
                                <button type="submit">mais</button>
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
