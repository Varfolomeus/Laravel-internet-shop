<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductsFilterRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    public function index(ProductsFilterRequest $request)
    {
        // dd($request->all());

        $productQuery = Product::with('category');

        if ($request->filled('price_from')) {
            $productQuery->where('price', '>=', $request->price_from);
        }
        if ($request->filled('price_to')) {
            $productQuery->where('price', '<=', $request->price_to);
        }
        foreach (['hit', 'new', 'recommend'] as $field) {
            if ($request->has($field)) {
                $productQuery->$field();
            }
        }

        $products = $productQuery->paginate(6)->withPath('?' . $request->getQueryString());
        return view('index', compact('products'));
    }

    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }
    public function category($code)
    {
        $category = Category::where('code', $code)->firstOrFail();
        return view('category', compact('category'));
    }
    public function product($category, $productCode)
    {
        $product = Product::withTrashed()
            ->byCode($productCode)
            ->firstOrFail();
        return view('product', compact('product'));
    }

    public function welcome()
    {
        return view('welcome');
    }
    public function changeLocale($locale)
    {
        session(['locale' => $locale]);
        App::setlocale($locale);
        return redirect()->back();
    }
    public function subscribe(SubscriptionRequest $request, Product $product)
    {
        Subscription::create(['email' => $request->email, 'product_id' => $product->id]);
        // dd($request, $product);
        return redirect()
            ->back()
            ->with('success', 'Дякуємо за ваш інтерес, ми зв\'яжемося з вами при надходженні товару.');
    }
}
