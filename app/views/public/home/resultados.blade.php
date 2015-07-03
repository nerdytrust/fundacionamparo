@extends( 'public.layout' )
	@section( 'class' )resultados-busqueda
	@stop
	@section( 'content' )
		<section id="Contenedor">
			<section class="mask_head back_img2" >
				<div class="txt_mask">
					<img src="{{ asset( 'images/logo_mask_header.jpg' ) }}" alt="">
					<h1>RESULTADOS</h1>
					<h3>Hechos y acontecimientos relevantes</h3>
					{{-- <nav class="social_mask">
						<ul>
							<a href=""><li class="fa fa-facebook"></li></a>
							<a href=""><li class="fa fa-twitter"></li></a>
							<a href=""><li class="fa fa-heart"></li></a>
							<p>96 likes</p>
						</ul>
					</nav> --}}
				</div>
			</section>
			<section id="contenedor_int">
			<div class="txt_fundacion3">
						<div id="titulo_fca" >
							<h2 class="mil">2014</h2>
							<h1 class="colorin"><span><hr></span> Julio <span><hr></span></h1>
						</div>
				@if ( ! empty ( $resultados ) )

					@foreach ( $resultados as $key => $noticia )

					<div id="cja_noticia">
								<div id="caja_aporta2">
									<article class="caja_fca2">
										<a href="{{ URL::to( 'ficha-noticias/' . $noticia->id_noticias ) }}">
											<img src="{{ asset( 'path_image/' . $noticia->imagen . '/' . '245x245' ) }}" alt="">
										</a>
				 					</article>
				 					<div id="txt_noticia">
										<a href="{{ URL::to( 'ficha-noticias/' . $noticia->id_noticias ) }}" class="black-link"><h1>{{ $noticia->titulo }}</h1></a>
										<h2>{{ $noticia->fecha_publicacion }}</h2>
										@if ( $noticia->extracto )
											<p>{{ Str::limit( $noticia->extracto, 180 ) }}</p>
										@else
											<p>{{ Str::limit( $noticia->contenido, 180 ) }}</p>
										@endif
										<a href="{{ URL::to( 'ficha-noticias/' . $noticia->id_noticias ) }}"><h3>MÁS INFORMACIÓN <span>+</span></h3></a>
										<nav>
											<ul>
												{{ Helper::facebookShare( '', URL::to( 'ficha-noticias' ) . '/' . $noticia->id_noticias, '' ) }}
												{{ Helper::twitterShare( $noticia->titulo, URL::to( 'ficha-noticias' ) . '/' . $noticia->id_noticias, '' ) }}
												{{ Helper::like( $noticia->id_noticias, 'noticias' ) }}
												<p>{{ $noticia->me_gusta }} likes</p>
											</ul>
										</nav>
									</div>
				 				</div>
							</div>

					@endforeach
					<!--
						<div id="cja_noticia">
							<div id="caja_aporta2">
								<article class="caja_fca2">
			 						<img src="{{ asset( 'images/fundacion_noticias_01.png' ) }}" alt="">
			 					</article>
			 					<div id="txt_noticia">
									<h1>Dientes limpios, dientes sanos</h1>
									<h2>13 julio 2014</h2>
									<p>Del 24 al 26 de junio se llevó a cabo el evento” “Dientes limpios, Dientes Sanos”; que tiene como principal objetivo la  aplicación de flúor a todos los niños, niñas y adolescentes.</p>
									<h3>MÁS INFORMACIÓN <span>+</span></h3>
									<nav>
										<ul>
											<a href=""><li class="fa fa-facebook"></li></a>
											<a href=""><li class="fa fa-twitter"></li></a>
											<a href=""><li class="fa fa-heart"></li></a>
											<p>96 likes</p>
										</ul>
									</nav>
								</div>
			 				</div>
						</div>
						<div id="cja_noticia">
							<div id="caja_aporta2">
								<article class="caja_fca2">
			 						<img src="{{ asset( 'images/fundacion_noticias_02.png' ) }}" alt="">
			 					</article>
			 					<div id="txt_noticia">
									<h1>Salida al Zoológico del Altiplano</h1>
									<h2>13 julio 2014</h2>
									<p>Las educadoras de Taller Juega junto con los beneficiarios del programa planearon y realizaron una salida el día  sábado 14 de Junio al Zoológico del Altiplano, el cual  está a una hora  y cuarto de distancia...</p>
									<h3>MÁS INFORMACIÓN <span>+</span></h3>
									<nav>
										<ul>
											<a href=""><li class="fa fa-facebook"></li></a>
											<a href=""><li class="fa fa-twitter"></li></a>
											<a href=""><li class="fa fa-heart"></li></a>
											<p>96 likes</p>
										</ul>
									</nav>
								</div>
			 				</div>
						</div>
						<div id="cja_noticia">
							<div id="caja_aporta2">
								<article class="caja_fca2">
			 						<img src="{{ asset( 'images/fundacion_noticias_03.png' ) }}" alt="">
			 					</article>
			 					<div id="txt_noticia">
									<h1>Taller Fitopreparados</h1>
									<h2>13 julio 2014</h2>
								
									<p>Se realizó el Taller de elaboración de productos medicinales a partir de plantas curativas. El día 14 de junio en la comunidad de Sta. Martha se dio un taller de preparado de medicamentos de...</p>
									<h3>MÁS INFORMACIÓN <span>+</span></h3>
									<nav>
										<ul>
											<a href=""><li class="fa fa-facebook"></li></a>
											<a href=""><li class="fa fa-twitter"></li></a>
											<a href=""><li class="fa fa-heart"></li></a>
											<p>96 likes</p>
										</ul>
									</nav>	
								</div>
			 				</div>
						</div>
						<div id="cja_noticia">
							<div id="caja_aporta2">
								<article class="caja_fca2">
			 						<img src="{{ asset( 'images/fundacion_noticias_04.png' ) }}" alt="">
			 					</article>
			 					<div id="txt_noticia">
									<h1>Taller de Capacitación de Desarrollo Humano</h1>
									<h2>13 julio 2014</h2>
									<p>Como parte de la capacitación permanente de las educadoras del programa preescolar, en este año se lleva a cabo el Taller intensivo de Capacitación de Desarrollo Humano.</p>
									<h3>MÁS INFORMACIÓN <span>+</span></h3>
									<nav>
										<ul>
											<a href=""><li class="fa fa-facebook"></li></a>
											<a href=""><li class="fa fa-twitter"></li></a>
											<a href=""><li class="fa fa-heart"></li></a>
											<p>96 likes</p>
										</ul>
									</nav>	
								</div>
			 				</div>
						</div>
					</div>-->
					<div id="contenedor_btn" >
						<button>Cargar más noticias</button>
					</div>
				@else
					<div class="txt_fundacion3">
						<h2>No se encontraron resultados</h2>
					</div>
				@endif
				<div class="adorno_fa">
 					<img src="{{ asset( 'images/adorno_fa.png' ) }}" alt="">
 				</div>
 				<div class="txt_footer">
 					<h1>¡Tú puedes ayudar!</h1>
 					<h2>Tus donaciones hacen posible que esto continúe, pasa la voz <span>#TomandoAcciónFA</span></h2>
 					<div id="social_footer">
 						<ul>
 							{{ Helper::facebookShare( '', Request::url(), '' ) }}
							{{ Helper::twitterShare( 'Fundación Amparo', Request::url(), 'TomandoAcciónFA' ) }}
 						</ul>
 					</div>
 				</div>
			</section>
		</section>
	@stop
@stop