<?php

class VoluntariosController extends BaseController {
	
	public function index(){
		return View::make( 'public.voluntarios.index' )->with( [
			'helper' => new Helper
		] );
	}
}

/* End of file VoluntariosController.php */
/* Location: ./app/controllers/public/VoluntariosController.php */