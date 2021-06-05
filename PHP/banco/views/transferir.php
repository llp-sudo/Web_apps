<?php

session_start();

if (!isset($_SESSION["name"])) {
    header("Location: login.php");
}

$id = $_SESSION["id"];
$name = $_SESSION["name"];
#Conexão com o DB
$MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=banco", "root", " ");
$MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$cursor = $MySQLdb->prepare("SELECT * FROM conta WHERE id_user =:id");
$cursor->execute(array(":id" => $id));

$row = $cursor->fetch();
$conta = intval($row['conta']);
$saldo = intval($row['saldo']);
$agencia = intval($row['agencia']);

?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/perfil.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Sistema Bancario</title>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-success">
    <a class="navbar-brand" href="#">
        <img src="../assets/img/logo_transparent.png" width="100" height="100" alt="">
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Transferir</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Informações</a>
            </li>

            <li class="nav-item">
                <a class="nav-link logoff" href="../controllers/logout.php">Sair</a>
            </li>
        </ul>
    </div>
</nav>

<div class="row py-3 px-2 " style="width: 100%;">
    <div class="col-md-3 hi_user">
        <h2> Seu saldo: R$<?= $saldo ?> </h2>
    </div>
</div>


<div class="container">
    <div class="row pt-5">
        <div class="input-group mb-3">
            <input type="text" class="form-control " placeholder="insira a agencia de destino">
        </div>
    </div>

    <div class="row">
        <div class="input-group mb-3">
            <input type="text" class="form-control " placeholder="insira a conta de destino">
        </div>
    </div>

    <div class="row">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="text" id="transferir-valor" class="form-control" placeholder="insira o valor que deseja transferir">
            <div class="input-group-append">
                <span class="input-group-text">.00</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 offset-md-9">
            <button type="button" id="cancelar_transfer"class="btn btn-warning btn-lg">Cancelar</button>
            <button type="button" id="transfer"class="btn btn-info btn-lg">Transferir</button>
        </div>
    </div>


</div>




<body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>