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
	 * Método para agregar un botón share facebook
	 * @param  string $after  Etiqueta HTML de apertura
	 * @param  string $url    URL de la sección o contenido
	 * @param  string $before Etiqueta HTML de cierre
	 * @return Html del botón de share de facebook
	 */
	public static function facebookShare( $after = '', $url, $before = '' ){
		$fb_share = '<a href="https://www.facebook.com/dialog/share?app_id=776167932490026&href=' . Request::url() . '&display=popup&redirect_uri=' . URL::to( 'http://www.facebook.com' ) . '" onclick="return !window.open(this.href, \'Share on Facebook\', \'width=640, height=536\')">' .$after . '<li class="fa fa-facebook"></li>' . $before . '</a>';
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
		return $avatar->photoURL;
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

	public function getHybridAuth() {
		return $this->hybridauth;
	}

	public function setHybridAuth( $hybridauth ) {
		$this->hybridauth = $hybridauth;
	}
}