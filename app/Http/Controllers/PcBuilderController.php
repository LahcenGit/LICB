<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Category;
use Illuminate\Http\Request;

class PcBuilderController extends Controller
{
    public function index(){
        $categories = Category::where('parent_id',null)->limit('5')->get();
        $total = 0 ;
        $cartitems = null;
        $nbr_cartitem = 0;

        return view('pc-builder',compact('cartitems','nbr_cartitem','total','categories'));
    }
    

    public function showComponent(){
        return view('pc-builder-modal');
    }
}
