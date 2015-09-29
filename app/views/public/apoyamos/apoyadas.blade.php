@extends("public.layout")
	@section("class")becas
	@stop

	@section("content")
		<section id="Contenedor">
			<section class="mask_head back_img14" >
				<div class="txt_mask">
					<img src="{{ asset( 'images/logo_mask_header.jpg' ) }}" alt="">
					<h1>BECAS</h1>
					<h3>¿Cómo solicitar una beca?</h3>
					<nav class="social_mask">
						<ul>
							{{ Helper::facebookShare( '', Request::url(), '' ) }}
							{{ Helper::twitterShare( 'Becas', Request::url(), '' ) }}
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
							<li>{{ HTML::link( '/apoyamos-tu-causa-bases', 'BASES', [ 'class' => 'animsition-link' ] ) }}</li>							
							<li class="activo">{{ HTML::link( '/apoyamos-tu-causa-apoyadas', 'CAUSAS APOYADAS 2015', [ 'class' => 'animsition-link' ] ) }}</li>
						</ul>
					</nav>
				</div>
				<div class="text-contact">
					<label class="contact becas" for="">

							<h1>BECAS OTORGADAS 2015</h1>
							<h2>
								La Fundación Amparo puede ayudarte a obtener una beca para que estudies en México o en el Extranjero
							</h2>
							
					</label>
					<section id="becas_otor">
						<ul class="list_amp">
						
			 			</ul>
	 				</section>
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
							{{ Helper::twitterShare( 'Becas', Request::url(), 'TomandoAcciónFA' ) }}
 						</ul>
 					</div>
 				</div>
			</section>
		</section>
	@stop
@stop