<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">

    <title>JoKenPo</title>
    
</head>

<body>
    <div class="container my-5">
        <!--Botão para iniciar o jogo -->
        <div class="d-flex justify-content-center my-5">
            <button type="button" id="start_game" class="btn btn-primary btn-lg btn-block">Iniciar o Jogo</button>
        </div>

        <!--Cards do jogo -->
        <div class="opc" style="display: none;">
            <div class="d-flex justify-content-center my-5">
                <div class="card-group">
                    <div class="card mx-1 ">
                        <div class="escolha" id="pedra">
                            <img src="img/pedra.png" class="card-img-top mb" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Pedra</h5>
                        </div>
                    </div>
                    <div class="card mx-1 ">
                        <div class="escolha" id="papel">
                            <img src="img/papel.png" class="card-img-top mb" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Papel</h5>
                        </div>
                    </div>
                    <div class="card mx-1 ">
                        <div class="escolha" id="tesoura">
                            <img src="img/tesoura.png" class="card-img-top mb" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title pt-5">Tesoura</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center my-5">
            <span id="resultado"></span>
        </div>
        <div class="d-flex justify-content-center my-5">
            <span id="placar"></span>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="jogo.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>