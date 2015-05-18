<?php

class ApoyarCausaController extends BaseController {

	public function index(){
		return View::make( 'public.apoyamos.index' );
	}

	public function registrar(){
		$causa = new ApoyamosCausa;
		$causa->nombre 		= Input::get( 'nombre' );
		$causa->telefono 	= Input::get( 'telefono' );
		$causa->correo 		= Input::get( 'mail' );
		$causa->tipo_causa 	= Input::get( 'causa_tipo' );
		$causa->mensaje		= Input::get( 'descripcion' );
		if ( $causa->save() )
			return Redirect::to( 'home' );

	}
}

/* End of file ApoyaCausaController.php */
/* Location: ./app/controllers/public/ApoyaCausaController.php */