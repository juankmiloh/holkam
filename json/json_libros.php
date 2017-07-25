<?php
	header("access-control-allow-origin: *");
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include ("../conexion_bd/conexion_BD.php");

	$consecutivo = $_POST['consecutivo'];

	//generamos la consulta
	$sql = "SELECT l.*,fl.n_fotografia FROM libro l,libro_fotografia fl WHERE l.k_codlibro=fl.k_codlibro";
	mysqli_set_charset($con, "utf8"); //formato de datos utf8

	if(!$result = mysqli_query($con, $sql)) die();

	$valores_libros = array(); //creamos un array

	while($row = mysqli_fetch_array($result)){ 
		$consecutivo = $row['consecutivo'];
	    $k_codlibro = $row['k_codlibro'];
	    $n_titulo = $row['n_titulo'];
	    $n_autor = $row['n_autor'];
	    $k_codgenero = $row['k_codgenero'];
	    $v_cod_isbn = $row['v_cod_isbn'];
	    $n_editorial = $row['n_editorial'];
	    $v_num_pagina = $row['v_num_pagina'];
	    $v_precio = $row['v_precio'];
	    $n_fotografia = $row['n_fotografia'];

	    $valores_libros[] = array('consecutivo'=> $consecutivo,
	    						  'k_codlibro'=> $k_codlibro,
				           		  'n_titulo'=> $n_titulo,
				           		  'n_autor'=> $n_autor,
				           		  'k_codgenero'=> $k_codgenero,
				           		  'v_cod_isbn'=> $v_cod_isbn,
				           		  'n_editorial'=> $n_editorial,
				           		  'v_num_pagina'=> $v_num_pagina,
				           		  'v_precio'=> $v_precio,
				           		  'n_fotografia'=> $n_fotografia);
	}
	    
	//desconectamos la base de datos
	$close = mysqli_close($con) or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

	//Creamos el JSON
	$json_string = json_encode($valores_libros);
	echo $json_string;
?>