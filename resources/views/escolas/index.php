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
    <title>Escolas</title>
</head>
<body>
    <form action="/escolas/search" method="GET">
        <input type="hidden" name="search" value="true">
        Busca<input type="text" name="query" autocomplete="false">
        <button type="submit">buscar</button>
    </form>

    <br/>

    <a href="/escolas/view/create">Adicionar escolas</a>

    <table>
        <thead>
            <th>Nome</th>
            <th>Endereco</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Situacao</th>
            <th colspan="3"></th>
        </thead>
        <tbody>
            <?php
                foreach ($list as $value){
            ?>
                    <tr>
                        <td><?=$value['nome']?></td>
                        <td><?=$value['endereco']?></td>
                        <td><?=$value['cidade']?></td>
                        <td><?=$value['estado']?></td>
                        <td><?=$value['situacao']?></td>
                        <td>

                        </td>
                        <td>
                            <form action="/escolas/edit" method="GET">
                                <input type="hidden" name="edit" value="true">
                                <input type="hidden" name="edit_id" value="<?=$value['id']?>">
                                <button type="submit">editar</button>
                            </form>
                        </td>
                        <td>
                            <form action="/escolas/destroy" method="POST">
                                <input type="hidden" name="destroy" value="true">
                                <input type="hidden" name="destroy_id" value="<?=$value['id']?>">
                                <button type="submit">excluir</button>
                            </form>
                        </td>
                        <td>
                            <form action="/escolas/more" method="GET">
                                <input type="hidden" name="escola_id" value="<?=$value['id']?>">
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
