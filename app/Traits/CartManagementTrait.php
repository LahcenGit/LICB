<?php

namespace App\Traits;

use App\Models\Cart;
use App\Models\Cartitem;
use Illuminate\Support\Facades\Auth;

trait CartManagementTrait
{
    protected function fetchCartData()
    {
        if (Auth::user()) {
            $cart = Cart::where('user_id', Auth::user()->id)->first();
            $cart_session = session('cart_id');

            if ($cart_session) {
                $cartitems_session = Cartitem::where('cart_id', $cart_session)->get();

                foreach ($cartitems_session as $cartitem_session) {
                    $existingCartItem = $cart->cartitems()->where('productline_id', $cartitem_session->productline_id)->first();

                    if ($existingCartItem) {
                        $existingCartItem->qte += $cartitem_session->qte;
                        $existingCartItem->save();
                    } else {
                        $cartitem_session->cart_id = $cart->id;
                        $cartitem_session->save();
                    }
                }
            }

            session()->forget('cart');
            $cartitems = $cart->cartitems;
            $nbr_cartitem = $cart->cartitems->count();
            $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id', $cart->id)->first();
        } else {
            $cart = session('cart_id');
            $cartitems = Cartitem::where('cart_id', $cart)->get();
            $nbr_cartitem = Cartitem::where('cart_id', $cart)->count();
            $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id', $cart)->first();
        }

        return compact('cart', 'cartitems', 'nbr_cartitem', 'total');
    }
}
