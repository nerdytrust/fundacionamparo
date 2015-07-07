@extends( 'public.layout' )
	@section( 'class' )
	@stop
	@section( 'content' )
		<section id="Contenedor">
			<section class="mask_head back_img2" >
				<div class="txt_mask">
					<img src="{{ asset( 'images/logo_mask_header.jpg' ) }}" alt="">
					<h1>NOTICIAS</h1>
					<h3>Hechos y acontecimientos relevantes</h3>
					<nav class="social_mask">
						<ul>
							{{ Helper::facebookShare( '', Request::url(), '' ) }}
							{{ Helper::twitterShare( 'Noticias', Request::url(), '' ) }}
							{{-- <a href=""><li class="fa fa-heart"></li></a>
							<p>96 likes</p> --}}
						</ul>
					</nav>
				</div>
			</section>
			<section id="contenedor_int">
				<div class="txt_fundacion3">
					<div id="titulo_fca" >
						<!--<h2 class="mil">2014</h2>-->
						<!--<h1 class="colorin"><span><hr></span> Julio <span><hr></span></h1>-->
					</div>
					@if ( isset( $noticias ) )
						@foreach ( $noticias as $noticia )
							<div id="cja_noticia">
								<div id="caja_aporta2">
									<article class="caja_fca2">
										<a href="{{ URL::to( 'ficha-noticias/' . $noticia->id_noticias ) }}">
											<img src="{{ asset( 'path_image/' . $noticia->imagen . '/' . '245x245' ) }}" alt="">
										</a>
				 					</article>
				 					<div id="txt_noticia">
										<a href="{{ URL::to( 'ficha-noticias/' . $noticia->id_noticias ) }}" class="black-link"><h1>{{ $noticia->titulo }}</h1></a>
										<h2>{{ date("d M Y",strtotime($noticia->fecha_publicacion)) }}</h2>
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
					@endif
					<ul id="fnews"></ul>
				</div>
				<div id="contenedor_btn" >
					<button id="load-news">Cargar más noticias</button>
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
							{{ Helper::twitterShare( 'TomandoAcciónFA', Request::url(), '' ) }}
 						</ul>
 					</div>
 				</div>
			</section>
		</section>
	@stop
@stop