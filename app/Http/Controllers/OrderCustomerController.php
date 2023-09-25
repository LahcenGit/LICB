<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderCustomerController extends Controller
{
    //
    public function index(){
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        $count_orders = Order::where('user_id',Auth::user()->id)->count();
        return view('customer.orders',compact('orders','count_order'));
    }

    public function cancelOrder($id){
        $order = Order::find($id);
        $order->status = 3;
        $order->save();
        return redirect('back');
    }

    public function orderDetail($id){
        $order = Order::find($id);
        $orderlines = Orderline::where('order_id',$id)->get();
        return view('customer.detail-order',compact('order','orderlines'));
    }
}
