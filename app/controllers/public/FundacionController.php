<?php

class FundacionController extends BaseController {

	public function index(){
		return View::make( 'public.fundacion.index' );
	}

	public function aportaciones(){
		return View::make( 'public.fundacion.aportaciones' );
	}

	public function asistenciales(){
		return View::make( 'public.fundacion.asistenciales' );
	}

	public function consideraciones(){
		return View::make( 'public.fundacion.consideraciones' );
	}

	public function cultura(){
		return View::make( 'public.fundacion.cultura' );
	}

	public function deporte(){
		return View::make( 'public.fundacion.deporte' );
	}

	public function educacion(){
		return View::make( 'public.fundacion.educacion' );
	}

	public function historia(){
		return View::make( 'public.fundacion.historia' );
	}

	public function membresias($idMembresia = NULL){
		$membresias = Membresias::orderBy( 'orden' )->get();
		return View::make( 'public.fundacion.membresias' )->with( [
			'membresias'  => $membresias, 
			'idMembresia' => $idMembresia
		] );
	}

	public function restauracion(){
		return View::make( 'public.fundacion.restauracion' );
	}

	public function salud(){
		return View::make( 'public.fundacion.salud' );
	}
}

/* End of file FundacionController.php */
/* Location: ./app/controllers/public/FundacionController.php */