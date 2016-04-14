<?php	
	$share_fb  = [ 
		'title'       => getenv('APP_TITLE') . " - En apoyo a un México de corazones vivos",
		'image'       => asset( 'images/fundacion01_a.jpg')
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
							{{ Helper::facebookShare( '', Request::url(), '' ) }}
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
					<p>Fundación Amparo IAP tiene como objetivo difundir y apoyar la educación y la cultura en todas las ramas y vertientes siempre dando prioridad a la gente en desventaja socioeconómica y comunidades más necesitadas. Entregar becas educativas, incentivar el deporte, cuidar la salud y mantener vivas nuestras raíces mexicanas cuidando y protegiendo nuestros edificios, catedrales, monumentos, calles, ciudades, ruinas etc. Promover el conocimiento a través de museos abiertos, de esta manera educar a los nuestros y al resto del mundo. Muestra de las diferentes causas, sus valores y las necesidades que requieren nuestra atención, respeto y apoyo.</p>
					<br/>
					<p>Actualmente, la misión, filosofía y objetivos de la Fundación se resumen así:</p>
					<br/>
					<h3>Misión</h3>
					
					<p>Promover y apoyar actos de beneficio a la población de México, principalmente mediante la promoción de actividades asistenciales, educativas y culturales.</p>
					<br/>
					<h3>Filosofía</h3>
					
					<p>Acercar la educación, el arte y la cultura universal a todos los seres humanos, considerando prioritario para ello el bienestar de los más necesitados.</p>
					<br/>
					<h3>Objeto de la Fundación</h3>
					<p><b>Asistencial</b></p>
					<p>La Fundación es una organización sin fines de lucro que tiene como beneficiarios en todas y cada una de las actividades asistenciales que realiza a personas, sectores y regiones de escasos recursos; comunidades indígenas y grupos vulnerables por edad, sexo o problemas de discapacidad y tiene por objeto realizar las siguientes actividades:</p>
					<br/>
					<p><b>A)</b> La atención a requerimientos básicos de subsistencia en materia de alimentación, vestido o vivienda.</p>
					<br/>
					<p><b>B)</b> Orientación social, educación o capacitación para el trabajo. Entendiendo por orientación social la asesoría en materias tales como la familia, la educación, la alimentación, el trabajo y la salud. </p>
					<br/>
					<p><b>Educativa</b></p>
					<p>Impartir enseñanza en los niveles jardín de niños, primaria, secundaria y bachillerato, con autorización o con reconocimiento de validez oficial de estudios en los términos de la Ley General de Educación. </p>
					<br/>
					<p><b>Culturales</b></p>
					<p><b>A)</b> La promoción y difusión de música, artes plásticas, artes dramáticas, danza, literatura, arquitectura y cinematografía, conforme a la Ley que crea al Instituto Nacional de Bellas Artes y Literatura, así como a la Ley Federal de Cinematografía.</p>
					<br/>
					<p><b>B)</b> El apoyo a las actividades de educación e investigación artísticas de conformidad con lo señalado en el inciso anterior. </p>
					<br/>
					<p><b>C)</b> La protección, conservación, restauración y recuperación del patrimonio cultural de la nación, en los términos de la Ley Federal sobre Monumentos y Zonas Arqueológicos, Artísticos e Históricos y la Ley General de Bienes Nacionales; así como el arte de las comunidades indígenas en todas las manifestaciones primigenias de sus propias lenguas, los usos y costumbres, artesanías y tradiciones de la composición pluricultural que conforman el país.</p>
					<br/>
					<p><b>Museos y bibliotecas privados</b></p>
					<p>La instauración y establecimiento de bibliotecas y museos académicos, culturales y de promoción de las artes que se encuentren abiertos al público en general. </p>
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
 							{{ Helper::facebookShare( '', URL::to('/'), '' ) }}
		 				    {{ Helper::twitterShare( '¡TÚ PUEDES AYUDAR! Tus donaciones hacen posible que esto continúe, pasa la voz', URL::to('/')	, 'TomandoAcciónFA' ) }}
 						</ul>
 					</div>
 				</div>
			</section>
		</section>
	@stop
@stop