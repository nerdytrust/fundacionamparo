@extends( 'public.layout' )
	@section("class")deporte
	@stop
	@section("content")
		<section id="Contenedor">
			<section class="mask_head back_img6" >
				<div class="txt_mask">
					<img src="{{ asset( 'images/logo_mask_header.jpg' ) }}" alt="">
					<h1>FUNDACIÓN AMPARO</h1>
					<h3>Impulso al desarrollo y la sana competencia</h3>
					<nav class="social_mask">
						<ul>
							{{ Helper::facebookShare( '', Request::url(), '' ) }}
							{{ Helper::twitterShare( 'La Fundación - Deporte', Request::url(), '' ) }}
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
						<h1>DEPORTE</h1>
					</div>
					<p>Con la convicción de que el deporte puede ser utilizado como medio para encontrar soluciones a diversos problemas, la Fundación otorgó importantes aportaciones para apoyar el desarrollo deportivo en el Estado de Puebla, así como para la creación de Pro-excelencia al Deporte A. C., institución que, buscando la excelencia en el deporte, intentaba descubrir y apoyar a competidores mexicanos de alto rendimiento en nuestro país.</p>
					<br/>
					<h3>Beneficiarios</h3>
					
					<ul class="ben">
						<li>Fomento Deportivo del Estado de Puebla</li>
						<li>Pro-excelencia al Deporte</li>
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
 							{{ Helper::facebookShare( '', Request::url(), '' ) }}
							{{ Helper::twitterShare( '¡TÚ PUEDES AYUDAR! Tus donaciones hacen posible que esto continúe, pasa la voz', Request::url(), 'TomandoAcciónFA' ) }}
 						</ul>
 					</div>
 				</div>
			</section>
		</section>
	@stop
@stop