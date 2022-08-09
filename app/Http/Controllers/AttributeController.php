<?php

namespace App\Http\Controllers;

use App\Models\Attributeline;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    //
    public function create(){
        return view('admin.add-attribute');
    }

    public function store(Request $request){
        
        $attribute = new Attribute();
        $attribute->type = $request->type;
        $attribute->save();
        for($i=0 ; $i < count($request->attr) ; $i++){
        $attributeline = new Attributeline();
        $attributeline->attribute_id = $attribute->id;
        $attributeline->value = $request->attr[$i];
        $attributeline->save();
        }
    }
}
