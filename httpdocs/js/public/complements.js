$(document).ready(function(){
	$(".txt_int").hover(function(){
		$("#barra progress").toggleClass("barramover");
	});
	
	$('.animsition').animsition();
});

$(window).bind("pageshow", function(event) {
    if (event.originalEvent.persisted) {
    	location.reload();
    }
});