<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonOrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()
            ->orders()
            ->active()
            ->paginate(10);
        // dd($orders);
        return view('auth.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if (Auth::user()->orders->contains($order)) {
            return view('auth.orders.show', compact('order'));
        } else {
            return back();
        }
    }
}