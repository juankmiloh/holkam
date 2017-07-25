<?php
	/*
	* conexion con la base de datos del servidor co.nf
	*/
	// $con = mysqli_connect("fdb3.biz.nf","2171105_carrito","holkam1234","2171105_carrito");
	// // Check connection
	// mysqli_query($con, "SET NAMES 'UTF8'");
	// if (mysqli_connect_error()){
	//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	// }
	//echo 'Conectado satisfactoriamente';
?>

<?php
	/*
	* conexion con la base de datos local
	*/
    $con = mysqli_connect("localhost","root","root","holkam_bd");
    // Check connection
    mysqli_query($con, "SET NAMES 'UTF8'");
    if (mysqli_connect_error())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
 	//echo 'Conectado satisfactoriamente';
?>

<?php
	/*
	* conexion con la base de datos del servidor byethost
	*/
 //    $con = mysqli_connect("sql311.byethost11.com","b11_20432622","holkam1234","b11_20432622_holkam_bd");
 //    // Check connection
 //    mysqli_query($con, "SET NAMES 'UTF8'");
 //    if (mysqli_connect_error())
	// {
	// 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	// }
 	//echo 'Conectado satisfactoriamente';
?>