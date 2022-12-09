<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatedproduct extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function productAdded()
    {
        return $this->belongsTo(Productline::class,'added_productline_id');
    }
}
