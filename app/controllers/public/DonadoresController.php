<?php

class DonadoresController extends BaseController {

	public function index( $filtro = '' ){
		$resultado = '';
		if ( empty( $filtro ) ){
			$resultado = DB::table( 'donaciones' )
				->join( 'registrados', 'donaciones.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'donaciones.status', 1 )
				->where( 'donaciones.mostrar_perfil', 1 )
				->select( 'profiles.photoURL', 'profiles.displayName', 'city' )
				->get();
		}
		if ( $filtro == 'donador' ){
			$resultado = DB::table( 'donaciones' )
				->join( 'registrados', 'donaciones.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'donaciones.status', 1 )
				->where( 'donaciones.mostrar_perfil', 1 )
				->select( 'profiles.photoURL', 'profiles.displayName', 'city' )
				->get();
		}
		return View::make( 'public.donadores.index' )->with( [
			'resultado' => $resultado
		] );
	}
}

/* End of file DonadoresController.php */
/* Location: ./app/controllers/public/DonadoresController.php */