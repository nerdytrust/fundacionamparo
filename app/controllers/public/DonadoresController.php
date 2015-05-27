<?php

class DonadoresController extends BaseController {

	public function index(){
		return View::make( 'public.donadores.index' )->with( [
			'helper' => new Helper
		] );
	}
}

/* End of file DonadoresController.php */
/* Location: ./app/controllers/public/DonadoresController.php */