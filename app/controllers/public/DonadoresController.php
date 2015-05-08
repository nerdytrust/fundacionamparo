<?php

class DonadoresController extends BaseController {
	public function index(){
		return View::make( 'public.donadores.index' );
	}
}