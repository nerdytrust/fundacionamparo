<?php  
	$share_fb  = [ 
		'title'       => 'CONTACTO FUNDACIÓN AMPARO - Contáctanos para cualquier duda o sugerencia', 
		'description' => 'Lunes a miércoles 10:00 a 18:00 horas
							Sábados de 10:00 a 21:00 horas

							2 Sur 708, Centro Histórico, 
							Puebla, Pue. México. 
							C. P. 72000 
							T. + (222) 229 38 50
							info@fundacionamparo.com',
		'image'       => asset( 'images/favicon-152.png' )
	];
?>
@extends( 'public.layout' )
	@section( 'class' )contacto-view
	@stop
	@section( 'content' )
		<section id="Contenedor">
			<section class="mask_head back_img12" >
				<div class="txt_mask">
					<img src="{{ asset( 'images/logo_mask_header.jpg' ) }}" alt="">
					<h1>Contacto</h1>
					<h3>Contáctanos para cualquier duda o sugerencia</h3>
					<nav class="social_mask">
						<ul>
							{{ Helper::facebookShare( '', Request::url(), '' ) }}
							{{ Helper::twitterShare( 'Contacto', Request::url(), '' ) }}
							{{-- <a href=""><li class="fa fa-heart"></li></a>
							<p>96 likes</p> --}}
						</ul>
					</nav>
				</div>
			</section>
			<section id="contenedor_int">
				<div class="text-contact">
					<label class="contact" for="" id="fre">
						{{ Form::open( [ 'url' => 'formulario-contacto', 'id' => 'formulario_contacto', 'method' => 'POST', 'autocomplete' => 'off', 'role' => 'form' ] ) }}
							<h1>Comunícate con nosotros</h1>
							<h2>Escríbenos si tienes alguna duda, en breve un asesor se pondrá en contacto contigo.</h2>
							<div class="alert alert-danger" role="alert" id="messages"></div>
							<span>
								{{ Form::text( 'nombre', Input::old( 'nombre' ), [ 'id' => 'inpt_nombre', 'placeholder' => 'Nombre', 'required' => true, 'maxlenght' => 120 ] ) }}
							</span>
							<span>
								{{ Form::text( 'telefono', Input::old( 'telefono' ), [ 'id' => 'inpt_telefono', 'placeholder' => 'Teléfono', 'required' => true, 'maxlenght' => 10 ] ) }}
							</span>
							<span>
								@if ( Auth::customer()->check() )
									{{ Form::text( 'email', Helper::getEmail(), [ 'required' => true, 'maxlength' => 140 ] ) }}
								@else
									{{ Form::text( 'email', Input::old( 'email' ), [ 'id' => 'inpt_email', 'placeholder' => 'Correo electrónico', 'required' => true, 'maxlength' => 140 ] ) }}
								@endif
							</span>
							<span>
								{{ Form::textarea( 'mensaje', Input::old( 'mensaje' ), [ 'id' => 'inpt_mensaje', 'placeholder' => 'Mensaje', 'rows' => 4, 'cols' => 50 ] ) }}
							</span>
							<div class="check-gris">
								{{ Form::checkbox( 'terminos', 1, false, [ 'id' => 'check-verde' ] ) }}
								<label for="check-verde"></label>
								<a class="terminos" href="{{ URL::to( 'politicas-de-privacidad' ) }}" target="_blank">Acepto y he leído el aviso de privacidad</a>
							</div>
							<button type="submit">Enviar</button> <p>Campos obligarotios para enviar formulario</p>
						{{ Form::close() }}
					</label>
					<div class="contact-inf rt2">
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