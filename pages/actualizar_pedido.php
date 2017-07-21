<?php
if(!session_id()){
    session_start();
}

require_once "funciones.php";

$id = obtenerGet("id",1);
$cantidad = obtenerGet("cant",1);
$total = obtenerGet("tot",1);

$usuario = obtenerSesion("username",3)->cli_id;

$sql = "UPDATE pedido_actual SET pedAct_cantLib = $cantidad, ped_total = $total WHERE pedAct_id = $id";
$query = prepararQuery($sql);
$result = ejecutarQuery($query);

$sqlSuma = "SELECT SUM(ped_total) AS sumaTotal FROM pedido_actual WHERE ped_usuario_id = $usuario";
$querySuma = prepararQuery($sqlSuma);
$resultSuma = ejecutarQuery($querySuma);

if($resultSuma){
	$suma = $querySuma->fetchObject();
	echo $suma->sumaTotal;
}else{
	echo "0";
}
?>