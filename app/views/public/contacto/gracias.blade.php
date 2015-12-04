<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.covers.layout' )
	@section( 'class' )donar-gracias
	@stop
	@section( 'content' )
		<div class="lightbox-h gracias" id="donar">
			<div class="lightbox-h-cont donar">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<button class="cerrar-h" onclick="location.href='{{ URL::to( '/contacto' ) }}';"></button>
				<h1>¡gracias!</h1>
				<h2>Hemos recibido tu información correctamente. ¡Nos pondremos en contacto contigo!</h2>
			</div>
		</div>
	@stop
@stop