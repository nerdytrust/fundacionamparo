<?php $header_donadores = 1; ?>
@extends( 'public.layout' )
	@section('class')donadores-section
	@stop
	@section("content")
		<section id="Contenedor" class="cu">
			<section id="contenedor_int_usuarios">
				<div id="caja_aporta_usuarios" style="display:inline-block">
					@if ( $resultado )
						@foreach ( $resultado as $key => $donador )
							<a href="{{ URL::to( 'ficha-donador/' . $donador->id_registrados ) }}">
								<article class="caja_fca_usu">
									<section class="bull_color">
										@if (isset( $type[$key]['donador']) )
											<div class="ver_bull" title="Donador"></div>
										@endif
										@if ( isset($type[$key]['voluntario']) )
											<div class="nar_bull" title="Voluntario"></div>
										@endif
										@if ( isset($type[$key]['impulsor']) )
											<div class="nar_bull" title="Impulsor"></div>
										@endif

										@if (isset( $type['all']['donador']) )
											<div class="ver_bull" title="Donador"></div>
										@endif
										@if ( isset($type['all']['voluntario']) )
											<div class="nar_bull" title="Voluntario"></div>
										@endif
										@if ( isset($type['all']['impulsor']) )
											<div class="nar_bull" title="Impulsor"></div>
										@endif
										
			 						</section>
									<span class="{{ $class }}">
										<span id="name">{{ $donador->displayName }}<b>{{ $donador->city }}</b>
											<span><button></button></span>
										</span>							
									</span>
			 						<img src="{{ $donador->photoURL }}" alt="{{ $donador->displayName }}" >
			 					</article>
			 				</a>
						@endforeach
					@else
	 					<div class="colours-white">
	 						<h1>
	 							 No existen datos para mostrar
	 						</h1>
	 					</div>
	 				@endif
				</div>				
			</section>
		</section>
	@stop
@stop