<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/resources/css/bootstrap">
    <link rel="stylesheet" type="text/css" href="/resources/css/index">
    <script src="/resources/js/jquery"></script>
    <title><?= isset($escola) ? $escola->getNome()." - Nova turma" : "Cadatro de turmas" ?></title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark row">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav col">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/alunos">Alunos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/escolas">Escolas</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/turmas">Turmas</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <form class="input-group mb-4" action="/turmas/escolas/search" method="GET">
            <input type="hidden" name="search" value="true">
            <label class="form-control bg-light" for="query">Buscar Escolas</label>
            <input class="form-control" id="query" name="query" type="text" name="query" placeholder="Escola">
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit">buscar</button>
            </div>
        </form>

        <?php
        if(isset($escola_list)) {
            ?>
            <table class="table shadow" id="escolas">
                <thead class="thead-dark">
                    <th>Nome</th>
                    <th>Endereco</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Situacao</th>
                    <th>Alunos</th>
                    <th>Selecione</th>
                </thead>
                <tbody>
                <?php
                foreach ($escola_list as $value) {
                    ?>
                    <tr>
                        <td><?=$value['escola']['nome']?></td>
                        <td><?=$value['escola']['endereco']?></td>
                        <td><?=$value['escola']['cidade']?></td>
                        <td><?=$value['escola']['estado']?></td>
                        <td><?=$value['escola']['situacao']?></td>
                        <td align="center"><?=!empty($value['qnt_alunos']) ?
                                $value['qnt_alunos'] : "0"?></td>
                        <td align="center">
                            <input type="radio"  name="selected" id="selected" value="<?=$value['escola']['id']?>">
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

        <form action="/turmas/create" method="POST">
            <input type="hidden" name="turma_create" value="true">


            <input type="hidden" name="turma_escola" id="turma_escola"
                   value="<?= isset($escola) ? $escola->getId() :
                       isset($edit_data) ? $edit_data->getEscola()->getId() : "" ?>">

            <input type="hidden" name="turma_id" id="turma_id"
                   value="<?= isset($edit_data) ? $edit_data->getId() : "" ?>">

            <div class="form-group">
                <label for="turma_ano">Ano</label>
                <input class="form-control" type="text" name="turma_ano" id="turma_ano" required
                       value="<?= isset($edit_data) ? $edit_data->getAno() : "" ?>">
            </div>

            <div class="form-group">
                <label for="turma_nivelEnsino">Nivel de Ensino</label>
                <input class="form-control" type="text" name="turma_nivelEnsino" id="turma_nivelEnsino" required
                       value="<?= isset($edit_data) ? $edit_data->getNivelEnsino() : "" ?>">
            </div>

            <div class="form-group">
                <label for="turma_serie">Serie</label>
                <input class="form-control" type="text" name="turma_serie" id="turma_serie" required
                       value="<?= isset($edit_data) ? $edit_data->getSerie() : "" ?>">
            </div>

            <div class="form-group">
                <label for="turma_turno">Turno</label>
                <input class="form-control" type="text" name="turma_turno" id="turma_turno" required
                       value="<?= isset($edit_data) ? $edit_data->getTurno() : "" ?>">
            </div>

            <button class="btn btn-outline-success" type="submit" id="create_button">enviar</button>
        </form>
    </div>

    <script>
        $(document).ready(() => {
            if($('#turma_escola').val() === "") {
                $('#create_button').on('click', function () {
                    var selected = $('input[name=selected]:checked').val();
                    $('#turma_escola').val(selected);
                });
            }
        })
    </script>

</body>
</html>