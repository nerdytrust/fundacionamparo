<?php	
	$share_fb  = [ 
		'title'       => getenv('APP_TITLE') . " - En apoyo a un México de corazones vivos",
		'image'       => asset( 'images/favicon-152.png')
	];
?>
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
					<nav class="social_mask">
						<ul>
							{{ Helper::facebookShare( '', Request::url().'?v='.str_random(10), '' ) }}
							{{ Helper::twitterShare( 'La Fundación', Request::url(), '' ) }}
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
							<li class="activo">{{ HTML::link( '/fundacion', 'LA FUNDACIÓN', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/historia', 'HISTORIA', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/aportaciones', 'APORTACIONES', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/membresias', 'MEMBRESÍAS U ORGANISMOS', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/consideraciones', 'CONSIDERACIONES FISCALES', [ 'class' => 'animsition-link' ]) }}</li>
						</ul>
					</nav>
				</div>

				<div class="txt_fundacion2">
					<div id="titulo_fca">
						<h1>LA FUNDACIÓN</h1>
					</div>
					<p>Fundación Amparo tiene como objetivo difundir y apoyar la educación y la cultura en todas las ramas y vertientes siempre dando prioridad a la gente de escasos recursos y comunidades más necesitadas. Entregar becas educativas, incentivar el deporte, cuidar la salud y mantener vivas nuestras raíces mexicanas cuidando y protegiendo nuestros edificios, catedrales, monumentos, calles, ciudades, ruinas etc. Promover el conocimiento a través de museos abiertos, de esta manera educar a los nuestros y al resto del mundo. Muestra de las diferentes causas, sus valores y las necesidades que requieren nuestra atención, respeto y apoyo.</p>
					<br/>
					<p>Actualmente, la misión, filosofía y objetivos de la Fundación se resumen así:</p>
					<br/>
					<h3>Misión</h3>
					
					<p>Promover y apoyar actos de beneficio a la población de México, principalmente mediante la promoción de actividades educativas y culturales.</p>
					<br/>
					<h3>Filosofía</h3>
					
					<p>Fundación Amparo tiene como objetivo difundir y apoyar la educación y la cultura en todas las ramas y vertientes siempre dando prioridad a la gente de escasos recursos y comunidades más necesitadas. Entregar becas educativas, incentivar el deporte, cuidar la salud y mantener vivas nuestras raíces mexicanas cuidando y protegiendo nuestros edificios, catedrales, monumentos, calles, ciudades, ruinas etc. Promover el conocimiento a través de museos abiertos, de esta manera educar a los nuestros y al resto del mundo.</p>
					<br/>
					<h3>Objetivos</h3>
					
					<p>La Fundación tiene como objetivo irrevocable</p>
					<br/>
					<p><b>A)</b> Auspiciar, fomentar, administrar y en general promover el Museo Amparo, así como otras instituciones de promoción a las bellas artes o desarrollo cultural y museos abiertos al público.</p>
					<br/>
					<p><b>B)</b> Auspiciar, fomentar, administrar y en general promover la creación o establecimiento de centros de investigación y especialización social e instituciones o centros de educación a nivel primario, medio o superior, dando prioridad a las últimas, a cuyo efecto podrá otorgar becas a los jóvenes que las merezcan.</p>
					<br/>
					<p><b>C)</b> La realización de actos de asistencia y auxilio a la comunidad, ya sea para el embellecimiento de algunas ciudades o para llevar a cabo trabajos de exploración en zonas arqueológicas, fomentando, consecuentemente, la apreciación de las raíces que conforman la nacionalidad mexicana.</p>
					<br/>
					<p><b>D)</b> En general, otorgar todo tipo de ayuda para sostener instituciones de asistencia o beneficencia, ya sea que hubieren sido establecidas por la Fundación o por terceros.</p>
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