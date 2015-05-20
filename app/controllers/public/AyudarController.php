<?php

class AyudarController extends BaseController {
	public function index(){
		return View::make( 'public.como_ayudar.index' )->with( [
			'helper' => new Helper
		] );
	}
}

/* End of file AyudarController.php */
/* Location: ./app/controllers/public/AyudarController.php */