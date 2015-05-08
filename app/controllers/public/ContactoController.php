<?php

class ContactoController extends BaseController {
	public function index(){
		return View::make( 'public.contacto.index' );
	}
}