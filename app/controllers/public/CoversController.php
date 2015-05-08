<?php

class CoversController extends BaseController {

	public function donar(){
		return View::make( 'public.covers.donar' );
	}

	public function donarCausas(){
		return View::make( 'public.covers.causas' );
	}

	public function fichaCausas(){
		return View::make( 'public.covers.ficha_causas' );
	}

	public function fichaDonador(){
		return View::make( 'public.covers.ficha_donador' );
	}

	public function fichaImpulsor(){
		return View::make( 'public.covers.ficha_impulsor' );
	}

	public function fichaNoticias(){
		return View::make( 'public.covers.ficha_noticias' );
	}

	public function fichaVoluntario(){
		return View::make( 'public.covers.ficha_voluntario' );
	}

	public function impulsar(){
		return View::make( 'public.covers.impulsar' );
	}

	public function voluntario(){
		return View::make( 'public.covers.voluntario' );
	}

	public function voluntarioNext(){
		return View::make( 'public.covers.voluntario_2' );
	}
}