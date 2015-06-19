<?php

class NoticiasController extends BaseController {

	/**
	 * Método para mostrar la vista de la sección Noticias
	 * @return
	 */
	public function index(){
		return View::make( 'public.noticias.index' )->with( [
			'noticias'	=> Noticias::orderBy( 'fecha_publicacion' )->get()
		] );
	}
}

/* End of file NoticiasController.php */
/* Location: ./app/controllers/public/NoticiasController.php */