<?php

class ContactoController extends BaseController {
	public function index(){
		return View::make( 'public.contacto.index' )->with( [
			'helper' => new Helper
		] );
	}
}

/* End of file ContactoController.php */
/* Location: ./app/controllers/public/ContactoController.php */