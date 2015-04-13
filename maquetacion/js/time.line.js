var indicator = 0;

$(function(){
	$('.prev').click(function(e){
		e.preventDefault();
		moveSlide('left');
	});

	$('.next').click(function(e){
		e.preventDefault();
		moveSlide('right');
	});

	$('.moment-description a').click(function(e){
		e.preventDefault();
		$('#main_time').slideUp();
	});
	defineSizes();
});

function defineSizes(){
	$('#main_time .slide').each(function(i,el){
		$(el).css({
			'background-image': "url(" + $(el).data("background") + ")",
			'height': ( $('#main_time').width() * 0.45 ) + 'px',
			'width': ( $('#main_time').width() ) + 'px'
		});
	});
}

function moveSlide(direction){
	var limit = $('#main_time .slide').length;

	indicator = ( direction == 'right' ) ? indicator + 1 : indicator - 1;
	indicator = ( indicator >= limit ) ? 0 : indicator;
	indicator = ( indicator < 0 ) ? limit - 1 : indicator;

	$('#main_time .slide_container').animate({
		'margin-left': - ( indicator * $( '#main_time' ).width() ) + 'px'
	});
}