@extends( 'public.layout' )
	@section("class")fundacion
	@stop
	@section("content")
		<section id="Contenedor">
			<section class="mask_head back_img" >
				<div class="txt_mask">
					<img src="{{ asset( 'images/logo_mask_header.jpg' ) }}" alt="">
					<h1>FUNDACIÓN AMPARO</h1>
					<h3>En apoyo a un México de corazones vivos</h3>
				</div>
			</section>
			<section id="contenedor_int">
				<div class="txt_fundacion2">
					<div id="titulo_fca">
						<h1>TÉRMINOS Y CONDICIONES</h1>
					</div>
					
 					<div id="social_footer">
 						<ul>
 							{{ Helper::facebookShare( '', Request::url(), '' ) }}
							{{ Helper::twitterShare( 'Terminos y Condiciones', Request::url(), 'TomandoAcciónFA' ) }}
 						</ul>
 					</div>
 				</div>
			</section>
		</section>
	@stop
@stop