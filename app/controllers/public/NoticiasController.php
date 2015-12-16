<?php

class NoticiasController extends BaseController {

	/**
	 * Método para mostrar la vista de la sección Noticias
	 * @return
	 */
	public function index(){
		return View::make( 'public.noticias.index' )->with( [
			'noticias'	=> Noticias::limit(6)->offset(0)->
							orderBy( 'fecha_publicacion', 'desc' )->get(),
			'nNoticias' => Noticias::count()
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

		$perfiles = array();

		$noticias = Noticias::limit($limit)->offset($offset)
				->where( 'titulo',    'LIKE', "%$s%" )
				->orWhere( 'contenido', 'LIKE', "%$s%" )
				->orWhere( 'extracto',  'LIKE', "%$s%" )
			    ->orderBy( 'fecha_publicacion','desc'  )
			    ->get();

		$causas = DB::table( 'causas' )->limit($limit)->offset($offset)
				->where( 'titulo',    'LIKE', "%$s%" )
				->orWhere( 'descripcion', 'LIKE', "%$s%" )
				->orderBy( 'created_at','desc' )
				->select( '*' )
				->get();

		$donaciones = DB::table( 'donaciones' )->limit($limit)->offset($offset)
				->distinct()
				->join( 'registrados', 'donaciones.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'donaciones.status', 1 )
				->where( 'donaciones.mostrar_perfil', 1 )
				->where( 'profiles.displayName','LIKE', "%$s%" )
				->select( 'profiles.id_profiles','profiles.photoURL', 'profiles.displayName', 'profiles.city','registrados.id_registrados','registrados.me_gusta' )
				->get();

		$voluntarios = DB::table( 'voluntarios' )->limit($limit)->offset($offset)
				->distinct()
				->join( 'registrados', 'voluntarios.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'voluntarios.aprobacion', 1 )
				->where( 'voluntarios.terminos', 1 )
				->where( 'profiles.displayName','LIKE', "%$s%" )
				->select( 'profiles.id_profiles','profiles.photoURL', 'profiles.displayName', 'profiles.city','registrados.id_registrados','registrados.me_gusta' )
				->get();

		$impulsadas = DB::table( 'impulsadas' )->limit($limit)->offset($offset)
				->distinct()
				->join( 'registrados', 'impulsadas.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				//->where( 'impulsadas.status', 1 )
				->where( 'impulsadas.mostrar_perfil', 1 )
				->where( 'profiles.displayName','LIKE', "%$s%" )
				->select( 'profiles.id_profiles', 'profiles.photoURL', 'profiles.displayName', 'profiles.city','registrados.id_registrados','registrados.me_gusta' )
				->get();

				foreach ($donaciones as $key => $value) {
					$perfiles[$value->id_profiles] = $value;
					$type[$value->id_profiles]['donador'] = true;
				}
				foreach ($voluntarios as $key => $value) {
					$perfiles[$value->id_profiles] = $value;
					$type[$value->id_profiles]['voluntario'] = true;
				}

				foreach ($impulsadas as $key => $value) {
					$perfiles[$value->id_profiles] = $value;
					$type[$value->id_profiles]['impulsor'] = true;
				}

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

		foreach ( $causas as $causa ){
			$string .=	'<div id="cja_noticia">';
			$string .=	'	<div id="caja_aporta2">';
			$string .=	'		<article class="caja_fca2">';
			$string .=	'			<a href="'.URL::to( 'ficha-causas/' . $causa->id_causas . '/' . Str::slug($causa->titulo) ).'">';
			$string .=	'				<img src="'.asset( 'path_image/' . $causa->imagen . '/' . '245x245' ).'" alt="">';
			$string .=	'			</a>';
			$string .=	'			</article>';
			$string .=	'			<div id="txt_noticia">';
			$string .=	'			<a href="'.URL::to( 'ficha-causas/' . $causa->id_causas . '/' . Str::slug($causa->titulo) ).'" class="black-link"><h1>'.$causa->titulo.'</h1></a>';
			$string .=	'			<h2>'.date("d M Y",strtotime($causa->created_at)) .'</h2>';
								
			
								
			$string .=	'				<p>'.Str::limit( $causa->descripcion, 180 ) .'</p>';
		
			$string .=	'			<a href="'. URL::to( 'ficha-causas/' . $causa->id_causas . '/' . Str::slug($causa->titulo) ) .'"><h3>MÁS INFORMACIÓN <span>+</span></h3></a>';
			$string .=	'			<nav>';
			$string .=	'				<ul>';
			$string .=						Helper::facebookShare( '', URL::to( 'ficha-causas' ) . '/' . $causa->id_causas . '/' . Str::slug($causa->titulo), '' );
			$string .=						Helper::twitterShare( $causa->titulo, URL::to( 'ficha-noticias' ) . '/' . $causa->id_causas, '' );
			$string .=						Helper::like( $causa->id_causas, 'causas' );
			$string .=	'					<p>'. $causa->me_gusta_interno .' likes</p>';
			$string .=	'				</ul>';
			$string .=	'			</nav>';
			$string .=	'		</div>';
			$string .=	'		</div>';
			$string .=	'</div>';
		}

		foreach ( $perfiles as $perfil ){
			$string .=	'<div id="cja_noticia">';
			$string .=	'	<div id="caja_aporta2">';
			$string .=	'		<article class="caja_fca2">';
			$string .=	'			<a href="'.URL::to( 'ficha-donador/' . $perfil->id_registrados ).'">';
			$string .=	'				<img src="'. $perfil->photoURL .'" alt="">';
			$string .=	'			</a>';
			$string .=	'			</article>';
			$string .=	'			<div id="txt_noticia">';
			$string .=	'			<a href="'.URL::to( 'ficha-donador/' . $perfil->id_registrados ).'" class="black-link"><h1>'.$perfil->displayName.'</h1></a>';
			$string .=	'				<p>'.Str::limit( $perfil->city, 180 ) .'</p>';
			$string .=	'			<a href="'. URL::to( 'ficha-donador/' . $perfil->id_registrados ) .'"><h3>MÁS INFORMACIÓN <span>+</span></h3></a>';
			$string .=	'			<nav>';
			$string .=	'				<ul>';
			$string .=						Helper::facebookShare( '', URL::to( 'ficha-donador' ) . '/' . $perfil->id_registrados, '' );
			$string .=						Helper::twitterShare( $perfil->displayName, URL::to( 'ficha-donador' ) . '/' . $perfil->id_registrados, '' );
			$string .=						Helper::like( $perfil->id_registrados, 'causas' );
			$string .=	'					<p>'.$perfil->me_gusta.' likes</p>';
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