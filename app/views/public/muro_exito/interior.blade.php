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
		  	    	    <div class="col-xs-12 col-sm-12 col-md-8 cuadro">
		  	    	    	<span class="adorno">{{ $momento->nombre }}</span>
		  	    	    	<h1><b>{{ $momento->year }}</b>
								{{ $momento->titulo }}
							</h1>
		  	    	    	<h2>
								{{ Str::limit( $momento->descripcion, 450 ) }}
		  	    	    	</h2>
		  	    	    	<section id="social_top" class="social_timeline">
								<ul>
									{{ Helper::facebookShare( '', URL::to( 'muro-exito' ) ) }}
									{{ Helper::twitterShare( $momento->titulo, URL::to( 'muro-exito' ) . '/' . $momento->id_momentos, '' ) }}
									{{ Helper::like( $momento->id_muros, 'muros' ) }}
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
			/**
			 * Objeto con las opciones del spinner
			 * @type {Object}
			 */
			var opts = {
				lines: 17,
				length: 15,
				width: 12,
				radius: 30,
				scale: 0.50,
				corners: 1,
				rotate: 0,
				direction: 1,
				color: '#beda3e',
				speed: 1.4,
				trail: 100,
				shadow: false,
				hwaccel: false,
				className: 'spinner',
				zIndex: 2e9,
				top: '50%',
				left: '50%'
			};
			var target = document.getElementById('foo');
			$('#close-momento').click(function(e){
	            e.preventDefault();
	            $('#moments_time').fadeOut(500, "swing", function(){
	            $('#main_time').fadeIn(1000);
	            $('#moments_time').html(' ');
	            });

	        });
	        /**
			 * Método para procesar un "ME GUSTA" de algún contenido
			 */
			$('.like-process').click(function(){
				var spinner = new Spinner(opts).spin(target);
				var content_id 		= $(this).attr( 'data-contenido' );
				var content_type 	= $(this).attr( 'data-tipo' );
				$.ajax({
					url: 'like',
					method: 'POST',
					dataType: 'json',
					data: { content_id: content_id, content_type: content_type },
					beforeSend: function(){
						$('#foo').css( 'display', 'block' );
					},
					success: function(data){
						if ( data.success )
							window.location.reload();
					},
					error: function(data){
						spinner.stop();
						$('#foo').css('display','none');
						console.log( data.errors );
					}
				});
				return false;
			});
	</script>
