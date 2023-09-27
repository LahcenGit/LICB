<?php

namespace App\Http\Controllers;

use App\Models\Convertedpoint;
use Illuminate\Http\Request;

class PointAdminController extends Controller
{
    //
    public function index(){
        $points = Convertedpoint::orderBy('created_at','desc')->get();
        return view('admin.points-management',compact('points'));
    }
    public function showModal($id){
        $point = Convertedpoint::find($id);
        return view('admin.modal-edit-status-point',compact('point'));
    }
    public function updateModal($id , $status){
        $point = Convertedpoint::find($id);
        $point->status = $status;
        $point->save();
        return $point;
    }
}
