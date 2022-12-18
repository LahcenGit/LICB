<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    //
    public function create(){
        $categories = Category::where('parent_id',null)->get();
        return view('admin.add-category',compact('categories'));
    }

    public function index(){

        $categories = Category::where('parent_id',null)->orderby('designation', 'asc')->get();
        $countcategory = Category::count();
        return view('admin/categories',compact('categories','countcategory'));
    }

    public function store(Request $request){

        $request->validate([
         'designation' => ['required', 'string', 'max:255'],
         ]);
         $category = new Category();
         $category->designation=$request['designation'];
         $category->description = $request['description'];

         if($request['category'] == 0){
          $category->parent_id == NULL;
         }
         else{
             $category->parent_id = $request['category'];
         }
         $category->save();
         return redirect('admin/categories');
    }

    public function edit($id){
        $category = Category::find($id);
        $categories = Category::where('parent_id',null)->get();
        return view("admin.edit-category",compact('category','categories'));
    }



    public function update(Request $request, $id){
        $category = Category::find($id);

        $category->designation=$request['name'];
        $category->description = $request['description'];

        if($request['category'] == 0){

         $category->parent_id = NULL;

         $category->save();
        }
        else{
            $category->parent_id = $request['category'];
        }
        $category->save();
        return redirect('admin/categories')->with('success','Category updated successfully');
    }


    public function destroy($id){

        $category = Category::find($id);
        $childCategories = Category::where('parent_id',$id)->get();
        foreach($childCategories as $childCategory){
            $childCategory->parent_id = null;
            $childCategory->save();
        }
        $category->delete();


       return redirect('admin/categories');


   }
}
