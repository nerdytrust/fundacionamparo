<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.covers.layout' )
	@section( 'class' )donar-gracias
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="donar">
			<div class="lightbox-h-cont donar">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<button class="cerrar-h" onclick="location.href='{{ URL::to( '/login' ) }}';"></button>
				<h1>¡Validado!</h1>
				<h2>Ya estás  <b>#TomandoAcciónFA</b> </h2>
				<h3>Tus acciones dentro de la comunicad harán posible continuar con nuestra causa, ¡pasa la voz!</h3>
			</div>
		</div>
	@stop
@stop