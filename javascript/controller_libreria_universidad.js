angular.module("MyFirstApp",[])
.controller("FirstController",function($scope,$http) {
	$scope.posts = [];
	$http.get("http://holkam.co.nf/json/json_libros.php")
	.then(function(result) {
        console.log(result);
        $scope.posts = result.data;﻿
    }, function(result) {
        //some error
        console.log(result);
    });

    var focalizar = $("#div_focalizar").position().top; //div a donde se quiere scrollear la pagina

    $("#boton_img").click(function(){
        alert("click_flecha_derecha");
    });
	
	$(".contenedor-text-buscar").click(function(){
		if ($('#text_buscar_libro').val() != "") {
			$scope.posts = [];
			var parametros = {libro: $scope.libro};
			$http.post('http://holkam.co.nf/json/json_buscar_libro.php', {data: parametros})
			.then(function(result) {
		        if (result.data.length != 0) {
					console.log(result);
		        	$scope.posts = result.data;﻿
		        	$('html,body').animate({scrollTop: focalizar}, 1000);
				}else{
					swal(
						'Error',
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
			$http.post('http://holkam.co.nf/json/json_buscar_libro.php', {data: parametros})
			.then(function(result) {
				if (result.data.length != 0) {
					console.log(result);
		        	$scope.posts = result.data;﻿
					$('html,body').animate({scrollTop: focalizar}, 1000);
				}else{
					swal(
						'Error',
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

	$(".contenedor-text-autor").click(function(){
		if ($('#text_buscar_autor').val() != "") {
			$scope.posts = [];
			var parametros = {libro: $scope.libro};
			$http.post('http://holkam.co.nf/json/json_buscar_autor.php', {data: parametros})
			.then(function(result) {
		        if (result.data.length != 0) {
					console.log(result);
		        	$scope.posts = result.data;﻿
		        	$('html,body').animate({scrollTop: focalizar}, 1000);
				}else{
					swal(
						'Error',
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
			$http.post('http://holkam.co.nf/json/json_buscar_autor.php', {data: parametros})
			.then(function(result) {
				if (result.data.length != 0) {
					console.log(result);
		        	$scope.posts = result.data;﻿
		        	$('html,body').animate({scrollTop: focalizar}, 1000);
				}else{
					swal(
						'Error',
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
		//swal(genero);
		$scope.posts = [];
		var parametros = {nombre_genero: genero};
		//console.log(parametros);
		$http.post('http://holkam.co.nf/json/json_buscar_genero.php', {libro: parametros})
		.then(function(result) {
	        if (result.data.length != 0) {
				console.log(result);
	        	$scope.posts = result.data;﻿
	        	$('html,body').animate({scrollTop: focalizar}, 1000);
			}else{
				swal(
					'Error',
					'Verifique el nombre del género!',
					'error'
		        );
			}
	    }, function(result) {
	        //some error
	        console.log(result);
	    });
	}

	$scope.probando = function(parametro){
		//alert(parametro.target.id);
		window.location = "www.google.com";
	}
});