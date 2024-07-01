<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Category;
use App\Models\Productline;
use App\Traits\CartManagementTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    use CartManagementTrait;
    public function store(Request $request) {


        if(Auth::user()){
            $cart = Cart::where('user_id',Auth::user()->id)->first();
            if($cart){
             $product_exist = Cartitem::where('productline_id',$request->input('id'))->where('cart_id',$cart->id)->first();
                if($product_exist){
                    $data = array(
                    'qtes' => 1,
                    );
                    return $data;
                }
                else{
                    $productline = Productline::where('id',$request->input('id'))->first();

                    $cart_item = new Cartitem();
                    $cart_item->cart_id = $cart->id;
                    $cart_item->productline_id = $request->input('id');
                    $cart_item->qte = $request->input('qte');

                    if($productline->promo_price){
                    $cart_item->price = $productline->promo_price;
                    $cart_item->total = $productline->promo_price * $request->input('qte');
                    }
                    else{
                    $cart_item->price = $productline->price;
                    $cart_item->total = $productline->price * $request->input('qte');
                    }

                    $cart_item->save();

                    $nbr_cart = Cartitem::where('cart_id',$cart->id)->count();
                    $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id',$cart->id)->first();
                    $data = array(
                        'nbr_cart' => $nbr_cart,
                        'name' => $cart_item->getName()->designation,
                        'image' => $cart_item->getImage()->lien,
                        'qte' => $cart_item->qte,
                        'price' => number_format($cart_item->price),
                        'total' => number_format($total->sum),
                        'qtes' => 0,
                    );

                    return $data;
                }
            }
        }

        else{

            $cart = session()->get('cart_id');
            if($cart){

                    $productline = Productline::where('id',$request->input('id'))->first();
                    $product_exist = Cartitem::where('productline_id',$request->input('id'))->where('cart_id',$cart)->first();
                    if($product_exist){
                        $data = array(
                        'qtes' => 1,
                        );
                        return $data;
                    }
                    $cart_item = new Cartitem();
                    $cart_item->cart_id = $cart;
                    $cart_item->productline_id = $request->input('id');
                    $cart_item->qte = $request->input('qte');

                    if($productline->promo_price){
                    $cart_item->price = $productline->promo_price;
                    $cart_item->total = $productline->promo_price * $request->input('qte');
                    }
                    else{
                    $cart_item->price = $productline->price;
                    $cart_item->total = $productline->price * $request->input('qte');
                    }

                    $cart_item->save();

                    $nbr_cart = Cartitem::where('cart_id',$cart)->count();
                    $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id',$cart)->first();
                    $data = array(
                        'nbr_cart' => $nbr_cart,
                        'name' => $cart_item->getName()->designation,
                        'image' => $cart_item->getImage()->lien,
                        'qte' => $cart_item->qte,
                        'price' => number_format($cart_item->price),
                        'total' => number_format($total->sum),
                        'qtes' => 0,
                    );

                    session()->put('cart_id', $cart);

                    return $data;
                }

            else{
                $cart = new Cart();
                $cart->save();
                $productline = Productline::where('id',$request->input('id'))->first();
                $cart_item = new Cartitem();
                $cart_item->cart_id = $cart->id;
                $cart_item->productline_id = $request->input('id');
                $cart_item->qte = $request->input('qte');

                if($productline->promo_price){
                $cart_item->price = $productline->promo_price;
                $cart_item->total = $productline->promo_price * $request->input('qte');
                }
                else{
                $cart_item->price = $productline->price;
                $cart_item->total = $productline->price * $request->input('qte');
                }

                $cart_item->save();
                $nbr_cart = Cartitem::where('cart_id',$cart->id)->count();
                $total = Cartitem::selectRaw('sum(total) as sum')->first();
                $data = array(
                    'nbr_cart' => $nbr_cart,
                    'name' => $cart_item->getName()->designation,
                    'image' => $cart_item->getImage()->lien,
                    'qte' => $cart_item->qte,
                    'price' => number_format($cart_item->price),
                    'total' => number_format($total->sum),
                    'qtes' => 0,
                );

                session()->put('cart_id', $cart->id);

                return $data;

        }
        }
  }

  public function index(){

    $cartData = $this->fetchCartData();
    $categories = Category::where('parent_id',null)->get();
    $search_term = NULL;
    return view('carts',compact('cartData','categories','search_term'));
  }

  public function update(Request $request, $id) {
    $cartitem = Cartitem::find($id);

    if (Auth::user()) {
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        if ($cartitem->cart_id == $cart->id) {
            $cartitem->qte = $request->qtes[0];
            $cartitem->total = $cartitem->price * $request->qtes[0];
            $cartitem->save();
            $cart_total = $cart->cartitems()->sum('total');
        } else {
            abort(404, 'Page not found');
        }
    } else {
        $cart_id = session('cart_id');
        $cart = Cart::find($cart_id);
        if ($cartitem->cart_id == $cart_id) {
            $cartitem->qte = $request->qtes[0];
            $cartitem->total = $cartitem->price * $request->qtes[0];
            $cartitem->save();
            $cart_total = $cart->cartitems()->sum('total');
        } else {
            abort(404, 'Page not found');
        }
    }

    return response()->json([
        'newTotal' => number_format($cartitem->total, 2),
        'cartTotal' => number_format($cart_total, 2),
    ]);
}

  public function destroy($id){
    $cartitem = Cartitem::find($id);
    if(Auth::user()){
        $cart = Cart::where('user_id',Auth::user()->id)->first();
        if($cartitem->cart_id == $cart->id){
            $cartitem->delete();
            $nbr_cartitem = $cart->cartitems->count();
            $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id',$cart->id)->first();
            $data = array(
                'nbr_cartitem' => $nbr_cartitem,
                'total' => number_format($total->sum),
            );
            return $data;
        }
        else{
            abort(404, 'Page not found');
        }
    }
    else{
        $cart= session('cart_id');
        if($cartitem->cart_id == $cart){
            $cartitem->delete();
            $nbr_cartitem = Cartitem::where('cart_id',$cart)->count();
            $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id',$cart)->first();
            $data = array(
                'nbr_cartitem' => $nbr_cartitem,
                'total' => number_format($total->sum),
            );
            return $data;
        }
        else{
            abort(404, 'Page not found');
        }

    }
  }

  public function deleteCartItems(){
    if(Auth::user()){
        $cart = Cart::where('user_id',Auth::user()->id)->first();
        $cartitems = $cart->cartitems;
        foreach($cartitems as $cartitem){
            $cartitem->delete();
        }

        return redirect('/carts');
    }
    else{
        $cart = session('cart_id');
        $cartitems = Cartitem::where('cart_id',$cart)->get();
        foreach($cartitems as $cartitem){
            $cartitem->delete();
        }

        return redirect('/carts');
    }
  }
}
