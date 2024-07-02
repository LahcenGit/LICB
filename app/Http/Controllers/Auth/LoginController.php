<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Category;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\CartManagementTrait;
class LoginController extends Controller
{
    use CartManagementTrait;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => ['required', 'string', 'min:8'],
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;

        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']),$remember_me))
        {
            if(Auth::user()->type == 'admin'){
                return redirect('admin');
            }
            if(Auth::user()->type == 'customer'){
                if (session('visited_carts_page')){
                    return '/carts';
                }
                else{
                    return redirect('/');
                }

            }

        }
        else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }

    }
    public function showLoginForm(){
        $visited_carts_page = session('visited_carts_page');
        $cartData = $this->fetchCartData();
        $categories = Category::where('parent_id',NULL)->get();
        $search_term = NULL;
        return view('auth.login',compact('cartData','categories','search_term','visited_carts_page'));
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
