@extends("public.layout")
	@section("class")home
	@stop
	@section("content")
		<section id="Contenedor">
			<div class="re">
				<article id="titulo_txt" class="" onclick="location.href='{{ URL::to( 'fundacion' ) }}';">
					<h1>Conoce Fundación Amparo</h1>
					<h2>#TomandoAcciónFA</h2>
					<p>Promover y apoyar actos de beneficio a la población de México</p>
					<h3><a href="{{ URL::to( 'fundacion' ) }}">MÁS INFORMACIÓN <span>+</span></a></h3>
					<div id="titulo_img">
						<img src="{{ asset( 'images/amparo.png' ) }}" alt="">
					</div>
				</article>
				@if ( isset( $videos ) )
					
						<div class="vi ">
							<video width="500" height="281" controls>
								<source src="{{ asset ( 'path_video/' . $videos->video ) }}" type='video/mp4'>
								<p>El video no es visible!, tu navegador no soporta video en HTML5</p>
							</video>
						</div>
					
				@endif
				<aside class="btns">
					<article id="btn_twitter" class="">
						<ul>
							<a href="https://twitter.com/FundacioAmparo?lang=es" target="_blanck"><li class="fa fa-twitter"></li></a>
						</ul>
					</article>
					<article id="btn_facebook" class="">
						<ul>
							<li class="fa fa-facebook"></li>
						</ul>
					</article>
					<article id="btn_donar2" class="">
						DONAR
					</article>
					<article class="caja_1" onclick="location.href='{{ URL::to('/becas') }}';">
						<img src="{{ asset( 'images/becas_amparo.jpg' ) }}" alt="">
						<section  class="txt">
						<h1>BECAS</h1>
						<p>Aplica para obtener una beca de estudios</p>
						</section>
					</article>
				</aside>
			</div>

			<!-- CAUSAS -->
				<div id="pleca_causas" class="">
					<h1>CAUSAS</h1>
		 		</div>
		 		<div class="re">
		 			@if ( isset( $causas ) )
		 				@foreach ( $causas as $causa )
		 					<article class="caja_2 {{{ isset($causa['class']) ?  'caja'.$causa['class'] : 'caja'.'33' }}}">
					 			<img src="{{ asset( 'path_image/' . $causa->imagen . '/' . '559x548' ) }}" alt="">
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
					 				<h1>{{ $causa->id_categorias_record->nombre }}</h1>
					 				<h2>{{ $causa->titulo }}</h2>
					 				<p>{{ Str::limit( $causa->descripcion, 110 ) }}</p>
									<a href="{{ URL::to( 'ficha-causas/' . $causa->id_causas ) }}"><h3>MÁS INFORMACIÓN<span class="colorin">+</span></h3></a>
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
					 				<div class="donador_clas">
					 					<div class="img_redonda">
					 					<img src="{{ $donador->photoURL }}" alt="">
					 					</div>
					 					<h1>{{ $donador->displayName }}</h1>
					 					<h2>DONADOR</h2>
					 				</div>
					 			@endforeach
					 		@endif
							@if ( isset( $ultimos['impulsores'] ) )
					 			@foreach ( $ultimos['impulsores'] as $impulsor )
					 				<div class="impulsor_clas">
					 					<div class="img_redonda">
					 					<img src="{{ $impulsor->photoURL }}" alt="">
					 					</div>
					 					<h1>{{ $impulsor->displayName }}</h1>
					 					<h2>IMPULSOR</h2>
					 				</div>
					 			@endforeach
					 		@endif
							@if ( isset( $ultimos['voluntarios'] ) )
					 			@foreach ( $ultimos['voluntarios'] as $voluntario )
					 				<div class="voluntario_clas">
					 					<div class="img_redonda">
					 					<img src="{{ $voluntario->photoURL }}" alt="">
					 					</div>
					 					<h1>{{ $voluntario->displayName }}</h1>
					 					<h2>VOLUNTARIO</h2>
					 				</div>
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
		 				<p>En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa, y con el pleno consentimiento de sus hijos, quienes con la nobleza de sentimientos que les caracteriza estuvieron totalmente de acuerdo con la misma.</p>
		 			</div>
		 			<div class="adorno_fa">
		 				<img src="{{ asset( 'images/adorno_fa.png' ) }}" alt="">
		 			</div>
		 			<div class="txt_footer">
		 					<h1>¡Tú puedes ayudar!</h1>
		 					<h2>Tus donaciones hacen posible que esto continúe, pasa la voz <span>#TomandoAcciónFA</span></h2>
		 					<div id="social_footer">
		 						<ul>
		 							{{ Helper::facebookShare( '', Request::url(), '' ) }}
		 							{{ Helper::twitterShare( getenv( 'APP_TITLE' ), Request::url(), 'TomandoAcciónFA' ) }}
		 						</ul>
		 					</div>
		 				</div>
		 		</section>
	 		<!-- /ÚLTIMOS DONADORES -->
		</section>
	@stop
@stop