/***************** Slide-In Nav ******************/

$(window).load(function() {

	$('.nav_slide_button').click(function() {
		$('.pull').slideToggle();
	});
	
});

/***************** Nav Transformicon ******************/

document.querySelector("#nav-toggle").addEventListener("click", function() {
	this.classList.toggle("active");
});


$(".switch").bootstrapSwitch();

// money format
webshims.setOptions('forms-ext', {
    replaceUI: 'auto',
    types: 'number'
});
webshims.polyfill('forms forms-ext');


