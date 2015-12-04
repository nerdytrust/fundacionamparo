<?php

/**
 * Librería que sirve para hacer procesos de ayuda para darle formato a la información de las vistas
 * @author Eric Bravo <ebravo@itcitrus.mx>
 * @package Helper
 * @version 1.0 Primera versión de la librería de ayuda
 */

class Helper {

	private $fullname = null;

	private $hybridauth;

	public function __construct(){
		$this->setHybridAuth( Auth::customer()->user() );
	}

	/**
	 * Método para obtener los días restantes de una causa
	 * @param  date $date Fecha de meta de la causa
	 * @return string       Días restantes para la meta de la causa
	 */
	public static function getRemaining( $date ){
		$date = strtotime( $date );
		$now = time();
		$timeleft = $date - $now;
		$remaining_days = round( ( ( $timeleft / 24 ) / 60 ) / 60 );
		return $remaining_days;
	}

	public static function fullName( $nombre = '', $apellidos = '' ){
		print_r( $this->fullname );die;
		return $fullname;
	}

	/**
	 * Método para agregar un botón share twitter
	 * @param  string $text Título del contenido
	 * @param  string $url  Url de la sección o contenido
	 * @param  string $hashtags  Hashtag con el que se hace el share
	 * @return Html del botón de share twitter
	 */
	public static function twitterShare( $text, $url, $hashtags ){
		$share_twitter = '<a href="https://twitter.com/intent/tweet?via=' . getenv( 'APP_USER_TWITTER' ) . '&text=' . $text . '&url=' . $url . '&hashtags=' . $hashtags .'"><li class="fa fa-twitter"></li></a>';
		return $share_twitter;
	}
	/**
	 * Método para agregar un botón share twitter con el usuario alterno
	 * @param  string $text Título del contenido
	 * @param  string $url  Url de la sección o contenido
	 * @param  string $hashtags  Hashtag con el que se hace el share
	 * @return Html del botón de share twitter
	 */
	public static function twitterShare2( $text, $url, $hashtags ){
		$share_twitter = '<a href="https://twitter.com/intent/tweet?via=' . getenv( 'APP_USER2_TWITTER' ) . '&text=' . $text . '&url=' . $url . '&hashtags=' . $hashtags .'"><li class="fa fa-twitter"></li></a>';
		return $share_twitter;
	}
	/**
	 * Método para agregar un botón share twitter en los popups
	 * @param  string $text Título del contenido
	 * @param  string $url  Url de la sección o contenido
	 * @param  string $hashtags  Hashtag con el que se hace el share
	 * @return Html del botón de share twitter
	 */
	public static function twitterSharePop( $text, $url, $hashtags ){
		$share_twitter = '<a href="https://twitter.com/intent/tweet?via=' . getenv( 'APP_USER_TWITTER' ) . '&text=' . $text . '&url=' . $url . '&hashtags=' . $hashtags .'"><button class="twit"></button></a>';
		return $share_twitter;
	}
	/**
	 * Método para agregar un botón share facebook
	 * @param  string $after  Etiqueta HTML de apertura
	 * @param  string $url    URL de la sección o contenido
	 * @param  string $before Etiqueta HTML de cierre
	 * @return Html del botón de share de facebook
	 */
	public static function facebookShare( $after = '', $url, $before = '' ){
		$fb_share = '<a href="https://www.facebook.com/dialog/share?app_id=776167932490026&href=' . $url . '&display=popup&redirect_uri=' . URL::to('facebook-close') . '" onclick="return fbs_click(640, 536)">' .$after . '<li class="fa fa-facebook"></li>' . $before . '</a>';
		//$fb_share = '<a href="http://www.facebook.com/share.php?u='. Request::url().'" onClick="return fbs_click(640, 536)" target="_blank" title="Share on Facebook">' .$after . '<li class="fa fa-facebook"></li>' . $before . '</a>';
		return $fb_share;
	}
	/**
	 * Método para agregar un botón share facebook en los popups
	 * @param  string $after  Etiqueta HTML de apertura
	 * @param  string $url    URL de la sección o contenido
	 * @param  string $before Etiqueta HTML de cierre
	 * @return Html del botón de share de facebook
	 */
	public static function facebookSharePop( $after = '', $url, $before = '', $message = ''){
		$fb_share = '<a href="http://www.facebook.com/share.php?u='. Request::url().'" onClick="return fbs_click(640, 536)" target="_blank" title="Share on Facebook">' .$after . '<button class="face"></button>' . $before . '</a>';
		return $fb_share;
	}
	/**
	 * Método para obtener las URL's sin http o https
	 * @param  string $url URL
	 * @return string      URL sin http o https
	 */
	public static function nameUrl( $url = '' ){
		$name_url = preg_replace( '#^https?://#', '', $url );
		return $name_url;
	}

	/**
	 * Método para obtener el avatar o imagen de perfil del usuario logueado
	 * @return string URL del avatar del usuario obtenido de Facebook
	 */
	public static function getAvatar() {
		$session = new Helper;
		$avatar = Profiles::find( $session->getHybridAuth()->id_registrados );
		if($avatar->photoURL!='')
			return $avatar->photoURL;
		return asset( 'images/perfil_interno.jpg' );
	}

	/**
	 * Método para obtener el email del usuario logueado
	 * @return string Dirección de Correo con la que se registró el usuario u obtenida de Facebook
	 */
	public static function getEmail() {
		$user = new Helper;
		$email = $user->getHybridAuth()->email;
		return $email;
	}

	/**
	 * Método para obtener el id de registro del usuario logueado
	 * @return integer ID de registro del usuario logueado
	 */
	public static function getRegisterId(){
		$user = new Helper;
		$id_register = $user->getHybridAuth()->id_registrados;
		return $id_register;
	}

	/**
	 * Método para obtener el nombre de registro del usuario logueado
	 * @return string fullname de registro del usuario logueado
	 */
	public static function getRegisterFullName(){
		$user = new Helper;
		$displayName = Profiles::select('displayName')->where('id_profiles',$user->getRegisterId())->first();
		return $displayName->displayName; 
	}

	public function getHybridAuth() {
		return $this->hybridauth;
	}

	public function setHybridAuth( $hybridauth ) {
		$this->hybridauth = $hybridauth;
	}

	/**
	 * Método para mostrar el botón de like dependiendo el tipo de contenido
	 * @param  string $id_contenido   ID del contenido
	 * @param  string $tipo_contenido Tipo de contenido
	 * @return string                 HTML del botón del like
	 */
	public static function like( $id_contenido = '', $tipo_contenido = '' ){
		$like_button = '<a data-contenido="' . $id_contenido . '" data-tipo="' . $tipo_contenido . '" class="like-process"><li class="fa fa-heart"></li></a>';
		if ( Session::has( 'likes' ) ){
			$likes = Session::get( 'likes' );
			foreach( $likes as $like ){
				if ( $like['content_id'] == $id_contenido && $like['content_type'] == $tipo_contenido )
					$like_button = '<a data-contenido="' . $id_contenido . '" data-tipo="' . $tipo_contenido . '" class="like-process"><li class="fa fa-heart like-content-active"></li></a>';
			}
		}

		return $like_button;
	}

	/**
	 * Método para obtener el año con el que comienzan los combobox de fecha AÑO
	 * Tomando en cuenta la fecha actual, menos 18 años que vendria siendo la mayoría de edad
	 * @return string Año válido en fechas de nacimiento
	 */
	public static function getValidYear( $diferencia = 18 ){
		$today = strtotime('-' . $diferencia . ' year', time() );
		return date( 'Y', $today );
	}

	/**
	 * Método para obtener el mes que aparece por defecto seleccionado en el combobox de fecha MES
	 * @return string MES válido en fechas de nacimiento
	 */
	public static function getValidMonth(){
		$today = time();
		return date( 'm', $today );
	}

	/**
	 * Método para obtener el día que aparece por defecto seleccionado en el combobox de fecha DIA
	 * @return string Día válido en fechas de nacimiento
	 */
	public static function getValidDay(){
		$today = time();
		return date( 'd', $today );
	}

	/**
	 * Método para convertir la fecha de nacimiento a unixtime
	 * @param  string $day   Día
	 * @param  string $month Mes
	 * @param  string $year  Año
	 * @return integer        Fecha de nacimiento en formato UNIX
	 */
	public static function convertDate( $day = '', $month = '', $year = '' ){
		$date = strtotime( $day . '-' . $month . '-' . $year );
		return $date;
	}

	/**
	 * Método para regresar el total de donaciones por causa
	 * @param  integer $id_causa ID Causa
	 * @return integer Total de donaciones
	 */
	public static function totalDonaciones( $id_causa = null ){
		if ( is_null( $id_causa ) || empty( $id_causa ) )
			return 0;

		return $donaciones = Donaciones::where( 'id_causas', $id_causa )->where('status', 1 )->count();
	}
}