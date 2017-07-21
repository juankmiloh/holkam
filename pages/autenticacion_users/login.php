<?php
//Inicia sesión
if(!session_id()){
    session_start();
}

require_once "../funciones.php";

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Carrito de Compras</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilos-moda.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilos-carrito.css">	
	<link rel="stylesheet" type="text/css" href="../../css/estilos-barra-header.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilos-footer.css">

	<script src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.min.js"></script>

	
	<link rel="stylesheet" href="../../dist/css/bootstrap-submenu.min.css">
	<script src="../../js/funsubmenu.js"></script>
	<script src="../../dist/js/bootstrap-submenu.min.js" defer></script>

	<title>Ingresar</title>
</head>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">

<div class="container-fluid cuerpo">

	<header>
		<div class="container">
			<nav class="navbar navbar-default navbar-fixed-top navbar-color">
				<div class="container">
					<div class="navbar-header">
						<a href="../index.html" class="navbar-brand imagen-barra navbar-fixed-top">
					    	<img class="ocultar-nav" alt="Brand" src="../../images/Cuadrado Barra de Herramientas.png">
					    	<img class="mostrar-nav" alt="Brand" src="../../images/barra_pequena.png">
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
							<li class="mov"><a href="../impresion_principal.html">Impresión</a></li>
							<li class="mov"><a href="../moda.html">Moda</a></li>
							<li class="mov"><a href="#">Juegos</a></li>
							<li class="mov"><a href="#">Software</a></li>
							<li class="mov"><a href="#">Conócenos</a></li>	
							<li><a class="imagen-carro" href="../carrito_compras.php">
							    	<img alt="Brand" src="../../images/Carro.png">
							    </a>
						    </li>	
						</ul>
					</div>


					<div class="container navbar-fixed-top"><a href="../libreria_universidad.php"><div class="btn-atras" title="Atras"></div></a>
						<a href="../../index.html">
							<div class="referencia-index col-sm-3 col-md-3"></div>
						</a>
						<ul class="col-sm-9 col-md-9 hide nav navbar-nav  navbar-right">
								<li><a></a></li>
								<li><a href="../impresion_principal.html"><label class="opcion-nav">Impresión</label></a></li>
								<li><a href="../moda.html"><label class="opcion-nav">Moda</label></a></li>
								<li><a href="#"><label class="opcion-nav">Juegos</label></a></li>
								<li><a href="#"><label class="opcion-nav">Software</label></a></li>
								<li><a href="#"><label class="opcion-nav">Conócenos</label></a></li>
								<li><a class="navbar-brand imagen-carro" href="../carrito_compras.php">
								    	<img alt="Brand" src="../../images/Carro.png">
								    </a>
							    </li>		
						</ul>
					</div> 
				</div>
			</nav>
		</div>
	</header>

	<div class="contenedor-carrito col-xs-12 col-sm-12 col-md-12">	</div>

	<div class="container texto">
		<div class="row">
			<center>
				<div class="col-xs-12 col-sm-12 col-md-12"><span><br><p><b>Regístrate e ingresa. </b>para finalizar tu compra y disfrutar de los<br> productos de la familia Holkam</p><br>Ingreso</span></div>
			</center>	
		</div>
	</div>
	
	<div class="container cuerpo">
		<center>
			
			<?php
				if (obtenerGet("error", 1)){
					switch(obtenerGet("error", 1)){
						case 1:
						?>
						<br><center><div style="color: red;">El usuario o la contraseña no son válidas</div></center>
						<?php
						break;
						case 2:
						?>
						<br><center><div style="color: red;">Sesión cerrada</div></center>
						<?php
						break;
						case 3:
						?>
						<br><center><div style="color: red;">El usuario ya existe</div></center>
						<?php
						break;
						case 4:
						?>
						<br><center><div style="color: red;">El usuario está inactivo!</div></center>
						<?php
						break;
					} 
				}

				if(obtenerGet("exi", 1)){
					switch (obtenerGet("exi", 1)) {
						case 1:
							?>
							<br><center><div style="color: green;">Usuario Registrado con exito</div></center>
							<?php
							break;
					}
				}
			?>
		</center>
		

		<div class="row">
			<form method="post" action="manejador.php">

				<div class="col-xs-12 col-sm-3 col-md-4"></div>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<input class="form-control" name="name" type="text" placeholder="Email" required autofocus autocomplete="off">
				</div>
				<div class="col-xs-12 col-sm-3 col-md-4"></div>
		</div>
		<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-4"></div>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<br><input class="form-control" name="password" type="password" placeholder="Password" required autofocus>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-4"></div>
		</div>
		<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-4"></div>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<br>
					<center>
							<input class="btn btn-default btn-opcion" name="submit" type="submit" value="Ingresar">
							<hr>
					</center>

				</div>
				<div class="col-xs-12 col-sm-6 col-md-4"></div>
			</form>
		</div>
		
		<center>Regístrate para comprar <a href="nueva_cuenta.php">aquí</a></center>
		<br>
	</div>

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
						<a href="../impresion.html"><h5>Impresión por demanda</h5></a>
							
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
   	
   	<script>
   		$(document).ready(function(){

		$(".redes-sociales-c").hide();

		$(".redes-sociales").click(function(){
			if($(".redes-sociales-c").is(":visible")){
				$(".redes-sociales-c").hide(500);
				$(this).css("background-image","url('../../images/redes/right.png')");
				$(this).css("left","15px");
			}else{
				$(".redes-sociales-c").show(500);
				$(this).css("background-image","url('../../images/redes/left.png')");
				$(this).css("left","41px");
			}
			
		});
	});
   	</script>

</div>

	
</body>
</html>