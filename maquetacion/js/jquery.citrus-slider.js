(function($){
	"use strict";

	$.fn.citrusSlides = function(customSettings){
		var settings = $.extend({
			'duration'	: 1600,
			'heigth'	: '768px',
			'width'		: '1024px'
		}, customSettings);

		return this.each(function(){
			var $this = $(this),
				$thisSlide = $this.children('div.slide').first();
		});
	}
}(jQuery));