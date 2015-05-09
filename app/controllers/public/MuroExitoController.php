<?php

class MuroExitoController extends BaseController {

	public function index(){
		return View::make( 'public.muro_exito.index' );
	}

	public function getMoment(){
		switch ( Input::get( 'moment' ) ) {
			case 'tl_1979':
				return false;
				break;
			case 'tl_1980':
				return View::make( 'public.muro_exito.1980' );
				break;
			case 'tl_1981':
				return View::make( 'public.muro_exito.1981' );
				break;
			case 'tl_1982':
				return View::make( 'public.muro_exito.1982' );
				break;
			case 'tl_1983':
				return false;
				break;
			case 'tl_1985':
				return View::make( 'public.muro_exito.1985' );
				break;
		}
	}
}