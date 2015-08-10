<?php

class HomeController extends BaseController {

	private $rules_recovery_password = [
		'username' => [ 'required', 'email' ]
	];

	private $rules_new_member = [
		'name'					=> [ 'required', 'min:5', 'max:150' ],
		'email'					=> [ 'required', 'email', 'unique:users' ],
		'password'				=> [ 'required', 'min:8', 'max:16', 'confirmed' ],
		'password_confirmation'	=> [ 'required', 'min:8' ],
		'terminos'				=> [ 'accepted' ]
	];

	public function __construct(){
	}

	/**
	 * Método para la sección de home, se envían a la vista los elementos de video, causas
	 * últimos donadores
	 * Se manda la librería Helper mediante el método with
	 * @return Vista del Home
	 */
	public function home() {
		$videos = Videos::where('id_secciones', 1 )->get();
	    $causas = Causas:: select(DB::raw('*,meta as metaTotal'))
	    				  ->orderBy( 'orden' )
	    				  ->orderBy( 'causas.created_at','desc' )
	    				  ->take(3)
	    				  ->where( 'id_tipo_causas', 1 )
	    				  ->where( 'fecha', '>', date('Y-m-d') )
	    				  ->get();	
	    $causas = $this->getClass($causas);
	    $ultimos = [];
		$ultimos['donadores'] = DB::table( 'donaciones' )
				->distinct()
				->join( 'registrados', 'donaciones.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'donaciones.status', 1 )
				->where( 'donaciones.mostrar_perfil', 1 )
				->select( 'profiles.id_profiles','profiles.photoURL', 'profiles.displayName', 'profiles.city', 'registrados.id_registrados' )
				->orderBy( 'donaciones.created_at', 'DESC' )
				->take(2)
				->get();
		$ultimos['impulsores'] = DB::table( 'impulsadas' )
				->distinct()
				->join( 'registrados', 'impulsadas.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				//->where( 'impulsadas.status', 1 )
				->where( 'impulsadas.mostrar_perfil', 1 )
				->select( 'profiles.id_profiles', 'profiles.photoURL', 'profiles.displayName', 'profiles.city','registrados.id_registrados' )
				->orderBy( 'impulsadas.created_at', 'DESC' )
				->take(1)
				->get();
		$ultimos['voluntarios'] = DB::table( 'voluntarios' )
				->distinct()
				->join( 'registrados', 'voluntarios.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'voluntarios.aprobacion', 1 )
				->where( 'voluntarios.terminos', 1 )
				->select( 'profiles.id_profiles','profiles.photoURL', 'profiles.displayName', 'profiles.city', 'registrados.id_registrados' )
				->orderBy( 'voluntarios.created_at', 'DESC' )
				->take(2)
				->get();
		$ultimos = array_unique( $ultimos, SORT_REGULAR );
		$total_donadores = Session::get( 'total_donadores' );
		if ( ! $total_donadores || empty( $total_donadores ) ){
			$total_donadores = DB::table('donaciones')->distinct()->where('status', 1)->groupBy( 'email' )->get();
			$total_donadores = count( $total_donadores );
		}

		Session::put( 'total_donadores', $total_donadores );
	    return View::make( 'public.home.index' )->with( [ 
	    	'videos' 			=> $videos,
	    	'causas' 			=> $causas,
	    	'ultimos'			=> $ultimos
	    ] );
	}

	/**
	 * Método para mostrar la vista de login
	 * @return
	 */
	public function index() {
		return View::make( 'public.home.entrar' );
	}

	/**
	 * Método para mostrar la vista del formulario para recuperar el password
	 * @return
	 */
	public function forgotPassword() {
		return View::make( 'public.home.forgot' );
	}

	/**
	 * Método para procesar el formulario de registro
	 * @return string JSON con estados de las respuestas al request AJAX
	 */
	public function newMember() {
		$inputs = Input::all();
		$validate = Validator::make( $inputs, $this->rules_new_member );
		if ( $validate->fails() )
			return Response::json( [ 'success' => false, 'errors' => $validate->messages()->all('<span class="error">:message</span>'), 'message' => '' ] );

		$profile = $this->findProfile( 'manual', $inputs );
		if ( ! $profile )
			return Response::json( [ 'success' => false, 'errors' => '<span class="error">¡Ups! Ha ocurrido un problema al intetar <strong>registrarte</strong>, intenta nuevamente</span>', 'message' => '' ] );

		return Response::json( [ 'success' => true, 'redirect' => 'gracias-registro' ] );
	}

	/**
	 * Método para mostrar la vista para cerrar sesión
	 * @return
	 */
	public function salir() {
		return View::make( 'public.home.salir' );
	}

	/**
	 * Método para enviar por correo el password al usuario que lo solicite
	 * @return string JSON con los estados de la respuesta al request AJAX
	 */
	public function sendPassword() {
		$inputs = Input::all();
		$validate = Validator::make( $inputs, $this->rules_recovery_password );
		if ( $validate->fails() )
			return Response::json( [ 'success' => false, 'errors' => $validate->messages()->all('<span class="error">:message</span>'), 'message' => '' ] );

		$user = Registrados::where( 'email', $inputs['username'] )->first();
		if ( ! $user )
			return Response::json( [ 'success' => true, 'errors' => '', 'message' => 'Se ha enviado tu <strong>contraseña</strong> al correo indicado' ] );
		
		$recovery = Mail::send( 'public.mail.recovery', [ 'username' => $user->email, 'password' => Crypt::decrypt( $user->password )  ], function( $message ) use ( $user ){
			$message
				->from( getenv( 'APP_NOREPLY' ), 'no-reply' )
				->to( $user->email, $user->nombre_completo )
				->subject( 'Solicitud de Contraseña' );
		});

		return Response::json( [ 'success' => true, 'errors' => '', 'message' => 'Se ha enviado tu <strong>contraseña</strong> al correo indicado' ] );
	}

	/**
	 * Método para mostrar la vista de las políticas de privacidad
	 * @return Vista de políticas de privacidad
	 */
	public function privacidad() {
		return View::make( 'public.home.privacy' );
	}

	/**
	 * Método para mostrar el formulario de registro
	 * @return
	 */
	public function registro() {
		return View::make( 'public.home.registro' )->with( [
			'estados' => Estados::where( 'id_paises', 142 )->get()
		] );
	}

	/**
	 * Método para mostrar la vista de resultados del buscador
	 * @return
	 */
	public function search() {

		$resultados  = '';
		$perfiles    = '';
		$noticias    = '';
		$causas      = '';
		$donaciones  = '';
		$voluntarios = '';
		$impulsadas  = '';

		$s = Input::get( 's' );
		if (  isset( $s ) || ! empty ( $s )  || $s != '' ){
			

		$noticias = DB::table( 'noticias' )->limit(3)->offset(0)
				->where( 'titulo',    'LIKE', "%$s%" )
				->orWhere( 'contenido', 'LIKE', "%$s%" )
				->orWhere( 'extracto',  'LIKE', "%$s%" )
				->orderBy( 'fecha_publicacion','desc' )
				->select( '*' )
				->get();

		$coutn_noticias = Noticias::where( 'titulo',    'LIKE', "%$s%" )
				->orWhere( 'contenido', 'LIKE', "%$s%" )
				->orWhere( 'extracto',  'LIKE', "%$s%" )
			    ->count();

		$causas = DB::table( 'causas' )->limit(3)->offset(0)
				->where( 'titulo',    'LIKE', "%$s%" )
				->orWhere( 'descripcion', 'LIKE', "%$s%" )
				->orderBy( 'created_at','desc' )
				->select( '*' )
				->get();

		$count_causas = DB::table( 'causas' )
				->where( 'titulo',    'LIKE', "%$s%" )
				->orWhere( 'descripcion', 'LIKE', "%$s%" )
				->count();

		$donaciones = DB::table( 'donaciones' )->limit(3)->offset(0)
				->distinct()
				->join( 'registrados', 'donaciones.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'donaciones.status', 1 )
				->where( 'donaciones.mostrar_perfil', 1 )
				->where( 'profiles.displayName','LIKE', "%$s%" )
				->select( 'profiles.id_profiles','profiles.photoURL', 'profiles.displayName', 'profiles.city','registrados.id_registrados','registrados.me_gusta' )
				->get();

		$count_donaciones= DB::table( 'donaciones' )
				->distinct()
				->join( 'registrados', 'donaciones.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'donaciones.status', 1 )
				->where( 'donaciones.mostrar_perfil', 1 )
				->where( 'profiles.displayName','LIKE', "%$s%" )
				->count();

		$voluntarios = DB::table( 'voluntarios' )->limit(3)->offset(0)
				->distinct()
				->join( 'registrados', 'voluntarios.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'voluntarios.aprobacion', 1 )
				->where( 'voluntarios.terminos', 1 )
				->where( 'profiles.displayName','LIKE', "%$s%" )
				->select( 'profiles.id_profiles','profiles.photoURL', 'profiles.displayName', 'profiles.city','registrados.id_registrados','registrados.me_gusta' )
				->get();

		$count_voluntarios = DB::table( 'voluntarios' )
				->distinct()
				->join( 'registrados', 'voluntarios.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				->where( 'voluntarios.aprobacion', 1 )
				->where( 'voluntarios.terminos', 1 )
				->where( 'profiles.displayName','LIKE', "%$s%" )
				->count();

		$impulsadas = DB::table( 'impulsadas' )->limit(3)->offset(0)
				->distinct()
				->join( 'registrados', 'impulsadas.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				//->where( 'impulsadas.status', 1 )
				->where( 'impulsadas.mostrar_perfil', 1 )
				->where( 'profiles.displayName','LIKE', "%$s%" )
				->select( 'profiles.id_profiles', 'profiles.photoURL', 'profiles.displayName', 'profiles.city','registrados.id_registrados','registrados.me_gusta' )
				->get();

		$count_impulsadas = DB::table( 'impulsadas' )
				->distinct()
				->join( 'registrados', 'impulsadas.email', '=', 'registrados.email' )
				->join( 'profiles', 'registrados.id_registrados', '=', 'profiles.id_registrados' )
				//->where( 'impulsadas.status', 1 )
				->where( 'impulsadas.mostrar_perfil', 1 )
				->where( 'profiles.displayName','LIKE', "%$s%" )
				->count();

				foreach ($donaciones as $key => $value) {
					$perfiles[$value->id_profiles] = $value;
					$type[$value->id_profiles]['donador'] = true;
				}
				foreach ($voluntarios as $key => $value) {
					$perfiles[$value->id_profiles] = $value;
					$type[$value->id_profiles]['voluntario'] = true;
				}

				foreach ($impulsadas as $key => $value) {
					$perfiles[$value->id_profiles] = $value;
					$type[$value->id_profiles]['impulsor'] = true;
				}
		}

		return View::make( 'public.home.resultados' )->with( [
			'noticias' => $noticias,
			'causas'   => $causas,
			'perfiles' => $perfiles,
			'count'    => $coutn_noticias + $count_causas + $count_impulsadas + $count_voluntarios + $count_donaciones

		] );
	}

	/**
	 * Método para cerrar la sesión del usuario mediante el método Auth personalizado
	 * @return
	 */
	public function logout() {
		if ( Auth::customer()->check() )
			Auth::customer()->logout();

		return Redirect::to( '/' );
	}

	/**
	 * Método para verificar si existe algún Profile con los datos del usuario
	 * @param  string $provider        Tipo de proveedor del perfil, en caso del registro manual el valor es "manual"
	 * @param  array $adapter_profile Información introducida por el usuario en el formulario de registro
	 * @return array                  Devuelve un arreglo en caso de encontrar el perfil, y/o en caso de guardar correctamente el registro
	 * Devuelve NULL en caso de que algo haya fallado
	 */
	private function findProfile( $provider, $adapter_profile ){
		$profile = Profiles::where( 'provider', $provider )->where( 'email', $adapter_profile['email'] )->first();
		$user = Registrados::where( 'email', $adapter_profile['email'] )->first();

		if( ! $user )
			$user = $this->createNewRegister( $adapter_profile );

		if ( ! $profile )
			$profile = $this->createProfileFromRegister( $provider, $adapter_profile, $user );

		return $profile;
	}

	/**
	 * Método para crear un registro en Registrados
	 * @param  array $adapter_profile Información introducida por el usuario en el formulario de registro
	 * @return array                  Devuelve el arreglo del registro guardado exitosamente o NULL en caso de que no
	 */
	private function createNewRegister( $adapter_profile ){
		$user = new Registrados;
		$user->email = $adapter_profile['email'];
		$user->password = Hash::make( $adapter_profile['password'] );
		$user->terminos = $adapter_profile['terminos'];
		if ( ! $user->save() )
			return NULL;

		return $user;
	}

	/**
	 * Método para crear un registro Profiles para un nuevo usuario
	 * @param  string $provider        Tipo de proveedor del perfil, en este caso "manual" por ser un registro manual
	 * @param  array $adapter_profile Información introducida por el usuario en el formulario de registro
	 * @param  array $user            Arreglo del registro guardado exitosamente en el método @createNewRegister para obtener el id_registrados y relacionarlo
	 * @return array                  Devuelve el arreglo del registro guardado exitosamente o NULL en caso de que no
	 */
	private function createProfileFromRegister( $provider, $adapter_profile, $user ){
		$profile = new Profiles;
		$profile->id_registrados = $user->id_registrados;
		$profile->provider = $provider;
		$profile->displayName = $adapter_profile['name'];
		$profile->email = $adapter_profile['email'];
		$profile->emailVerified = $adapter_profile['email'];
		//$profile->region = $adapter_profile['estado'];
		//$profile->city = $adapter_profile['ciudad'];
		if ( ! $profile->save() )
			return NULL;

		return $profile;
	}

	/**
	 * Método para determinar la clase de las causas 100%, 50%, 33% y obtener lo recaudado de cada causa
	 * @param  array $causas  Información introducida por el usuario en el formulario de registro
	 * @return array          Devuelve el arreglo del registro guardado exitosamente o NULL en caso de que no
	 */
	private function getClass($causas){
		$coutnCausas = count($causas);
		$fmod        = fmod(count($causas),3);

		if($fmod == 1) 
			 $causas[$coutnCausas -1]['class'] = 100;
		else if($fmod == 2){
			 $causas[$coutnCausas -2]['class'] = 50; 
			 $causas[$coutnCausas -1]['class'] = 50;
		}

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
}

/* End of file HomeController.php */
/* Location: ./app/controllers/public/HomeController.php */