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

	public function impulsarCausa(){
		return View::make( 'public.covers.impulsar_causa' );
	}

	public function impulsarGracias(){
		return View::make( 'public.covers.impulsar_gracias' );
	}

	public function voluntario(){
		return View::make( 'public.covers.voluntario' );
	}

	public function voluntarioNext(){
		return View::make( 'public.covers.voluntario_2' );
	}

	public function voluntarioGracias(){
		return View::make( 'public.covers.voluntario_gracias' );	
	}

	public function donarStepTwo(){
		return View::make( 'public.covers.donar_step_2' );
	}

	public function donarStepThree(){
		return View::make( 'public.covers.donar_step_3' );
	}

	public function donarStepFour(){
		return View::make( 'public.covers.donar_step_4' );
	}

	public function donarStepFive(){
		return View::make( 'public.covers.donar_step_5' );
	}

	public function validarPago(){
		switch ( Input::get( 'pago' ) ) {
			case 'tarjeta':
				return Redirect::to( 'gracias' );
				break;
			case 'pay':
				return Redirect::to( 'gracias' );
				break;
			case 'oxxo':
				return Redirect::to( 'donar-oxxo' );
				break;
			case 'spei':
				return Redirect::to( 'donar-spei' );
				break;
		}
	}
}