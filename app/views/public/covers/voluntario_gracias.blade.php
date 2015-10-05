<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.covers.layout' )
	@section( 'class' )gracias-voluntario
	@stop
	@section( 'content' )
		<div class="lightbox-h" id="naranja2">
			<div class="lightbox-h-cont">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<button class="cerrar-h" onclick="location.href='{{ URL::to( '/' ) }}';"></button>
				<!--<button onClick="history.back()" class="regresar"> Regresar</button>-->
				<h1>¡gracias!</h1>
				<h2>Ya estás <br/> <b>#TomandoAcciónFA</b></h2>
				<h3>Tus donaciones hacen posible continuar con nuestra causa, pasa la voz</h3>
				<span>
					<h4>Compartir </h4>
					{{ Helper::facebookSharePop( '', URL::to( '/' ), '' ,'¡TÚ PUEDES AYUDAR! Tus donaciones hacen posible que esto continúe, pasa la voz #TomandoAcciónFA') }}
					{{ Helper::twitterSharePop( '¡TÚ PUEDES AYUDAR! Tus donaciones hacen posible que esto continúe, pasa la voz', URL::to( '/' ) , 'TomandoAcciónFA' ) }}
				</span>
			</div>
		</div>
	@stop
@stop