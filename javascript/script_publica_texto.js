$(document).on('ready', function() {
  $("#input_adjuntar_archivo").fileinput({
    showCaption: true,
    showUpload: false
  });
  bloquear_form();
});

/*=============================================
* Funcion que permite abrir la ventana que aparece mientras se guarda la inspeccion
*==============================================*/
function abrirVentanaCarga(){
  $('.fb').show();
  $('.fbback').show();
  $('body').css('overflow','hidden');
}

/*========================================================================
* FUNCION QUE PERMITE BLOQUEAR EL ENVIO DE DATOS DEL FORM SIEMPRE Y CUANDO LOS CHECKS NO ESTEN SELECCIONADOS
*========================================================================*/
function bloquear_form() {
  $("#formulario").submit(function() {
    var bandera = 0;
      for (var i = 1; i <= 5; i++) {
        if( $('#numero_check_'+i).prop('checked') ) {
          //alert('#numero_check_'+i);
          bandera += 1;
        }
      }
      if (bandera == 0) {
        swal({
      title: 'ERROR!',
      type: 'error',
      html: 'Debe seleccionar el avance de su publicación.',
      showCloseButton: false,
      showCancelButton: false,
      confirmButtonText: '<i class="fa fa-thumbs-up"></i> oK',
      allowOutsideClick: false
    }).then(function () {
      $('#numero_check_1').focus();
    });
      return false; //BLOQUEA EL FORM
    }else{
      location.href = "#arriba";
      abrirVentanaCarga();
      $('#texto_carga').text('Enviando correo...Espera');
      return true; //SE DESBLOQUEA EL FORM
    }
  });
}