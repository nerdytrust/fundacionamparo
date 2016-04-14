<?php	
	$share_fb  = [ 
		'title'       => getenv('APP_TITLE') . " - Protegiendo el bienestar de la vida",
		'image'       => asset( 'images/fundacion_salud.jpg')
	];
?>
@extends( 'public.layout' )
	@section("class")salud
	@stop
	@section("content")
		<section id="Contenedor">
			<section class="mask_head back_img5" >
				<div class="txt_mask">
					<img src="{{ asset( 'images/logo_mask_header.jpg' ) }}" alt="">
					<h1>FUNDACIÓN AMPARO</h1>
					<h3>Protegiendo el bienestar de la vida</h3>
					<nav class="social_mask">
						<ul>
							{{ Helper::facebookShare( '', Request::url(), '' ) }}
							{{ Helper::twitterShare( 'La Fundación - Salud', Request::url(), '' ) }}
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
							<li>{{ HTML::link( '/fundacion', 'LA FUNDACIÓN', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/historia', 'HISTORIA', [ 'class' => 'animsition-link' ] ) }}</li>
							<li class="activo">{{ HTML::link( '/aportaciones', 'APORTACIONES', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/membresias', 'MEMBRESÍAS U ORGANISMOS', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/consideraciones', 'CONSIDERACIONES FISCALES', [ 'class' => 'animsition-link' ]) }}</li>
						</ul>
					</nav>
				</div>
				<div class="regresa" onclick="location.href='{{ URL::to( '/aportaciones') }}';"><i class="fa fa-caret-left fa-lg"></i>Regresar</div>
				<div class="txt_fundacion2">
					<div id="titulo_fca" class="colorin">
						<h1>SALUD</h1>
					</div>
					<p>La Fundación Amparo IAP, entre los objetivos principales que contempló en el momento de su creación, abarcaba la búsqueda y apoyo de soluciones para grandes problemas, tales como el alcoholismo y todo tipo de dependencias destructivas. Para cumplir con esta finalidad, se brindó especial apoyo y respaldo económico a la Clínica Monte Fénix, sede del Centro de Integración para Alcohólicos y Familiares, A. C., asociación que recibió constantes aportaciones que le permitieron, incluso, contar con un importante centro de atención que brindaba apoyo tanto a quienes sufrían de dependencias de alcoholismo y drogadicción, como a sus familiares. </p>
					<br/>
					<h3>Beneficiarios</h3>
					<ul class="ben">
						<li>Clínica Monte Fenix</li>
						<li>Fundación Mexicana para las Enfermedades Hepáticas</li>
						<li>Fundación Mexicana para la Salud Hepática</li>
						<li>Aportaciones para tratamientos médicos varios</li>
					</ul>
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