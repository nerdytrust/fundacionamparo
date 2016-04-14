<?php	
	if($idMembresia){
		foreach ( $membresias as $membresia ){
			if($membresia->id_membresias == $idMembresia){
				$share_fb  = [ 
					'title'       => $membresia->nombre,
					'description' => $membresia->resena,
					'image'       => asset( 'path_image/' . $membresia->logo . '/' . '267x176' ) 
				];
			}	
		}
	} 
?>
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
							{{ Helper::facebookShare( '', Request::url(), '' ) }}
							{{ Helper::twitterShare( 'La Fundación - Membresías', Request::url(), '' ) }}
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
					@if ( isset( $membresias ) )
						@foreach ( $membresias as $membresia )
							<div class="cja_membresias">
								<div class="img_redonda2">
									<img src="{{ asset( 'path_image/' . $membresia->logo . '/' . '267x176' ) }}" alt="">
								</div>
								<div class="img_txt">
									<h3>{{ $membresia->nombre }}</h3>
									<p>
										{{ $membresia->resena }}
										<a href="{{ URL::to( $membresia->url ) }}" target="_blank"><span>{{ Helper::nameUrl( $membresia->url ) }}</span></a>
									</p>
									<div id="txt_evento" class="membresia-red">
										<nav class="red-cont">
											<ul>
												{{ Helper::facebookShare( '', URL::to('membresias').'/'.$membresia->id_membresias, '' ) }}
												{{ Helper::twitterShare2( $membresia->nombre, Request::url(), '' ) }}
												{{ Helper::like( $membresia->id_membresias, 'membresias' ) }}
												<p>{{ $membresia->me_gusta }} likes</p>
											</ul>
										</nav>
									</div>
								</div>
							</div>
							<br/>
						@endforeach
					@endif
				</div>
				<div class="adorno_fa">
 					<img src="{{ asset( 'images/adorno_fa.png' ) }}" alt="">
 				</div>
 				<div class="txt_footer">
 					<h1>¡Tú puedes ayudar!</h1>
 					<h2>Tus donaciones hacen posible que esto continúe, pasa la voz <span>#TomandoAcciónFA</span></h2>
 					<div id="social_footer">
 						<ul>
 							{{ Helper::facebookShare( '', URL::to('/'), '' ) }}
		 				    {{ Helper::twitterShare( '¡TÚ PUEDES AYUDAR! Tus donaciones hacen posible que esto continúe, pasa la voz', URL::to('/')	, 'TomandoAcciónFA' ) }}
 						</ul>
 					</div>
 				</div>
			</section>
		</section>
	@stop
@stop