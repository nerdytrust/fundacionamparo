@extends( 'public.layout' )
	@section("class")cultura
	@stop
	@section("content")
		<section id="Contenedor">
			<section class="mask_head back_img7" >
				<div class="txt_mask">
					<img src="{{ asset( 'images/logo_mask_header.jpg' ) }}" alt="">
					<h1>FUNDACIÓN AMPARO</h1>
					<h3>Expansión de nuestra herencia mexicana rica en arte y cultura</h3>
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
				<div class="txt_fundacion2">
					<div id="titulo_fca" class="colorin">
						<h1>CULTURA</h1>
					</div>
					<p>El principal esfuerzo de la Fundación Amparo ha estado enfocado, a través del tiempo, a auspiciar y fomentar actividades ligadas con nuestra cultura, un ejemplo de ello, ha sido la de fomentar en el pueblo de México la conciencia de sus raíces y del incalculable legado cultural de sus antepasados. Motivado por esta inquietud, la Fundación Amparo decidió apoyar las labores de rescate del Templo Mayor en el centro de la ciudad de México, permitiendo poner al descubierto los vestigios de esta grandiosa construcción, al mismo tiempo que conformar la valiosa colección de obras de arte que se exponen en el Museo del Templo Mayor, que ofrece al público el panorama de la cultura mexica en todo su esplendor.</p>
					<br/>
					<p>La obra magna de la Fundación Amparo, es sin duda alguna el Museo Amparo. Habiendo sido Don Manuel Espinosa Yglesias su fundador y oriundo de la Ciudad de Puebla, tuvo especial interés en que fuese ésta la ciudad que albergara, en espacios ligados a su pasado familiar y a importantes centros de la sociedad poblana, un museo. Este museo, a través del tiempo, se ha ganado un lugar y un prestigio dentro del mundo cultural, poniendo al alcance de la humanidad una importante colección de piezas prehispánicas, así como de arte de virreinal, abarcando, incluso las épocas moderna y contemporánea.</p>
					<br/>
					<p>El Museo Amparo es un referente cultural de Puebla y de nuestro país. Fue fundado por Don Manuel Espinosa Yglesias y su hija Ángeles Espinosa Yglesias, en 1991. Su lema es “Encuentro con nuestras raíces”, y su compromiso: la difusión integral del arte prehispánico, virreinal, moderno y contemporáneo de México. Exhibe una colección de más de 1,700 piezas de arte prehispánico, siendo la colección más importante albergada en un museo privado en México. Presenta además, un programa de exposiciones temporales y de actividades académicas y artísticas dirigidas a todo público.</p>
					<br/>
					<h3>Beneficiarios</h3>
					<ul class="ben">
						<li>Excavaciones del Templo Mayor en el Centro Histórico de la Ciudad de México</li>
						<li>Instituto Nacional de Antropología e Historia</li>
						<li>Secretaría de Cultura del Estado de Puebla</li>
						<li>Federación Mexicana de Asociaciones de Amigos de los Museos A.C.</li>
						<li>Difusión y Fomento Cultural A.C.</li>
						<li>Asociación de Amigos del Museo de Arte Popular A.C.</li>
						<li>Museo Amparo</li>
						<li>Consejo Nacional para la Cultura y las Artes</li>
						<li>Administradora de Museos A.C.</li>
						<li>Sociedad de Amigos del Museo Amparo A.C.</li>
						<li>Salón Mexicano en N.Y.</li>
						<li>Instituto de Liderazgo en Museos</li>
						<li>Museo de Arte Carrillo Gil</li>
						<li>Colegio de San Ildefonso</li>
						<li>Asociación de Amigos de la Sala Siqueiros y la Tallera A.C.</li>
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