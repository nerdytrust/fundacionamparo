<?php


class HomeController extends BaseController {

	/**
	 * Método para la sección de home, se envían a la vista los elementos de video, causas
	 * últimos donadores
	 * Se manda la librería Helper mediante el método with
	 * @return Vista del Home
	 */
	public function home(){
		$video = HomeVideo::where( 'activo', 'Active' )->firstOrFail();
		$causas = Causas::orderBy( 'orden' )->take(3)->get();
		$donadores = Donadores::orderBy( 'created_at', 'DESC' )->take(5)->get();
		$total_donadores = Session::get( 'total_donadores' );
		// $hybridauth = new Hybrid_Auth();
		// print_r( $hybridauth );die;
		if ( ! $total_donadores || empty( $total_donadores ) )
			$total_donadores = DB::table( 'donadores' )->distinct( 'id_fb' )->count();
		Session::put( 'total_donadores', $total_donadores );
	    return View::make( 'public.home.index' )->with( [ 
	    	'video' 			=> $video,
	    	'causas' 			=> $causas,
	    	'donadores'			=> $donadores,
	    	'helper' 			=> new Helper
	    ] );
	}

	public function index(){
		return View::make( 'public.home.entrar' )->with( [ 'helper' => new Helper ] );
	}

	/**
	 * Método para mostrar la vista de las políticas de privacidad
	 * @return Vista de políticas de privacidad
	 */
	public function privacidad(){
		return View::make( 'public.home.privacy' );
	}

	public function registro(){
		return View::make( 'public.home.registro' );
	}

	public function search(){
		$resultados = '';
		$s = Input::get( 's' );
		if ( ! isset( $s ) || empty ( $s ) )
			$resultados = null;

		$resultados = $s;
		return View::make( 'public.home.resultados' )->with( [
			'resultados' => $resultados,
			'helper' => new Helper
		] );
	}
}

/* End of file HomeController.php */
/* Location: ./app/controllers/public/HomeController.php */