<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderSent;
use App\Models\Order;
use App\Models\Good;
use App\Models\Setting;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }
	
	public function order()
    {
        if (is_null(session('cart'))) {
            return redirect()->route('home');
        }
		
		$order = new Order;
		$order->user_id = Auth::id();
		$order->save();
		
		foreach(session('cart') as $product){
			$good = new Good;
			$good->title = $product['title'];
			$good->price = $product['price'];
			$good->order_id = $order->id;
			$good->save();
		}
		
		$setting = Setting::find(1);
		
		Mail::to($setting->email)->send(new OrderSent($order));
		session()->put('cart', null);

        return view('complete');

    }
}
