<?php
	include ("../conexion_bd/conexion_BD.php");
?>
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
	<script src="../javascript/script_btn_login.js"></script>
</head>

<!--
* SE IMPIDE SELECCIONAR / ARRASTRAR / DAR CLICK DERECHO
-->
<body oncontextmenu="return true" onselectstart="return false" ondragstart="return false"> 
<?php
	//VERIFICAMOS SI LA REDIRECCION ES DESDE LA MISMA PAGINA Y REDIRIJIMOS EL FOCO
	if (isset($_GET['focalizar'])) {
		$foco = $_GET['focalizar'];
		if ($foco == "si") {
			echo "<script language='javascript'>"; 
			// echo "swal('si exito');"; 
			echo "location.href = 'libreria_universidad.php#focalizar';";
			echo "</script>";
			//header("Location: libreria_universidad.php?focalizar=exito");
		}else{
			// echo "<script language='javascript'>"; 
			// echo "alert('no');"; 
			// echo "</script>";
		}
	}else{
		$foco = "no";
	}
?>

<a name="arriba"></a> <!--ESTO SE PONE PARA CUANDO SE CAMBIE DE PAGINA, SE DEVUELVA A LA PARTE DE ARRIBA DE LA PAGINA-->
<!-- DIV's de imagen de carga oculto -->
<div class="fbback"></div>

<div class="container" id="fbdrag1">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="fb">
                <!--<span class="close" onclick="dragClose('fbdrag1')"></span>-->
                <div class="dheader">HOLKAM / LIBRERIA</div>
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

<!--
* ng-controler SE UTILIZA PARA PERMITIR EL USO DEL CONTROLADOR DE ANGULAR
-->
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

	<!--
	* CONTENEDOR DEL BANNER DEL TITULO DE LA PAGINA
	-->
	<div class="row contenedor-impresion">
		<div class="col-xs-6 col-sm-5 col-md-4"></div>
		<div class="contenedor-tendencias-moda col-xs-6 col-sm-7 col-md-7">
			<br class="ocultar"><br class="hide mostrar"><br class="hide mostrar"><br class="ocultar"><br class="ocultar"><br class="ocultar"><br class="hide">
			<!-- <label class="texto-impresion-p">Librería</label><br class="">
			<label class="texto-demanda-p">Universitaria</label> -->
		</div>
		<div class="col-xs-8 col-sm-5 col-md-1"></div>
	</div>
	
	<!--
	* CONTENEDOR TEXTO INTRO - PANTALLAS GRANDES
	-->
	<div class="container texto texto-intro-pantallas-md">
		<div class="row">
			<center>
				<div class="col-xs-12 col-sm-12 col-md-12"><span><br><p>Busca, encuentra y compra los mejores textos en la <b>mejor calidad, </b><br>tu amor por la literatura a la <b>puerta de tu casa.</b></p><br><br></span></div>
			</center>	
		</div>
	</div>

	<!--
	* CONTENEDOR TEXTO INTRO - PANTALLAS PEQUEÑAS
	-->
	<div class="container texto texto-intro-pantallas-sm">
		<div class="row">
			<center>
				<div class="col-xs-12 col-sm-12 col-md-12"><span><br><p>Busca, encuentra y compra los mejores textos <br>en la <b>mejor calidad, </b>tu amor por la literatura <br>a la <b>puerta de tu casa.</b></p><br><br></span></div>
			</center>	
		</div>
	</div>

	<br>

	<!--
	* CONTENEDOR TEXTO - AMBAS PANTALLAS
	-->
	<div class="container-fluid">
		<center>
			<div class="row texto-label-nl">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<label>Nuestra Librería</label>
				</div>
			</div>
		</center>	
	</div>

	<!--
	* CONTENEDOR SELECT GENERO / TEXT BUSCAR LIBRO / TEXT BUSCAR AUTOR - AMBAS PANTALLAS
	-->
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-2"></div>
			<div class="col-xs-12 col-sm-12 col-md-3">
				<img class="lupa-buscar-libro" src="../images/lupa.png">
	            <input type="text" class="form-control text-buscar-libro" ng-model="libro.nombre_libro" id="text_buscar_libro" placeholder="Buscar" required>
	        </div>
	        <div class="show"><br><br></div>
	        <div class="col-xs-12 col-sm-12 col-md-3">
	        	<img class="lupa-buscar-autor" src="../images/lupa.png">
	            <input type="text" class="form-control text-buscar-autor" ng-model="libro.nombre_autor" id="text_buscar_autor" placeholder="Autor" required>
	        </div>
	        <div class="show"><br><br></div>
	        <div class="col-xs-12 col-sm-12 col-md-2">
	            <span id="label_select_genero" class="label-select-genero">Género</span>
	            <img class="img-select-genero" src="../images/select.png">
	            <!-- 
		            * ng-options => PERMITE CARGAR LOS DATOS EN EL SELECT - TRAYENDO LOS DATOS PREVIAMENTE EN UN ARREGLO [JSON]
		            * ng-model   => ES EL NOMBRE CON EL QUE VAMOS A PODER HACER OPERACIONES EN EL CONTROLLER DE ANGULAR - ENVIA LOS DATOS
		            * 			    QUE SE SELECCIONEN DEL SELECT EN FORMA DE OBJETO AL CONTROLADOR
		            * ng-change  => PERMITE LLAMAR UNA FUNCION QUE ESTE EN EL CONTROLADOR
	            -->
		        <select ng-options="option.n_genero for option in datos_genero_libro track by option.k_codgenero" 
		        		ng-model="select_genero" 
		        		ng-change="buscar_por_genero();" 
		        		class="form-control select-genero" 
		        		required>
		        </select>
				<!-- <tt>option = {{select_genero}}</tt><br/> -->
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-2"></div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-md-12" style="text-align: center;">
        	<br><br>
        	<label style="color: #6b2005; font-size: 22px;">Destacados</label> <!--color cafe_holkam #6b2005-->
        	<br><br><br><br><br><br>
        </div>
	</div>

	<!-- 
	* SECCION LIBRO DESTACADO - PANTALLAS GARNDES
	-->
	<div class="row show_pantalla_grande" style="border: 1px solid;">
		<div class="col-xs-12 col-md-12 div_destacado_md" style="border: 0px solid blue;">
			<div class="row">
				<div class="col-xs-12 col-md-4"></div>
		        <div class="col-xs-12 col-md-4" style="border: 0px solid yellow; top: -80px;">
		        	<div class="row">
		        		<div class="col-xs-12 col-md-3 div_flecha_izquierda" style="padding-top: 23%; padding-right: 0;">
		        			<img src="../images/libro_left1.png" class="img_flecha_izquierda">
		        		</div>

		        		<div class="col-xs-12 col-md-6 libro_destacado_hover" style="border: 0px solid;">
							<div class="row">
								<div class="col-xs-12 col-md-12" style="text-align: center;">
									<div class="row">
										<div class="col-xs-12 col-md-12 div_img_libro">
											<img class="img_libro_destacado" onclick="redireccionar_detalle_libro_destacado();" style="cursor: pointer;">	
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-md-12" style="border: 0px solid blue;">
											<div class="row">
												<div class="col-xs-12 col-md-12" style="border: 0px solid orange;">
													<div class="row">
														<div class="col-xs-12 col-md-8" style="border: 0px solid green; text-align: right; height: 8em;">
															<span class="titulo_libro_destacado" id="titulo_libro_destacado_m" style="font-size: 1em; font-weight: bold; color: black;"></span><br>
															<span class="precio_libro_destacado" id="precio_libro_destacado_m" style="color: gray; font-size: 1em;">$</span>
														</div>
														<div class="col-xs-12 col-md-4" style="border: 0px solid purple; text-align: left; padding-left: 0px;">
															<input type="hidden" class="consecutivo_libro_destacado">
															<input type="hidden" class="k_cod_libro_destacado">
															<img src="../images/carrito_compra.png" class="img_carrito_libro" title="agregar al carrito" onclick="redireccionar_carrito_libro_destacado();">
														</div>	
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

		        		<div class="col-xs-12 col-md-3 div_flecha_derecha" style="padding-top: 23%;">
		        			<img src="../images/libro_right1.png" class="img_flecha_derecha" style="padding-left: 0px;">
		        		</div>
		        	</div>
		        </div>
		        <div class="col-xs-12 col-md-4" style="border: 0px solid red;"></div>
			</div>
		</div>
	</div>

	<div id="div_focalizar"></div>

	<div class="row show_pantalla_grande" style="border: 0px solid red;">
		<div class="col-xs-12 col-md-12">
			<br><br><br><br><br><br><br><br><br><br><br>
			<a name="focalizar"></a> <!--ESTO SE PONE PARA CUANDO SE SELECCIONE UNA PAGINA, SE DIRIJA EL FOCO A ESTE CONTROL-->
		</div>
	</div>

	<!-- 
	* SECCION LIBRO DESTACADO - PANTALLAS PEQUEÑAS
	-->
	<div class="row show_pantalla_pequeña div_destacado_xs libro_destacado_hover">
		<div class="col-xs-12 div_img_libro_xs">
			<div class="div_libro_xs">
				<img class="img_libro_destacado" onclick="redireccionar_detalle_libro_destacado();" style="width: 80%;">
				<span class="autor_libro_destacado" id="autor_libro_destacado_xs"></span>
				<span class="titulo_libro_destacado" id="titulo_libro_destacado_xs"></span>
				<span class="precio_libro_destacado" id="precio_libro_destacado_xs"></span>
				<img src="../images/carrito_xs.png" class="img_carrito_libro_xs" onclick="redireccionar_carrito_libro_destacado();">
				<input type="hidden" class="consecutivo_libro_destacado">
				<input type="hidden" class="k_cod_libro_destacado">
			</div>
		</div>
	</div>

	<div class="row show_pantalla_pequeña" style="border: 0px solid green;">
		<div class="col-xs-12 col-md-12">
			<br><br><br><br><br><br>
			<a name="focalizar"></a> <!--ESTO SE PONE PARA CUANDO SE SELECCIONE UNA PAGINA, SE DIRIJA EL FOCO A ESTE CONTROL-->
		</div>
	</div>

	<!-- 
	* SECCION LIBROS - PANTALLAS GRANDES
	-->
	<div class="row" style="border: 0px solid purple;">
		<!-- 
		* SECCION CATEGORIAS
		-->
		<div class="col-xs-12 col-md-3 show_pantalla_grande" style="text-align: right; border: 0px solid;">
			<img src="../images/label_categorias.png"><br><br><br>
			<a href="javascript:listar_todos_libros()" style="font-size: 20px; color: black;">Listar Todas*</a><br>
			<di class="row">
				<div class="col-xs-12 col-md-12" ng-repeat="categoria in datos_categoria">
					<a ng-href="" id="{{categoria.k_codgenero}}" style="font-size: 20px; color: black; cursor: pointer;" data-ng-click="buscar_categoria($event)">{{categoria.n_genero}}</a>
					<span style="font-size: 20px; color: black;">({{categoria.numero_libros}})</span><br>
				</div>
			</di>
		</div>
		<div class="col-xs-12 col-md-1 show_pantalla_grande" style="border: 0px solid;">
			<img src="../images/division_libros.png" style="height: 140%; width: 9%;">
		</div>

		<!-- 
		* SECCION CONTENEDOR LIBROS POR PAGINACION [PHP]
		-->
		<?php
			//CANTIDAD DE REGISTROS POR PAGINA POR DEFAULT [2] SE VARIA EL VALOR POR MEDIO DE REDIRECCION DESDE JQUERY 
			if (isset($_GET['por_pagina'])) {
				$por_pagina = $_GET['por_pagina'];
			}else{
				$por_pagina = 3;
			}

			/*======
			* PAGINA POR DEFAULT EN LA QUE QUEREMOS INICIAR LA CARGA DE LA PAGINA
			* SI YA EXISTE LA VARIABLE FOCALIZAMOS LOS LIBROS CON AYUDA DE JAVASCRIPT
			========*/
			if (isset($_GET['pagina'])) {
				$pagina = $_GET['pagina'];
				echo "<script language='javascript'>"; 
				echo "var focalizar = $('#div_focalizar').position().top;"; 
				echo "$('html,body').animate({scrollTop: focalizar}, 1000);";
				echo "</script>"; 
			}else{
				$pagina = 1;
			}

			//LA PAGINA INICIA EN 0 Y SE MULTIPLICA $por_pagina
			$empieza = ($pagina -1) * $por_pagina;

			//SELECCIONAR LOS REGISTROS DE LA TABLA LIBRO CON LIMIT [MUESTRA UN RANGO DE LIBROS]
			$sql = "SELECT l.*,fl.n_fotografia FROM libro l,libro_fotografia fl WHERE l.k_codlibro=fl.k_codlibro LIMIT $empieza, $por_pagina";
			$result = mysqli_query($con, $sql);
		?>
		<div class="col-xs-12 col-md-7" style="border: 0px solid;" id="contenedor_libros_paginacion">
			<div class="row">
			<?php
				while($row = mysqli_fetch_array($result)){
			?>
				<div class="col-xs-12 col-md-4" style="border: 0px solid red; text-align: center;">
					<div class="col-xs-12 col-md-12 div_img_libro">
						<img id="img_<?php echo $row['k_codlibro']; ?>" src="../imagenes_libro/<?php echo $row['n_fotografia']; ?>" class="img_libro" onclick="redireccionar_detalle_libro_paginado(this);">
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-12" style="border: 0px solid blue;">
							<div class="row">
								<div class="col-xs-12 col-md-12" style="border: 0px solid orange;">
									<div class="row">
										<div class="col-xs-8 col-md-8 div_titulo_libro" style="border: 0px solid green;">
											<span class="titulo_libro"><?php echo $row['n_titulo']; ?></span><br>
											<span class="precio_libro"><?php echo $row['v_precio']; ?>$</span>
										</div>
										<div class="col-xs-4 col-md-4 div_carrito_libro" style="border: 0px solid purple;">
											<img id="carro_<?php echo $row['k_codlibro']; ?>" src="../images/carrito_compra.png" class="img_carrito_libro" title="agregar al carrito" onclick="redireccionar_carrito_libro_paginado(this);">
										</div>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?}?>
				<div class="col-xs-12 col-md-12" style="border: 0px solid purple; text-align: right;">
					<ul class="pagination">
						<?php
							//SELECCIONAR TODOS LOS REGISTROS DE LA TABLA LIBROS
							$sql = "SELECT * FROM libro";
							$result = mysqli_query($con, $sql);
							//CONTAR EL TOTAL DE REGISTROS
							$total_registros = mysqli_num_rows($result);
							//USANDO CEIL [PARA APROXIMACION NUMERICA] PARA DIVIDIR EL TOTAL DE REGISTROS ENTRE $por_pagina
							$total_paginas = ceil($total_registros / $por_pagina);

							$restar_pagina = $pagina-1;
							$sumar_pagina = $pagina+1;

							// echo "total_paginas-> ".$total_paginas;
							// echo " | sumar_pagina-> ".$sumar_pagina;

							//OPCIONES PARA LA FLECHA DE DEVOLVER PAGINA
							if ($restar_pagina == 0) {
								echo "<li class='disabled'><a>&laquo;</a></li>";
							}
							if ($restar_pagina > 0) {
								echo "<li><a href='javascript:refrescar_paginacion(".$restar_pagina.")'>&laquo;</a></li>";
							}

							//OPCIONES PARA LOS NUMEROS DE PAGINACION
							for ($i=1; $i <= $total_paginas; $i++) {
								if ($i == $pagina) {
									echo "<li class='active'><a href='javascript:refrescar_paginacion(".$i.")' disabled>".$i."</a></li>";
								}else{
									echo "<li><a href='javascript:refrescar_paginacion(".$i.")'>".$i."</a></li>";
								}
							}

							//OPCIONES PARA LA FLECHA DE ADELANTAR PAGINA
							if ($sumar_pagina == $total_paginas+1) {
								echo "<li class='disabled'><a>&raquo;</a></li>";
							}
							if ($sumar_pagina <= $total_paginas) {
								echo "<li><a href='javascript:refrescar_paginacion(".$sumar_pagina.")'>&raquo;</a></li>";
							}
						?>
					</ul>
				</div>
			</div>
		</div>

		<!-- 
		* SECCION CONTENEDOR LIBROS [ANGULAR]
		-->

		<div class="col-xs-12 col-md-7" id="contenedor_libros_busqueda">
			<div class="row">
				<div class="col-xs-12 col-md-4" ng-repeat="post in datos_libro" style="border: 0px solid red; text-align: center;">
					<div class="col-xs-12 col-md-12 div_img_libro">
						<img id="{{post.k_codlibro}}" src="../imagenes_libro/{{post.n_fotografia}}" class="img_libro" data-ng-click="detalle_libro($event)">
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-12" style="border: 0px solid blue;">
							<div class="row">
								<div class="col-xs-12 col-md-12" style="border: 0px solid orange;">
									<div class="row">
										<div class="col-xs-8 col-md-8 div_titulo_libro" style="border: 0px solid green;">
											<span class="titulo_libro">{{post.n_titulo}}</span><br>
											<span class="precio_libro">{{post.v_precio}}$</span>
										</div>
										<div class="col-xs-4 col-md-4 div_carrito_libro" style="border: 0px solid purple;">
											<input type="hidden" value="{{post.consecutivo}}">
											<img id="img_libro_busqueda_{{post.k_codlibro}}" src="../images/carrito_compra.png" class="img_carrito_libro" title="agregar al carrito" data-ng-click="obtenerId($event)">
										</div>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- 
		* SECCION CONTENEDOR DETALLE LIBRO [PHP]
		-->

		<div class="col-xs-12 col-md-7" id="contenedor_libro_detalle">
			<div class="row">
				<div class="col-xs-12 col-md-12 div_libro_detalle" style="border: 0px solid red;">
					<?php
					    //VERIFICAMOS SI LA REDIRECCION ES DESDE LA MISMA PAGINA SE PIDIO EL DETALLE DEL LIBRO / REDIRIJIMOS EL FOCO
						if (isset($_GET['detalle'])) {
							$detalle = $_GET['detalle'];
							if ($detalle == "si") {
								echo "<script language='javascript'>"; 
								// echo "swal('si detalle!');";
								echo "$('#contenedor_libros_paginacion').hide('fast');";
								echo "$('#contenedor_libro_detalle').show('slow');";
								echo "</script>";
							}
						}else{
							$detalle = "no";
							echo "<script language='javascript'>"; 
							//echo "swal('no hay detalle!');";
							echo "</script>";
						}
						//VERIFICAMOS SI EXISTE LA VARIABLE DE SESION DEL ID DEL LIBRO SE HACEESTO PARA PERMITIR UNA CORRECTA EJECUCION DEL SCRIPT PHP SINO EXISTE LA VARIABLE ASIGNAMOS CERO PARA QUE CONTINUE LA EJECUCION
						if (isset($_GET['id'])) {
							$codigo_libro = $_GET['id'];
							if ($codigo_libro != null) {
								echo "<script language='javascript'>"; 
								// echo "swal('si hay id!');";
								echo "</script>";
							}
						}else{
							$codigo_libro = "0";
							echo "<script language='javascript'>"; 
							// echo "swal('no hay id!');";
							echo "</script>";
						}
						
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
					<span class="titulo_libro_detalle"><?php echo $n_titulo; ?></span><br>
					<!-- <span style="color: black;">Erotico / Romance / Drama</span><br><br><br> -->
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<img src="../imagenes_libro/<?php echo $n_fotografia; ?>">	
						</div>
						<div class="col-xs-12 col-md-8 div_valores_libro_detalle">
							<div class="show_pantalla_grande"><br><br><br><br><br><br><br></div>
							<span class="precio_libro_detalle"><?php echo $v_precio; ?>$</span><br>
							<span class="label_libro_detalle">Autor: </span>
							<span class="valor_libro_detalle"><?php echo $n_autor; ?></span><br>
							<span class="label_libro_detalle">Editorial: </span>
							<span class="valor_libro_detalle"><?php echo $n_editorial; ?></span><br>
							<span class="label_libro_detalle">Año de edicion:  </span>
							<span class="valor_libro_detalle">2016</span><br>
							<span class="label_libro_detalle">Nº Páginas: </span>
							<span class="valor_libro_detalle"><?php echo $v_num_pagina; ?></span><br>
							<span class="label_libro_detalle">Formato: </span>
							<span class="valor_libro_detalle">Impreso</span><br>
						</div>
        				<div class="col-xs-12 col-md-12">
        					<br>
        					<img id="img_libro_detalles_<?php echo $k_codlibro; ?>" src="../images/btn-comprar.png" class="img_carrito_libro_detalle" data-ng-click="obtenerId($event)" title="agregar al carrito">
        				</div>
        				<div class="col-xs-12 col-md-12">
        					<br>
        					<p style="color:black; text-align: justify; font-size: large;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam venenatis lacus justo. Nulla vulputate mollis hendrerit. Etiam id condimentum urna, in tempor ex. Nam tincidunt lacinia diam at rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam ullamcorper, purus pharetra fringilla lacinia, nunc lorem laoreet nulla, id convallis nisl lorem quis magna. Phasellus sed eros hendrerit, mattis nisl vel, imperdiet est.</p>
        				</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-md-1" style="border: 0px solid;"></div>
	</div>

	<br><br><br>

	<!-- 
	* SECCION CONTENEDOR TERMINOS Y CONDICIONES / MEDIOS DE PAGO
	-->
	<div class="row">
		<div class="col-xs-12 col-md-6 div_terminos_condiciones">
			<img src="../images/terminos.png" class="img_terminos" onclick="mostrar_terminos_condiciones();" style="cursor: pointer;">
		</div>
		<div class="col-xs-12 col-md-6 div_medios_pago">
			<img src="../images/medios_pago.png" class="img_medios_pago">
		</div>
	</div>

	<br><br><br><br><br>
   
   	<footer class="pie">
	   	<br>
	   	
		<!-- 
		* MAPA DEL SITIO - PANTALLAS PEQUEÑAS
		-->
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
		

		<!-- 
		* MAPA DEL SITIO - PANTALLAS GRANDES
		-->
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
<!-- 
* CONTENEDOR - SECCION REDES SOCIALES FLOTANTES
-->
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