<?php
//Inicia sesión
if(!session_id()){
    session_start();
}

require_once "funciones.php";

$msj = "";
if(obtenerSesion("username", 3) == ""){
	$msj .= "<a href='autenticacion_users/login.php'><div class='login' title='Ingresar'></div></a>";
}else{
	$msj .= "<a href='autenticacion_users/logout.php'><div class='logout' title='Salir'></div></a>";
}
echo json_encode($msj);
?>