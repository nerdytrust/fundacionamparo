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


