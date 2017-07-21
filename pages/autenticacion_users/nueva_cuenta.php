<?php
//Inicia sesión
if(!session_id()){
    session_start();
 }
require_once "../funciones.php";


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Carrito de Compras</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilos-moda.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilos-carrito.css?<?php echo date('YmdHis'); ?>">	
	<link rel="stylesheet" type="text/css" href="../../css/estilos-barra-header.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilos-footer.css">
	
	<script src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.min.js"></script>

	
	<link rel="stylesheet" href="../../dist/css/bootstrap-submenu.min.css">
	<script src="../../js/funsubmenu.js"></script>
	<script src="../../dist/js/bootstrap-submenu.min.js" defer></script>

	<script src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.min.js"></script>

	<script type="text/javascript">

		$(document).ready(function(){

			$("#alerta").hide();
			$("#alerta2").hide();

			<?php
				if (obtenerGet("err", 1)){
					switch(obtenerGet("err", 1)){
						case 1:
						?>
						$("#alerta3").show();
						<?php
						break;
					} 
				}else{
					?>
					$("#alerta3").hide();
					<?php
				}

			?>
			$("#alerta4").hide();
			
			$("#passv").blur(function(){
				var pass = $("#pass").val();
				var passv = this.value;
				if(pass != passv){
					$("#alerta").show();
					$("#alerta2").hide();
					$("#alerta3").hide();
				}else{
					$("#alerta").hide();
				}
			});

			$("#pass").blur(function(){
				var pass = this.value;
				if(pass == ""){
					$("#alerta4").show();		
				}
			});
			

			$("#email").blur(function(){
				var nombre = this.value;
				var urlverificar = "verificarUsuario.php?us="+nombre;
				$.get(urlverificar, function(data,status){
					if(data == "1"){
						$("#alerta3").show();
						$("#alerta").hide();
						$("#alerta2").hide();
						$("#email").val("");
					}else{
						$("#alerta3").hide();
					}
				});
			});

			$("#email").focus(function(){
				$("#alerta3").hide();
			});

			$("#pass").focus(function(){
				$("#alerta4").hide();
			});

			$("#passv").focus(function(){
				$("#alerta").hide();
			});
			
		});
		
		function validar(){
			
			var nombre = $("#nombre").val();
			var apellido = $("#apellido").val();
			var email = $("#email").val();
			var pass = $("#pass").val();
			var passv = $("#passv").val();
			var cedula = $("#cedula").val();
			var celular = $("#celular").val();

			if(nombre != "" && apellido != "" && email != "" && pass != "" && passv != "" && cedula != "" && celular != ""){
				if (pass == passv) {
					$("#alerta2").hide();
					var r = confirm("Registrar Usuario?");
					if(r == true){

						return true;
					}else{
						return false;
					}	
				}else{
					$("#alerta").show();
					return false;	
				}
				
			}else{
				$("#alerta2").show();
				$("#alerta").hide();
				$("#alerta3").hide();
				return false;
			}
			
		}
	</script>
	<title>Crear Cuenta</title>
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


					<div class="container navbar-fixed-top"><a href="../carrito_compras.php"><div class="btn-atras" title="Atras"></div></a>
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
				<div class="col-xs-12 col-sm-12 col-md-12"><span><br><p><b>Finaliza tu compra. </b>Te esperamos, vuelve y disfruta de los<br> productos de la familia Holkam</p><br></span></div>
			</center>
		</div>
	</div>

	<div class="container cuerpo">

		<div class="row">
			<!-- _____________ 1. Información Personal _____________________-->
			<form method="post" action="registrarUsuario.php" onsubmit="return validar()">
			<div class="col-xs-12 col-md-4">
				<label class="titulo-seccion">1. Información Personal</label>
				<center>
					<label id="alerta2" style="color: red;">Todos los campos son obligatorios</label>
					
				</center>
				<div class="row">
					<div class="col-xs-12">
						<label class="campo-form">Correo*</label>
						<input type="email" class="entrada-1" name="email" id="email">
						<label id="alerta3" style="color: red;">El usuario ya existe</label>
					</div>
				</div>
					
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<label class="campo-form">Nombre*</label><br>
						<input type="text" class="entrada-1" name="nombre" id="nombre">
					</div>
					<div class="col-xs-12 col-sm-6">
						<label class="campo-form">Apellido*</label><br>
						<input type="text" class="entrada-1" name="apellido" id="apellido">
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<label class="campo-form">Cédula Ciudadanía*</label><br>
						<input type="text" class="entrada-1" name="cedula" id="cedula" maxlength="10">
					</div>
					<div class="col-xs-12 col-sm-6">
						<label class="campo-form">Celular*</label><br>
						<input type="text" class="entrada-1" name="celular" id="celular" maxlength="10">
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<label class="campo-form">Contraseña*</label><br>
						<input type="password" class="entrada-1" name="pass" id="pass">
						<label id="alerta4" style="color: red;">Llena este campo</label>
					</div>
					<div class="col-xs-12 col-sm-6">
						<label class="campo-form">Repetir Contraseña*</label><br>
						<input type="password" class="entrada-1" name="passv" id="passv">
						<label id="alerta" style="color: red;">Rectifique contraseña</label>
					</div>
				</div>
				<center><br>
					<input type="submit" name="" value="Registrar Usuario" class="form-control btn-opcion">
				</center>
				
				<!-- _______________________________________________________ -->
			</div>

			<div class="col-xs-12 col-md-4">
				<!-- _____________ 2. Dirección del envío _____________________-->
				<label class="titulo-seccion">2. Dirección del envío</label>

				<div class="row">
					<div class="col-xs-12">
						<label class="campo-form">Ciudad*</label>
						<input type="email" class="entrada-1" name="">
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<label class="campo-form">Municipio*</label>
						<input type="email" class="entrada-1" name="">
					</div>
				</div>	

				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<label class="campo-form">Barrio*</label>
						<input type="text" class="entrada-1" name="">
					</div>
					<div class="col-xs-12 col-sm-6">
						<label class="campo-form">Direccion*</label>
						<input type="text" class="entrada-1" name="">
					</div>
				</div>	

				<div class="row">
					<div class="col-xs-12">
						<label class="campo-form">Indicaciones especiales</label>
						<input type="email" class="entrada-1" name="">
					</div>
				</div>		

				<div class="row">
					<div class="col-xs-12">
						<label class="campo-form">Nombre de quien recibe</label>
						<input type="email" class="entrada-1" name="">
					</div>
				</div>
				<!-- _______________________________________________________ -->
			</div>

			<div class="col-xs-12 col-md-4">
				<!-- _____________ 3. Método de pago _____________________-->
				<label class="titulo-seccion">3. Método de pago</label>

				<div class="row">
					<div class="col-xs-12">
						<label class="campo-form">Número Tarjeta</label>
						<input type="email" class="entrada-1" name="">
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<label class="campo-form">Número de Coutas</label>
						<input type="email" class="entrada-1" name="">
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<label class="campo-form">Nombre como figura la tarjeta</label>
						<input type="email" class="entrada-1" name="">
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<label class="campo-form">Válido desde</label>
						<input type="password" class="entrada-1" name="">
					</div>
					<div class="col-xs-12 col-sm-6">
						<label class="campo-form">hasta</label>
						<input type="text" class="entrada-1" name="">
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<label class="campo-form">Código de Seguridad</label>
						<input type="password" class="entrada-1" name="">
					</div>
					<div class="col-xs-12 col-sm-6">
						<label class="campo-form">Cédula Ciudadanía</label>
						<input type="text" class="entrada-1" name="">
					</div>
				</div>
				<!-- _______________________________________________________ -->
			</div>

		</div></form>
	</div><br>

	<!-- Formulario  -->
	<!-- <div class="container cuerpo">
		<center>
			
			
			<br><label id="alerta2" style="color: red;">Todos los campos son obligatorios</label>
			<?php
				if (obtenerGet("error", 1)){
					switch(obtenerGet("error", 1)){
						case 1:
						?>
						<br><center><div style="color: red;">Verifique las contraseñas, no coinciden</div></center>
						<?php
						break;
					} 
				}
			?>
		</center>
		

		<div class="row">
			<form method="post" action="registrarUsuario.php" onsubmit="return validar()">
				<div class="col-xs-12 col-md-4">
					<label>Nombre:</label><input class="form-control" type="text" id="nombre" name="nombre" placeholder="nombre" autocomplete="off">
				</div>
				<div class="col-xs-12 col-md-4">
					<label>Apellido:</label><input class="form-control" type="text" id="apellido" name="apellido" placeholder="apellido" autocomplete="off">
				</div>
				<div class="col-xs-12 col-md-4">
					<label>Email:</label><input class="azul form-control" type="text" id="email" name="email" placeholder="email" autocomplete="off">
					<label id="alerta3" style="color: red;">El usuario ya existe</label>
				</div>
				
		</div>
		<br>
		<div class="row">
			<div class="col-xs-12 col-md-2"></div>
			<div class="col-xs-12 col-md-4">
				<label>Contraseña:</label><input class="verde form-control" type="password" id="pass" name="pass" placeholder="contraseña">
				<label id="alerta4" style="color: red;">No puedes dejar este campo en blanco</label>
			</div>
						
			<div class="col-xs-12 col-md-4">
				<label>Confirmar tu  Contraseña:</label><input class="verde form-control" type="password" id="passv" name="passv" placeholder="contraseña">
				<label id="alerta" style="color: red;">Rectifique contraseña</label>
			</div>
			<div class="col-xs-12 col-md-2"></div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-12 col-md-4"></div>
			<div class="col-xs-12 col-md-4">					
				<input class="btn btn-primary" name="submit" type="submit" value="Registrar" style="width: 100%;">
			</div>
			<div class="col-xs-12 col-md-4"></div>
		</div>	
		<br>
				
			</form>
	</div> -->

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


</div>
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
</body>
</html>