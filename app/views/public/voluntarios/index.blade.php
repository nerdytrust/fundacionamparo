@extends( 'public.layout' )
	@section("class")voluntarios
	@stop
	@section( 'content' )
		<section id="Contenedor">
			<section class="mask_head back_img15" >
				<div class="txt_mask">
					<img src="images/logo_mask_header.jpg" alt="">
					<h1>VOLUNTARIOS</h1>
					<h3>Círculo de voluntarios tomando acción</h3>
					<nav class="social_mask">
						<ul>
							{{ Helper::facebookShare( '', Request::url(), '' ) }}
							{{ Helper::twitterShare( 'Voluntarios', Request::url(), '' ) }}
							{{-- <a href=""><li class="fa fa-heart"></li></a>
							<p>96 likes</p> --}}
						</ul>
					</nav>
				</div>
			</section>
			<section id="contenedor_int">
				<div class="text-contact">
					<label class="contact becas" id="vol" for="">
						{{ Form::open( [ 'url' => 'nuevo-voluntario-completo', 'id' => 'form_voluntario_full', 'method' => 'POST', 'role' => 'form', 'autocomplete' => 'off' ] ) }}
							<div class="alert alert-danger" role="alert" id="messages"></div>
							<h1>ÚNETE A NOSOTROS</h1>
							<h2>Tu apoyo hace posible continuar con nuestra causa, pasa la voz</h2>
							<ul class="pasos">
								<li>
									<div class="n-vol">
										<img src="{{ asset( 'images/icon_donadores-vol.png' ) }}" alt="">
										<span>{{ $voluntarios }}</span>
										<span>VOLUNTARIOS</span>
									</div>
									<h1>Paso 1</h1>
									<h2>apoyo</h2>
									<h3>Selecciona la ciudad y el proyecto que deseas apoyar</h3>
									<span>
										Estado en el que vives
										<select name="estado" id="beca_estado">
											<option value="">Selecciona un Estado</option>
											@foreach ( $estados as $estado )
												<option value="{{ $estado->id_estados }}">{{ $estado->name }}</option>
											@endforeach
										</select>
									</span>
									<span>
										Ciudad en la que vives
										<select name="ciudad" id="beca_ciudad">
											<option value="">Selecciona una Ciudad</option>
										</select>
									</span>
									<span>
										Causa que deseas apoyar
										<select name="causa" id="voluntario_causa">
											<option value="">Selecciona una Causa</option>
											@foreach ( $causas as $causa )
												<option value="{{ $causa->id_causas }}">{{ $causa->titulo }}</option>
											@endforeach
										</select>
									</span>
								</li>
								<li class="beca-steps">
									<h1>Paso 2</h1>
									<h2>datos generales</h2>
									<h3>Ingresa tus datos completos para validar el registro</h3>
									{{ Form::text( 'nombre', Input::old( 'nombre' ), [ 'required' => true, 'maxlenght' => '180', 'placeholder' => 'Nombre(s)' ] ) }}
									{{ Form::text( 'apellidos', Input::old( 'apellidos' ), [ 'required' => true, 'placeholder' => 'Apellidos', 'maxlength' => '180' ] ) }}
									{{ Form::email( 'email', Input::old( 'email' ), [ 'placeholder' => 'Correo electrónico', 'required' => true ] ) }}
									{{ Form::text( 'telefono', Input::old( 'telefono' ), [ 'placeholder' => 'Teléfono', 'required' => true, 'maxlength' => '10' ] ) }}
									<div class="f3">
										Fecha de Nacimiento<br/>
										{{ Form::selectRange( 'birth_day', 1, 31, Helper::getValidDay() ) }}
										{{ Form::selectMonth( 'birth_month', Helper::getValidMonth() ) }}
										{{ Form::selectYear( 'birth_year', Helper::getValidYear(15), 1940 ) }}
									</div>
									<div class="check c2">
										Sexo <br/>
										{{ Form::radio( 'sexo', 1, true, [ 'id' => 'fem' ] ) }}
										<label for="fem"></label>
										<span class="label-fake">Femenino</span>
										{{ Form::radio( 'sexo', 2, false, [ 'id' => 'mas' ] ) }}
										<label for="mas"></label>
										<span class="label-fake">Masculino</span>
									</div>
								</li>
								<li class="beca-steps">
									<h1>Paso 3</h1>
									<h2>disponibilidad</h2>
									<h3>Haznos saber tus tiempos</h3>
									<span>
										Periodo en el que puedes ayudar<br/>
										<select name="periodo" id="" class="period">
											<option value="">Selecciona un periodo</option>
											@foreach ( $periodos as $periodo )
												<option value="{{ $periodo->id_periodos }}">{{ $periodo->name }}</option>
											@endforeach
										</select>
									</span>
									<div class="check c2 schedule-form">
										Horario<br/>
										{{ Form::radio( 'turno', 1, true, [ 'id' => 'mat' ] ) }}
										<label for="mat"></label>
										<span class="label-fake">
											Matutino
										</span>
										{{ Form::radio( 'turno', 2, false, [ 'id' => 'ves' ] ) }}
										<label for="ves"></label>
										<span class="label-fake">
											Vespertino
										</span>
									</div>
									<span>
										<br>
										<select name="tipo_estudiante" id="" class="period od">
											<option value="">Selecciona una opción</option>
											@foreach ( $estudiantes as $estudiante )
												<option value="{{ $estudiante->id_tipo_estudiantes}}">{{ $estudiante->name }}</option>
											@endforeach
										</select>
									</span>
									<div class="check-gris terms-condions">
										{{ Form::checkbox( 'terminos', 1, false, [ 'id' => 'check-verde' ] ) }}
										<label for="check-verde"></label>
										<a href="{{ URL::to( 'politicas-de-privacidad' ) }}" target="_blank" >Acepto y he leído el aviso de privacidad</a>
									</div>
								</li>
								<button>Aceptar</button>
								<button>Cancelar</button>
								<span class="neces">Es necesario completar el formulario para hacerlo válido</span>
							</ul>							
						{{ Form::close() }}
					</label>
				</div><!--termina text-contact-->
				<div class="adorno_fa">
 					<img src="{{ asset( 'images/adorno_fa.png' ) }}" alt="">
 				</div>
 				<div class="txt_footer">
 					<h1>¡Tú puedes ayudar!</h1>
 					<h2>Tus donaciones hacen posible que esto continúe, pasa la voz <span>#TomandoAcciónFA</span></h2>
 					<div id="social_footer">
 						<ul>
 							{{ Helper::facebookShare( '', Request::url(), '' ) }}
							{{ Helper::twitterShare( 'Voluntarios', Request::url(), 'TomandoAcciónFA' ) }}
 						</ul>
 					</div>
 				</div>
			</section>
		</section>
	@stop
@stop
