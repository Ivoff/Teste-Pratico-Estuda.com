<!DOCTYPE HTML>
<html>
<head>
    <script src="/resources/js/jquery"></script>
    <script src="/resources/js/bootstrap"></script>
    <link rel="stylesheet" type="text/css" href="/resources/css/bootstrap">
    <link rel="stylesheet" type="text/css" href="/resources/css/index">
    <title>Escolas - Registro</title>
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
                    <a class="nav-link" href="/alunos">Alunos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/escolas">Escolas</a>
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
        <form action="/escolas/create" method="POST">
            <input type="hidden" name="escola_create" value="true">

            <input type="hidden" name="escola_id"
                   value="<?= isset($edit_data) ? $edit_data->getId() : "" ?>">

            <div class="form-group">
                <label for="escola_nome">Nome</label>
                <input class="form-control" type="text" name="escola_nome" id="escola_nome" required
                       value="<?= isset($edit_data) ? $edit_data->getNome() : "" ?>">
            </div>

            <div class="form-group">
                <label for="escola_estado">Estado</label>
                <input class="form-control" type="text" name="escola_estado" id="escola_estado" required
                       value="<?= isset($edit_data) ? $edit_data->getEstado() : "" ?>">
            </div>

            <div class="form-group">
                <label for="escola_cidade">Cidade</label>
                <input class="form-control" type="text" name="escola_cidade" id="escola_cidade" required
                       value="<?= isset($edit_data) ? $edit_data->getCidade() : "" ?>">
            </div>

            <div class="form-group">
                <label for="escola_endereco">Endereco</label>
                <input class="form-control" type="text" name="escola_endereco" id="escola_endereco" required
                       value="<?= isset($edit_data) ? $edit_data->getEndereco() : "" ?>">
            </div>

            <div class="form-group">
                <label for="escola_situcacao">Situacao</label>
                <input class="form-control" type="text" name="escola_situacao" id="escola_situacao" required
                       value="<?= isset($edit_data) ? $edit_data->getSituacao() : "" ?>">
            </div>

            <button class="btn btn-outline-success" type="submit">enviar</button>
        </form>
    </div>

    <script>
        $(document).ready(() => {
            $('#escola_estado').blur(() => {
                let estado = $('#escola_estado').val();
                let nome = $('#escola_nome').val();
                if(nome !== "" && estado !== ""){

                    $('#escola_nome').val("...");
                    $('#escola_estado').val("...");
                    $('#escola_cidade').val("...");
                    $('#escola_endereco').val("...");
                    $('#escola_situacao').val("...");

                    $.ajax({
                        type: "GET",
                        url: 'http://<?=$_SERVER['HTTP_HOST']?>/escolas/api?nome='+nome+'&estado='+estado,
                        success: function(response){
                            let data  = JSON.parse(response);
                            let codigo = data[1][0].cod;
                            $.ajax({
                                type: "GET",
                                url: 'http://<?=$_SERVER['HTTP_HOST']?>/escolas/api?cod='+codigo,
                                success: function(response){
                                    let data = JSON.parse(response);

                                    $('#escola_nome').val(data.nome);
                                    $('#escola_estado').val(data.siglaUf);
                                    $('#escola_cidade').val(data.nomeMunicipio);
                                    $('#escola_endereco').val(data.endereco);
                                    $('#escola_situacao').val(data.situacaoFuncionamentoTxt);
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>

</body>
</html>
