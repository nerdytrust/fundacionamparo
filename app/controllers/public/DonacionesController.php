<?php

/*use Paypal\Rest\ApiContext,
	Paypal\Auth\OAuthTokenCredential;*/

class DonacionesController extends BaseController {

	private $rules_step_one = [
		'causa_donar'	=> [ 'required' ],
        'monto'			=> [ 'required', 'numeric', 'between:10,99999999' ],
        'email'			=> [ 'required', 'email' ],
        'nombre'		=> [ 'required' ],
		'apellidos'     => [ 'required' ]
	];

	private $rules_step_two = [
		'metodo_pago'		=> [ 'required' ],
		'causa_token'		=> [ 'required' ],
		'causa_hash'		=> [ 'required' ]
	];

	private $rules_step_two_recibo = [
		'metodo_pago'		 => [ 'required' ],
		'causa_token'		 => [ 'required' ],
		'causa_hash'		 => [ 'required' ],
		'r_nombre'		     => [ 'required' ],
		'r_rfc'		         => [ 'required' ],
		'r_domicilio_fiscal' => [ 'required' ],
		'r_email'            => [ 'required','email' ]
	];

	private $expires = null;

	private $_api;
    private $_ClientId     = 'AR1HoGPERMVv6OmQpLqPF7-mmuz8EN_mrLV7wS3PciqO5ykSOumGFoWqA7aazDCmzc3aj8daxvTt-urK';
    private $_ClientSecret = 'EKb9eFb9lEDEHRKcRjjnt8Bmwrz8EgVb0UNUbJH4m5fuVRVzfxMZ9bSeYDqAtJEnOEyXsAj9WpmM4A6D';
    private $_ConfigPaypalRecurring = array (
 						'mode'            => 'sandbox' , 
 						'acct1.UserName'  => 'l.espinosa_api1.fundacionamparo.com',
						'acct1.Password'  => 'AWTRZW6GHGGA73RK', 
						'acct1.Signature' => 'AySlr4fJMXSTJ2bW7QBPRYCcWeAAAOopPGcXQrsykeZKRSxwcR4hqayQ'
						);
    private $_RedirectRecurrent = 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=';

	/**
	 * Método constructor para inicializar variables
	 */
	public function __construct(){
		//Llave privada
		Conekta::setApiKey( 'key_jnxj5og4XVrrCEpyhSTYkg' );
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
		Session::forget( 'recibo' );

		if(!isset($inputs['recibo']) || $inputs['recibo']==1)
			return Response::json( [ 'success' => true, 'redirect' => 'donar/paso-2' ] );
		else if(isset($inputs['recibo']) && $inputs['recibo']==0)
			return Response::json( [ 'success' => true, 'redirect' => 'donar/recibo' ] );
	}

	public function reciboDonacion(){
		return View::make( 'public.covers.recibo' );
	}

	public function reciboInputsDonacion(){
		if ( ! Request::ajax() )
			return Response::json( [ 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ], 'success' => false ] );

		$inputs = Input::all();
		$validate = Validator::make( $inputs, $this->rules_recibo );
		if ( $validate->fails() )
			return Response::json( [ 'errors' => $validate->messages()->all('<span class="error">:message</span>'), 'success' => false ] );

		Session::put( 'recibo', $inputs );

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
		
		if(!isset($inputs['recibo']) || $inputs['recibo']==1)
			$validate = Validator::make( $inputs, $this->rules_step_two );
		else if(isset($inputs['recibo']) && $inputs['recibo']==0)
			$validate = Validator::make( $inputs, $this->rules_step_two_recibo );

		if ( $validate->fails() )
			return Response::json( [ 'errors' => $validate->messages()->all( '<span class="error">:message</span>' ), 'success' => false ] );

		if(isset($inputs['recibo']) && $inputs['recibo']==0){
			Session::put( 'recibo', $inputs );
		}

		if ( Session::get( 'donacion.monto') != Crypt::decrypt( $inputs[ 'causa_hash' ] ) && Session::get( 'donacion.causa_donar' ) != Crypt::decrypt( $inputs[ 'causa_token' ] ) )
			return Response::json( [ 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ], 'success' => false ] );

		$causa = Causas::find( Session::get( 'donacion.causa_donar' ) );
		$monto = Session::get( 'donacion.monto' ) * 100;

		switch ( $inputs['metodo_pago'] ) {
				case 'tarjeta':
					return Response::json( [ 'success' => true, 'redirect' => 'donar/pago-tarjeta' ] );
					break;
				case 'paypal':
					if(isset($inputs['recurrente']))
						return Response::json( [ 'success' => true, 'redirect' => 'donar/pago-paypal-recurrent' ] );
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
		else
			return Redirect::to( 'donar/pago-error' );
	}

	/**
	 * Método para mostrar el resultante del API Paypal
	 * @return
	 */
	 public function donarPaypal(){
	 	$donacion = Session::get( 'donacion' );

	 	if ( ! isset( $donacion ) )
	 		return Redirect::to( 'donar' );

	 	$causa = Causas::find( Session::get( 'donacion.causa_donar' ) );
	 	$monto = Session::get( 'donacion.monto' );
	 	
	 	$payer        = new \PayPal\Api\Payer;
	 	$details      = new \PayPal\Api\Details;
	 	$amount       = new \PayPal\Api\Amount;
	 	$transaction  = new \PayPal\Api\Transaction;
	 	$payment      = new \PayPal\Api\Payment;
	 	$redirectUrls = new \PayPal\Api\RedirectUrls;

	 	//Payer
	 	$payer->setPaymentMethod('paypal');

	 	//Details
	 	$details->setShipping('0.00')
	 			->setTax('0.00')
	 			->setSubtotal($monto);

	 	//Amount
	 	$amount->setCurrency('MXN') 
	 		   ->setTotal($monto)
	 		   ->setDetails($details);

	 	//Transaction
	 	$transaction->setAmount($amount)
	 				->setDescription('Fundación Amparo - ' . $causa->titulo );

	 	//Payment
	 	$payment->setIntent('sale')
	 			->setPayer($payer)
	 			->setTransactions([$transaction]);

	 	//Redirect Urls
	 	$redirectUrls->setReturnUrl(URL::to('donar/save-paypal'))
					 ->setCancelUrl(URL::to('donar/pago-error'));

	 	$payment->setRedirectUrls($redirectUrls);

	 	try{

	 	  $payment->create( $this->_api );
	 	  
	 	  $hash = md5($payment->getId());
  		  Session::put( 'paypalhas_hash', $hash );

  		  $session = Session::get( 'donacion' );
  		  $recibo  = Session::get( 'recibo' );
  		  $donacion = new Donaciones;
  		  $donacion->email 				= $session['email'];
	 	  $donacion->id_causas 			= $session['causa_donar'];
	 	  $donacion->monto_donacion 	= $session['monto'];
	 	  $donacion->reference_id 		= $payment->getId();
	 	  $donacion->transaction_id		= Session::get( 'paypalhas_hash' );
	 	  $donacion->transaction_type	= 'paypal';
	 	  $donacion->mostrar_perfil 	= $session['mostrar_perfil'];

	 	  $donacion->nombre				   = $session['nombre'];
		  $donacion->apellidos  		   = $session['apellidos'];

		if($recibo){
			$donacion->comprobante_nombre	 = $recibo['r_nombre'];
			$donacion->comprobante_rfc	     = $recibo['r_rfc'];
			$donacion->comprobante_direccion = $recibo['r_domicilio_fiscal'];
			$donacion->comprobante_email	 = $recibo['r_email'];
		}	

	 	  $donacion->save();

	 	}catch(PPConnetionException $e){
	 		return View::make( 'public.covers.donar_error' )->with( [
	 			'status'	=> $e->getMessage()
	 		] );
	 	}

	 	foreach ($payment->getLinks() as $link){
	 		if ( $link->getRel() == 'approval_url' )
	 			$redirect = $link->getHref();
	 	}

	 	return Redirect::to( $redirect );

	 }

	/**
	* Método para mostrar el resultante del API Paypal
	* @return
	*/
	public function donarPaypalRecurring(){
		$donacion = Session::get( 'donacion' );

	 	if ( ! isset( $donacion ) )
	 		return Redirect::to( 'donar' );

	 	$causa = Causas::find( Session::get( 'donacion.causa_donar' ) );
	 	$monto = Session::get( 'donacion.monto' );

	 	try{
			$paypalService = new \PayPal\Service\PayPalAPIInterfaceServiceService($this->_ConfigPaypalRecurring);
			$paymentDetails= new \PayPal\EBLBaseComponents\PaymentDetailsType();

			$orderTotal = new \PayPal\CoreComponentTypes\BasicAmountType();
			$orderTotal->currencyID = 'MXN';
			$orderTotal->value = $monto;

			$paymentDetails->OrderTotal = $orderTotal;
			$paymentDetails->PaymentAction = 'Sale';

			$setECReqDetails = new \PayPal\EBLBaseComponents\SetExpressCheckoutRequestDetailsType();
			$setECReqDetails->PaymentDetails[0] = $paymentDetails;
			$setECReqDetails->CancelURL = URL::to('donar/pago-error');
			$setECReqDetails->ReturnURL = URL::to('donar/save-paypal-recurrent');
			  
			$billingAgreementDetails = new \PayPal\EBLBaseComponents\BillingAgreementDetailsType('RecurringPayments');
			$billingAgreementDetails->BillingAgreementDescription = 'Pago recurrente para causa '.$causa->titulo;
			$setECReqDetails->BillingAgreementDetails = array($billingAgreementDetails);

			$setECReqType = new \PayPal\PayPalAPI\SetExpressCheckoutRequestType();
			$setECReqType->Version = '104.0';
			$setECReqType->SetExpressCheckoutRequestDetails = $setECReqDetails;

			$setECReq = new \PayPal\PayPalAPI\SetExpressCheckoutReq();
			$setECReq->SetExpressCheckoutRequest = $setECReqType;

			$setECResponse = $paypalService->SetExpressCheckout($setECReq);

		}catch(PPConnetionException $e){
	 		return View::make( 'public.covers.donar_error' )->with( [
	 			'status'	=> $e->getMessage()
	 		] );
	 	}

	 	if($setECResponse->Ack == 'Success' || $setECResponse->Ack == 'SuccessWithWarning'){

			$redirect = $this->_RedirectRecurrent.$setECResponse->Token;

			$hash = md5($setECResponse->Token);
  		  	Session::put( 'paypalhas_hash_rec', $hash );

			$session = Session::get( 'donacion' );
			$recibo  = Session::get( 'recibo' );
	  		$donacion = new Donaciones;
	  		$donacion->email 			= $session['email'];
		 	$donacion->id_causas 		= $session['causa_donar'];
		 	$donacion->monto_donacion 	= $session['monto'];
		 	$donacion->reference_id 	= $setECResponse->Token;
		 	$donacion->transaction_id	= Session::get( 'paypalhas_hash_rec' );
		 	$donacion->transaction_type	= 'paypal-rec';
		 	$donacion->mostrar_perfil 	= $session['mostrar_perfil'];

		 	$donacion->nombre				 = $session['nombre'];
			$donacion->apellidos  			 = $session['apellidos'];

			if($recibo){
				$donacion->comprobante_nombre	 = $recibo['r_nombre'];
				$donacion->comprobante_rfc	     = $recibo['r_rfc'];
				$donacion->comprobante_direccion = $recibo['r_domicilio_fiscal'];
				$donacion->comprobante_email	 = $recibo['r_email'];
			}	

		 	$donacion->save();

	 		return Redirect::to( $redirect );

	 	}else{
	 		return View::make( 'public.covers.donar_error' )->with( [
							'status'	=> 'No se pudo registrar en nuestro sistema tu donación, favor de contactarnos'
					] );
	 	}
	 	

	}

	 /**
	 * Método para guardar en BD en la tabla donaciones el registro de donación
	 * @return
	 */
	 public function saveDonacionPaypal(){
	 	$oPayment = new \PayPal\Api\Payment;
	 	$payerId = $_GET['PayerID'];
	 	$paymentId = DB::table( 'donaciones' )
	 				 ->where('transaction_id',Session::get( 'paypalhas_hash' ))
	 				 ->select('reference_id', 'email')
	 				 ->first();
	 	$email = $paymentId->email;
	 	$paymentId = $paymentId->reference_id;
	 	$payment = $oPayment::get($paymentId,$this->_api); 
	 	$execution = new \PayPal\Api\PaymentExecution;
	 	$execution->setPayerId($payerId);	
	 	$executionFinal = $payment->execute($execution,$this->_api);

		if($executionFinal->state == 'approved'){
		 	DB::table('donaciones')
	             ->where('reference_id', $paymentId)
	             ->update(array('status' => 1));

	        Session::forget( 'paypalhas_hash' );

	        if ( ! Auth::customer()->check() )
				$nameDonador = $email;
			else 
				$nameDonador = Helper::getRegisterFullName();

		    $donacionMail = Mail::send( 'public.mail.donacion', ['username' => $nameDonador], function( $message ) use ($email){
						$message
							->from( getenv( 'APP_NOREPLY' ), 'Fundación Amparo' )
							->to( $email, "Donador" )
							->subject( 'Gracias por tu donativo a Fundación Amparo' );
					});
			$donacionDiploma = Mail::send( 'public.mail.donacion_diploma', ['username' => $nameDonador], function( $message ) use ($email){
						$message
							->from( getenv( 'APP_NOREPLY' ), 'Fundación Amparo' )
							->to( $email, "Donador" )
							->subject( '¡Felicidades! ' );
					});

	        return Redirect::to( 'gracias' );

	    } else {

	    	return View::make( 'public.covers.donar_error' )->with( [
							'status'	=> 'No se pudo registrar en nuestro sistema tu donación, favor de contactarnos'
					] );

	    }

	 }

	 /**
	 * Método para guardar en BD en la tabla donaciones el registro de donación
	 * @return
	 */
	 public function saveDonacionPaypalRecurring(){

	 	$causa   = Causas::find( Session::get( 'donacion.causa_donar' ) );
	 	$monto   = Session::get( 'donacion.monto' );
	 	$token   = $_GET['token'];
	 	$PayerID = $_GET['PayerID'];

		$profileDetails = new \PayPal\EBLBaseComponents\RecurringPaymentsProfileDetailsType();
		$profileDetails->BillingStartDate = date("Y-m-d")."T00:00:00:000Z";

		$paymentBillingPeriod = new \PayPal\EBLBaseComponents\BillingPeriodDetailsType();
		$paymentBillingPeriod->BillingFrequency = 1;
		$paymentBillingPeriod->BillingPeriod = "Month";
		$paymentBillingPeriod->TotalBillingCycles = 12;
		$paymentBillingPeriod->Amount = new \PayPal\CoreComponentTypes\BasicAmountType("MXN", $monto);

		$scheduleDetails = new \PayPal\EBLBaseComponents\ScheduleDetailsType();
		$scheduleDetails->Description = 'Pago recurrente para causa '.$causa->titulo;
		$scheduleDetails->PaymentPeriod = $paymentBillingPeriod;

		$createRPProfileRequestDetails = new \PayPal\EBLBaseComponents\CreateRecurringPaymentsProfileRequestDetailsType();
		$createRPProfileRequestDetails->Token = $token;

		$createRPProfileRequestDetails->ScheduleDetails = $scheduleDetails;
		$createRPProfileRequestDetails->RecurringPaymentsProfileDetails = $profileDetails;

		$createRPProfileRequest = new \PayPal\PayPalAPI\CreateRecurringPaymentsProfileRequestType();
		$createRPProfileRequest->CreateRecurringPaymentsProfileRequestDetails = $createRPProfileRequestDetails;

		$createRPProfileReq = new \PayPal\PayPalAPI\CreateRecurringPaymentsProfileReq();
		$createRPProfileReq->CreateRecurringPaymentsProfileRequest = $createRPProfileRequest;

		$paypalService = new \PayPal\Service\PayPalAPIInterfaceServiceService($this->_ConfigPaypalRecurring);
		$createRPProfileResponse = $paypalService->CreateRecurringPaymentsProfile($createRPProfileReq); 

		if($createRPProfileResponse->Ack == 'Success'){

		 	$paymentId = DB::table( 'donaciones' )
		 				 ->where('transaction_id',Session::get( 'paypalhas_hash_rec' ))
		 				 ->select('reference_id', 'email')
		 				 ->first();

		 	$email = $paymentId->email;
		 	$paymentId = $paymentId->reference_id; 

			DB::table('donaciones')
	             ->where('reference_id', $paymentId)
	             ->update(array('status' => 1));

	        Session::forget( 'paypalhas_hash_rec' );

	        if ( ! Auth::customer()->check() )
				$nameDonador = $email;
			else 
				$nameDonador = Helper::getRegisterFullName();

		    $donacionMail = Mail::send( 'public.mail.donacion', ['username' => $nameDonador], function( $message ) use ($email){
						$message
							->from( getenv( 'APP_NOREPLY' ), 'Fundación Amparo' )
							->to( $email, "Donador" )
							->subject( 'Gracias por tu donativo a Fundación Amparo' );
					});
			$donacionDiploma = Mail::send( 'public.mail.donacion_diploma', ['username' => $nameDonador], function( $message ) use ($email){
						$message
							->from( getenv( 'APP_NOREPLY' ), 'Fundación Amparo' )
							->to( $email, "Donador" )
							->subject( '¡Felicidades! ' );
					});

	         return Redirect::to( 'gracias' );

		} else {

			return View::make( 'public.covers.donar_error' )->with( [
							'status'	=> 'No se pudo registrar en nuestro sistema tu donación, favor de contactarnos'
					] );

		}

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
					//'card'			=> $conektaTokenId,
					'card'=> 'tok_test_visa_4242',
					'details'		=> [
						'name'		=> Session::get( 'donacion.nombre' ),
						'email'		=> Session::get( 'donacion.email' ),
						'phone'		=> '000-000-0000',
						'line_items'=> [
						    	[
						        'name'=> $causa->titulo,
						        'description'=> 'donación para la causa'. $causa->titulo,
						        'unit_price'=> $monto,
						        'quantity'=> 1,
						      	]
						]
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
				return FALSE;
				return View::make( 'public.covers.donar_error' )->with( [
					'status'	=> $e->message_to_purchaser
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

	/*private function methodPaypal( $causa = [], $monto = '' ){
		if ( empty( $causa ) || empty( $monto ) )
			return Response::json( [ 'success' => false, 'errors' => [ '<span class="error">¡Ups! Ha ocurrido un problema al intentar procesar tu donación.</span>' ] ] );

		try {
			
		} catch (PPConnetionException $e) {
			
		}
	}*/

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
			//return Response::json( [ 'success' => false, 'errors' => $e->getMessage() ] );
			return Response::json( [ 'success' => false, 'errors' => '!Ups¡, ha ocurrido un error, revisa tus datos nuevamente, recuerda que para OXXO el monto mínimo es $15' ] );
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
			//return Response::json( [ 'success' => false, 'errors' => $e->getMessage() ] );
			return Response::json( [ 'success' => false, 'errors' => '!Ups¡, ha ocurrido un error, revisa tus datos nuevamente, recuerda que para SPEI el monto mínimo es $15' ] );
		}
		return Response::json( [ 'success' => true, 'redirect' => 'donar/pago-spei' ] );
	}

	/**
	 * Método para guardar en BD en la tabla donaciones el registro de donación
	 * @return
	 */
	private function saveDonacion(){
		$session = Session::get( 'donacion' );
		$recibo  = Session::get( 'recibo' );

		$donacion 						= new Donaciones;
		$donacion->email 				= $session['email'];
		$donacion->id_causas 			= $session['causa_donar'];
		$donacion->monto_donacion 		= $session['monto'];
		$donacion->reference_id 		= $session['reference_id'];
		$donacion->transaction_id		= $session['transaction_id'];

		$donacion->nombre				= $session['nombre'];
		$donacion->apellidos  			= $session['apellidos'];

		if($recibo){
			$donacion->comprobante_nombre	 = $recibo['r_nombre'];
			$donacion->comprobante_rfc	     = $recibo['r_rfc'];
			$donacion->comprobante_direccion = $recibo['r_domicilio_fiscal'];
			$donacion->comprobante_email	 = $recibo['r_email'];
		}	

		if ( Session::has( 'donacion.transaction_brand' ) )
			$donacion->transaction_brand	= $session['transaction_brand'];

		$donacion->transaction_type		= $session['transaction_type'];
		if ( $session['transaction_status'] == 'paid' )
			$donacion->status 				= 1;
		
		$donacion->mostrar_perfil 		= $session['mostrar_perfil'];
		if ( $donacion->save() ){
			/*if ( ! Auth::customer()->check() )
				$nameDonador = $donacion->email;
			else */
				$nameDonador = $donacion->nombre.' '.$donacion->apellidos;

				$session['r_rfc']              = (isset($recibo['r_rfc']))?$recibo['r_rfc']:'';
				$session['r_domicilio_fiscal'] = (isset($recibo['r_domicilio_fiscal']))?$recibo['r_domicilio_fiscal']:'';
				$session['r_email']            = (isset($recibo['r_email']))?$recibo['r_email']:'';
				$session['r_nombre']           = (isset($recibo['r_nombre']))?$recibo['r_nombre']:'';

				$causa = Causas::find( $session['causa_donar'] );

				$session['causa'] = $causa->titulo;
				$session['causa'] = $causa->titulo;

				//print_r($session);die;

				$donacionMailFundacion = Mail::send( 'public.mail.donacion_fundacion', $session, function( $message ) use ($session){
					$message
						->from( getenv( 'APP_NOREPLY' ), 'Fundación Amparo' )
						->to( "aslanlion56@gmail.com", "Fundación Amparo" )
						->subject( 'Nueva donación a Fundación Amparo (Generada en desarrollo)' );
				});

			if ( $session['transaction_status'] == 'paid' || $session['transaction_status'] == 'active'){
				$donacionMail = Mail::send( 'public.mail.donacion', ['username' => $nameDonador], function( $message ) use ($session){
					$message
						->from( getenv( 'APP_NOREPLY' ), 'Fundación Amparo' )
						->to( $session['email'], "Donador" )
						->subject( 'Gracias por tu donativo a Fundación Amparo ' );
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