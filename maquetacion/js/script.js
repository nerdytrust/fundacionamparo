/***************** Slide-In Nav ******************/

$('.nav_slide_button').click(function() {
	
	if($(this).hasClass("active"))
		$(this).removeClass("active");
	else
		$(this).addClass("active");

	$('.pull').slideToggle();
});
	

/***************** Nav Transformicon ******************/
/*
document.querySelector("#nav-toggle").addEventListener("click", function() {
	this.classList.toggle("active");
});
*/


