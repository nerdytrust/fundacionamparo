/***************** Slide-In Nav ******************/
$(document).on("ready",efectos);

function efectos() {
	$('.mostrar-ocultar').click(function(){
		var id_tab = $(this).attr('id');
		$('div#'+ id_tab +' .reder').toggleClass('menos');
		$('#deslizante'+id_tab).slideToggle("slow");

		return false;
	});	
}