<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Category;
use App\Models\Center;
use App\Models\Deliverycost;
use App\Models\Order;
use App\Models\Orderline;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        $cart = Cart::find($request->cart_id);
        $cartitems = Cartitem::where('cart_id',$request->cart_id)->get();
        $nbr_cartitem = $cartitems->count();
        if($nbr_cartitem == 0){
            return redirect('/');
        }
        $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id',$request->cart_id)->first();
        $total_category = Category::where('parent_id', NULL)->count();
        $moitie = ceil($total_category / 2);
        $first_part_categories = Category::take($moitie)->where('parent_id',NULL)->get();
        $last_part_categories = Category::skip($moitie)->take($total_category - $moitie)->where('parent_id',NULL)->get();
        $categories = Category::where('parent_id',null)->limit('5')->get();
        $wilayas = Deliverycost::select('*')->groupBy('wilaya')->get();
        return view('checkout',compact('cart','cartitems','nbr_cartitem','total','categories','wilayas','first_part_categories','last_part_categories'));

    }

    public function getCommunes($name){
        return $communes = Deliverycost::where('wilaya',$name)->get('commune');
     }

     public function getCenters($name){
        return $centers = Center::where('wilaya_name',$name)->get();
     }

     public function getCost($wilaya,$commune){
         return  $cost = Deliverycost::where('wilaya',$wilaya)->where('commune',$commune)->first();
     }


     public function storeOrder(Request $request){
        $cart = Cart::where('user_id',Auth::user()->id)->first();
        $total = Cartitem::where('cart_id',$cart->id)->sum('total');
        $date = Carbon::now()->format('y');
        $delivery_cost = Deliverycost::where('wilaya',$request->wilayas)->where('commune',$request->communes)->first();
        $name = $request->first_name.' '.$request->last_name;
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->status = 0 ;
        $order->wilaya = $request->wilayas;
        $order->commune = $request->communes;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->note = $request->ordernote;
        $order->payment_method = 'cash';
        $order->total = $total;

        if($request->shipping == "bureau"){
            $total_f = $total + $delivery_cost->price_b;
            $order->delivery_cost =  $delivery_cost->price_b;
            $order->is_stopdesk = true;
            $order->stopdesk_id= $request->centers;
         }
         if($request->shipping == "domicile"){
             $total_f = $total + $delivery_cost->price_a + $delivery_cost->supp;
             $order->delivery_cost =  $delivery_cost->price_a + $delivery_cost->supp;
             $order->is_stopdesk = false;
         }
        $order->total_f = $total_f;
        $order->save();
        $order->code = 'ck'.'-'.$date.'-'.$order->id;
        $order->save();
     foreach($cart->cartitems as $item){
        $orderline = new Orderline();
        $orderline->order_id = $order->id;
        $orderline->productline_id = $item->productline_id;
        $orderline->qte = $item->qte;
        $orderline->price = $item->price;
        $orderline->total = $item->total;
        $orderline->save();
        $item->delete();
     }
        $total_category = Category::where('parent_id', NULL)->count();
        $moitie = ceil($total_category / 2);
        $first_part_categories = Category::take($moitie)->where('parent_id',NULL)->get();
        $last_part_categories = Category::skip($moitie)->take($total_category - $moitie)->where('parent_id',NULL)->get();
        $categories = Category::where('parent_id',null)->limit('5')->get();
        if(Auth::user()){
            $cart = Cart::where('user_id',Auth::user()->id)->first();
            $cartitems = $cart->cartitems;

            if($cartitems ){
                $nbr_cartitem = $cart->cartitems->count();
                $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id',$cart->id)->first();
            }
            else{
                $cartitems = null;
                $nbr_cartitem = 0;
                $total = 0;
            }

        }
        else{
            $cart= session('cart_id');
            $cartitems = Cartitem::where('cart_id',$cart)->get();
            $nbr_cartitem = Cartitem::where('cart_id',$cart)->count();
            $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id',$cart)->first();
        }
        return view('success-order',compact('cartitems','nbr_cartitem','total','categories','last_part_categories','first_part_categories'));
    }

}
