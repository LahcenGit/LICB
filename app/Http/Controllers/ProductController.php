<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Attributeline;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function create(){
        $categories = Category::whereNull('parent_id')
                                ->with('childCategories')
                                ->orderby('description', 'asc')
                                ->get();
        $products = Product::all();
        $attributes = Attribute::all();
        return view('admin.add-product',compact('categories','products','attributes'));
    }


    public function getAttribute($id){
        $attributes = Attributeline::where('attribute_id',$id)->get();
        return $attributes;

    }
}
