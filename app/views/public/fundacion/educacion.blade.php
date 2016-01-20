<?php	
	$share_fb  = [ 
		'title'       => getenv('APP_TITLE') . " - Preparando a nuestros niños para un futuro de oportunidad",
		'image'       => asset( 'images/fundacion_educacion.jpg')
	];
?>
@extends( 'public.layout' )
	@section("class")educacion
	@stop
	@section("content")
		<section id="Contenedor">
			<section class="mask_head back_img4" >
				<div class="txt_mask">
					<img src="{{ asset( 'images/logo_mask_header.jpg' ) }}" alt="">
					<h1>FUNDACIÓN AMPARO</h1>
					<h3>Preparando a nuestros niños para un futuro de oportunidad</h3>
					<nav class="social_mask">
						<ul>
							{{ Helper::facebookShare( '', Request::url(), '' ) }}
							{{ Helper::twitterShare( 'La Fundación - Educación', Request::url(), '' ) }}
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
						<h1>EDUCACIÓN</h1>
					</div>
					<p>Se ha apoyado a estudiantes destacados para que concluyan exitosamente sus estudios, esto a través de becas otorgadas después de una cuidadosa evaluación.</p>
					<br/>
					<p>En el mismo sentido, y considerando la importancia que tiene para los mexicanos, sobre todo para los estudiantes, el afianzar las relaciones y nexos con nuestro vecino del norte, se han aportado a la Universidad Rockefeller en Nueva York importantes cantidades que han creado esa inercia de apoyo mutuo entre las dos naciones.  Recientemente se dieron apoyos para la creación y operación del “David Rockefeller Center for Latin American Studies” en la universidad de Harvard.</p>
					<br/>
					<p>Dentro de las obras educativas y de carácter social, podemos mencionar la creación de los Centros de Desarrollo Comunitario Roberto Alonso Espinosa, ubicados en Lomas de Chamontoya, D.F. y en Zacatlán Puebla. Los cuales tienen como misión generar oportunidades de educación integral y alternativa  para niños de escasos recursos, involucrando a su familia y comunidad en un proceso de cambio. Este trabajo se realiza a través de la capacitación a madres educadoras y del impulso a la participación comunitaria.</p>
					<br/>
					<p>Es la atención a la niñez, aspiración del creador de la Fundación Amparo que se ha cristalizado a través de este Proyecto,  que apoya integralmente a niños y familias de escasos recursos.</p>
					<br/>
					<h3>Beneficiarios</h3>
					<ul class="ben">
						<li>Rockefeller University en N.Y.</li>
						<li>Centro de Integración Educativa Sur A.C.</li>
						<li>Escuela Manuel Ávila Camacho</li>
						<li>Colegio José Salvador A.C.</li>
						<li>Becas a estudiantes destacados de diversas universidades e instituciones</li>
						<li>Programa “cartonera” de fomento a la lectura con la universidad de Harvard</li>
						<li>Apoyo a la Universidad de Harvard para la creación y operación del David Rockefeller Center for Latin American Studies</li>
						<li>Aportación al Colegio Americano (Auditorio Angeles Espinosa Yglesias) en México, D.F.</li>
						<li>Desarrollo Educacional ABP (edificación del Centro Roberto Garza Sada en Monterrey)</li>
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