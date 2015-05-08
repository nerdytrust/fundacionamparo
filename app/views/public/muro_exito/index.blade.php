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
								<img src="{{ asset( 'images/donativo_rockefeller.jpg' ) }}" alt="">
								<span class="moment-description col-xs-10 col-sm-6 col-md-5">
									<h1>1981</h1>
									<h2>Donativo a Rockefeller University en N.Y.</h2>
									<p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p>
									<a href="#" data-timeline-content="1986">MÁS INFORMACIÓN <b>+</b></a>
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
									<li data-target="#carousel-timeline" data-slide-to="0" class="active"><span>1986</span></li>
									<li data-target="#carousel-timeline" data-slide-to="1"><span>1990</span></li>
									<li data-target="#carousel-timeline" data-slide-to="2"><span>1992</span></li>
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
				<section id="moments_time" class="container-fluid">
					<button class="btn btn-cerrar"></button>
					<div id="carousel-timeline-moments" class="row carousel slide" data-ride="carousel" data-interval="false">
						<a href="#carousel-timeline-moments" class="left carousel-control main-rol" role="button" data-slide="prev">
							<span class="left-arrow" aria-hidden="true"></span>
							<span class="sr-only">Previo</span>
						</a>
						<a href="#carousel-timeline-moments" class="right carousel-control main-rol" role="button" data-slide="next">
							<span class="right-arrow" aria-hidden="true"></span>
							<span class="sr-only">Siguiente</span>
						</a>
						<div class="slide_container col-sm-12 carousel-inner" role="listbox">
							<div class="slide col-sm-12 active item">
								<img src="images/slider1.png" alt="">
								<span class="moment-description col-sm-12 col-md-7 col-lg-7">
									<h3><label class="label label-default label-white">EDUCACIÓN</label></h3>
									<h1>1986</h1>
									<h2>Creación de la fundación amparo</h2>
									<p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p>
									<section class="social_top">
										<ul class="col-sm-12 col-md-6">
											<li><a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
											<li><a href="www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
											<li><a href=""><i class="fa fa-heart"></i></a></li>
											<p>96 likes</p>
										</ul>	
									</section>
								</span>
								<!--<video controls>
									<source src="video/video.mp4" type="video/mp4">
									Your browser does not support the video tag.
								</video>-->
							</div>
							<div class="slide col-sm-12 item">
								<img src="images/slider1.png" alt="">
								<span class="moment-description col-sm-12 col-md-7 col-lg-7">
									<h3><label class="label label-default label-white">EDUCACIÓN</label></h3>
									<h1>1986</h1>
									<h2>Creación de la fundación amparo</h2>
									<p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p>
									<section class="social_top">
										<ul class="col-sm-12 col-md-6">
											<li><a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
											<li><a href="www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
											<li><a href=""><i class="fa fa-heart"></i></a></li>
											<p>96 likes</p>
										</ul>	
									</section>
								</span>
							</div>
							<div class="slide col-sm-12 item">
								<img src="images/slider1.png" alt="">
								<span class="moment-description col-sm-12 col-md-7 col-lg-7">
									<h3><label class="label label-default label-white">EDUCACIÓN</label></h3>
									<h1>1986</h1>
									<h2>Creación de la fundación amparo</h2>
									<p>
										En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
									</p>
									<section class="social_top">
										<ul class="col-sm-12 col-md-6">
											<li><a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
											<li><a href="www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
											<li><a href=""><i class="fa fa-heart"></i></a></li>
											<p>96 likes</p>
										</ul>	
									</section>
								</span>
				  	    	</div>
				  	    </div>
				  	    <div class="timeline-navigator col-xs-12 col-sm-12">
				  	    	<div class="navigator-container">
								<ol class="carousel-indicators">
									<li data-target="#carousel-timeline-moments" data-slide-to="0" class="active"><span>Marzo</span></li>
									<li data-target="#carousel-timeline-moments" data-slide-to="1"><span>Abril</span></li>
									<li data-target="#carousel-timeline-moments" data-slide-to="2"><span>Mayo</span></li>
								</ol>
							</div>
				  	    </div>
				  	    <div class="navigator-buttons col-xs-12 col-sm-12">
							<a href="#carousel-timeline-moments" class="left carousel-control secondary" role="button" data-slide="prev">
								<span class="left-arrow-secondary" aria-hidden="true"></span>
							</a>
							<span class="navigator-legend">1986</span>
							<a href="#carousel-timeline-moments" class="right carousel-control secondary" role="button" data-slide="next">
								<span class="right-arrow-secondary" aria-hidden="true"></span>
							</a>
			  	    	</div>
			  	    </div>
				</section>
			</div>
		</section>
	@stop
@stop