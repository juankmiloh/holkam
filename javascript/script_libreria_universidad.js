jQuery(document).ready(function($){
	//alert("probando script!");
	click_flecha_izquierda();
	click_flecha_derecha();
	cargar_libro_destacado(0);
	recibir_foco_buscar_libro();
	recibir_foco_buscar_autor();
	recibir_foco_select_genero();
});

function recibir_foco_buscar_libro() {
	$('#text_buscar_libro').focus(function() {
		$('#text_buscar_autor').val("");
	});
}

function recibir_foco_buscar_autor() {
	$('#text_buscar_autor').focus(function() {
		$('#text_buscar_libro').val("");
	});
}

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
	$('#img_libro_destacado').addClass("img_libro_destacado_aparece");
	var parametros = {"consecutivo" : consecutivo};
	$.ajax({
		url: "http://holkam.co.nf/json/json_datos_libro.php",
		data: parametros,
        type: "POST",
        dataType : "JSON",
        success: function(response){ //response recibe los datos en formato JSON
        	//alert(response);
        	$.each(response, function(i,items){
        		if (items.cantidad_filas != 0) {
        			//alert(items.cantidad_filas);
				  	$("#consecutivo_libro_destacado").val(items.consecutivo);
				  	$("#titulo_libro_destacado").text(items.n_titulo);
				  	$("#precio_libro_destacado").text(items.v_precio+"$");
				  	$("#img_libro_destacado").attr("src","../imagenes_libro/"+items.n_fotografia);
				  	setTimeout(function(){ $('#img_libro_destacado').addClass("img_libro_destacado_normal"); }, 200);
        		}else{
        			$('#img_libro_destacado').removeClass("img_libro_destacado_normal");
			        cargar_libro_destacado(0);
        		}
			});            
        }
	});
}

/*=============================================
* Funcion para cambiar los valores del select genero
*==============================================*/
function cambiar_option(select) {
	/* Se capturan los valores del select al ser seleccionado */
	var id_select = $(select).attr("id");
	var codigo_option = $(select).val();
	var texto_option = $('#'+id_select+' option:selected').text(); //tomamos el texto seleccionado
	var texto_label = $('#label_select_genero');

	/* Se cambia el texto del select */
	if (codigo_option != 0) {
		texto_label.text(texto_option);
	}else{
		texto_label.text("Género");
	}
}

/*=============================================
* Funcion que se ejecuta cuando se le da click a la flecha derecha, se llama la funcion cargar libro y se le pasa por parametro
* el consecutivo del libro actual mostrado mas 1 para que al hacer la consulta SQL nos muestre el libro con el codigo que se envia
*==============================================*/
function click_flecha_derecha() {
	$(".div_flecha_derecha").click(function(){
        //alert("click_flecha_derecha");
        $('#img_libro_destacado').removeClass("img_libro_destacado_normal");
        var consecutivo_actual = parseInt($("#consecutivo_libro_destacado").val());
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
        $('#img_libro_destacado').removeClass("img_libro_destacado_normal");
        var consecutivo_actual = parseInt($("#consecutivo_libro_destacado").val());
        cargar_libro_destacado(consecutivo_actual - 1);
    });
}