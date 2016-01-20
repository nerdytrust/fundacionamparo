<?php	
	$share_fb  = [ 
		'title'       => 'APOYAMOS TU CAUSA - Fundación Amparo apoya causas externas',
		'description' => 'Comunícate con nosotros
						  Llena el siguiente formulario, una vez revisado nos pondremos en contacto para darte
						  una respuesta',
		'image'       => asset( 'images/fundacion_apoyo.png')
	];
?>
@extends("public.layout")
	@section("class")becas
	@stop

	@section("content")
		<section id="Contenedor">
			<section class="mask_head back_img13" >
				<div class="txt_mask">
					<img src="{{ asset( 'images/logo_mask_header.jpg' ) }}" alt="">
					<h1>APOYAMOS TU CAUSA</h1>
					<h3>Fundación Amparo apoya causas externas</h3>
					<nav class="social_mask">
						<ul>
							{{ Helper::facebookShare( '', Request::url(), '' ) }}
							{{ Helper::twitterShare( 'Apoyamos tu Causa', Request::url(), '' ) }}
							{{-- <a href=""><li class="fa fa-heart"></li></a>
							<p>96 likes</p> --}}
						</ul>
					</nav>
				</div>
			</section>
			<section id="contenedor_int">
				<div id="nav_int">
					<nav >
						<ul>
							<li>{{ HTML::link( '/apoyamos-tu-causa', 'APLICA PARA OBTENER APOYO', [ 'class' => 'animsition-link' ] ) }}</li>
							<li class="activo">{{ HTML::link( '/apoyamos-tu-causa-bases', 'BASES', [ 'class' => 'animsition-link' ] ) }}</li>							
							<li>{{ HTML::link( '/apoyamos-tu-causa-apoyadas', 'CAUSAS APOYADAS '.date('Y'), [ 'class' => 'animsition-link' ] ) }}</li>
						</ul>
					</nav>
				</div>
				<div class="txt_fundacion2">
					<div id="titulo_fca">
						<h1>Bases</h1>
					</div>

					<h3>Requisitos básicos</h3>

					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<br/>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<br/>

					<h3>Otorgamiento</h3>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<br/>

					<h3>Formalización</h3>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
					<br/>

					<h3>Vigencia</h3>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
					<br/>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
					<br/>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
					<br/>
					
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
							{{ Helper::twitterShare( '¡TÚ PUEDES AYUDAR! Tus donaciones hacen posible que esto continúe, pasa la voz', Request::url(), 'TomandoAcciónFA' ) }}
 						</ul>
 					</div>
 				</div>
			</section>
		</section>
	@stop
@stop