<?php  
	$share_fb  = [ 
		'title'       => getenv('APP_TITLE') .' - FAQ’S', 
		'description' => 'Comunícate, resolvemos tus dudas',
		'image'       => asset( 'images/favicon-152.png' )
	];
?>
@extends( "public.layout" )
	@section("class")faqs-section
	@stop
	@section("content")
		<section id="Contenedor">
			<section class="mask_head back_img11" >
				<div class="txt_mask">
					<img src="{{ asset( 'images/logo_mask_header.jpg' ) }}" alt="">
					<h1>FAQ'S</h1>
					<h3>Comunícate, resolvemos tus dudas</h3>
					<nav class="social_mask">
						<ul>
							{{ Helper::facebookShare( '', Request::url(), '' ) }}
							{{ Helper::twitterShare( 'Faqs', Request::url(), '' ) }}
							{{-- <a href=""><li class="fa fa-heart"></li></a>
							<p>96 likes</p> --}}
						</ul>
					</nav>
				</div>
			</section>
			<section id="contenedor_int">
				<div class="txt_fundacion2 faqs">
					<div id="titulo_fca" >
						<h1 class="colorin-2"> GENERALES</h1>
					</div>
					@if ( isset( $faqs ) )
						@foreach ( $faqs as $faq )
							<div id="cja_faqs">
								<div id="{{ $faq->id_faq }}" class="mostrar-ocultar">	
									<div class="more reder">
							       		<span></span>
							       </div>
									<h1>{{ $faq->pregunta }}</h1>
								</div>
								<div id="deslizante{{ $faq->id_faq }}" class="deslizante">
									<p>{{ $faq->respuesta }}</p>
								</div>
							</div>
						@endforeach
					@endif
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