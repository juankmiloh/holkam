<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="es">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Impresion Tu Texto/ Holkam</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos-imprime-seccion.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos-barra-header.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos-footer.css">


	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>

	
	<link rel="stylesheet" href="../dist/css/bootstrap-submenu.min.css">
	<script src="../js/funsubmenu.js"></script>
	<script src="../dist/js/bootstrap-submenu.min.js" defer></script>
	<script src="../javascript/script_btn_login.js"></script>

	<script type="text/javascript">

		$(document).ready(function(){

			var sumando=0;
			// Valor de tamaño
			var costo1=0;
			// Valor de Orientacion
			var costo2=0;
			// Valor de material
			var costo3=0;
			// Valor de caras
			var costo4=0;
			// Valor de acabado
			var costo5=0;
			//Unidades
			var unidad = 0;

			function actualizar(){
				sumando = costo1 + costo2 + costo3 + costo4 + costo5;
				var uni = new Array();
				var valor;
				for (var i = 0; i <= 5; i++) {
					uni[i] = $('#valorUnidad'+(i+1)).text();
					valor = parseInt(uni[i])*sumando;
					$('#valor'+(i+1)).val(valor);
					$('#valor'+(i+1)).html(valor);
				}
				$("#total").text(sumando*unidad);
				$("#total-field").val($("#total").text());
			}

			$("input[name=unidades]:radio").change(function(){
				unidad = this.value;
				actualizar();
			});

			$("input[name=tamanio]:radio" ).change(function(){
				var valor = this.value;
				
				if (valor == 1) {
					costo1 = 300;
					$("#tamanio_v").val("Media Carta 21.59 x 13.97cm");
				}else{
					costo1 = 500;
					$("#tamanio_v").val("Carta 27.94 x 21.59cm");
				}
				actualizar();
			});

			$("input[name=orientacion]:radio" ).change(function(){
				var valor = this.value;
				if (valor == 1) {
					costo2 = 600;
					$("#orientacion_v").val("Horizontal");
				}else{
					costo2 = 400;
					$("#orientacion_v").val("Vertical");
				}
				actualizar();
			});
			
			$("input[name=material]:radio" ).change(function(){
				var valor = this.value;
				if (valor == 1) {
					costo3 = 400;
					$("#material_v").val("Propalcote 300gr");
				}else if(valor == 2){
					costo3 = 350;
					$("#material_v").val("Propalcote 200gr");
				}else if(valor == 3){
					costo3 = 300;
					$("#material_v").val("EarthPact* 150gr");
				}else if(valor == 4){
					costo3 = 250;
					$("#material_v").val("Propalcote 150gr");
				}
				actualizar();
			});

			$("input[name=caras]:radio" ).change(function(){
				var valor = this.value;
				if (valor == 1) {
					costo4 = 350;
					$("#caras_v").val("Una cara / 4x0");
				}else if(valor == 2){
					costo4 = 500;
					$("#caras_v").val("Dos caras / 4x4");
				}else if(valor == 3){
					costo4 = 200;
					$("#caras_v").val("Una cara / 1x0");
				}else{
					costo4 = 300;
					$("#caras_v").val("Dos caras / 1x1");
				}
				actualizar();
			});
				
			$("input[name=acabado]:radio" ).change(function(){
				var valor = this.value;
				if (valor == 1) {
					costo5 = 430;
					$("#acabado_v").val("Puntas redondeadas");
				}else if(valor == 0){
					costo5 = 0;
					$("#acabado_v").val("Ninguno");
				}
				actualizar();
			});

		});

		function validarForm(){
			if($("#tamanio_v").val() != "" && $("#caras_v").val() != "" && $("#material_v").val() != "" && $("#orientacion_v").val()!="" && $("#acabado_v").val()!="" && $("#total-field").val()!= 0){
				return true;
			}else{
				alert("Seleccione todas las especificaciones.");
				return false;
			}
		}
	</script>
	
</head>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false"> 


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
							<li><a class="imagen-carro" href="carrito_compras.php">
							    	<img alt="Brand" src="../images/Carro.png">
							    </a>
						    </li>	
						</ul>
					</div>


					<div class="container navbar-fixed-top"><a href="imprime_texto.html"><div class="btn-atras" title="Atras"></div></a>
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
								<li><a class="navbar-brand imagen-carro" href="carrito_compras.php">
								    	<img alt="Brand" src="../images/Carro.png">
								    </a>
							    </li>		
						</ul>
					</div> 
				</div>
			</nav>
		</div>
	</header>



	<div class="contenedor-impresion-1 col-xs-12 col-sm-12 col-md-12">
		<div class="col-xs-0 col-sm-2 col-md-2"></div>
		<div class="contenedor-tendencias-moda col-xs-8 col-sm-7 col-md-7">
			<label class="texto-impresion-p">Impresión</label><br class="">
			<label class="texto-demanda-p">por demanda</label>
		</div>
		<div class="contenedor-texto-seccion col-xs-4 col-sm-3 col-md-3">
			<label class="texto-seccion">Talonarios </label>
			<!-- <label class="texto-seccion1">Talonarios</label> -->
		</div>
	</div>

	<div class="container texto">
		<div class="row">
			<center>
				<div class="col-xs-12 col-sm-12 col-md-12"><span><br><p><b>Afiches, </b>ideales para divulgación de tus ideas o proyectos<br>
				en la mejor calidad y servicio del mercado</p><br><br></span></div>
			</center>	
		</div>
	</div>
	<center>
	<div class="container">
		<div class="row contenedor-medio">
			<div class="col-xs-12 col-sm-3 col-md-3"><center><div class="opcion-img"><img  src="../images/impresion-d-5.jpg"></div></center></div>
			<form action="agregar_imprime_carrito.php" onsubmit="return validarForm();">
			<input type="hidden" name="id-seccion" value="5">
				<div class="col-xs-12 col-sm-6 col-md-6"><div class="show"><br><br><br><br></div>
					<div class="contenedor-especificaciones col-xs-12">
						<label class="texto-especificaciones1">Escoge las especificaciones de tus productos</label>

						<label class="texto-especificaciones">Tamaño abierto</label>
						<label class="radio-inline"><input type="radio" id="tamanio" name="tamanio" value="1">Media Carta 21.59 x 13.97cm</label>
						<label class="radio-inline"><input type="radio" id="tamanio1" name="tamanio" value="2">Carta 27.94 x 21.59cm</label>
						<input type="hidden" name="caracNombre1" value="Tamaño Abierto">
						<input type="hidden" name="caracValor1" id="tamanio_v">

						<label class="texto-especificaciones"><br>Caras</label>
						<div class="radio">
							<label class="radio-inline"><input type="radio" id="caras1" name="caras" value="1">Una cara / 4x0</label>
							<label class="radio-inline"><input type="radio" id="caras2" name="caras" value="2">Dos caras / 4x4</label>
						</div>
						<div class="radio">
							<label class="radio-inline"><input type="radio" id="caras3" name="caras" value="3">Una cara / 1x0</label>
							<label class="radio-inline"><input type="radio" id="caras4" name="caras" value="4">Dos caras / 1x1</label>
						</div>
						<input type="hidden" name="caracNombre2" value="Caras">
						<input type="hidden" name="caracValor2" id="caras_v">

						<label class="texto-especificaciones"><br>Material</label>
						<label class="radio-inline"><input type="radio" id="material" name="material" value="1">Propalcote 300gr</label>
						<label class="radio-inline"><input type="radio" id="material1" name="material" value="2">Propalcote 200gr</label>
						<label class="radio-inline"><input type="radio" id="material2" name="material" value="3">EarthPact* 150gr</label>
						<div class="radio">
							<label class="radio-inline"><input type="radio" id="material3" name="material" value="4">Propalcote 150gr</label>
						</div>
						<input type="hidden" name="caracNombre3" value="Material">
						<input type="hidden" name="caracValor3" id="material_v">

						<label class="texto-especificaciones"><br>Orientación</label>
						<label class="radio-inline"><input type="radio" id="orientacion" name="orientacion" value="1">Horizontal</i></label>
						<label class="radio-inline"><input type="radio" id="orientacion1" name="orientacion" value="2">Vertical</label>
						<input type="hidden" name="caracNombre4" value="Orientación">
						<input type="hidden" name="caracValor4" id="orientacion_v">
						
						<label class="texto-especificaciones"><br>Acabado</label>
						<label class="radio-inline"><input type="radio" id="acabado1" name="acabado" value="1">Puntas redondeadas</label>
						<label class="radio-inline"><input type="radio" id="acabado0" name="acabado" value="0">Ninguno</label>
						<input type="hidden" name="caracNombre5" value="Acabado">
						<input type="hidden" name="caracValor5" id="acabado_v">
						<hr>
					</div>
				</div>	
				<div class=" col-xs-12 col-sm-3 col-md-3">
					<center>
						
						<br>

							<table class="table table-striped tabla">
								<tr>
									<td>
										<label id="valorUnidad1" class="radio-inline"><input type="radio" id="unidades1" name="unidades" value="100">100</label><label>&nbsp; uds</label>
									</td>
									<td>
										<label class="texto-especificaciones1" id="valor1">10.000</label><label class="texto-especificaciones1">$</label>
									</td>
								</tr>
								<tr>
									<td>
										<label id="valorUnidad2" class="radio-inline"><input type="radio" id="unidades2" name="unidades" value="200">200 </label><label>&nbsp; uds</label>
									</td>
									<td>
										<label class="texto-especificaciones1" id="valor2">20.000</label><label class="texto-especificaciones1">$</label>
									</td>
								</tr>
								<tr>
									<td>
										<label id="valorUnidad3" class="radio-inline"><input type="radio" id="unidades3" name="unidades" value="500">500 </label><label>&nbsp; uds</label>
									</td>
									<td>
										<label class="texto-especificaciones1" id="valor3">40.000</label><label class="texto-especificaciones1">$</label>
									</td>
								</tr>
								<tr>
									<td>
										<label id="valorUnidad4" class="radio-inline"><input type="radio" id="unidades4" name="unidades" value="1000">1000 </label><label>&nbsp; uds</label>
									</td>
									<td>
										<label class="texto-especificaciones1" id="valor4">50.000</label><label class="texto-especificaciones1">$</label>
									</td>
								</tr>
								<tr>
									<td>
										<label id="valorUnidad5" class="radio-inline"><input type="radio" id="unidades5" name="unidades" value="2000">2000 </label><label>&nbsp; uds</label>
									</td>
									<td>
										<label class="texto-especificaciones1" id="valor5">70.000</label><label class="texto-especificaciones1">$</label>
									</td>
								</tr>
								<tr>
									<td>
										<label id="valorUnidad6" class="radio-inline"><input type="radio" id="unidades6" name="unidades" value="5000">5000 </label><label>&nbsp; uds</label>
									</td>
									<td>
										<label class="texto-especificaciones1" id="valor6">100.000</label><label class="texto-especificaciones1">$</label>
									</td>
								</tr>
							</table>
							<input type="submit" class="btn boton" name="" value="Subir Diseño">
							<input type="hidden" name="total" id="total-field" value="0">
			</form>
					<p>Adjunta tu diseño antes de finalizar la <br> compra. <a href="" style="color: black;"><b>indicaciones aqui.</b></a></p>
					<div class="texto-total">
						<label>TOTAL &nbsp;</label><label id="total">0</label><label>$</label>
					</div>
					<button class="btn boton1"><label >Imprimir</label></button>
				</center>
			</div>
		</div>
		
	</div>
	</center>
		<br><br><br><br><br>
   
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
   	<div class="esconder-espacios">
		<br><br>
	</div>
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


