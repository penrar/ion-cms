<?php

namespace App\Http\Controllers;

use App\Article;
use App\Order;
use App\PhotoAlbum;
use DB;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $orderCount = Order::all()->count();
		return view('pages.home', compact('orderCount'));
	}

}