<?php

class FaqsController extends BaseController {
	public function index(){
		return View::make( 'public.faqs.index' );
	}
}