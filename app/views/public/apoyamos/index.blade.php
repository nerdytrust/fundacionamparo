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
					<label class="contact" for="">
						<form action="">
							<h1>Comunícate con nosotros</h1>
							<h2>
								Llena el siguiente formulario, una vez revisado nos pondremos en contacto para darte una respuesta
							</h2>
							<span><input type="text" name="nombre" maxlenght="10" placeholder="Nombre" required></span>
							<input type="text" name="telefono" maxlenght="10" placeholder="Teléfono" required>
							<span><input type="email" name="mail" autocomplete="off" placeholder="Correo electrónico" required></span>						
							<span>
								<h4 class="gt">Tipo de causa</h4>
								<select name="" id="" required>
									<option value="">Rehabilitación</option>
									<option value="">Rehabilitación</option>
									<option value="">Rehabilitación</option>
								</select>
						    </span>
							<span><textarea rows="4" cols="50" placeholder="Describe tu causa"></textarea></span>
							<button>Enviar</button>
							<p>Campos obligarotios para enviar formulario</p>
						</form>
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
							<div id="txt_evento">
								<nav class="red-cont">
									<ul>
										<a href=""><li class="fa fa-facebook"></li></a>
										<a href=""><li class="fa fa-twitter"></li></a>
										<a href=""><li class="fa fa-heart"></li></a>
										<p>96 likes</p>
									</ul>
								</nav>
							</div>
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
 							<a href=""><li class="fa fa-facebook"></li></a>
 							<a href=""><li class="fa fa-twitter"></li></a>
 						</ul>
 					</div>
 				</div>
			</section>
		</section>
	@stop
@stop