<!DOCTYPE HTML>
<html>
<head>
    <title>Alunos - Registro</title>
</head>
<body>

    <?php
        $currentAluno = null;

        $genero = null;

        if(isset($edit_data))
        {
            $currentAluno = $edit_data;
            $genero = $currentAluno->getGenero();
        }
    ?>

    <form action="/alunos/create" method="POST">
        <input type="hidden" name="aluno_create" value="true">

        <input type="hidden" name="aluno_id" value="<?= isset($currentAluno) ? $currentAluno->getId() : "" ?>">

        <div>
            <label for="aluno_nome">Nome</label>
            <input type="text" name="aluno_nome" id="aluno_nome" autocomplete="false" value="<?= isset($currentAluno) ? $currentAluno->getNome() : "" ?>" required>
        </div>

        <div>
            <label for="aluno_nasc">Data de Nascimento</label>
            <input type="date" name="aluno_nasc" id="aluno_nasc" value="<?= isset($currentAluno) ? $currentAluno->getDatNasc() : "" ?>" required>
        </div>

        <div>
            masculino <input type="radio" name="aluno_genero" value="masculino" checked="<?=(isset($_SESSION['edit_data']) and $genero == "masculino") ? "checked" : "" ?>" required>
            feminino <input type="radio" name="aluno_genero" value="feminino" checked="<?=(isset($_SESSION['edit_data']) and $genero == "feminino") ? "checked" : "" ?>" required>
        </div>

        <div>
            <label for="aluno_email">Email</label>
            <input type="email" name="aluno_email" id="aluno_email" autocomplete="false" value="<?= isset($currentAluno) ? $currentAluno->getEmail() : "" ?>" required>
        </div>

        <div>
            <label for="aluno_telefone">Telefone</label>
            <input type="text" name="aluno_telefone" id="aluno_telefone" autocomplete="false" value="<?= isset($currentAluno) ? $currentAluno->getTelefone() : "" ?>" required>
        </div>

        <button type="submit">Enviar</button>
    </form>

</body>
</html>