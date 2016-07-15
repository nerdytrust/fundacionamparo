<?php 
	$video = 1; 
	$share_fb  = [ 
		'title'       => '¡TÚ PUEDES AYUDAR¡',
		'description' => 'Tus donaciones hacen posible que esto continúe, pasa la voz
						 #TomandoAcciónFA.',
		'image'       => asset( 'images/favicon-152.png')
		];	
?>
@extends("public.layout")
	@section("class")home
	@stop
	@section("content")
		<section id="Contenedor">
			<div class="re">
				<article id="titulo_txt" class="" onclick="location.href='{{ URL::to( 'fundacion' ) }}';">
					<h1>Conoce Fundación Amparo</h1>
					<h2>#TomandoAcciónFA</h2>
					<br />
					<!--<p>Promover y apoyar actos de beneficio a la población de México</p>-->
					<h3>¡TÚ PUEDES AYUDAR!</h3>
					<p>Tus donaciones hacen posible que esto continúe, pasa la voz #TomandoAcciónFA</p>
					<h3><a href="{{ URL::to( 'fundacion' ) }}">MÁS INFORMACIÓN <span>+</span></a></h3>
					<div id="titulo_img">
						<img src="{{ asset( 'images/amparo.png' ) }}" alt="">
					</div>
				</article>
				@if ( isset( $videos ) )
					<div class="vi">
        				<a href="{{ asset ( 'path_video/' . $videos->video ) }}">
        					<div class="vjs-poster" style="background-image: url({{ asset( 'path_image/' . $videos->cover . '/' . '839x521' ) }});"></div>
        					<div class="button-play" role="button"><span aria-hidden="true"></span></div>
        				</a>
    				</div>
    				<script type="text/javascript">
						document.addEventListener("DOMContentLoaded", function(event) { 
							baguetteBox.run('.vi');
						});
					</script>
					<!--<div class="vi ">
							<video controls preload="none" poster="{{ asset( 'path_image/' . $videos->cover . '/' . '839x521' ) }}" class="video-js vjs-default-skin" data-setup="{}">
 								<source src="{{ asset ( 'path_video/' . $videos->video ) }}" type='video/mp4'>
 								<p>El video no es visible!, tu navegador no soporta video en HTML5</p>
 							</video>
						</div>
						<script type="text/javascript">
						document.addEventListener("DOMContentLoaded", function(event) { 
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
						});
						</script>
						<script type="text/javascript">
							document.addEventListener("DOMContentLoaded", function(event) { 
								  var height = $(".vi").css('height');
								  var video = videojs($('.vi').find('.video-js')[0]).ready(function(){
								  var player = this;
								  player.on('play', function() {
								  	if(window.screen.width >= 1650 && window.screen.width < 2400)
								  		$('.vi video').attr('style', 'height: 750px !important');
								  	else if(window.screen.width >= 2400)
								  		$('.vi video').attr('style', 'height: 950px !important');
								  });
								  player.on('ended', function() {
								  	video.load();
								  	$(".vjs-loading-spinner").hide();
								  	$(".vi video").css('height',height);
								  });
								   player.on('error', function() {
								  	video.load();
								  	$(".vjs-loading-spinner").hide();
								  	$(".vi video").css('height',height);
								  });
								});

								 //$('.vjs-big-play-button').remove();    
							});
						</script>-->
				@endif
				<aside class="btns">
					<article id="btn_twitter" class="">
						<ul>
							<a href="https://twitter.com/FundacioAmparo?lang=es" target="_blanck"><li class="fa fa-twitter"></li></a>
						</ul>
					</article>
					<article id="btn_facebook" class="">
						<ul>
							<a href="https://www.facebook.com/Fundaci%C3%B3n-Amparo-IAP-1241582942526809/" target="_blanck"><li class="fa fa-facebook"></li></a>
						</ul>
					</article>
					<article id="btn_donar2" class="">
						DONAR
					</article>
					<article class="caja_1" onclick="location.href='{{ URL::to('/apoyamos-tu-causa') }}';">
						<img src="{{ asset( 'images/becas_amparo.jpg' ) }}" alt="">
						<section  class="txt">
						<h1>APOYAMOS TU CAUSA</h1>
						<p>Fundación Amparo IAP apoya causas externas</p>
						</section>
					</article>
				</aside>
			</div>

			<!-- CAUSAS -->
				<div id="pleca_causas" class="">
					<h1>CAUSAS PERMANENTES</h1>
		 		</div>
		 		<div class="re">
		 			@if ( isset( $causas ) )
		 				@foreach ( $causas as $causa )
		 					<article class="caja_2 {{{ isset($causa['class']) ?  'caja'.$causa['class'] : 'caja'.'33' }}}">
					 			<img src="{{ asset( 'path_image/' . $causa->imagen . '/' . '559x548' ) }}" alt="">
					 			<section id="social_top">
									<ul>
										{{ Helper::facebookShare( '', URL::to( 'ficha-causas' ) . '/' . $causa->id_causas . '/' . Str::slug($causa->titulo), '' ) }}
										{{ Helper::twitterShare( $causa->titulo, URL::to( 'ficha-causas' ) . '/' . $causa->id_causas . '/' . Str::slug($causa->titulo), '' ) }}
										{{ Helper::like( $causa->id_causas, 'causas' ) }}
										<p>{{ $causa->me_gusta_interno }} likes</p>
									</ul>
									<div id="donativo" onclick="location.href='{{ URL::to( 'donar-causa/' . $causa->id_causas ) }}';" >HAZ TU DONACIÓN</div>
								</section>
								
						 			<section class="txt_int {{ isset($causa['class']) ?  'txt_int_'.'50' : '' }}" id="{{$causa->id_causas}}" onclick="location.href='{{ URL::to( 'ficha-causas/' . $causa->id_causas . '/' . Str::slug($causa->titulo)) }}'">
						 				<h1>{{ $causa->id_categorias_record->nombre }}</h1>
						 				<h2>{{ $causa->titulo }}</h2>
						 				<p>{{ Str::limit( $causa->descripcion, 110 ) }}</p>
										<a href="{{ URL::to( 'ficha-causas/' . $causa->id_causas . '/' . Str::slug($causa->titulo)) }}"><h3>MÁS INFORMACIÓN<span class="colorin">+</span></h3></a>
										@if ( $causa->meta != 0 )
											<div id="meta">
												<div id="barra">
													<span id="b{{$causa->id_causas}}" style="width: {{ $causa->porcentaje }}%"></span>
												</div>
												<div id="cantidad">
													<h1>META</h1>
													<h2>${{ number_format($causa->meta) }}<span>MXN</span></h2>
												</div>
												<p>${{ number_format( $causa->recaudado ) }} MXN <span>RECAUDADOS</span></p>
												<p>{{ Helper::getRemaining( $causa->fecha ) }} <span>DÍAS RESTANTES</span></p>
											</div>
										@else
											<div id="meta">
												<p>${{ number_format( $causa->recaudado ) }} MXN <span>RECAUDADOS</span></p>
												<p>{{ Helper::getRemaining( $causa->fecha ) }} <span>DÍAS RESTANTES</span></p>
											</div>
										@endif
										</section>
					 			
					 			<span class="esquina"></span>
					 		</article>
		 				@endforeach
		 			@endif
		 		</div>
	 		<!-- /CAUSAS -->

	 		<!-- FORMAS DE AYUDAR -->
		 		<div id="pleca_causas" class="">
					<h1>FORMAS DE AYUDAR</h1>
		 		</div>
		 		<div class="dre">
			 		<article id="donador_sec" class="for_ayuda">
			 			<h1>DONADOR</h1>
			 			<p>Sé parte de nuestra comunidad, con tu aportación continuamos abriendo caminos.</p>
			 			<h2>MÁS INFORMACIÓN +</h2>
			 		</article>
			 		<article id="impulsor_sec" class="for_ayuda">
			 			<h1>IMPULSOR</h1>
			 			<p>Lleguemos a más oídos y toquemos más corazones en una sola voz</p>
			 			<h2>MÁS INFORMACIÓN +</h2>
			 		</article>
			 		<article id="voluntario_sec" class="for_ayuda">
			 			<h1>VOLUNTARIO</h1>
			 			<p>Vive directamente la experiencia y ayúdanos a seguir adelante.</p>
			 			<h2>MÁS INFORMACIÓN +</h2>
			 		</article>
		 		</div>
	 		<!-- /FORMAS DE AYUDAR -->

	 		<!-- ÚLTIMOS DONADORES -->
	 			<section id="ultimos_dona"class="">
		 			<div class="adorno_fa">
		 				<img src="{{ asset( 'images/adorno_fa.png' ) }}" alt="">
		 			</div>
		 			<div>
		 				<div class="titleM">ÚLTIMOS DONADORES</div>
						<p>Donadores recientes que se unieron y juntos estamos <span>#TomandoAcciónFA</span></p>
						@if ( is_array(  $ultimos ) )
							@if ( isset( $ultimos['donadores'] ) )
		 						@foreach ( $ultimos['donadores'] as $donador )
			 						<a href="{{ URL::to( 'ficha-donador/' . $donador->id_registrados ) }}">
						 				<div class="donador_clas">
						 					<div class="img_redonda">
						 					@if ( $donador->photoURL != "" )
						 						<img src="{{ $donador->photoURL }}" alt="{{ $donador->displayName }}">
						 					@else
						 						<img src="{{ asset( 'images/default-donadores.jpg' ) }}" alt="{{ $donador->displayName }}" >
						 					@endif	
						 					</div>
						 					<h1>{{ $donador->displayName }}</h1>
						 					<h2>DONADOR</h2>
						 				</div>
						 			</a>	
					 			@endforeach
					 		@endif
							@if ( isset( $ultimos['impulsores'] ) )
					 			@foreach ( $ultimos['impulsores'] as $impulsor )
						 			<a href="{{ URL::to( 'ficha-donador/' . $impulsor->id_registrados ) }}">
						 				<div class="impulsor_clas">
						 					<div class="img_redonda">
						 					@if ( $impulsor->photoURL != "" )
						 						<img src="{{ $impulsor->photoURL }}" alt="{{ $impulsor->displayName }}">
						 					@else
						 						<img src="{{ asset( 'images/default-donadores.jpg' ) }}" alt="{{ $impulsor->displayName }}" >
						 					@endif	
						 					</div>
						 					<h1>{{ $impulsor->displayName }}</h1>
						 					<h2>IMPULSOR</h2>
						 				</div>
						 			</a>	
					 			@endforeach
					 		@endif
							@if ( isset( $ultimos['voluntarios'] ) )
					 			@foreach ( $ultimos['voluntarios'] as $voluntario )
						 			<a href="{{ URL::to( 'ficha-donador/' . $voluntario->id_registrados ) }}">
						 				<div class="voluntario_clas">
						 					<div class="img_redonda">
						 					@if ( $voluntario->photoURL != "" )
						 						<img src="{{ $voluntario->photoURL }}" alt="{{ $voluntario->displayName }}">
						 					@else
						 						<img src="{{ asset( 'images/default-donadores.jpg' ) }}" alt="{{ $voluntario->displayName }}" >
						 					@endif	
						 					</div>
						 					<h1>{{ $voluntario->displayName }}</h1>
						 					<h2>VOLUNTARIO</h2>
						 				</div>
					 				</a>
					 			@endforeach
					 		@endif
				 		@else
				 			<div class="donador_clas">
			 					<div class="img_redonda">
			 					<img src="{{ asset( 'images/persona_fa01.png' ) }}" alt="">
			 					</div>
			 					<h1>JORGE CAMACHO</h1>
			 					<h2>DONADOR</h2>
			 				</div>
							<div class="donador_clas">
			 					<div class="img_redonda">
			 					<img src="{{ asset( 'images/persona_fa02.png' ) }}" alt="">
			 					</div>
			 					<h1>JAHIR PÉREZ</h1>
			 					<h2>DONADOR</h2>
			 				</div>
			 				<div class="impulsor_clas">
			 					<div class="img_redonda">
			 					<img src="{{ asset( 'images/persona_fa03.png' ) }}" alt="">
			 					</div>
			 					<h1>DANIEL GONZÁLEZ</h1>
			 					<h2>IMPULSOR</h2>
			 				</div>
			 				<div class="voluntario_clas">
			 					<div class="img_redonda">
			 					<img src="{{ asset( 'images/persona_fa04.png' ) }}" alt="">
			 					</div>
			 					<h1>SANDRA LUNA</h1>
			 					<h2>VOLUNTARIO</h2>
			 				</div>
			 				<div class="voluntario_clas">
			 					<div class="img_redonda">
			 					<img src="{{ asset( 'images/persona_fa05.png' ) }}" alt="">
			 					</div>
			 					<h1>ADRIANA MONTES</h1>
			 					<h2>VOLUNTARIO</h2>
			 				</div>
		 				@endif
		 			</div>
		 			<div class="adorno_fa">
		 				<img src="{{ asset( 'images/adorno_fa.png' ) }}" alt="">
		 			</div>
		 			<div class="txt_fundacion">
		 				<div id="titulo_fca">
		 					<h1>FUNDACIÓN AMPARO</h1>
		 				</div>
		 				<p>En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo IAP, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa, y con el pleno consentimiento de sus hijos, quienes con la nobleza de sentimientos que les caracteriza estuvieron totalmente de acuerdo con la misma.</p>
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
	 		<!-- /ÚLTIMOS DONADORES -->
		</section>
	@stop
@stop