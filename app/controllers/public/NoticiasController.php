<?php

class NoticiasController extends BaseController {
	public function index(){
		return View::make( 'public.noticias.index' )->with( [
			'helper' => new Helper
		] );
	}
}

/* End of file NoticiasController.php */
/* Location: ./app/controllers/public/NoticiasController.php */