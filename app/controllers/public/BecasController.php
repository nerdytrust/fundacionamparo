<?php

class BecasController extends BaseController {

	/**
	 * Reglas de validación para el formulario de BECAS
	 * @var array
	 */
	private $rules_becas = [
		'lugar_estudios'	=> [ 'required' ],
		'nombre'			=> [ 'required', 'min:3', 'max:180' ],
		'apellido'			=> [ 'required', 'min:3', 'max:180' ],
		'email'				=> [ 'required', 'email' ],
		'telefono'			=> [ 'required', 'digits:10' ],
		'sexo'				=> [ 'required' ],
		'terminos'			=> [ 'accepted' ],
		'birth_day'			=> [ 'required' ],
		'birth_month'		=> [ 'required' ],
		'birth_year'		=> [ 'required' ]
	];

	/**
	 * Método para mostrar el formulario de becas
	 * @return
	 */
	public function index(){
		return View::make( 'public.becas.index' )->with( [
			'becas_totales'	=> Becas::where( 'otorgada', 1 )->count()
		] );
	}

	/**
	 * Método para procesar el formulario de Becas
	 * @return string JSON con respuesta errors y success
	 */
	public function processGrant(){
		if ( ! Request::ajax() )
			return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu petición</span>' ] ] );

		$inputs = Input::all();
		$validate = Validator::make( $inputs, $this->rules_becas );
		if ( $validate->fails() )
			return Response::json( [ 'success' => false, 'errors' => $validate->messages()->all('<span class="error">:message</span>') ] );

		$beca = new Becas;
		$beca->lugar_estudio 	= $inputs[ 'lugar_estudios' ];
		$beca->id_paises		= $inputs[ 'country' ];
		$beca->id_estados		= $inputs[ 'state' ];
		$beca->id_ciudades		= $inputs[ 'city' ];
		$beca->nombre			= $inputs[ 'nombre' ];
		$beca->apellidos		= $inputs[ 'apellido' ];
		$beca->email 			= $inputs[ 'email' ];
		$beca->telefono			= $inputs[ 'telefono' ];
		$beca->nacimiento		= Helper::convertDate( $inputs['birth_day'], $inputs['birth_month'], $inputs['birth_year'] );
		$beca->sexo 			= $inputs[ 'sexo' ];
		$beca->escuela			= $inputs[ 'escuela' ];
		$beca->turno			= $inputs[ 'turno' ];
		$beca->promedio			= $inputs[ 'promedio' ];
		$beca->motivo			= $inputs[ 'motivo' ];
		$beca->terminos 		= $inputs[ 'terminos' ];
		$beca->ip 				= Request::ip();
		$beca->browser 			= $_SERVER['HTTP_USER_AGENT'];
		if ( ! $beca->save() )
			return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu petición</span>' ] ] );

		return Response::json( [ 'success' => true, 'errors' => false, 'message' => 'Tu <strong>solicitud</strong> ha sido enviada correctamente, serás contactado a la brevedad.' ] );
	}

	/**
	 * Método para obtener las ciudades
	 * @return string JSON Ciudades dependiendo el estado
	 */
	public function getCity(){
		$state_id = Input::get( 'state_id' );
		$cities = Ciudades::select( 'id_ciudades', 'name' )->where( 'id_estados', $state_id )->get();
		return Response::json( $cities );
	}

	/**
	 * Método para obtener los estados
	 * @return string JSON Estados dependiendo el país
	 */
	public function getState(){
		$country_id = Input::get( 'country_id' );
		$states = Estados::select( 'id_estados', 'name' )->where( 'id_paises', $country_id )->get();
		return Response::json( $states );
	}

	/**
	 * Método para obtener los combos que se mostrarán en el formulario dependiendo la selección
	 * Extranjero o México
	 * @return string HTML Combos
	 */
	public function getCombos(){
		$place_id = Input::get( 'place_id' );
		switch ( $place_id ) {
			case 1:
				$view = View::make( 'public.becas.internacional' )->with( [ 'paises' => Paises::where( 'id_paises', '<>', 142 )->get() ] );
				return Response::json( $view->render() );
				break;
			case 2:
				return View::make( 'public.becas.nacional' )->with( [
					'estados'	=> Estados::where( 'id_paises', 142 )->get()
				] );
				break;
		}
	}
}

/* End of file BecasController.php */
/* Location: ./app/controllers/public/BecasController.php */