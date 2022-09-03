<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productline extends Model
{
    use HasFactory;

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
}
