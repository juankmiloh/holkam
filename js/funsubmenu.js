// Funcion para hacer funcionar los submenus de bootstrap

var inicio = function(){
  $('.dropdown-submenu a.test').on('click',function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
}

$(document).on('ready',inicio);