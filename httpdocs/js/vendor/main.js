function ModalAjax($click,callback)
{
	var me = this;
	me.callback = callback;

	$($click).click(function(event){
		event.preventDefault();
		var $me = $(this);

	  	$('#modal .modal-content').load($me.attr("href"),function(result){
		    
		    $('#modal').modal({show:true}).css("z-index",1041);
		    me.callback(true,$('#modal'));
		});
	  });
}

$( document ).ready(function() {


	var id_agency = $('#id_agency[name=id_agency]').val();
	$.cookie('id_agency', id_agency, { path: '/' });
	 

	$('#id_agency[name=id_agency]').on('change', function(){
	  var selected = $(this).find("option:selected").val();
	  selected = !selected ? "" : selected;

	  $.cookie('id_agency', selected, { path: '/' });
	  document.location.reload();
	});
	
	$("input").bind('keyup change',function() {
		var $t = $(this);
	    var $par = $t.parent();
	    var min = $t.attr("data-valid-min");
	    var match = $t.attr("data-valid-match");
	  	var pattern = $t.attr("pattern");
	           
	    if (typeof match!="undefined"){
	        if ($t.val()!=$('#'+match).val()) {
	            $par.removeClass('has-success').addClass('has-error');
	        }
	        else {
	            $par.removeClass('has-error').addClass('has-success');
	        }
	    }
	  	else if (!this.checkValidity()) {
	  		$par.removeClass('has-success').addClass('has-error');
	    }
	    else {
	        $par.removeClass('has-error').addClass('has-success');
	    }
	  	
	  	if ($par.hasClass("has-success")) {
	    	$par.find('.form-control-feedback').removeClass('fade');
	  	}
			else {
	    	$par.find('.form-control-feedback').addClass('fade');
	  	}
	  
	});


	if($(".advance-search").length > 0)
	{
		$(".btn-advance-search").click(function(){

			var me = $(this);
			var search = me.closest(".index-toolbar").find(".advance-search");

			if(search.hasClass("hidden"))
			{
				me.closest("li").addClass("active")
				search.removeClass("hidden");
			}
			else
			{
				me.closest("li").removeClass("active")
				search.addClass("hidden");
			}
				

			return false;
		});
	}

});