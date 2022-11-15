<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Productline;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function addToCart(Request $request) {

        if(Auth::user()){
            $cart = Cart::where('user_id',Auth::user()->id)->first();
            
            $product_exist = Cartitem::where('productline_id',$request->input('id'))->where('cart_id',$cart->id)->first();
            if($product_exist){
                $product_exist->qte = $product_exist->qte + $request->input('qte');
                if($product_exist->promo_price){
                $product_exist->total = $product_exist->total +($request->input('qte')*$product_exist->promo_price);
                }
                else{
                $product_exist->total = $product_exist->total +($request->input('qte')*$product_exist->price);
                }
                
                $product_exist->save();
                $nbr_cart = Cartitem::where('cart_id',$cart->id)->count();
                $total = Cartitem::selectRaw('sum(total) as sum')->first();
                $data = array(
                    'nbr_cart' => $nbr_cart,
                    'total' => number_format($total->sum),
                    'qtes' => $product_exist->qte,
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
                
                return $data;
            }
        }

        else{

            $cart = session()->get('cart_id');
            if($cart){
                 
                    $productline = Productline::where('id',$request->input('id'))->first(); 
                    $product_exist = Cartitem::where('productline_id',$request->input('id'))->where('cart_id',$cart)->first();
                    if($product_exist){
                        $product_exist->qte = $product_exist->qte + $request->input('qte');
                        if($product_exist->promo_price){
                        $product_exist->total = $product_exist->total +($request->input('qte')*$product_exist->promo_price);
                        }
                        else{
                        $product_exist->total = $product_exist->total +($request->input('qte')*$product_exist->price);
                        }
                        
                        $product_exist->save();
                        $nbr_cart = Cartitem::where('cart_id',$cart)->count();
                        $total = Cartitem::selectRaw('sum(total) as sum')->first();
                        $data = array(
                            'nbr_cart' => $nbr_cart,
                            'total' => number_format($total->sum),
                            'qtes' => $product_exist->qte,
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
}
