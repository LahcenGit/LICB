<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributelineController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\AdminController;
use App\Models\Cart;
use App\Models\Cartitem;
use Illuminate\Support\Facades\Auth;

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

Route::get('/welcome', function () {
    if(Auth::user()){
        $cart = Cart::where('user_id',Auth::user()->id)->first();
        $cartitems = $cart->cartitems;
        $nbr_cartitem = $cart->cartitems->count();
        $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id',$cart->id)->first();
    }
    else{
        $cart= session('cart_id');
        $cartitems = Cartitem::where('cart_id',$cart)->get();
        $nbr_cartitem = Cartitem::where('cart_id',$cart)->count();
        $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id',$cart)->first();
    }
    return view('welcome',compact('nbr_cartitem','cartitems','total'));
});


Route::get('/', function () {

    if(Auth::guest()){
        return redirect('/login');
    }
    else{
        return redirect('/admin');
    }

});


Route::get('/dashboard-customer', function () {
    return view('customer.dashboard-customer');
});
Route::get('/dashboard-admin/orders', function () {
    return view('admin.orders');
});
Route::get('/dashboard-customer/orders', function () {
    return view('customer.orders');
});
//admin route

Route::resource('/admin/categories',CategoryController::class);
Route::resource('/admin/attributes',AttributeController::class);
Route::resource('/admin/attributelines',AttributelineController::class);
Route::resource('/admin/products',ProductController::class);
Route::resource('/admin/marks',MarkController::class);
Route::get('/get-attribute/{id}', [App\Http\Controllers\ProductController::class, 'getAttribute']);
Route::get('/search/{value}', [App\Http\Controllers\ProductController::class, 'search']);
Route::post('/add-to-cart', [App\Http\Controllers\CartController::class, 'addToCart']);
Route::get('/delete-cartitems', [App\Http\Controllers\CartController::class, 'deleteCartItems']);
Route::resource('/carts',CartController::class);
Route::get('/get-product/{id}', [App\Http\Controllers\ProductController::class, 'getProduct']);
Route::get('/get-price/{id}', [App\Http\Controllers\ProductController::class, 'getPrice']);
Route::get('/get-price-product-added/{id}/{product_id}', [App\Http\Controllers\ProductController::class, 'getPriceProductAdded']);
Route::get('/show-modal', [App\Http\Controllers\ProductController::class, 'showModal']);
Route::get('/show-modal-add-mark', [App\Http\Controllers\ProductController::class, 'showModalAddMark']);
Auth::routes();
Route::get('/product/{slug}', [App\Http\Controllers\ProductController::class, 'detailProduct']);
Route::resource('/admin',AdminController::class);
//Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

