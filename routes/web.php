<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Person\PersonOrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ResetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::middleware(['auth', 'is_admin', 'set_locale'])->group(function () {
    Route::get('/orders/index', [OrderController::class, 'index'])->name('admin-login');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});
Route::middleware(['auth', 'set_locale'])->group(function () {
    Route::group(['prefix' => 'person', 'as' => 'person.'], function () {
        Route::get('/orders/index', [PersonOrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [PersonOrderController::class, 'show'])->name('orders.show');
    });

    Route::post('basket/add/{product}', [BasketController::class, 'basketAdd'])->name('basket-add');
    Route::post('basket/remove/{product}', [BasketController::class, 'basketRemove'])->name('basket-remove');
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
    });
});
Route::middleware(['auth', 'is_empty_basket', 'set_locale'])->group(function () {
    Route::get('/basket/place', [BasketController::class, 'basketPlace'])->name('basket-place');
    Route::get('/basket', [BasketController::class, 'basket'])->name('basket');
    Route::post('basket/order', [BasketController::class, 'confirmOrder'])->name('confirm-order');
});
Route::get('locale/{locale}', [MainController::class, 'changeLocale'])->name('locale');
Route::get('/welcome', [MainController::class, 'welcome']);
    Route::get('reset', [ResetController::class, 'reset'])->name('reset');

Route::middleware(['set_locale'])->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/categories', [MainController::class, 'categories'])->name('categories');
    Route::get('/{category?}', [MainController::class, 'category'])->name('category');
    Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');
    Route::post('subscription/{product}', [MainController::class, 'subscribe'])->name('subscription');
    Route::get('/logout', [LoginController::class, 'logout'])->name('shop-logout');
});
