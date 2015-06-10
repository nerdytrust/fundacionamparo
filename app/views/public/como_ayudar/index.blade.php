@extends( 'public.layout' )
	@section('class')como-ayudar
	@stop
	@section('content')
		<section id="Contenedor">
			<section class="mask_head back_img10" >
				<div class="txt_mask">
					<img src="images/logo_mask_header.jpg" alt="">
					<h1>CÓMO AYUDAR</h1>
					<h3>Es muy fácil tomar acción, sólo necesitas dar un poco más</h3>
					<nav class="social_mask">
						<ul>
							{{ Helper::facebookShare( '', Request::url(), '' ) }}
							{{ Helper::twitterShare( 'Como Ayudar', Request::url(), '' ) }}
							{{-- <a href=""><li class="fa fa-heart"></li></a>
							<p>96 likes</p> --}}
						</ul>
					</nav>
				</div>
			</section>
			<section id="contenedor_int">
				<div class="txt_fundacion2">
					<!--<div id="video2">
						<img src="images/fundacion_como_ayudar_video.jpg" alt="">
					</div>
					-->
					<div class="vi2">
						<video controls loop preload="auto" poster="{{ asset( 'images/video_int_historia.png' ) }}" class="video-js vjs-default-skin" data-setup="{}">
							<source src="{{ asset( 'video/video.mp4' ) }}">
				  	    <!--<source src="http://www.w3schools.com/html/movie.mp4">-->
						</video>
					</div><!--termina vi2-->
					<div id="titulo_fca" class="ayudar">
						<div class="titleM">FORMAS DE AYUDAR</div>
						<div class="subtitleM">Tus donaciones construyen sueños y cambian vidas. <span class="colorin">#TomandoAcciónFA</span></div>
						<!--<h1>FORMAS DE AYUDAR</h1>
						<h2>Tus donaciones construyen sueños y cambian vidas. <span class="colorin">#TomandoAcciónFA</span></h2>-->
					</div>
					<div id="cja_donativos">
						<div id="donativo_btn">
							<div class="circulo_btn" id="fca-d">
								<h1>HAZ TU <br/>DONATIVO</h1>
								<h4>#TomandoAcciónFA</h4>
							</div>
							<div class="txt_circ">
								<p>Cualquier donación es de gran ayuda a la causa, no importa la cantidad, si es única o mensual, todo apoyo nos da fuerza para seguir adelante.</p>
								<h2 onclick="location.href='{{ URL::to( 'causas-vivas' ) }}';">VER CAUSAS</h2>
							</div>
						</div>
						<div id="donativo_btn">
							<div class="circulo_btn2" id="fca-i">
								<h1>SER <br/>IMPULSOR</h1>
								<h4>#TomandoAcciónFA</h4>
							</div>
							<div class="txt_circ">
								<p>A través de las redes sociales podemos dar a conocer y propagar el mensaje para crear conciencia y hacer un llamado a la gente de unión a las causas.</p>
								<h2 onclick="location.href='{{ URL::to( 'causas-vivas' ) }}';">VER CAUSAS</h2>
							</div>
						</div>
						<div id="donativo_btn">
							<div class="circulo_btn3" id="fca-v">
								<h1>SER <br/>VOLUNTARIO</h1>
								<h4>#TomandoAcciónFA</h4>
							</div>
							<div class="txt_circ">
								<p>La fuerza de trabajo en mente, cuerpo y alma es esencial para seguir cumpliendo nuestra labor, te invitamos como voluntario a nuestras diferentes causas.</p>
								<h2 onclick="location.href='{{ URL::to( '/causas-vivas' ) }}';">VER CAUSAS</h2>
							</div>
						</div>
					</div>
					<div class="adorno_fa">
 						<img src="{{ asset( 'images/adorno_fa.png' ) }}" alt="">
 					</div>
					<div id="titulo_fca">
						<h1>¡ES MUY FÁCIL TOMAR ACCIÓN!</h1>
						<div class="subtitleM">Solo tienes que seguir estos sencillos pasos para apoyar nuestras causas</div>
					</div>
					<div id="cja_pasos">
						<div class="pasos_txt">
							<img src="{{ asset( 'images/btn_buscar.png' ) }}" alt="">
							<p>Busca la causa en la que deseas contribuir</p>
						</div >
						<div class="division">
							<img src="{{ asset( 'images/btn_flecha.png' ) }}" alt="" class="flecha1">
							<img src="{{ asset( 'images/btn_flecha2.png' ) }}" alt="" class="flecha2">
						</div>
						<div class="pasos_txt">
							<img src="{{ asset( 'images/btn_donar.png' ) }}" alt="">
							<p>Selecciona la forma en que puedes ayudar</p>
						</div>
						<div class="division">
							<img src="{{ asset( 'images/btn_flecha.png' ) }}" alt="" class="flecha1">
							<img src="{{ asset( 'images/btn_flecha2.png' ) }}" alt="" class="flecha2">
						</div>
						<div class="pasos_txt">
							<img src="{{ asset( 'images/btn_listo.png' ) }}" alt="">
							<p>¡Listo!. Ya estás <span class="colorin">#TomandoAcción</span></p>
						</div>
					</div>
				</div>
				<div id="contenedor_btn" >
					<button onclick="location.href='{{ URL::to( '/faqs' ) }}';" class="animsition-link">Ver Faq's</button>
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
							{{ Helper::twitterShare( 'Como Ayudar', Request::url(), 'TomandoAcciónFA' ) }}
 						</ul>
 					</div>
 				</div>
			</section>
		</section>
	@stop
@stop