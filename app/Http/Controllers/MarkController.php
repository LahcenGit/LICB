<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class MarkController extends Controller
{
    //

    public function index(){
        $marks = Mark::all();
        return view('admin.marks',compact('marks'));
    }

    public function create(){
        return view('admin.add-mark');
    }

    public function store(Request $request){
        $mark = new Mark();
        $mark->designation = $request->designation;
        $mark->slug = str::slug($request->designation);
        $mark->save();
        return redirect('admin/marks');
    }

    public function edit($id){
        $mark = Mark::find($id);
        return view('admin.edit-mark',compact('mark'));
    }

    public function update(Request $request , $id){
        $mark = Mark::find($id);
        $mark->designation = $request->designation;
        $mark->slug = str::slug($request->designation);
        $mark->save();
        return redirect('admin/marks');
    }

    public function destroy($id){
        $mark = Mark::find($id);
        $mark->delete();

        return redirect('admin/marks');
    }

}
