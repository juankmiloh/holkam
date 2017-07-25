<?php
	header("access-control-allow-origin: *");
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include ("../conexion_bd/conexion_BD.php");

	//GENERAMOS LA CONSULTA PARA SABER CUANTAS CATEGORIAS EXISTEN
	$sql = "SELECT * FROM libro_genero ORDER BY k_codgenero ASC";
	mysqli_set_charset($con, "utf8"); //formato de datos utf8
	if(!$result = mysqli_query($con, $sql)) die();
	$total_categorias=mysqli_num_rows($result);

	//echo $total_categorias;

	$valores_categoria = array(); //CREAMOS UN ARRAY PARA GUARDAR LOS DATOS FINALES A DEVOLVER EN JSON
	$contador_libros = 0;
	//POR MEDIO DE UN FOR VAMOS A IR CONSULTANDO Y OBTENIENDO EL NUMERO DE LIBROS QUE HAY POR CATEGORIA
	for ($i=1; $i < $total_categorias; $i++) { 
		$sql = "SELECT l.*,lg.* FROM libro l, libro_genero lg WHERE l.k_codgenero=lg.k_codgenero AND l.k_codgenero=".$i."";
		mysqli_set_charset($con, "utf8"); //formato de datos utf8
		if(!$result = mysqli_query($con, $sql)) die();
		$numero_libros=mysqli_num_rows($result);
		$contador_libros += $numero_libros;
		//echo $numero_libros;

		//GENERAMOS UNA CONSULTA A LA TABLA GENERO PARA SABER EL NOMBRE DEL GENERO
		$sql = "SELECT * FROM libro_genero WHERE k_codgenero=".$i."";
		mysqli_set_charset($con, "utf8"); //formato de datos utf8
		if(!$result = mysqli_query($con, $sql)) die();
		$row = mysqli_fetch_array($result);
		$n_genero = $row['n_genero'];
		//echo $n_genero;

		$valores_categoria[] = array('k_codgenero'=> $i,
								     'n_genero'=> $n_genero,
									 'numero_libros'=> $numero_libros);
	}
	    
	//desconectamos la base de datos
	$close = mysqli_close($con) or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

	//Creamos el JSON
	$json_string = json_encode($valores_categoria);
	echo $json_string;
	//echo $contador_libros;
?>