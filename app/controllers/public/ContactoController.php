<?php

class ContactoController extends BaseController {

	/**
	 * Reglas de validación para el formulario
	 * @var array
	 */
	private $rules = [
        'nombre'        => 'required|min:3' ,
        'telefono'      => 'required|digits:10' ,
        'email'         => 'required|email' ,
        'mensaje'   	=> 'required'
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
		$inputs = Input::all();
		$validation = Validator::make( $inputs, $this->rules );

		if ( $validation->fails() )
			return Redirect::back()->withInput()->withErrors( $validation );

		$contacto = new Contacto;
		$contacto->nombre 			= Input::get( 'nombre' );
		$contacto->telefono 		= Input::get( 'telefono' );
		$contacto->correo 			= Input::get( 'email' );
		$contacto->mensaje			= Input::get( 'mensaje' );
		$contacto->ip				= Request::ip();
		if ( $contacto->save() )
			return Redirect::to( 'contacto' );
	}
}

/* End of file ContactoController.php */
/* Location: ./app/controllers/public/ContactoController.php */