<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Attributeline;
use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Image;
use App\Models\Mark;
use App\Models\Productcategory;
use App\Models\Productline;
use App\Models\Relatedproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('admin.products',compact('products'));
    }

    public function create(){
        $categories = Category::whereNull('parent_id')
                                ->with('childCategories')
                                ->orderby('description', 'asc')
                                ->get();
        $productlines = Productline::all();
        $attributes = Attribute::all();
        $marks = Mark::all();
        return view('admin.add-product',compact('categories','productlines','attributes','marks'));
    }


    public function store(Request $request){

        $product = new Product();
        $product->designation = $request->designation;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->point = $request->point;
        $product->mark_id = $request->mark;
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

        //product has no attribute
        if($request->check != 'oui'){
        $productline = new Productline();
        $productline->product_id = $product->id;
        $productline->qte = $request->qte;
        $productline->price = $request->price;
        $productline->promo_price = $request->promo;
        $productline->status = $request->status;
        $productline->weight = $request->weight;
        $productline->save();
        }
        //product has many attribute
        else{
        for($i=0 ; $i<count($request->as) ; $i++){
            $productline = new Productline();
            $productline->product_id = $product->id;
            $productline->attributeline_id = $request->values[$i];
            $productline->attribute_id = $request->as[$i];
            $productline->qte = $request->qtes[$i];
            $productline->weight = $request->weight;
            if($request->price){
                $productline->price = $request->price;
            }
            else{
                $productline->price = $request->prices[$i];
            }
            if($request->promo){
                $productline->promo_price = $request->promo;
            }
            else{
                $productline->promo_price = $request->promos[$i];
            }
            $productline->status = $request->status;

            if($request->icons){
                $destination = 'public/icones/productlines';
                $path = $request->icons[$i]->store($destination);
                $storageName = basename($path);
                $productline->attribute_icone = $storageName;
            }

            if($request->images){
                $destination = 'public/images/productlines';
                $path = $request->images[$i]->store($destination);
                $storageName = basename($path);
                $productline->attribute_image = $storageName;
             }
            $productline->save();

        }
    }
       //product has related products
        if($request->relatedproducts){
        foreach($request->relatedproducts as $relatedproduct){
            $productR = new Relatedproduct();
            $productR->product_id = $product->id;
            $productR->added_productline_id = $relatedproduct;
            $productR->save();
        }
    }
       //categories product
        foreach($request->categories as $category){

            $categoryproduct = new Productcategory();
            $categoryproduct->product_id = $product->id;
            $categoryproduct->category_id= $category;
            $categoryproduct->save();
        }
        // product images
        //first_image
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
        // secondary images
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
        return redirect('admin/products');
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
        return redirect('admin/products');
    }


    public function detailProduct($slug){
        $product = Product::where('slug',$slug)->first();
        $first_image = Image::where('product_id',$product->id)->where('type',1)->first();
        $countproductlines = Productline::where('product_id',$product->id)->count();
        $added_products = $product->relatedproducts;

        //product has many attribute
        if($countproductlines > 1){
           // recover the minimum price
           $min_price = Productline::where('product_id',$product->id)->min('price');
           //recover the minimum price_promo
           $min_price_promo = Productline::where('product_id',$product->id)->min('promo_price');
           //recover the productlines groupby attribute
           $productlines = Productline::with('attributeLine')->where('product_id',$product->id)
                                    ->orderBy('price','asc')
                                    ->get()
                                    ->groupBy('attribute_id');
            //first productline
            $product_line = Productline::where('product_id',$product->id)->first();
            $attributes = null;

            $images = $product->images;
            $images_attributes = $product->productlines;

            if($images){
                $secondary_images = $images->where('type',2);
            }

            $productattribute = $product_line->attribute->value;
            if($productattribute == 'Couleur'){
                $has_color = true;
            }
            else{
                $has_color = false;
            }

        }
          //product has no attribute
        else{

           $min_price = null;
           $min_price_promo = null;
           $product_line = Productline::where('product_id',$product->id)->first();
           $productlines = null;
           $attributes = null;
           $images = $product->images;
           $secondary_images = $images->where('type',2);
           $images_attributes = null;
           $has_color = false;

        }
        $categories = Category::where('parent_id',null)->limit('5')->get();
        // 3 new products
        $new_products = Product::orderBy('created_at','desc')->where('id','!=',$product->id)->limit('3')->get();
        $category_product = Productcategory::where('product_id',$product->id)->first();

        $related_products = Productcategory::where('category_id',$category_product->category_id)->where('product_id','!=',$product->id)->get();
        if(Auth::user()){
            $cart = Cart::where('user_id',Auth::user()->id)->first();
            if($cart){
            $cartitems = $cart->cartitems;
            $nbr_cartitem = $cart->cartitems->count();
            $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id',$cart->id)->first();
            }
            else{
                $cartitems = null;
                $nbr_cartitem = 0;
                $total = 0;
            }
        }
        else{
        $cart= session('cart_id');
        $cartitems = Cartitem::where('cart_id',$cart)->get();
        $nbr_cartitem = Cartitem::where('cart_id',$cart)->count();
        $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id',$cart)->first();
        }
        return view('detail-product',compact('product','first_image','min_price','attributes','productlines','min_price_promo','countproductlines','categories','new_products','related_products','product_line','nbr_cartitem','cartitems','total' ,'images_attributes','secondary_images','added_products','has_color'));
    }


    public function getPrice($id,$attributeline_id){
        $product = Productline::where('attributeline_id',$attributeline_id)->where('id',$id)->first();

        $data = array(
            "price" => number_format($product->price),
            "promo" => number_format($product->promo_price)
          );


        return $data;
    }


    public function getProduct($id){
        $product = Product::find($id);
        $countproductlines = Productline::where('product_id',$product->id)->count();
        if($countproductlines >1){
            $productlines = null;
        }
        else{
            $productlines = Productline::where('product_id',$product->id)->first();
        }
        $data = array(
            "countproductlines" => $countproductlines,
            "productlines" => $productlines
          );
        return $data;
    }

    public function showModal(){
        $attributes = Attribute::all();
        return view('admin.modal-add-attribute',compact('attributes'));
    }

    public function showModalAddMark(){
        return view('admin.modal-add-mark');
    }


    public function getPriceProductAdded($id,$product_id){
     $related_product = Relatedproduct::find($id);
     $productlineadded = $related_product->productLine;
     $productline = Productline::where('id',$product_id)->first();
     if($productline->promo_price){
        if($productlineadded->promo_price){
            $price = number_format($productline->promo_price + $productlineadded->promo_price);
        }
        else{
            $price = number_format($productline->promo_price + $productlineadded->price);
        }
       }
    else{
        if($productlineadded->promo_price){
            $price = number_format($productline->price + $productlineadded->promo_price);
        }
        else{
            $price = number_format($productline->price + $productlineadded->price);
        }
    }
    return array(
        "productline" => $productline,
        "price" => $price,
    );
    }
}
