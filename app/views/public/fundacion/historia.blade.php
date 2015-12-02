@extends( 'public.layout' )
	@section("class")historia
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
							{{ Helper::twitterShare( 'La Fundación - Historia', Request::url(), '' ) }}
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
							<li class="activo">{{ HTML::link( '/historia', 'HISTORIA', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/aportaciones', 'APORTACIONES', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/membresias', 'MEMBRESÍAS U ORGANISMOS', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/consideraciones', 'CONSIDERACIONES FISCALES', [ 'class' => 'animsition-link' ]) }}</li>
						</ul>
					</nav>
				</div>
				<div class="txt_fundacion2">
					<div id="titulo_fca">
						<h1>HISTORIA</h1>
					</div>
					<p>En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa, y con el pleno consentimiento de sus hijos, quienes con la nobleza de sentimientos que les caracteriza estuvieron totalmente de acuerdo con la misma.</p>
				</div>
				<img src="{{ asset( 'images/imagen_historia.jpg' ) }}" alt="" class="fr">
				<div class="txt_fundacion li">
					<p>Conoce los hechos que forman parte de nuestra labor a través de los años así como los objetivos cumplidos a lo largo de nuestra historia.</p>
				</div>
				<div id="contenedor_btn" >
					<button onclick="location.href='{{ URL::to( 'muro-exito') }}';">Ver muro del éxito</button>
				</div>
				<div class="adorno_fa">
 					<img src="images/adorno_fa.png" alt="">
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