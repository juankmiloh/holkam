jQuery(document).ready(function($){
	//alert("probando script!");
	click_flecha_izquierda();
	click_flecha_derecha();
	cargar_libro_destacado(1);
	recibir_foco_buscar_libro();
	recibir_foco_buscar_autor();
	recibir_foco_select_genero();
	girar_hacia_derecha_automatico();
	hover_div_destacado();
});

//VARIABLE PARA GUARDAR LA FUNCION SETTIMEOUT [girar_hacia_derecha_automatico]
var variable_cambiar_auto;

//CAPTURAMOS LA PAGINA ACTUAL SELECCIONADA DE LA PAGINACION
var paginacion_actual = getQueryVariable('pagina');

//CAPTURAMOS EL ID DEL LIBRO ACTUAL QUE ESTA SELECCIONADO EN LA SECCION DETALLE
var id_libro_detalle_actual = getQueryVariable('id');

/*=============================================
* Funcion que permite abrir la ventana que aparece mientras se guarda la inspeccion
*==============================================*/
function abrirVentanaCarga(){
  $('.fb').show();
  $('.fbback').show();
  $('body').css('overflow','hidden');
}

/*=============================================
* Funcion que permite cerrar la ventana que aparece mientras se guarda la inspeccion
* Luego de que se guarde se muestra una alerta y se redirige al index
*==============================================*/
function cerrarVentanaCarga(){
  $('.fb').hide();
  $('.fbback').hide();
  $('body').css('overflow','auto');
  message = 'Todo salio bien, se guardo la inspeccion Nº. ' + window.sessionStorage.getItem("consecutivo_inspeccion") + '\n\n¿Desea realizar otra inspección?';
  title = 'Montajes & Procesos M.P SAS';
  if(navigator.notification && navigator.notification.alert){
    navigator.notification.confirm(
    message, // message
    onConfirm, // callback to invoke with index of button pressed
    title, // title
    ['SI','NO'] // buttonLabels -> valores [1,0]
  );
  }else{
    alert('Todo salio bien, se guardo la inspeccion Nº. ' + window.sessionStorage.getItem("consecutivo_inspeccion"));
    reiniciarInspeccion();
  }
}

/*=============================================
* Funcion que permite capturar el valor de la variable enviada por URL
*==============================================*/
function getQueryVariable(variable) {
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
* FUNCION QUE SE EJECUTA CUANDO EL TEXT DE BUSCAR LIBRO RECIBE EL FOCO
*==============================================*/
function recibir_foco_buscar_libro() {
	$('#text_buscar_libro').focus(function() {
		$('#text_buscar_autor').val("");
	});
}

/*=============================================
* FUNCION QUE SE EJECUTA CUANDO EL TEXT DE BUSCAR AUTOR RECIBE EL FOCO
*==============================================*/
function recibir_foco_buscar_autor() {
	$('#text_buscar_autor').focus(function() {
		$('#text_buscar_libro').val("");
	});
}

/*=============================================
* FUNCION QUE SE EJECUTA CUANDO EL SELECT DE GENEROS DE LIBROS RECIBE EL FOCO
*==============================================*/
function recibir_foco_select_genero() {
	$('#select_genero').focus(function() {
		$('#text_buscar_libro').val("");
		$('#text_buscar_autor').val("");
	});
}

/*=============================================
* Funcion que recibe por parametro el consecutivo del libro que se desea mostrar y lo envia al servidor el cual nos devuelve un json 
* con los datos del libro incluyendo su imagen para poder mostrarlo
*==============================================*/
function cargar_libro_destacado(consecutivo) {
	$('.img_libro_destacado').addClass("img_libro_destacado_aparece");
	var parametros = {"consecutivo" : consecutivo};
	$.ajax({
		url: "../json/json_datos_libro.php",
		data: parametros,
        type: "POST",
        dataType : "JSON",
        success: function(response){ //response recibe los datos en formato JSON
        	//alert(response);
        	$.each(response, function(i,items){
        		if (items.cantidad_filas != 0) {
        			//alert(items.cantidad_filas);
				  	$(".consecutivo_libro_destacado").val(items.consecutivo);
				  	$(".k_cod_libro_destacado").val(items.k_codlibro);
				  	$(".autor_libro_destacado").text(items.n_autor);
				  	$(".titulo_libro_destacado").text(items.n_titulo);
				  	$(".precio_libro_destacado").text(items.v_precio+"$");
				  	$(".img_libro_destacado").attr("src","../imagenes_libro/"+items.n_fotografia);
				  	setTimeout(function(){ $('.img_libro_destacado').addClass("img_libro_destacado_normal"); }, 200);
        		}else{
        			$('.img_libro_destacado').removeClass("img_libro_destacado_normal");
			        cargar_libro_destacado(1);
        		}
			});            
        }
	});
}

/*=============================================
* Funcion que se ejecuta cuando se le da click a la flecha derecha, se llama la funcion cargar libro y se le pasa por parametro
* el consecutivo del libro actual mostrado mas 1 para que al hacer la consulta SQL nos muestre el libro con el codigo que se envia
*==============================================*/
function click_flecha_derecha() {
	$(".div_flecha_derecha").click(function(){
        //alert("click_flecha_derecha");
        $('.img_libro_destacado').removeClass("img_libro_destacado_normal");
        var consecutivo_actual = parseInt($(".consecutivo_libro_destacado").val());
        cargar_libro_destacado(consecutivo_actual + 1);
    });
}

/*=============================================
* Funcion que se ejecuta cuando se le da click a la flecha izquierda, se llama la funcion cargar libro y se le pasa por parametro
* el consecutivo del libro actual mostrado menos 1 para que al hacer la consulta SQL nos muestre el libro con el codigo que se envia
*==============================================*/
function click_flecha_izquierda() {
	$(".div_flecha_izquierda").click(function(){
        //alert("click_flecha_izquierda");
        $('.img_libro_destacado').removeClass("img_libro_destacado_normal");
        var consecutivo_actual = parseInt($(".consecutivo_libro_destacado").val());
        cargar_libro_destacado(consecutivo_actual - 1);
    });
}

/*=============================================
* Funcion que se ejecuta cuando se pasa el mouse sobre los controles del div del libro destacado
*==============================================*/
function hover_div_destacado() {
	var n=0;
	$(".libro_destacado_hover").mouseenter(function() {
		n += 1;
		console.log("mouse enter x " + n);
		detener_girar_hacia_derecha_automatico();
	}).mouseleave(function() {
		console.log("mouse leave");
		girar_hacia_derecha_automatico();
	});
}

/*=============================================
* Funcion recursiva que se ejecuta para ir cambiando de manera automatica los libros destacados
*==============================================*/
function girar_hacia_derecha_automatico() {
	$('.img_libro_destacado').removeClass("img_libro_destacado_normal");
    var consecutivo_actual = parseInt($(".consecutivo_libro_destacado").val());
    cargar_libro_destacado(consecutivo_actual + 1);
    variable_cambiar_auto = setTimeout(function(){ girar_hacia_derecha_automatico(); }, 3000);
}

/*=============================================
* Funcion para detener la funcion settimeout que se ejecuta para ir cambiando el libro destacado de manera automatica
*==============================================*/
function detener_girar_hacia_derecha_automatico() {
    clearTimeout(variable_cambiar_auto);
}

/*=============================================
* FUNCION QUE SE EJECUTA CUANDO SE DA CLICK AL LIBRO DESTACADO
* SE REDIRECCIONA A LA PAGINA DETALLE LIBRO
*==============================================*/
function redireccionar_detalle_libro_destacado() {
	var k_codlibro = $('.k_cod_libro_destacado').val();
	if (id_libro_detalle_actual != k_codlibro) {
    	window.location = "../pages/libreria_universidad.php?id="+k_codlibro+"&detalle=si#focalizar";
    }else{
    	$('#contenedor_libros_busqueda').hide('slow');
		$('#contenedor_libros_paginacion').hide('slow');
		$('#contenedor_libro_detalle').show('slow');
		location.href = "#focalizar";
    }
}

/*=============================================
* FUNCION QUE SE EJECUTA CUANDO SE DA CLICK AL CARRITO DEL LIBRO DESTACADO
* SE REDIRECCIONA A LA PAGINA DE AGREGAR AL CARRITO
*==============================================*/
function redireccionar_carrito_libro_destacado() {
	var k_codlibro = $('.k_cod_libro_destacado').val();
	window.location = "../pages/carrito_agregar.php?id="+k_codlibro;
}

/*=============================================
* FUNCION QUE SE EJECUTA CUANDO SE DA CLICK AL LIBRO PAGINADO
* SE REDIRECCIONA A LA PAGINA DETALLE LIBRO
*==============================================*/
function redireccionar_detalle_libro_paginado(img_libro) {
	var id_img = $(img_libro).attr("id");
    var k_codlibro = id_img.substr(4);
    //alert(k_codlibro);
    if (id_libro_detalle_actual != k_codlibro) {
    	window.location = "../pages/libreria_universidad.php?id="+k_codlibro+"&detalle=si#focalizar";
    }else{
    	$('#contenedor_libros_busqueda').hide('slow');
		$('#contenedor_libros_paginacion').hide('slow');
		$('#contenedor_libro_detalle').show('slow');
		location.href = "#focalizar";
    }
}

/*=============================================
* FUNCION QUE SE EJECUTA CUANDO SE DA CLICK AL CARRITO DEL LIBRO PAGINADO
* SE REDIRECCIONA A LA PAGINA DE AGREGAR AL CARRITO
*==============================================*/
function redireccionar_carrito_libro_paginado(carrito) {
	var id_carrito = $(carrito).attr("id");
    var k_codlibro = id_carrito.substr(6);
	// alert(k_codlibro);
	window.location = "../pages/carrito_agregar.php?id="+k_codlibro;
}

/*=============================================
* FUNCION QUE SE EJECUTA CUANDO SE PRESIONA UNA PAGINA DEL PAGINADOR
* SE RECIBE POR PARAMETRO LA PAGINA A LA QUE SE QUIERE REDIRECCIONAR
* SE VERIFICA SI LA PAGINA ACTUAL (LA QUE ESTA EN LA URL) ES DIFERENTE A LA QUE SE RECIBE POR PARAMETRO PARA EVITAR RECARGAR LA PAGINA
*==============================================*/
function refrescar_paginacion(pagina) {
	if (paginacion_actual != pagina) {
		$('#texto_carga').text('Cargando libros...página '+pagina);
		location.href = "#arriba";
		abrirVentanaCarga();
		setTimeout(function(){ window.location = "libreria_universidad.php?pagina="+pagina+"#focalizar"; }, 500);
	}else{
		//alert("iguales!");
	}
}

/*=============================================
* FUNCION QUE SE EJECUTA CUANDO SE PRESIONA LA OPCION DE "LISTAR TODAS LAS CATEGORIAS!"
*==============================================*/
function listar_todos_libros() {
	abrirVentanaCarga();
	location.href = "libreria_universidad.php?focalizar=si";
	//location.reload();
}

/*=============================================
* FUNCION QUE SE EJECUTA CUANDO SE PRESIONA LA IMAGEN DE TERMINOS Y CONDICIONES
*==============================================*/
function mostrar_terminos_condiciones() {
	swal({
      title: 'Términos y Condiciones',
      type: 'info',
      html: '<p class="alerta">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam venenatis lacus justo. Nulla vulputate mollis hendrerit. Etiam id condimentum urna, in tempor ex. Nam tincidunt lacinia diam at rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam ullamcorper, purus pharetra fringilla lacinia, nunc lorem laoreet nulla, id convallis nisl lorem quis magna. Phasellus sed eros hendrerit, mattis nisl vel, imperdiet est.</p>',
      showCloseButton: true,
      showCancelButton: false,
      confirmButtonText: '<i class="fa fa-thumbs-up"></i> Aceptar',
      allowOutsideClick: false,
      showConfirmButton: true
    });
}