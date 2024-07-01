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
use App\Traits\CartManagementTrait;
class CheckoutController extends Controller
{
    //
    use CartManagementTrait;
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
        $cartData = [
            'cart' => $cart,
            'cartitems' => $cartitems,
            'nbr_cartitem' => $nbr_cartitem,
            'total' => $total
        ];
        $categories = Category::where('parent_id',null)->get();
        $wilayas = Deliverycost::select('*')->groupBy('wilaya')->get();
        $search_term = NULL;
        return view('checkout',compact('cartData','cartitems','categories','wilayas','nbr_cartitem','search_term'));

    }
     public function getCost($wilaya){
         return  $cost = Deliverycost::where('wilaya',$wilaya)->first();
     }
    public function storeOrder(Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'wilayas' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
        $cart = Cart::where('user_id',Auth::user()->id)->first();
        $total = Cartitem::where('cart_id',$cart->id)->sum('total');
        $date = Carbon::now()->format('y');
        $delivery_cost = Deliverycost::where('wilaya',$request->wilayas)->first();
        $name = $request->first_name.' '.$request->last_name;
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->status = 0 ;
        $order->wilaya = $request->wilayas;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->note = $request->ordernote;
        $order->payment_method = 'cash';
        $order->total = $total;

        if($request->shipping == "bureau"){
            $total_f = $total + $delivery_cost->stopdesk;
            $order->delivery_cost =  $delivery_cost->stopdesk;
            $order->is_stopdesk = true;
        }
        if($request->shipping == "domicile"){
             $total_f = $total + $delivery_cost->domicile;
             $order->delivery_cost =  $delivery_cost->domicile;
             $order->is_stopdesk = false;
         }
        $order->total_f = $total_f;
        $order->save();
        $order->code = 'licb'.'-'.$date.'-'.$order->id;
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
        $cartData = $this->fetchCartData();
        $categories = Category::where('parent_id',null)->get();
        $search_term = NULL;
        return view('success-order',compact('cartData','categories','search_term'));
    }




}
