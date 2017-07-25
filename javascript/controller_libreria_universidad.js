angular.module("MyFirstApp",[])
.controller("FirstController",function($scope,$http) {

    //CARGAR VALORES DEL GENERO DEL LIBRO PARA PODER CARGARLOS EN EL SELECT GENERO
    $http.get("../json/json_libro_genero.php")
	.then(function(result) {
        console.log(result);
        $scope.datos_genero_libro = result.data;﻿
    }, function(result) {
        //some error
        console.log(result);
    });

	//CARGAR VALORES DE LOS LIBROS
    $scope.datos_libro = [];
	$http.get("../json/json_libros.php")
	.then(function(result) {
        console.log(result);
        $scope.datos_libro = result.data;﻿
    }, function(result) {
        //some error
        console.log(result);
    });

    //CARGAR VALORES DE LA CATEGORIA DE LIBROS Y SU RESPECTIVA CANTIDAD
	$http.get("../json/json_libro_categoria.php")
	.then(function(result) {
        console.log(result);
        $scope.datos_categoria = result.data;﻿
    }, function(result) {
        //some error
        console.log(result);
    });

	//DIV A DONDE SE QUIERE SCROLLEAR LA PAGINA
    var focalizar = $("#div_focalizar").position().top;
	
	//FUNCION QUE SE EJECUTA AL DARLE CLICK A LA LUPA DEL TEXT BUSCAR LIBRO
	$(".lupa-buscar-libro").click(function(){
		$('#contenedor_libros_busqueda').show('slow');
		$('#contenedor_libros_paginacion').hide('slow');
		$('#contenedor_libro_detalle').hide('slow');
		if ($('#text_buscar_libro').val() != "") {
			$scope.datos_libro = [];
			var parametros = {libro: $scope.libro};
			$http.post('../json/json_buscar_libro.php', {data: parametros})
			.then(function(result) {
		        if (result.data.length != 0) {
					console.log(result);
		        	$scope.datos_libro = result.data;﻿
		        	$('html,body').animate({scrollTop: focalizar}, 1000);
				}else{
					swal(
						'No Encontrado',
						'Verifique el nombre del libro!',
						'error'
			        );
				}
				$scope.libro.nombre_libro = '';
		    }, function(result) {
		        //some error
		        console.log(result);
		    });
		}
	});

	//FUNCION QUE SE EJECUTA AL DAR ENTER ESTANDO EN EL TEXT BUSCAR LIBRO
	$("#text_buscar_libro").keydown(function(tecla){
		$('#contenedor_libros_busqueda').show('slow');
		$('#contenedor_libros_paginacion').hide('slow');
		$('#contenedor_libro_detalle').hide('slow');
		if (tecla.keyCode == 13) {
			$scope.datos_libro = [];
			var parametros = {libro: $scope.libro};
			$http.post('../json/json_buscar_libro.php', {data: parametros})
			.then(function(result) {
				if (result.data.length != 0) {
					console.log(result);
		        	$scope.datos_libro = result.data;﻿
					$('html,body').animate({scrollTop: focalizar}, 1000);
				}else{
					swal(
						'No Encontrado',
						'Verifique el nombre del libro!',
						'error'
			        );
				}
				$scope.libro.nombre_libro = '';
		    }, function(result) {
		        //some error
		        console.log(result);
		    });
		}
	});

	//FUNCION QUE SE EJECUTA AL DARLE CLICK A LA LUPA DEL TEXT BUSCAR AUTOR
	$(".lupa-buscar-autor").click(function(){
		$('#contenedor_libros_busqueda').show('slow');
		$('#contenedor_libros_paginacion').hide('slow');
		$('#contenedor_libro_detalle').hide('slow');
		if ($('#text_buscar_autor').val() != "") {
			$scope.datos_libro = [];
			var parametros = {libro: $scope.libro};
			$http.post('../json/json_buscar_autor.php', {data: parametros})
			.then(function(result) {
		        if (result.data.length != 0) {
					console.log(result);
		        	$scope.datos_libro = result.data;﻿
		        	$('html,body').animate({scrollTop: focalizar}, 1000);
				}else{
					swal(
						'No Encontrado',
						'Verifique el nombre del autor!',
						'error'
			        );
				}
				$scope.libro.nombre_autor = '';
		    }, function(result) {
		        //some error
		        console.log(result);
		    });
		}
	});

	//FUNCION QUE SE EJECUTA AL DAR ENTER ESTANDO EN EL TEXT BUSCAR AUTOR
	$("#text_buscar_autor").keydown(function(tecla){
		$('#contenedor_libros_busqueda').show('slow');
		$('#contenedor_libros_paginacion').hide('slow');
		$('#contenedor_libro_detalle').hide('slow');
		if (tecla.keyCode == 13) {
			$scope.datos_libro = [];
			var parametros = {libro: $scope.libro};
			$http.post('../json/json_buscar_autor.php', {data: parametros})
			.then(function(result) {
				if (result.data.length != 0) {
					console.log(result);
		        	$scope.datos_libro = result.data;﻿
		        	$('html,body').animate({scrollTop: focalizar}, 1000);
				}else{
					swal(
						'No Encontrado',
						'Verifique el nombre del autor!',
						'error'
			        );
				}
				$scope.libro.nombre_autor = '';
		    }, function(result) {
		        //some error
		        console.log(result);
		    });
		}
	});

	//FUNCION QUE SE EJECUTA CUANDO SE SELECCIONA UNA OPCION DEL SELECT GENERO
	$scope.buscar_por_genero = function() {
		// swal($scope.select_genero.k_codgenero);
		var texto_label = $('#label_select_genero');
		texto_label.text("");

		var k_codgenero = $scope.select_genero.k_codgenero;
		if (k_codgenero != "0") { 
			$scope.buscar_genero(k_codgenero);
		}else{ //SI SE SELECCIONA LA OPCION LISTAR TODO
			abrirVentanaCarga();
			location.href = "libreria_universidad.php?focalizar=si";
		}
	}

	//FUNCION QUE PERMITE BUSCAR POR CATEGORIA
	$scope.buscar_categoria = function(evento) {
		var k_codgenero = evento.target.id;
		//alert(k_codgenero);
		$scope.buscar_genero(k_codgenero);
	}

	//FUNCION QUE PERMITE BUSCAR EL LIBRO POR GENERO
	$scope.buscar_genero = function(genero) {
		//swal(genero);
		$('#contenedor_libros_busqueda').show('slow');
		$('#contenedor_libros_paginacion').hide('slow');
		$('#contenedor_libro_detalle').hide('slow');
		$scope.datos_libro = [];
		var parametros = {k_codgenero: genero};
		//console.log(parametros);
		$http.post('../json/json_buscar_genero.php', {libro: parametros})
		.then(function(result) {
	        if (result.data.length != 0) {
				console.log(result);
	        	$scope.datos_libro = result.data;﻿
	        	$('html,body').animate({scrollTop: focalizar}, 1000);
			}else{
				swal(
					'No hay existencias!',
					'Seleccione otro género',
					'info'
		        );
		        $('#contenedor_libros_busqueda').hide('slow');
			}
	    }, function(result) {
	        //some error
	        console.log(result);
	    });
	}

	//FUNCION PARA OBTENER EL ID DEL LIBRO PARA PODER AGREGARLO AL CARRITO
	$scope.obtenerId = function(evento){
		var id_capturado = evento.target.id;
		// alert(id_capturado);
		var k_codlibro = id_capturado.substr(19);
		window.location = "../pages/carrito_agregar.php?id="+k_codlibro;
	}

	/*=============================================
	* FUNCION QUE PERMITE CAPTURAR EL VALOR DE LA VARIABLE ENVIADA POR URL
	*==============================================*/
	$scope.getQueryVariable = function(variable){
	    var query = window.location.search.substring(1);
	    var vars = query.split("&");
	    for (var i=0; i < vars.length; i++) {
	        var pair = vars[i].split("=");
	        if(pair[0] == variable) {
	            return pair[1];
	        }
	    }
	    return false;
	}

	/*=============================================
	* FUNCION PARA OBTENER EL ID DEL LIBRO Y MOSTRAR EL DIV DE DETALLE DEL LIBRO
	* SE COMPARA EL ID DE LA URL CON EL ID OBTENIDO DE LA IMAGEN
	* SI SON DIFERENTES SE CARGA EL DIV DE DETALLE CON EL NUEVO ID DEL LIBRO
	* SI SON IGUALES SOLO SE DESOCULTA EL DIV CON EL DETALLE DEL LIBRO
	*==============================================*/
	$scope.detalle_libro = function(evento){
		var id_libro_detalle_actual = $scope.getQueryVariable('id');
		//alert(id_libro_detalle_actual);
		var k_codlibro = evento.target.id;
		if (id_libro_detalle_actual != k_codlibro) {
    		window.location = "../pages/libreria_universidad.php?id="+k_codlibro+"&detalle=si#focalizar";
	    }else{
	    	$('#contenedor_libros_busqueda').hide('slow');
			$('#contenedor_libros_paginacion').hide('slow');
			$('#contenedor_libro_detalle').show('slow');
			location.href = "#focalizar";
	    }
	}
});