<?php namespace Modules\Front\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class FrontController extends Controller {
	
	public function index()
	{
		return view('front::index');
	}
	
}