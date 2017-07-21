<?php
    session_start();
    session_destroy();
 
	header("location: ../libreria_universitaria.html?tim=".(time()-3600*5));
?>