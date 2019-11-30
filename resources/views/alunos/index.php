<!DOCTYPE HTML>

<?php
 /*
  * Script para evitar a resubmissao do formulario
  * alterando o header para fazer requisicao da
  * mesma pagina so que por GET
  */
    if(isset($_POST['aluno_create']) or isset($_POST['destroy']))
    {
        header("Location: /alunos");
        return;
    }
?>

<html>
<head>
    <title>Alunos</title>
</head>
<body>
    <form action="" method="GET">
        <input type="hidden" name="search" value="true">
        Busca<input type="text" name="query" autocomplete="false">
    </form>

    <br/>

    <form action="alunos/create" method="POST">
        <input type="hidden" name="aluno_create" value="true">

        <div>
            <label for="aluno_nome">Nome</label>
            <input type="text" name="aluno_nome" id="aluno_nome" autocomplete="false" required>
        </div>

        <div>
            <label for="aluno_nasc">Data de Nascimento</label>
            <input type="date" name="aluno_nasc" id="aluno_nasc" required>
        </div>

        <div>
            masculino <input type="radio" name="aluno_genero" value="masculino" required>
            feminino <input type="radio" name="aluno_genero" value="feminino" required>
        </div>

        <div>
            <label for="aluno_email">Email</label>
            <input type="email" name="aluno_email" id="aluno_email" autocomplete="false" required>
        </div>

        <div>
            <label for="aluno_telefone">Telefone</label>
            <input type="text" name="aluno_telefone" id="aluno_telefone" autocomplete="false" required>
        </div>

        <button type="submit">Enviar</button>
    </form>

    <table>
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>DatNasc</th>
            <th>Genero</th>
            <th colspan="2"></th>
        </thead>
        <tbody>
            <?php
                foreach ($_POST['list'] as $value ) {
                ?>
                    <tr>
                        <td><?=$value['nome']?></td>
                        <td><?=$value['telefone']?></td>
                        <td><?=$value['email']?></td>
                        <td><?=$value['data_nascimento']?></td>
                        <td><?=$value['genero']?></td>
                        <td>
                            <form action="alunos/destroy" method="POST">
                                <input type="hidden" name="destroy" value="true">
                                <input type="hidden" name="id" value="<?=$value['id']?>">
                                <button>excluir</button>
                            </form>
                        </td>
                        <td>
                            <form action="alunos/edit" method="POST">
                                <input type="hidden" name="edit" value="true">
                                <input type="hidden" name="id" value="<?=$value['id']?>">
                                <button>editar</button>
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
