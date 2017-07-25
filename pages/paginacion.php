<?php
	include ("../conexion_bd/conexion_BD.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Paginacion con PHP y MySQL</title>
</head>
<body>
	<?php
		//CANTIDAD DE REGISTROS POR PAGINA POR DEFAULT [2] SE VARIA EL VALOR POR MEDIO DE REDIRECCION DESDE JQUERY 
		if (isset($_GET['por_pagina'])) {
			$por_pagina =$_GET['por_pagina'];
		}else{
			$por_pagina = 2;
		}

		//PAGINA POR DEFAULT EN LA QUE QUEREMOS INICIAR LA CARGA DE LA PAGINA
		if (isset($_GET['pagina'])) {
			$pagina =$_GET['pagina'];
		}else{
			$pagina = 1;
		}

		//LA PAGINA INICIA EN 0 Y SE MULTIPLICA $por_pagina
		$empieza = ($pagina -1) * $por_pagina;

		//SELECCIONAR LOS REGISTROS DE LA TABLA LIBRO CON LIMIT
		$sql = "SELECT * FROM libro LIMIT $empieza, $por_pagina";
		$result = mysqli_query($con, $sql);
	?>
	<table align="center" border="2" cellpadding="3">
		<tr>
			<th>CÓDIGO</th>
			<th>NOMBRE</th>
			<th>GÉNERO</th>
		</tr>
		<?php
			while($row = mysqli_fetch_array($result)){
		?>
		<tr align="center">
			<td><?php echo $row['k_codlibro']; ?></td>
			<td><?php echo $row['n_titulo']; ?></td>
			<td><?php echo $row['k_codgenero']; ?></td>
		</tr>
		<?}?>
	</table>
	<div>
		<?php
			//SELECCIONAR TODOS LOS REGISTROS DE LA TABLA LIBROS
			$sql = "SELECT * FROM libro";
			$result = mysqli_query($con, $sql);
			//CONTAR EL TOTAL DE REGISTROS
			$total_registros = mysqli_num_rows($result);
			//USANDO CEIL [PARA APROXIMACION NUMERICA] PARA DIVIDIR EL TOTAL DE REGISTROS ENTRE $por_pagina
			$total_paginas = ceil($total_registros / $por_pagina);

			//LINK A PRIMERA PAGINA
			echo "<center><a href='paginacion.php?pagina=1'>Primera</a>";

			for ($i=1; $i <=$total_paginas; $i++) { 
				echo "<center><a href='paginacion.php?pagina=".$i."'>".$i."</a>";
			}

			//LINK A LA ULTIMA PAGINA
			echo "<center><a href='paginacion.php?pagina=".$total_paginas."'>Ultima</a>";
		?>
	</div>
</body>
</html>