<?php

session_start();
header('Content-Type: application/json');

$opc = $_POST['opc'];
if (isset($_SESSION['maquina'])) {
    $maquina = $_SESSION['maquina'];
    $humano = $_SESSION['humano'];
} else {
    $maquina = 0;
    $humano = 0;
}



if (isset($opc)) {
    $valor = random_int(0, 1);

    switch ($valor) {
        case 0:
            $valor = "pedra";
            break;
        case 1:
            $valor = "papel";
            break;
        case 2:
            $valor = "tesoura";
            break;
    }

    if ($opc == "pedra" && $valor == "papel") {
        $maquina = $maquina + 1;
        $data = array(
            'opc_maquina' => $valor,
            'status' => 'perdeu',
            'maquina' => $maquina,
            'humano' => $humano
        );
    } elseif (($opc == "pedra" && $valor == "tesoura")) {
        $humano = $humano + 1;
        $data = array(
            'opc_maquina' => $valor,
            'status' => 'ganhou',
            'maquina' => $maquina,
            'humano' => $humano
        );
    } elseif (($opc == "papel" && $valor == "tesoura")) {
        $maquina = $maquina + 1;
        $data = array(
            'opc_maquina' => $valor,
            'status' => 'perdeu',
            'maquina' => $maquina,
            'humano' => $humano
        );
    } elseif (($opc == "papel" && $valor == "pedra")) {
        $humano = $humano + 1;
        $data = array(
            'opc_maquina' => $valor,
            'status' => 'ganhou',
            'maquina' => $maquina,
            'humano' => $humano
        );
    } elseif (($opc == "tesoura" && $valor == "papel")) {
        $humano = $humano + 1;
        $data = array(
            'opc_maquina' => $valor,
            'status' => 'ganhou',
            'maquina' => $maquina,
            'humano' => $humano
        );
    } elseif (($opc == "tesoura" && $valor == "pedra")) {
        $maquina = $maquina + 1;
        $data = array(
            'opc_maquina' => $valor,
            'status' => 'perdeu',
            'maquina' => $maquina,
            'humano' => $humano
        );
    } else {
        $data = array(
            'opc_maquina' => $valor,
            'status' => 'empate',
            'maquina' => $maquina,
            'humano' => $humano
        );
    }

    $_SESSION['maquina'] = $maquina;
    $_SESSION['humano'] = $humano;

    if ($maquina >= 5 || $humano >= 5) {
        if ($maquina > $humano) {
            $venc = "maquina";
        } elseif ($maquina < $humano) {
            $venc = "humano";
        } else {
            $venc = "empate";
        }
        $data = array(
            'status' => 'fim de jogo',
            'vencedor' => $venc
        );

        echo json_encode($data);
        session_destroy();
        $_SESSION = [];
    } else {
        echo json_encode($data);
    }
}
