<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/resources/css/bootstrap">
    <link rel="stylesheet" type="text/css" href="/resources/css/main">
    <title>Home Page</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="escolas">Escolas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="turmas">Turmas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="alunos">Alunos</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="d-flex justify-content-center search-box">
        <div class="mb-3">
            <form class="input-group" action="/">
                <select class="form-control col-3" id="">
                    <option>escolas</option>
                    <option>alunos</option>
                </select>
                <input type="text" class="form-control" id="search_input" name="search_input">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" id="button-addon2">buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
