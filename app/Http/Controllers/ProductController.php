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
use Illuminate\Support\Facades\DB;
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
                                ->with('childrenCategories')
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
        if($request->p_TYPE){
            $product->p_TYPE = $request->p_TYPE;
        }

        if($request->p_GEN){
            $product->p_GEN = $request->p_GEN;
        }
        if($request->m_TYPE){
            $product->m_TYPE = $request->m_TYPE;
        }
        if($request->m_GEN){
            $product->m_GEN = json_encode($request['m_GEN']);
        }
        if($request->m_DDR){
            $product->m_DDR = $request->m_DDR;
        }
        if($request->r_DDR){
            $product->r_DDR = $request->r_DDR;
        }
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
                    $path = $request->file('photoPrincipale')[0]->store($destination);
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
        $images = Image::where('product_id', $id)->get();
        $productlines = Productline::where('product_id',$id)->get();
        foreach($images as $image){
          File::delete('storage/images/products/'.$image->lien);
        }

        foreach($productlines as $productline){
          $productline->delete();
        }
        $product->delete();
        return redirect('admin/products');
    }

    public function edit($id){

        $array_checked = array();
        $product = Product::find($id);
        $categories = Category::whereNull('parent_id')
                                ->with('childrenCategories')
                                ->orderby('description', 'asc')
                                ->get();
        $categories_checked = Productcategory::where('product_id', $product->id)->get();
        //make an arrray to checked category
        foreach($categories_checked as $checked){

            array_push($array_checked,$checked->category_id);
        }
        $array_checked = json_encode($array_checked);
        $images = Image::where('product_id', $id)->where('type',2)->get();



        $image_preload_p = Image::where('product_id', $id)->where('type',1)
        ->select('id', DB::raw("concat('https://www.licbplus.com.dz/newsite/public/storage/images/products/', lien) as src"))
        ->get();

        $images_preload = Image::where('product_id', $id)->where('type',2)
        ->select('id', DB::raw("concat('https://www.licbplus.com.dz/newsite/public/storage/images/products/', lien) as src"))
        ->get();


        $all_productlines = Productline::all();
        $attributes = Attribute::all();
        $marks = Mark::all();
        $productlines = Productline::where('product_id',$id)->get();

        return view('admin.edit-product',compact('product','categories','attributes','marks','productlines','all_productlines','images','array_checked','images_preload','image_preload_p'));
    }


    public function update(Request $request , $id){




        $product = Product::find($id);
        $images = Image::where('product_id', $id)->get();
        $productlines = Productline::where('product_id',$id)->get();
        $product_categories = Productcategory::where('product_id',$id)->get();
        $related_products = Relatedproduct::where('product_id',$id)->get();


        //traitement images
        //---1er cas : aucun ajout avec supression photo
        if( !$request->hasFile('photoPrincipale') && !$request->hasFile('photos') ){
            if(count($request->old) !=  $images->count()){
                //capter les images supprimer
                $deleted_images = Image::where('product_id', $id)->whereNotIn('id', $request->old)->get('id');
                foreach(  $deleted_images as $image){
                    File::delete('storage/images/products/'.$image->lien);
                    $image->delete();
                }
            }
        }
        else{
            if($request->hasFile('photoPrincipale')){

                //supprimer la principale
                $deleted_image = Image::where('product_id', $id)->whereNotIn('id', $request->old)->where('type',1)->first();
                File::delete('storage/images/products/'.$deleted_image->lien);
                $deleted_image->delete();
                //go head
                $destination = 'public/images/products';
                $path = $request->file('photoPrincipale')[0]->store($destination);
                $storageName = basename($path);
                $image = new Image();
                $image->lien = $storageName;
                $image->type = 1;
                $product->images()->save($image);
            }

            if($request->hasFile('photos')){
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
        }


      /*  foreach($images as $image){
            File::delete('storage/images/products/'.$image->lien);
            $image->delete();
        }*/

        foreach($productlines as $productline){
            if($productline->attribute_image){
                File::delete('storage/images/productlines/'.$productline->attribute_image);
            }
            if($productline->attribute_icone){
                File::delete('storage/icones/productlines/'.$productline->attribute_image);
            }
            $productline->delete();
        }
        foreach($product_categories as $product_category){
            $product_category->delete();
        }
        foreach($related_products as $related_product){
            $related_product->delete();
        }

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
       /* $hasFile = $request->hasFile('photoPrincipale');


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
        }*/
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
      //  $category_product_name = Category::find($category_product->id);
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

        $total_category = Category::where('parent_id', NULL)->count();
        $moitie = ceil($total_category / 2);
        $first_part_categories = Category::take($moitie)->where('parent_id',NULL)->get();
        $last_part_categories = Category::skip($moitie)->take($total_category - $moitie)->where('parent_id',NULL)->get();
        return view('detail-product',compact('product','first_image','min_price','attributes',
        'productlines','min_price_promo','countproductlines','categories','new_products',
        'related_products','product_line','nbr_cartitem','cartitems','total'
         ,'images_attributes','secondary_images','added_products','has_color','category_product','first_part_categories','last_part_categories'));
    }


    public function getPrice($id){
        $product = Productline::find($id);

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

     $productline = Productline::where('product_id',$product_id)->first();

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
