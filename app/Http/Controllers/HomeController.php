<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartitem;
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


        return view('welcome',compact('nbr_cartitem','cartitems','total'));
    }
}
