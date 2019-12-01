<!DOCTYPE HTML>
<html>
<head>
    <title>Escolas</title>
</head>
<body>
    <form>
        <input type="hidden" name="search" value="true">
        Busca<input type="text" name="query" autocomplete="false">
        <button type="submit">buscar</button>
    </form>

    <br/>

    <form>
        <input type="hidden" name="escola_create" value="true">

        <div>
            <label for="escola_nome">Nome</label>
            <input type="text" name="escola_nome" id="escola_nome" required>
        </div>

        <div>
            <label for="escola_endereco">Endereco</label>
            <input type="text" name="escola_endereco" id="escola_endereco" required>
        </div>

        <div>
            <label for="escola_cidade">Cidade</label>
            <input type="text" name="escola_cidade" id="escola_cidade" required>
        </div>

        <div>
            <label for="escola_estado">Estado</label>
            <input type="text" name="escola_estado" id="escola_estado" required>
        </div>

        <button type="submit"></button>
    </form>
</body>
</html>
