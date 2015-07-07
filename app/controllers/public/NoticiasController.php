<?php

class NoticiasController extends BaseController {

	/**
	 * Método para mostrar la vista de la sección Noticias
	 * @return
	 */
	public function index(){
		return View::make( 'public.noticias.index' )->with( [
			'noticias'	=> Noticias::limit(6)->offset(0)->
							orderBy( 'fecha_publicacion', 'desc' )->get()
		] );
	}

	/**
	 * Método para cargar mas noticias vía ajax
	 * @param  int $limit      Delimita la busqueda de noticias
	 * @param  array $offset   Apartir de que noticia se va a mostrar
	 * @return json            Devuelve el json de las noticas ha cargar
	 */
	public function carga_noticias($limit, $offset){

		$noticias = Noticias::limit($limit)->offset($offset)
							  ->orderBy( 'fecha_publicacion','desc'  )
							  ->get();
		$string   = "";
		foreach ( $noticias as $noticia ){
			$string .=	'<div id="cja_noticia">';
			$string .=	'	<div id="caja_aporta2">';
			$string .=	'		<article class="caja_fca2">';
			$string .=	'			<a href="'.URL::to( 'ficha-noticias/' . $noticia->id_noticias ).'">';
			$string .=	'				<img src="'.asset( 'path_image/' . $noticia->imagen . '/' . '245x245' ).'" alt="">';
			$string .=	'			</a>';
			$string .=	'			</article>';
			$string .=	'			<div id="txt_noticia">';
			$string .=	'			<a href="'.URL::to( 'ficha-noticias/' . $noticia->id_noticias ).'" class="black-link"><h1>'.$noticia->titulo.'</h1></a>';
			$string .=	'			<h2>'.date("d M Y",strtotime($noticia->fecha_publicacion)) .'</h2>';
								if ( $noticia->extracto )
			$string .=	'				<p>'.Str::limit( $noticia->extracto, 180 ) .'</p>';
								else
			$string .=	'				<p>'.Str::limit( $noticia->contenido, 180 ) .'</p>';
		
			$string .=	'			<a href="'. URL::to( 'ficha-noticias/' . $noticia->id_noticias ) .'"><h3>MÁS INFORMACIÓN <span>+</span></h3></a>';
			$string .=	'			<nav>';
			$string .=	'				<ul>';
			$string .=						Helper::facebookShare( '', URL::to( 'ficha-noticias' ) . '/' . $noticia->id_noticias, '' );
			$string .=						Helper::twitterShare( $noticia->titulo, URL::to( 'ficha-noticias' ) . '/' . $noticia->id_noticias, '' );
			$string .=						Helper::like( $noticia->id_noticias, 'noticias' );
			$string .=	'					<p>'. $noticia->me_gusta .' likes</p>';
			$string .=	'				</ul>';
			$string .=	'			</nav>';
			$string .=	'		</div>';
			$string .=	'		</div>';
			$string .=	'</div>';
						}

		return Response::json( [ 'success'  => true, 
							     'noticias' => $string ] );
	}

	/**
	 * Método para cargar mas noticias vía ajax
	 * @param  int $limit      Delimita la busqueda de noticias
	 * @param  array $offset   Apartir de que noticia se va a mostrar
	 * @return json            Devuelve el json de las noticas ha cargar
	 */
	public function carga_noticias_resultado($limit, $offset,$s){

		$noticias = Noticias::limit($limit)->offset($offset)
								->where( 'titulo',    'LIKE', "%$s%" )
								->orWhere( 'contenido', 'LIKE', "%$s%" )
								->orWhere( 'extracto',  'LIKE', "%$s%" )
							  ->orderBy( 'fecha_publicacion','desc'  )
							  ->get();
		$string   = "";
		foreach ( $noticias as $noticia ){
			$string .=	'<div id="cja_noticia">';
			$string .=	'	<div id="caja_aporta2">';
			$string .=	'		<article class="caja_fca2">';
			$string .=	'			<a href="'.URL::to( 'ficha-noticias/' . $noticia->id_noticias ).'">';
			$string .=	'				<img src="'.asset( 'path_image/' . $noticia->imagen . '/' . '245x245' ).'" alt="">';
			$string .=	'			</a>';
			$string .=	'			</article>';
			$string .=	'			<div id="txt_noticia">';
			$string .=	'			<a href="'.URL::to( 'ficha-noticias/' . $noticia->id_noticias ).'" class="black-link"><h1>'.$noticia->titulo.'</h1></a>';
			$string .=	'			<h2>'.date("d M Y",strtotime($noticia->fecha_publicacion)) .'</h2>';
								if ( $noticia->extracto )
			$string .=	'				<p>'.Str::limit( $noticia->extracto, 180 ) .'</p>';
								else
			$string .=	'				<p>'.Str::limit( $noticia->contenido, 180 ) .'</p>';
		
			$string .=	'			<a href="'. URL::to( 'ficha-noticias/' . $noticia->id_noticias ) .'"><h3>MÁS INFORMACIÓN <span>+</span></h3></a>';
			$string .=	'			<nav>';
			$string .=	'				<ul>';
			$string .=						Helper::facebookShare( '', URL::to( 'ficha-noticias' ) . '/' . $noticia->id_noticias, '' );
			$string .=						Helper::twitterShare( $noticia->titulo, URL::to( 'ficha-noticias' ) . '/' . $noticia->id_noticias, '' );
			$string .=						Helper::like( $noticia->id_noticias, 'noticias' );
			$string .=	'					<p>'. $noticia->me_gusta .' likes</p>';
			$string .=	'				</ul>';
			$string .=	'			</nav>';
			$string .=	'		</div>';
			$string .=	'		</div>';
			$string .=	'</div>';
						}

		return Response::json( [ 'success'  => true, 
							     'noticias' => $string ] );
	}

}

/* End of file NoticiasController.php */
/* Location: ./app/controllers/public/NoticiasController.php */