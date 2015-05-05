@extends( 'public.layout' )
	@section("class")asistenciales
	@stop
	@section("content")
		<section id="Contenedor">
			<section class="mask_head back_img9" >
				<div class="txt_mask">
					<img src="{{ asset( 'images/logo_mask_header.jpg' ) }}" alt="">
					<h1>FUNDACIÓN AMPARO</h1>
					<h3>Al llamado del pueblo en grito de esperanza</h3>
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
						<h1>ASISTENCIALES</h1>
					</div>
					<p>La Fundación Amparo tuvo presencia tanto asignando recursos para ayudar a personas que resultaron damnificadas en el terremoto en 1985, como a los damnificados en la Sierra Norte de Puebla por las tormentas que causaron caos en 1999, aportando, en este último caso, al Consejo Pro-Construcción de la Vivienda de la Sierra Norte de Puebla, todos los elementos para lograr la construcción de viviendas que permitieron reubicar a las familias siniestradas.</p>
					<br>
					<p>Independientemente de apoyos a diversos municipios y comunidades en el Estado de Puebla, la Fundación Amparo amplió su ámbito de beneficencia a diversos puntos del país, como se puede apreciar al haber atendido la conservación que auspició de la Parroquia de San Miguel, en Cozumel, Quintana Roo, así como el apoyo otorgado para la creación del Centro de Desarrollo Infantil y Juvenil Renacimiento, en el puerto de Acapulco, Guerrero.</p>
					<br>
					<p>Las aportaciones asistenciales han sido también un destacado rubro en sus asignaturas de apoyo, ya sea a través de la Beneficencia Pública del Estado de Puebla, o del apoyo a Ayuntamientos poblanos específicos como los de Izúcar de Matamoros, de San Andrés Cholula y de la misma Ciudad de Puebla.</p>
					<br/>
					<h3>Beneficiarios</h3>
					<ul class="ben">
						<li>Beneficencia Pública del Estado de Puebla</li>
						<li>Damnificados por el sismo '85 en México, D.F.</li>
						<li>Damnificados en sierra norte de Puebla por huracán Stan en octubre del 2005</li>
						<li>Ayuntamiento de Puebla</li>
						<li>Secretaría de Finanzas del Estado de Puebla</li>
						<li>Ayuntamiento de San Andrés Cholula Puebla</li>
						<li>Desarrollo Infantil y Juvenil Renacimiento A.C.</li>
						<li>Consejo Pro-construcción Vivienda Sierra Norte de Puebla</li>
						<li>Parroquia San Miguel Arcángel, en Cozumel</li>
						<li>Ayuntamiento Izúcar de Matamoros, Puebla</li>
						<li>Centro Mexicano para la Filantropía A.C.</li>
						<li>Sistema Municipal DIF (Puebla)</li>
						<li>Sistema Municipal DIF (Cholula)</li>
						<li>Junta de Beneficencia Privada del Estado de Puebla</li>
						<li>Apoyos diversos a familias de Zacatlán, Puebla</li>
						<li>Asociación Técnico Cultural Garza Barragan S.C. en México, D.F.</li>
						<li>Apoyo a damnificados de Tabasco por inundaciones en 2007</li>
						<li>Asociación Mexicana de Profesionales en Obtención de fondos y desarrollo institucional (México, D.F.)</li>
						<li>Parque Villa Atl</li>
						<li>Fundación Alberto y Dolores Andrade I.A.P</li>
						<li>Convento de las Carmelitas Descalzas de la ciudad de Puebla</li>
						<li>Conventos San Jose y Santa Teresa</li>
						<li>Damnificados de Guerrero por huracanes Ingrid y Manuel</li>
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