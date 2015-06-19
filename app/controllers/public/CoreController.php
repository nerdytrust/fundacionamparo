<?php

class CoreController extends BaseController {

	/**
	 * Método para procesar las peticiones de los likes a los contenidos
	 * @return
	 */
	public function likeProcess(){
		if ( ! Request::ajax() )
			return Response::json( [ 'success' => false, 'errors' => [ 'Ocurrió un problema' ] ] );

		// Verificamos que la sesión de likes no exista, y la creamos, y se guarda en BD dependiento
		// el tipo de contenido
		$inputs = Input::all();
		if ( ! Session::has( 'likes' ) ){
			Session::push( 'likes', $inputs );
			switch ( $inputs['content_type'] ) {
				case 'causas':
					$this->likeCauses( $inputs );
					break;
				case 'membresias':
					$this->likeMembresias( $inputs );
					break;
				case 'noticias':
					$this->likeNoticias( $inputs );
					break;
			}
		}

		// Cuando la sesión existe, revisamos que el ID y el tipo del contenido no exista en la petición
		// Si no existe, la agregamos y guardamos en BD dependiendo el tipo de contenido
		$likes = Session::get( 'likes' );
		if ( ! in_array( $inputs, $likes ) ){
			Session::push( 'likes', $inputs );
			switch ( $inputs['content_type'] ) {
				case 'causas':
					$this->likeCauses( $inputs );
					break;
				case 'membresias':
					$this->likeMembresias( $inputs );
					break;
				case 'noticias':
					$this->likeNoticias( $inputs );
					break;
			}
		}

		return Response::json( [ 'success' => true, 'errors' => false ] );
	}

	/**
	 * Método para guardar el like del tipo de contenido Causas
	 * @param  array  $inputs Datos del Contenido
	 * @return
	 */
	private function likeCauses( $inputs = [] ){
		Causas::where( 'id_causas', $inputs['content_id'] )->increment( 'me_gusta_interno' );
	}

	/**
	 * Método para guardar el like del tipo de contenido Membresías
	 * @param  array  $inputs Datos del Contenido
	 * @return
	 */
	private function likeMembresias( $inputs = [] ){
		Membresias::where( 'id_membresias', $inputs['content_id'] )->increment( 'me_gusta' );
	}

	/**
	 * Método para guardar el like del tipo de contenido Noticias
	 * @param  array  $inputs Datos del Contenido
	 * @return
	 */
	private function likeNoticias( $inputs = [] ){
		Noticias::where( 'id_noticias', $inputs['content_id'] )->increment( 'me_gusta' );
	}
}

/* End of file CoreController.php */
/* Location: ./app/controllers/public/CoreController.php */