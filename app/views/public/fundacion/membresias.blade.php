@extends( 'public.layout' )
	@section("class")membresias
	@stop
	@section("content")
		<section id="Contenedor">
			<section class="mask_head back_img" >
				<div class="txt_mask">
					<img src="images/logo_mask_header.jpg" alt="">
					<h1>FUNDACIÓN AMPARO</h1>
					<h3>En apoyo a un México de corazones vivos</h3>
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
				<div id="nav_int">
					<nav >
						<ul>
							<li>{{ HTML::link( '/fundacion', 'LA FUNDACIÓN', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/historia', 'HISTORIA', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/aportaciones', 'APORTACIONES', [ 'class' => 'animsition-link' ] ) }}</li>
							<li class="activo">{{ HTML::link( '/membresias', 'MEMBRESÍAS U ORGANISMOS', [ 'class' => 'animsition-link' ] ) }}</li>
							<li>{{ HTML::link( '/consideraciones', 'CONSIDERACIONES FISCALES', [ 'class' => 'animsition-link' ]) }}</li>
						</ul>
					</nav>
				</div>
				<div class="txt_fundacion2">
					<div id="titulo_fca">
						<h1 class="tt">MEMBRESÍAS U ORGANISMOS</h1>
						<h4>A los que pertenece Fundación Amparo</h4>
					</div>
					<div class="cja_membresias">
						<div class="img_redonda2">
							<img src="{{ asset( 'images/femam.png' ) }}" alt="">
						</div>
						<div class="img_txt">
							<h3>FEMAM</h3>
							<p>Federación Mexicana de Asociaciones de Amigos de los Museos (FEMAM) se constituyó el 21 de octubre de 1991. Es un organismo independiente sin fines de lucro que tiene como objetivo preservar el patrimonio cultural de México a través de Patronatos y Asociaciones de Amigos de los Museos de toda la República en beneficio de nuestra sociedad. 
							<br/>
							<a href="{{ URL::to( 'http://www.femam.org.mx' ) }}" target="_blank"><span>www.femam.org.mx</span></a>
							<div id="txt_evento" class="membresia-red">
								<nav class="red-cont">
									<ul>
										<a href=""><li class="fa fa-facebook"></li></a>
										<a href=""><li class="fa fa-twitter"></li></a>
										<a href=""><li class="fa fa-heart"></li></a>
										<p>96 likes</p>
									</ul>
								</nav>
							</div>
						</div>
					</div>
					<br/>
					<div class="cja_membresias">
						<div class="img_redonda2">
							<img src="{{ asset( 'images/cemefi.png' ) }}" alt="">
						</div>
						<div class="img_txt">
							<h3>CEMEFI</h3>
							<p>El Centro Mexicano para la Filantropía (CEMEFI) es una asociación civil fundada en diciembre de 1988. Es una institución privada, no lucrativa, sin ninguna filiación a partido, raza o religión. Cuenta con permiso del Gobierno de México para recibir donativos deducibles de impuestos. Su sede se encuentra en la Ciudad de México y su ámbito de acción abarca todo el país.
							<br/>
							<a href="{{ URL::to( 'http://www.proyectoroberto.com.mx' ) }}" target="_blank"><span>www.proyectoroberto.com.mx</span></a>
							<div id="txt_evento" class="membresia-red">
								<nav class="red-cont">
									<ul>
										<a href=""><li class="fa fa-facebook"></li></a>
										<a href=""><li class="fa fa-twitter"></li></a>
										<a href=""><li class="fa fa-heart"></li></a>
										<p>96 likes</p>
									</ul>
								</nav>
							</div>
						</div>
					 </div>
					 <div class="cja_membresias">
						<div class="img_redonda2">
							<img src="images/jib.png" alt="">
						</div>
						<div class="img_txt">
							<h3>JIB</h3>
							<p>Es un organo administrativo desconcentrado por función que tiene por objetivo inspeccionar y vigilar la administración de las instituciones de beneficencia privada en el estado de Puebla, evitando así que se desvirtúe el objetivo original por el cual fueron constituidas y evitando la violación de la voluntad de los fundadores.
							<br/>
							<a href="{{ URL::to( 'http://www.jib.org' ) }}" target="_blank"><span>www.jib.org</span></a>
							<div id="txt_evento" class="membresia-red">						
								<nav class="red-cont">
									<ul>
										<a href=""><li class="fa fa-facebook"></li></a>
										<a href=""><li class="fa fa-twitter"></li></a>
										<a href=""><li class="fa fa-heart"></li></a>
										<p>96 likes</p>
									</ul>
								</nav>
							</div>	
						</div>
					 </div>
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