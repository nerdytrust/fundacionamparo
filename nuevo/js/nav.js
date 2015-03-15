/***************** Slide-In Nav ******************/
$(document).on("ready",efectos);

function efectos() {

	
	$(".mostrar-ocultar").on("click",function(){
		$("#reder").toggleClass('menos');
		$(".deslizante").slideToggle("slow");
	});
	$(".mostrar-ocultar2").on("click",function(){
		$("#reder2").toggleClass('menos');
		$(".deslizante2").slideToggle("slow");
	});
	$(".mostrar-ocultar3").on("click",function(){
		$("#reder3").toggleClass('menos');
		$(".deslizante3").slideToggle("slow");
	});
	$(".mostrar-ocultar4").on("click",function(){
		$("#reder4").toggleClass('menos');
		$(".deslizante4").slideToggle("slow");
	});
	$(".mostrar-ocultar5").on("click",function(){
		$("#reder5").toggleClass('menos');
		$(".deslizante5").slideToggle("slow");
	});
}

/*$( "#reder" ).click(function() {
  $( this ).toggleClass( "menos" );
});
$( "#reder2" ).click(function() {
  $( this ).toggleClass( "menos" );
});





document.querySelector("#reder").addEventListener("click", function() {
	this.classList.toggle("menos");
});*/