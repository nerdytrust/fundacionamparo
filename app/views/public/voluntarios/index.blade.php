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
							<a href=""><li class="fa fa-facebook"></li></a>
							<a href=""><li class="fa fa-twitter"></li></a>
							<a href=""><li class="fa fa-heart"></li></a>
							<p>96 likes</p>
						</ul>
					</nav>
				</div>
			</section>
			<section id="contenedor_int">
				<div class="text-contact">
					<label class="contact becas" id="vol" for="">
						<form action="">
						<h1>ÚNETE A NOSOTROS</h1>
						<h2>Tu apoyo hace posible continuar con nuestra causa, pasa la voz</h2>
						<ul class="pasos">
							<li>
								<div class="n-vol">
									<img src="{{ asset( 'images/icon_donadores-vol.png' ) }}" alt="">
									<span>49,863</span>
									<span>VOLUNTARIOS</span>
								</div>
								<h1>Paso 1</h1>
								<h2>apoyo</h2>
								<h3>Selecciona la ciudad y el proyecto que deseas apoyar</h3>
								<span>
									Ciudad en la que vives
									<select name="" id="">
										<option value="">Distrito Federal</option>
										<option value=""></option>
										<option value=""></option>
									</select>
								</span>
								<div class="check c2">
									<br/>
									<input type="radio" name="proyect" value="museo" id="museo" required checked>
									<label for="museo">Museo Amparo</label>			
									<input type="radio" name="proyect" value="pro" id="pro" required>
									<label for="pro">Proyecto Roberto Alonso Espinosa</label>
									<input type="radio" name="proyect" value="amb" id="amb" required>
									<label for="amb">Ambas</label>
								</div>
							</li>
							<li>
								<h1>Paso 2</h1>
								<h2>datos generales</h2>
								<h3>Ingresa tus datos completos para validar el registro</h3>
								<input type="text" name="nombre" maxlenght="10" placeholder="Nombre(s)" required>
								<input type="text" name="apellido" maxlenght="10" placeholder="Apellidos" required>
								<input type="email" name="mail" autocomplete="off" placeholder="Correo electrónico" required>
								<input type="number" name="telefono" maxlenght="10" placeholder="Teléfono" required>
								<div>Fecha de Nacimiento<br/>
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
								<div class="check c2">
									Sexo <br/>								
									<input type="radio" name="sexo" value="fem" id="fem" required checked>
									<label for="fem"></label>
									Femenino
									<input type="radio" name="sexo" value="mas" id="mas" required>
									<label for="mas"></label>
									Masculino
								</div>
							</li>
							<li>
								<h1>Paso 3</h1>
								<h2>disponibilidad</h2>
								<h3>Haznos saber tus tiempos</h3>
								<span>
									Periodo en el que puedes ayudar<br/>
									<select name="" id="" class="period">
										<option value="">Semanalmente</option>
										<option value="">Mensualmente</option>
										<option value="">Bimestral</option>
									</select>
								</span>
								<div class="check c2">
									Horario<br/>									
									<input type="radio" name="horario" id="mat" value="mat" required checked>
									<label for="mat"></label>
									Matutino
									<input type="radio" name="horario" value="ves" required id="ves">
									<label for="ves"></label>
									Vespertino
								</div>	
								<select name="" id="" class="period od">
									<option value="">Estudiante universitario</option>
									<option value="">Estudiante universitario</option>
									<option value="">Estudiante universitario</option>
								</select>
								<div class="check-gris">
									<input type="checkbox" value="None" id="check-verde" name="check">
									<label for="check-verde"></label>
									Acepto términos y condiciones
								</div>
							</li>
							<button>Aceptar</button>
							<button>Cancelar</button>
							<span class="neces">Es necesario completar el formulario para hacerlo válido</span>
						</ul>							
						</form>
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
 							<a href=""><li class="fa fa-facebook"></li></a>
 							<a href=""><li class="fa fa-twitter"></li></a>
 						</ul>
 					</div>
 				</div>
			</section>
		</section>
	@stop
@stop
