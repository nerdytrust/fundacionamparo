<?php

class FaqsController extends BaseController {
	
	public function index(){
		$faqs = Faq::get();
		return View::make( 'public.faqs.index' )->with( [
			'helper' 	=> new Helper,
			'faqs'		=> $faqs
		] );
	}
}

/* End of file FaqsController.php */
/* Location: ./app/controllers/public/FaqsController.php */