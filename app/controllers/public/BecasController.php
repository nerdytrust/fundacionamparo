<?php

class BecasController extends BaseController {

	public function index(){
		return View::make( 'public.becas.index' )->with( [
			'helper' => new Helper
		] );
	}
}

/* End of file BecasController.php */
/* Location: ./app/controllers/public/BecasController.php */