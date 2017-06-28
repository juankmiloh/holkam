<?php
	header("access-control-allow-origin: *");

	include ("../conexion_bd/conexion_BD.php");

	$consecutivo = $_POST['consecutivo'];

	//generamos la consulta
	$sql = "SELECT COUNT(*) cantidad_filas,l.consecutivo,l.k_codlibro,l.n_titulo,l.v_precio,fl.n_fotografia FROM holkam_libro l,holkam_fotografia_libro fl WHERE l.k_codlibro=fl.k_codlibro AND l.consecutivo=".$consecutivo."";
	mysqli_set_charset($con, "utf8"); //formato de datos utf8

	if(!$result = mysqli_query($con, $sql)) die();

	$valores_libros = array(); //creamos un array

	while($row = mysqli_fetch_array($result)){ 
		$cantidad_filas = $row['cantidad_filas'];
		$consecutivo = $row['consecutivo'];
	    $k_codlibro = $row['k_codlibro'];
	    $n_titulo = $row['n_titulo'];
	    $v_precio = $row['v_precio'];
	    $n_fotografia = $row['n_fotografia'];

	    $valores_libros[] = array('cantidad_filas'=> $cantidad_filas,
	    						  'consecutivo'=> $consecutivo,
	    						  'k_codlibro'=> $k_codlibro,
				           		  'n_titulo'=> $n_titulo,
				           		  'v_precio'=> $v_precio,
				           		  'n_fotografia'=> $n_fotografia);
	}
	    
	//desconectamos la base de datos
	$close = mysqli_close($con) or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

	//Creamos el JSON
	$json_string = json_encode($valores_libros);
	echo $json_string;
?>