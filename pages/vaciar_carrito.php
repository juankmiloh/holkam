<?php
if(!session_id()){
    session_start();
}

require_once "funciones.php";

$user = obtenerSesion("username",3)->cli_id;

$sqlVaciar = "DELETE FROM pedido_actual WHERE ped_usuario_id = $user";
$queryVaciar = prepararQuery($sqlVaciar);
$resultVaciar = ejecutarQuery($queryVaciar);
header("location: libreria_universitaria.html?tim=".(time()-3600*5));


?>