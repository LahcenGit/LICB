<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function productline(){
        return $this->belongsTo(Productline::class,'product_id');
    }

    public function getName(){
        $productline = Productline::where('id',$this->product_id)->first();
        $name = Product::where('id',$productline->product_id)->first();
        return $name;
    }

    public function getImage(){
        $productline = Productline::where('id',$this->product_id)->first();
        $image = Image::where('product_id',$productline->product_id)->where('type',1)->first();
        return $image;
    }
}
