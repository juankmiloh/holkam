angular.module("MyFirstApp",[])
.controller("FirstController",function($scope,$http) {
	$scope.posts = [];
	$http.get("../json/json_libros.php")
	.then(function(result) {
        console.log(result);
        $scope.posts = result.data;﻿
    }, function(result) {
        //some error
        console.log(result);
    });

    var focalizar = $("#div_focalizar").position().top; //div a donde se quiere scrollear la pagina
	
	$(".lupa-buscar-libro").click(function(){
		if ($('#text_buscar_libro').val() != "") {
			$scope.posts = [];
			var parametros = {libro: $scope.libro};
			$http.post('../json/json_buscar_libro.php', {data: parametros})
			.then(function(result) {
		        if (result.data.length != 0) {
					console.log(result);
		        	$scope.posts = result.data;﻿
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

	$("#text_buscar_libro").keydown(function(tecla){
		if (tecla.keyCode == 13) {
			$scope.posts = [];
			var parametros = {libro: $scope.libro};
			$http.post('../json/json_buscar_libro.php', {data: parametros})
			.then(function(result) {
				if (result.data.length != 0) {
					console.log(result);
		        	$scope.posts = result.data;﻿
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

	$(".lupa-buscar-autor").click(function(){
		if ($('#text_buscar_autor').val() != "") {
			$scope.posts = [];
			var parametros = {libro: $scope.libro};
			$http.post('../json/json_buscar_autor.php', {data: parametros})
			.then(function(result) {
		        if (result.data.length != 0) {
					console.log(result);
		        	$scope.posts = result.data;﻿
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

	$("#text_buscar_autor").keydown(function(tecla){
		if (tecla.keyCode == 13) {
			$scope.posts = [];
			var parametros = {libro: $scope.libro};
			$http.post('../json/json_buscar_autor.php', {data: parametros})
			.then(function(result) {
				if (result.data.length != 0) {
					console.log(result);
		        	$scope.posts = result.data;﻿
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

	$scope.change = function() {
		//swal("probando!");
		switch($scope.confirmed) {
	      	case '1': 
	      		//$scope.selected = '1';
	      		$scope.buscar_x_genero('acción');
	      		break;
	      	case '2': 
	      		//$scope.selected = '2';
	      		$scope.buscar_x_genero('drama');
	      		break;
	      	case '3': 
	      		//$scope.selected = '2';
	      		$scope.buscar_x_genero('sexo');
	      		break;
	    }
	}

	$scope.buscar_x_genero = function(genero) {
		var texto_label = $('#label_select_genero');
		texto_label.text("");
		//swal(genero);
		$scope.posts = [];
		var parametros = {nombre_genero: genero};
		//console.log(parametros);
		$http.post('../json/json_buscar_genero.php', {libro: parametros})
		.then(function(result) {
	        if (result.data.length != 0) {
				console.log(result);
	        	$scope.posts = result.data;﻿
	        	$('html,body').animate({scrollTop: focalizar}, 1000);
			}else{
				swal(
					'No Encontrado',
					'Verifique el nombre del género!',
					'error'
		        );
			}
	    }, function(result) {
	        //some error
	        console.log(result);
	    });
	}

	// Funcion para obtener el id del libro
	$scope.obtenerId = function(evento){
		var id_capturado = evento.target.id;
		window.location = "../pages/carrito_agregar.php?id="+id_capturado;
	}

	// Funcion para obtener el id del libro y enviarlo a la pagina de detalle del libro
	$scope.detalle_libro = function(evento){
		var id_capturado = evento.target.id;
		window.location = "../pages/libreria_universidad_detalle_libro.php?id="+id_capturado;
	}

	$scope.posts = [];
	$http.get("../json/json_libros.php")
	.then(function(result) {
        console.log(result);
        $scope.posts = result.data;﻿
    }, function(result) {
        //some error
        console.log(result);
    });	
});