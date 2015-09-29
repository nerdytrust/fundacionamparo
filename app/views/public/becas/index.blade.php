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
						<li class="activo">{{ HTML::link( '/becas', 'APLICA PARA UNA BECA', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/becas-bases', 'BASES', [ 'class' => 'animsition-link' ] ) }}</li>							
							<li>{{ HTML::link( '/becas-otorgadas', 'BECAS OTORGADAS  2015', [ 'class' => 'animsition-link' ] ) }}</li>
						</ul>
					</nav>
				</div>
				<div class="text-contact">
					<label class="contact becas" for="">
						{{ Form::open( [ 'url' => 'solicitar-beca', 'id' => 'form_solicitud_beca', 'method' => 'POST', 'autocomplete' => 'off', 'role' => 'form' ] ) }}
							<div class="alert alert-danger" role="alert" id="messages"></div>
							<h1>APLICA PARA UNA BECA</h1>
							<h2>
								La Fundación Amparo puede ayudarte a obtener una beca para que estudies en México o en el Extranjero
							</h2>
							<ul class="pasos">
								<li class="donde-quieres">
									<div class="n-vol bec">
										<img src="{{ asset( 'images/icon_donadores-bec.png' ) }}" alt="">
										<span>{{ $becas_totales }}</span>
										<span>BECAS OTORGADAS</span>
									</div>
									<h1>Paso 1</h1>
									<h2>beca</h2>
									<h3>Selecciona el lugar en donde deseas estudiar</h3>
									<span>
										Dónde quieres estudiar
										<select name="lugar_estudios" id="beca_lugar_estudiar">
											<option value="0">Selecciona una opción</option>
											<option value="1">Extranjero</option>
											<option value="2">México</option>
										</select>
									</span>
								</li>
								<li class="dropdown-dinamico" id="beca_lugar"></li>
								<li class="beca-steps">
									<h1>Paso 2</h1>
									<h2>datos generales</h2>
									<h3>Ingresa tus datos completos para validar el registro</h3>
									{{ Form::text( 'nombre', Input::old( 'nombre' ), [ 'id' => 'inpt_nombre', 'placeholder' => 'Nombre(s)', 'required' => true, 'maxlenght' => '150' ] ) }}
									{{ Form::text( 'apellido', Input::old( 'apellido' ), [ 'id' => 'inpt_apellido', 'placeholder' => 'Apellidos', 'required' => true, 'maxlength' => '150' ] ) }}
									{{ Form::email( 'email', Input::old( 'email'), [ 'id' => 'inpt_email', 'placeholder' => 'Correo electrónico', 'required' => true ] ) }}
									{{ Form::text( 'telefono', Input::old( 'telefono' ), [ 'id' => 'inpt_telefono', 'placeholder' => 'Teléfono', 'required' => true, 'maxlength' => '10' ] ) }}
									<div class="f3">
										Fecha de Nacimiento<br/>
										{{ Form::selectRange( 'birth_day', 1, 31, Helper::getValidDay(),['class'=>'select-day'] ) }}
										{{  Form::select('birth_month', array('1' => 'Enero', 
																	   '2' => 'Febrero',
																	   '3' => 'Marzo',
																	   '4' => 'Abril',
																	   '5' => 'Mayo',
																	   '6' => 'Junio',
																	   '7' => 'Julio',
																	   '8' => 'Agosto',
																	   '9' => 'Septiembre',
																	   '10' => 'Octubre',
																	   '11' => 'Noviembre',
																	   '12' => 'Diciembre'),
														  Helper::getValidMonth(), 
														  ['class'=>'select-month']); }}
										{{ Form::selectYear( 'birth_year', Helper::getValidYear(), 1940 ) }}
									</div>
									<div class="check">
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
									<h2>¿Por Qué necesitas beca?</h2>
									<h3>Ingresa tus datos escolares</h3>
									<span class="form-control-container">
										Escuela en la que deseas estudiar<br/>
										{{ Form::text( 'escuela', Input::old( 'escuela' ), [ 'placeholder' => 'Escuela, Universidad, Instituto', 'id' => 'inpt_escuela', 'required' => true, 'maxlenght' => '200' ] ) }}
									</span>
									<div class="check schedule-form">
										Horario<br/>
										{{ Form::radio( 'turno', 1, true, [ 'id' => 'mat' ] ) }}
										<label for="mat"></label>
										<span class="label-fake">Matutino</span>
										{{ Form::radio( 'turno', 2, false, [ 'id' => 'ves' ] ) }}
										<label for="ves"></label>
										<span class="label-fake">Vespertino</span>
									</div>
									<span>
										Promedio<br/>
										<div>
											{{ Form::select( 'promedio', [ 
												'10.0' => '10.0', '9.9' => '9.9', '9.8' => '9.8', '9.7' => '9.7',
												'9.6' => '9.6', '9.5' => '9.5', '9.4' => '9.4', '9.3' => '9.3',
												'9.2' => '9.2', '9.1' => '9.1', '9.0' => '9.0', '8.9' => '8.9',
												'8.8' => '8.8', '8.7' => '8.7', '8.6' => '8.6', '8.5' => '8.5',
												'Menor a 8.5' => 'Menor a 8.5'
											], 'Menor a 8.5', [ 'id' => 'promedio' ] ) }}
										</div>
									</span>
									<h3>Coméntanos el por qué necesitas una beca</h3>
									{{ Form::textarea( 'motivo', Input::old( 'motivo' ), [ 'cols' => '30', 'rows' => '10', 'maxlength' => '400' ] ) }}
									<div class="check-gris">
										{{ Form::checkbox( 'terminos', 1, false, [ 'id' => 'check-verde' ] ) }}
										<label for="check-verde"></label>
										<a class="terminos" href="{{ URL::to( 'politicas-de-privacidad' ) }}" target="_blank">Acepto y he leído el aviso de privacidad</a>
									</div>
								</li>
								<button class="str" type="submit">Aceptar</button>
								<button class="str" type="reset">Cancelar</button>
								<span class="neces">Es necesario completar el formulario para hacerlo válido</span>
							</ul>
						{{ Form::close() }}
					</label>
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