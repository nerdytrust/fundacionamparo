<?php 
	$disable_header = 1; $disable_footer = 1; 
	$share_fb  = [ 
		'title'       => $noticia->titulo .' - '. $noticia->fecha_publicacion,
		'description' => $noticia->contenido,
		'image'       => asset( 'path_image/' . $noticia->imagen . '/' . '540x565' )
	];
?>
@extends( 'public.covers.layout' )
	@section( 'class' )ficha-noticias
	@stop
	@section( 'content' )
		<div class="lightbox" style="display:block;">
			<div class="usuario-light">
				<span class="usuario foto">
					<div id="txt_evento">						
						<nav>
							<ul>
								{{ Helper::facebookShare( '', Request::url(), '' ) }}
								{{ Helper::twitterShare( $noticia->titulo, Request::url(), '' ) }}
								{{ Helper::like( $noticia->id_noticias, 'noticias' ) }}
								<p>{{ $noticia->me_gusta }} likes</p>
							</ul>
						</nav>
					</div>
					<img src="{{ asset( 'path_image/' . $noticia->imagen . '/' . '540x565' ) }}" alt="" id="ev-im">
				</span>
				<span class="datos ev">
					<button value="" class="cerrar" onClick="history.back()"></button>
					<h1>{{ $noticia->titulo }}</h1>
						<h2>{{ $noticia->fecha_publicacion }}</h2>
					<div class="datos-inf" id="style-4">
						<p>{{ $noticia->contenido }}</p>
					</div>
				</span>
			</div>
		</div>
	@stop
@stop