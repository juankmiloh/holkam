<?php
	// $con = mysqli_connect("fdb3.biz.nf","2171105_carrito","holkam1234","2171105_carrito");
	// // Check connection
	// mysqli_query($con, "SET NAMES 'UTF8'");
	// if (mysqli_connect_error()){
	//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	// }
	// //echo 'Conectado satisfactoriamente';
?>

<?php
	/*
	* conexion con la base de datos del servidor co.nf
	*/
    $con = mysqli_connect("localhost","root","root","2171105_carrito");
    // Check connection
    mysqli_query($con, "SET NAMES 'UTF8'");
    if (mysqli_connect_error())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
    //echo 'Conectado satisfactoriamente';
?>