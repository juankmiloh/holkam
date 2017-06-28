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
	<link rel="stylesheet" href="../dist/css/bootstrap-select.css">

	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>

	
	<link rel="stylesheet" href="../dist/css/bootstrap-submenu.min.css">
	<script src="../js/funsubmenu.js"></script>
	<script src="../dist/js/bootstrap-submenu.min.js" defer></script>
	<script src="../dist/js/bootstrap-select.js"></script>

	<script type="text/javascript">

		$(document).ready(function(){

			var sumando=0;
			// Valor de tamañoA
			var costo1=0;
			// Valor de tamaño C
			var costo2=0;
			// Valor de material
			var costo3=0;
			// Valor de plastificado
			var costo4=0;
			// Valor de acabado
			var costo5=0;
			// Valor Numero paginas
			var costo6 = 0;
			// Valor encuadernado
			var costo7 = 0;

			function actualizar(){
				sumando = costo1 + costo2 + costo3 + costo4 + costo5 + costo6 + costo7;
				var uni = new Array();
				var valor;
				for (var i = 0; i <= 5; i++) {
					uni[i] = $('#valorUnidad'+(i+1)).text();
					valor = parseInt(uni[i])*sumando;
					$('#valor'+(i+1)).val(valor);
					$('#valor'+(i+1)).html(valor);
				}
			}

			$("input[name=tamanioA]:radio" ).change(function(){
				var valor = this.value;
				
				if (valor == 1) {
					costo1 = 300;
				}else if(valor == 2){
					costo1 = 500;
				}else{
					costo1 = 600;
				}
				actualizar();
			});

			$("input[name=tamanioC]:radio" ).change(function(){
				var valor = this.value;
				if (valor == 1) {
					costo2 = 200;
				}else if(valor == 2){
					costo2 = 400;
				}else{
					costo2 = 500;
				}
				actualizar();
			});

			$("#paginas").change(function(){
				var valor = this.value;
				if(valor == 1){
					costo6 = 1000;
				}else if(valor == 2){
					costo6 = 2000;
				}else if(valor == 3){
					costo6 = 5000;
				}else{
					costo6 = 0;
				}
				actualizar();
			});
			
			$("input[name=material]:radio" ).change(function(){
				var valor = this.value;
				if (valor == 1) {
					costo3 = 200
				}else if(valor == 2){
					costo3 = 350;
				}else if(valor == 3){
					costo3 = 500
				}else if(valor == 4){
					costo3 = 100;
				}
				actualizar();
			});

			$("input[name=encuadernado]:radio").change(function(){
				var valor = this.value;
				if(valor == 1){
					costo7 = 2000;
				}else if(valor == 2){
					costo7 = 1500;
				}else{
					costo7 = 0;
				}
				actualizar();

			});

			$("input[name=plastificado]:radio" ).change(function(){
				var valor = this.value;
				if (valor == 1) {
					costo4 = 350;
				}else if(valor == 2){
					costo4 = 200;
				}
				actualizar();
			});
				
			$("input[name=acabado]:radio" ).change(function(){
				var valor = this.value;
				if (valor == 1) {
					costo5 = 430;
				}else if(valor == 2){
					costo5 = 400;
				}else{
					costo5 = 0;
				}
				actualizar();
			});

		});
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
					    	<img class="mostrar-nav" alt="Brand" src="../images/barra pequeña.png">
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
							<li><a class="imagen-carro" href="#">
							    	<img alt="Brand" src="../images/Carro.png">
							    </a>
						    </li>	
						</ul>
					</div>


					<div class="container navbar-fixed-top">
						<a href="../index.html">
							<div class="referencia-index col-sm-3 col-md-3"></div>
						</a>
						<ul class="col-sm-9 col-md-9 hide nav navbar-nav  navbar-right">
								<li><a></a></li>
								<li><a href="impresion_principal.html"><label class="opcion-nav">Impresión</label></a></li>
								<li><a href="moda.html"><label class="opcion-nav">Moda</label></a></li>
								<li><a href="#"><label class="opcion-nav">Juegos</label></a></li>
								<li><a href="#"><label class="opcion-nav">Software</label></a></li>
								<li><a href="#"><label class="opcion-nav">Conócenos</label></a></li>
								<li><a class="navbar-brand imagen-carro" href="#">
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
			<label class="texto-seccion">Plegables </label>
			<label class="texto-seccion1">Folletos</label>
		</div>
	</div>

	<div class="container texto">
		<div class="row">
			<center>
				<div class="col-xs-12 col-sm-12 col-md-12"><span><br><p><b>Tarjetas de presentación, </b>con la mejor calidad del mercado<br>
				Una buena impresión te dará ventaja en tus clientes</p><br><br></span></div>
			</center>	
		</div>
	</div>
	<center>
	<div class="container">
		<div class="row contenedor-medio">
			<div class="hide opcion-img col-xs-12 col-sm-3 col-md-3"><br><br><br><center><img src="../images/impresion-d-6.jpg"></center></div>

			<div class="col-xs-12 col-sm-6 col-md-6"><br>
				<div class="contenedor-especificaciones col-xs-12">
					<label class="texto-especificaciones1">Escoge las especificaciones de tus productos</label>

					<label class="texto-especificaciones">Tamaño Abierto</label>
					<label class="radio-inline"><input type="radio" id="tamanioA" name="tamanioA" value="1">21.59 x 13.97cm Media carta</label>
					<label class="radio-inline"><input type="radio" id="tamanioA1" name="tamanioA" value="2">27.94 x 21.59cm Carta</label>
					<div class="radio">
						<label class="radio-inline"><input type="radio" id="tamanioA2" name="tamanioA" value="3">43.18 x 27.94cm Tabloide</label>
					</div>

					<label class="texto-especificaciones"><br>Tamaño Cerrado</label>
					<label class="radio-inline"><input type="radio" id="tamanioC" name="tamanioC" value="1">10.79 x 13.97cm Media carta</label>
					<label class="radio-inline"><input type="radio" id="tamanioC1" name="tamanioC" value="2">13.97 x 21.59cm Carta</label>
					<div class="radio">
						<label class="radio-inline"><input type="radio" id="tamanioC2" name="tamanioC" value="3">21.59 x 27.94cm Tabloide</label>
					</div>

					<label class="texto-especificaciones"><br>Cuerpos (Páginas)</label>	
					<div class="form-group">
					<label for="paginas">Escoge el número de páginas</label>
					<select id="paginas" name="paginas" class="selectpicker show-tick">
						<option value="0">-------</option>
						<option value="1">10</option>
						<option value="2">20</option>
						<option value="3">50</option>
					</select>
					</div>

					<label class="texto-especificaciones"><br>Material</label>
					<label class="radio-inline"><input type="radio" id="material" name="material" value="1">Propalcote 115gr</label>
					<label class="radio-inline"><input type="radio" id="material1" name="material" value="2">Propalcote 150gr</label>
					<label class="radio-inline"><input type="radio" id="material2" name="material" value="3">Propalcote 200gr</label>
					<div class="radio">
						<label class="radio-inline"><input type="radio" id="material3" name="material" value="4">Yo llevo papel</label>
					</div>

					<label class="texto-especificaciones"><br>Encuadernado</label>
					<label class="radio-inline"><input type="radio" id="encuadernado1" name="encuadernado" value="1">Grapado</label>
					<label class="radio-inline"><input type="radio" id="encuadernado2" name="encuadernado" value="2">Cosido al Caballete</label>	
					<label class="radio-inline"><input type="radio" id="encuadernado3" name="encuadernado" value="3">Sin grapar</label>						
					
					<label class="texto-especificaciones"><br>Pastificado</label>
					<label class="radio-inline"><input type="radio" id="plastificado1" name="plastificado" value="1">Mate</label>
					<label class="radio-inline"><input type="radio" id="plastificado2" name="plastificado" value="2">Brillante</label>
					
					<label class="texto-especificaciones"><br>Acabado</label>
					<label class="radio-inline"><input type="radio" id="acabado1" name="acabado" value="1">Brillo UV</label>
					<label class="radio-inline"><input type="radio" id="acabado2" name="acabado" value="2">Puntas redondeadas</label>
					<label class="radio-inline"><input type="radio" id="acabado0" name="acabado" value="0">Ninguno</label>
					<hr>
				</div>
			</div>	
			<div class=" col-xs-12 col-sm-3 col-md-3">
				<center>
					<form>
					<br>

						<table class="table table-striped tabla">
							<tr>
								<td>
									<label id="valorUnidad1" class="radio-inline"><input type="radio" id="unidades1" name="unidades" value="1">1</label><label>&nbsp; uds</label>
								</td>
								<td>
									<label class="texto-especificaciones1" id="valor1">10.000</label><label class="texto-especificaciones1">$</label>
								</td>
							</tr>
							<tr>
								<td>
									<label id="valorUnidad2" class="radio-inline"><input type="radio" id="unidades2" name="unidades" value="2">5 </label><label>&nbsp; uds</label>
								</td>
								<td>
									<label class="texto-especificaciones1" id="valor2">20.000</label><label class="texto-especificaciones1">$</label>
								</td>
							</tr>
							<tr>
								<td>
									<label id="valorUnidad3" class="radio-inline"><input type="radio" id="unidades3" name="unidades" value="3">10 </label><label>&nbsp; uds</label>
								</td>
								<td>
									<label class="texto-especificaciones1" id="valor3">40.000</label><label class="texto-especificaciones1">$</label>
								</td>
							</tr>
							<tr>
								<td>
									<label id="valorUnidad4" class="radio-inline"><input type="radio" id="unidades4" name="unidades" value="4">50 </label><label>&nbsp; uds</label>
								</td>
								<td>
									<label class="texto-especificaciones1" id="valor4">50.000</label><label class="texto-especificaciones1">$</label>
								</td>
							</tr>
							<tr>
								<td>
									<label id="valorUnidad5" class="radio-inline"><input type="radio" id="unidades5" name="unidades" value="5">100 </label><label>&nbsp; uds</label>
								</td>
								<td>
									<label class="texto-especificaciones1" id="valor5">70.000</label><label class="texto-especificaciones1">$</label>
								</td>
							</tr>
							<tr>
								<td>
									<label id="valorUnidad6" class="radio-inline"><input type="radio" id="unidades6" name="unidades" value="6">1000 </label><label>&nbsp; uds</label>
								</td>
								<td>
									<label class="texto-especificaciones1" id="valor6">100.000</label><label class="texto-especificaciones1">$</label>
								</td>
							</tr>
						</table>
						<input type="submit" class="btn boton" name="" value="Subir Diseño">
					</form>
					<p>Adjunta tu diseño antes de finalizar la <br> compra. <a href="" style="color: black;"><b>indicaciones aqui.</b></a></p>
					<div class="texto-total">
						<label>TOTAL &nbsp;</label><label>50.000</label><label>$</label>
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
   	<center>
		<div class="container-fluid">
			<div class="row redes">
				<div class="col-xs-12 col-md-4"></div>
				<div class="contenedor-redes col-xs-12 col-md-4">
					<a href="http://www.facebook.com"><img src="../images/facebook uso.png" title="Facebook"></a>&nbsp
					<a href="#"><img src="../images/twitter uso.png" title="Twitter"></a>&nbsp
					<a href="#"><img src="../images/GooglePlus uso.png" title="GooglePlus"></a>&nbsp
					<a href="#"><img src="../images/linkedin uso.png" title="Linkedin"></a>
				</div>
				<div class="col-xs-12 col-md-4"></div>
			</div>
		</div>
	</center>
		
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
</body>
</html>

