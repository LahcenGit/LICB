<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function secondaryImages(){
        $images = Image::where('product_id',$this->id)->where('type',2)->get();
        return $images;
    }

    public function minPrice(){
        $min_price = Productline::where('product_id',$this->id)->min('price');
        return $min_price;
    }
}
