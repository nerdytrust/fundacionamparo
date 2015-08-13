<button class="btn btn-cerrar" id="close-momento"></button>
		<div class="container-fluid">
		<div class="row">
		 <section class="slider">
	        <div class="flexslider interior">
	          <ul class="slides">
		        @if ( isset( $momentos ) )
					@foreach ( $momentos as $momento )
						<li data-toggle="tooltip" data-title="{{ $momento->titulo }}" data-year=" " data-target="#carousel-timeline-moments" data-slide-to="0" class="col-md-12">
		  	    	    <img src="{{ asset( 'path_image/' . $momento->imagen) }}" />
		  	    	    <div class="col-xs-12 col-sm-12 col-md-5 cuadro">
		  	    	    	<span class="adorno">{{ $momento->nombre }}</span>
		  	    	    	<h1><b>{{ $momento->year }}</b>
								{{ $momento->titulo }}
							</h1>
		  	    	    	<h2>
								{{ $momento->descripcion }}
		  	    	    	</h2>
		  	    	    	<section id="social_top">
								<ul>
									{{ Helper::facebookShare( '', URL::to( 'muro-exito' ) ) }}
									{{ Helper::twitterShare( $momento->titulo, URL::to( 'muro-exito' ) . '/' . $momento->id_momentos, '' ) }}
									{{ Helper::like( $momento->id_momentos, 'muros' ) }}
									<p>{{ $momento->me_gusta }} likes</p>
								</ul>
							</section>
		  	    	    </div>
		  	    		</li>
					@endforeach
				@endif
	          </ul>
	        </div>
	      </section>
	      </div>
	</div><!--termina container fluid-->
	<script type="text/javascript">
			$('#close-momento').click(function(e){
	            e.preventDefault();
	            $('#moments_time').fadeOut(500, "swing", function(){
	            $('#main_time').fadeIn(1000);
	            $('#moments_time').html(' ');
	            });

	        });
	</script>
