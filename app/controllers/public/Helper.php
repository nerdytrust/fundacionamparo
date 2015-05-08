<?php

/**
 * Librería que sirve para hacer procesos de ayuda para darle formato a la información de las vistas
 * @author Eric Bravo <ebravo@itcitrus.mx>
 * @package Helper
 * @version 1.0 Primera versión de la librería de ayuda
 */

class Helper {

	private $fullname = null;

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
}