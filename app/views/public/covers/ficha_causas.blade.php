<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( "public.covers.layout" )
	@section("class")ficha-causas
	@stop
	@section("content")
		<div class="lightbox" id="blanco1" style="display:block">
			<div class="usuario-light">
				<span class="usuario cau">
					<img src="{{ asset( 'images/light-cau.png' ) }}" alt="">
					<div id="txt_evento">						
						<nav>
							<ul>
								<a href=""><li class="fa fa-facebook"></li></a>
								<a href=""><li class="fa fa-twitter"></li></a>
								<a href=""><li class="fa fa-heart"></li></a>
								<p>96 likes</p>
							</ul>
						</nav>
						<div class="cau-dat">
							<img src="{{ asset( 'images/icon_donadores-c.png' ) }}" alt="">
							<h1>249,863 <b>Donadores</b></h1>
							<h2>Tu aportación es importante, cada granito cuenta, con tu ayuda no nos detendremos.</h2>
						</div>
					</div><!--termina txt_evento-->
				</span><!--termina usuario-->
				<span class="datos">
					<button class="centros">centros comunitarios</button>
					<button value="" class="cerrar" onClick="history.back()" class="regresar"></button>
					<!--<button onClick="history.back()" class="regresar"> Regresar</button>-->
					<h1>roberto alonso espinosa</h1>
					<!--tabs-->
					<section class="tabs">
			            <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
				        <label for="tab-1" class="tab-label-1">Descripción</label>
			            <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
				        <label for="tab-2" class="tab-label-2">Donadores</label>
					    <div class="clear-shadow"></div>
				        <div class="content">
					        <div class="content-1">
								<div class="datos-inf caudat">
									<p>
										Desarrollo y crecimiento del Centro de Desarrollo Comunitario Roberto Alonso Espinosa, ubicado en la colonia Lomas de Chamontoya en la Ciudad de México y otro en el municipio de Zacatlán, Puebla, los cuales brindan atención, bajo el Método Montessori,  a la comunidad infantil de muy escasos recursos, ampliando el beneficio al ambiente familiar. <br/>
										<b>Selecciona la forma en que deseas ayudar
										<img src="{{ asset( 'images/inter.png' ) }}" alt="" id="icon">
										</b>
									</p>	
								</div><!--termina datos-inf-->
								<div class="fig">
									<figure class="cauf" id="cauf-d">
									  <span>Haz tu donación</span>
									</figure >
									<figure class="cauf" id="cauf-i">
										<span>Ser</br>impulsor</span>
									</figure>
									<figure class="cauf" id="cauf-v">
										<span>Ser</br>voluntario</span>
									</figure>
								</div>
								<div id="meta" class="caum">
									<div id="barra">
										<progress value="0" max="100"></progress>
										<!--<span id="relleno"></span>-->
									</div>
									<div id="cantidad">
										<h1>META</h1>
										<h2>$193,000<span>MXN</span></h2>
									</div>
									<p>102,548 MXN <span>RECAUDADOS</span></p>
									<p>26 <span>DÍAS RESTANTES</span></p>
								</div>					
						    </div>
					        <div class="content-2">
								<div class="donadores-c">
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
								</div>
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