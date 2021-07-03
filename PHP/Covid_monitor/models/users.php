<?php

require_once('../db/conexao.php');

class Users
{
    public $conn;

    public function __construct()
    {
        $this->conn = Conexao::getInstance();
    }

    public function login($username, $pass)
    {
        $cursor = $this->conn->prepare("SELECT * FROM users WHERE username=:username and senha=:senha");
        $cursor->execute(array(":username"=>$username, ":senha"=>$pass));

        if ($cursor->rowCount()) {
            $row = $cursor->fetch();
            return array("username"=>$row['username']);

        } else {
            return 0;
        }
    }

    public function register($username, $email, $pass)
    {
        $cursor = $this->conn->prepare("INSERT INTO users (username, email, senha) value (:username,:email,:senha)");
        $cursor->execute(array(":username"=>$username,":email"=> $email,":senha"=>$pass));

        if($cursor->rowCount()) {
            return 1;
        } else {
            return 0;
        }

    }
}

