<?php

class AyudarController extends BaseController {
	
	public function index(){
		$video = Videos::where( 'activo', 'Active' )->where('id_secciones', 2 )->find(1);
		return View::make( 'public.como_ayudar.index' )->with([
			'video' => $video
		]);
	}
}

/* End of file AyudarController.php */
/* Location: ./app/controllers/public/AyudarController.php */