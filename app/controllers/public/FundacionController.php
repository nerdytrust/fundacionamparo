<?php

class FundacionController extends BaseController {

	public function index(){
		return View::make( 'public.fundacion.index' )->with( [
			'helper' => new Helper
		] );
	}

	public function aportaciones(){
		return View::make( 'public.fundacion.aportaciones' )->with( [
			'helper' => new Helper
		] );
	}

	public function asistenciales(){
		return View::make( 'public.fundacion.asistenciales' )->with( [
			'helper' => new Helper
		] );
	}

	public function consideraciones(){
		return View::make( 'public.fundacion.consideraciones' )->with( [
			'helper' => new Helper
		] );
	}

	public function cultura(){
		return View::make( 'public.fundacion.cultura' )->with( [
			'helper' => new Helper
		] );
	}

	public function deporte(){
		return View::make( 'public.fundacion.deporte' )->with( [
			'helper' => new Helper
		] );
	}

	public function educacion(){
		return View::make( 'public.fundacion.educacion' )->with( [
			'helper' => new Helper
		] );
	}

	public function historia(){
		return View::make( 'public.fundacion.historia' )->with( [
			'helper' => new Helper
		] );
	}

	public function membresias(){
		return View::make( 'public.fundacion.membresias' )->with( [
			'helper' => new Helper
		] );
	}

	public function restauracion(){
		return View::make( 'public.fundacion.restauracion' )->with( [
			'helper' => new Helper
		] );
	}

	public function salud(){
		return View::make( 'public.fundacion.salud' )->with( [
			'helper' => new Helper
		] );
	}
}

/* End of file FundacionController.php */
/* Location: ./app/controllers/public/FundacionController.php */