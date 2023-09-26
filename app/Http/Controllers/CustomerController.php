<?php

namespace App\Http\Controllers;

use App\Models\Convertedpoint;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //
    public function dashboard(){
        $points = Auth::user()->point;
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->limit(5)->get();
        return view('customer.dashboard-customer',compact('points','orders'));
    }
    public function modalConvertPoint(){
        $point = Auth::user()->point;
        return view('customer.modal-convert-points',compact('point'));
    }

    public function convertPoint($point){
        $user = User::find(Auth::user()->id);
        $converted_points = new Convertedpoint();
        $converted_points->user_id = Auth::user()->id;
        $converted_points->point = $point;
        $converted_points->status = 0;
        $converted_points->save();
        $user->point = $user->point-$point;
        $user->save();
        return true;
    }

}
