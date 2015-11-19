<?php $video_causas = 1; ?>
@extends('public.layout')
	@section('class')causas-vivas
	@stop
	@section("content")
		<section id="Contenedor">
			@if ( $videos )
				<span class="como">
					<h1>¿Cómo Ayudar?</h1>
					<h2>Tus donaciones construyen sueños y cambian vidas <b>#TomandoAcciónFA</b></h2>
					<button id="btn_dona">DONAR AHORA</button>
				</span>
				@foreach ( $videos as $video )
					<div class="vi3">
						<video  autoplay controls preload="none" poster="{{ asset( 'path_image/' . $video->cover . '/' . '1596x608' ) }}" class="video-js vjs-default-skin" data-setup="{}" style="width:100%">
							<source src="{{ asset ( 'path_video/' . $video->video ) }}" type='video/mp4'>
							<p>El video no es visible!, tu navegador no soporta video en HTML5</p>
						</video>
					</div>
				@endforeach
				<script type="text/javascript">
							document.addEventListener("DOMContentLoaded", function(event) { 
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
							});
						</script>
			@endif

			<div id="pleca_causas" class="">
				<h1>CAUSAS FUNDACIÓN AMPARO</h1>
			</div>
			<div class="re">
	 			
	 			@if ( isset( $causas ) )
	 				@foreach ( $causas as $causa )

	 					<article class="caja_2 {{{ isset($causa['class']) ?  'caja'.$causa['class'] : 'caja'.'33' }}}">
				 			<img src="{{ asset( 'path_image/' . $causa->imagen . '/' . '559x548' ) }}" alt="{{ $causa->titulo }}">
				 			<section id="social_top">
								<ul>
									{{ Helper::facebookShare( '', URL::to( 'ficha-causa' ) . '/' . $causa->id_causas, '' ) }}
									{{ Helper::twitterShare( $causa->titulo, URL::to( 'ficha-causa' ) . '/' . $causa->id_causas, '' ) }}
									{{ Helper::like( $causa->id_causas, 'causas' ) }}
									<p>{{ $causa->me_gusta_interno }} likes</p>
								</ul>
								<div id="donativo" onclick="location.href='{{ URL::to( 'donar-causa/' . $causa->id_causas ) }}';" >HAZ TU DONACIÓN</div>
							</section>
				 			<section class="txt_int" id="{{$causa->id_causas}}">
				 				<h1>{{ strtoupper( $causa->id_categorias_record->nombre ) }}</h1>
				 				<h2>{{ $causa->titulo }}</h2>
				 				<p>{{ Str::limit( $causa->descripcion, 110 ) }}</p>
								<a href="{{ URL::to( 'ficha-causas/' . $causa->id_causas ) }}"><h3>MÁS INFORMACIÓN<span class="colorin">+</span></h3></a>
								<div id="meta">
									<div id="barra">
											<span id="b{{$causa->id_causas}}" style="width: {{ $causa->porcentaje }}%"></span>
									</div>
								<div id="cantidad">
									<h1>META</h1>
									<h2>${{ number_format( $causa->meta ) }}<span>MXN</span></h2>
								</div>
									<p>${{ number_format( floatval( $causa->recaudado ) ) }} MXN <span>RECAUDADOS</span></p>
									<p>{{ Helper::getRemaining( $causa->fecha ) }} <span>DÍAS RESTANTES</span></p>
								</div>
				 			</section>
				 			<span class="esquina"></span>
				 		</article>
					@endforeach
	 			@endif

			</div><!--termina re-->
			<div id="pleca_causas" class="">
							<h1>CAUSAS EXTERNAS</h1>
			</div>
				@if ( isset( $externas ) )
	 				@foreach ( $externas as $externa )
	 					
	 					<article class="caja_2 {{{ isset($externa['class']) ?  'caja'.$externa['class'] : 'caja'.'33' }}}">
				 			<img src="{{ asset( 'path_image/' . $externa->imagen . '/' . '559x548' ) }}" alt="{{ $externa->titulo }}">
				 			<section id="social_top">
								<ul>
									{{ Helper::facebookShare( '', URL::to( 'ficha-causa' ) . '/' . $externa->id_causas, '' ) }}
									{{ Helper::twitterShare( $externa->titulo, URL::to( 'ficha-causa' ) . '/' . $externa->id_causas, '' ) }}
									{{ Helper::like( $externa->id_causas, 'causas' ) }}
									<p>{{ $externa->me_gusta_interno }} likes</p>
								</ul>
								<div id="donativo" onclick="location.href='{{ URL::to( 'donar-causa/' . $externa->id_causas ) }}';" >HAZ TU DONACIÓN</div>
							</section>
				 			<section class="txt_int" id="{{$externa->id_causas}}">
				 				<h1>{{ strtoupper( $externa->id_categorias_record->nombre ) }}</h1>
				 				<h2>{{ $externa->titulo }}</h2>
				 				<p>{{ Str::limit( $externa->descripcion, 110 ) }}</p>
								<a href="{{ URL::to( 'ficha-causas/' . $externa->id_causas ) }}"><h3>MÁS INFORMACIÓN<span class="colorin">+</span></h3></a>
								<div id="meta">
									<div id="barra">
											<span id="b{{$externa->id_causas}}" style="width: {{ $externa->porcentaje }}%"></span>
									</div>
								<div id="cantidad">
									<h1>META</h1>
									<h2>${{ number_format($externa->meta) }}<span>MXN</span></h2>
								</div>
									<p>${{ number_format( floatval( $externa->recaudado ) ) }} MXN <span>RECAUDADOS</span></p>
									<p>{{ Helper::getRemaining( $externa->fecha ) }} <span>DÍAS RESTANTES</span></p>
								</div>
				 			</section>
				 		</article>
					@endforeach
	 			@endif

			<section id="ultimos_dona"class="">
				<div class="adorno_fa">
					<img src="{{ asset( 'images/adorno_fa.png' ) }}" alt="">
				</div>
				<div>
					<h1 onclick="{{ URL::to( '/apoyamos-tu-causa' ) }}';">APOYAMOS TU CAUSA</h1>
					<h2>Fundación Amparo apoya causas externas</h2>
					<p>
						Inscribe tu causa llenando un breve formulario, la información será revisada
						detalladamente para determinar una respuesta
					</p>
				</div>
				<div class="txt_fundacion">
					<div id="titulo_fca">
						<a class="btn btn-default causas animsition-link" href="{{ URL::to( 'apoyamos-tu-causa' ) }}">Inscribir Causa</a>
					</div>
				</div>
				<div class="txt_footer">
					<h1>¡Tú puedes ayudar!</h1>
					<h2>Tus donaciones hacen posible que esto continúe, pasa la voz <span>#TomandoAcciónFA</span></h2>
					<div id="social_footer">
						<ul>
							{{ Helper::facebookShare( '', Request::url(), '' ) }}
		 					{{ Helper::twitterShare( 'Cuasas Vivas', Request::url(), 'TomandoAcciónFA' ) }}
						</ul>
					</div>
				</div>
			</section>
		</section>
	@stop
@stop