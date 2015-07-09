<?php

class DonadoresController extends BaseController {

	public function index(){

		$filtro = Input::get( 'filtro' );
		$resultado = '';
		$type      = '';

		if ( empty( $filtro ) ){

			$donaciones = DB::table( 'donaciones' )
				->distinct()
				->join( 'registrados', 'donaciones.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'donaciones.status', 1 )
				->where( 'donaciones.mostrar_perfil', 1 )
				->select( 'profiles.id_profiles','profiles.photoURL', 'profiles.displayName', 'profiles.city', 'registrados.id_registrados' )
				->get();

			$voluntarios = DB::table( 'voluntarios' )
				->distinct()
				->join( 'registrados', 'voluntarios.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'voluntarios.aprobacion', 1 )
				->where( 'voluntarios.terminos', 1 )
				->select( 'profiles.id_profiles','profiles.photoURL', 'profiles.displayName', 'profiles.city', 'registrados.id_registrados' )
				->get();

			$impulsadas = DB::table( 'impulsadas' )
				->distinct()
				->join( 'registrados', 'impulsadas.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				//->where( 'impulsadas.status', 1 )
				->where( 'impulsadas.mostrar_perfil', 1 )
				->select( 'profiles.id_profiles', 'profiles.photoURL', 'profiles.displayName', 'profiles.city','registrados.id_registrados' )
				->get();

				foreach ($donaciones as $key => $value) {
					$resultado[$value->id_profiles] = $value;
					$type[$value->id_profiles]['donador'] = true;
				}
				foreach ($voluntarios as $key => $value) {
					$resultado[$value->id_profiles] = $value;
					$type[$value->id_profiles]['voluntario'] = true;
				}

				foreach ($impulsadas as $key => $value) {
					$resultado[$value->id_profiles] = $value;
					$type[$value->id_profiles]['impulsor'] = true;
				}
			$class = 'mio';
		} elseif ( $filtro == 'donador' ){
			$resultado = DB::table( 'donaciones' )
				->distinct()
				->join( 'registrados', 'donaciones.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'donaciones.status', 1 )
				->where( 'donaciones.mostrar_perfil', 1 )
				->select( 'profiles.photoURL', 'profiles.displayName', 'profiles.city', 'registrados.id_registrados' )
				->get();
			$type['all']['donador'] = true;	
			$class = 'mio3';
		} elseif ( $filtro == 'voluntario' ){
			$resultado = DB::table( 'voluntarios' )
				->distinct()
				->join( 'registrados', 'voluntarios.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'voluntarios.aprobacion', 1 )
				->where( 'voluntarios.terminos', 1 )
				->select( 'profiles.photoURL', 'profiles.displayName', 'profiles.city', 'registrados.id_registrados' )
				->get();
			$type['all']['voluntario'] = true;	
			$class = 'mio2';
		} else {
			$resultado = DB::table( 'impulsadas' )
				->distinct()
				->join( 'registrados', 'impulsadas.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				//->where( 'impulsadas.status', 1 )
				->where( 'impulsadas.mostrar_perfil', 1 )
				->select( 'profiles.photoURL', 'profiles.displayName', 'profiles.city', 'registrados.id_registrados' )
				->get();
			$type['all']['impulsor'] = true;
			$class = 'mio';
		}

		return View::make( 'public.donadores.index' )->with( [
			'resultado' => $resultado,
			'type'      => $type,
			'class'		=> $class
		] );
	}
}

/* End of file DonadoresController.php */
/* Location: ./app/controllers/public/DonadoresController.php */