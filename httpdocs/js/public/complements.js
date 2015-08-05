$(document).ready(function(){	
	$('.animsition').animsition();
});

$(window).bind("pageshow", function(event) {
    if (event.originalEvent.persisted) {
    	location.reload();
    }
});