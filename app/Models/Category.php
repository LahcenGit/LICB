<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function categories(){

        return $this->hasMany(Category::class,'parent_id');
   }

   public function childrenCategories()
   {
       return $this->hasMany(Category::class, 'parent_id')->with('categories');
   }



   public function parent()
   {
           return $this->belongsTo(Category::class, 'parent_id');
   }

   public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }


  /* public function products(){
    return $this->hasMany(Product::class);
    }*/


    public function products()
    {
        return $this->belongsToMany(Product::class, 'productcategories', 'category_id', 'product_id');
    }

    public function productCategories()
    {
        return $this->hasMany(Productcategory::class);
    }

// methode recursive
public function getAllSubCategoryIds()
{
    $subCategoryIds = $this->childrenCategories()->pluck('id')->toArray();

    foreach ($this->childrenCategories as $child) {
        $subCategoryIds = array_merge($subCategoryIds, $child->getAllSubCategoryIds());
    }

    return $subCategoryIds;
}
}
