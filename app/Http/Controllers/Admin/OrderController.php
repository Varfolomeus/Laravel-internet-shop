<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::active()->paginate(10);
        // dd($orders);
        return view('auth.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $products = $order
            ->products()
            ->withTrashed()
            ->get();
        return view('auth.orders.show', compact('order', 'products'));
    }
}
