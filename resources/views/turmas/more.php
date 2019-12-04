<!DOCTYPE HTML>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
        if(!empty($alunos)){
        ?>
            <table>
                <thead>
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
            <h3>Sem alunos cadastrados nessa turma</h3>
        <?php
        }
    ?>
</body>
</html>
