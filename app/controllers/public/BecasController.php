<?php

class BecasController extends BaseController {

	public function index(){
		return View::make( 'public.becas.index' );
	}
}