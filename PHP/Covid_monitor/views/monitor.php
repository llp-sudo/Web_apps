<?php
session_start();

if (!isset($_SESSION["name"])) {
    header("Location: ./index.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS file -->
    <link rel="stylesheet" href="../assets/style.css">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/9544038e1d.js" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Covid Monitor</title>
</head>

<body>
    <h1>Covid-19 Monitor</h1>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-2">
                <div class="row">
                    <div class="col">
                        <select id="country_select" class="form-select">
                            <option selected>País</option>
                        </select>
                        <select id="periodo_select" class="form-select" style="display:none;">
                            <option selected>Periodo</option>
                            <option value="mes">Mês</option>
                            <option value="ano">Ano</option>
                        </select>
                        <select id="mes_select" class="form-select" style="display:none;">
                            <option selected>Mês</option>
                        </select>
                        <select id="ano_select" class="form-select" style="display:none;">
                            <option selected>Ano</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                        <button type="button" id="gerar" class="btn btn-success" style="display:none;">Visualizar</button>

                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card justify-content-center">
                    <canvas id="myChart"></canvas>
                </div>
            </div>

        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="../assets/monitor.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>