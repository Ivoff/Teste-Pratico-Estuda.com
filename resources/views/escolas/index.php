<!DOCTYPE HTML>

<?php
    if(isset($_POST['escola_create']) or isset($_POST['destroy']))
    {
        header("Location: /escolas");
        return;
    }
    elseif (isset($_SESSION['edit_data']))
    {
        session_destroy();
    }
?>

<html>
<head>
    <title>Escolas</title>
</head>
<body>
    <form>
        <input type="hidden" name="search" value="true">
        Busca<input type="text" name="query" autocomplete="false">
        <button type="submit">buscar</button>
    </form>

    <br/>

    <form action="/escolas/create" method="POST">
        <input type="hidden" name="escola_create" value="true">

        <input type="hidden" name="escola_id"
               value="<?= isset($_SESSION['edit_data']) ? $_SESSION['edit_data']->getId() : "" ?>">

        <div>
            <label for="escola_nome">Nome</label>
            <input type="text" name="escola_nome" id="escola_nome" required
                   value="<?= isset($_SESSION['edit_data']) ? $_SESSION['edit_data']->getNome() : "" ?>">
        </div>

        <div>
            <label for="escola_endereco">Endereco</label>
            <input type="text" name="escola_endereco" id="escola_endereco" required
                   value="<?= isset($_SESSION['edit_data']) ? $_SESSION['edit_data']->getEndereco() : "" ?>">
        </div>

        <div>
            <label for="escola_cidade">Cidade</label>
            <input type="text" name="escola_cidade" id="escola_cidade" required
                   value="<?= isset($_SESSION['edit_data']) ? $_SESSION['edit_data']->getCidade() : "" ?>">
        </div>

        <div>
            <label for="escola_estado">Estado</label>
            <input type="text" name="escola_estado" id="escola_estado" required
                   value="<?= isset($_SESSION['edit_data']) ? $_SESSION['edit_data']->getEstado() : "" ?>">
        </div>

        <div>
            <label for="escola_situcacao">Situacao</label>
            <input type="text" name="escola_situacao" id="escola_situcacao" required
                   value="<?= isset($_SESSION['edit_data']) ? $_SESSION['edit_data']->getSituacao() : "" ?>">
        </div>

        <button type="submit">enviar</button>
    </form>

    <table>
        <thead>
            <th>Nome</th>
            <th>Endereco</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Situacao</th>
            <th colspan="2"></th>
        </thead>
        <tbody>
            <?php
                foreach ($_POST['list'] as $value){
            ?>
                    <tr>
                        <td><?=$value['nome']?></td>
                        <td><?=$value['endereco']?></td>
                        <td><?=$value['cidade']?></td>
                        <td><?=$value['estado']?></td>
                        <td><?=$value['situacao']?></td>
                        <td>
                            <form action="/escolas/destroy" method="POST">
                                <input type="hidden" name="destroy" value="true">
                                <input type="hidden" name="destroy_id" value="<?=$value['id']?>">
                                <button type="submit">excluir</button>
                            </form>
                        </td>
                        <td>
                            <form action="/escolas/edit" method="GET">
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
</body>
</html>
