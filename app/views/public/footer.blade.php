<footer>
	<div id="in_footer">
		<nav id="footer_nav">
			<ul>
				<a href=""><li class="fa fa-facebook"></li></a>
				<a href=""><li class="fa fa-twitter"></li></a>
				<a href=""><li class="fa fa-youtube"></li></a>
				<a href=""><li class="fa fa-instagram"></li></a>
			</ul>
		</nav>
		<div id="terminos_footer">
			<img src="{{ asset('images/logo_footer.png') }}" alt="">
			<h1><a href="{{ URL::to( 'terminos-y-condiciones' ) }}" target="_blank">TÉRMINOS Y CONDICIONES</a> | <a href="{{ URL::to( 'politicas-de-privacidad' ) }}" target="_blank">POLÍTICAS DE PRIVACIDAD</a> <br /><span>© TODOS LOS DERECHOS RESERVADOS POR FUNDACIÓN AMPARO {{ date( 'Y' ) }} </span></h1>
		</div>
		<div id="logo_3indesign">
			<a href="http://3indesign.com/" target="_blank"><img src="{{ asset('images/3indesign_footer.png') }}" alt=""></a>
		</div>
	</div>
	<div di="plc_blck"></div>
</footer>