/***************** Slide-In Nav ******************/

$('.nav_slide_button').click(function(e) {
	e.preventDefault();
	if($(this).hasClass("active"))
		$(this).removeClass("active");
	else
		$(this).addClass("active");

	$('.pull').slideToggle();
	
	return false;
});
	

/***************** Nav Transformicon ******************/
/*
document.querySelector("#nav-toggle").addEventListener("click", function() {
	this.classList.toggle("active");
});
*/


