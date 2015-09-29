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
		'email'				=> [ 'required', 'email', 'unique:becas' ],
		'telefono'			=> [ 'required', 'numeric', 'min:10' ],
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
	 * Método para visualizar la vista bases
	 * @return
	 */
	public function bases(){
		return View::make( 'public.becas.bases' );
	}

	/**
	 * Método para visualizar la vista bases
	 * @return
	 */
	public function otorgadas(){
		return View::make( 'public.becas.otorgadas' )->with( [
			'becas' => Becas::where("otorgada",1)
							->leftJoin( 'ciudades', 'becas.id_ciudades', '=', 'ciudades.id_ciudades' )
							->get()
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

		if($inputs['lugar_estudios']==0){
			$inputs[ 'country' ] = 0;
			$inputs[ 'state' ]   = 0;
			$inputs[ 'city' ]    = 0;
		}
		if($inputs['lugar_estudios']==1){
			$this->rules_becas['country'] = [ 'required' ];
			$this->rules_becas['state']   = [ 'required' ];
			$this->rules_becas['city']    = [ 'required' ];
		} 
		if($inputs['lugar_estudios']==2){
			$inputs[ 'country' ] = 142;
			$this->rules_becas['state'] = [ 'required' ];
			$this->rules_becas['city']  = [ 'required' ];			
		}

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

		// Si se guardó, se procede a enviar un correo al staff de Fundación Amparo
		$comment = Mail::send( 'public.mail.becas', $inputs, function( $message ) use ( $beca ){
			$message 
				->from( getenv( 'APP_NOREPLY' ), 'no-reply' )
				->to( 'contacto@nerdytrust.com', 'Beca Fundación Amparo' )
				->subject( 'Nueva beca solicitada' );
		} );

		return Response::json( [ 'success' => true, 'redirect' => 'gracias-beca' ] );
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

	/**
	 * Método para visualizar la vista gracias
	 * @return
	 */
	public function gracias(){
		return View::make( 'public.becas.gracias' );
	}
}

/* End of file BecasController.php */
/* Location: ./app/controllers/public/BecasController.php */