<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function addToCart(Request $request) {
        $product_exit = Cart::where('product_id',$request->input('product_id'))->first();
        if($product_exit){
            $product_exit->qte = $product_exit->qte + $request->input('qte');
            $product_exit->save();
            $nbr_cart = Cart::count();
            $total = Cart::selectRaw('sum(qte * price) as sum')->first();
            $data = array(
                'nbr_cart' => $nbr_cart,
                'total' => number_format($total->sum),
                'qtes' => $product_exit->qte,
            );
            return $data;
        }
        else{
        $cart = new Cart();
        $cart->product_id = $request->input('product_id');
        $cart->qte = $request->input('qte');
        $cart->price = $request->input('price');
        $cart->save();
        $nbr_cart = Cart::count();
        $total = Cart::selectRaw('sum(qte * price) as sum')->first();
        $data = array(
            'nbr_cart' => $nbr_cart,
            'name' => $cart->getName()->designation,
            'image' => $cart->getImage()->lien,
            'qte' => $cart->qte,
            'price' => number_format($cart->price),
            'total' => number_format($total->sum),
            'qtes' => 0,
        );
        
        return $data;
        }
    }
}
