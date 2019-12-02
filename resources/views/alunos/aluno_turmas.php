<!DOCTYPE HTML>

<html>
    <head>
        <title>Turmas Cadastradas</title>
    </head>
<body>

    <?php
        if(!empty($_SESSION['turmas'])){
    ?>
        <table>
            <thead>
                <th>Ano</th>
                <th>Nivel de Ensino</th>
                <th>Serie</th>
                <th>Turno</th>
                <th></th>
            </thead>
            <tbody>
            <?php
            foreach ($_SESSION['turmas'] as $values) {
                ?>
                <tr>
                    <td><?=$values['ano']?></td>
                    <td><?=$values['nivel_ensino']?></td>
                    <td><?=$values['serie']?></td>
                    <td><?=$values['turno'];?></td>
                    <td>
                        <button>desvincular</button>
                    </td>
                </tr>
                <?php
            }
        }
        else {
            ?>
                <h3>vazio</h3>
            <?php
        }
        ?>
        </tbody>
    </table>

    <h1>Cadastro em turmas</h1>

    <form action="/alunos/turmas/search" method="GET">
        Busca escola <input type="text" name="query" placeholder="search">
        <button type="submit">buscar</button>
    </form>
    <?php
        if(isset($_POST['escola_list'])){
    ?>
        <table>
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
            foreach ($_POST['escola_list'] as $value) {
                ?>
                <tr>
                    <td><?= $value['nome'] ?></td>
                    <td><?= $value['endereco'] ?></td>
                    <td><?= $value['cidade'] ?></td>
                    <td><?= $value['estado'] ?></td>
                    <td><?= $value['situacao'] ?></td>
                    <td>
                        <form action="/alunos/get/turmas" method="GET">
                            <input type="hidden" name="escola_id" value="<?= $value['id'] ?>">
                            <button type="submit">selecionar</button>
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

    <?php
        if(!empty($_SESSION['turmas_list'])){
    ?>
        <table>
            <thead>
                <th>Ano</th>
                <th>Nivel de Ensino</th>
                <th>Serie</th>
                <th>Turno</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    foreach ($_SESSION['turmas_list'] as $value) {
                ?>
                        <tr>
                            <td><?=$value['ano']?></td>
                            <td><?=$value['nivel_ensino']?></td>
                            <td><?=$value['serie']?></td>
                            <td><?=$value['turno']?></td>
                            <td><input type="checkbox" value="<?=$value['id']?>"></td>
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
            <?php
        }
        elseif ((empty($_SESSION['turmas_list']) or !isset($_SESSION['turmas_list'])) and isset($_GET['escola_id']) ){
            ?>
            <h3>Nao existem turmas cadastradas nessa escola</h3>
        <?php
        }
        ?>
</body>
</html>
