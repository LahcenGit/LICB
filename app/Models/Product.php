<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;
    public function category(){
        return $this->hasOne(Category::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function productlines()
    {
        return $this->hasMany(Productline::class);
    }
    public function relatedproducts()
    {
        return $this->hasMany(Relatedproduct::class);
    }


    public function mark()
    {
        return $this->belongsTo(Mark::class,'mark_id');
    }

    public function secondaryImages(){
        $images = Image::where('product_id',$this->id)->where('type',2)->get();
        return $images;
    }

    public function minPrice(){
        $min_price = Productline::where('product_id',$this->id)->min('price');
        return $min_price;
    }

    public function getPrice(){
        $price = Productline::where('product_id',$this->id)->min('price');
        return $price;
    }
    public function getPricePromo(){

        $price_promo = Productline::where('product_id',$this->id)->min('promo_price');
        if($price_promo){
            return $price_promo;
        }
        else{
            return null;
        }

    }
    public function categoryProducts()
    {
        return $this->hasMany(Productcategory::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'productcategories', 'product_id', 'category_id');
    }


    public function isNew()
    {
        $createdAt = $this->created_at;
        $now = Carbon::now();
        return $createdAt->greaterThanOrEqualTo($now->subDays(10));
    }

    public function isOnPromo()
    {
        return $this->productlines()->whereNotNull('promo_price')->exists();
    }
}
