<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use App\Models\ProductImage;

class ProductController extends Controller
{
    public function show($cat, $product_id){
        $item = Product::where('id', $product_id)->first();

        if(!isset($_COOKIE['cart_id'])) {
			
			setcookie('cart_id', uniqid()); 
			$quantityProdacts = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
		} elseif(isset($_COOKIE['cart_id'])) {
			
			$quantityProdacts = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
		}

        return view('product.show', [
            'item' => $item,
            'quantityProdacts' => $quantityProdacts
    ]);
    }

    public function showCategory(Request $request, $cat_alias){

        if(!isset($_COOKIE['cart_id'])) {
			
			setcookie('cart_id', uniqid()); 
			$quantityProdacts = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
		} elseif(isset($_COOKIE['cart_id'])) {
			
			$quantityProdacts = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
		}
        
        $cat = Category::where('alias',$cat_alias)->first();

        $paginate = 2;

        $products = Product::where('category_id',$cat->id)->paginate($paginate);

        if(isset($request->orderBy)){
            if($request->orderBy == 'price-low-high'){
                $products = Product::where('category_id',$cat->id)->orderBy('price')->paginate($paginate);
            }
            if($request->orderBy == 'price-high-low'){
                $products = Product::where('category_id',$cat->id)->orderBy('price','desc')->paginate($paginate);
            }
            if($request->orderBy == 'name-a-z'){
                $products = Product::where('category_id',$cat->id)->orderBy('title')->paginate($paginate);
            }
            if($request->orderBy == 'name-z-a'){
                $products = Product::where('category_id',$cat->id)->orderBy('title','desc')->paginate($paginate);
            }
        }

        if($request->ajax()){
            return view('ajax.order-by',[
                'products' => $products,
                'quantityProdacts' => $quantityProdacts
            ])->render();
        }

        return view('categories.index',[
            'cat' => $cat,
            'products' => $products,
            'quantityProdacts' => $quantityProdacts
        ]);
    }
}
