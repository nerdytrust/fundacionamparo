<?php

class CoversController extends BaseController {
	
	private $_api;
	private $_ClientId     = 'Ab_PyKePqSHu26uPKjtbhBVYq4iB5bx0dZAX_N9D0dYB_1Qzh3kB8O97oOWE54CqTNGmd6kcV8l4Rha2';
    private $_ClientSecret = 'EDAp5eZ9kqpYl9R7KuBPhxfY7yOCmJv00oJ5VHM4ufKgPmiEKF_Uf0Lfm57p2kbITmG65B0LnSZ_JtLj';

    /**
	 * Método constructor para inicializar variables
	 */
	public function __construct(){
		$this->_api = new \PayPal\Rest\ApiContext(
		  new \PayPal\Auth\OAuthTokenCredential(
		    $this->_ClientId,
		    $this->_ClientSecret
		  )
		);

		 $this->_api->setConfig(array(
		 	'mode' => 'sandbox',
			'http.ConnectionTimeOut' => 30,
		 	'log.LogEnabled' => true,
		 	'log.FileName' => __DIR__.'/../../storage/logs/PayPal.log',
		 	'log.LogLevel' => 'FINE'
		 ));
	}

	/**
	 * Método para mostrar la vista del formulario de donación
	 * @return
	 */
	public function donar(){
		if ( Session::has( 'donacion.oxxo_barcode' ) )
			return Redirect::to( 'donar/pago-oxxo' );

		if ( Session::has( 'donacion.spei_clabe' ) )
			return Redirect::to( 'donar/pago-spei' );

		$causas = Causas::orderBy( 'created_at','desc' )->where( 'fecha', '>', date('Y-m-d') )->get();
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

		$causa = Causas::where('id_causas',$id_causa)->where( 'fecha', '>', date('Y-m-d') )->get();
		if ( count($causa) == 0)
			return Redirect::to( 'home' );

		return View::make( 'public.covers.causas' )->with( [ 
			'causa' => $causa[0] 
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

		$causa = Causas::select(DB::raw('*,meta as metaTotal'))->where('id_causas',$id_causa)->where( 'fecha', '>', date('Y-m-d') )->get();
		if ( count( $causa ) == 0 )
			return Redirect::to( 'home' );

		$causa = $this->getRecaudado($causa);
		return View::make( 'public.covers.ficha_causas' )->with( [ 
			'causa' => $causa[0]
		] );
			
	}

	/**
	 * Método para mostrar la información del Donador/Voluntario/Impulsor
	 * @param  integer $id_donador ID de registro del Donador/Voluntario/Impulsor
	 * @return
	 */
	public function fichaDonador( $id_donador = null ){
		if ( ! isset( $id_donador ) || empty( $id_donador ) )
			return Redirect::to( 'home' );

		$donador = $this->getDataProfile( $id_donador );
		if ( empty( $donador ) )
			return Redirect::to( 'home' );

		$causas 		= $this->getCausasProfile( $id_donador );
		$donaciones 	= $this->getCountDonaciones( $id_donador );
		$impulsos 		= $this->getCountImpulsos( $id_donador );
		$voluntariados 	= $this->getCountVoluntariado( $id_donador );
		return View::make( 'public.covers.ficha_donador' )->with( [ 
			'donador' 		=> $donador,
			'causas'  		=> $causas,
			'donaciones'	=> $donaciones,
			'impulsos'		=> $impulsos,
			'voluntariados'	=> $voluntariados
		] );
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
		Session::forget( 'fbImpulsar');
		Session::forget( 'fbImpulsarCausa');
		$causas = Causas::orderBy( 'created_at','desc' )->where( 'fecha', '>', date('Y-m-d') )->get();
		return View::make( 'public.covers.impulsar' )->with( [ 
			'causas' => $causas
		] );
	}

	public function impulsarCausa( $id_causa = null ){
		Session::forget( 'fbImpulsar');
		Session::forget( 'fbImpulsarCausa');
		if ( ! isset( $id_causa ) || empty( $id_causa ) )
			return Redirect::to( 'home' );

		$causa = Causas::where('id_causas',$id_causa)->where( 'fecha', '>', date('Y-m-d') )->get();
		if ( count( $causa ) == 0)
			return Redirect::to( 'home' );
		
		return View::make( 'public.covers.impulsar_causa' )->with( [ 
			'causa' => $causa[0]
		 ] );
	}

	public function impulsarGracias(){
		if ( Auth::customer()->check() ){
			$nameImpulsor = Helper::getRegisterFullName();
			$emailImpulsor = Helper::getEmail();

			$ImpulsorDiploma = Mail::send( 'public.mail.impulsor_diploma', ['username' => $nameImpulsor], function( $message ) use ($emailImpulsor){
					$message
						->from( getenv( 'APP_NOREPLY' ), 'Fundación Amparo' )
						->to( $emailImpulsor, "Impulsor" )
						->subject( '¡Felicidades! ' );
				});

		}

		return View::make( 'public.covers.impulsar_gracias' );
	}

	/**
	 * Método para mostrar la vista del formulario corto de Voluntarios
	 * @return
	 */
	public function voluntario(){
		$causas = Causas::orderBy( 'created_at','desc' )->where( 'fecha', '>', date('Y-m-d') )->get();
		return View::make( 'public.covers.voluntario' )->with( [ 
			'causas' => $causas,
			'ayudas' => TipoAyudas::select( 'id_tipo_ayudas', 'name' )->get()
		] );
	}

	/**
	 * Método para mostrar la vista del segundo paso del formulario de Voluntarios
	 * @return
	 */
	public function voluntarioNext(){
		$voluntario = Session::get( 'voluntario' );
		if ( ! isset( $voluntario ) )
			return Redirect::to( 'voluntario' );

		return View::make( 'public.covers.voluntario_2' );
	}

	/**
	 * Método para mostrar la vista del final del proceso del formulario de Voluntarios
	 * @return [type] [description]
	 */
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
			'causa' 		=> $causa['attributes']['titulo'], 
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
			'causa' 		=> $causa['attributes']['titulo'], 
			'clabe' 		=> $clabe,
			'banco'			=> $bank,
			'expira'		=> date( 'Y-m-d', $expires )
		] );
	}

	/**
	 * Método para mostrar error al pagar con paypal
	 * @return
	 */
	public function donarError(){
		return View::make( 'public.covers.donar_error' )->with( [
						'status'	=> 'No se pudo registrar en nuestro sistema tu donación, favor de contactarnos'
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

	/**
	 * Método para obtener los detalles del Donador/Voluntario/Impulsor
	 * @param  integer $id_profile ID Registrado del Donador/Voluntario/Impulsor
	 * @return array             Detalles del Donador/Voluntario/Impulsor
	 */
	private function getDataProfile( $id_profile = null ){
		if ( ! isset( $id_profile ) || empty( $id_profile ) )
			return FALSE;

		$profile = DB::table( 'registrados' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'registrados.id_registrados', $id_profile )
				->select( 'profiles.id_registrados','profiles.photoURL', 'profiles.displayName', 'profiles.city', 'profiles.created_at', 'registrados.me_gusta' )
				->first();
		$meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
		$fecha = explode('-', $profile->created_at);
		$fecha = substr($fecha[2],0,2).' de '.$meses[$fecha[1]-1].' del '.$fecha[0];
 		$profile->created_at = $fecha;

		return $profile;
	}

	/**
	 * Método para obtener las causas en las que ha participado el Donador/Voluntario/Impulsor
	 * @param  integer $id_profile ID Registrado del Donador/Voluntario/Impulsor
	 * @return array             Listado de las causas
	 */
	private function getCausasProfile( $id_profile = null ){
		if ( ! isset( $id_profile ) || empty( $id_profile ) )
			return FALSE;

		$causas = DB::table( 'registrados' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->leftJoin( 'donaciones', 'donaciones.email', '=', 'registrados.email' )
				->leftJoin( 'voluntarios', 'voluntarios.email', '=', 'registrados.email' )
				->leftJoin( 'impulsadas', 'impulsadas.email', '=', 'registrados.email' )
				->join( 'causas', function($join){
					$join->on( 'causas.id_causas', '=', 'donaciones.id_causas' )
						->orOn( 'causas.id_causas', '=', 'voluntarios.id_causas' )
						->orOn( 'causas.id_causas', '=', 'impulsadas.id_causas' );
				})
				->distinct()
				->where( 'registrados.id_registrados', $id_profile )
				// ->where( 'donaciones.status', 1 )
				// ->where( 'voluntarios.aprobacion', 1 )
				->select( 'causas.titulo' )
				->get();

		return $causas;
	}

	/**
	 * Método para obtener el total de donaciones en las que ha participado el Donador/Voluntario/Impulsor
	 * @param  integer $id_profile ID Registrado del Donador/Voluntario/Impulsor
	 * @return integer             Total de donaciones
	 */
	private function getCountDonaciones( $id_profile = null ){
		if ( ! isset( $id_profile ) || empty( $id_profile ) )
			return FALSE;

		$donaciones = DB::table( 'registrados' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->join( 'donaciones', 'donaciones.email', '=', 'registrados.email' )
				->where( 'registrados.id_registrados', $id_profile )
				->where( 'donaciones.status', 1 )
				->count();

		return $donaciones;
	}

	/**
	 * Método para obtener el total de impulsos en los que ha participado el Donador/Voluntario/Impulsor
	 * @param  integer $id_profile ID Registrado del Donador/Voluntario/Impulsor
	 * @return integer             Total de Impulsos
	 */
	private function getCountImpulsos( $id_profile = null ){
		if ( ! isset( $id_profile ) || empty( $id_profile ) )
			return FALSE;

		$impulsos = DB::table( 'registrados' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->join( 'impulsadas', 'impulsadas.email', '=', 'registrados.email' )
				->where( 'registrados.id_registrados', $id_profile )
				->count();

		return $impulsos;
	}

	/**
	 * Método para obtener el total de voluntariados en los que ha participado el Donador/Voluntario/Impulsor
	 * @param  integer $id_profile ID Registrado del Donador/Voluntario/Impulsor
	 * @return integer             Total de Voluntariados
	 */
	private function getCountVoluntariado( $id_profile = null ){
		if ( ! isset( $id_profile ) || empty( $id_profile ) )
			return FALSE;

		$voluntariado = DB::table( 'registrados' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->join( 'voluntarios', 'voluntarios.email', '=', 'registrados.email' )
				->where( 'registrados.id_registrados', $id_profile )
				->where( 'voluntarios.aprobacion', 1 )
				->count();

		return $voluntariado;
	}

	/**
	 * Método para obtener lo recaudado de cada causa
	 * @param  array $causas  Información introducida por el usuario en el formulario de registro
	 * @return array          Devuelve el arreglo del registro guardado exitosamente o NULL en caso de que no
	 */
	private function getRecaudado($causas){
		
		foreach ($causas as $key => $causa) {
			 $recaudado = Donaciones::where( 'id_causas', $causa->id_causas)->where( 'status', 1)->sum( 'monto_donacion' );
			 $causas[$key]['recaudado'] = $recaudado;
			if($causa->metaTotal > 0){
			 	$porcentaje = ($recaudado * 100)/$causa->metaTotal;
			 	if ($porcentaje > 100){ $porcentaje = 100;}
			 	$causas[$key]['porcentaje'] = $porcentaje;
			} else {
				$causas[$key]['porcentaje'] = 0;
			}
		}
		
		return  $causas;
	}

	/**
	 * Método para procesar webhook de conekta el relizar un pago con SPEI
	 */
	public function validarPago(){
		// Analizar la información del evento en forma de json
		header('HTTP/1.1 200 OK');
		$body = @file_get_contents('php://input');
		$event = json_decode($body);
		$charge = $event->data->object;

		if ($charge->status == 'paid'){
		 
		    DB::table('donaciones')
             ->where('transaction_id', $charge->id)
             ->update(array('status' => 1));

            $donador =  DB::table('donaciones')
             ->select('email')
             ->where('transaction_id', $charge->id)
             ->get();
			$email = $donador[0]->email;
            $donacionMail = Mail::send( 'public.mail.donacion', [], function( $message ) use ($email){
					$message
						->from( getenv( 'APP_NOREPLY' ), 'no-reply' )
						->to( $email, "Donador" )
						->subject( 'Bienvenido a Fundación Amparo' );
			});
		}

	}

	/**
	 * Método para procesar el login con facebook desde impulsar
	 */
	public function fbImpulsar(){
		Session::put( 'fbImpulsar', TRUE );
		return Redirect::to( 'login/facebook' );
	}

	/**
	 * Método para procesar el login con facebook desde impulsar
	 */
	public function fbImpulsarCausa($id_causas = NULL){
		Session::put( 'fbImpulsarCausa', $id_causas );
		return Redirect::to( 'login/facebook' );
	}

}

/* End of file CoversController.php */
/* Location: ./app/controllers/public/CoversController.php */