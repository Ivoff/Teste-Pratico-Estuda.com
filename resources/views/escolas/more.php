<!DOCTYPE HTML>
<html>
<head>
    <script src="/resources/js/jquery"></script>
    <script src="/resources/js/bootstrap"></script>
    <link rel="stylesheet" type="text/css" href="/resources/css/bootstrap">
    <link rel="stylesheet" type="text/css" href="/resources/css/index">
    <title><?=$escola->getNome()?></title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark row">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav col">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="turmas">Turmas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="alunos">Alunos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="escolas">Escolas</a>
                </li>
            </ul>

            <form class="form-inline col d-flex flex-row-reverse" action="/escolas/search" method="GET">
                <input type="hidden" name="search" value="true">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                <input class="form-control mr-sm-2" type="text" name="query" placeholder="Escola" aria-label="Search">
            </form>
        </div>
    </nav>

    <div class="container">
        <?php
            if(!empty($turmas)) {
            ?>
                <h2><?=$escola->getNome()?> - Turmas</h2>
                <br/>
                <table class="table shadow">
                    <thead class="thead-dark">
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
                                <form action="/turmas/more" method="GET">
                                    <input type="hidden" name="turma_id" value="<?=$value['id']?>">
                                    <button class="btn btn-outline-primary" type="submit">mais</button>
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
    </div>
</body>
</html>
