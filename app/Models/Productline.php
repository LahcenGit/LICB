<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productline extends Model
{
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function getProduct(){
        $product = null;
        $product= Product::where('id',$this->product_id)->first();
        return $product;
    }

    public function getValue(){
        $value = null;
        $value= Attributeline::where('id',$this->attributeline_id)->first();
        if($value!= NULL){
            return $value;
        }
        else{
            return null;
        }
       
    }
    public function getImage(){
        $image = null;
        $image= Image::where('product_id',$this->product_id)->where('type',1)->first();
        return $image;
    }

    public function attributeLine(){

        return $this->belongsTo(Attributeline::class,'attributeline_id');
    }
    
    public function attribute(){

        return $this->belongsTo(Attribute::class,'attribute_id');
    }
}
