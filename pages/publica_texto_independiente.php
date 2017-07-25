<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Publica tu texto / Holkam</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos-publicatexto.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos-barra-header.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos-footer.css">
	<link rel="stylesheet" type="text/css" href="../css/fileinput.min.css">


	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/fileinput.min.js"></script>

	<script src="../js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../css/sweetalert2.min.css">
	
	<link rel="stylesheet" href="../dist/css/bootstrap-submenu.min.css">
	<script src="../js/funsubmenu.js"></script>
	<script src="../dist/js/bootstrap-submenu.min.js" defer></script>
	<script src="../javascript/script_btn_login.js"></script>

	<script src="../javascript/script_publica_texto.js"></script>
	
</head>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<?php
	/*=============================================
	* SE VERIFICA QUE EXISTA LA VARIABLE correo_eviado Y SI SU VALOR ESTA EN SI SE MUESTRA UNA ALERTA DE EXITO
	*==============================================*/
	if (isset($_GET['correo_enviado'])) {
		$correo_enviado = $_GET['correo_enviado'];
		if ($correo_enviado == "si") {
			echo "<script language='javascript'>"; 
			echo "swal({
			        title: 'BUEN TRABAJO!',
			        type: 'success',
			        html: 'Publicación enviada con éxito.',
			        showCloseButton: false,
			        showCancelButton: false,
			        allowOutsideClick: false
			      }).then(function () {
				  	window.location = './publica_texto_independiente.php';
				  });;";
			echo "</script>";
		}
	}
?>
<a name="arriba"></a> <!--ESTO ES PARA CUANDO SE ESTE ENVIANDO EL CORREO, SE DEVUELVA A LA PARTE DE ARRIBA DE LA PAGINA-->
<!-- DIV's de imagen de carga oculto -->
<div class="fbback"></div>

<div class="container" id="fbdrag1">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="fb">
                <!--<span class="close" onclick="dragClose('fbdrag1')"></span>-->
                <div class="dheader">HOLKAM / PUBLICA</div>
                <div class="dcontent">
                    <div style="text-align:center;padding-top:20px">
                        <center>
                            <img src="../images/loading.gif" alt="Loading...">
                            <br><br>
                            <label id="texto_carga" style="color: black;"></label>
                        </center>
                    </div>
                    <br>
                    <!--<div style="padding-top:15px;text-align:center">
                        <span class="buttonx" onclick="dragClose('fbdrag1')">Close</span>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid cuerpo">
	<header>
		<div class="container">
			<nav class="navbar navbar-default navbar-fixed-top navbar-color">
				<div class="container">
					<div class="navbar-header">
						<a href="../index.html" class="navbar-brand imagen-barra navbar-fixed-top">
					    	<img class="ocultar-nav" alt="Brand" src="../images/Cuadrado Barra de Herramientas.png">
					    	<img class="mostrar-nav" alt="Brand" src="../images/barra_pequena.png">
					    </a>
						<button type="button" class="navbar-toggle collapsed navbar-fixed-top" data-toggle="collapse" data-target="#navbar-1">
							<span class="sr-only">Menu</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<div class="collapse navbar-collapse pull-right" id="navbar-1">
						<ul class="show-menu nav navbar-nav  navbar-right">
							<li ><a></a></li>
							<li ><a></a></li>
							<li class="mov"><a href="impresion_principal.html">Impresión</a></li>
							<li class="mov"><a href="moda.html">Moda</a></li>
							<li class="mov"><a href="#">Juegos</a></li>
							<li class="mov"><a href="#">Software</a></li>
							<li class="mov"><a href="#">Conócenos</a></li>	
							<li>
								<a class="imagen-carro" href="carrito_compras.php">
							    	<img alt="Brand" src="../images/Carro.png">
							    </a>
						    </li>	
						</ul>
					</div>


					<div class="container navbar-fixed-top"><a href="publica_texto.html"><div class="btn-atras" title="Atras"></div></a>
						<a href="../index.html"><div class="imagen"></div>
							<div class="referencia-index col-sm-3 col-md-3"></div>
						</a>
						<ul class="col-sm-9 col-md-9 hide nav navbar-nav  navbar-right">
							<li><a></a></li>
							<li><a href="impresion_principal.html"><label class="opcion-nav">Impresión</label></a></li>
							<li><a href="moda.html"><label class="opcion-nav">Moda</label></a></li>
							<li><a href="#"><label class="opcion-nav">Juegos</label></a></li>
							<li><a href="#"><label class="opcion-nav">Software</label></a></li>
							<li><a href="#"><label class="opcion-nav">Conócenos</label></a></li>
							<li>
								<a class="navbar-brand imagen-carro" href="carrito_compras.php">
							    	<img alt="Brand" src="../images/Carro.png">
							    </a>
						    </li>		
						</ul>
					</div> 
				</div>
			</nav>
		</div>
	</header>

	<div class="contenedor-impresion col-xs-12 col-sm-12 col-md-12">
		<div class="col-xs-6 col-sm-5 col-md-4"></div>
		<div class="contenedor-tendencias-moda col-xs-6 col-sm-7 col-md-7">
			<br class="ocultar"><br class="hide mostrar"><br class="hide mostrar"><br class="ocultar"><br class="ocultar"><br class="ocultar"><br class="hide">
			<label class="texto-impresion-p">Publica</label><br class="">
			<label class="texto-demanda-p">tu texto</label>
		</div>
		<div class="col-xs-8 col-sm-5 col-md-1"></div>
	</div>
	
	<div class="container texto">
		<div class="row">
			<center>
				<div class="col-xs-12 col-sm-12 col-md-12"><span><br><p><b>Creemos</b> en tu potencial para exponer tus ideas, por eso <br> te <b>ayudamos</b> con la mejor <b>calidad y servicio</b></p><br><br></span></div>
			</center>	
		</div>
	</div>
	
	<form id="formulario" method="post" action="./publicar_texto.php" enctype="multipart/form-data">
		<div class="container-fluid texto-head-form">
			<center>
				<p style="">Este formulario nos permitirá establecer el avance de su publicación. <br> Marca de manera honesta y precisa las opciones</p>
			</center>	
		</div>
		<br>
		<center>
			<div class="container">
				<div class="row cont check-opcion">
					<table>
						<tr>
							<td><input type="checkbox" id="numero_check_1" name="numero_check[]" value="1">&nbsp;&nbsp;<span class="texto-head-form">Mi publicación tiene corrección de estilo</span></td>
						</tr>
						<tr>
							<td><input type="checkbox" id="numero_check_2" name="numero_check[]" value="2">&nbsp;&nbsp;<span class="texto-head-form">Mi publicación no tiene corrección de estilo</span></td>
						</tr>
						<tr>
							<td><input type="checkbox" id="numero_check_3" name="numero_check[]" value="3">&nbsp;&nbsp;<span class="texto-head-form">Mi publicación ya está diagramada</span></td>
						</tr>
						<tr>
							<td><input type="checkbox" id="numero_check_4" name="numero_check[]" value="4">&nbsp;&nbsp;<span class="texto-head-form">Mi publicación no está diagramada</span></td>
						</tr>
						<tr>
							<td><input type="checkbox" id="numero_check_5" name="numero_check[]" value="5">&nbsp;&nbsp;<span class="texto-head-form">Solo tengo el texto</span></td>
						</tr>
					</table><br>	
				</div>
				<br>
				<div class="row cont check-opcion">
					<div class="col-xs-6 col-sm-6"><input type="text" class="form-control" name="nombre_texto" placeholder="Adjunta tu texto" required></div>
					<div class="col-xs-6 col-sm-6">
					<input id="input_adjuntar_archivo" name="archivo_adjunto" type="file" class="file-loading" required>
					</div>&nbsp;<br>
				</div>
				<br>
				<div class="row cont">
					<div class="col-xs-12">
						<span class="texto-head-form">
						Déjanos tu correo, y así podremos enviarte una cotización detallada <br>lo más pronto posible<br>&nbsp;
						</span>
						<input type="email" class="form-control" placeholder="Tu Correo" name="correo_cliente" style="background-color: #E1DDDD;" required><br>
					</div>
					<div class="col-xs-7 col-sm-8 col-md-9"></div>
					<div class="col-xs-5 col-sm-4 col-md-3">
						<button type="submit" id="boton_enviar" class="btn btn-default">
	                        <span>Enviar</span>
	                        <span class="glyphicon glyphicon-send"></span>
	                    </button>
					</div>
				</div>
			</div>
	   	</center>
	   	<br><br><br>
	</form>
	
   <footer class="pie">
   <br>
   	
		
		<!-- Mapa del sitio pantallas pequeñas -->
		<div class="container-fluid hide-mapa">
			<div class="row">
				<nav role="navigation" class="navbar navbar-default navbar-inverse navbar col-xs-12" id="nav-mapa1">
					<ul class="nav nav-pills col-xs-12 col-sm-12 col-md-10">
						<li class="dropdown col-xs-12 col-sm-12 col-md-2">
							<a href="pages/impresion.html" class="test" data-toggle="dropdown">Impresión<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li class="dropdown-submenu">
									<a class="test" tabindex="-1">Publica</a>
									<ul class="dropdown-menu">
										<li><a href="#">Independiente</a></li>
										<li><a href="#">Universidad</a></li>
									</ul>
								</li>
								<li><a href="#">Imprime</a></li>
								<li><a href="#">Librería</a></li>
								<li class="divider"></li>
							</ul>
						</li>
						<li class="dropdown col-xs-12 col-sm-12 col-md-2">
							<a href="#" class="dropbdown-toggle" data-toggle="dropdown">Moda<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Conceptos Vanguardia</a></li>
								<li><a href="#">Nuestros Expertos</a></li>
								<li><a href="#">Nuestros Clientes</a></li>
							</ul>
						</li>
						<li class="dropdown col-xs-12 col-sm-12 col-md-2">
							<a href="#" class="dropbdown-toggle" data-toggle="dropdown">Juegos<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">opcion 1</a></li>
							</ul>
						</li>
						<li class="dropdown col-xs-12 col-sm-12 col-md-2">
							<a href="#" class="dropbdown-toggle" data-toggle="dropdown">Software<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">opcion 1</a></li>
							</ul>
						</li>
						<li class="dropdown col-xs-12 col-sm-12 col-md-2">
							<a href="#" class="dropbdown-toggle" data-toggle="dropdown">Contacto<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">opcion 1</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		

		<!--Mapa del sitio pantallas grandes-->
		<div class="container-fluid show-mapa">
			<div class="row">
				<div class="col-xs-1"></div>
				<nav role="navigation" class="navbar navbar-default navbar col-xs-10" id="nav-mapa-blanco">
					<ul class="col-md-1"></ul>
					<ul class="col-xs-12 col-sm-12 col-md-2">
						<hr class="barras-negras">
						<a href="pages/impresion.html"><h5>Impresión por demanda</h5></a>
							
						<li><a href="#">Publica</a></li>
						<ul>
							<li><a href="#">Independiente</a></li>
							<li><a href="#">Universidad</a></li>
						</ul>
						<li><a href="#">Imprime</a></li>
						<li><a href="#">Librería</a></li>
						<ul>
							<li><a href="#">Independiente</a></li>
							<li><a href="#">Universidad</a></li>
						</ul>
					</ul>
					<ul class="col-xs-12 col-sm-12 col-md-2">
						<hr class="barras-negras">
						<a href="#"><h5>Tendencias en Moda</h5></a>
						<li><a href="#">Conceptos</a></li>
						<li><a href="#">Nuestros Expertos</a></li>
						<li><a href="#">Libro tendencias</a></li>
					</ul>
					
					<ul class="col-xs-12 col-sm-12 col-md-2">
						<hr class="barras-negras">
						<a href="#"><h5>Juegos</h5></a>
						<li><a href="#">Yaxen</a></li>
					</ul>
					<ul class="col-xs-12 col-sm-12 col-md-2">
						<hr class="barras-negras">
						<a href="#"><h5>Software y Diseño</h5></a>
					</ul>
					<ul class="col-xs-12 col-sm-12 col-md-2">
						<hr class="barras-negras">
						<a href="#"><h5>Quiénes somos</h5></a>
					</ul>
					<ul class="col-md-1"></ul>
				</nav>
				<div class="col-xs-1"></div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<center>
					<div class="col-xs-12 col-sm-12 col-md-12 texto-footer"><span>® Holkam 2016 Todos los Derechos Reservados</span></div>
					<div class="col-xs-12 col-sm-12 col-md-12 texto-footer1"><span>es un proyecto de PASO Diseño Estrategico</span></div>
				</center>	
			</div>
		</div>
	</footer>
   	<br><br>
   	<div class="redes-sociales"></div>
   	<div class="redes-sociales-c">
   		<a href="#"><div id="f" class="red" title="Facebook"></div></a>
   		<a href="#"><div id="t" class="red" title="Twitter"></div></a>
   		<a href="#"><div id="g" class="red" title="Google+"></div></a>
   		<a href="#"><div id="l" class="red" title="Linkedin"></div></a>
   	</div>
   	
   	<script src="../javascript/script_redes.js"></script>
</body>
</html>


