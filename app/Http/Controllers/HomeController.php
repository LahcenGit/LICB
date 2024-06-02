<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Category;
use App\Models\Product;
use App\Models\Productcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()){
            $cart = Cart::where('user_id',Auth::user()->id)->first();
            $cart_session = session('cart_id');
            if ($cart_session) {
                $cartitems_session = Cartitem::where('cart_id', $cart_session)->get();

                foreach ($cartitems_session as $cartitem_session) {
                    // Vérifier si le produit existe déjà dans le panier de l'utilisateur
                    $existingCartItem = $cart->cartitems()->where('productline_id', $cartitem_session->productline_id)->first();

                    if ($existingCartItem) {
                        // Si le produit existe, augmenter la quantité
                        $existingCartItem->qte += $cartitem_session->qte;
                        $existingCartItem->save();
                    } else {
                        // Sinon, créer un nouvel élément dans le panier de l'utilisateur
                        $cartitem_session->cart_id = $cart->id;
                        $cartitem_session->save();
                    }
                }
            }
            session()->forget('cart');
            $cartitems = $cart->cartitems;
            $nbr_cartitem = $cart->cartitems->count();
            $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id',$cart->id)->first();
        }
        else{
            $cart= session('cart_id');
            $cartitems = Cartitem::where('cart_id',$cart)->get();
            $nbr_cartitem = Cartitem::where('cart_id',$cart)->count();
            $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id',$cart)->first();
        }

        $categories = Category::where('parent_id',NULL)->get();
        $last_products = Product::latest()->take(10)->get();
        $products = Product::orderBy('created_at','desc')->get();


        $new_products = Product::orderBy('created_at','desc')->limit(3)->get();
        return view('welcome',compact('nbr_cartitem','cartitems','total','categories','last_products','products','new_products'));
    }

    public function checkAuth() {
        $isLoggedIn = Auth::check();
        return response()->json(['isLoggedIn' => $isLoggedIn]);
    }

    public function categoryProducts($id){
        if(Auth::user()){
            $cart = Cart::where('user_id',Auth::user()->id)->first();
            $cart_session = session('cart_id');
            if ($cart_session) {
                $cartitems_session = Cartitem::where('cart_id', $cart_session)->get();

                foreach ($cartitems_session as $cartitem_session) {
                    // Vérifier si le produit existe déjà dans le panier de l'utilisateur
                    $existingCartItem = $cart->cartitems()->where('productline_id', $cartitem_session->productline_id)->first();

                    if ($existingCartItem) {
                        // Si le produit existe, augmenter la quantité
                        $existingCartItem->qte += $cartitem_session->qte;
                        $existingCartItem->save();
                    } else {
                        // Sinon, créer un nouvel élément dans le panier de l'utilisateur
                        $cartitem_session->cart_id = $cart->id;
                        $cartitem_session->save();
                    }
                }
            }
            session()->forget('cart');
            $cartitems = $cart->cartitems;
            $nbr_cartitem = $cart->cartitems->count();
            $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id',$cart->id)->first();
        }
        else{
            $cart= session('cart_id');
            $cartitems = Cartitem::where('cart_id',$cart)->get();
            $nbr_cartitem = Cartitem::where('cart_id',$cart)->count();
            $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id',$cart)->first();
        }

        $categories = Category::where('parent_id',NULL)->get();
        $category = Category::find($id);
        $products = ProductCategory::where('category_id', $id)->with('product')->paginate(15);
        $countProducts = ProductCategory::where('category_id', $id)->with('product')->count();
        $randomCategories = Category::withCount('productCategories')
        ->whereNotNull('parent_id')
        ->inRandomOrder()
        ->take(5)
        ->get();
        return view('category-products',compact('products','category','countProducts','nbr_cartitem','cartitems','total','categories','randomCategories'));

    }
}
