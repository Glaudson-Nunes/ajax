<?php

include_once('../database/config.php');
include_once('../function/frequenciaFunction.php');


$opcao = $_POST['s'];

switch ($opcao) {

    case "1": f1();
        break;
    default:
        echo ("Serviço não disponível!");
}
exit;

function f1(){

    echo listar_calendar();
}





?>