<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Attributeline;
use App\Models\Image;
use App\Models\Productcategory;
use App\Models\Productline;
use App\Models\Relatedproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    //
    public function index(){
        $products = Productline::all();
        return view('admin.products',compact('products'));
    }

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
        $product->slug = str::slug($request->designation);
        if($request->brouillon == '1'){
            $product->is_brouillon = 1; 
        }
        else{
            $product->is_brouillon = 0;
        }
       
        if($request->date){
         $product->created_at = $request->date;
        }
        $product->save();
        if($request->check != 'oui'){
        $productline = new Productline();
        $productline->product_id = $product->id;
        $productline->qte = $request->qte;
        $productline->price = $request->price;
        $productline->promo_price = $request->promo;
        $productline->status = $request->status;
        $productline->save();
        }
        else{
        for($i=0 ; $i<count($request->as) ; $i++){
            $productline = new Productline();
            $productline->product_id = $product->id;
            $productline->attributeline_id = $request->values[$i];
            $productline->attribute_id = $request->as[$i];
            $productline->qte = $request->qtes[$i];
            $productline->price = $request->prices[$i];
            $productline->promo_price = $request->promos[$i];
            $productline->status = $request->status;
            $productline->save();

        }
    }
        if($request->relatedproducts){
        foreach($request->relatedproducts as $relatedproduct){
            $productR = new Relatedproduct();
            $productR->product_id = $product->id;
            $productR->added_product_id = $relatedproduct;
            $productR->save();
        }
    }
        foreach($request->categories as $category){
          
            $categoryproduct = new Productcategory();
            $categoryproduct->product_id = $product->id;
            $categoryproduct->category_id= $category;
            $categoryproduct->save();
        }
        $hasFile = $request->hasFile('photoPrincipale');
        $hasFileTwo = $request->hasFile('photos');
        if($hasFile){
                $destination = 'public/images/products';
                $path = $request->file('photoPrincipale')->store($destination);
                $storageName = basename($path);
                $image = new Image();
                $image->lien = $storageName;
                $image->type = 1;
                $product->images()->save($image);
            }
        
        if($hasFileTwo){
            foreach($request->file('photos') as $file){
                $destination = 'public/images/products';
                $path = $file->store($destination);
                $storageName = basename($path);
                $image = new Image();
                $image->lien = $storageName;
                $image->type = 2;
                $product->images()->save($image);
            } 
        }
        return redirect('dashboard-admin/products');
    }


    public function getAttribute($id){
        $attributes = Attributeline::where('attribute_id',$id)->get();
        return $attributes;

    }

    public function search($value){
        $products=Product::where('title','LIKE','%'.$value."%")->get();
        return $products;

    }

    public function destroy($id){
        $product = Product::find($id);
        $image = Image::where('product_id', $id)->where('type',1)->first();
      
         File::delete('storage/images/products/'.$image->lien);
    
        $product->delete();
        return redirect('dashboard-admin/products');
    }


    public function detailProduct($slug){
        $product = Product::where('slug',$slug)->first();
        $first_image = Image::where('product_id',$product->id)->where('type',1)->first();
        $countproductlines = Productline::where('product_id',$product->id)->count();
       
        
        if($countproductlines > 1){
           $min_price = Productline::where('product_id',$product->id)->min('price');
           $min_price_promo = Productline::where('product_id',$product->id)->min('promo_price');
           
           $countproductline = Productline::where('product_id',$product->id)
           ->count();
           $attributes= Productline::with('attributeLine')->where('product_id',$product->id)
                                    ->orderBy('price','asc')
                                    ->get()
                                    ->groupBy('attribute_id');
                                        
            $productline = null;
           }
        else{
           $min_price = null;
           $min_price_promo = null;
           $productline = Productline::where('product_id',$product->id)->first();
           $attributes = null;
        }

        $categories = Category::where('parent_id',null)->limit('5')->get();
        $new_products = Product::orderBy('created_at','desc')->limit('3')->get();
        return view('detail-product',compact('product','first_image','min_price','attributes','min_price_promo','countproductlines','productline','categories','new_products'));
    }


    public function getPrice($id,$attributeline_id){
        $product = Productline::where('attributeline_id',$attributeline_id)->where('id',$id)->first();

        $data = array(
            "price" => number_format($product->price),
            "promo" => number_format($product->promo_price)
          );

        
        return $data;
    }
}
