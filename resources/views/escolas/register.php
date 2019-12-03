<!DOCTYPE HTML>

<?php
    if(isset($_POST['escola_create']) or isset($_POST['destroy']))
    {
        header("Location: /escolas");
        return;
    }
?>

<html>
<head>
    <title>Escolas - Registro</title>
</head>
<body>
    <form action="/escolas/create" method="POST">
        <input type="hidden" name="escola_create" value="true">

        <input type="hidden" name="escola_id"
               value="<?= isset($edit_data) ? $edit_data->getId() : "" ?>">

        <div>
            <label for="escola_nome">Nome</label>
            <input type="text" name="escola_nome" id="escola_nome" required
                   value="<?= isset($edit_data) ? $edit_data->getNome() : "" ?>">
        </div>

        <div>
            <label for="escola_endereco">Endereco</label>
            <input type="text" name="escola_endereco" id="escola_endereco" required
                   value="<?= isset($edit_data) ? $edit_data->getEndereco() : "" ?>">
        </div>

        <div>
            <label for="escola_cidade">Cidade</label>
            <input type="text" name="escola_cidade" id="escola_cidade" required
                   value="<?= isset($edit_data) ? $edit_data->getCidade() : "" ?>">
        </div>

        <div>
            <label for="escola_estado">Estado</label>
            <input type="text" name="escola_estado" id="escola_estado" required
                   value="<?= isset($edit_data) ? $edit_data->getEstado() : "" ?>">
        </div>

        <div>
            <label for="escola_situcacao">Situacao</label>
            <input type="text" name="escola_situacao" id="escola_situcacao" required
                   value="<?= isset($edit_data) ? $edit_data->getSituacao() : "" ?>">
        </div>

        <button type="submit">enviar</button>
    </form>
</body>
</html>
