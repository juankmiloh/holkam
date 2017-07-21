$(document).ready(function(){

	$.ajax({
		url:"gestionLogin.php",
		data:"id="+2,
		success:function(response){
			response = JSON.parse(response);
			$(".imagen").html(response);
		},
		error:function(error){
			//alert(error);
		}
	});	
	
});