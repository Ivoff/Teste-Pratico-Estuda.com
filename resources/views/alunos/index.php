<!DOCTYPE HTML>

<?php
 /*
  * Script para evitar a resubmissao do formulario
  * alterando o header para fazer requisicao da
  * mesma pagina so que por GET
  */

    if(isset($_POST['destroy']))
    {
        header("Location: /alunos");
        return;
    }
    elseif (isset($_SESSION['edit_data']))
    {
        session_destroy();
    }
?>

<html>
<head>
    <title>Alunos</title>
</head>
<body>

    <form action="/alunos/search" method="GET">
        <input type="hidden" name="search" value="true">
        Busca<input type="text" name="query" autocomplete="false">
        <button type="submit">buscar</button>
    </form>

    <br/>

    <a href="/alunos/view/create">Adicionar aluno</a>

    <table>
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>DatNasc</th>
            <th>Genero</th>
            <th colspan="3"></th>
        </thead>
        <tbody>
            <?php
                foreach ($list as $value ) {
                ?>
                    <tr>
                        <td><?=$value['nome']?></td>
                        <td><?=$value['telefone']?></td>
                        <td><?=$value['email']?></td>
                        <td><?=$value['data_nascimento']?></td>
                        <td><?=$value['genero']?></td>
                        <td>
                            <form action="/alunos/destroy" method="POST">
                                <input type="hidden" name="destroy" value="true">
                                <input type="hidden" name="destroy_id" value="<?=$value['id']?>">
                                <button type="submit">excluir</button>
                            </form>
                        </td>
                        <td>
                            <form action="/alunos/edit" method="GET">
                                <input type="hidden" name="edit" value="true">
                                <input type="hidden" name="edit_id" value="<?=$value['id']?>">
                                <button type="submit">editar</button>
                            </form>
                        </td>
                        <td>
                            <form action="/alunos/turmas" method="GET">
                                <input type="hidden" name="aluno_id" value="<?=$value['id']?>">
                                <button type="submit">turmas</button>
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
