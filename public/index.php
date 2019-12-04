<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/resources/css/bootstrap">
    <link rel="stylesheet" type="text/css" href="/resources/css/main">
    <script src="/resources/js/jquery"></script>
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
                <form class="input-group" id="form-search" action="" method="GET">
                    <select class="form-control col-3" id="entitySelector">
                        <option value="escola">escolas</option>
                        <option value="aluno">alunos</option>
                    </select>
                    <input type="hidden" name="search" value="true">
                    <input type="text" class="form-control" id="query" name="query">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" id="search_btn">buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(() => {
            $("#search_btn").on("click", () => {
                let selected = $("#entitySelector option:selected").val();
                if(selected === "escola"){
                    $("#form-search").attr("action", "/escolas/search");
                }else{
                    $("#form-search").attr("action", "/alunos/search");
                }
            });
        });
    </script>
</body>
</html>
