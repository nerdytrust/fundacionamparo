<?php

class VoluntariosController extends BaseController {
	public function index(){
		return View::make( 'public.voluntarios.index' );
	}
}