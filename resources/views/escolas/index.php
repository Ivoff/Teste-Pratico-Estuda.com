<!DOCTYPE HTML>
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

        <input type="hidden" name="escola_id" value="">

        <div>
            <label for="escola_nome">Nome</label>
            <input type="text" name="escola_nome" id="escola_nome" required>
        </div>

        <div>
            <label for="escola_endereco">Endereco</label>
            <input type="text" name="escola_endereco" id="escola_endereco" required>
        </div>

        <div>
            <label for="escola_cidade">Cidade</label>
            <input type="text" name="escola_cidade" id="escola_cidade" required>
        </div>

        <div>
            <label for="escola_estado">Estado</label>
            <input type="text" name="escola_estado" id="escola_estado" required>
        </div>

        <div>
            <label for="escola_situcacao">Situacao</label>
            <input type="text" name="escola_situacao" id="escola_situcacao" required>
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
                            <button>excluir</button>
                        </td>
                        <td>
                            <button>editar</button>
                        </td>
                    </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>
