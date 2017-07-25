<?php
	header("access-control-allow-origin: *");
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include ("../conexion_bd/conexion_BD.php");

	//$nombre_genero = $_POST['nombre_genero'];


	$json = file_get_contents('php://input');
	$obj = json_decode($json);
	//Nombre del libro.
	$k_codgenero = $obj->libro->k_codgenero;
	//echo $nombre_genero;

	//generamos la consulta
	$sql = "SELECT l.*,lg.n_genero,lf.n_fotografia FROM libro l,libro_genero lg,libro_fotografia lf WHERE l.k_codlibro=lf.k_codlibro AND l.k_codgenero=lg.k_codgenero AND l.k_codgenero=".$k_codgenero."";

	mysqli_set_charset($con, "utf8"); //formato de datos utf8

	if(!$result = mysqli_query($con, $sql)) die();

	$valores_libro = array(); //creamos un array

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

	    $valores_libro[] = array('consecutivo'=> $consecutivo,
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
	$json_string = json_encode($valores_libro);
	echo $json_string;
?>