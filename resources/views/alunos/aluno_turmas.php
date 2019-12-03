<!DOCTYPE HTML>
<html>
    <head>
        <script src="/resources/js/jquery"></script>
        <title>Turmas Cadastradas</title>
    </head>
<body>


    <?php
        if(!empty($turmas)){
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
            foreach ($turmas as $values) {
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
        if(isset($escola_list)){
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
            foreach ($escola_list as $value) {
                ?>
                <tr>
                    <td><?= $value['nome'] ?></td>
                    <td><?= $value['endereco'] ?></td>
                    <td><?= $value['cidade'] ?></td>
                    <td><?= $value['estado'] ?></td>
                    <td><?= $value['situacao'] ?></td>
                    <td>
                        <form action="/alunos/escola/turmas" method="GET">
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
        if(!empty($turmas_list)){
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
                    foreach ($turmas_list as $value) {
                ?>
                        <tr>
                            <td><?=$value['ano']?></td>
                            <td><?=$value['nivel_ensino']?></td>
                            <td><?=$value['serie']?></td>
                            <td><?=$value['turno']?></td>
                            <td>
                                <input type="checkbox" name="selected_turmas" value="<?=$value['id']?>">
                            </td>
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        <form id="selected_turmas_form">
            <input type="hidden" name="turmas_id" value="true">
            <button type="submit" id="turma_add" name="turma_add_button">adicionar</button>
        </form>

            <?php
        }
        elseif (!isset($turmas_list) and isset($_GET['escola_id'])){
            ?>
            <h3>Nao existem turmas cadastradas nessa escola</h3>
        <?php
        }
        ?>
</body>
</html>
