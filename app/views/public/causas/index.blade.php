@extends('public.layout')
	@section('class')causas-vivas
	@stop
	@section("content")
		<section id="Contenedor">
			<span class="como">
				<h1>¿Cómo Ayudar?</h1>
				<h2>Tus donaciones construyen sueños y cambian vidas <b>#TomandoAcciónFA</b></h2>
				<button id="btn_dona">DONAR AHORA</button>
			</span>
			<div class="vi3">
				<video loop preload="auto" poster="{{ asset( 'images/video_causa.png' ) }}" controls  class="video-js vjs-default-skin" data-setup="{}">
					<source src="{{ asset( 'video/video.mp4' ) }}">
				</video>
			</div>
			<div id="pleca_causas" class="">
				<h1>CAUSAS FUNDACIÓN AMPARO</h1>
			</div>
			<div class="re">
				@if ( isset( $causas ) )
	 				@foreach ( $causas as $causa )
	 					<article class="caja_2">
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
				 			<section class="txt_int">
				 				<h1>{{ strtoupper( $causa->id_categorias_record->nombre ) }}</h1>
				 				<h2>{{ $causa->titulo }}</h2>
				 				<p>Apoya para generar oportunidades de educación para niños de escasos recursos, involucrando a su familia y comunidad</p>
								<a href="{{ URL::to( 'ficha-causas/' . $causa->id_causas ) }}"><h3>MÁS INFORMACIÓN<span class="colorin">+</span></h3></a>
								<div id="meta">
									<div id="barra">
										<progress value="0" max="100">
											<div class="progress-bar">
										        <span style="width: 60%;">-</span>
										    </div>
										</progress>
									</div>
								<div id="cantidad">
									<h1>META</h1>
									<h2>{{ $causa->meta }}<span>MXN</span></h2>
								</div>
									<p>{{ number_format( floatval( $causa->recaudado ) ) }} MXN <span>RECAUDADOS</span></p>
									<p>{{ Helper::getRemaining( $causa->fecha ) }} <span>DÍAS RESTANTES</span></p>
								</div>
				 			</section>
				 			<span class="esquina"></span>
				 		</article>
	 				@endforeach
	 			@endif
	 			<!--Codigo sin funciones-->
	 			<article class="caja_2 caja100">
				 			<img src="{{ asset( 'images/light-cau.png' ) }}" alt="">
				 			<section id="social_top">
								<ul>
									
								</ul>
								<div id="donativo" >HAZ TU DONACIÓN</div>
							</section>
				 			<section class="txt_int">
				 				<h1>reder</h1>
				 				<h2>reder</h2>
				 				<p>Apoya para generar oportunidades de educación para niños de escasos recursos, involucrando a su familia y comunidad</p>
								<a href="#"><h3>MÁS INFORMACIÓN<span class="colorin">+</span></h3></a>
								<div id="meta">
									<div id="barra">
										<progress value="0" max="100">
											<div class="progress-bar">
										        <span style="width: 60%;">-</span>
										    </div>
										</progress>
									</div>
								<div id="cantidad">
									<h1>META</h1>
									<h2>12344<span>MXN</span></h2>
								</div>
									<p>123445 MXN <span>RECAUDADOS</span></p>
									<p>123455 <span>DÍAS RESTANTES</span></p>
								</div>
				 			</section>
				 			<span class="esquina"></span>
				 		</article>

	 			<!--Termina Codigo sin funciones-->


			</div><!--termina re-->
			@if ( ! empty( $externas ) )
				<div id="pleca_causas" class="">
					<h1>CAUSAS EXTERNAS</h1>
				</div>
				<div class="re csa">
					@foreach ( $externas as $externa )
						<section id="causa1" class="causas-social ">
							<a href="{{ URL::to( 'ficha-causas/' . $externa->id_causas ) }}">
								<img src="{{ asset( 'path_image/' . $externa->imagen . '/' . '480x481' ) }}" alt="{{ $causa->titulo }}">
							</a>
							<div id="donativo" onclick="location.href='{{ URL::to( 'donar-causa/' . $externa->id_causas ) }}';">HAZ TU DONACIÓN</div>
							<h2 class="text-causas">aportaciones</h2>
							<h3>{{ strtoupper( $externa->id_categorias_record->nombre ) }}</h3>
						</section>
					@endforeach
				</div><!--termina dre-->
			@endif

			<!--Codigo sin funciones-->
			<div id="pleca_causas" class="">
					<h1>CAUSAS EXTERNAS2</h1>
				</div>
				<div class="re csa">

						<section id="causa1" class="causas-social caja25">
							<a href="#">
								<img src="{{ asset( 'images/causa1.png' ) }}" alt="">
							</a>
							<div id="donativo" >HAZ TU DONACIÓN</div>
							<h2 class="text-causas">aportaciones</h2>
							<h3>refre</h3>
						</section>

						<section id="causa1" class="causas-social caja25">
							<a href="#">
								<img src="{{ asset( 'images/causa1.png' ) }}" alt="">
							</a>
							<div id="donativo" >HAZ TU DONACIÓN</div>
							<h2 class="text-causas">aportaciones</h2>
							<h3>refre</h3>
						</section>

						<section id="causa1" class="causas-social caja25">
							<a href="#">
								<img src="{{ asset( 'images/causa1.png' ) }}" alt="">
							</a>
							<div id="donativo" >HAZ TU DONACIÓN</div>
							<h2 class="text-causas">aportaciones</h2>
							<h3>refre</h3>
						</section>

						<section id="causa1" class="causas-social caja25">
							<a href="#">
								<img src="{{ asset( 'images/causa1.png' ) }}" alt="">
							</a>
							<div id="donativo" >HAZ TU DONACIÓN</div>
							<h2 class="text-causas">aportaciones</h2>
							<h3>refre</h3>
						</section>
						<section id="causa1" class="causas-social caja-e100">
							<a href="#">
								<img src="{{ asset( 'images/causa1.png' ) }}" alt="">
							</a>
							<div id="donativo" >HAZ TU DONACIÓN</div>
							<h2 class="text-causas">aportaciones</h2>
							<h3>refre</h3>
						</section>					

				</div><!--Termina Codigo sin funciones-->


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