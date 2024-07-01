<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributelineController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CouponAdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DeliverycostController;
use App\Http\Controllers\OrderCustomerController;
use App\Http\Controllers\PointAdminController;
use App\Http\Controllers\ProfilCustomerController;
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




/*Route::get('/', function () {

    if(Auth::guest()){
        return redirect('/login');
    }
    else{
        return redirect('/admin');
    }

});*/




//admin route

Route::resource('/admin/categories',CategoryController::class);
Route::resource('/admin/attributes',AttributeController::class);
Route::resource('/admin/attributelines',AttributelineController::class);
Route::resource('/admin/products',ProductController::class);
Route::resource('/admin/marks',MarkController::class);
Route::resource('/admin/orders',OrderController::class);
Route::resource('/admin/points-management',PointAdminController::class);
Route::get('/get-attribute/{id}', [App\Http\Controllers\ProductController::class, 'getAttribute']);
Route::get('/search/{value}', [App\Http\Controllers\ProductController::class, 'search']);
Route::get('/get-product/{id}', [App\Http\Controllers\ProductController::class, 'getProduct']);
Route::get('/get-price/{id}', [App\Http\Controllers\ProductController::class, 'getPrice']);
Route::get('/get-price-product-added/{id}/{product_id}', [App\Http\Controllers\ProductController::class, 'getPriceProductAdded']);
Route::get('/show-modal', [App\Http\Controllers\ProductController::class, 'showModal']);
Route::get('/show-modal-add-mark', [App\Http\Controllers\ProductController::class, 'showModalAddMark']);
Route::resource('/admin/delivery-costs',DeliverycostController::class);
Route::get('/update-delivery-cost/{id}/{domicile}/{stopdesk}', [App\Http\Controllers\DeliverycostController::class, 'updateDeliveryCost']);
Route::get('/admin/add-order-step-one', [App\Http\Controllers\OrderController::class, 'addOrderStepOne']);
Route::post('/admin/add-order-step-two', [App\Http\Controllers\OrderController::class, 'addOrderStepTwo']);
Route::post('/admin/store-order', [App\Http\Controllers\OrderController::class, 'storeOrder']);
Route::get('admin/order-detail/{id}', [OrderController::class, 'orderDetail']);
Route::get('/edit-status/{id}', [PointAdminController::class, 'showModal']);
Route::get('/update-status/{id}/{status}', [PointAdminController::class, 'updateModal']);
Route::get('/add-coupon/{id}', [CouponAdminController::class, 'showModal']);
Route::post('/store-coupon', [CouponAdminController::class, 'storeCoupon']);
Route::get('/edit-status-order/{id}', [App\Http\Controllers\OrderController::class, 'editStatus']);
Route::post('/update-status', [App\Http\Controllers\OrderController::class, 'updateStatus']);

// customer route
Route::resource('/customer/orders',OrderCustomerController::class);
Route::get('customer/order-detail/{id}', [OrderCustomerController::class, 'orderDetail']);
Route::get('customer/cancel-order/{id}', [OrderCustomerController::class, 'cancelOrder']);
Route::get('/modal-convert-points', [CustomerController::class, 'modalConvertPoint']);
Route::get('/convert-point/{point}', [CustomerController::class, 'convertPoint']);
Route::get('/customer', [CustomerController::class, 'dashboard']);
Route::resource('/customer/profil',ProfilCustomerController::class);
Route::get('/customer/coupons', function () {
    $points = Auth::user()->point;
   return view('customer.coupons',compact('points'));
});
//yalidine route
Route::get('add-order-to-yalidine/{id}', [OrderController::class, 'addOrderToYalidine']);
Route::get('/store-parcel/{id}',[App\Http\Controllers\OrderController::class, 'storeOrderToYalidine']);

Auth::routes();
Route::get('/product/{slug}', [App\Http\Controllers\ProductController::class, 'detailProduct']);
Route::resource('/admin',AdminController::class);
//Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


Route::get('/category/{slug}', [App\Http\Controllers\HomeController::class, 'categoryProducts']);
Route::get('/category/{slug}/{categoryId}/{brands}', [HomeController::class, 'filterProducts'])->name('products.filter');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/global-category/{slug}', [App\Http\Controllers\HomeController::class, 'categoryParentProducts']);
//Route::get('/filter-products', [HomeController::class, 'filterProductsWithPrice'])->name('filter.products.with.price');
Route::get('/global-category/{slug}/{categoryId}/{subCategories}', [HomeController::class, 'filterProductsBySubcategories']);
Route::resource('/',HomeController::class);
Route::resource('/comment',CommentController::class);

//cart
Route::post('/add-to-cart', [App\Http\Controllers\CartController::class, 'addToCart']);
Route::get('/delete-cartitems', [App\Http\Controllers\CartController::class, 'deleteCartItems']);
Route::post('/update-cart/{id}', [CartController::class, 'update']);
Route::resource('/carts',CartController::class);
//chekout
Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'index']);
Route::get('/get-communes/{name}', [App\Http\Controllers\CheckoutController::class, 'getCommunes']);
Route::get('/get-centers/{name}', [App\Http\Controllers\CheckoutController::class, 'getCenters']);
Route::get('/get-cost/{wilaya}', [App\Http\Controllers\CheckoutController::class, 'getCost']);
Route::post('/redirection', [App\Http\Controllers\CheckoutController::class, 'storeOrder']);


//tracking
Route::get('/tracking', [App\Http\Controllers\TrackingController::class, 'tracking']);
Route::post('/tracking', [App\Http\Controllers\TrackingController::class, 'trackingResult']);


//authcheck
Route::get('/check-auth', [App\Http\Controllers\HomeController::class, 'checkAuth']);


//pc builder

Route::get('/pc-builder', [App\Http\Controllers\PcBuilderController::class, 'index']);
Route::get('/show-component', [App\Http\Controllers\PcBuilderController::class, 'showComponent']);


