<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Darryldecode\Cart\Cart;

class CartController extends Controller
{
    public function index() {
        return view('cart.index');
    }
    public function addToCart(Request $request) {
        $product = Product::where('id', $request->id)->first();

        //if(!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);

        \Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->new_price ? $product->new_price : $product->price,
            'quantity' => (int) $request->qty,
            'attributes' => [
            'img' => isset($product->images[0]->img) ? $product->images[0]->img : 'no_image.png'
            ]
        ]);

        return response()->json(\Cart::getContent());
    }
}
