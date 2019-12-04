<!DOCTYPE HTML>
<html>
<head>
    <title><?=$escola->getNome()?></title>
</head>
<body>
    <?php
        if(!empty($turmas)) {
        ?>
            <table>
                <thead>
                    <th>Ano</th>
                    <th>Nivel Ensino</th>
                    <th>Serie</th>
                    <th>Turno</th>
                    <th></th>
                </thead>
                <tbody>
                <?php
                foreach ($turmas as $value){
                ?>
                    <tr>
                        <td><?=$value['ano']?></td>
                        <td><?=$value['nivel_ensino']?></td>
                        <td><?=$value['serie']?></td>
                        <td><?=$value['turno']?></td>
                        <td>
                            <form action="/">
                                <input type="hidden" name="turma_id" value="<?=$value['id']?>">
                                <button type="submit">mais</button>
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
        else
        {
        ?>
            <h3>Sem turmas cadastradas a essa escola ainda</h3>
        <?php
        }
    ?>
</body>
</html>
