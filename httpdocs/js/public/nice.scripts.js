Conekta.setPublishableKey( 'key_Cxkxn8imrq4nosMpnnr3nVA' );

$(function(){
	/**
	 * Objeto con las opciones del spinner
	 * @type {Object}
	 */
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
		$('.animsition').animsition().fadeIn();
		$('.animsition-loading').remove();
	 	var $form;
		$form = $("#form_paycard");
		$form.find('.alert-danger').css('display', 'block');
		$form.find('.alert-danger').text(token.message_to_purchaser	);
		$form.find("button").prop("disabled", true);
	};

	/**
	 * Método para realizar el proceso de pago con tarjeta de crédito en Donaciones
	 */
	$("#form_paycard").submit(function(event) {
		event.preventDefault();
		//var spinner = new Spinner(opts).spin(target);
		$('.animsition').animsition().fadeOut();
		$('.animsition-loading').toggleClass('animsition-loading-enviando');
		var $form;
		$form = $(this);
		/* Previene hacer submit más de una vez */

		$form.find("button").prop("disabled", true);
		Conekta.token.create( $form, conektaSuccessResponseHandler, conektaErrorResponseHandler );
		/* Previene que la información de la forma sea enviada al servidor */
		return false;
	});

	/**
	 * Método para procesar el paso uno del formulario de donación
	 */
	$('#form_nueva_donacion').submit(function(){
		//var spinner = new Spinner(opts).spin(target);
		$('.animsition').animsition().fadeOut();
		$('body').css('background', '#ffffff');
		$(this).ajaxSubmit({
			beforeSubmit: function(){
				$('#foo').css('display','block');
			},
			success: function(data){
				if(data.success != true){
					//spinner.stop();
					//$('body').css('background', '#bbd53c');
					$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
				}else{
					//spinner.stop();
					/*$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();*/
					//$('body').css('background', '#bbd53c');
					$('#foo').css('display','none');
					setTimeout(function(){window.location.href = data.redirect;},2000);
				}
			},
			error: function(data){
				//spinner.stop();
				$('body').css('background', '#bbd53c');
				$('.animsition').animsition().fadeIn();
				$('.animsition-loading').remove();
				$('#foo').css('display','none');
				$('#messages').html(data.errors);
				$('#messages').css('display', 'block');
			}
		});
		return false;
	});

	/**
	 * Método para procesar el paso uno del formulario de recibo donación
	 */
	$('#form_recibo').submit(function(){
		//var spinner = new Spinner(opts).spin(target);
		$('.animsition').animsition().fadeOut();
		$('body').css('background', '#ffffff');
		$(this).ajaxSubmit({
			beforeSubmit: function(){
				$('#foo').css('display','block');
			},
			success: function(data){
				if(data.success != true){
					//spinner.stop();
					//$('body').css('background', '#bbd53c');
					$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
				}else{
					//spinner.stop();
					/*$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();*/
					//$('body').css('background', '#bbd53c');
					$('#foo').css('display','none');
					setTimeout(function(){window.location.href = data.redirect;},2000);
				}
			},
			error: function(data){
				//spinner.stop();
				$('body').css('background', '#bbd53c');
				$('.animsition').animsition().fadeIn();
				$('.animsition-loading').remove();
				$('#foo').css('display','none');
				$('#messages').html(data.errors);
				$('#messages').css('display', 'block');
			}
		});
		return false;
	});


	/**
	 * Método para procesar el paso dos del formulario de donación
	 */
	$('#form_step_two_donacion').submit(function(){
		//var spinner = new Spinner(opts).spin(target);
		$('.animsition').animsition().fadeOut();
		var value = $('input[name=metodo_pago]:checked', '#form_step_two_donacion').val();
		if (value != "tarjeta")
			$('.animsition-loading').toggleClass('animsition-loading-enviando');

		$(this).ajaxSubmit({
			beforeSubmit: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if(data.success != true ){
					//spinner.stop();
					$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
				}else{
					window.location.href = data.redirect;
				}
			},
			error: function(data){
				//spinner.stop();
				$('.animsition').animsition().fadeIn();
				$('.animsition-loading').remove();
				$('#foo').css('display','none');
				$('#messages').html(data.errors);
				$('#messages').css('display', 'block');
			}
		});
		return false;
	});

	/**
	 * Método para procesar el formulario para recordar el password
	 */
	$('#form_forgot_password').submit(function(){
		//var spinner = new Spinner(opts).spin(target);
		$('.animsition').animsition().fadeOut();
		$(this).ajaxSubmit({
			beforeSubmit: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if(data.success != true ){
					//spinner.stop();
					$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
				}else{
					//spinner.stop();
					$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();
					$('#foo').css('display','none');
					$('#messages').addClass('alert-success');
					$('#messages').html(data.message);
					$('#messages').css('display', 'block');
					$('#form_forgot_password')[0].reset();
				}
			},
			error: function(data){
				//spinner.stop();
				$('.animsition').animsition().fadeIn();
				$('.animsition-loading').remove();
				$('#foo').css('display','none');
				$('#messages').html(data.errors);
				$('#messages').css('display', 'block');
			}
		});
		return false;
	});

	/**
	 * Método para procesar el formulario de registro
	 */
	$('#form_new_member').submit(function(){
		//var spinner = new Spinner(opts).spin(target);
		$('.animsition').animsition().fadeOut();
		$(this).ajaxSubmit({
			beforeSubmit: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if(data.success != true ){
					//spinner.stop();
					$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();
					$('.animsition-loading').remove();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
				}else{
					window.location.href = data.redirect;
				}
			},
			error: function(data){
				//spinner.stop();
				$('.animsition').animsition().fadeIn();
				$('.animsition-loading').remove();
				$('.animsition-loading').remove();
				$('#foo').css('display','none');
				$('#messages').html(data.errors);
				$('#messages').css('display', 'block');
			}
		});
		return false;
	});

	/**
	 * Método para procesar el formulario de login
	 */
	$('#form_login').submit(function(){
		//var spinner = new Spinner(opts).spin(target);
		$('.animsition').animsition().fadeOut();
		$(this).ajaxSubmit({
			beforeSubmit: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if(data.success != true ){
					//spinner.stop();
					$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
				}else{
					window.location.href = data.redirect;
				}
			},
			error: function(data){
				//spinner.stop();
				$('.animsition').animsition().fadeIn();
				$('.animsition-loading').remove();
				$('#foo').css('display','none');
				$('#messages').html(data.errors);
				$('#messages').css('display', 'block');
			}
		});
		return false;
	});


	/**
	 * Método para procesar el formulario de contacto
	 */
	$('#formulario_contacto').submit(function(){
		//var spinner = new Spinner(opts).spin(target);
		$('.animsition').animsition().fadeOut();
		$(this).ajaxSubmit({
			beforeSubmit: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if ( data.success != true ){
					$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();
					//spinner.stop();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
					$('html,body').animate({scrollTop: $('#Contenedor').offset().top }, 2000 );
				} else {
					window.location.href = data.redirect;
				}
			},
			error: function(data){
				//spinner.stop();
				$('.animsition').animsition().fadeIn();
				$('.animsition-loading').remove();
				$('#foo').css('display','none');
				$('#messages').html(data.errors);
				$('#messages').css('display', 'block');
				$('html,body').animate({scrollTop: $('#Contenedor').offset().top }, 2000 );
			}
		});
		return false;
	});

	/**
	 * Método para procesar el formulario de becas
	 */
	$('#form_solicitud_beca').submit(function(){
		//var spinner = new Spinner(opts).spin(target);
		$('.animsition').animsition().fadeOut();
		$(this).ajaxSubmit({
			beforeSend: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if ( data.success != true ){
					//spinner.stop();
					$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
					$('html,body').animate({scrollTop: $('#Contenedor').offset().top }, 2000 );
				} else {
					window.location.href = data.redirect;
				}
			},
			error: function(data){
				//spinner.stop();
				$('.animsition').animsition().fadeIn();
				$('.animsition-loading').remove();
				$('#foo').css( 'display', 'none' );
				$('#messages').html( data.errors );
				$('#messages').css( 'display', 'block' );
				$('html,body').animate({scrollTop: $('#Contenedor').offset().top }, 2000 );
			}
		});
		return false;
	});

	/**
	 * Método para procesar el formulario de apoyamos tu causa 
	 */
	$('#form_apoyamos_causa').submit(function(){
		//var spinner = new Spinner(opts).spin(target);
		$('.animsition').animsition().fadeOut();
		$(this).ajaxSubmit({
			beforeSubmit: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if(data.success != true ){
					//spinner.stop();
					$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
					$('html,body').animate({scrollTop: $('#Contenedor').offset().top }, 2000 );
				}else{
					window.location.href = data.redirect;
				}
			},
			error: function(data){
				//spinner.stop();
				$('.animsition').animsition().fadeIn();
				$('.animsition-loading').remove();
				$('#foo').css('display','none');
				$('#messages').html(data.errors);
				$('#messages').css('display', 'block');
				$('html,body').animate({scrollTop: $('#Contenedor').offset().top }, 2000 );
			}
		});
		return false;
	});

	/**
	 * Método para procesar el primer paso del formulario corto de voluntarios
	 */
	$('#form_nuevo_voluntario').submit(function(){
		//var spinner = new Spinner(opts).spin(target);
		$('.animsition').animsition().fadeOut();
		$(this).ajaxSubmit({
			beforeSubmit: function(){
				$('#foo').css('display','block');
			},
			success: function(data){
				if(data.success != true){
					//spinner.stop();
					$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
				}else{
					//spinner.stop();
					/*$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();*/
					$('#foo').css('display','none');
					setTimeout(function(){window.location.href = data.redirect;},2000);
				}
			},
			error: function(data){
				//spinner.stop();
				$('.animsition').animsition().fadeIn();
				$('.animsition-loading').remove();
				$('#foo').css('display','none');
				$('#messages').html(data.errors);
				$('#messages').css('display', 'block');
			}
		});
		return false;
	});

	/**
	 * Método para procesar el segundo paso del formulario corto de voluntarios
	 */
	$('#form_continuacion_voluntario').submit(function(){
		//var spinner = new Spinner(opts).spin(target);
		$('.animsition').animsition().fadeOut();
		$(this).ajaxSubmit({
			beforeSubmit: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if(data.success != true ){
					//spinner.stop();
					$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
				}else{
					window.location.href = data.redirect;
				}
			},
			error: function(data){
				//spinner.stop();
				$('.animsition').animsition().fadeIn();
				$('.animsition-loading').remove();
				$('#foo').css('display','none');
				$('#messages').html(data.errors);
				$('#messages').css('display', 'block');
			}
		});
		return false;
	});

	/**
	 * Método para procesar el formulario largo de Voluntarios
	 */
	$('#form_voluntario_full').submit(function(){
		//var spinner = new Spinner(opts).spin(target);
		$('.animsition').animsition().fadeOut();
		$(this).ajaxSubmit({
			beforeSend: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if ( data.success != true ){
					//spinner.stop();
					$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
					$('html,body').animate({scrollTop: $('#Contenedor').offset().top }, 2000 );
				} else {
					//spinner.stop();
					$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();
					$('#foo').css('display','none');
					$('#messages').addClass('alert-success');
					$('#messages').html(data.message);
					$('#messages').css('display', 'block');
					$('#form_voluntario_full')[0].reset();
					$('html,body').animate({scrollTop: $('#Contenedor').offset().top }, 2000 );
				}
			},
			error: function(data){
				//spinner.stop();
				$('.animsition').animsition().fadeIn();
				$('.animsition-loading').remove();
				$('#foo').css( 'display', 'none' );
				$('#messages').html( data.errors );
				$('#messages').css( 'display', 'block' );
				$('html,body').animate({scrollTop: $('#Contenedor').offset().top }, 2000 );
			}
		});
		return false;
	});

	$('#form_paypal_donacion').submit(function(){
		//var spinner = new Spinner(opts).spin(target);
		$('.animsition').animsition().fadeOut();
		$(this).ajaxSubmit({
			beforeSubmit: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if(data.success != true ){
					//spinner.stop();
					$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
				}else{
					window.location.href = data.redirect;
				}
			},
			error: function(data){
				//spinner.stop();
				$('.animsition').animsition().fadeIn();
				$('.animsition-loading').remove();
				$('#foo').css('display','none');
				$('#messages').html(data.errors);
				$('#messages').css('display', 'block');
			}
		});
		return false;
	});

	/**
	 * Método para procesar un "ME GUSTA" de algún contenido
	 */
	$('.like-process').click(function(){
		//var spinner = new Spinner(opts).spin(target);
		$('.animsition').animsition().fadeOut();
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
				//spinner.stop();
				$('.animsition').animsition().fadeIn();
				$('.animsition-loading').remove();
				$('#foo').css('display','none');
				console.log( data.errors );
			}
		});
		return false;
	});

	/**
	 * Método para mostrar los combos de ciudades o paises dependiendo el lugar de estudio
	 */
	$('#beca_lugar_estudiar').on('change', function(e){
		var place_id = e.target.value;
		switch( place_id ){
			case '1':
				$.get( 'ajax-beca-dropdown?place_id=' + place_id, function(data){
					$('#beca_lugar').empty();
					$('#beca_lugar').css( 'display', 'block' );
					$('#beca_lugar').append(data);
				});
				break;
			case '2':
				$.get( 'ajax-beca-dropdown?place_id=' + place_id, function(data){
					$('#beca_lugar').empty();
					$('#beca_lugar').css( 'display', 'block' );
					$('#beca_lugar').append(data);
				});
				break;
		}
		return false;
	});

	/**
	 * Método para obtener las opciones de estados en un combobox dependiendo el id del país
	 */
	$('#beca_pais').on('change', function(e){
		var country_id = e.target.value;
		$.get('ajax-state?country_id=' + country_id, function(data){
			$('#beca_estado').empty();
			$.each(data, function(index, statesObj){
				$('#beca_estado').append( '<option value="' + statesObj.id_estados + '">' + statesObj.name + '</option>');
			});
		});
		return false;
	});

	/**
	 * Método para obtener las ciudades en un combobox dependiendo el id del estado
	 * @param  {[type]} e){		var state_id      ID del estado
	 * @return {string}           HTML de las opciones de las ciudades
	 */
	$('#beca_estado').on('change', function(e){
		var state_id = e.target.value;
		$.get('ajax-city?state_id=' + state_id, function(data){
			$('#beca_ciudad').empty();
			$.each(data, function(index, statesObj){
				$('#beca_ciudad').append( '<option value="' + statesObj.id_ciudades + '">' + statesObj.name + '</option>');
			});
		});
		return false;
	});

	/**
	 * Método para cargar mas noticias
	 */
	 var offset = 6;
	$('#load-news').click(function(){
		//var spinner;

		$.ajax({
			url: 'carga-noticias/6/'+offset,
			dataType: 'json',
			beforeSend: function(){
				// spinner = new Spinner(opts).spin(target);
				$('.animsition').animsition().fadeOut();
				$('#foo').css( 'display', 'block' );
				offset = offset + 6;
			},
			success: function(data){
				if ( data.success ){
					//spinner.stop();
					$('.animsition').animsition().fadeIn();
    				$('.animsition-loading').remove();
					$('#foo').css('display','none');
					$( "#fnews" ).before( data.noticias );
				}
			},
			error: function(data){
				//spinner.stop();
				$('.animsition').animsition().fadeIn();
				$('.animsition-loading').remove();
				$('#foo').css('display','none');
				console.log( data.errors );
			}
		});
		return false;
	});

	var offset_resultado = 3;
	$('#load-news-search').click(function(){
		//var spinner;

		$.ajax({
			url: 'carga-noticias-resultado/3/'+offset_resultado+'/'+s,
			dataType: 'json',
			beforeSend: function(){
				 //spinner = new Spinner(opts).spin(target);
				 $('.animsition').animsition().fadeOut();
				$('#foo').css( 'display', 'block' );
				offset_resultado = offset_resultado + 3;
			},
			success: function(data){
				if ( data.success ){
					//spinner.stop();
					$('.animsition').animsition().fadeIn();
					$('.animsition-loading').remove();
					$('#foo').css('display','none');
					$( "#fnews" ).before( data.noticias );
				}
			},
			error: function(data){
				//spinner.stop();
				$('.animsition').animsition().fadeIn();
				$('.animsition-loading').remove();
				$('#foo').css('display','none');
				console.log( data.errors );
			}
		});
		return false;
	});

	var ids = [];
	$(".txt_int").hover(function(){
		id_causa = $(this).attr('id');
		$("#barra > span").each(function() {
			if(ids.indexOf('b'+id_causa) == -1){
			if($(this).attr('id') == 'b'+id_causa){
				 ids.push('b'+id_causa);
				$(this)
					.data("origWidth", $(this).width())
					.width(0)
					.animate({
						width: $(this).data("origWidth")
					}, 1200);
			}
		}
		});
	});

	$(".usuario-light").hover(function(){
		id_causa = $(this).attr('id');
		$("#barra > span").each(function() {
			if(ids.indexOf('b'+id_causa) == -1){
			if($(this).attr('id') == 'b'+id_causa){
				 ids.push('b'+id_causa);
				$(this)
					.data("origWidth", $(this).width())
					.width(0)
					.animate({
						width: $(this).data("origWidth")
					}, 1200);
			}
		}
		});
	});

	
	/**
	 * Método para cambiar el lenguaje de las alertas de html5
	 */
	var isFirefox = typeof InstallTrigger !== 'undefined';
	if(!isFirefox){
		var intputElements = document.getElementsByTagName("INPUT");
	    for (var i = 0; i < intputElements.length; i++) {
	        intputElements[i].oninvalid = function (e) {
	            e.target.setCustomValidity("");
	            console.log(e.target);
	            if (!e.target.validity.valid) {
	            	if(e.target.name == 'email' || e.target.name == 'correo')
	            		e.target.setCustomValidity("Email incorrecto");	
	            	else
	            		e.target.setCustomValidity("Completa este campo");
	                
	            }
	        };
	    }
	}

	$('#timeline_right').click(function(){
		var div = $('div.flex-control-nav');
		var count_lis = $('div.flex-control-nav li').length;
		realWidth = (count_lis*60.7826);
		var resolution = parseInt($('body').css('width'));
		var minLeft = (resolution-realWidth);
		if(parseInt(div.css('left')) >= minLeft && esEntero(parseFloat(div.css('left'))) === true){
			div.animate({
        		'left': '-=200px',
    		}, 700);
    	}	
	});

	$('#timeline_left').click(function(){
		var div = $('div.flex-control-nav');
		if(parseInt(div.css('left')) < 0 && esEntero(parseFloat(div.css('left'))) === true){
			div.animate({
        		'left': '+=200px',
    		}, 700);	
		}
	});

	$("input[name=metodo_pago]:radio").change(function () {
		if ($(this).val() == 'paypal')
			$('.check-verde-display-none').show("slow");
		else
			$('.check-verde-display-none').hide("slow");
	});

	$("#check-recibo").change(function () {
		if (this.checked)
			$('#form_recibo_2').show("slow");
		else
			$('#form_recibo_2').hide("slow");
	});

});

function fbs_click(width, height, obj) {
    var leftPosition, topPosition;
    leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
    topPosition = (window.screen.height / 2) - ((height / 2) + 50);
    var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
    u=obj.href;
    window.open(u,'sharer', windowFeatures);
    return false;
}

function fbs_click1(width, height, obj, url, id_impulsor) {
    var leftPosition, topPosition;
    leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
    topPosition = (window.screen.height / 2) - ((height / 2) + 50);
    var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
   
    u  = 'https://www.facebook.com/dialog/share?app_id=776167932490026';
    u += '&href='+url+'/ficha-causas/'+$('#causa_impulsar').val()+'/'+convertToSlug($("#causa_impulsar option:selected").text())+'/'+id_impulsor;
    u += '&display=popup&redirect_uri=';
    u += url+'/gracias-3/'+$('#causa_impulsar').val()+'/'+id_impulsor ;

    window.open(u,'sharer', windowFeatures);
    return false;
}

function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
}

function esEntero(numero){
    if (numero % 1 == 0) 
        return true;
    return false;
  
}

function historyBack(url){
	if(history.length <= 1){
		location.href = url; 
	} else {
		history.back();
	}

}