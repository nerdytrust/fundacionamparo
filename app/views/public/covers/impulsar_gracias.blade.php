<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( "public.covers.layout" )
	@section("class")gracias-impulsar
	@stop
	@section("content")
		<div class="lightbox-h i" id="naranja2">
			<div class="lightbox-h-cont">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<button class="cerrar-h" onclick="window.close();"></button>
				<!--<button onClick="history.back()" class="regresar"> Regresar</button>-->
				<h1>¡grácias!</h1>
				<h3>Por ayudarnos a difundir nuestra causa. No te detengas y ¡pasa la voz!</h3>
				<h2>Ahora soló espera que tus amigos compartan la publicación 10 veces o más y te convertiras en impulsor</h2>
			</div>
		</div>
	@stop
@stop