<?php
class CoversController extends BaseController {
	
	/*private $_api;
	private $_ClientId     = 'Ab_PyKePqSHu26uPKjtbhBVYq4iB5bx0dZAX_N9D0dYB_1Qzh3kB8O97oOWE54CqTNGmd6kcV8l4Rha2';
    private $_ClientSecret = 'EDAp5eZ9kqpYl9R7KuBPhxfY7yOCmJv00oJ5VHM4ufKgPmiEKF_Uf0Lfm57p2kbITmG65B0LnSZ_JtLj';
	*/
    /**
	 * Método constructor para inicializar variables
	 */
	public function __construct(){
		/*$this->_api = new \PayPal\Rest\ApiContext(
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
		 ));*/
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
		//echo $this->social_counter('http://design4causes.com/ficha-causas/1/roberto-alonso-espinosa','facebook');die;
		if ( ! isset( $id_causa ) || empty( $id_causa ) )
			return Redirect::to( 'home' );

		$causa = Causas::where('id_causas',$id_causa)->where( 'fecha', '>', date('Y-m-d') )->get();
		if ( count( $causa ) == 0)
			return Redirect::to( 'home' );
		
		return View::make( 'public.covers.impulsar_causa' )->with( [ 
			'causa' => $causa[0]
		 ] );
	}

	public function impulsarGracias($id_causa = null, $id_impulsor = null ){


		if ( Auth::customer()->check() ){

			$causas = new Causas;
			$causa = $causas->where('id_causas',$id_causa)->first();

	  		$impulsadas = Impulsadas::where('id_causas',$id_causa)
								    ->where('id_profiles',Helper::getRegisterId())
								    ->get();
											    
	  		if(count($impulsadas) > 0){

	  			return View::make( 'public.covers.impulsar_gracias_2' );

		 	} else {
		 		$impulsadasSave = new Impulsadas;
		 		$impulsadasSave->email 	     = Helper::getEmail();
	  			$impulsadasSave->id_profiles = Helper::getRegisterId();
		 		$impulsadasSave->id_causas   = $id_causa;
		 		$impulsadasSave->url 	     = URL::to( '/ficha-causas/'.$causa->id_causas.'/'.Str::slug($causa->titulo).'/'.Helper::getRegisterId() );

		 		if($impulsadasSave->save())
		 			return View::make( 'public.covers.impulsar_gracias' );

		 		return Redirect::to( 'facebook-close' );
		 	}

		 	

		}
		/*if ( Auth::customer()->check() ){
			$nameImpulsor = Helper::getRegisterFullName();
			$emailImpulsor = Helper::getEmail();

			$ImpulsorDiploma = Mail::send( 'public.mail.impulsor_diploma', ['username' => $nameImpulsor], function( $message ) use ($emailImpulsor){
					$message
						->from( getenv( 'APP_NOREPLY' ), 'Fundación Amparo' )
						->to( $emailImpulsor, "Impulsor" )
						->subject( '¡Felicidades! ' );
				});

		}*/

		
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

		return View::make( 'public.covers.voluntario_2' )->with( [
					'estados'	=> Estados::where( 'id_paises', 142 )->get(),
					'horarios'	=> Horarios::get()
				 ] );
	}

	/**
	 * Método para mostrar la vista del final del proceso del formulario de Voluntarios
	 * @return [type] [description]
	 */
	public function voluntarioGracias(){
		/*$voluntario = Session::get( 'voluntario' );
		if ( ! isset( $voluntario ) )
			return Redirect::to( 'voluntario' );*/
		
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
		$charge = str_replace("http","https",$charge);
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

	public function checkImpulsadas(){
		$impulsadas = new Impulsadas;
		$result = $impulsadas->where('estatus',0)->get();

		$impulsadasUpdate = new Impulsadas;
		$profiles         = new Profiles;

		foreach ($result as $key => $impulsada) {
			if($this->social_counter($impulsada->url,'facebook') >= 10){
				$impulsadasUpdate->where('url',$impulsada->url);
				
				if ( $impulsadasUpdate->update(array('estatus' => 1)) ){
					
					$impulsor = $profiles->where('id_profiles',$impulsada->id_profiles)->first();
					$nombre   = $impulsor->displayName;
					$email    = $impulsor->email;
					$ImpulsorDiploma = Mail::send( 'public.mail.impulsor_diploma', ['username' => $nombre], function( $message ) use ($email){
							$message
								->from( getenv( 'APP_NOREPLY' ), 'Fundación Amparo' )
								->to( $email, "Impulsor" )
								->subject( '¡Felicidades! ' );
						});

				}
			}
		}

		echo date('d-m-Y h:i');

	}

  	private function social_counter($url, $service) 
	{

		$tnwsc_config = array(
			'services' => array(
				'facebook' => array('url' => "https://graph.facebook.com/?id=%s&access_token=776167932490026|Y-gk_zfRGJaOzjNp8pwteYKtNl0"),
				'twitter' => array('url' => "http://urls.api.twitter.com/1/urls/count.json?url=%s"),
				'linkedin' => array('url' => "http://www.linkedin.com/countserv/count/share?url=%s"),
				'google' => array('url' => "https://clients6.google.com/rpc")
			)
		);

		//global $tnwsc_config;
		$social_count = 0;
		
		// Google+ is an special, hack-ish case
		if( $service == 'google' ) 
		{
			// GET +1s. Credits to Tom Anthony: http://www.tomanthony.co.uk/blog/google_plus_one_button_seo_count_api/
		    $curl = curl_init();
		    curl_setopt( $curl, CURLOPT_URL, "https://clients6.google.com/rpc" );
		    curl_setopt( $curl, CURLOPT_POST, 1 );
		    curl_setopt( $curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]' );
		    curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
		    curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-type: application/json' ) );
		    $curl_results = curl_exec ( $curl );
		    curl_close ( $curl );
		 
		    $json = json_decode($curl_results, true);
		    $social_count = intval( $json[0]['result']['metadata']['globalCounts']['count'] );
	    	
		} else {

			$permalink  = $url;
			if($service == 'facebook' && isset( $tnwsc_config['services'][$service]["params"] ) ) {
				$permalink = sprintf( $tnwsc_config['services'][$service]["params"], $url );
				//echo $permalink;
			}
			
			$url = sprintf( $tnwsc_config['services'][$service]["url"], urlencode ( $permalink ) );
			//$url = sprintf( $tnwsc_config['services'][$service]["url"], urlencode ( $url ) );
			//echo $url;

		    $ch = curl_init();
		    curl_setopt ($ch, CURLOPT_URL, $url);
		    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			$return = curl_exec( $ch );
		
			if( curl_errno( $ch ) ) { 
		        $error = print_r( curl_error( $ch ), true );
		        // TODO: Notify curl errors via email or log files 
			} else {
				switch( $service ) {
					case 'facebook':
						 $return = json_decode( $return, true );
						 //print_r($return);die;
						//$social_count = ( isset( $return['data'][0]['total_count'] ) ) ? $return['data'][0]['total_count'] : 0;
						$social_count = ( isset( $return['share'] ) ) ? $return['share']['share_count'] : 0;
						// TODO: Better handling of errors	
						//echo '<div style="display:none;" id="facebook_counter">';
						//	print_r($return);
						//echo '</div>';
						
						if( isset( $return['error'] ) ) { 
							//tnwsc_log( "Error ".$return["code"]." (".$return["type"].") - ".$return["message"] );
							return 0;
						}
					break;
					
					case 'twitter':
						$return = json_decode( $return, true );
						$social_count = ( isset($return['count'] ) ) ? $return['count'] : 0;
					break;
					
					case 'linkedin':
						$return = json_decode( str_replace( 'IN.Tags.Share.handleCount(', '', str_replace( ');', '', $return ) ), true );
						$social_count = ( isset( $return['count'] ) ) ? $return['count'] : 0;
					break;
				}
			}
		}
		return intval( $social_count );
	}

}

/* End of file CoversController.php */
/* Location: ./app/controllers/public/CoversController.php */