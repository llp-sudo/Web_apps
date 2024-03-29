<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS file -->
    <link rel="stylesheet" href="../assets/style.css">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/9544038e1d.js" crossorigin="anonymous"></script>

    <title>Covid Monitor</title>
</head>

<body>
    <div class="principal">
        <div class="container login">
            <!-- Exibição inicial -->
            <div class="btn-principal">
                <button type="button" id="cadastro" class=" btn btn-lg btn-warning btn_login">Cadastro</button>
                <button type="button" id="entrar" class="btn  btn-lg btn-primary btn_login">Entrar</button>
            </div>
            <!-- Exibição Login  -->
            <div class="input-entrar" style="display:none;">
                <input type="text" id="user_login" class="form-control input_login" placeholder="Nome de usuário"
                    aria-describedby="user">
                <input type="password" id="pass_login" class="form-control input_login" placeholder="Senha"
                    aria-describedby="pass">
                <button type="button" id="logar" class=" btn btn-primary">Entrar</button>
            </div>
            <!-- Exibição cadastro -->
            <div class="input-cadastrar" style="display:none;">
                <input type="text" id="user_cadatro" class="form-control    input-cadastro"
                    placeholder="Nome de usuário" aria-describedby="user">
                <input type="email" id="email_cadatro" class="form-control   input-cadastro" placeholder="email"
                    aria-describedby="user">
                <input type="password" id="pass_cadatro" class="form-control  input-cadastro" placeholder="Senha"
                    aria-describedby="pass">
                <button type="button" id="cadastrar" class=" btn btn-warning direita">Cadastrar</button>
            </div>
        </div>
        <div>
            <!-- Volta para exibição normal -->
            <span class="back-btn" style="display:none;"><i class="fas fa-undo">&emsp;Voltar</i></span>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="../assets/login.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>