<?php

class ApoyarCausaController extends BaseController {

	private $rules = [
        'nombre'        => 'required|min:3' ,
        'telefono'      => 'required|digits:10' ,
        'email'         => 'required|email' ,
        'causa_tipo'    => 'required' ,
        'descripcion'   => 'required'
    ];

	public function index(){
		$categorias = Categorias::get();
		return View::make( 'public.apoyamos.index' )->with( [
			'categorias' 	=> $categorias,
			'helper'		=> new Helper
		] );
	}

	public function registrar(){
		$inputs = Input::all();
		$validation = Validator::make( $inputs, $this->rules );

		if ( $validation->fails() )
			return Redirect::back()->withInput()->withErrors( $validation );

		$causa = new ApoyamosCausa;
		$causa->nombre 			= Input::get( 'nombre' );
		$causa->telefono 		= Input::get( 'telefono' );
		$causa->email 			= Input::get( 'email' );
		$causa->id_categorias	= Input::get( 'causa_tipo' );
		$causa->descripcion		= Input::get( 'descripcion' );
		$causa->ip				= Request::ip();
		if ( $causa->save() )
			return Redirect::to( 'apoyamos-tu-causa' );

	}
}

/* End of file ApoyaCausaController.php */
/* Location: ./app/controllers/public/ApoyaCausaController.php */