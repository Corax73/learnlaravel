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
			print 'name:'.$product->title;
			print "<br>";
			print 'Descrition'.$product->description;
			print "<br>";
		}*/
		dd($products);
		return view(view:'home.index');
	}
}
