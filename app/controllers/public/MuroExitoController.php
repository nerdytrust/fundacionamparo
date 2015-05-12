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
				return View::make( 'public.muro_exito.1982' )->with( 'anio', '1982' );
				break;
			case 'tl_1983':
				return false;
				break;
			case 'tl_1985':
				return View::make( 'public.muro_exito.1982' )->with( 'anio', '1985' );
				break;
			case 'tl_1986':
				return false;
				break;
			case 'tl_1987':
				return View::make( 'public.muro_exito.1987' );
				break;
			case 'tl_1988':
				return View::make( 'public.muro_exito.1988' );
				break;
			case 'tl_1993':
				return View::make( 'public.muro_exito.1993' );
				break;
		}
	}
}