<!DOCTYPE HTML>
<html>
<head>
    <script src="/resources/js/jquery"></script>
    <title><?= isset($escola) ? $escola->getNome()." - Nova turma" : "Cadatro de turmas" ?></title>
</head>
<body>

    <form action="/turmas/escolas/search" method="GET">
        <input type="hidden" name="search" value="true">
        Busca Escola<input type="text" name="query" placeholder="search">
        <button type="submit">buscar</button>
    </form>

    <?php
    if(isset($escola_list)) {
        ?>
        <table id="escolas">
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
                    <td><?=$value['nome']?></td>
                    <td><?=$value['endereco']?></td>
                    <td><?=$value['cidade']?></td>
                    <td><?=$value['estado']?></td>
                    <td><?=$value['situacao']?></td>
                    <td>
                        <input type="radio"  name="selected" id="selected" value="<?=$value['id']?>">
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
        var_dump($edit_data->getEscola()->getId());
    ?>

    <?= isset($escola) ? $escola->getId() :
        isset($edit_data) ? $edit_data->getEscola()->getId() : "" ?>

    <form action="/turmas/create" method="POST">
        <input type="hidden" name="turma_create" value="true">


        <input type="hidden" name="turma_escola" id="turma_escola"
               value="<?= isset($escola) ? $escola->getId() :
                   isset($edit_data) ? $edit_data->getEscola()->getId() : "" ?>">

        <input type="hidden" name="turma_id" id="turma_id"
               value="<?= isset($edit_data) ? $edit_data->getId() : "" ?>">

        <div>
            <label for="turma_ano">Ano</label>
            <input type="text" name="turma_ano" id="turma_ano" required
                   value="<?= isset($edit_data) ? $edit_data->getAno() : "" ?>">
        </div>

        <div>
            <label for="turma_nivelEnsino">Nivel de Ensino</label>
            <input type="text" name="turma_nivelEnsino" id="turma_nivelEnsino" required
                   value="<?= isset($edit_data) ? $edit_data->getNivelEnsino() : "" ?>">
        </div>

        <div>
            <label for="turma_serie">Serie</label>
            <input type="text" name="turma_serie" id="turma_serie" required
                   value="<?= isset($edit_data) ? $edit_data->getSerie() : "" ?>">
        </div>

        <div>
            <label for="turma_turno">Turno</label>
            <input type="text" name="turma_turno" id="turma_turno" required
                   value="<?= isset($edit_data) ? $edit_data->getTurno() : "" ?>">
        </div>

        <button type="submit" id="create_button">enviar</button>
    </form>

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