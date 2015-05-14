@extends( 'public.layout' )
	@section("class")fundacion
	@stop
	@section("content")
		<section id="Contenedor">
			<section class="mask_head back_img" >
				<div class="txt_mask">
					<img src="{{ asset( 'images/logo_mask_header.jpg' ) }}" alt="">
					<h1>FUNDACIÓN AMPARO</h1>
					<h3>En apoyo a un México de corazones vivos</h3>
					<!--<nav class="social_mask">
						<ul>
							<a href=""><li class="fa fa-facebook"></li></a>
							<a href=""><li class="fa fa-twitter"></li></a>
							<a href=""><li class="fa fa-heart"></li></a>
							<p>96 likes</p>
						</ul>
					</nav>-->
				</div>
			</section>
			<section id="contenedor_int">
				<div class="txt_fundacion2">
					<div id="titulo_fca">
						<h1>POLÍTICAS DE PRIVACIDAD</h1>
					</div>
					<p>Fundaci&oacute;n Amparo I.B.P. , mejor conocido como fundaci&oacute;n Amparo , con domicilio en calle 2 Sur 708, colonia centro Hist&oacute;rico, ciudad puebla, c.p. 72000, en la entidad de puebla, m&eacute;xico , y portal de internet <span><a href="{{ URL::to( 'http://www.fundacionamparo.com' ) }}" target="_blank">www.fundacionamparo.com</a></span> , es el responsable del uso y protecci&oacute;n de sus datos personales, y al respecto le informamos lo siguiente:</p>
					<br/>
					<h3>&iquest;Para qu&eacute; fines utilizaremos sus datos personales?</h3>
					<br/>
					<p>De manera adicional, utilizaremos su informaci&oacute;n personal para las siguientes finalidades secundarias que no son necesarias para el servicio solicitado, pero que nos permiten y facilitan brindarle una mejor atenci&oacute;n:</p>
					<ul class="ben">
						<li>Realizar alg&uacute;n donativo</li>
						<li>Apoyar una causa</li>
						<li>Contactar a la Fundaci&oacute;n Amparo</li>
						<li>Solicitar una beca</li>
						<li>Para ser voluntario</li>
					</ul>
					<br />
					<p>La negativa para el uso de sus datos personales para estas finalidades no podrá ser un motivo para que le neguemos los servicios y productos que solicita o contrata con nosotros.</p>
					<br/>
					<h3>&iquest;Qué datos personales utilizaremos para estos fines?</h3>
					<p>Para llevar a cabo las finalidades descritas en el presente aviso de privacidad, utilizaremos los siguientes datos personales:</p>
					<ul class="ben">
						<li>Nombre</li>
						<li>Registro Federal de Contribuyentes (RFC)</li>
						<li>Fecha de Nacimiento</li>
						<li>Nacionalidad</li>
						<li>Domicilio</li>
						<li>Teléfono particular</li>
						<li>Correo electrónico</li>
						<li>Trayectoria educativa</li>
					</ul>
					<br/>
					<h3>&iquest;Cómo puede acceder, rectificar o cancelar sus datos personales, u oponerse a su uso?</h3>
					<p>Usted tiene derecho a conocer qué datos personales tenemos de usted, para qué los utilizamos y las condiciones del uso que les damos (Acceso). Asimismo, es su derecho solicitar la corrección de su información personal en caso de que esté desactualizada, sea inexacta o incompleta (Rectificación); que la eliminemos de nuestros registros o bases de datos cuando considere que la misma no está siendo utilizada adecuadamente (Cancelación); así como oponerse al uso de sus datos personales para fines específicos (Oposición). Estos derechos se conocen como derechos ARCO.</p>
					<br/>
					<p>Para el ejercicio de cualquiera de los derechos ARCO, usted deberá presentar la solicitud respectiva a través del siguiente medio:</p>
					<p>Comunicándose al correo electrónico <span>{{ HTML::link( 'mailto:contacto@fundacionamparo.com', 'contacto@fundacionamparo.com' ) }}</span></p>
					<br />
					<p>Para conocer el procedimiento y requisitos para el ejercicio de los derechos ARCO, ponemos a su disposición el siguiente medio:</p>
					<ul class="ben">
						<li>En la página de internet de Fundación Amparo</li>
					</ul>
					<br />
					<p>Los datos de contacto de la persona o departamento de datos personales, que está a cargo de dar trámite a las solicitudes de derechos ARCO, son los siguientes:</p>
					<ul class="ben">
						<li>Nombre de la persona o departamento de datos personales: Maestra Laura Espinoza Félix</li>
						<li>Domicilio: calle 2 Sur 708, colonia Centro Histórico, ciudad Puebla, municipio o delegación Puebla, c.p. 72000, en la entidad de Puebla, país México</li>
						<li>Correo electrónico: {{ HTML::link( 'mailto:contacto@fundacionamparo.com', 'contacto@fundacionamparo.com', [ 'class' => 'black-link' ] ) }}</li>
						<li>Número telefónico: 52 (222)229 3850</li>
					</ul>
					<br/>
					<p>Usted puede revocar su consentimiento para el uso de sus datos personales</p>
					<br />
					<p>Usted puede revocar el consentimiento que, en su caso, nos haya otorgado para el tratamiento de sus datos personales. Sin embargo, es importante que tenga en cuenta que no en todos los casos podremos atender su solicitud o concluir el uso de forma inmediata, ya que es posible que por alguna obligación legal requiramos seguir tratando sus datos personales. Asimismo, usted deberá considerar que para ciertos fines, la revocación de su consentimiento implicará que no le podamos seguir prestando el servicio que nos solicitó, o la conclusión de su relación con nosotros.</p>
					<br />
					<p>Para revocar su consentimiento deberá presentar su solicitud a través del siguiente medio:</p>
					<ul class="ben">
						<li>Al correo electrónico {{ HTML::link( 'mailto:contacto@fundacionamparo.com', 'contacto@fundacionamparo.com', [ 'class' => 'black-link' ] ) }}</li>
					</ul>
					<br />
					<p>Para conocer el procedimiento y requisitos para la revocación del consentimiento, ponemos a su disposición el siguiente medio:</p>
					<ul class="ben">
						<li>La página de internet de la Fundación Amparo {{ HTML::link( 'http://www.fundacionamparo.com', 'www.fundacionamparo.com', [ 'class' => 'black-link' ] ) }}</li>
					</ul>
					<br />
					<h3>&iquest;Cómo puede limitar el uso o divulgación de su información personal?</h3>
					<p>Con objeto de que usted pueda limitar el uso y divulgación de su información personal, le ofrecemos los siguientes medios:</p>
					<ul class="ben">
						<li>Al correo electrónico {{ HTML::link( 'mailto:contacto@fundacionamparo.com', 'contacto@fundacionamparo.com', [ 'class' => 'black-link' ] ) }}</li>
					</ul>
					<br/>
					<p>El uso de tecnologías de rastreo en nuestro portal de internet</p>
					<br />
					<p>Le informamos que en nuestra página de internet utilizamos cookies, web beacons u otras tecnologías, a través de las cuales es posible monitorear su comportamiento como usuario de internet, así como brindarle un mejor servicio y experiencia al navegar en nuestra página. Los datos personales que recabamos a través de estas tecnologías, los utilizaremos para los siguientes fines:</p>
					<ul class="ben">
						<li>para verificar la identidad de un usuario, para solicitar datos y apoyar a una causa,</li>
						<li>para poder ser voluntario en algúna acción generada por Fundación Amparo,</li>
						<li>para poder solicitar una beca, para poder realizar algún donativo</li>
					</ul>
					<br />
					<p>Los datos personales que obtenemos de estas tecnologías de rastreo son los siguientes:</p>
					<ul class="ben">
						<li>Identificadores, nombre de usuario y contraseñas de una sesión</li>
						<li>Idioma preferido por el usuario</li>
						<li>Región en la que se encuentra el usuario</li>
						<li>Tipo de navegador del usuario</li>
						<li>Tipo de sistema operativo del usuario</li>
						<li>Fecha y hora del inicio y final de una sesión de un usuario</li>
						<li>Dirección, email, teléfonos</li>
					</ul>
					<br />
					<p>Para conocer la forma en que se pueden deshabilitar estas tecnologías, consulte el siguiente medio:</p>
					<ul class="ben">
						<li>{{ HTML::link( 'https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-we', 'https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-we', [ 'class' => 'black-link', 'target' => '_blank' ] ) }}</li>
					</ul>
					<br />
					<h3>&iquest;Cómo puede conocer los cambios en este aviso de privacidad?</h3>
					<p>El presente aviso de privacidad puede sufrir modificaciones, cambios o actualizaciones derivadas de nuevos requerimientos legales; de nuestras propias necesidades por los productos o servicios que ofrecemos; de nuestras prácticas de privacidad; de cambios en nuestro modelo de negocio, o por otras causas.</p>
					<br/>
					<p>Nos comprometemos a mantenerlo informado sobre los cambios que pueda sufrir el presente aviso de privacidad, a través de: correo electrónico al titular.</p>
					<br/>
					<p>El procedimiento a través del cual se llevarán a cabo las notificaciones sobre cambios o actualizaciones al presente aviso de privacidad es el siguiente:</p>
					<ul class="ben">
						<li>anuncio en la página de internet {{ HTML::link( 'http://www.fundacionamparo.com', 'www.fundacionamparo.com', [ 'class' => 'black-link' ] )}}</li>
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