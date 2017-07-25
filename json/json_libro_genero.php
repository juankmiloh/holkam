<?php
	header("access-control-allow-origin: *");
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include ("../conexion_bd/conexion_BD.php");

	$consecutivo = $_POST['consecutivo'];

	//generamos la consulta
	$sql = "SELECT * FROM libro_genero";
	mysqli_set_charset($con, "utf8"); //formato de datos utf8

	if(!$result = mysqli_query($con, $sql)) die();

	$valores_libro_genero = array(); //creamos un array

	while($row = mysqli_fetch_array($result)){ 
	    $k_codgenero = $row['k_codgenero'];
	    $n_genero = $row['n_genero'];

	    $valores_libro_genero[] = array('k_codgenero'=> $k_codgenero,
				           		  		'n_genero'=> $n_genero);
	}
	    
	//desconectamos la base de datos
	$close = mysqli_close($con) or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

	//Creamos el JSON
	$json_string = json_encode($valores_libro_genero);
	echo $json_string;
?>