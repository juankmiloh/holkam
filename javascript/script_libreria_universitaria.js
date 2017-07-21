jQuery(document).ready(function($){
  //alert("probando script!");
});

function cambiar_option(select) {
	/* Se capturan los valores del select al ser seleccionado */
	var id_select = $(select).attr("id");
	var codigo_option = $(select).val();
	var texto_option = $('#'+id_select+' option:selected').text(); //tomamos el texto seleccionado

	/* Se cambia el texto del select */
	var texto_label = $('#label_universidades');
	texto_label.text(texto_option);

	/* Se redirecciona a la pagina de la libreria de la universidad */
	if (codigo_option != 0) {
		location.href="./libreria_universidad.php?cod_universidad="+codigo_option;
	}
}