<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function create(){
        $categories = Category::whereNull('parent_id')
                                ->with('childCategories')
                                ->orderby('description', 'asc')
                                ->get();
        return view('admin.add-product',compact('categories'));
    }
}
