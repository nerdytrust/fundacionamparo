<?php

class MuroExitoController extends BaseController {
	
	public function index(){
		
		return View::make( 'public.muro_exito.index' )->with( [
			'momentos'	=> Muros::where('parent',0)->orderby('orden')->get()
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