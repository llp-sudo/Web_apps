<?php

    session_start();
    header('Content-Type: application/json');
    #Conexão com o DB
    $MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=banco", "root", " ");
    $MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    #Dados recebidos da pagina de login
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $cursor = $MySQLdb->prepare("SELECT * FROM users WHERE email=:email AND senha=:senha");
    $cursor->execute( array(":email"=>$email,":senha"=>$senha) );

    if($cursor->rowCount()){
        $row = $cursor->fetch();
        $_SESSION['name'] = $row['first_name'];
        $_SESSION['id'] = $row['id'];
        $data = array(
            'status'=> 'ok'
        );
    }
    else{
        $data = array(
            'status'=> 'user not found'
        );
    }

    echo json_encode($data);

?>