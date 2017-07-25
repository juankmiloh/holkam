$(document).ready(function(){

	$(".redes-sociales-c").hide();
	//$(".redes-sociales").css("display","none");

	$(".redes-sociales").click(function(){
		if($(".redes-sociales-c").is(":visible")){
			$(".redes-sociales-c").hide(500);
			$(this).css("background-image","url('../images/redes/right.png')");
			$(this).css("left","15px");
		}else{
			$(".redes-sociales-c").show(500);
			$(this).css("background-image","url('../images/redes/left.png')");
			$(this).css("left","41px");
		}
		
	});
});