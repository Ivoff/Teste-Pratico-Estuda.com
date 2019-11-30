<!DOCTYPE HTML>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <a href="alunos">Alunos</a>
    <?php
        use App\Models\Aluno\Aluno;
        $var = new Aluno();
        $var->read(1);
    ?>
</body>
</html>
