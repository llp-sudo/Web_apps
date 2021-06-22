<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Sistema Bancario</title>
</head>

<div class="container">

    <div class="mb-3 col-4 offset-md-4">
        <img class="logo_login"src="../assets/img/logo_transparent.png" >
    </div>

    <!-- Formulario para o Login -->
    <div id="form_login">
        <div class="row">
            <div class="mb-3 col-4 offset-md-4">
                <label for="InputUser" class="form-label">E-mail:</label>
                <input type="email" class="form-control input-sm" name="email_login" id="email_login" aria-describedby="email">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-4 offset-md-4">
                <label for="Input_senha" class="form-label">Senha:</label>
                <input type="password" class="form-control" name="senha_login" id="senha_login">
            </div>
        </div>

        <div class="row">
            <div class="mb-5 col-4 offset-md-5 ">
                <button type="button" id="screen_cadastro" class="btn btn-secondary">Cadastrar</button>
                <button type="button" id="logar"class="btn btn-success">Login</button>
            </div>
        </div>
    </div>


    <!-- Formulario para o Cadastro -->
    <div id="form_registro" style="display: none;">
        <div class="row">
            <div class="mb-3 col-4 offset-md-4">
                <label for="nome_registro" class="form-label">Nome:</label>
                <input type="text" class="form-control input-sm" id="nome_r" aria-describedby="nome">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-4 offset-md-4">
                <label for="sobrenome_registro" class="form-label">Sobrenome:</label>
                <input type="text" class="form-control input-sm" id="sobrenome_r" aria-describedby="sobrenome">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-4 offset-md-4">
                <label for="email_registro" class="form-label">E-mail:</label>
                <input type="email" class="form-control input-sm" id="email_r" aria-describedby="emailregistre">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-4 offset-md-4">
                <label for="valor" class="form-label">Valor depositado:</label>
                <input type="number" class="form-control input-sm" id="valor_r" aria-describedby="valor">
            </div>
        </div>


        <div class="row">
            <div class="mb-3 col-4 offset-md-4">
                <label for="senha_registro" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="senha_r">
            </div>
        </div>

            <div class="mb-5 col-4 offset-md-5">
                <button type="button" id="back_login"class="btn btn-secondary">Login</button>
                <button type="button" id="cadastro" class="btn btn-success">Enviar</button>
            </div>
        </div>

    </div>

</div>

<body>

    <!-- Optional JavaScript; choose one of the two! -->
        <script src="../assets/login.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>
