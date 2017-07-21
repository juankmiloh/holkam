<?php

//Inicia sesión
if(!session_id()){
    session_start();
}

require_once "funciones.php";

$id = obtenerGet("id",1);

// Si no hay sesion iniciada redirecciona al carrito directamente
if(obtenerSesion("username",3) == ""){
	header("location: carrito_compras.php?ex=noSesion");
}


// Se verifica que el libro a agregar no esté ya agregado al usuario actual
$user = obtenerSesion("username", 3)->cli_id;
$sqlBuscarLibro = "
SELECT * 
FROM pedido_actual 
WHERE pedAct_codLib = $id 
AND ped_usuario_id = $user";
$queryLibro = prepararQuery($sqlBuscarLibro);
$resultLibro = ejecutarQuery($queryLibro);


// Se busca el libro con el fin de saber su precio
$sqlLibro = "SELECT * FROM libro WHERE k_codlibro = $id";
$queryLib = prepararQuery($sqlLibro);
$resultLib = ejecutarQuery($queryLib);
$libro = $queryLib->fetchObject();
$precioLibro = $libro->v_precio;


if($resultLibro){
	$object = $queryLibro->fetchObject();
	// Cuando un usuario logueado trata de agregar un libro que ya está en el carrito
	if(@$object->pedAct_id != ""){
		header("location: carrito_compras.php?ex=yaEsta");
	}else{
		$sqlInsertLib = "INSERT INTO pedido_actual (pedAct_codLib, pedAct_cantLib, ped_usuario_id, ped_total) VALUES ($id, 1, $user, $precioLibro)";
		$queryInsertLibro = prepararQuery($sqlInsertLib);
		$resultInsertLibro = ejecutarQuery($queryInsertLibro);
		if($resultInsertLibro){
			header("location: carrito_compras.php?ex=Agregado");
		}
	}
}

?>