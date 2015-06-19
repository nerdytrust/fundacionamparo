<?php

class CoversController extends BaseController {

	/**
	 * Método para mostrar la vista del formulario de donación
	 * @return
	 */
	public function donar(){
		if ( Session::has( 'donacion.oxxo_barcode' ) )
			return Redirect::to( 'donar/pago-oxxo' );

		if ( Session::has( 'donacion.spei_clabe' ) )
			return Redirect::to( 'donar/pago-spei' );

		$causas = Causas::all();
		return View::make( 'public.covers.donar' )->with( [
			'causas' => $causas
		] );
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

		return View::make( 'public.covers.causas' )->with( [ 
			'causa' => $causa 
		] );
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
		
		return View::make( 'public.covers.ficha_causas' )->with( [ 
			'causa' => $causa
		] );
			
	}

	public function fichaDonador(){
		return View::make( 'public.covers.ficha_donador' );
	}

	public function fichaImpulsor(){
		return View::make( 'public.covers.ficha_impulsor' );
	}

	/**
	 * Método para mostrar el contenido de la noticia en una ficha
	 * @param  integer $id_noticia ID Noticia
	 * @return Vista de la ficha de la noticia
	 */
	public function fichaNoticias( $id_noticia = null ){
		if ( ! isset( $id_noticia ) || empty( $id_noticia ) )
			return Redirect::to( 'home' );

		$noticia = Noticias::find( $id_noticia );
		if ( empty( $noticia ) )
			return Redirect::to( 'home' );

		return View::make( 'public.covers.ficha_noticias' )->with( [
			'noticia'	=> $noticia
		] );
	}

	public function fichaVoluntario(){
		return View::make( 'public.covers.ficha_voluntario' );
	}

	public function impulsar(){
		$causas = Causas::all();
		return View::make( 'public.covers.impulsar' )->with( [ 
			'causas' => $causas
		] );
	}

	public function impulsarCausa( $id_causa = null ){
		if ( ! isset( $id_causa ) || empty( $id_causa ) )
			return Redirect::to( 'home' );

		$causa = Causas::find( $id_causa );
		if ( empty( $causa ) )
			return Redirect::to( 'home' );
		
		return View::make( 'public.covers.impulsar_causa' )->with( [ 
			'causa' => $causa
		 ] );
	}

	public function impulsarGracias(){
		return View::make( 'public.covers.impulsar_gracias' );
	}

	/**
	 * Método para mostrar la vista del formulario corto de Voluntarios
	 * @return
	 */
	public function voluntario(){
		$causas = Causas::all();
		return View::make( 'public.covers.voluntario' )->with( [ 
			'causas' => $causas,
			'ayudas' => TipoAyudas::select( 'id_tipo_ayudas', 'name' )->get()
		] );
	}

	public function voluntarioNext(){
		$voluntario = Session::get( 'voluntario' );
		if ( ! isset( $voluntario ) )
			return Redirect::to( 'voluntario' );

		return View::make( 'public.covers.voluntario_2' );
	}

	public function voluntarioGracias(){
		$voluntario = Session::get( 'voluntario' );
		if ( ! isset( $voluntario ) )
			return Redirect::to( 'voluntario' );
		
		return View::make( 'public.covers.voluntario_gracias' );	
	}

	/**
	 * Método para mostrar la vista del formulario paso dos, para seleccionar el método de pago de la donación
	 * @return
	 */
	public function donarStepTwo(){
		$donacion = Session::get( 'donacion' );
		if ( ! isset( $donacion ) )
			return Redirect::to( 'donar' );

		if ( Session::has( 'donacion.oxxo_barcode' ) )
			return Redirect::to( 'donar/pago-oxxo' );

		if ( Session::has( 'donacion.spei_clabe' ) )
			return Redirect::to( 'donar/pago-spei' );

		$causa = Causas::find( Session::get( 'donacion.causa_donar' ) );
		$monto = Session::get( 'donacion.monto' );
		return View::make( 'public.covers.donar_step_2' )->with( [ 
			'monto' => $monto,
			'causa' => $causa
		] );
	}

	/**
	 * Método para mostrar la vista del formulario complementacio de donación con Tarjeta Débito/Crédito
	 * @return
	 */
	public function donarTarjeta(){
		$donacion = Session::get( 'donacion' );
		if ( ! isset( $donacion ) )
			return Redirect::to( 'donar' );

		if ( Session::has( 'donacion.oxxo_barcode' ) )
			return Redirect::to( 'donar/pago-oxxo' );

		if ( Session::has( 'donacion.spei_clabe' ) )
			return Redirect::to( 'donar/pago-spei' );

		$causa = Causas::find( Session::get( 'donacion.causa_donar' ) );
		$monto = Session::get( 'donacion.monto' );
		return View::make( 'public.covers.donar_paycard' )->with( [ 
			'monto' => $monto,
			'causa' => $causa
		] );
	}

	/**
	 * Método para mostrar el resultante del API Conekta, Código de barras, Línea de Captura, Vigencia
	 * @return
	 */
	public function donarOxxo(){
		$donacion = Session::get( 'donacion' );
		if ( ! isset( $donacion ) )
			return Redirect::to( 'donar' );

		$causa = Causas::find( Session::get( 'donacion.causa_donar' ) );
		$monto = Session::get( 'donacion.monto' );
		$charge = Session::get( 'donacion.oxxo' );
		$barcode = Session::get( 'donacion.oxxo_barcode' );
		$expires = Session::get( 'donacion.oxxo_expires' );
		return View::make( 'public.covers.donar_payoxxo' )->with( [ 
			'monto' 		=> $monto, 
			'causa' 		=> $causa, 
			'captura' 		=> $charge,
			'codigo_barras'	=> $barcode,
			'expira'		=> date( 'Y-m-d', $expires )
		] );
	}

	/**
	 * Método para mostrar el resultante del API Conekta, Cuenta CLABE para transferencia electrónica,
	 * Vigencia
	 * @return
	 */
	public function donarSpei(){
		$donacion = Session::get( 'donacion' );
		if ( ! isset( $donacion ) )
			return Redirect::to( 'donar' );

		$causa = Causas::find( Session::get( 'donacion.causa_donar' ) );
		$monto = Session::get( 'donacion.monto' );
		$clabe = Session::get( 'donacion.spei_clabe' );
		$bank = Session::get( 'donacion.spei_bank' );
		$expires = Session::get( 'donacion.spei_expires' );
		return View::make( 'public.covers.donar_payspei' )->with( [ 
			'monto' 		=> $monto, 
			'causa' 		=> $causa, 
			'clabe' 		=> $clabe,
			'banco'			=> $bank,
			'expira'		=> date( 'Y-m-d', $expires )
		] );
	}

	/**
	 * Método para mostrar la página de gracias al terminar el pago de donación por Tarjeta de Crédito
	 * @return
	 */
	public function donarThanks(){
		return View::make( 'public.covers.donar_gracias' );
	}

	/**
	 * Método para mostrar la pantalla de gracias al terminar el registro manual
	 * @return
	 */
	public function thanksRegistro(){
		return View::make( 'public.covers.gracias_registro' );
	}
}

/* End of file CoversController.php */
/* Location: ./app/controllers/public/CoversController.php */