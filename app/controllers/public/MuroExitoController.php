<?php

class MuroExitoController extends BaseController {
	public function index(){
		return View::make( 'public.muro_exito.index' );
	}
}