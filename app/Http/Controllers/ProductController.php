<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Attributeline;
use App\Models\Productcategory;
use App\Models\Productline;
use App\Models\Relatedproduct;
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


    public function store(Request $request){
        $product = new Product();
        $product->designation = $request->designation;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->point = $request->point;
        $product->is_brouillon = $request->is_brouillon;
        $product->save();
        $productline = new Productline();
        $productline->product_id = $product->id;
        $productline->qte = $request->qte;
        $productline->price = $request->price;
        $productline->promo_price = $request->promo;
        $productline->status = $request->status;
        $productline->save();
        
        for($i=0 ; $i<count($request->attribute) ; $i++){
            $productline = new Productline();
            $productline->product_id = $product->id;
            $productline->attributeline_id = $request->attributeline[$i];
            $productline->qte = $request->qtes[$i];
            $productline->price = $request->prices[$i];
            $productline->promo_price = $request->promo;
            $productline->status = $request->status;
            $productline->save();

        }
        foreach($request->relatedproducts as $relatedproduct){
            $relatedproduct = new Relatedproduct();
            $relatedproduct->product_id = $product->id;
            $relatedproduct->added_product_id = $relatedproduct;
            $relatedproduct->save();
        }
        foreach($request->categories as $category){
            $category = new Productcategory();
            $category->product_id = $product->id;
            $category->category_id= $category;
            $category->save();
        }
    }


    public function getAttribute($id){
        $attributes = Attributeline::where('attribute_id',$id)->get();
        return $attributes;

    }
}
