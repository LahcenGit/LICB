<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard-admin', function () {
    return view('admin.dashboard-admin');
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
Route::resource('/dashboard-admin/categories',CategoryController::class);
