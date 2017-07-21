<?php
//Inicia sesión
if(!session_id()){
    session_start();
}
require_once "../funciones.php";



$nombre = obtenerGet("us", 2);

$sqlUsuarioRegistrado = "SELECT * FROM cliente WHERE cli_email = '$nombre'";
$queryUsuarioRegistrado = prepararQuery($sqlUsuarioRegistrado);
$resultUsuarioRegistrado = ejecutarQuery($queryUsuarioRegistrado);
if($resultUsuarioRegistrado){
	$usuario = $queryUsuarioRegistrado->fetchObject();
	if($usuario == TRUE){
		echo "1";	
	}else{
		echo "0";
	}
	
}else{
	echo "0";
}


?>