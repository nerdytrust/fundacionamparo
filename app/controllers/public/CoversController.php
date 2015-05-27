<?php

class CoversController extends BaseController {

	/**
	 * Reglas de validación para el formulario
	 * @var array
	 */
	private $rules_donacion_step_one = [
        'causa_donar'		=> [ 'required' ],
        'monto'				=> [ 'required', 'numeric', 'between:10,99999999' ],
        // 'no_mostrar_perfil'	=> [ 'accepted' ]
    ];

	public function donar(){
		if ( ! Request::isMethod( 'post' ) ){
			$causas = Causas::all();
			return View::make( 'public.covers.donar' )->with( [
				'causas' => $causas,
				'helper' => new Helper
			] );
		} elseif ( empty( Input::get( 'causa_hash' ) ) ) {
			$inputs = Input::all();
			$validation = Validator::make( $inputs, $this->rules_donacion_step_one );

			if ( $validation->fails() )
				return Redirect::back()->withInput()->withErrors( $validation );

			Session::put( 'donacion', $inputs );
			$causa = Causas::find( Session::get( 'donacion.causa_donar' ) );
			$monto = Session::get( 'donacion.monto' );
			return View::make( 'public.covers.donar_step_2' )->with( [
					'helper'  	=> new Helper,
					'causa'		=> $causa,
					'monto'		=> $monto
				] );
		} else {
			dd( Input::all() );die;
		}
	}

	/**
	 * Método para mostrar la ficha de donación de causa
	 * @param  integer $id_causa ID de la causa
	 * @return Vista de la ficha de donación de causa
	 */
	public function donarCausas( $id_causa = null ){
		if ( ! isset( $id_causa ) || empty( $id_causa ) )
			return Redirect::to( 'home' );

		$causa = Causas::find( $id_causa );
		if ( empty( $causa ) )
			return Redirect::to( 'home' );

		return View::make( 'public.covers.causas' )->with( [ 'causa' => $causa, 'helper' => new Helper ] );
	}

	/**
	 * Método para mostrar la ficha de la causa
	 * @param  integer $id_causa ID Causa
	 * @return Vista de la ficha de la causa
	 */
	public function fichaCausas( $id_causa = null ){
		if ( ! isset( $id_causa ) || empty( $id_causa ) )
			return Redirect::to( 'home' );

		$causa = Causas::find( $id_causa );
		if ( empty( $causa ) )
			return Redirect::to( 'home' );
		
		return View::make( 'public.covers.ficha_causas' )->with( [ 'causa' => $causa, 'helper' => new Helper ] );
			
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
		$causas = Causas::all();
		return View::make( 'public.covers.impulsar' )->with( [ 'causas' => $causas, 'helper' => new Helper ] );
	}

	public function impulsarCausa( $id_causa = null ){
		if ( ! isset( $id_causa ) || empty( $id_causa ) )
			return Redirect::to( 'home' );

		$causa = Causas::find( $id_causa );
		if ( empty( $causa ) )
			return Redirect::to( 'home' );
		
		return View::make( 'public.covers.impulsar_causa' )->with( [ 'causa' => $causa, 'helper' => new Helper ] );
	}

	public function impulsarGracias(){
		return View::make( 'public.covers.impulsar_gracias' );
	}

	public function voluntario(){
		$causas = Causas::all();
		return View::make( 'public.covers.voluntario' )->with( [ 'causas' => $causas, 'helper' => new Helper ] );
	}

	public function voluntarioNext(){
		return View::make( 'public.covers.voluntario_2' );
	}

	public function voluntarioGracias(){
		return View::make( 'public.covers.voluntario_gracias' );	
	}

	// public function donarStepTwo(){
	// 	return View::make( 'public.covers.donar_step_2' );
	// }

	// public function donarStepThree(){
	// 	return View::make( 'public.covers.donar_step_3' );
	// }

	// public function donarStepFour(){
	// 	return View::make( 'public.covers.donar_step_4' );
	// }

	// public function donarStepFive(){
	// 	return View::make( 'public.covers.donar_step_5' );
	// }

	// public function validarPago(){
	// 	switch ( Input::get( 'pago' ) ) {
	// 		case 'tarjeta':
	// 			return Redirect::to( 'gracias' );
	// 			break;
	// 		case 'pay':
	// 			return Redirect::to( 'gracias' );
	// 			break;
	// 		case 'oxxo':
	// 			return Redirect::to( 'donar-oxxo' );
	// 			break;
	// 		case 'spei':
	// 			return Redirect::to( 'donar-spei' );
	// 			break;
	// 	}
	// }
}

/* End of file CoversController.php */
/* Location: ./app/controllers/public/CoversController.php */