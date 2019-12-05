<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/resources/css/bootstrap">
    <link rel="stylesheet" type="text/css" href="/resources/css/index">
    <script src="/resources/js/jquery"></script>
    <title>Turma</title>
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
        <?php
            if(!empty($alunos)){
            ?>
                <table class="table shadow">
                    <thead class="thead-dark">
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Data-Nascimento</th>
                        <th>Genero</th>
                        <th></th>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($alunos as $value) {
                    ?>
                        <tr>
                            <td><?= $value['aluno']->getNome() ?></td>
                            <td><?= $value['aluno']->getTelefone() ?></td>
                            <td><?= $value['aluno']->getEmail() ?></td>
                            <td><?= $value['aluno']->getDatNasc() ?></td>
                            <td><?= $value['aluno']->getGenero() ?></td>
                            <td>
                                <form action="/alunos/turmas" method="GET">
                                    <input type="hidden" name="aluno_id" value="<?=$value['id']?>">
                                    <button type="submit">turmas</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            <?php
            }else
            {
            ?>
                <h3 class="text-center">Sem alunos cadastrados nessa turma</h3>
            <?php
            }
        ?>
    </div>
</body>
</html>
