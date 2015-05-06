@extends("public.layout")
	@section("class")home
	@stop
	@section("content")
		<section id="Contenedor">
			<div class="re">
				<article id="titulo_txt" class="" onclick="location.href='{{ URL::to( '/fundacion' ) }}';">
					<h1>Conoce Fundación Amparo</h1>
					<h2>#TomandoAcciónFA</h2>
					<p>Promover y apoyar actos de beneficio a la población de México</p>
					<h3><a href="#">MÁS INFORMACIÓN <span>+</span></a></h3>
					<div id="titulo_img">
						<img src="{{ asset( 'images/amparo.png' ) }}" alt="">
					</div>
				</article>
				<div class="vi ">
					<video controls loop preload="auto" poster="{{ asset( 'images/video_int_historia.png' ) }}" class="video-js vjs-default-skin" data-setup="{}">
						<!--<source src="{{ asset( 'video/video.ogv' ) }}" type='video/ogg; codecs="theora, vorbis"'/>
						<source src="{{ asset( 'video/video.webm' ) }}" type='video/webm' >-->
						<source src="{{ asset( 'video/video.mp4' ) }}" type='video/mp4'>
						<p>El video no es visible!, tu navegador no soporta video en HTML5</p>
					</video>
				</div>
				<aside class="btns">
					<article id="btn_twitter" class="">
						<ul>
							<li class="fa fa-twitter"></li>
						</ul>
					</article>
					<article id="btn_facebook" class="">
						<ul>
							<li class="fa fa-facebook"></li>
						</ul>
					</article>
					<article id="btn_donar2" class="">
						DONAR
					</article>
					<article class="caja_1" onclick="location.href='{{ URL::to('/becas') }}';">
						<img src="{{ asset( 'images/becas_amparo.jpg' ) }}" alt="">
						<section  class="txt">
						<h1>BECAS</h1>
						<p>Aplica para obtener una beca de estudios</p>
						</section>
					</article>
				</aside>
			</div>

			<!-- CAUSAS -->
				<div id="pleca_causas" class="">
					<h1>CAUSAS</h1>
		 		</div>
		 		<div class="re">
			 		<article id="donacion_wrap" class="caja_2 ">
			 			<img src="{{ asset( 'images/img_01.jpg' ) }}" alt="">
			 			<section id="social_top">
							<ul>
								<a href="{{ URL::to( 'http://facebook.com' ) }}" target="_blank"><li class="fa fa-facebook"></li></a>
								<a href="{{ URL::to( 'http://twitter.com' ) }}" target="_blank"><li class="fa fa-twitter"></li></a>
								<a href="{{ URL::to( '/' ) }}"><li class="fa fa-heart"></li></a>
								<p>96 likes</p>
							</ul>
							<div id="donativo">HAZ TU DONACIÓN</div>
						</section>
						<section class="txt_int">
							<h1>CENTROS COMUNITARIOS</h1>
							<h2>Roberto Alonso Espinosa</h2>
							<p >Apoya para generar oportunidades de educación para niños de escasos recursos, involucrando a su familia y comunidad</p>
							<a href=""><h3>MÁS INFORMACIÓN<span class="colorin">+</span></h3></a>
							<div id="meta">
								<div id="barra">
									<progress value="0" max="100">
										<div class="progress-bar">
									        <span style="width: 60%;">-</span>
									    </div>
									</progress>
								</div>
							<div id="cantidad">
								<h1>META</h1>
								<h2>$193,000<span>MXN</span></h2>
							</div>
								<p>102,548 MXN <span>RECAUDADOS</span></p>
								<p>26 <span>DÍAS RESTANTES</span></p>
							</div>
						</section>
						<span class="esquina"></span>
			 		</article>
			 		<article class="caja_2 ">
			 			<img src="{{ asset( 'images/img_02.jpg' ) }}" alt="">
			 			<section id="social_top">
							<ul>
								<a href="{{ URL::to( 'http://facebook.com' ) }}" target="_blank"><li class="fa fa-facebook"></li></a>
								<a href="{{ URL::to( 'http://twitter.com' ) }}" target="_blank"><li class="fa fa-twitter"></li></a>
								<a href="{{ URL::to( '/' ) }}"><li class="fa fa-heart"></li></a>
								<p>96 likes</p>
							</ul>
							<div id="donativo">HAZ TU DONACIÓN</div>
						</section>
			 			<section class="txt_int">
			 				<h1>CULTURA</h1>
			 				<h2>MUSEO AMPARO</h2>
			 				<p >Apoya para generar oportunidades de educación para niños de escasos recursos, involucrando a su familia y comunidad</p>
							<a href=""><h3>MÁS INFORMACIÓN<span class="colorin">+</span></h3></a>
							<div id="meta">
								<div id="barra">
									<progress value="0" max="100">
										<div class="progress-bar">
									        <span style="width: 60%;">-</span>
									    </div>
									</progress>
								</div>
							<div id="cantidad">
								<h1>META</h1>
								<h2>$193,000<span>MXN</span></h2>
							</div>
								<p>102,548 MXN <span>RECAUDADOS</span></p>
								<p>26 <span>DÍAS RESTANTES</span></p>
							</div>
			 			</section>
			 			<span class="esquina"></span>
			 		</article>
			 		<article class="caja_2 " id="dre">
			 			<img src="{{ asset( 'images/img_03.jpg' ) }}" alt="">
			 			<section id="social_top">
							<ul>
								<a href="{{ URL::to( 'http://facebook.com' ) }}" target="_blank"><li class="fa fa-facebook"></li></a>
								<a href="{{ URL::to( 'http://twitter.com' ) }}" target="_blank"><li class="fa fa-twitter"></li></a>
								<a href="{{ URL::to( '/' ) }}"><li class="fa fa-heart"></li></a>
								<p>96 likes</p>
							</ul>
							<div id="donativo">HAZ TU DONACIÓN</div>
						</section>
			 			<section class="txt_int">
			 				<h1>RESTAURACIÓN</h1>
			 				<h2>CENTRO COMERCIAL "LA VICTORIA"</h2>
			 				<p >Apoya para generar oportunidades de educación para niños de escasos recursos, involucrando a su familia y comunidad</p>
							<a href=""><h3>MÁS INFORMACIÓN<span class="colorin">+</span></h3></a>
							<div id="meta">
								<div id="barra">
									<progress value="0" max="100">
										<div class="progress-bar">
									        <span style="width: 60%;">-</span>
									    </div>
									</progress>
								</div>
								<div id="cantidad">
									<h1>META</h1>
									<h2>$193,000<span>MXN</span></h2>
								</div>
								<p>102,548 MXN <span>RECAUDADOS</span></p>
								<p>26 <span>DÍAS RESTANTES</span></p>
							</div>
			 			</section>
			 			<span class="esquina"></span>
			 		</article>
		 		</div>
	 		<!-- /CAUSAS -->

	 		<!-- FORMAS DE AYUDAR -->
		 		<div id="pleca_causas" class="">
					<h1>FORMAS DE AYUDAR</h1>
		 		</div>
		 		<div class="dre">
			 		<article id="donador_sec" class="for_ayuda ">
			 			<h1>DONADOR</h1>
			 			<p>Sé parte de nuestra comunidad, con tu aportación continuamos abriendo caminos.</p>
			 			<h2>MÁS INFORMACIÓN +</h2>
			 		</article>
			 		<article id="impulsor_sec" class="for_ayuda ">
			 			<h1>IMPULSOR</h1>
			 			<p>Lleguemos a más oídos y toquemos más corazones en una sóla voz</p>
			 			<h2>MÁS INFORMACIÓN +</h2>
			 		</article>
			 		<article id="voluntario_sec" class="for_ayuda">
			 			<h1>VOLUNTARIO</h1>
			 			<p>Vive directamente la experiencia y ayúdanos a seguir adelante.</p>
			 			<h2 onclick="location.href='{{ URL::to( '/voluntarios' ) }}';">MÁS INFORMACIÓN +</h2>
			 		</article>
		 		</div>
	 		<!-- /FORMAS DE AYUDAR -->

	 		<!-- ÚLTIMOS DONADORES -->
	 			<section id="ultimos_dona"class="">
		 			<div class="adorno_fa">
		 				<img src="{{ asset( 'images/adorno_fa.png' ) }}" alt="">
		 			</div>
		 			<div>
		 				<div class="titleM">ÚLTIMOS DONADORES</div>
		 				<p>Donadores recientes que se unieron y juntos estamos <span>#TomandoAcciónFA</span></p>
		 				<div class="donador_clas">
		 					<div class="img_redonda">
		 					<img src="{{ asset( 'images/persona_fa01.png' ) }}" alt="">
		 					</div>
		 					<h1>JORGE CAMACHO</h1>
		 					<h2>DONADOR</h2>
		 				</div>
		 				<div class="donador_clas">
		 					<div class="img_redonda">
		 					<img src="{{ asset( 'images/persona_fa02.png' ) }}" alt="">
		 					</div>
		 					<h1>JAHIR PÉREZ</h1>
		 					<h2>DONADOR</h2>
		 				</div>
		 				<div class="impulsor_clas">
		 					<div class="img_redonda">
		 					<img src="{{ asset( 'images/persona_fa03.png' ) }}" alt="">
		 					</div>
		 					<h1>DANIEL GONZÁLEZ</h1>
		 					<h2>IMPULSOR</h2>
		 				</div>
		 				<div class="voluntario_clas">
		 					<div class="img_redonda">
		 					<img src="{{ asset( 'images/persona_fa04.png' ) }}" alt="">
		 					</div>
		 					<h1>SANDRA LUNA</h1>
		 					<h2>VOLUNTARIO</h2>
		 				</div>
		 				<div class="voluntario_clas">
		 					<div class="img_redonda">
		 					<img src="{{ asset( 'images/persona_fa05.png' ) }}" alt="">
		 					</div>
		 					<h1>ADRINA MONTES</h1>
		 					<h2>VOLUNTARIO</h2>
		 				</div>
		 			</div>
		 			<div class="adorno_fa">
		 				<img src="{{ asset( 'images/adorno_fa.png' ) }}" alt="">
		 			</div>
		 			<div class="txt_fundacion">
		 				<div id="titulo_fca">
		 					<h1>FUNDACIÓN AMPARO</h1>
		 				</div>
		 				<p>En abril de 1979, Don Manuel Esptinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa, y con el pleno consentimiento de sus hijos, quienes con la nobleza de sentimientos que les caracteriza estuvieron totalmente de acuerdo con la misma.</p>
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
	 		<!-- /ÚLTIMOS DONADORES -->
		</section>
	@stop
@stop