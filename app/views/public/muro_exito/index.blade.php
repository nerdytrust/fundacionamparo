<?php $timeline = 1; $disable_footer = 1; $video = 1 ?>
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
								@if ( $momento->video != '' )
									<div class="vi-timeline">
										<a href="{{ asset ( 'path_video/' . $momento->video ) }}">
											<div class="button-play button-play-timeline" role="button"><span aria-hidden="true"></span></div>
										</a>
									</div>	
								@endif	
								<div class="col-xs-12 col-sm-12 col-md-6 cuadro">
									<h1><b>{{ $momento->year }}</b>
										{{ $momento->titulo }}
									</h1>
									<h2>
										{{ Str::limit( $momento->descripcion, 450 ) }}
									</h2>
									@if ( $momento->hijos > 0 )
										<h3 class="todos-momentos" id="momento"><a id="{{$momento->id_muros}}">VER TODOS LOS EVENTOS <span>+</span></a></h3>
									@endif
								</div>

							</li>
							@endforeach
						@endif
						</ul>
						<div class="col-xs-12 col-md-12 controls-ol">
							<button type="button" class="btn ct pull-left" id="timeline_left"></button>
							<button type="button" class="btn ct2 pull-right" id="timeline_right"></button>
							<!--<p class="col-md-3">Seleccionar año</p>-->
						</div>
					</div>
					
				</section>
				<section id="moments_time" class="container-fluid" style="display: none;"></section>
			</div>
		</div><!--termina container fluid-->
		<script type="text/javascript">
					document.addEventListener("DOMContentLoaded", function(event) { 
						baguetteBox.run('.vi-timeline');
					});
				</script>
	@stop
@stop