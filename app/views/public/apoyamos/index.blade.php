<?php	
	$share_fb  = [ 
		'title'       => 'APOYAMOS TU CAUSA - Fundación Amparo apoya causas externas',
		'description' => 'Comunícate con nosotros
						  Llena el siguiente formulario, una vez revisado nos pondremos en contacto para darte
						  una respuesta',
		'image'       => asset( 'images/favicon-152.png')
	];
?>
@extends( 'public.layout' )
	@section( 'class' )apoyamos-tu-causa
	@stop
	@section( 'content' )
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
							<li class="activo">{{ HTML::link( '/apoyamos-tu-causa', 'APLICA PARA OBTENER APOYO', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/apoyamos-tu-causa-bases', 'BASES', [ 'class' => 'animsition-link' ] ) }}</li>							
							<li>{{ HTML::link( '/apoyamos-tu-causa-apoyadas', 'CAUSAS APOYADAS '.date('Y'), [ 'class' => 'animsition-link' ] ) }}</li>
						</ul>
					</nav>
				</div>
				<div class="text-contact">
					<label class="contact" for="">
						{{ Form::open( [ 'url' => 'registrar-tu-causa', 'id' => 'form_apoyamos_causa', 'method' => 'POST', 'autocomplete' => 'off' ] ) }}
							<h1>Comunícate con nosotros</h1>
							<h2>
								Llena el siguiente formulario, una vez revisado nos pondremos en contacto para darte una respuesta
							</h2>
							<div class="alert alert-danger" role="alert" id="messages"></div>
							{{ $errors->first( 'nombre', '<div class="alert alert-danger" role="alert">:message</div>') }}
							<span>
								{{ Form::text( 'nombre', '', [ 'placeholder' => 'Nombre', 'required' => true, 'maxlenght' => 120 ], Input::old( 'nombre' ) )}}
							</span>
							{{ $errors->first( 'telefono', '<div class="alert alert-danger" role="alert">:message</div>') }}
							<span>
								{{ Form::text( 'telefono', '', [ 'placeholder' => 'Teléfono', 'required' => true, 'maxlenght' => 10 ], Input::old( 'telefono' ) ) }}
							</span>
							{{ $errors->first( 'email', '<div class="alert alert-danger" role="alert">:message</div>') }}
							<span>
								{{ Form::email( 'email', '', [ 'placeholder' => 'Correo electrónico', 'required' => true ], Input::old( 'mail' ) ) }}
							</span>
							{{ $errors->first( 'causa_tipo', '<div class="alert alert-danger" role="alert">:message</div>') }}
							<span>
								<h4 class="gt">Tipo de causa</h4>
								<select name="causa_tipo" id="" required>
									<option value="">Selecciona</option>
									@if ( isset( $categorias ) )
										@foreach ( $categorias as $categoria )
											<option value="{{ $categoria->id_categorias }}">{{ $categoria->nombre }}</option>
										@endforeach
									@endif
								</select>
						    </span>
						    {{ $errors->first( 'descripcion', '<div class="alert alert-danger" role="alert">:message</div>') }}
							<span>
								{{ Form::textarea( 'descripcion', '', [ 'placeholder' => 'Describe tu causa', 'rows' => 4, 'cols' => 50 ], Input::old( 'descripcion' ) ) }}
							</span>
							<div class="check-gris">
								{{ Form::checkbox( 'terminos', 1, false, [ 'id' => 'check-verde' ] ) }}
								<label for="check-verde"></label>
								<a class="terminos" href="{{ URL::to( 'politicas-de-privacidad' ) }}" target="_blank">Acepto y he leído el aviso de privacidad</a>
							</div>
							<button type="submit">Enviar</button>
							<p>Campos obligarotios para enviar formulario</p>
						{{ Form::close() }}
					</label>
					<div class="contact-inf rt">
						<b>T. + (222) 229 38 50<br/>info@fundacionamparo.com</b>
						<br/>
						<p>
							<b>Lunes a miércoles 10:00 a 18:00 horas<br/>
							Sábados de 10:00 a 21:00 horas</b><br/>

							2 Sur 708, Centro Histórico, <br/>
							Puebla, Pue. México. <br/>
							C. P. 72000 <br/>
							{{-- <div id="txt_evento">
								<nav class="red-cont">
									<ul>
										<a href=""><li class="fa fa-facebook"></li></a>
										<a href=""><li class="fa fa-twitter"></li></a>
										<a href=""><li class="fa fa-heart"></li></a>
										<p>96 likes</p>
									</ul>
								</nav>
							</div> --}}
						</p>
					</div>
				</div><!--termina txt_fundacion2-->
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