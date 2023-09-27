<?php

namespace App\Http\Controllers;

use App\Models\Convertedpoint;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponAdminController extends Controller
{
    //
    public function showModal($id){
        $point = Convertedpoint::find($id);
        return view('admin.modal-add-coupon',compact('point'));
    }
    public function storeCoupon(Request $request){
        $coupon = new Coupon();
        $point = Convertedpoint::find($request->point);
        $coupon->user_id = $point->user_id;
        $coupon->point_id = $point->id;
        $coupon->code = $request->code;
        $coupon->value = $request->value;
        $coupon->expiration_date = $request->date;
        $coupon->save();
        return $coupon;

    }
}
