<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.covers.layout' )
	@section( 'class' )donar-gracias
	@stop
	@section( 'content' )
		<div class="lightbox-h gracias" id="donar">
			<div class="lightbox-h-cont donar">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<button class="cerrar-h" onclick="location.href='{{ URL::to( '/apoyamos-tu-causa' ) }}';"></button>
				<h1>¡gracias!</h1>
				<h2>Se ha enviado correctamente tu información</h2>
			</div>
		</div>
	@stop
@stop