<?php

class FaqsController extends BaseController {
	public function index(){
		return View::make( 'public.faqs.index' )->with( [
			'helper' => new Helper
		] );
	}
}

/* End of file FaqsController.php */
/* Location: ./app/controllers/public/FaqsController.php */