<?php

class ContactoController extends BaseController {

	/**
	 * Reglas de validación para el formulario
	 * @var array
	 */
    private $rules = [
		'nombre'	  => [ 'required', 'min:3', 'max:150' ],
		'telefono'	  => [ 'required', 'numeric', 'min:10'],
		'email'		  => [ 'required', 'email' ],
		'mensaje'     => [ 'required' ],
		'terminos'    => [ 'required' ]
	];

    /**
     * Método para mostrar la vista de la sección de Contacto
     * @return
     */
	public function index(){
		return View::make( 'public.contacto.index' );
	}

	/**
	 * Método para procesar la información del formulario de Contacto
	 * @return
	 */
	public function enviarContacto(){
		if ( ! Request::ajax() )
			return Response::json( [ 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu petición</span>' ], 'success' => false ] );

		$inputs = Input::all();
		$validation = Validator::make( $inputs, $this->rules );

		if ( $validation->fails() )
			return Response::json( [ 'errors' => $validation->messages()->all( '<span class="error">:message</span>' ), 'success' => false ] );

		// Guardamos los datos en la base de datos en caso de haber pasado la validación de tipo de datos
		$contacto = new Contacto;
		$contacto->nombre 			= Input::get( 'nombre' );
		$contacto->telefono 		= Input::get( 'telefono' );
		$contacto->correo 			= Input::get( 'email' );
		$contacto->mensaje			= Input::get( 'mensaje' );
		$contacto->ip				= Request::ip();
		$contacto->browser 			= $_SERVER['HTTP_USER_AGENT'];
		if ( ! $contacto->save() )
			return Response::json( [ 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu petición</span>' ], 'success' => false ] );

		// Si se guardó, se procede a enviar un correo al staff de Fundación Amparo
		$comment = Mail::send( 'public.mail.contacto', $inputs, function( $message ) use ( $contacto ){
			$message 
				->from( getenv( 'APP_NOREPLY' ), 'Fundación Amparo' )
				->to( 'contacto@fundacionamparo.com', 'Contacto Fundación Amparo' )
				->subject( 'Nuevo mensaje desde el formulario de contacto' );
		} );

		// También se envía un mensaje de correo al usuario, para que sepa que si se envió su petición
		$thanks = Mail::send( 'public.mail.contacto_gracias', $inputs, function( $message ) use ( $contacto ){
			$message 
				->from( getenv( 'APP_NOREPLY' ), 'Fundación Amparo' )
				->to( $contacto->correo, $contacto->nombre )
				->subject( 'Gracias por contactarnos.' );
		} );

		//return Response::json( [ 'success' => true, 'errors' => false, 'message' => 'Gracias por estar en contacto, en breve recibirás una <strong>respuesta</strong> de un asesor.' ] );
		return Response::json( [ 'success' => true, 'redirect' => 'gracias-contacto' ] );
	}

	/**
	 * Método para visualizar la vista gracias
	 * @return
	 */
	public function gracias(){
		return View::make( 'public.contacto.gracias' );
	}
}

/* End of file ContactoController.php */
/* Location: ./app/controllers/public/ContactoController.php */