<?php

class AyudarController extends BaseController {
	public function index(){
		return View::make( 'public.como_ayudar.index' );
	}
}