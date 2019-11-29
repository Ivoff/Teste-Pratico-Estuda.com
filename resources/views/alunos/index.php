<!DOCTYPE HTML>

<?php
    session_start();
?>

<html>
<head>
    <title>Alunos</title>
</head>
<body>
    <form action="alunos/create" method="post">
        <div>
            <label for="aluno_nome">Nome</label>
            <input type="text" name="aluno_nome" id="aluno_nome" autocomplete="false" required>
        </div>

        <div>
            <label for="aluno_nasc">Data de Nascimento</label>
            <input type="date" name="aluno_nasc" id="aluno_nasc" required>
        </div>

        <div>
            masculino <input type="radio" name="aluno_genero" value="masculino" required>
            feminino <input type="radio" name="aluno_genero" value="feminino" required>
        </div>

        <div>
            <label for="aluno_email">Email</label>
            <input type="email" name="aluno_email" id="aluno_email" autocomplete="false" required>
        </div>

        <div>
            <label for="aluno_telefone">Telefone</label>
            <input type="text" name="aluno_telefone" id="aluno_telefone" autocomplete="false" required>
        </div>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
