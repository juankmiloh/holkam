<?php
	header("access-control-allow-origin: *");
	header("Content-Type: text/html; charset=iso-8859-1");
	ob_start(); //Linea para permitir enviar flujo de datos por url al redireccionar la pagina 
	include("./email/phpmailer.php");
	error_reporting(0); // Desactivar toda notificación de error

	//print_r($_FILES["archivo_adjunto"]);
	$nombre_archivo = $_FILES["archivo_adjunto"]["name"];

	$numero_check=$_POST["numero_check"];
	$nombre_texto=$_POST["nombre_texto"];
	$correo_cliente=$_POST["correo_cliente"];

	/*========================================================================
	* SE CARGA EL ARCHIVO DE PUBLICACION AL SERVIDOR
	*========================================================================*/

	$file_to_save = "../upload/cotizacion/".$nombre_archivo;
   	mkdir(dirname($file_to_save), 0777, true); //esta linea es para crear el directorio si no existe

	move_uploaded_file($_FILES["archivo_adjunto"]["tmp_name"], "../upload/cotizacion/".$nombre_archivo);

	/*========================================================================
	* SE CREA EL MENSAJE A ENVIAR POR CORREO ELECTRONICO
	*========================================================================*/

	$mensaje = "El usuario con correo ".$correo_cliente." envio su publicación ".$nombre_texto." ('".$nombre_archivo."') con las siguientes caracteristicas:<br><br>";

	$count = count($numero_check); //OBTIENE EL NUMERO DE CHECKS SELECCIONADOS
	$valores_check = array(); //creamos un array
    for ($i = 0; $i < $count; $i++) {
        // echo $numero_check[$i]."<br>";
        if ($numero_check[$i] == 1) {
        	$mensaje .= "* Tiene corrección de estilo<br>";
        }elseif ($numero_check[$i] == 2) {
        	$mensaje .= "* No tiene corrección de estilo<br>";
        }elseif ($numero_check[$i] == 3) {
        	$mensaje .= "* Ya está diagramada<br>";
        }elseif ($numero_check[$i] == 4) {
        	$mensaje .= "* No está diagramada<br>";
        }elseif ($numero_check[$i] == 5) {
        	$mensaje .= "* Tiene solo el texto<br>";
        }
    }

    // echo $mensaje;

    /*========================================================================
	* CODIGO PARA ENVIAR EL CORREO ELECTRONICO ADJUNTANDO EL ARCHIVO DE PUBLICACION
	*========================================================================*/
	$bandera="";
    $smtp=new PHPMailer();

	# Indicamos que vamos a utilizar un servidor SMTP
	$smtp->IsSMTP();

	# Definimos el formato del correo con UTF-8
	$smtp->CharSet="UTF-8";

	# autenticación contra nuestro servidor smtp
	$smtp->SMTPAuth   = true;
	$smtp->SMTPSecure = "ssl";
	$smtp->Host       = "smtp.gmail.com";
	$smtp->Username   = "holkam.correo@gmail.com";
	$smtp->Password   = "holkam1234";
	$smtp->Port       = 465;
	$smtp->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only

	# datos de quien realiza el envio
	$smtp->From       = "correoQueEnviaElMensaje@miservidor.com"; // from mail
	//$smtp->FromName   = "Nombre persona que envia el correo"; // from mail name
	$smtp->FromName   = "HOLKAM"; // from mail session_name()

	# Indicamos las direcciones donde enviar el mensaje con el formato
	#   "correo"=>"nombre usuario"
	# Se pueden poner tantos correos como se deseen
	$mailTo=array(
	    "holkam.publicaciones@gmail.com"=>"Correo Administrador",
	    "juankmiloh@hotmail.com"=>"Correo Administrador"
	);

	# establecemos un limite de caracteres de anchura
	$smtp->WordWrap   = 50; // set word wrap

	# NOTA: Los correos es conveniente enviarlos en formato HTML y Texto para que
	# cualquier programa de correo pueda leerlo.

	# Definimos el contenido HTML del correo
	$contenidoHTML='<html lang="es">';
	$contenidoHTML='<head><meta http-equiv="Content-Type" content="text/html; charset=big5">';
	$contenidoHTML.='';
	$contenidoHTML.='</head><body>';    
	$contenidoHTML.=''.$mensaje.'';
	$contenidoHTML.='<br><br>Cordialmente,';
	$contenidoHTML.='<br><br><center><img src="../images/logo_holkam.png" alt="Holkam" style="width: 20%; height:auto;"></center><br><br>';
	$contenidoHTML.='</body>';
	$contenidoHTML.='</html>';

	# Definimos el contenido en formato Texto del correo
	$contenidoTexto='Visite nuestra página web: ';
	$contenidoTexto.='http://www.holkam.co.nf';

	# Definimos el subject
	$smtp->Subject="Publicacion - ".$correo_cliente;

	# Adjuntamos el archivo "leameLWP.txt" al correo.
	# Obtenemos la ruta absoluta de donde se ejecuta este script para encontrar el
	# archivo leameLWP.txt para adjuntar. Por ejemplo, si estamos ejecutando nuestro
	# script en: /home/xve/test/sendMail.php, nos interesa obtener unicamente:
	# /home/xve/test para posteriormente adjuntar el archivo leameLWP.txt, quedando
	# /home/xve/test/leameLWP.txt
	//$rutaAbsoluta=substr($_SERVER["SCRIPT_FILENAME"],0,strrpos($_SERVER["SCRIPT_FILENAME"],"/"));

	/*=============================================
	* PARTE DEL CODIGO DONDE SE ESPECIFICA LA RUTA DEL ARCHIVO PDF DEL REGISTRO DE INSPECCION QUE SE GENERA LUEGO DE ENVIAR LOS DATOS DE LA INSPECCION DESDE EL DISPOSITIVO AL SERVIDOR SE RECORRE LA CARPETA Y SE ADJUNTAN LOS PDF´s ENCONTARDOS AL ENVIO DEL CORREO ELECTRONICO
	*==============================================*/

	/*=============================================
	****************** ASCENSORES *****************
	*==============================================*/

	$directory="../upload/cotizacion"; // directorio de donde se encuentran los archivos en el servidor
	mkdir($directory, 0777, true); //esta linea es para crear el directorio si no existe
	$dirint = dir($directory);
	while (($archivo = $dirint->read()) !== false)
	{
	    if ($archivo != "." and $archivo != ".DS_Store" and $archivo != ".txt" and $archivo != "..") {
	    	if ($archivo == $nombre_archivo) {
	    		//echo $archivo;
	    		$smtp->AddAttachment("../upload/cotizacion/".$archivo, $archivo);
	    	}
	    }
	}
	//cerramos la conexion con el directorio de los archivos del servidor
	$dirint->close();

	# Indicamos el contenido
	$smtp->AltBody=$contenidoTexto; //Text Body
	$smtp->MsgHTML($contenidoHTML); //Text body HTML

	foreach($mailTo as $mail=>$name)
	{
	    $smtp->ClearAllRecipients();
	    $smtp->AddAddress($mail,$name);

	    if(!$smtp->Send())
	    {
	        //echo "<br>Error (".$mail."): ".$smtp->ErrorInfo;
	        $bandera=1;
	    }else{
	        $bandera=0;
	        //echo "<br>Envio realizado a ".$name." (".$mail.")";
	    }
	}

	/*=============================================
	* Hacemos una validacion final para corroborar que se envio el correo a todos los destinatarios, 
	* poder enviar un mensaje de exito y poder borrar los archivos PDF de registros de inspecciones
	*==============================================*/
	if($bandera == 0){
	    /*=============================================
	    ****************** ASCENSORES *****************
	    *==============================================*/

	    $directory="../upload/cotizacion"; // directorio de donde se encuentran los archivos en el servidor
	    $dirint = dir($directory);
	    while (($archivo = $dirint->read()) !== false)
	    {
	        if ($archivo != "." and $archivo != ".DS_Store" and $archivo != ".txt" and $archivo != "..") {
	        	if ($archivo == $nombre_archivo) {
		    		//echo $archivo;
		            unlink("../upload/cotizacion/".$archivo);
		            header("location: ./publica_texto_independiente.php?correo_enviado=si");
		    	}
	        }
	    }
	    //cerramos la conexion con el directorio de los archivos del servidor
	    $dirint->close();
	}

	//echo $bandera;
	ob_end_flush();
?>