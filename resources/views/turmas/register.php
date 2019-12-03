<!DOCTYPE HTML>
<html>
<head>
    <title><?= isset($escola) ? $escola->getNome()." - Nova turma" : "Cadatro de turmas" ?></title>
</head>
<body>
    <form action="/turmas/create" METHOD="POST">
        <input type="hidden" name="turma_create" value="true">

        <input type="hidden" name="turma_escola" id="turma_escola">

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
</body>
</html>