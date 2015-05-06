<?php

class FundacionController extends BaseController {

	public function index(){
		return View::make( 'public.fundacion.index' );
	}

	public function historia(){
		return View::make( 'public.fundacion.historia' );
	}
}