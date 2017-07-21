<?php
//Inicia sesión
if(!session_id()){
    session_start();
}

$cont = 0;
require_once "../funciones.php";
	
if(obtenerPost("name",2)){
	$nombre = obtenerPost("name",2);
}

if(obtenerPost("password", 2)){
	$password = obtenerPost("password", 2);
	// $password = password_hash(obtenerPost("password", 2), PASSWORD_DEFAULT);
}

$sqlUsuario = "SELECT * FROM cliente
				WHERE cli_email = '$nombre' 
				LIMIT 1
				";

$queryUsuario = prepararQuery($sqlUsuario);
$resultQuery = ejecutarQuery($queryUsuario);
if($resultQuery){
	$user = $queryUsuario->fetchObject();
	if($user == TRUE){
		if(password_verify($password, $user->cli_pass)){
			if($user->cli_estado == 1){
				guardarSesion("username", $user);
		        guardarSesion("userId", $user->cli_id);
		        header('location: ../vaciar_carrito.php');	
			}else{
				header("location: login.php?error=4");
			}
		}else{
			header("location: login.php?error=1");
		}
		
	}else{
		header("location: login.php?error=1");
	}
	
}else{
	header("location: login.php?error=1");
}

?>
