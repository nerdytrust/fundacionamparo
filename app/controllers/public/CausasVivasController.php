<?php

class CausasVivasController extends BaseController {

	public function index(){
		$causas = Causas::orderBy( 'orden' )->take(3)->get();
		return View::make( 'public.causas.index' )->with( [
			'causas' => $causas
		] );
	}

}

/* End of file CausasVivasController.php */
/* Location: ./app/controllers/public/CausasVivasController.php */