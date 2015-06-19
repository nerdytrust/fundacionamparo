<?php

class DonadoresController extends BaseController {

	public function index(){
		$filtro = Input::get( 'filtro' );
		$resultado = '';
		if ( empty( $filtro ) ){
			$resultado = DB::table( 'donaciones' )
				->leftJoin( 'registrados', 'donaciones.email', '=', 'registrados.email' )
				->leftJoin( 'voluntarios', 'voluntarios.email', '=', 'registrados.email' )
				->leftJoin( 'impulsadas', 'impulsadas.email', '=', 'registrados.email' )
				->join( 'profiles', 'profiles.id_registrados', '=', 'registrados.id_registrados' )
				->where( 'donaciones.status', 1 )
				->where( 'donaciones.mostrar_perfil', 1 )
				->where( 'voluntarios.aprobacion', 1 )
				->where( 'registrados.terminos', 1  )
				->where( 'impulsadas.mostrar_perfil', 1 )
				->select( 'profiles.photoURL', 'profiles.displayName', 'profiles.city' )
				->toSql();
			print_r( $resultado );die;
			// $resultado = DB::table( 'registrados' )
			// 	->distinct()
			// 	->leftJoin( 'donaciones', 'donaciones.email', '=', 'registrados.email' )
			// 	->leftJoin( 'voluntarios', 'voluntarios.email', '=', 'registrados.email' )
			// 	->leftJoin( 'impulsadas', 'impulsadas.email', '=', 'registrados.email' )
			// 	->join( 'profiles', 'profiles.id_registrados', '=', 'registrados.id_registrados' )
			// 	->where( 'donaciones.status', 1 )
			// 	->where( 'donaciones.mostrar_perfil', 1 )
			// 	->where( 'voluntarios.aprobacion', 1 )
			// 	->where( 'registrados.terminos', 1  )
			// 	->where( 'impulsadas.mostrar_perfil', 1 )
			// 	->select( 'profiles.photoURL', 'profiles.displayName', 'profiles.city' )
			// 	->get();
			$class = 'mio';
		} elseif ( $filtro == 'donador' ){
			$resultado = DB::table( 'donaciones' )
				->distinct()
				->join( 'registrados', 'donaciones.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'donaciones.status', 1 )
				->where( 'donaciones.mostrar_perfil', 1 )
				->select( 'profiles.photoURL', 'profiles.displayName', 'profiles.city' )
				->get();
			$class = 'mio3';
		} elseif ( $filtro == 'voluntario' ){
			$resultado = DB::table( 'voluntarios' )
				->distinct()
				->join( 'registrados', 'voluntarios.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'voluntarios.aprobacion', 1 )
				->where( 'voluntarios.terminos', 1 )
				->select( 'profiles.photoURL', 'profiles.displayName', 'profiles.city' )
				->get();
			$class = 'mio2';
		} else {
			$resultado = DB::table( 'impulsadas' )
				->distinct()
				->join( 'registrados', 'impulsadas.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'impulsadas.status', 1 )
				->where( 'impulsadas.mostrar_perfil', 1 )
				->select( 'profiles.photoURL', 'profiles.displayName', 'profiles.city' )
				->get();
			$class = 'mio';
		}

		return View::make( 'public.donadores.index' )->with( [
			'resultado' => $resultado,
			'class'		=> $class
		] );
	}
}

/* End of file DonadoresController.php */
/* Location: ./app/controllers/public/DonadoresController.php */