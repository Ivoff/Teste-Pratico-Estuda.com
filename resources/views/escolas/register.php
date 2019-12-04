<!DOCTYPE HTML>
<html>
<head>
    <script src="/resources/js/jquery"></script>
    <title>Escolas - Registro</title>
</head>
<body>
    <form action="/escolas/create" method="POST">
        <input type="hidden" name="escola_create" value="true">

        <input type="hidden" name="escola_id"
               value="<?= isset($edit_data) ? $edit_data->getId() : "" ?>">

        <div>
            <label for="escola_nome">Nome</label>
            <input type="text" name="escola_nome" id="escola_nome" required
                   value="<?= isset($edit_data) ? $edit_data->getNome() : "" ?>">
        </div>

        <div>
            <label for="escola_estado">Estado</label>
            <input type="text" name="escola_estado" id="escola_estado" required
                   value="<?= isset($edit_data) ? $edit_data->getEstado() : "" ?>">
        </div>

        <div>
            <label for="escola_cidade">Cidade</label>
            <input type="text" name="escola_cidade" id="escola_cidade" required
                   value="<?= isset($edit_data) ? $edit_data->getCidade() : "" ?>">
        </div>

        <div>
            <label for="escola_endereco">Endereco</label>
            <input type="text" name="escola_endereco" id="escola_endereco" required
                   value="<?= isset($edit_data) ? $edit_data->getEndereco() : "" ?>">
        </div>

        <div>
            <label for="escola_situcacao">Situacao</label>
            <input type="text" name="escola_situacao" id="escola_situacao" required
                   value="<?= isset($edit_data) ? $edit_data->getSituacao() : "" ?>">
        </div>

        <button type="submit">enviar</button>
    </form>

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

                                    console.log(data);

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
