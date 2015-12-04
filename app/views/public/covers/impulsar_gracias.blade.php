<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( "public.covers.layout" )
	@section("class")gracias-impulsar
	@stop
	@section("content")
		<div class="lightbox-h i" id="naranja2">
			<div class="lightbox-h-cont">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<button class="cerrar-h" onclick="location.href='{{ URL::to( '/' ) }}';"></button>
				<!--<button onClick="history.back()" class="regresar"> Regresar</button>-->
				<h1>¡grácias!</h1>
				<h3>Por ayudarnos a difundir nuestra causa. No te detengas y ¡pasa la voz!</h3>
				<span>
					<h4>Compartir </h4>
					{{ Helper::facebookSharePop( '', URL::to( '/' ), '' ,'¡TÚ PUEDES AYUDAR! Tus donaciones hacen posible que esto continúe, pasa la voz #TomandoAcciónFA') }}
					{{ Helper::twitterSharePop( '¡TÚ PUEDES AYUDAR! Tus donaciones hacen posible que esto continúe, pasa la voz', URL::to( '/' ) , 'TomandoAcciónFA' ) }}
				</span>
			</div>
		</div>
	@stop
@stop