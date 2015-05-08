<?php

class HomeController extends BaseController {

	/**
	 * Método para la sección de home, se envían a la vista los elementos de video, causas
	 * últimos donadores
	 * Se manda la librería Helper mediante el método with
	 * @return [type] vista del home
	 */
	public function home(){
		$video = HomeVideo::where( 'activo', 'Active' )->firstOrFail();
		$causas = Causas::orderByRaw( 'RAND()' )->take(3)->get();
		$donadores = Donadores::orderBy( 'created_at', 'DESC' )->take(5)->get();
		$total_donadores = Session::get( 'total_donadores' );
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
		$data = [];
		if ( Auth::check() )
			$data = Auth::user();
		return View::make( 'public.home.entrar' )->with( [ 'helper' => new Helper, 'data' => $data ] );
	}

	public function registro(){
		return View::make( 'public.home.registro' );
	}
}