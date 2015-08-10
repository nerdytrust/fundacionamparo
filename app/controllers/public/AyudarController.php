<?php

class AyudarController extends BaseController {
	
	public function index(){
		$videos = Videos::where('id_secciones', 2 )->get();
		return View::make( 'public.como_ayudar.index' )->with([
			'videos' => $videos
		]);
	}
}

/* End of file AyudarController.php */
/* Location: ./app/controllers/public/AyudarController.php */