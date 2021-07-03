<?php

require_once('../db/conexao.php');

class Monitor
{
    public $conn;

    public function __construct()
    {
        $this->conn = Conexao::getInstance();
    }

    public function get_contries()
    {
        $countries = Array();
        $cursor = $this->conn->prepare("SELECT DISTINCT country FROM covid");
        $cursor->execute();

        if ($cursor->rowCount()) {
            while($row = $cursor->fetch()) {
                $country = $row['country'];
                array_push($countries, $country);
            }
            return $countries;
        } else {
            return 0;
        }
    }

}
