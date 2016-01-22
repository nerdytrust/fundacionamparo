<?php 

	if(isset($_GET['v']))
		header("Location: http://".$_SERVER['SERVER_NAME']);

	$disable_header = 1; $disable_footer = 1; 
	$share_fb  = [ 
		'title'       => '#TOMANDOACCIÓNFA',
		'description' => 'Ya estoy #TomandoAcciónFA. Los donativos hacen posible continuar con la causa, ¡pasa la voz!',
		'image'       => asset( 'images/compartir_donador.jpg')
		];
?>
@extends( 'public.covers.layout' )
	@section( 'class' )donar-gracias
	@stop
	@section( 'content' )
		<div class="lightbox-h d" id="donar">
			<div class="lightbox-h-cont donar">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<button class="cerrar-h" onclick="location.href='{{ URL::to( '/' ) }}';"></button>
				<!--<button onClick="history.back()" class="regresar"> Regresar</button>-->
				<h1>¡gracias!</h1>
				<h2>Ya estás <br/> <b>#TomandoAcciónFA</b></h2>
				<h3>Tus donativos hacen posible continuar con nuestra causa, ¡pasa la voz!</h3>
				<span>
					<h4>Compartir </h4>
					{{ Helper::facebookSharePop( '', URL::to( '/gracias' ), '') }}
					{{ Helper::twitterSharePop( '¡TÚ PUEDES AYUDAR! Tus donaciones hacen posible que esto continúe, pasa la voz', URL::to( '/' ) , 'TomandoAcciónFA' ) }}
				</span>
			</div>
		</div>
	@stop
@stop