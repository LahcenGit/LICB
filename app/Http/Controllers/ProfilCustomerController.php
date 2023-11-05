<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilCustomerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user = User::find(Auth::user()->id);
        $points = Auth::user()->point;
        return view('customer.profil',compact('user','points'));
    }
}
