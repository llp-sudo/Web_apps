<?php
session_start();
header('Content-Type: application/json');
#Conexão com o DB
$MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=banco", "root", "  ");
$MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_SESSION["id"];

$agencia = intval($_POST["agencia"]);
$conta_dest = intval($_POST["conta_dest"]);
$valor = intval($_POST["valor"]);

$cursor = $MySQLdb->prepare("SELECT * FROM conta WHERE conta=:conta AND agencia=:agencia");
$status = $cursor->execute( array(":conta"=>$conta_dest, ":agencia"=>$agencia) );

if($status){
    $row = $cursor->fetch();
    $saldo = intval($row['saldo']);
    $saldo_new = $saldo + $valor;

    $cursor = $MySQLdb->prepare("UPDATE conta SET saldo = :saldo where conta=:conta AND agencia=:agencia");
    $status = $cursor->execute( array(":saldo"=>$saldo_new,":conta"=>$conta_dest,":agencia"=>$agencia) );

    if($status) {
        $cursor = $MySQLdb->prepare("SELECT * FROM conta WHERE id_user=:id");
        $status = $cursor->execute( array(":id"=>$id) );

        $row = $cursor->fetch();
        $saldo = intval($row['saldo']);
        $saldo_new = $saldo - $valor;

        $cursor = $MySQLdb->prepare("UPDATE conta SET saldo = :saldo WHERE id_user=:id");
        $status = $cursor->execute( array(":saldo"=>$saldo_new,":id"=>$id) );
    }

    $data = array(
        'status'=> 'ok'
    );
}
else{
    $data = array(
        'status'=> 'erro'
    );
}

echo json_encode($data);
