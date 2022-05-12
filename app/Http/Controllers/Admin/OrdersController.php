<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(15);
        
        return view('admin.orders.index', compact('orders'));
    }
	
	public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }
}
