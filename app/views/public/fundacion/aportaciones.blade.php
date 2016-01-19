<?php	
	$share_fb  = [ 
		'title'       => getenv('APP_TITLE') . " - Preparando a nuestros niños para un futuro de oportunidad",
		'image'       => asset( 'images/favicon-152.png')
	];
?>
@extends( 'public.layout' )
	@section("class")aportaciones
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
							{{ Helper::twitterShare( 'La Fundación - Aportaciones', Request::url(), '' ) }}
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
				<div class="txt_fundacion2">
					<div id="titulo_fca">
						<h1 class="tt">APORTACIONES EN PROGRESO</h1>
						<h4>Contribuciones actuales de Fundación Amparo</h4>
					</div>
					<p>Actualmente, la Fundación aboca sus energías y recursos a lograr la excelencia en el desempeño y proyección del Museo Amparo, en la Ciudad de Puebla. Y es así como la Fundación Amparo siempre preocupada y ocupada en difundir la cultura en nuestra ciudad, se siente orgullosamente satisfecha en ver concluido este trabajo, ya que su compromiso no es sólo intervenir en la parte tangible de la cultura, el compromiso de la Fundación Amparo es lograr tocar las fibras más sensibles de la sociedad y poder participar en la difusión de nuestros valores, a través de obras que hagan de la ciudad de Puebla un tesoro invaluable de cultura.<br/>
						<span><a href="{{ URL::to( 'http://www.museoamparo.com' ) }}" target="_blank" class="">www.museoamparo.com</a></span>
					</p>
					<br/>
					<h3>Centros Comunitarios Roberto Alonso Espinosa</h3>
					<p>Otro de sus proyectos vivos ha sido el desarrollo y crecimiento del Centro de Desarrollo Comunitario Roberto Alonso Espinosa, ubicado en la colonia Lomas de Chamontoya en la Ciudad de México y otro en el municipio de Zacatlán, Puebla, los cuales brindan atención, bajo el Método Montessori, a la comunidad infantil de muy escasos recursos, ampliando el beneficio al ambiente familiar.<br/>
						<span><a href="{{ URL::to ( 'http://www.proyectoroberto.org.mx' ) }}" target="_blank" class="">www.proyectoroberto.org.mx</a></span>
					</p>
				</div>
				<div class="adorno_fa">
 					<img src="{{ asset( 'images/adorno_fa.png' ) }}" alt="">
 				</div>

				<div class="txt_fundacion2">
					<div id="titulo_fca">
					<h1 class="tt">APORTACIONES REALIZADAS</h1>
					<h4>Contribuciones a través de Fundación Amparo</h4>
					</div>
				</div>
				<div id="caja_aporta">
					<article class="caja_fca animacion" onclick="location.href='{{ URL::to( '/educacion') }}';">
 						<img src="{{ asset( 'images/fundacion_educacion.jpg' ) }}" alt="">
 						<section class="txt_fca">
 							<h1>EDUCACIÓN</h1>
 						</section>
 					</article>
 					<article class="caja_fca animacion" onclick="location.href='{{ URL::to( '/salud') }}';">
 						<img src="{{ asset( 'images/fundacion_salud.jpg' ) }}" alt="">
 						<section class="txt_fca">
 							<h1>SALUD</h1>
 						</section>	
 					</article>
 					<article class="caja_fca animacion" onclick="location.href='{{ URL::to( '/deporte' ) }}';">
 						<img src="{{ asset( 'images/fundacion_deporte.jpg' ) }}" alt="">
 						<section class="txt_fca">
 							<h1>DEPORTE</h1>
 						</section>
 					</article>
 					<article class="caja_fca animacion" onclick="location.href='{{ URL::to( '/cultura' ) }}';">
 						<img src="{{ asset( 'images/fundacion_cultura.jpg' ) }}" alt="">
 						<section class="txt_fca">
 							<h1>CULTURA</h1>
 						</section>
 					</article>
 					<article class="caja_fca animacion" onclick="location.href='{{ URL::to( '/restauracion' ) }}';">
 						<img src="{{ asset( 'images/fundacion_restauracion.jpg' ) }}" alt="">
 						<section class="txt_fca">
 							<h1>RESTAURACIÓN</h1>
 						</section>
 					</article>
 					<article class="caja_fca animacion" onclick="location.href='{{ URL::to( '/asistenciales' ) }}';">
 						<img src="{{ asset( 'images/fundacion_asistenciales.jpg' ) }}" alt="">
 						<section class="txt_fca">
 							<h1>ASISTENCIALES</h1>
 						</section>
 					</article>
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