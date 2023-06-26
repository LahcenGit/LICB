<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackingController extends Controller
{
    //
    public function tracking(){
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

        $categories = Category::where('parent_id',NULL)->get();

        $total_category = Category::where('parent_id', NULL)->count();
        $moitie = ceil($total_category / 2);
        $first_part_categories = Category::take($moitie)->where('parent_id',NULL)->get();
        $last_part_categories = Category::skip($moitie)->take($total_category - $moitie)->where('parent_id',NULL)->get();
        return view('tracking',compact('nbr_cartitem','cartitems','total','categories','first_part_categories','last_part_categories'));
    }


    public function trackingResult(Request $request){
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

        $categories = Category::where('parent_id',NULL)->get();

        $total_category = Category::where('parent_id', NULL)->count();
        $moitie = ceil($total_category / 2);
        $first_part_categories = Category::take($moitie)->where('parent_id',NULL)->get();
        $last_part_categories = Category::skip($moitie)->take($total_category - $moitie)->where('parent_id',NULL)->get();
        $url = "https://api.yalidine.app/v1/histories/".$request->codetrack; // the parcel's endpoint
        $api_id = "73822021614736410875"; // your api ID
        $api_token = "qUYJABlF0Sv4K4jDG2516wSGKEwsVqnCaAQ8l3W8BJbpa9sm9jODZLIxr7cM2Rz5"; // your api token
        $code = $request->codetrack;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'X-API-ID: '. $api_id,
                'X-API-TOKEN: '. $api_token
            ),
        ));

        $response_json = curl_exec($curl);
        curl_close($curl);


        $response_array = json_decode($response_json,true);
        $response_array = $response_array['data'];



        return view('tracking-result',compact('nbr_cartitem','cartitems','total','categories','first_part_categories','last_part_categories','response_array','code'));
    }
}
