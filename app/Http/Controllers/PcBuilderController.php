<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\CartManagementTrait;
class PcBuilderController extends Controller
{
    use CartManagementTrait;
    public function index(){
        $categories = Category::where('parent_id',null)->limit('5')->get();
        $total = 0 ;
        $cartitems = null;
        $nbr_cartitem = 0;
        $search_term = Null;
        $cartData = $this->fetchCartData();
        return view('pc-builder',compact('cartitems','nbr_cartitem','total','categories','search_term','cartData'));
    }
    

    public function showComponent(){
        return view('pc-builder-modal');
    }
}
