<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( "public.covers.layout" )
	@section("class")ficha-donador
	@stop
	@section("content")
		<div class="lightbox" style="display:block;">
			<div class="usuario-light">
				<span class="usuario">
					<div id="txt_evento">
						<nav>
							<ul>
								{{ Helper::facebookShare( '', Request::url(), '' ) }}
								{{ Helper::twitterShare( $donador->displayName, Request::url(), '' ) }}
								{{ Helper::like( $donador->id_registrados, 'donadores' ) }}
								<p>{{ $donador->me_gusta }} likes</p>
							</ul>
						</nav>
					</div><!--termina txt_evento-->
					<span id="foto-usuario">
						<img src="{{ $donador->photoURL }}" alt="{{ $donador->displayName }}" >
					</span><!--termina foto-usuario-->
					<p>
						Forma parte de nuestro círculo de donadores desde el 12 de Agosto 2014  una persona más que se suma.
						<b>Muchas gracias.</b>
					</p>
				</span><!--termina usuario-->
				<span class="datos sr">
					<img src="{{ asset( 'images/icon_donadores-d.png' ) }}" alt="">
					<button value="" class="cerrar" onClick="history.back()"></button>
					<h1>{{ $donador->displayName }}</h1>
					<h2>{{ $donador->city }}</h2>
					<div class="datos-inf scrollbar" id="style-scroll">
						@if( $causas )
							<div>
								<h3>Causas en las que ha contribuido:</h3>
								<ul>
									@foreach ( $causas as $causa )
										<li>{{ $causa->titulo }}</li>
									@endforeach
								</ul>
							</div>
						@endif
					</div>
					<!--termina datos-inf-->
					<div class="fig">
						<figure>
							<span>{{ $donaciones }}</span>
							<figcaption>donación</figcaption>
						</figure>
						<figure>
							<span>{{ $impulsos }}</span>
							<figcaption>impulsor</figcaption>
						</figure>
						<figure>
							<span>{{ $voluntariados }}</span>
							<figcaption>voluntario</figcaption>
						</figure>
					</div>
				</span><!--termina datos-->
			</div><!--usuario-ligh-->
		</div>
	@stop
@stop