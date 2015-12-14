<?php

/*use Paypal\Rest\ApiContext,
	Paypal\Auth\OAuthTokenCredential;*/

class DonacionesController extends BaseController {

	private $rules_step_one = [
		'causa_donar'	=> [ 'required' ],
        'monto'			=> [ 'required', 'numeric', 'between:10,99999999' ],
        'email'			=> [ 'required', 'email' ]	
	];

	private $rules_step_two = [
		'metodo_pago'		=> [ 'required' ],
		'causa_token'		=> [ 'required' ],
		'causa_hash'		=> [ 'required' ]
	];

	private $expires = null;

	private $_api;
	private $_ClientId     = 'Ab_PyKePqSHu26uPKjtbhBVYq4iB5bx0dZAX_N9D0dYB_1Qzh3kB8O97oOWE54CqTNGmd6kcV8l4Rha2';
    private $_ClientSecret = 'EDAp5eZ9kqpYl9R7KuBPhxfY7yOCmJv00oJ5VHM4ufKgPmiEKF_Uf0Lfm57p2kbITmG65B0LnSZ_JtLj';

	/**
	 * Método constructor para inicializar variables
	 */
	public function __construct(){
		Conekta::setApiKey( 'key_pSoXGLrXKoYxKfrvtsVvtw' );
		//Llave publica //Conekta::setApiKey( 'key_Cxkxn8imrq4nosMpnnr3nVA' );
		Conekta::setLocale( 'es' );
		$this->expires = strtotime('+2 day', time() );

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
	 * Método para crear una nueva donación
	 * Este paso guarda en una sesión los datos parciales de la donación
	 * @return string Retorna en formato JSON un objeto con los campos "errors" y "success"
	 */
	public function nuevaDonacion(){
		if ( ! Request::ajax() )
			return Response::json( [ 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ], 'success' => false ] );

		$inputs = Input::all();
		$validate = Validator::make( $inputs, $this->rules_step_one );
		if ( $validate->fails() )
			return Response::json( [ 'errors' => $validate->messages()->all('<span class="error">:message</span>'), 'success' => false ] );

		Session::put( 'donacion', $inputs );
		return Response::json( [ 'success' => true, 'redirect' => 'donar/paso-2' ] );
	}

	/**
	 * Método para procesar los pagos de las donaciones
	 * Dependiendo el tipo de pago se invoca a otro método que puede ser Card (Tarjetas), Oxxo, SPEI
	 * @return string Retorna en formato JSON un objeto con los campos "errors", "success", "redirect"
	 */
	public function metodoPago(){
		if ( ! Request::ajax() )
			return Response::json( [ 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ], 'success' => false ] );

		$inputs = Input::all();
		$validate = Validator::make( $inputs, $this->rules_step_two );
		if ( $validate->fails() )
			return Response::json( [ 'errors' => $validate->messages()->all( '<span class="error">:message</span>' ), 'success' => false ] );

		if ( Session::get( 'donacion.monto') != Crypt::decrypt( $inputs[ 'causa_hash' ] ) && Session::get( 'donacion.causa_donar' ) != Crypt::decrypt( $inputs[ 'causa_token' ] ) )
			return Response::json( [ 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ], 'success' => false ] );

		$causa = Causas::find( Session::get( 'donacion.causa_donar' ) );
		$monto = Session::get( 'donacion.monto' ) * 100;
		switch ( $inputs['metodo_pago'] ) {
			case 'tarjeta':
				return Response::json( [ 'success' => true, 'redirect' => 'donar/pago-tarjeta' ] );
				break;
			case 'paypal':
				return Response::json( [ 'success' => true, 'redirect' => 'donar/pago-paypal' ] );
				break;
			case 'oxxo':
				$response = $this->methodOxxo( $causa, $monto );
				return $response;
				break;
			case 'spei':
				$response = $this->methodSpei( $causa, $monto );
				return $response;
				break;
		}
	}

	/**
	 * Método para procesar mostrar y enviar a procesar el formulario de pago de donación con Tarjetas Débito/Crédito
	 * @return string Retorna en formato JSON un objeto con los campos "errors", "success", "redirect"
	 */
	public function payCard(){
		$conektaTokenId = Input::get( 'conektaTokenId' );
		$recurrente     = Input::get( 'recurrente' );
		$causa = Causas::find( Session::get( 'donacion.causa_donar' ) );
		$monto = Session::get( 'donacion.monto' ) * 100;
		if ( empty( $conektaTokenId ) )
			return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ] ] );

		$valid = $this->methodCard( $causa, $monto, $conektaTokenId, $recurrente );

		if ( $valid )
			return Redirect::to( 'gracias' );
	}

	/**
	 * Método para procesar el formulario de pago mediante PayPal
	 * @return 
	 */
	public function payPal(){
		$causa = Causas::find( Session::get( 'donacion.causa_donar' ) );
		$monto = Session::get( 'donacion.monto' ) * 100;
		if ( empty( $monto ) )
			return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ] ] );

		if ( $this->methodPaypal( $causa, $monto ) )
			return Redirect::to( 'gracias' );
	}

	/**
	 * Método para procesar la información de pago de una donación mediante Tarjetas Débito/Crédito
	 * @param  array $causa Objeto de la Causa
	 * @param  string $monto Monto de la Donación
	 * @return string Retorna en formato JSON un objeto con los campos "errors", "success", "redirect"
	 */
	private function methodCard( $causa = [], $monto = '', $conektaTokenId = '', $recurrente = 0){
		if ( empty( $causa ) || empty( $monto ) )
			return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ] ] );

		if($recurrente == 1){
			$new_plan = $this->createPlan( $causa, $monto );
			if($new_plan){
				$new_cliente = $this->createCliente( $new_plan, $conektaTokenId);

				Session::reflash();
				Session::put( 'donacion.transaction_id', $new_cliente->subscription->id );
				Session::put( 'donacion.transaction_brand', $new_cliente->cards[0]->brand );
				Session::put( 'donacion.transaction_type', $new_cliente->cards[0]->object );
				Session::put( 'donacion.transaction_status', $new_cliente->subscription->status );
				Session::put( 'donacion.reference_id','FNDAMP-' . mt_rand() . '-' . time() );
				if ( ! $this->saveDonacion() ){
					return View::make( 'public.covers.donar_error' )->with( [
							'status'	=> 'No se pudo registrar en nuestro sistema tu donación, favor de contactarnos'
					] );
				}
			}
			
		}
		else{
			try {
				$charge = Conekta_Charge::create( [
					'amount'		=> $monto,
					'currency'		=> 'MXN',
					'description'	=> 'Donación Amparo - Causa ' . $causa->titulo,
					'reference_id'	=> 'FNDAMP-' . mt_rand() . '-' . time(),
					'card'			=> $conektaTokenId,
					'details'		=> [
						'email'		=> Session::get( 'donacion.email' )
					]
				] );

				Session::reflash();
				Session::put( 'donacion.transaction_id', $charge->id );
				Session::put( 'donacion.transaction_brand', $charge->payment_method->brand );
				Session::put( 'donacion.transaction_type', $charge->payment_method->type );
				Session::put( 'donacion.transaction_status', $charge->status );
				Session::put( 'donacion.reference_id', $charge->reference_id );
				if ( ! $this->saveDonacion() ){
					return View::make( 'public.covers.donar_error' )->with( [
							'status'	=> 'No se pudo registrar en nuestro sistema tu donación, favor de contactarnos'
					] );
				}
			} catch (Conekta_Error $e) {
				return View::make( 'public.covers.donar_error' )->with( [
					'status'	=> $e->getMessage()
				] );
			}
		}

		// return Response::json( [ 'success' => true, 'redirect' => 'gracias' ] );
		return TRUE;
	}

	private function createPlan( $causa = [], $monto = ''){
		if ( empty( $causa ) || empty( $monto ) )
			return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ] ] );

			try {

				$session = Session::get( 'donacion' );
				$email 	 = $session['email'];
				$replace = array("@", ".");
				$email    = str_replace($replace, "_", $email);
				$micro_date = microtime();
				$date_array = explode(" ",$micro_date);

				$plan = Conekta_Plan::create(array(
					'id'           => $email.'_'.$causa->titulo.'_'.$date_array[1],
					'name'         => $email.'_'.$causa->titulo.'_'.$date_array[1],
					'amount'       => $monto,
					'currency'     => "MXN",
					'expiry_count' => 12
				));
			} catch (Conekta_Error $e) {
				return View::make( 'public.covers.donar_error' )->with( [
					'status'	=> $e->getMessage()
				] );
			}	
			$plan['name_clie'] = $email;
			return $plan;

	}

	private function createCliente( $plan = [], $conektaTokenId = ''){
		if ( empty( $plan ) || empty( $conektaTokenId))
			return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ] ] );
		
			try {
				$session = Session::get( 'donacion' );
				$email 	 = $session['email'];
				$customer = Conekta_Customer::create(
				  array(
				    'name'  => $plan['name_clie'],
				    'email' => $email,
				    'cards' => array($conektaTokenId),
				    'plan'  => $plan->id
				  )
				);

			} catch (Conekta_Error $e) {
				return View::make( 'public.covers.donar_error' )->with( [
					'status'	=> $e->getMessage()
				] );
			}	

			return $customer;

	}

	private function methodPaypal( $causa = [], $monto = '' ){
		if ( empty( $causa ) || empty( $monto ) )
			return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ] ] );

		try {
			
		} catch (PPConnetionException $e) {
			
		}
	}

	/**
	 * Método para procesar la información de pago de una donación mediante Oxxo
	 * @param  array $causa Objeto de la Causa
	 * @param  string $monto Monto de la Donación
	 * @return string        Retorna en formato JSON un objeto con los campos "errors", "success", "redirect"
	 */
	private function methodOxxo( $causa = [], $monto = '' ){
		if ( empty( $causa ) || empty( $monto ) )
			return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ] ] );

		try {
			$charge = Conekta_Charge::create( [
				'amount' 		=> $monto,
				'currency' 		=> 'MXN',
				'description' 	=> 'Donación Amparo - Causa ' . $causa->titulo,
				'reference_id'	=> 'FNDAMP-' . mt_rand() . '-' . time(),
				'cash'			=> [
					'type'			=> 'oxxo',
					'expires_at'	=> $this->expires
				],
				'details'		=> [
					'email'		=> Session::get( 'donacion.email' )
				]
			] );
			Session::reflash();
			Session::put( 'donacion.oxxo_barcode', $charge->payment_method->barcode );
			Session::put( 'donacion.oxxo_expires', $charge->payment_method->expires_at );
			Session::put( 'donacion.oxxo', $charge->payment_method->barcode_url );
			Session::put( 'donacion.transaction_id', $charge->id );
			Session::put( 'donacion.transaction_type', $charge->payment_method->type );
			Session::put( 'donacion.transaction_status', $charge->status );
			Session::put( 'donacion.reference_id', $charge->reference_id );
			if ( ! $this->saveDonacion() )
				return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar registrar tu donación, ponte en contacto con nostros.</span>' ] ] );
		} catch ( Conekta_Error $e ) {
			return Response::json( [ 'success' => false, 'errors' => $e->getMessage() ] );
		}
		return Response::json( [ 'success' => true, 'redirect' => 'donar/pago-oxxo' ] );
	}

	/**
	 * Método para procesar la información de pago de una donación mediante SPEI
	 * @param  array $causa Objeto de la Causa
	 * @param  string $monto Monto de la Donación
	 * @return string        Retorna en formato JSON un objeto con los campos "errors", "success", "redirect"
	 */
	private function methodSpei( $causa = [], $monto = '' ){
		if ( empty( $causa ) || empty( $monto ) )
			return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ] ] );
	
		try {
			$charge = Conekta_Charge::create( [
				'amount' 		=> $monto,
				'currency' 		=> 'MXN',
				'description' 	=> 'Donación Amparo - Causa ' . $causa->titulo,
				'reference_id'	=> 'FNDAMP-' . mt_rand() . '-' . time(),
				'bank'			=> [
					'type'			=> 'spei'
				],
				'details'		=> [
					'email'		=> Session::get( 'donacion.email' )
				]
			] );

			Session::reflash();
			Session::put( 'donacion.spei_clabe', $charge->payment_method->clabe );
			Session::put( 'donacion.spei_expires', $this->expires );
			Session::put( 'donacion.spei_bank', $charge->payment_method->bank );
			Session::put( 'donacion.transaction_id', $charge->id );
			Session::put( 'donacion.transaction_type', $charge->payment_method->type );
			Session::put( 'donacion.transaction_status', $charge->status );
			Session::put( 'donacion.reference_id', $charge->reference_id );
			if ( ! $this->saveDonacion() )
				return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar registrar tu donación, ponte en contacto con nostros.</span>' ] ] );
		} catch ( Conekta_Error $e ) {
			return Response::json( [ 'success' => false, 'errors' => $e->getMessage() ] );
		}
		return Response::json( [ 'success' => true, 'redirect' => 'donar/pago-spei' ] );
	}

	/**
	 * Método para guardar en BD en la tabla donaciones el registro de donación
	 * @return
	 */
	private function saveDonacion(){
		$session = Session::get( 'donacion' );
		$donacion 						= new Donaciones;
		$donacion->email 				= $session['email'];
		$donacion->id_causas 			= $session['causa_donar'];
		$donacion->monto_donacion 		= $session['monto'];
		$donacion->reference_id 		= $session['reference_id'];
		$donacion->transaction_id		= $session['transaction_id'];

		if ( Session::has( 'donacion.transaction_brand' ) )
			$donacion->transaction_brand	= $session['transaction_brand'];

		$donacion->transaction_type		= $session['transaction_type'];
		if ( $session['transaction_status'] == 'paid' )
			$donacion->status 				= 1;
		
		$donacion->mostrar_perfil 		= $session['mostrar_perfil'];
		if ( $donacion->save() ){
			if ( ! Auth::customer()->check() )
				$nameDonador = $donacion->email;
			else 
				$nameDonador = Helper::getRegisterFullName();

			if ( $session['transaction_status'] == 'paid' || $session['transaction_status'] == 'active'){
				$donacionMail = Mail::send( 'public.mail.donacion', ['username' => $nameDonador], function( $message ) use ($session){
					$message
						->from( getenv( 'APP_NOREPLY' ), 'Fundación Amparo' )
						->to( $session['email'], "Donador" )
						->subject( 'Gracias por tu donativo a Fundación Amparo' );
				});
				$donacionDiploma = Mail::send( 'public.mail.donacion_diploma', ['username' => $nameDonador], function( $message ) use ($session){
					$message
						->from( getenv( 'APP_NOREPLY' ), 'Fundación Amparo' )
						->to( $session['email'], "Donador" )
						->subject( '¡Felicidades! ' );
				});
			}	

			return TRUE;
		}
		else
			return FALSE;
	}

}