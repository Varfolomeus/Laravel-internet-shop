<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $order = (new Basket())->getOrder();
        return view('basket', compact('order'));
    }
    public function basketPlace()
    {
        $basket = new Basket();

        // dd($basket);
        $order = $basket->getOrder();
        if (!$basket->countAvailable()) {
            return redirect()->route('basket');
        }
        return view('order', compact('order'));
    }
    public function basketAdd(Product $product)
    {
        $result = (new Basket(true))->addProduct($product);
        // dd($result);
        if ($result) {
            return redirect()->route('basket');
        } else {
            return redirect()->route('basket');
        }
    }
    public function basketRemove(Product $product)
    {
        (new Basket())->removeProduct($product);
        return redirect()->route('basket');
    }
    public function confirmOrder(Request $request)
    {
        $email = Auth::check() ? Auth::user()->email : $request->email;
        $name = Auth::check() ? Auth::user()->name : $request->name;
        $basket = new Basket();
        if (!$basket->countAvailable(true)) {
            return redirect()->route('basket');
        }
        if ($basket->saveOrder($name, $request->phone, $email)) {
            session()->flash('success', $name . ', ваше замовлення прийнято. Дякуємо за покупку!');
            return redirect()->route('person.orders.index');
        }
    }
}
