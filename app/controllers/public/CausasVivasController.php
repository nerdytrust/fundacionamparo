<?php

class CausasVivasController extends BaseController {

	public function index(){
		$causas = Causas::orderBy( 'orden' )->take(3)->where( 'id_tipo_causas', 1)->get();
		$externas = Causas::take(4)->where( 'id_tipo_causas', 2 )->get();
		return View::make( 'public.causas.index' )->with( [
			'causas' => $causas,
			'externas' => $externas
		] );
	}

}

/* End of file CausasVivasController.php */
/* Location: ./app/controllers/public/CausasVivasController.php */