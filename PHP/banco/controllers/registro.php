<?php

    session_start();
    header('Content-Type: application/json');
    #Conexão com o DB
    $MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=banco", "root", "  ");
    $MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    #Dados recebidos da pagina de login
    $email = $_POST["email_r"];
    $nome = $_POST["nome_r"];
    $sobrenome = $_POST["sobrenome_r"];
    $senha = $_POST["senha_r"];
    $saldo = $_POST["valor_r"];

    #Verificar se o email já foi cadastrado
    $cursor = $MySQLdb->prepare("SELECT * FROM users WHERE email=:email");
    $cursor->execute( array(":email"=>$email) );
    if($cursor->rowCount()){

        $data = array(
            'status'=> 'fail',
            'msg'=> 'e-mail já cadastrado'
        );
    }
    else{

        $cursor = $MySQLdb->prepare("INSERT INTO users (email, first_name, last_name, senha  ) value (:email, :nome, :sobrenome, :senha)");
        $status = $cursor->execute(array(":email"=>$email,":nome"=>$nome, ":sobrenome"=>$sobrenome, ":senha"=>$senha));

        if($status == 1) {
            $cursor = $MySQLdb->prepare("SELECT * FROM users WHERE email=:email");
            $cursor->execute( array(":email"=>$email) );

            $row = $cursor->fetch();
            $id_user = intval($row['id']);
            
            $agencia = random_int(0,9999);
            $conta = random_int(0,999999999);
            $saldo = intval($saldo);
            
            $cursor = $MySQLdb->prepare("INSERT INTO conta (id_user, saldo, conta, agencia  ) value (:id_user, :saldo, :conta, :agencia)");
            $cursor->execute(array(":id_user"=>$id_user,":saldo"=>$saldo, ":conta"=>$conta, ":agencia"=>$agencia));

            $data = array(
                'status'=> 'ok',
                'msg'=> 'usuário cadastrado',
                'id_user' => $id_user
            );
        }
        else{
            $data = array(
                'status'=> 'fail',
                'msg'=> 'falha no registro'
            );
        }
    }

    echo json_encode($data);

?>