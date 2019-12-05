<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/resources/css/bootstrap">
        <link rel="stylesheet" type="text/css" href="/resources/css/index">
        <script src="/resources/js/jquery"></script>
        <title>Turmas Cadastradas</title>
    </head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark row">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav col">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/turmas">Turmas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/escolas">Escolas</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/alunos">Alunos</a>
                </li>
            </ul>

            <form class="form-inline col d-flex flex-row-reverse" action="/alunos/search" method="GET">
                <input type="hidden" name="search" value="true">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                <input class="form-control mr-sm-2" type="text" name="query" placeholder="Escola" aria-label="Search">
            </form>
        </div>
    </nav>

    <div class="container">

        <?php
            session_start();
            if(!empty($turmas)){
        ?>
            <table class="table">
                <thead class="thead-dark">
                    <th>Escola</th>
                    <th>Ano</th>
                    <th>Nivel de Ensino</th>
                    <th>Serie</th>
                    <th>Turno</th>
                    <th></th>
                </thead>
                <tbody>
                <?php
                foreach ($turmas as $values) {
                    ?>
                    <tr>
                        <td><?=$values['turma']->getEscola()->getNome()?></td>
                        <td><?=$values['turma']->getAno()?></td>
                        <td><?=$values['turma']->getNivelEnsino()?></td>
                        <td><?=$values['turma']->getSerie()?></td>
                        <td><?=$values['turma']->getTurno();?></td>
                        <td>
                            <form action="/alunos/escola/destroy" method="POST">
                                <input type="hidden" name="destroy_id" value="<?=$values['id']?>">
                                <button class="btn btn-danger" type="submit">desvincular</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            }
            else {
                ?>
                    <h3>vazio</h3>
                <?php
            }
            ?>
            </tbody>
        </table>

        <h3>Cadastro em turmas</h3>

        <form action="/alunos/turmas/search" method="GET">
            <input class="form-control" type="text" name="query" placeholder="Busca escola">
            <div class="input-group-append">
                <button type="submit">buscar</button>
            </div>
        </form>

        <?php
            if(isset($escola_list)){
        ?>
            <table>
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
                        <td><?= $value['escola']['nome'] ?></td>
                        <td><?= $value['escola']['endereco'] ?></td>
                        <td><?= $value['escola']['cidade'] ?></td>
                        <td><?= $value['escola']['estado'] ?></td>
                        <td><?= $value['escola']['situacao'] ?></td>
                        <td>
                            <form action="/alunos/escola/turmas" method="GET">
                                <input type="hidden" name="escola_id" value="<?= $value['id'] ?>">
                                <button type="submit">selecionar</button>
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
        ?>

        <?php
            if(!empty($turmas_list)){
        ?>
            <table>
                <thead>
                    <th>id</th>
                    <th>Ano</th>
                    <th>Nivel de Ensino</th>
                    <th>Serie</th>
                    <th>Turno</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                        foreach ($turmas_list as $value) {
                    ?>
                            <tr>
                                <td><?=$value['id']?></td>
                                <td><?=$value['ano']?></td>
                                <td><?=$value['nivel_ensino']?></td>
                                <td><?=$value['serie']?></td>
                                <td><?=$value['turno']?></td>
                                <td>
                                    <input type="checkbox" name="selected_turmas" value="<?=$value['id']?>">
                                </td>
                            </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>

            <form action="/alunos/turmas/create" method="POST" id="selected_turmas_form">
                <input type="hidden" name="turmas_id" value="true">
                <button type="submit" id="turma_add" name="turma_add_button">adicionar</button>
            </form>

                <?php
            }
            elseif (!isset($turmas_list) and isset($_GET['escola_id'])){
                ?>
                <h3>Nao existem turmas cadastradas nessa escola</h3>
            <?php
            }

            ?>
    </div>

    <script>
        $(document).ready(() => {
            $("#turma_add").on("click", () => {

                let turmas = [];

                $("input[name=selected_turmas]:checked").each(function(){
                    turmas.push($(this).val());
                });

                let form = '#selected_turmas_form';

                $(form).append(
                    "<input type='hidden' name='turmas_qnt' value='"+turmas.length+"'>"
                );

                for(let i = 0; i < turmas.length; i += 1){
                    $(form).append(
                        "<input type='hidden' name='turma_id_"+i.toString()+"' value=\""+turmas[i]+"\">"
                    )
                }
            });
        });
    </script>
</body>
</html>
