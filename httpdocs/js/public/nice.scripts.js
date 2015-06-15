Conekta.setPublishableKey( 'key_Cxkxn8imrq4nosMpnnr3nVA' );

$(function(){
	var opts = {
		lines: 17,
		length: 15,
		width: 12,
		radius: 30,
		scale: 0.50,
		corners: 1,
		rotate: 0,
		direction: 1,
		color: '#beda3e',
		speed: 1.4,
		trail: 100,
		shadow: false,
		hwaccel: false,
		className: 'spinner',
		zIndex: 2e9,
		top: '50%',
		left: '50%'
	};
	var target = document.getElementById('foo');

	var conektaSuccessResponseHandler;
	conektaSuccessResponseHandler = function(token) {
		var $form;
		$form = $("#form_paycard");
		/* Inserta el token_id en la forma para que se envíe al servidor */
		$form.append($("<input type=\"hidden\" name=\"conektaTokenId\" />").val(token.id));
		/* and submit */
		$form.get(0).submit();
	};

	conektaErrorResponseHandler = function(token) {
	 	var $form;
		$form = $("#form_paycard");
		$form.find('.alert-danger').css('display', 'block');
		$form.find('.alert-danger').text(token.message);
		$form.find("button").prop("disabled", true);
	};

	$("#form_paycard").submit(function(event) {
		event.preventDefault();
		var spinner = new Spinner(opts).spin(target);
		var $form;
		$form = $(this);
		/* Previene hacer submit más de una vez */

		$form.find("button").prop("disabled", true);
		Conekta.token.create( $form, conektaSuccessResponseHandler, conektaErrorResponseHandler );
		/* Previene que la información de la forma sea enviada al servidor */
		return false;
	});

	$('#form_nueva_donacion').submit(function(){
		var spinner = new Spinner(opts).spin(target);
		$(this).ajaxSubmit({
			beforeSubmit: function(){
				$('#foo').css('display','block');
			},
			success: function(data){
				if(data.success != true){
					spinner.stop();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
				}else{
					spinner.stop();
					$('#foo').css('display','none');
					window.location.href = 'donar/paso-2';
				}
			},
			error: function(data){
				spinner.stop();
				$('#foo').css('display','none');
				$('#messages').html(data.errors);
				$('#messages').css('display', 'block');
			}
		});
		return false;
	});

	$('#form_step_two_donacion').submit(function(){
		var spinner = new Spinner(opts).spin(target);
		$(this).ajaxSubmit({
			beforeSubmit: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if(data.success != true ){
					spinner.stop();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
				}else{
					window.location.href = data.redirect;
				}
			},
			error: function(data){
				spinner.stop();
				$('#foo').css('display','none');
				$('#messages').html(data.errors);
				$('#messages').css('display', 'block');
			}
		});
		return false;
	});

	$('#form_forgot_password').submit(function(){
		var spinner = new Spinner(opts).spin(target);
		$(this).ajaxSubmit({
			beforeSubmit: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if(data.success != true ){
					spinner.stop();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
				}else{
					spinner.stop();
					$('#foo').css('display','none');
					$('#messages').addClass('alert-success');
					$('#messages').html(data.message);
					$('#messages').css('display', 'block');
					$('#username').val('');
				}
			},
			error: function(data){
				spinner.stop();
				$('#foo').css('display','none');
				$('#messages').html(data.errors);
				$('#messages').css('display', 'block');
			}
		});
		return false;
	});

	$('#form_new_member').submit(function(){
		var spinner = new Spinner(opts).spin(target);
		$(this).ajaxSubmit({
			beforeSubmit: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if(data.success != true ){
					spinner.stop();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
				}else{
					window.location.href = data.redirect;
				}
			},
			error: function(data){
				spinner.stop();
				$('#foo').css('display','none');
				$('#messages').html(data.errors);
				$('#messages').css('display', 'block');
			}
		});
		return false;
	});

	$('#formulario_contacto').submit(function(){
		var spinner = new Spinner(opts).spin(target);
		$(this).ajaxSubmit({
			beforeSubmit: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if ( data.success != true ){
					spinner.stop();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
				} else {
					spinner.stop();
					$('#foo').css('display','none');
					$('#messages').addClass('alert-success');
					$('#messages').html(data.message);
					$('#messages').css('display', 'block');
					$('#inpt_nombre').val('');
					$('#inpt_telefono').val('');
					$('#inpt_email').val('');
					$('#inpt_mensaje').val('');
				}
			},
			error: function(data){
				spinner.stop();
				$('#foo').css('display','none');
				$('#messages').html(data.errors);
				$('#messages').css('display', 'block');
			}
		});
		return false;
	});

	$('.like-process').click(function(){
		var spinner = new Spinner(opts).spin(target);
		var content_id 		= $(this).attr( 'data-contenido' );
		var content_type 	= $(this).attr( 'data-tipo' );
		$.ajax({
			url: 'like',
			method: 'POST',
			dataType: 'json',
			data: { content_id: content_id, content_type: content_type },
			beforeSend: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if ( data.success )
					window.location.reload();
			},
			error: function(data){
				spinner.stop();
				$('#foo').css('display','none');
				console.log( data.errors );
			}
		});
		return false;
	});
});