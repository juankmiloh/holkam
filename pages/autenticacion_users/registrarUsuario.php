<?php
//Inicia sesión
if(!session_id()){
    session_start();
}
require_once "../funciones.php";


$nombre = obtenerPost("nombre",2);
$apellido = obtenerPost("apellido",2);
$email = obtenerPost("email", 2);
$pass = obtenerPost("pass", 2);
$cedula = obtenerPost("cedula",1);
$celular = obtenerPost("celular",1);
$fecha = crearAhora();
$pass =  password_hash($pass, PASSWORD_DEFAULT);

$sql = "SELECT * FROM cliente WHERE cli_email = '$email' LIMIT 1";
$query = prepararQuery($sql);
$result = ejecutarQuery($query);
if($result){
	$emailExist = $query->fetchObject();
	if($emailExist == true){
		header("Location: nueva_cuenta.php?err=1");exit;
	}
}


$sqlInsertarUsuario = "INSERT INTO cliente (cli_nombre, cli_apellido, cli_email, cli_pass, cli_fecha_registro, cli_estado, cli_rol, cli_cedula, cli_celular)
						VALUES ('$nombre', '$apellido', '$email', '$pass', '$fecha', 1, 1, $cedula, $celular)
						";

$queryInsertarUsuario = prepararQuery($sqlInsertarUsuario);
$resultInsertarUsuario = ejecutarQuery($queryInsertarUsuario);

if($resultInsertarUsuario){
	header("Location: login.php?exi=1");exit;
}

?>