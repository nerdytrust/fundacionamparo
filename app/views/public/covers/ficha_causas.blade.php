<?php 
	$disable_header = 1; $disable_footer = 1; 
	$share_fb  = [ 
		'title'       => ucwords(strtolower($causa->id_categorias_record->nombre.' '.$causa->titulo)),
		'description' => $causa->descripcion,
		'image'       => asset( 'path_image/' . $causa->imagen . '/' . '540x565')
		];
?>
@extends( "public.covers.layout" )
	@section("class")ficha-causas
	@stop
	@section("content")
		<div class="lightbox" id="blanco1" style="display:block">
			<div class="usuario-light" id="{{$causa->id_causas}}" >
				<span class="usuario cau">
					<img src="{{ asset( 'path_image/' . $causa->imagen . '/' . '540x565' ) }}" alt="">
					<div id="txt_evento">						
						<nav>
							<ul>
								{{ Helper::facebookShare( '', Request::url(), '' ) }}
								{{ Helper::twitterShare( $causa->titulo, Request::url(), '' ) }}
								{{ Helper::like( $causa->id_causas, 'causas' ) }}
								<p>{{ $causa->me_gusta_interno }} likes</p>
							</ul>
						</nav>
						<div class="cau-dat">
							<img src="{{ asset( 'images/icon_donadores-c.png' ) }}" alt="">
							<h1>
								{{ Helper::totalDonaciones( $causa->id_causas ) }}
								<b>Donadores</b>
							</h1>
							<h2>Tu aportación es importante, cada granito cuenta, con tu ayuda no nos detendremos.</h2>
						</div>
					</div><!--termina txt_evento-->
				</span><!--termina usuario-->
				<span class="datos">
					<button class="centros">{{ $causa->id_categorias_record->nombre }}</button>
					<button value="" class="cerrar" onClick="history.back()" class="regresar"></button>
					<!--<button onClick="history.back()" class="regresar"> Regresar</button>-->
					<h1>{{ $causa->titulo }}</h1>
					<!--tabs-->
					<section class="tabs">
			            <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
				        <label for="tab-1" class="tab-label-1">Descripción</label>
			            <!--< <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />-->
				        <!--<label for="tab-2" class="tab-label-2">Donadores</label>-->
					    <div class="clear-shadow"></div>
				        <div class="content">
					        <div class="content-1">
								<div class="datos-inf caudat scrollbar" id="style-scroll">
									<p>
										{{ $causa->descripcion }} <br/>
										
									</p>	

								</div><!--termina datos-inf-->
								<a href="{{ URL::to( 'como-ayudar' ) }}" target="_blank">Selecciona la forma en que deseas ayudar
										<img src="{{ asset( 'images/inter.png' ) }}" alt="" id="">
										</a>
								<div class="fig">
									<figure class="cauf" id="cauf-d" onclick="location.href='{{ URL::to( 'donar-causa/' . $causa->id_causas ) }}';">
									  <span>Haz tu donación</span>
									</figure >
									<figure class="cauf" onclick="location.href='{{ URL::to( 'impulsar-causa/' . $causa->id_causas ) }}';">
										<span>Ser</br>impulsor</span>
									</figure>
									<figure class="cauf" id="cauf-v">
										<span>Ser</br>voluntario</span>
									</figure>
								</div>
								<div id="meta" class="caum">
									<div id="barra">
											<span id="b{{$causa->id_causas}}" style="width: {{ $causa->porcentaje }}%"></span>
									</div>
									<div id="cantidad">
										<h1>META</h1>
										<h2>${{ number_format( $causa->meta) }}<span>MXN</span></h2>
									</div>
									<p>${{ number_format( $causa->recaudado ) }} MXN <span>RECAUDADOS</span></p>
									<p>{{ Helper::getRemaining( $causa->fecha ) }} <span>DÍAS RESTANTES</span></p>
								</div>					
						    </div>
					        <div class="content-2">
								<!--<div class="donadores-c">
									<span id="fotos"><img src="{{ asset( 'images/foto.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto2.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto3.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto2.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto3.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto2.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto3.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto2.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto3.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto2.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto3.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto3.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto2.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto3.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto2.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto3.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto3.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto2.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto3.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto2.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto3.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto2.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto3.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto2.png' ) }}" alt=""></span>
									<span id="fotos"><img src="{{ asset( 'images/foto3.png' ) }}" alt=""></span>
								</div>-->
							</div>
				        </div>
					</section>
					<span class="esquina-pop" id="ski"></span>
					<!--tabs-->			
				</span>
			</div>
		</div>
	@stop
@stop