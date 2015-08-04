<?php

class CausasVivasController extends BaseController {

	public function index(){
		$causas = Causas::orderBy( 'created_at','desc' )->where( 'id_tipo_causas', 1)->get();
		$causas = $this->getClass($causas);
	
		$externas = Causas::orderBy( 'created_at','desc' )->take(0)->where( 'id_tipo_causas', 2 )->get();
		$externas = $this->getClass($externas);

		return View::make( 'public.causas.index' )->with( [
			'causas' => $causas,
			'externas' => $externas
		] );
	}

	private function getClass($causas){
		$coutnCausas = count($causas);
		$fmod        = fmod(count($causas),3);

		if($fmod == 1) 
			 $causas[$coutnCausas -1]['class'] = 100;
		else if($fmod == 2){
			 $causas[$coutnCausas -2]['class'] = 50; 
			 $causas[$coutnCausas -1]['class'] = 50;
		}
		
		return  $causas;
	}

}


/* End of file CausasVivasController.php */
/* Location: ./app/controllers/public/CausasVivasController.php */