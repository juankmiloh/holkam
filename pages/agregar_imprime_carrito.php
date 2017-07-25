<?php
//Inicia sesión
if(!session_id()){
    session_start();
}

require_once "funciones.php";

// GET necesarios
// obtenerGet("id-seccion",1);
// obtenerGet("unidades", 1);
// obtenerGet("total",1);
// obtenerSesion("username", 3)->cli_id;

// obtenerGet("caracNombre".$i,2)
// obtenerGet("caracValor".$i,2)
// ultimoIDInsertado("pedido_actual_imprime_seccion", "pais_id")

if(obtenerSesion("username",3) == ""){
	header("location: carrito_compras.php?ex=noSesion");exit;
}

$sqlInsertarPedido = "INSERT INTO pedido_actual_imprime_seccion (is_id, pais_cantidad, pais_valor_total, cli_id, pais_activo)
					VALUES (".obtenerGet("id-seccion",1).",
							".obtenerGet("unidades", 1).",
							".obtenerGet("total",1).",
							".obtenerSesion("username", 3)->cli_id.",
							1)";
$queryInsertarPedido = prepararQuery($sqlInsertarPedido);
$resultInsertarPedido = ejecutarQuery($queryInsertarPedido);
if($resultInsertarPedido){
	for ($i=1; $i < 10; $i++) { 
		if(obtenerGet("caracNombre".$i,2) != "" && obtenerGet("caracValor".$i,2) != ""){
			$sqlInsertCaract = "INSERT INTO caracteristica_imprime_seccion (cis_nombre,cis_valor,pais_id)
								VALUES ('".utf8_encode(obtenerGet("caracNombre".$i,2))."',
										'".utf8_encode(obtenerGet("caracValor".$i,2))."',
										".ultimoIDInsertado("pedido_actual_imprime_seccion", "pais_id").")";
			$queryInsertCaract = prepararQuery($sqlInsertCaract);
			$resultInsertCaract = ejecutarQuery($queryInsertCaract);
			if($resultInsertCaract){
				header("location: carrito_compras.php?ex=Agregado");
			}else{
				header("location: carrito_compras.php?ex=Err2");
			}
		}
	}
}else{
	header("location: carrito_compras.php?ex=Err1");
}
?>