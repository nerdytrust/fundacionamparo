<button class="btn btn-cerrar" onclick="cerrarMomento();"></button>
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
			<img src="{{ asset( 'images/tl_templo.jpg' ) }}" alt="">
			<span class="moment-description col-sm-12 col-md-7 col-lg-7">
				<h3><label class="label label-default label-white">CULTURA</label></h3>
				<h1>1980</h1>
				<h2>Excavaciones del Templo Mayor en el Centro Histórico de la Ciudad de México</h2>
				{{-- <p>
					En abril de 1979, Don Manuel Espinosa Yglesias sienta las bases constitutivas de la Fundación Amparo, estableciendo que su constitución la realizaba con parte de la fortuna que había formado con ayuda de su inolvidable esposa Doña Amparo Rugarcía de Espinosa.
				</p> --}}
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
				<li data-target="#carousel-timeline-moments" data-slide-to="0" class="active"><span></span></li>
			</ol>
		</div>
    </div>
    <div class="navigator-buttons col-xs-12 col-sm-12">
		<a href="#carousel-timeline-moments" class="left carousel-control secondary" role="button" data-slide="prev">
			<span class="left-arrow-secondary" aria-hidden="true"></span>
		</a>
		<span class="navigator-legend">1979-1982</span>
		<a href="#carousel-timeline-moments" class="right carousel-control secondary" role="button" data-slide="next">
			<span class="right-arrow-secondary" aria-hidden="true"></span>
		</a>
	</div>
</div>