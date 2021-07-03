<?php
session_start();


require_once('../models/monitor.php');
header('Content-Type: application/json');

$monitor = new Monitor();

$option = $_POST['option'];

if($option == "get_countries") {
    $result = $monitor->get_contries();
    echo json_encode($result);
} elseif ($option == "graph_plot") {
    $country = $_POST['country'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];
    if($country != 'País' && $mes != 'Mês' && $ano != 'Ano' ) {
        $ano = substr($ano,2);
        $date = '\''. $mes. '/%/'. $ano. '\'';
        $query = 'country = \''. $country .'\' and date_case like '. $date;
        $result = $monitor->return_data($query);
        echo json_encode($result);
    } elseif ($mes == 'Mês') {
        $ano = substr($ano,2);
        $date = '\'%/%/'. $ano. '\'';
        $query = 'country = \''. $country .'\' and date_case like '. $date;
        $result = $monitor->return_data($query);
        echo json_encode($result);
    } else {
        $result = array('msg'=> 'Problema interno');
        echo json_encode($result);

    }

}