<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Darryldecode\Cart\Cart;

class HomeController extends Controller
{
    public function index(){
		$products = Product::orderBy('created_at')->take(8)->get();
		
		if(!isset($_COOKIE['cart_id'])) {
			
			setcookie('cart_id', uniqid()); 
			$quantityProducts = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
			
		} elseif(isset($_COOKIE['cart_id'])) {
			
			$quantityProducts = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
		}
		
		return view('home.index', [
		'products' => $products,
		'quantityProducts' => $quantityProducts
		]);
	}
	/* public function category(){
		return view(view: 'home.index');
	}*/
	public function index1(Request $request): View
	{
		$products = Product::all();
		foreach ($products as $product){
			print 'name:' . $product->title;
			print "<br>";
			print 'Descrition' . $product->description;
			print "<br>";
		}
		//dd($products);
		return view(view:'home.index');
	}
}
