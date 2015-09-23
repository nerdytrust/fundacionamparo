<?php

class ApoyarCausaController extends BaseController {

	/**
	 * Reglas de validación del formulario
	 * @var array
	 */
	private $rules = [
		'nombre'	  => [ 'required', 'min:3', 'max:150' ],
		'telefono'	  => [ 'required', 'numeric', 'min:10' ],
		'email'		  => [ 'required', 'email', 'unique:apoyamos_causa' ],
		'causa_tipo'  => [ 'required' ],
		'descripcion' => [ 'required' ]
	];

    /**
     * Método para mostrar la vista de la sección Apoyamos tu Causa
     * @return
     */
	public function index(){
		$categorias = Categorias::get();
		return View::make( 'public.apoyamos.index' )->with( [
			'categorias' 	=> $categorias
		] );
	}

	/**
	 * Método para procesar la información del formulario de registro de Causa
	 * @return
	 */
	public function registrar(){

		if ( ! Request::ajax() )
			return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu petición</span>' ] ] );

		$inputs = Input::all();

		$validation = Validator::make( $inputs, $this->rules );

		if ( $validation->fails() )
			return Response::json( [ 'success' => false, 'errors' => $validation->messages()->all('<span class="error">:message</span>') ] );

		$causa = new ApoyamosCausa;
		$causa->nombre 			= Input::get( 'nombre' );
		$causa->telefono 		= Input::get( 'telefono' );
		$causa->email 			= Input::get( 'email' );
		$causa->id_categorias	= Input::get( 'causa_tipo' );
		$causa->descripcion		= Input::get( 'descripcion' );
		$causa->ip				= Request::ip();

		if ( ! $causa->save() )
			return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu petición</span>' ] ] );

		// Si se guardó, se procede a enviar un correo al staff de Fundación Amparo
		$comment = Mail::send( 'public.mail.apoyamos', $inputs, function( $message ) use ( $causa ){
			$message 
				->from( getenv( 'APP_NOREPLY' ), 'no-reply' )
				->to( 'contacto@nerdytrust.com', 'Causas Fundación Amparo' )
				->subject( 'Nueva causa desde el formulario' );
		} );

		// También se envía un mensaje de correo al usuario, para que sepa que si se envió su petición
		/*$thanks = Mail::send( 'public.mail.apoyamos_gracias', $inputs, function( $message ) use ( $causa ){
			$message 
				->from( getenv( 'APP_NOREPLY' ), 'no-reply' )
				->to( $causa->email, $causa->nombre )
				->subject( 'Gracias por agregar una causa' );
		} );*/

		return Response::json( [ 'success' => true, 'redirect' => 'gracias-apoyamos-tu-causa' ] );

	}

	/**
	 * Método para visualizar la vista gracias
	 * @return
	 */
	public function gracias(){
		return View::make( 'public.apoyamos.gracias' );
	}
}

/* End of file ApoyaCausaController.php */
/* Location: ./app/controllers/public/ApoyaCausaController.php */