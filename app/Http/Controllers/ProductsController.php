<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function index($id)
    {
        $products = Product::query()->where('category_id', '=', $id)->paginate(6);
        return view('home', [
            'products' => $products,
            'category' => Category::find($id)
        ]);
    }
	
	public function view(int $id)
    {
        $product = Product::query()->with('category')->find($id);
		
        return view('product', compact('product'));
    } 
	//
	public function add(Request $request)
    {
        $product = new Product();


        $product->id = $request->id;
        if(!$product) {
            abort(404);
        }
//
        $cart = session()->get('cart');
		
        if(!$cart) {

            $cart = [
				$id => [
					"id" => $product->id,
					"title" => $product->title,
					"price" => $product->price,
					"image" => $product->image,
					"date" => date("d.m.Y")
				]
            ];

            session()->put('cart', $cart);

            return redirect()->back();
        }

        if(isset($cart[$id])) {

            session()->put('cart', $cart);

            return redirect()->back();

        }

        $cart[$id] = [
			"id" => $product->id,
            "title" => $product->title,
            "price" => $product->price,
            "image" => $product->image,
			"date" => date("d.m.Y")
        ];

        session()->put('cart', $cart);

        return redirect()->back();
    }
}
