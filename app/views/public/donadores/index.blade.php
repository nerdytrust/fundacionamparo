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
	 					<!--<h2 class="colours-white padding15">Se de los primeros en ser parte de las Causas, Dona, Impulsa o se un Voluntario</h2>-->
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador02.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio3">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>						
	 						<img src="{{ asset( 'images/donador03.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador04.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador05.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador06.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador07.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador08.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador09.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador10.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador11.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador12.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador13.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador14.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador15.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador01.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador02.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador03.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador04.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador05.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador06.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador07.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador08.jpg' ) }}" alt="">
	 					</article>
	 					<article class="caja_fca_usu ">
	 						<section class="bull_color">
	 							<div class="ver_bull"></div>
	 							<div class="azul_bull"></div>
	 							<div class="nar_bull"></div>
	 						</section>
	 						<span class="mio">
								<span id="name">Gabriel Caballero<b>México, DF</b>
									<span><button></button></span>
								</span>							
							</span>
	 						<img src="{{ asset( 'images/donador09.jpg' ) }}" alt="">
	 					</article>
	 				@endif
				</div>				
			</section>
		</section>
	@stop
@stop