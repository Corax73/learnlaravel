<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
		return view(view: 'home.index');
	}
	public function index1(Request $request): View
	{
		$products = Product::all();
		/*foreach ($products as $product){
			print 'Id:'.$product->id;
			print "<br>";
			print 'Descr'.$product->descr;
			print "<br>";
		}*/
		dd($products);
		return view(view:'home.index');
	}
}
