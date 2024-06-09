<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Category;
use App\Models\Mark;
use App\Models\Product;
use App\Models\Productcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $last_products = Product::orderBy('created_at','desc')->take(10)->get();
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
        $brands = Mark::join('products', 'marks.id', '=', 'products.mark_id')
                        ->join('productcategories', 'products.id', '=', 'productcategories.product_id')
                        ->where('productcategories.category_id', $id)
                        ->select('marks.*')
                        ->distinct()
                        ->get();
        return view('category-products',compact('products','category','countProducts','nbr_cartitem','cartitems','total','categories','randomCategories','brands'));

    }

    public function filterProducts(Request $request)
{       $brands = $request->input('brands');
        $categoryId = $request->input('category_id');
        $sortBy = $request->input('sort_by');

        $query = Product::with(['images', 'productlines'])
                        ->join('productcategories', 'products.id', '=', 'productcategories.product_id')
                        ->where('productcategories.category_id', $categoryId)
                        ->select('products.*', DB::raw('MIN(productlines.price) as price'))
                        ->leftJoin('productlines', 'products.id', '=', 'productlines.product_id')
                        ->groupBy('products.id');

       //filter by brand;
        if ($brands) {
            $query->whereIn('mark_id', $brands);
        }

        //filter by price
        switch ($sortBy) {
            case 'price_low_high':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high_low':
                $query->orderBy('price', 'desc');
                break;
            case 'new':
            default:
                $query->orderBy('products.created_at', 'desc');
                break;
        }

        // Pagination
        $products = $query->paginate(15);
        $countProducts = $products->count();
        $html = view('partials.product-list', compact('products', 'countProducts'))->render();
        return response()->json([
            'html' => $html,
            'countProducts' => $countProducts
    ]);
}
}
