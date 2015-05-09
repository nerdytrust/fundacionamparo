<?php $timeline = 1; $disable_footer = 1; ?>
@extends( 'public.layout' )
	@section( 'class' )timeline-section
	@stop
	@section( 'content' )
		<section id="Contenedor" class="success_wall container-fluid">
			<div id="success_wall" class="row">
				<section id="main_time" class="container-fluid">
					<div id="carousel-timeline" class="row carousel slide" data-ride="carousel" data-interval="false">
						<!--<div class="main-navigator-container">-->
							<a href="#carousel-timeline" class="left carousel-control main-rol" role="button" data-slide="prev">
								<span class="left-arrow" aria-hidden="true"></span>
								<span class="sr-only">Previo</span>
							</a>
							<a href="#carousel-timeline" class="right carousel-control main-rol" role="button" data-slide="next">
								<span class="right-arrow" aria-hidden="true"></span>
								<span class="sr-only">Siguiente</span>
							</a>
						<!--</div>-->
						<div class="slide_container col-sm-12 carousel-inner" role="listbox">
							<div class="slide col-sm-12 active item">
								<img src="{{ asset( 'images/tl_templo.jpg' ) }}" alt="">
								<span class="moment-description col-xs-10 col-sm-6 col-md-5">
									<h1>1979-1982</h1>
									<h2>Excavaciones del Templo Mayor en el Centro Histórico de la Ciudad de México</h2>
									<!--<p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p>-->
									<p></p>
									<a href="#" data-timeline-content="1979-1982" id="tl_1979">MÁS INFORMACIÓN <b>+</b></a>
								</span>
							</div>
							<div class="slide col-sm-12 item">
								<img src="{{ asset( 'images/tl_montefenix.jpg' ) }}" alt="">
								<span class="moment-description col-xs-10 col-sm-6 col-md-5">
									<h1>1980-1982</h1>
									<h2>Clínica Monte Fénix</h2>
									<!--<p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p>-->
									<p></p>
									<a href="#" data-timeline-content="1980-1982" id="tl_1980">MÁS INFORMACIÓN <b>+</b></a>
								</span>
							</div>
							<div class="slide col-sm-12 item">
								<img src="{{ asset( 'images/tl_donativo_rockefeller.jpg' ) }}" alt="">
								<span class="moment-description col-xs-10 col-sm-6 col-md-5">
									<h1>1981</h1>
									<h2>Donativo a Rockefeller University en N.Y.</h2>
									{{-- <p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p> --}}
									<p></p>
									<a href="#" data-timeline-content="1981" id="tl_1981">MÁS INFORMACIÓN <b>+</b></a>
								</span>
							</div>
							<div class="slide col-sm-12 item">
								<img src="{{ asset( 'images/tl_deporte.jpg' ) }}" alt="">
								<span class="moment-description col-xs-10 col-sm-6 col-md-5">
									<h1>1982</h1>
									<h2>Fomento Deportivo del Estado de Puebla</h2>
									<!--<p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p>-->
									<p></p>
									<a href="#" data-timeline-content="1982" id="tl_1982">MÁS INFORMACIÓN <b>+</b></a>
								</span>
							</div>
							<div class="slide col-sm-12 item">
								<img src="{{ asset( 'images/tl_museo_amparo.jpg' ) }}" alt="">
								<span class="moment-description col-xs-10 col-sm-6 col-md-5">
									<h1>1983</h1>
									<h2>Construcción, operación y administración del Museo Amparo</h2>
									{{-- <p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p> --}}
									<p></p>
									<a href="#" data-timeline-content="1983" id="tl_1983">MÁS INFORMACIÓN <b>+</b></a>
								</span>
							</div>
							<div class="slide col-sm-12 item">
								<img src="{{ asset( 'images/tl_becas_estudiantes.jpg' ) }}" alt="">
								<span class="moment-description col-xs-10 col-sm-6 col-md-5">
									<h1>1985</h1>
									<h2>Becas a estudiantes destacados </h2>
									{{-- <p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p> --}}
									<p></p>
									<a href="#" data-timeline-content="1985" id="tl_1985">MÁS INFORMACIÓN <b>+</b></a>
								</span>
							</div>
							<div class="slide col-sm-12 item">
								<img src="{{ asset( 'images/tl_museo_amparo.jpg' ) }}" alt="">
								<span class="moment-description col-xs-10 col-sm-6 col-md-5">
									<h1>1986</h1>
									<h2>Construcción, operación y administración del Museo Amparo</h2>
									{{-- <p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p> --}}
									<p></p>
									<a href="#" data-timeline-content="1986" id="tl_1986">MÁS INFORMACIÓN <b>+</b></a>
								</span>
							</div>
							<div class="slide col-sm-12 item">
								<img src="{{ asset( 'images/tl_montefenix.jpg' ) }}" alt="">
								<span class="moment-description col-xs-10 col-sm-6 col-md-5">
									<h1>1987-1993</h1>
									<h2>Clínica Monte Fénix</h2>
									{{-- <p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p> --}}
									<p></p>
									<a href="#" data-timeline-content="1987-1993" id="tl_1987">MÁS INFORMACIÓN <b>+</b></a>
								</span>
							</div>
							<div class="slide col-sm-12 item">
								<img src="{{ asset( 'images/tl_donativo_rockefeller.jpg' ) }}" alt="">
								<span class="moment-description col-xs-10 col-sm-6 col-md-5">
									<h1>1988-1990</h1>
									<h2>Donativo a Rockefeller University en N.Y.</h2>
									{{-- <p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p> --}}
									<p></p>
									<a href="#" data-timeline-content="1988-1990" id="tl_1988">MÁS INFORMACIÓN <b>+</b></a>
								</span>
							</div>
							<div class="slide col-sm-12 item">
								<img src="{{ asset( 'images/tl_lavictoria.jpg' ) }}" alt="">
								<span class="moment-description col-xs-10 col-sm-6 col-md-5">
									<h1>1993-2014</h1>
									<h2>Restauración, operación y administración del ExMercado La Victoria en Puebla, Puebla.</h2>
									{{-- <p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p> --}}
									<p></p>
									<a href="#" data-timeline-content="1993-2014" id="tl_1993">MÁS INFORMACIÓN <b>+</b></a>
								</span>
							</div>
							{{-- <div class="slide col-sm-12 active item">
								<img src="images/slider1.png" alt="">
								<span class="moment-description col-xs-10 col-sm-6 col-md-5">
									<h1>1986</h1>
									<h2>Creación de la fundación amparo</h2>
									<p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p>
									<a href="#" data-timeline-content="1986">MÁS INFORMACIÓN <b>+</b></a>
								</span>
								<!--<video controls>
									<source src="video/video.mp4" type="video/mp4">
									Your browser does not support the video tag.
								</video>-->
							</div>
							<div class="slide col-sm-12 item">
								<img src="images/slider1.png" alt="">
								<span class="moment-description col-xs-10 col-sm-6 col-md-5">
									<h1>1987</h1>
									<h2>Creación de la fundación amparo</h2>
									<p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p>
									<a href="#" data-timeline-content="1986">MÁS INFORMACIÓN <b>+</b></a>
								</span>
							</div>
							<div class="slide col-sm-12 item">
								<img src="images/slider1.png" alt="">
								<span class="moment-description col-xs-10 col-sm-6 col-md-5">
									<h1>1988</h1>
									<h2>Creación de la fundación amparo</h2>
									<p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p>
									<a href="#" data-timeline-content="1986">MÁS INFORMACIÓN <b>+</b></a>
								</span>
				  	    	</div> --}}
				  	    </div>
				  	    <div class="timeline-navigator col-xs-12 col-sm-12">
				  	    	<div class="navigator-container">
								<ol class="carousel-indicators">
									<li data-target="#carousel-timeline" data-slide-to="0" class="active"><span>1979-1982</span></li>
									<li data-target="#carousel-timeline" data-slide-to="1"><span>1980-1982</span></li>
									<li data-target="#carousel-timeline" data-slide-to="2"><span>1981</span></li>
									<li data-target="#carousel-timeline" data-slide-to="3"><span>1982</span></li>
									<li data-target="#carousel-timeline" data-slide-to="4"><span>1983</span></li>
									<li data-target="#carousel-timeline" data-slide-to="5"><span>1985</span></li>
									<li data-target="#carousel-timeline" data-slide-to="6"><span>1986</span></li>
									<li data-target="#carousel-timeline" data-slide-to="7"><span>1987-1993</span></li>
									<li data-target="#carousel-timeline" data-slide-to="8"><span>1988-1990</span></li>
									<li data-target="#carousel-timeline" data-slide-to="9"><span>1993-2014</span></li>
								</ol>
							</div>
				  	    </div>
				  	    <div class="navigator-buttons col-xs-12 col-sm-12">
							<a href="#carousel-timeline" class="left carousel-control secondary" role="button" data-slide="prev">
								<span class="left-arrow-secondary" aria-hidden="true"></span>
							</a>
							<span class="navigator-legend">Seleccionar año</span>
							<a href="#carousel-timeline" class="right carousel-control secondary" role="button" data-slide="next">
								<span class="right-arrow-secondary" aria-hidden="true"></span>
							</a>
			  	    	</div>
			  	    </div>
				</section>
				<section id="moments_time" class="container-fluid"></section>
			</div>
		</section>
	@stop
@stop