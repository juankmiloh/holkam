<?php
if(!session_id()){
    session_start();
}

require_once "funciones.php";
if(obtenerSesion("username", 3) == ""){
	header("Location: autenticacion_users/login.php?ini=se");
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Carrito de Compras</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos-carrito.css?<?php echo date('YmdHis'); ?>">
	<link rel="stylesheet" type="text/css" href="../css/estilos-moda.css">	
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

			function actualizarPreview(id, cantidad, total){
				$("#cantidad"+id).text(cantidad);
				$("#total"+id).text(total+" $");
				if(cantidad < 2){
					$("#restar"+id).attr("disabled", true);
				}else{
					$("#restar"+id).attr("disabled", false);
				}
			}

			function actualizarPedido(id,cantidad){
				url = "actualizar_pedido.php?id="+id+"&cant="+cantidad;
				$.get(url, function(data,status){
					if(data == 1){
						alert("bien");
					}else{
						alert("mal");
					}
				});
			}

			$(".btn-restar").click(function(){
				var id = this.id.replace("restar","");
				var cantidad = parseInt($("#cantidad"+id).text());
				var precio = parseInt($("#precio"+id).text());
				var total = parseInt($("#total"+id).text().replace("$",""));
				if(cantidad > 1){
					cantidad = cantidad - 1;
					total = precio*cantidad;		
				}
				actualizarPreview(id,cantidad,total);
				url = "actualizar_pedido.php?id="+id+"&cant="+cantidad+"&tot="+total;
				$.get(url, function(data,status){
					if($("#total2").val() != ""){
						data = parseInt(data)+parseInt($("#total2").val());
					}
					
					$("#total-precio").text(data+" $");
				});
			});


			$(".btn-sumar").click(function(){
				var id = this.id.replace("sumar","");
				var cantidad = parseInt($("#cantidad"+id).text());
				var precio = parseInt($("#precio"+id).text());
				cantidad = cantidad + 1;
				total = precio*cantidad;
				actualizarPreview(id,cantidad,total);
				url = "actualizar_pedido.php?id="+id+"&cant="+cantidad+"&tot="+total;
				$.get(url, function(data,status){
					if($("#total2").val() != ""){
						data = parseInt(data)+parseInt($("#total2").val());
					}
					$("#total-precio").text(data+" $");
				});
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
							<li><a class="imagen-carro" href="#">
							    	<img alt="Brand" src="../images/Carro.png">
							    </a>
						    </li>	
						</ul>
					</div>


					<div class="container navbar-fixed-top"><a href="<?php if(obtenerGet("ex",2)=="Agregad"){echo 'libreria_universidad.php';}else{echo 'imprime_texto.html';}?>"><div class="btn-atras" title="Atras"></div></a>
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

	<div class="contenedor-carrito col-xs-12 col-sm-12 col-md-12">	</div>

	<div class="container texto">
		<div class="row">
			<center>
				<div class="col-xs-12 col-sm-12 col-md-12"><span><br><p><b>Finaliza tu compra. </b>Te esperamos, vuelve y disfruta de los<br> productos de la familia Holkam</p><br><br></span></div>
			</center>	
		</div>
	</div>

	<div class="container">
		<table class="table table-responsive">
			<thead>
				<th>Producto</th>
				<th>Envío</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th>Total</th>
			</thead>

			<tbody>
				<?php
					if(obtenerSesion("username", 3) != ""){
						$sqlPedido = "SELECT p.*, l.*, lf.* 
						FROM 
						libro_fotografia lf,
						libro l,
						pedido_actual p 
						WHERE p.pedAct_codLib = l.k_codlibro 
						AND p.pedAct_codLib = lf.k_codlibro
						AND p.ped_usuario_id =".obtenerSesion("username",3)->cli_id;
						$queryPedido = prepararQuery($sqlPedido);
						$resultPedido = ejecutarQuery($queryPedido);
						if($resultPedido){
							while ($object = $queryPedido->fetchObject()) {
								?>
								<tr>
									<td><img class="img-libro" src="../imagenes_libro/<?php echo $object->n_fotografia; ?>">
									<?php echo utf8_encode($object->n_titulo); ?>
									</td>
									<td>por calcular</td>
									<td><label id="precio<?php echo $object->pedAct_id;?>"><?php echo $object->v_precio." $"; ?></label></td>
									<td><input class="btn-restar boton" id="restar<?php echo $object->pedAct_id;?>" type="button" name="" value="-">&nbsp; <label class="canti" id="cantidad<?php echo $object->pedAct_id;?>"><?php echo $object->pedAct_cantLib; ?></label>&nbsp;<input class="btn-sumar boton" id="sumar<?php echo $object->pedAct_id;?>" type="button" name="" value="+"></td>
									<td><label id="total<?php echo $object->pedAct_id;?>"><?php echo $object->ped_total." $"; ?></label></td>
								</tr>
								<?php
							}
						}    
					}else{
						?>

						<tr>
							<td colspan="5">
								<h1>Debes <a href="autenticacion_users/login.php">Iniciar Sesión</a> para realizar compras</h1>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
		<table class="table table-responsive">
			<thead>
				<th>Impresión</th>
				<th>Escecificaciones</th>
				<th>Cantidad</th>
				<th>Precio</th>
			</thead>
			<tbody>
				<?php
				$sqlPedido2 = "SELECT 
									ise.*, 
									pais.* 
								FROM 
									imprime_seccion ise, 
									pedido_actual_imprime_seccion pais 
								WHERE 
									pais.is_id = ise.is_id
								AND cli_id = ".obtenerSesion("username",3)->cli_id."
								AND pais.pais_activo = 1";
				$queryPedido2 = prepararQuery($sqlPedido2);
				$resultPedido2 = ejecutarQuery($queryPedido2);
				if($resultPedido2){
					while($pedido2 = $queryPedido2->fetchObject()){
						?>
						<tr>
							<td><img class="img-imprime" src="../images/<?php echo $pedido2->is_imagen ?>"></td>
							<td>
								<?php
								$sqlCarac = "SELECT * FROM caracteristica_imprime_seccion WHERE pais_id = ".$pedido2->pais_id." ORDER BY cis_id";
								$queryCarac = prepararQuery($sqlCarac);
								$resultCarac = ejecutarQuery($queryCarac);
								if($resultCarac){
									?>
									<table class="table table-bordered">
									<?php
									while($carac = $queryCarac->fetchObject()){
										?>
										<tr>
											<td><strong><?php echo utf8_decode($carac->cis_nombre) ?></strong></td>
											<td><?php echo utf8_decode($carac->cis_valor) ?></td>
										</tr>
										
										<?php
									}
									?>
									</table>
									<?php
								}
								?>
							</td>
							<td><strong><?php echo $pedido2->pais_cantidad ?></strong></td>
							<td><strong><?php echo $pedido2->pais_valor_total ?> &nbsp;$</strong></td>
						</tr>
						<?php
					}
				}
				?>
			</tbody>
		</table>
		<div class="pie-tabla"><br>
		<?php
		if(obtenerSesion("username", 3) != ""){
			$sql1 = "SELECT SUM(pais_valor_total) AS suma1 FROM pedido_actual_imprime_seccion WHERE cli_id =".obtenerSesion("username",3)->cli_id." AND pais_activo = 1";
			$query1 = prepararQuery($sql1);
			$result1 = ejecutarQuery($query1);
			if($result1){
				$suma1 = $query1->fetchObject();
				?>
				<input type="hidden" id="total2" value="<?php echo $suma1->suma1; ?>">
				<?php
			}
		?>

			<label id="tit-tot">Total</label><br>	
			<label id="total-precio"><?php
			$sql = "SELECT SUM(ped_total) AS suma FROM pedido_actual WHERE ped_usuario_id =".obtenerSesion("username",3)->cli_id;
			$query = prepararQuery($sql);
			$result = ejecutarQuery($query);
			$result2 = ejecutarQuery($query1);
			if($result){
				if($result2){
					$suma2 = $query1->fetchObject();
					$sumaTotal = $query->fetchObject();
					if($suma2->suma1 != ""){
						echo $sumaTotal->suma+$suma2->suma1." $";
					}else{
						echo $sumaTotal->suma." $";
					}	
				}
			}
			?></label>
			<br>
			<a href="autenticacion_users/nueva_cuenta.php?pago=true"><img src="../images/btn-comprar.png" style="margin-right: -2%; margin-top: -1%;"></a>
			<hr>
			<a href="./crear_pdf_cotizacion.php">Descargar Cotización</a>
			<br><br>
		<?php } ?>
		
		</div>
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