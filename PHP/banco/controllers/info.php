<?php
session_start();
header('Content-Type: application/json');
#Conexão com o DB
$MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=banco", "root", "  ");
$MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_SESSION["id"];
$cursor = $MySQLdb->prepare("SELECT * FROM users WHERE id =:id");
$cursor->execute(array(":id" => $id));
$row = $cursor->fetch();
$nome = $row['first_name'];
$sobrenome = $row['last_name'];
$email = $row['email'];
$senha = $row['senha'];

#Dados recebidos da pagina de login
$email = empty($_POST["email"]) ? $email:$_POST["email"];
$nome = empty($_POST["nome"]) ? $nome: $_POST["nome"] ;
$sobrenome = empty($_POST["sobrenome"])? $sobrenome: $_POST["sobrenome"];
$senha = empty($_POST["senha"])? $senha: $_POST["senha"];


$cursor = $MySQLdb->prepare("UPDATE users SET email = :email, first_name = :nome, last_name = :sobrenome, senha = :senha  where id = :id");
$status = $cursor->execute(array(":email" => $email, ":nome"=> $nome, ":sobrenome"=>$sobrenome, ":senha"=> $senha, ":id"=>$id));

if ($status) {
    $data = array(
        'status' => 'ok'
    );
} else {
    $data = array(
        'status' => 'user not found'
    );
}

echo json_encode($data);
