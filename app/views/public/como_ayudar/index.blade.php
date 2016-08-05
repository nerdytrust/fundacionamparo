<?php	
	$share_fb  = [ 
		'title'       => 'FUNDACIÓN AMPARO - CÓMO AYUDAR - Es muy fácil tomar acción, sólo necesitas dar un poco más',
		'description' => "¡Es muy fácil tomar acción!
						  Sólo tienes que seguir estos sencillos pasos para apoyar nuestras causas:
						  * Busca la causa en la que deseas contribuir
						  * Selecciona la forma en que puedes ayudar
						  * ¡Listo! Ya estás #Tomando Acción ",
		'image'       => asset( 'images/fundacion_como_ayudar.png')
	];
?>
@extends( 'public.layout' )
	@section('class')como-ayudar
	@stop
	@section('content')
		<section id="Contenedor">
			<section class="mask_head back_img10" >
				<div class="txt_mask">
					<img src="images/logo_mask_header.jpg" alt="">
					<h1>CÓMO AYUDAR</h1>
					<h3>Es muy fácil tomar acción, sólo necesitas dar un poco más</h3>
					<nav class="social_mask">
						<ul>
							{{ Helper::facebookShare( '', Request::url(), '' ) }}
							{{ Helper::twitterShare( 'Como Ayudar', Request::url(), '' ) }}
							{{-- <a href=""><li class="fa fa-heart"></li></a>
							<p>96 likes</p> --}}
						</ul>
					</nav>
				</div>
			</section>
			<section id="contenedor_int">
				<div class="txt_fundacion2">
					<!--<div id="video2">
						<img src="images/fundacion_como_ayudar_video.jpg" alt="">
					</div>
					-->
					<video id="my-video" class="video-js" controls preload="auto" width="800" height="450"
  					 data-setup="{}">
   						 <source src="{{ asset ( 'path_video/prueba_ch.mp4' ) }}" type='video/mp4' codecs=avc1.42E01E,mp4a.40.2>
  					</video>

  					<video id="my-video" class="video-js" controls preload="auto" width="800" height="450"
  					 data-setup="{}">
   						 <source src="{{ asset ( 'path_video/out_1.mp4' ) }}" type='video/mp4' codecs=avc1.42E01E,mp4a.40.2>
  					</video>
  					<br>
  					<br>
  					<br>
  					 <div class="vi2">
	        				<a href="{{ asset ( 'path_video/prueba_ch.mp4' ) }}">
	        					<div class="vjs-poster" style="background-image: url();"></div>
	        					<div class="button-play" role="button"><span aria-hidden="true"></span></div>
	        				</a>
	    				</div>
					@if ( isset( $videos ) )
						@foreach ( $videos as $video )
						
						<!--<div class="vi2">
	        				<a href="{{ asset ( 'path_video/' . $video->video ) }}">
	        					<div class="vjs-poster" style="background-image: url({{ asset( 'path_image/' . $video->cover ) }});"></div>
	        					<div class="button-play" role="button"><span aria-hidden="true"></span></div>
	        				</a>
	    				</div>-->
	    				@endforeach
	    				<script type="text/javascript">
							document.addEventListener("DOMContentLoaded", function(event) { 
								baguetteBox.run('.vi2');
							});
						</script>
						<!--<script type="text/javascript">
							document.addEventListener("DOMContentLoaded", function(event) { 
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
							});
						</script>-->
					@endif
					<div id="titulo_fca" class="ayudar">
						<div class="titleM">FORMAS DE AYUDAR</div>
						<div class="subtitleM">Tus donaciones construyen sueños y cambian vidas. <span class="colorin">#TomandoAcciónFA</span></div>
						<!--<h1>FORMAS DE AYUDAR</h1>
						<h2>Tus donaciones construyen sueños y cambian vidas. <span class="colorin">#TomandoAcciónFA</span></h2>-->
					</div>
					<div id="cja_donativos">
						<div id="donativo_btn">
							<div class="circulo_btn" id="fca-d">
								<h1>HAZ TU <br/>DONATIVO</h1>
								<h4>#TomandoAcciónFA</h4>
							</div>
							<div class="txt_circ">
								<p>Cualquier donación es de gran ayuda a la causa, no importa la cantidad, si es única o mensual, todo apoyo nos da fuerza para seguir adelante.</p>
								<h2 onclick="location.href='{{ URL::to( 'causas-vivas' ) }}';">VER CAUSAS</h2>
							</div>
						</div>
						<div id="donativo_btn">
							<div class="circulo_btn2" id="fca-i">
								<h1>SER <br/>IMPULSOR</h1>
								<h4>#TomandoAcciónFA</h4>
							</div>
							<div class="txt_circ">
								<p>A través de las redes sociales podemos dar a conocer y propagar el mensaje para crear conciencia y hacer un llamado a la gente de unión a las causas.</p>
								<h2 onclick="location.href='{{ URL::to( 'causas-vivas' ) }}';">VER CAUSAS</h2>
							</div>
						</div>
						<div id="donativo_btn">
							<div class="circulo_btn3" id="fca-v">
								<h1>SER <br/>VOLUNTARIO</h1>
								<h4>#TomandoAcciónFA</h4>
							</div>
							<div class="txt_circ">
								<p>La fuerza de trabajo en mente, cuerpo y alma es esencial para seguir cumpliendo nuestra labor, te invitamos como voluntario a nuestras diferentes causas.</p>
								<h2 onclick="location.href='{{ URL::to( '/causas-vivas' ) }}';">VER CAUSAS</h2>
							</div>
						</div>
					</div>
					<div class="adorno_fa">
 						<img src="{{ asset( 'images/adorno_fa.png' ) }}" alt="">
 					</div>
					<div id="titulo_fca">
						<h1>¡ES MUY FÁCIL TOMAR ACCIÓN!</h1>
						<div class="subtitleM">Solo tienes que seguir estos sencillos pasos para apoyar nuestras causas</div>
					</div>
					<div id="cja_pasos">
						<div class="pasos_txt">
							<img src="{{ asset( 'images/btn_buscar.png' ) }}" alt="">
							<p>Busca la causa en la que deseas contribuir</p>
						</div >
						<div class="division">
							<img src="{{ asset( 'images/btn_flecha.png' ) }}" alt="" class="flecha1">
							<img src="{{ asset( 'images/btn_flecha2.png' ) }}" alt="" class="flecha2">
						</div>
						<div class="pasos_txt">
							<img src="{{ asset( 'images/btn_donar.png' ) }}" alt="">
							<p>Selecciona la forma en que puedes ayudar</p>
						</div>
						<div class="division">
							<img src="{{ asset( 'images/btn_flecha.png' ) }}" alt="" class="flecha1">
							<img src="{{ asset( 'images/btn_flecha2.png' ) }}" alt="" class="flecha2">
						</div>
						<div class="pasos_txt">
							<img src="{{ asset( 'images/btn_listo.png' ) }}" alt="">
							<p>¡Listo!. Ya estás <span class="colorin">#TomandoAcción</span></p>
						</div>
					</div>
				</div>
				<div class="txt_fundacion" >
					<div id="titulo_fca">
						<a class="btn btn-default causas animsition-link" href="{{ URL::to( 'faqs' ) }}">Ver Faq's</a>
					</div>
				</div>
				<div class="adorno_fa">
 					<img src="{{ asset( 'images/adorno_fa.png' ) }}" alt="">
 				</div>
 				<div class="txt_footer">
 					<h1>¡Tú puedes ayudar!</h1>
 					<h2>Tus donaciones hacen posible que esto continúe, pasa la voz <span>#TomandoAcciónFA</span></h2>
 					<div id="social_footer">
 						<ul>
 							{{ Helper::facebookShare( '', URL::to('/'), '' ) }}
		 				    {{ Helper::twitterShare( '¡TÚ PUEDES AYUDAR! Tus donaciones hacen posible que esto continúe, pasa la voz', URL::to('/')	, 'TomandoAcciónFA' ) }}
 						</ul>
 					</div>
 				</div>
			</section>
		</section>
	@stop
@stop