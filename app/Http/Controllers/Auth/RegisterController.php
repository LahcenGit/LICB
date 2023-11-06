<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm(){
        $nbr_cartitem = 0;
        $total_category = Category::where('parent_id', NULL)->count();
        $moitie = ceil($total_category / 2);
        $first_part_categories = Category::take($moitie)->where('parent_id',NULL)->get();
        $last_part_categories = Category::skip($moitie)->take($total_category - $moitie)->where('parent_id',NULL)->get();
        $categories = Category::where('parent_id',null)->limit('5')->get();
        return view('auth.register',compact('nbr_cartitem','first_part_categories','last_part_categories','categories'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','unique:users'],
            'first_name' => ['required' ,'string' ,'max:255'],
            'last_name' => ['required','string' ,'max:255'],
            'username' => ['required' , 'unique:users', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
            'password.min' => 'Le mot de passe doit comporter au moins 8 caractères.',
            'email.unique' => 'Ce email existe déja',
            'email.email' => 'e-mail doit être une adresse e-mail valide.',
            'username.unique' => 'Ce username existe déja',
            'phone.unique' => 'Ce numéro existe déja',
            'phone.required' =>'Ce champ est obligatoire',
            'password.required'=>'le mot de passe est obligatoire',
            'first_name.required' => 'Ce champ est obligatoire',
            'last_name.required' => 'Ce champ est obligatoire',
            'email.required' => 'Ce champ est obligatoire',
            'username.required' => 'Ce champ est obligatoire',
            'phone.required' => 'Ce champ est obligatoire',
        ]
    );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'email' => $data['email'],
            'username' => $data['username'],
            'phone' => $data['phone'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'type' => 'customer',
            'password' => Hash::make($data['password']),
        ]);
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->save();
        return $user;
    }
}
