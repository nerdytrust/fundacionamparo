<?php

class NoticiasController extends BaseController {
	public function index(){
		return View::make( 'public.noticias.index' );
	}
}