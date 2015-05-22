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
							{{ $helper->facebookShare( '', Request::url(), '' ) }}
							{{ $helper->twitterShare( 'Contacto', Request::url(), '' ) }}
							{{-- <a href=""><li class="fa fa-heart"></li></a>
							<p>96 likes</p> --}}
						</ul>
					</nav>
				</div>
			</section>
			<section id="contenedor_int">
				<div class="text-contact">
					<label class="contact" for="" id="fre">
						{{ Form::open( [ 'url' => 'formulario-contacto', 'method' => 'POST', 'autocomplete' => 'off' ] ) }}
							<h1>Comunícate con nosotros</h1>
							<h2>Escríbenos si tienes alguna duda, en breve un asesor se pondrá en contacto contigo.</h2>
							{{ $errors->first( 'nombre', '<div class="alert alert-danger" role="alert">:message</div>') }}
							<span>
								{{ Form::text( 'nombre', '', [ 'placeholder' => 'Nombre', 'required' => true, 'maxlenght' => 120 ], Input::old( 'nombre' ) ) }}
							</span>
							{{ $errors->first( 'telefono', '<div class="alert alert-danger" role="alert">:message</div>') }}
							<span>
								{{ Form::text( 'telefono', '', [ 'placeholder' => 'Teléfono', 'required' => true, 'maxlenght' => 10 ], Input::old( 'telefono' ) ) }}
							</span>
							{{ $errors->first( 'email', '<div class="alert alert-danger" role="alert">:message</div>') }}
							<span>
								{{ Form::text( 'email', '', [ 'placeholder' => 'Correo electrónico', 'required' => true, 'maxlength' => 140 ], Input::old( 'email' ) ) }}
							</span>
							{{ $errors->first( 'mensaje', '<div class="alert alert-danger" role="alert">:message</div>') }}
							<span>
								{{ Form::textarea( 'mensaje', '', [ 'placeholder' => 'Mensaje', 'rows' => 4, 'cols' => 50 ], Input::old( 'mensaje' ) ) }}
							</span>
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
 							{{ $helper->facebookShare( '', Request::url(), '' ) }}
							{{ $helper->twitterShare( 'Contacto', Request::url(), 'TomandoAcciónFA' ) }}
 						</ul>
 					</div>
 				</div>
			</section>
		</section>
	@stop
@stop