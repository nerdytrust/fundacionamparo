<?php

class BecasController extends BaseController {

	public function index(){
		$promedios = Promedios::get();
		return View::make( 'public.becas.index' )->with( [
			'promedios'	=> $promedios
		] );
	}
}

/* End of file BecasController.php */
/* Location: ./app/controllers/public/BecasController.php */