<?php

class VoluntariosController extends BaseController {

	/**
	 * Reglas de validación para el paso uno del formulario corto de registro para Voluntarios
	 * @var array
	 */
	private $rules_step_one = [
		'causa_voluntario'	=> [ 'required' ]/*,
        'tipo_ayuda'		=> [ 'required' ]*/
	];

	/**
	 * Reglas de validación para el paso dos del formulario corto de registro para Voluntarios
	 * @var array
	 */
	private $rules_step_two = [
		'nombre'	=> [ 'required', 'min:3', 'max:180' ],
		'apellidos'	=> [ 'required', 'min:3', 'max:180' ],
		'email'		=> [ 'required', 'email' ],
		'telefono'	=> [ 'required', 'digits:10' ]
	];

	/**
	 * Reglas de validación para el formulario largo de registro para Voluntarios
	 * @var array
	 */
	private $rules_full_form = [
		'estado'		=> [ 'required' ],
		'causa'			=> [ 'required' ],
		'nombre'		=> [ 'required', 'min:3', 'max:180' ],
		'apellidos'		=> [ 'required', 'min:3', 'max:180' ],
		'email'			=> [ 'required', 'email' ],
		'telefono'		=> [ 'required', 'digits:10' ],
		'birth_day'		=> [ 'required' ],
		'birth_month'	=> [ 'required' ],
		'birth_year'	=> [ 'required' ],
		'sexo'			=> [ 'required' ],
		'terminos'		=> [ 'accepted' ]
	];
	
	/**
	 * Método para mostrar la vista por defecto de la sección Voluntarios
	 * @return
	 */
	public function index(){
		return View::make( 'public.voluntarios.index' )->with( [
			'voluntarios'	=> Voluntarios::where( 'aprobacion', 1 )->count(),
			'estados'		=> Estados::where( 'id_paises', 142 )->get(),
			'causas'		=> Causas::all(),
			'periodos'		=> Periodos::all(),
			'estudiantes'	=> TipoEstudiantes::all()
		] );
	}

	/**
	 * Método para procesar el paso uno del formulario corto de Voluntarios
	 * @return
	 */
	public function shortVoluntary(){
		if ( ! Request::ajax() )
			return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ] ] );

		$inputs = Input::all();
		$validate = Validator::make( $inputs, $this->rules_step_one );
		if ( $validate->fails() )
			return Response::json( [ 'success' => false, 'errors' => $validate->messages()->all('<span class="error">:message</span>') ] );

		Session::put( 'voluntario', $inputs );
		return Response::json( [ 'success' => true, 'redirect' => 'voluntario/paso-2' ] );
	}

	/**
	 * Método para procesar el paso dos del formulario corto de Voluntarios
	 * @return [type] [description]
	 */
	public function complementaryVoluntary(){
		if ( ! Request::ajax() )
			return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ] ] );

		$inputs = Input::all();
		$validate = Validator::make( $inputs, $this->rules_step_two );
		if ( $validate->fails() )
			return Response::json( [ 'success' => false, 'errors' => $validate->messages()->all('<span class="error">:message</span>') ] );

		Session::reflash();
		Session::put( 'voluntario.nombre', $inputs['nombre'] );
		Session::put( 'voluntario.apellidos', $inputs['apellidos'] );
		Session::put( 'voluntario.email', $inputs['email'] );
		Session::put( 'voluntario.telefono', $inputs['telefono'] );

		Session::put( 'voluntario.id_estados', $inputs['id_estados'] );
		Session::put( 'voluntario.id_ciudades', $inputs['id_ciudades'] );
		Session::put( 'voluntario.edad', $inputs['edad'] );
		Session::put( 'voluntario.ocupacion', $inputs['ocupacion'] );
		Session::put( 'voluntario.id_horarios', $inputs['id_horarios'] );
		Session::put( 'voluntario.tipo_ayuda', $inputs['tipo_ayuda'] );
		Session::put( 'voluntario.porque', $inputs['porque'] );


		if ( ! $this->saveShortVoluntary() )
			return Response::json( [ 'success' => false, 'errors' => '<span class="error">No se pudo registrar en nuestro sistema tu <strong>solicitud</strong>, favor de intenta nuevamente</span>' ] );

		return Response::json( [ 'success' => true, 'redirect' => 'voluntario/gracias' ] );
	}

	/**
	 * Método para procesar la información del registro largo de voluntarios
	 * @return string JSON con respuestas a las peticiones
	 */
	public function longVoluntary(){
		if ( ! Request::ajax() )
			return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ] ] );

		$inputs = Input::all();
		$validate = Validator::make( $inputs, $this->rules_full_form );
		if ( $validate->fails() )
			return Response::json( [ 'success' => false, 'errors' => $validate->messages()->all('<span class="error">:message</span>') ] );

		if ( ! $this->saveFullVoluntay( $inputs ) )
			return Response::json( [ 'success' => false, 'errors' => '<span class="error">No se pudo registrar en nuestro sistema tu <strong>solicitud</strong>, favor de intenta nuevamente</span>' ] );

		return Response::json( [ 'success' => true, 'errors' => false, 'message' => 'Tu <strong>solicitud</strong> ha sido enviada correctamente, serás contactado a la brevedad.' ] );
	}

	/**
	 * Método para guardar el formulario de registro corto de Voluntarios
	 * @return boolean TRUE si se guardó en BD, FALSE si no
	 */
	private function saveShortVoluntary(){
		$session = Session::get( 'voluntario' );
		$voluntario = new Voluntarios;
		$voluntario->id_causas 			= $session['causa_voluntario'];
		//$voluntario->id_tipo_ayudas 	= $session['tipo_ayuda'];
		$voluntario->nombre 			= $session['nombre'];
		$voluntario->apellidos 			= $session['apellidos'];
		$voluntario->email 				= $session['email'];
		$voluntario->telefono 			= $session['telefono'];
		$voluntario->terminos 			= 1;
		$voluntario->id_estados 		= $session['id_estados'];
		$voluntario->id_ciudades 		= $session['id_ciudades'];
		$voluntario->edad 			    = $session['edad'];
		$voluntario->ocupacion 			= $session['ocupacion'];
		$voluntario->id_horarios 		= $session['id_horarios'];
		$voluntario->tipo_ayuda 		= $session['tipo_ayuda'];
		$voluntario->porque 			= $session['porque'];
		$voluntario->ip 				= Request::ip();
		$voluntario->browser 			= $_SERVER['HTTP_USER_AGENT'];
		//if ( ! $voluntario->save() )
		//	return FALSE;

		// Si se guardó, se procede a enviar un correo al staff de Fundación Amparo
		$session['causa'] = Causas::first($session['causa_voluntario']);
		$voluntario_mail = Mail::send( 'public.mail.voluntario', $session, function( $message ) use ( $voluntario ){
			$message 
				->from( getenv( 'APP_NOREPLY' ), 'Fundación Amparo' )
				//->to( 'voluntarios@fundacionamparo.com', 'Contacto Fundación Amparo' )
				->to( 'fsanchez@nerdytrust.com', 'Voluntario Fundación Amparo' )
				->subject( 'Nuevo VOLUNTARIO desde el formulario' );
		} );

		return TRUE;
	}

	/**
	 * Método para guardar el formulario de registro largo de Voluntarios
	 * @param  array  $new Valores del formulario
	 * @return boolean      TRUE si se guardó en BD, FALSE si no
	 */
	private function saveFullVoluntay( $new = [] ){
		if ( empty( $new ) )
			return FALSE;

		$voluntario = new Voluntarios;
		$voluntario->id_causas			= $new['causa'];
		$voluntario->id_estados			= $new['estado'];
		$voluntario->id_ciudades		= $new['ciudad'];
		$voluntario->nombre				= $new['nombre'];
		$voluntario->apellidos			= $new['apellidos'];
		$voluntario->email 				= $new['email'];
		$voluntario->telefono			= $new['telefono'];
		$voluntario->nacimiento 		= Helper::convertDate( $new['birth_day'], $new['birth_month'], $new['birth_year'] );
		$voluntario->id_sexos			= $new['sexo'];
		$voluntario->id_horarios 		= $new['turno'];
		$voluntario->id_estudiantes 	= $new['tipo_estudiante'];
		$voluntario->terminos 			= $new['terminos'];
		$voluntario->ip 				= Request::ip();
		$voluntario->browser 			= $_SERVER['HTTP_USER_AGENT'];
		if ( ! $voluntario->save() )
			return FALSE;

		return TRUE;
	}
}

/* End of file VoluntariosController.php */
/* Location: ./app/controllers/public/VoluntariosController.php */