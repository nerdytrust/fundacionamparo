/***************** Slide-In Nav ******************/


function efectos() {

	
	$(".mostrar-ocultar").on("click",function(){
		$(".deslizante").slideToggle("slow");
	});
	$(".mostrar-ocultar2").on("click",function(){
		$(".deslizante2").slideToggle("slow");
	});
	$(".mostrar-ocultar3").on("click",function(){
		$(".deslizante3").slideToggle("slow");
	});
	$(".mostrar-ocultar4").on("click",function(){
		$(".deslizante4").slideToggle("slow");
	});
	$(".mostrar-ocultar5").on("click",function(){
		$(".deslizante5").slideToggle("slow");
	});
}

$(document).on("ready",efectos);