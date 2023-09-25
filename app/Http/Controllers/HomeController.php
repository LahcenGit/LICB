<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

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

        $categories = Category::where('parent_id',NULL)->get();
        $last_products = Product::latest()->take(10)->get();
        $products = Product::orderBy('created_at','desc')->get();

        $total_category = Category::where('parent_id', NULL)->count();
        $moitie = ceil($total_category / 2);
        $first_part_categories = Category::take($moitie)->where('parent_id',NULL)->get();

        $last_part_categories = Category::skip($moitie)->take($total_category - $moitie)->where('parent_id',NULL)->get();

        $new_products = Product::orderBy('created_at','desc')->limit(3)->get();
        return view('welcome',compact('nbr_cartitem','cartitems','total','categories','last_products','products','first_part_categories','last_part_categories','new_products'));
    }

    public function checkAuth() {
        $isLoggedIn = Auth::check();
        return response()->json(['isLoggedIn' => $isLoggedIn]);
    }
}
