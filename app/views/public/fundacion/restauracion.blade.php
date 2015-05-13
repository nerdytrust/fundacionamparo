@extends( 'public.layout' )
	@section("class")restauracion
	@stop
	@section("content")
		<section id="Contenedor">
			<section class="mask_head back_img8" >
				<div class="txt_mask">
					<img src="{{ asset( 'images/logo_mask_header.jpg' ) }}" alt="">
					<h1>FUNDACIÓN AMPARO</h1>
					<h3>Viendo por nuestro patrimonio, el hogar de los mexicanos</h3>
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
				<div id="nav_int">
					<nav >
						<ul>
							<li>{{ HTML::link( '/fundacion', 'LA FUNDACIÓN', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/historia', 'HISTORIA', [ 'class' => 'animsition-link' ] ) }}</li>
							<li class="activo">{{ HTML::link( '/aportaciones', 'APORTACIONES', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/membresias', 'MEMBRESÍAS U ORGANISMOS', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/consideraciones', 'CONSIDERACIONES FISCALES', [ 'class' => 'animsition-link' ]) }}</li>
						</ul>
					</nav>
				</div>
				<div class="regresa" onclick="location.href='{{ URL::to( '/aportaciones') }}';"><i class="fa fa-caret-left fa-lg"></i>Regresar</div>
				<div class="txt_fundacion2 bloqrest">
					<div id="titulo_fca" class="colorin">
						<h1>RESTAURACIÓN DE EDIFICIOS</h1>
					</div>
					<h3>Centro Comercial “La Victoria”</h3>
					<p>Observando la misma temática de procurar obras para el beneficio común, la Fundación Amparo rescató con maestría, un ancestral centro de comercio ubicado en el Centro Histórico de la Ciudad de Puebla, convirtiendo el antiguo Mercado “La Victoria”, en un centro comercial digno, que representa un punto de fuentes de trabajo y recreación para la sociedad.</p>
					<br/>
					<h3>Iluminación exterior de la Catedral y el Palacio de Gobierno Municipal de la Ciudad de Puebla</h3>
					<p>En marzo 2009, la Fundación Amparo celebró un convenio de colaboración y apoyo financiero con el H. Ayuntamiento del Municipio de Puebla, para participar en la recuperación y dignificación del Centro Histórico de la Ciudad de Puebla, a través de tres acciones:</p>
					<br/>
					<p><span class="colorin"><b>1.</b></span> Revitalización de la Senda que lleva el nombre de Ángeles y que comprende las calles ubicadas sobre la 2 Sur, de la 3 a la 9 Oriente. Misma en la que se realizó urbanización del segmento vial, repavimentación del área de rodamiento y banquetas, así como la colocación de postes dragones y bolardos. Pintura a casas y al Templo de San Juan de Letrán (Hospitalito). Con estas acciones se logró la dignificación de la imagen urbana en estas calles. 
					</p>
					<br/>
					<p><span class="colorin"><b>2.</b></span> Colocación e iluminación de un monumento en memoria de la Señora Ángeles Espinosa Yglesias, ubicado en la parte oriente del Zócalo. Obra de Jan Hendrix que fue develada el 20 de julio del 2009, llamada “Kiosco”. Escultura de aluminio laqueado que tiene una forma cilíndrica de 6 mts de altura, con un diámetro central de 2.50, rodeado por dos medios círculos laterales que suman un diámetro de 7 metros que permite la circulación interior. Esta pieza, a manera de kiosco, evoca también mediante el laqueado blanco y los motivos vegetales un encaje que translúcido se integra sutilmente al entorno.
					</p>
					<br/>
					<p><span class="colorin"><b>3.</b></span> Iluminación exterior de la Catedral y el Palacio de Gobierno Municipal de la Ciudad de Puebla.
					</p>
					<br/>
					<p>La Catedral de Puebla, inmueble emblemático y sede de la máxima autoridad de la Iglesia Católica, representa toda esa tradición religiosa y expresa una parte importante del acervo que posee esta ciudad, que con orgullo es patrimonio no tan sólo de los poblanos sino de la humanidad, de ahí el interés de la Fundación Amparo, de poder exaltar las cualidades y características de este edificio histórico, ícono de la arquitectura religiosa, mediante un proyecto de intervención de iluminación, con los sistemas y técnicas de alta tecnología, logrando su realce, respetándolo y alineándose con los principios de conservación a nivel internacional, esto con el único objetivo de poder lograr el reencuentro de la sociedad con sus raíces.</p>
					<br/>
					<p>De igual manera, ha sido iluminado el Palacio de Gobierno Municipal, majestuoso edificio, que ha fungido como sede de los poderes que han regido a la capital, logrando con esto, participar y apoyar a la administración municipal para el engrandecimiento de nuestro entorno arquitectónico.</p>
					<br/>
					<h3>Otros</h3>
					<p>La Fundación Amparo apoyó también las obras de reconstrucción de una gran cantidad de edificios afectados por el sismo de 1999 en el estado de Puebla, entre los que podemos mencionar la Catedral Angelopolitana, el Templo de San Agustín y la Catedral de la ciudad de Tehuacán; así mismo, la restauración de una parte significativa de los murales del exconvento franciscano de Izúcar de Matamoros y la restauración del Teatro Principal de la ciudad de Puebla, primer teatro de América.</p>
					<br/>
					<ul class="ben">
						<li>Restauración, operación y administración del Ex - Mercado "La victoria" en Puebla, Puebla</li>
						<li>Apoyo reconstrucción sismo '99</li>
						<li>Restauración sala del capitulo del exconvento de Santo Domingo de Guzmán en Izúcar de Matamoros, Puebla</li>
						<li>Apoyo al gobierno del estado de Puebla para la remodelación del Teatro de la Ciudad</li>
						<li>Parroquía de San Miguel Arcángel en Cozumel</li>
						<li>Revitalización de la senda "Angeles" y Proyecto de Iluminación Exterior en Catedral y Palacio Municipal de la ciudad de Puebla</li>
						<li>Mejoramiento de la imagen del Parque la Pergola de la ciudad de Puebla y calles aledañas</li>
					</ul>
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