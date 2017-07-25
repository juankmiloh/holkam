<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="es" ng-app="MyFirstApp">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Nuestras Librerías / Holkam</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos-libreria-universidad.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos-barra-header.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos-footer.css">

	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="../dist/css/bootstrap-submenu.min.css">
	<script src="../js/funsubmenu.js"></script>
	<script src="../dist/js/bootstrap-submenu.min.js" defer></script>

	<script src="../js/angular.min.js"></script>
	<script src="../javascript/controller_libreria_universidad.js"></script>

	<script src="../js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../css/sweetalert2.min.css">

	<script type="text/javascript" src="../javascript/script_libreria_universidad.js"></script>
</head>

<!-- Impide seleccionar, arrastrar y dar click derecho -->
<body oncontextmenu="return true" onselectstart="return false" ondragstart="return false"> 

<!-- ng-controler se usa para permitir el uso de -->
<div class="container-fluid" ng-controller="FirstController">
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


					<div class="container navbar-fixed-top"><a href="libreria_universitaria.html"><div class="btn-atras" title="Atras"></div></a>
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

	<div class="row">
		<div class="contenedor-impresion col-xs-12 col-sm-12 col-md-12">
			<div class="row">
				<div class="col-xs-6 col-sm-5 col-md-4"></div>
				<div class="contenedor-tendencias-moda col-xs-6 col-sm-7 col-md-7">
					<br class="ocultar"><br class="hide mostrar"><br class="hide mostrar"><br class="ocultar"><br class="ocultar"><br class="ocultar"><br class="hide">
					<!-- <label class="texto-impresion-p">Nuestras</label><br class="">
					<label class="texto-demanda-p">Librerías</label> -->
				</div>
				<div class="col-xs-8 col-sm-5 col-md-1"></div>
			</div>
		</div>
	</div>
	
	<div class="container texto texto-intro-pantallas-md">
		<div class="row">
			<center>
				<div class="col-xs-12 col-sm-12 col-md-12"><span><br><p>Busca, encuentra y compra los mejores textos en la <b>mejor calidad, </b><br>tu amor por la literatura a la <b>puerta de tu casa.</b></p><br><br></span></div>
			</center>	
		</div>
	</div>

	<div class="container texto texto-intro-pantallas-sm">
		<div class="row">
			<center>
				<div class="col-xs-12 col-sm-12 col-md-12"><span><br><p>Busca, encuentra y compra los mejores textos <br>en la <b>mejor calidad, </b>tu amor por la literatura <br>a la <b>puerta de tu casa.</b></p><br><br></span></div>
			</center>	
		</div>
	</div>

	<br>

	<div class="container-fluid">
		<center>
			<div class="contedor-medio row">
				<div class="col-xs-12 col-sm-12 col-md-12 texto-label-nl">
					<label>Nuestra Librería</label>
				</div>
			</div>
		</center>	
	</div>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-2"></div>
			<div class="col-xs-12 col-md-3 contenedor-text-buscar" style="padding-top: 4px; cursor: pointer;">
	            <input type="text" style="height: 25px; width: 335px;" class="form-control" ng-model="libro.nombre_libro" id="text_buscar_libro" name="text_buscar_libro" placeholder="Buscar" required>
	        </div>
	        <div class="col-xs-12 col-md-3 contenedor-text-autor" style="padding-top: 4px; cursor: pointer;">
	            <input type="text" style="height: 25px; width: 208px;" class="form-control" ng-model="libro.nombre_autor" id="text_buscar_autor" name="text_buscar_autor" placeholder="Autor" required>
	        </div>
	        <div class="col-xs-12 col-md-2 contenedor-select-genero">
	            <label id="label_select_genero" class="label-select-genero texto-select-genero" style="color: gray;">Género</label>
		        <select ng-model="confirmed" ng-change="change();" id="select_genero" class="form-control select-genero" name="select_genero" required onchange="cambiar_option(this);">
		            <option value="1">Acción</option>
		            <option value="2">Drama</option>
		            <option value="3">Sexo</option>
		        </select>
		        <p>{{selected}}</p>
	        </div>
	        <div class="col-xs-12 col-md-2"></div>
		</div>
	</div>

	<div id="div_focalizar"></div>

	<br><br><br>

	<div>
		<div class="row">
			<div class="col-xs-12 col-md-3" style="text-align: right;">
				<img src="../images/label_categorias.png"><br><br><br>
				<span style="font-size: 20px; cursor: pointer;">Arte (12)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Matemáticas (43)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Manualidades (54)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Terror (56)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Acción (78)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Erotico (65)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Triller (32)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Religiosos (32423)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Deportes (55)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Crónicas (23)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Historia (65)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Fantasía (76)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Narrativa Histórica (87)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Novela contemporánea (89)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Novela negra (87)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Oposiciones (67)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Cómics adultos (65)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Cómics infantil y juvenil (43)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Deportes y juegos (32)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Derecho (45)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Economía (42)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Empresa (54)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Filología (34)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Fotografía (12)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Guias de viaje (34)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Historia (54)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Idiomas (65)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Infantil (76)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Informática (78)</span><br>
				<span style="font-size: 20px; cursor: pointer;">Ingeniería (12)</span><br>
			</div>
			<div class="col-xs-12 col-md-1">
				<img src="../images/division_libros.png" style="height: 140%; width: 9%;">
			</div>

			<div class="col-xs-12 col-md-7">
				<div class="row">
					<div class="col-xs-12 col-md-12" style="height: 75%;">
						<?php
							include ("../conexion_bd/conexion_BD.php");
							$codigo_libro = $_GET['id'];
							//echo $codigo_libro;
							//generamos la consulta
							$sql = "SELECT l.consecutivo,l.k_codlibro,l.n_titulo,l.n_autor,l.v_cod_isbn,l.n_editorial,l.v_num_pagina,l.v_precio,fl.n_fotografia FROM libro l, libro_fotografia fl WHERE l.k_codlibro=".$codigo_libro." AND l.k_codlibro=fl.k_codlibro";

							mysqli_set_charset($con, "utf8"); //formato de datos utf8

							if(!$result = mysqli_query($con, $sql)) die();

							$valores_libro = array(); //creamos un array

							while($row = mysqli_fetch_array($result)){ 
								$consecutivo = $row['consecutivo'];
							    $k_codlibro = $row['k_codlibro'];
							    $n_titulo = $row['n_titulo'];
							    $n_autor = $row['n_autor'];
							    $v_cod_isbn = $row['v_cod_isbn'];
							    $n_editorial = $row['n_editorial'];
							    $v_num_pagina = $row['v_num_pagina'];
							    $v_precio = $row['v_precio'];
							    $n_fotografia = $row['n_fotografia'];
							}
							    
							//desconectamos la base de datos
							$close = mysqli_close($con) or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
						?>
						<span style="color: black; font-weight: bold; font-size: x-large;"><?php echo $n_titulo; ?></span><br>
						<span style="color: black;">Erotico / Romance / Drama</span><br><br><br>
						<div class="row">
							<div class="col-xs-12 col-md-4">
								<img src="../imagenes_libro/<?php echo $n_fotografia; ?>">	
							</div>
							<div class="col-xs-12 col-md-8">
								<br><br><br><br><br><br><br>
								<span style="color: black; font-weight: bold; font-size: xx-large;"><?php echo $v_precio; ?>$</span><br>
								<span style="color: black; font-weight: bold; font-size: large;">Autor: <?php echo $n_autor; ?></span><br>
								<span style="color: black; font-weight: bold; font-size: large;">Editorial: <?php echo $n_editorial; ?></span><br>
								<span style="color: black; font-weight: bold; font-size: large;">Año de edicion:  2016</span><br>
								<span style="color: black; font-weight: bold; font-size: large;">Nº Páginas: <?php echo $v_num_pagina; ?></span><br>
								<span style="color: black; font-weight: bold; font-size: large;">Formato: Impreso</span><br>
							</div>
	        				<div class="col-xs-12 col-md-12">
	        					<br>
	        					<img id="{{post.k_codlibro}}" src="../images/btn-comprar.png" class="img_carrito_libro" data-ng-click="obtenerId($event)" title="agregar al carrito">
	        				</div>
	        				<div class="col-xs-12 col-md-8">
	        					<br>
	        					<p style="color:black; text-align: justify; font-size: large;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam venenatis lacus justo. Nulla vulputate mollis hendrerit. Etiam id condimentum urna, in tempor ex. Nam tincidunt lacinia diam at rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam ullamcorper, purus pharetra fringilla lacinia, nunc lorem laoreet nulla, id convallis nisl lorem quis magna. Phasellus sed eros hendrerit, mattis nisl vel, imperdiet est.</p>
	        				</div>
	        				<div class="col-xs-12 col-md-8"></div>
	        				<div class="col-xs-12 col-md-12">
	        					<img src="../images/relacionados.png">
	        				</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-1"></div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-md-12">
					<br><br><br><br><br><br><br>
					<img src="../images/medios_pago.png">
				</div>
			</div>


			<!-- <div class="col-xs-12 col-md-7">
				<div class="row">
					<div class="col-xs-12 col-md-4" ng-repeat="post in posts" style="height: 75%;">
		        		<img id="{{post.k_codlibro}}" src="../imagenes_libro/{{post.n_fotografia}}" style="cursor: pointer;" data-ng-click="detalle_libro($event)">	  
		        		<div class="row">
		        			<br>
		        			<div class="col-xs-12 col-md-7 div_titulo_libro">
	        					<p>{{post.n_titulo}}</p>
	        					<p style="color: gray;">{{post.v_precio}}$</p>
	        					<input type="hidden" value="{{post.consecutivo}}">
	        				</div>
	        				<div class="col-xs-12 col-md-5">
	        					<img id="{{post.k_codlibro}}" src="../images/Libreria_15.png" class="img_carrito_libro" data-ng-click="obtenerId($event)" title="agregar al carrito">
	        				</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-1"></div>
			</div> -->
		</div>
	</div>

	<br><br><br><br><br><br><br>
   
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
</div>
</body>
</html>