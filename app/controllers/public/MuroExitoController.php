<?php

class MuroExitoController extends BaseController {
	
	public function index($idMomento = NULL){

		$momentoFB = NULL;

		if($idMomento){
			$momentoFB = Muros::where('id_muros',$idMomento)
			->first();
		}
		
		$padres = Muros::where('parent',0)
			->orderby('year')
			->orderby('orden')
			->get();

		foreach ($padres as $key => $padre) {
			$hijos = Muros::where('muros.parent',$padre->id_muros)
			->count();
			$padres[$key]['hijos'] = $hijos;
		}

		return View::make( 'public.muro_exito.index' )->with( [
			'momentos'	=> $padres, 
			'momentoFB' => $momentoFB
		] );
	}

	public function getMoment(){

		$idMomento = Input::get( 'moment' );
			
		return View::make( 'public.muro_exito.interior' )->with( [
			'momentos'	=> Muros::where('parent',$idMomento)->orderby('orden')
			->join( 'categorias', 'muros.id_categorias', '=', 'categorias.id_categorias' )
			->get()
		] );
			
	}
}

/* End of file MuroExitoController.php */
/* Location: ./app/controllers/public/MuroExitoController.php */