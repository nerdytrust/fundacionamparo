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
	 	var $form;
		$form = $("#form_paycard");
		$form.find('.alert-danger').css('display', 'block');
		$form.find('.alert-danger').text(token.message);
		$form.find("button").prop("disabled", true);
	};

	/**
	 * Método para realizar el proceso de pago con tarjeta de crédito en Donaciones
	 */
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

	/**
	 * Método para procesar el paso uno del formulario de donación
	 */
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

	/**
	 * Método para procesar el paso dos del formulario de donación
	 */
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

	/**
	 * Método para procesar el formulario para recordar el password
	 */
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
					$('#form_forgot_password')[0].reset();
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

	/**
	 * Método para procesar el formulario de registro
	 */
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

	/**
	 * Método para procesar el formulario de login
	 */
	$('#form_login').submit(function(){
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


	/**
	 * Método para procesar el formulario de contacto
	 */
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
					$('html,body').animate({scrollTop: $('#Contenedor').offset().top }, 2000 );
				} else {
					window.location.href = data.redirect;
				}
			},
			error: function(data){
				spinner.stop();
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
		var spinner = new Spinner(opts).spin(target);
		$(this).ajaxSubmit({
			beforeSend: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if ( data.success != true ){
					spinner.stop();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
					$('html,body').animate({scrollTop: $('#Contenedor').offset().top }, 2000 );
				} else {
					window.location.href = data.redirect;
				}
			},
			error: function(data){
				spinner.stop();
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
					$('html,body').animate({scrollTop: $('#Contenedor').offset().top }, 2000 );
				}else{
					window.location.href = data.redirect;
				}
			},
			error: function(data){
				spinner.stop();
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

	/**
	 * Método para procesar el segundo paso del formulario corto de voluntarios
	 */
	$('#form_continuacion_voluntario').submit(function(){
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

	/**
	 * Método para procesar el formulario largo de Voluntarios
	 */
	$('#form_voluntario_full').submit(function(){
		var spinner = new Spinner(opts).spin(target);
		$(this).ajaxSubmit({
			beforeSend: function(){
				$('#foo').css( 'display', 'block' );
			},
			success: function(data){
				if ( data.success != true ){
					spinner.stop();
					$('#foo').css('display','none');
					$('#messages').html(data.errors);
					$('#messages').css('display', 'block');
					$('html,body').animate({scrollTop: $('#Contenedor').offset().top }, 2000 );
				} else {
					spinner.stop();
					$('#foo').css('display','none');
					$('#messages').addClass('alert-success');
					$('#messages').html(data.message);
					$('#messages').css('display', 'block');
					$('#form_voluntario_full')[0].reset();
					$('html,body').animate({scrollTop: $('#Contenedor').offset().top }, 2000 );
				}
			},
			error: function(data){
				spinner.stop();
				$('#foo').css( 'display', 'none' );
				$('#messages').html( data.errors );
				$('#messages').css( 'display', 'block' );
				$('html,body').animate({scrollTop: $('#Contenedor').offset().top }, 2000 );
			}
		});
		return false;
	});

	$('#form_paypal_donacion').submit(function(){
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

	/**
	 * Método para procesar un "ME GUSTA" de algún contenido
	 */
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
		var spinner;

		$.ajax({
			url: 'carga-noticias/6/'+offset,
			dataType: 'json',
			beforeSend: function(){
				 spinner = new Spinner(opts).spin(target);
				$('#foo').css( 'display', 'block' );
				offset = offset + 6;
			},
			success: function(data){
				if ( data.success ){
					spinner.stop();
					$('#foo').css('display','none');
					$( "#fnews" ).before( data.noticias );
				}
			},
			error: function(data){
				spinner.stop();
				$('#foo').css('display','none');
				console.log( data.errors );
			}
		});
		return false;
	});

	var offset_resultado = 3;
	$('#load-news-search').click(function(){
		var spinner;

		$.ajax({
			url: 'carga-noticias-resultado/3/'+offset_resultado+'/'+s,
			dataType: 'json',
			beforeSend: function(){
				 spinner = new Spinner(opts).spin(target);
				$('#foo').css( 'display', 'block' );
				offset_resultado = offset_resultado + 3;
			},
			success: function(data){
				if ( data.success ){
					spinner.stop();
					$('#foo').css('display','none');
					$( "#fnews" ).before( data.noticias );
				}
			},
			error: function(data){
				spinner.stop();
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
	 * Método para regresar el video
	 */
var video = videojs($('.vi').find('.video-js')[0]).ready(function(){
	  var player = this;
	  player.on('ended', function() {
	  	video.load();
	  	$(".vjs-loading-spinner").hide();
	  });
	   player.on('error', function() {
	  	video.load();
	  	$(".vjs-loading-spinner").hide();
	  });
	});

var video = videojs($('.vi2').find('.video-js')[0]).ready(function(){
	  var player = this;
	  player.on('ended', function() {
	  	video.load();
	  	$(".vjs-loading-spinner").hide();
	  });
	   player.on('error', function() {
	  	video.load();
	  	$(".vjs-loading-spinner").hide();
	  });
	});

var video = videojs($('.vi3').find('.video-js')[0]).ready(function(){
	  var player = this;
	  player.on('ended', function() {
	  	video.load();
	  	$(".vjs-loading-spinner").hide();
	  });
	   player.on('error', function() {
	  	video.load();
	  	$(".vjs-loading-spinner").hide();
	  });
	});

	/**
	 * Método para cambiar el lenguaje de las alertas de html5
	 */
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

});

function fbs_click(width, height) {
    var leftPosition, topPosition;
    leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
    topPosition = (window.screen.height / 2) - ((height / 2) + 50);
    var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
    u=location.href;
    t=document.title;
    window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer', windowFeatures);
    return false;
}