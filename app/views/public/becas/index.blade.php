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
							<a href=""><li class="fa fa-facebook"></li></a>
							<a href=""><li class="fa fa-twitter"></li></a>
							{{-- <a href=""><li class="fa fa-heart"></li></a>
							<p>96 likes</p> --}}
						</ul>
					</nav>
				</div>
			</section>
			<section id="contenedor_int">
				<div class="text-contact">
					<label class="contact becas" for="">
						<form action="">
							<h1>SOLICITUD DE BECAS</h1>
							<h2>
								La Fundación Amparo puede ayudarte a obtener una beca para que estudies en México o en el Extranjero<br/>
								<b>El único requisito es que vivas en el estado de Puebla</b>
							</h2>
							<ul class="pasos">
								<li>
									<div class="n-vol bec">
										<img src="{{ asset( 'images/icon_donadores-bec.png' ) }}" alt="">
										<span>49,863</span>
										<span>BECAS OTORGADAS</span>
									</div>
									<h1>Paso 1</h1>
									<h2>beca</h2>
									<h3>Selecciona el lugar en donde deseas estudiar</h3>
									<span>
										Dónde quieres estudiar
										<select name="" id="">
											<option value="">Extranjero</option>
											<option value=""></option>
											<option value=""></option>
										</select>
									</span>
									<span>
										País<br/>
										<select name="" id="">
											<option value="">Canadá</option>
											<option value=""></option>
											<option value=""></option>
										</select>
									</span>
									<span>
										Ciudad<br/>
										<select name="" id="">
											<option value="">Toront, Ontario</option>
											<option value=""></option>
											<option value=""></option>
										</select>
									</span>
								</li>
								<li>
									<h1>Paso 2</h1>
									<h2>datos generales</h2>
									<h3>Ingresa tus datos completos para validar el registro</h3>
									<input type="text" name="nombre" maxlenght="10" placeholder="Nombre(s)" required>
									<input type="text" name="apellido" maxlenght="10" placeholder="Apellidos" required>
									<input type="email" name="mail" autocomplete="off" placeholder="Correo electrónico" required>
									<input type="text" name="telefono" maxlenght="10" placeholder="Teléfono" required>
									<div class="f3">
										Fecha de Nacimiento<br/>
										<select name="" id="" required>
											<option value="">Día</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
											<option value="">4</option>
										</select>
										<select name="" id="" required>
											<option value="">Mes</option>
											<option value="">Enero</option>
											<option value="">Febrero</option>
											<option value="">Marzo</option>
										</select>
										<select name="" id="" required>
											<option value="">Año</option>
											<option value="">1997</option>
											<option value="">1996</option>
											<option value="">1995</option>
										</select>
									</div>
									<div class="check">
										Sexo <br/>								
										<input type="radio" name="sexo" value="fem" id="fem" required checked>
										<label for="fem"></label>
										<span class="label-fake">Femenino</span>
										<input type="radio" name="sexo" value="mas" id="mas" required>
										<label for="mas"></label>
										<span class="label-fake">Masculino</span>
									</div>
								</li>
								<li>
									<h1>Paso 3</h1>
									<h2>¿Por Qué necesitas beca?</h2>
									<h3>Ingresa tus datos escolares</h3>
									<span>
										Escuela en la que deseas estudiar<br/>
										<input type="text" name="escuela" placeholder="Escuela, Universidad, Instituto" required>
									</span>
									<div class="check schedule-form">
										Horario<br/>									
										<input type="radio" name="horario" id="mat" value="mat" required checked>
										<label for="mat"></label>
										<span class="label-fake">Matutino</span>
										<input type="radio" name="horario" value="ves" required id="ves">
										<label for="ves"></label>
										<span class="label-fake">Vespertino</span>
									</div>
									<span>
										Promedio<br/>
										<div>
											<select name="" id="promedio" required>
												<option value="">Promedio</option>
												<option value="">10</option>
												<option value="">9.8</option>
												<option value="">9.6</option>
											</select>
										</div>
									</span>
									<h3>Coméntanos el por qué necesitas una beca</h3>
									<textarea name="" id="" cols="30" rows="10" maxlenght="150"></textarea>
									<div class="check-gris">
										<input type="checkbox" value="None" id="check-verde" name="check">
										<label for="check-verde"></label>
										Acepto términos y condiciones
									</div>
								</li>
								<button class="str">Aceptar</button>
								<button class="str">Cancelar</button>
								<span class="neces">Es necesario completar el formulario para hacerlo válido</span>
							</ul>
						</form>
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
 							<a href=""><li class="fa fa-facebook"></li></a>
 							<a href=""><li class="fa fa-twitter"></li></a>
 						</ul>
 					</div>
 				</div>
			</section>
		</section>
	@stop
@stop