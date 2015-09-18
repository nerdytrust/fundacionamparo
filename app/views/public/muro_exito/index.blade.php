<?php $timeline = 1; $disable_footer = 1; ?>
@extends( 'public.layout' )
	@section( 'class' )timeline-section
	@stop
	@section( 'content' )
		<div class="container-fluid" id="Contenedor">
			<div class="row">
				<section id="main_time" class="slider">
					<div class="flexslider">
						<ul class="slides">
						@if ( isset( $momentos ) )
							@foreach ( $momentos as $momento )
							<li data-title="" data-year="{{ $momento->year }}" data-target="#carousel-timeline-moments" data-slide-to="0" class="col-md-12"
								@if ( $momento->hijos > 0 )
									{{ "data-id =".$momento->id_muros }}
									{{ "data-momento ='momento'"}}
								@endif

							>
								<img src="{{ asset( 'path_image/' . $momento->imagen ) }}" />
								<div class="col-xs-12 col-sm-12 col-md-8 cuadro">
									<h1><b>{{ $momento->year }}</b>
										{{ $momento->titulo }}
									</h1>
									<h2>
										{{ Str::limit( $momento->descripcion, 450 ) }}
									</h2>
								</div>
							</li>
							@endforeach
						@endif
						</ul>
					</div>
					
				</section>
				<section id="moments_time" class="container-fluid" style="display: none;"></section>
			</div>
		</div><!--termina container fluid-->
	@stop
@stop