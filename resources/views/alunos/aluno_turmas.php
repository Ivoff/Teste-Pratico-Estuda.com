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
                <th>Escola</th>
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
                    <td><?=$values->getEscola()->getNome()?></td>
                    <td><?=$values->getAno()?></td>
                    <td><?=$values->getNivelEnsino()?></td>
                    <td><?=$values->getSerie()?></td>
                    <td><?=$values->getTurno();?></td>
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
            foreach ($_SESSION['escola_list'] as $value) {
                ?>
                <tr>
                    <td><?=$value['nome']?></td>
                    <td><?=$value['endereco']?></td>
                    <td><?=$value['cidade']?></td>
                    <td><?=$value['estado']?></td>
                    <td><?=$value['situacao']?></td>
                    <td>
                        <button>selecionar</button>
                    </td>
                </tr>
                <?php
            }
        ?>
        </tbody>
    </table>
</body>
</html>
