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
use Carbon\Carbon;
use Illuminate\Support\Str;
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

        //$categories = Category::where('parent_id',NULL)->get();
        $last_products = Product::orderBy('created_at','desc')->take(10)->get();
        $products = Product::orderBy('created_at','desc')->get();

        // Define the period to consider a product as "new"
        $newProductThreshold = Carbon::now()->subDays(30); // Exemple: produits des 30 derniers jours

        // Query to retrieve parent categories with new products in their subcategories
        $categoriesWithNewProducts = Category::select('categories.id', 'categories.designation','categories.slug')
            ->leftJoin('categories as children', 'children.parent_id', '=', 'categories.id')
            ->leftJoin('productcategories as pc', 'pc.category_id', '=', 'children.id')
            ->leftJoin('products', 'products.id', '=', 'pc.product_id')
            ->where('products.created_at', '>=', $newProductThreshold)
            ->whereNull('categories.parent_id')
            ->groupBy('categories.id', 'categories.designation')
            ->orderBy('products.created_at' ,'asc')
            ->limit(3)
            ->get();

        // For each category, retrieve the new products
        $recentProductsByCategory = [];
        foreach ($categoriesWithNewProducts as $category) {
            $recentProductsByCategory[$category->id] = Product::select('products.id', 'products.designation as designation', 'products.created_at', 'products.slug')
                ->join('productcategories as pc', 'products.id', '=', 'pc.product_id')
                ->join('categories as children', 'pc.category_id', '=', 'children.id')
                ->where('children.parent_id', $category->id)
                ->where('products.created_at', '>=', $newProductThreshold)
                ->orderBy('products.created_at' ,'desc')
                ->limit(10) // Limit to 10 recent products per category
                ->get();
        }

        $new_products = Product::orderBy('created_at','desc')->limit(3)->get();

        $parent_categories =  Category::select('categories.id', 'categories.designation','categories.slug','categories.icone')
                                ->leftJoin('categories as children', 'children.parent_id', '=', 'categories.id')
                                ->leftJoin('productcategories as pc1', 'pc1.category_id', '=', 'categories.id')
                                ->leftJoin('productcategories as pc2', 'pc2.category_id', '=', 'children.id')
                                ->selectRaw('categories.id, categories.designation, COUNT(DISTINCT pc1.product_id) + COUNT(DISTINCT pc2.product_id) as product_count')
                                ->whereNull('categories.parent_id')
                                ->groupBy('categories.id', 'categories.designation')
                                ->get();
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('welcome',compact('nbr_cartitem','cartitems','total','categories'
                ,'last_products','products','new_products','parent_categories',
                'categoriesWithNewProducts','recentProductsByCategory'));
    }

    public function checkAuth() {
        $isLoggedIn = Auth::check();
        return response()->json(['isLoggedIn' => $isLoggedIn]);
    }

    public function categoryProducts($slug){
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
        $category = Category::where('slug',$slug)->first();
        $products = ProductCategory::where('category_id', $category->id)->with('product')->paginate(15);
        $countProducts = $products->total();
        $randomCategories = Category::withCount('productCategories')
                                    ->whereNotNull('parent_id')
                                    ->inRandomOrder()
                                    ->take(5)
                                    ->get();
        $brands = Mark::join('products', 'marks.id', '=', 'products.mark_id')
                        ->join('productcategories', 'products.id', '=', 'productcategories.product_id')
                        ->where('productcategories.category_id', $category->id)
                        ->select('marks.*')
                        ->distinct()
                        ->get();
        return view('category-products',compact('products','category','countProducts','nbr_cartitem','cartitems','total','categories','randomCategories','brands'));

    }

    public function filterProducts($slug,$categoryId ,$brands,Request $request){
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
        $category = Category::find($categoryId);
        $randomCategories = Category::withCount('productCategories')
                                    ->whereNotNull('parent_id')
                                    ->inRandomOrder()
                                    ->take(5)
                                    ->get();

        $sortBy = $request->input('sort_by');

        $query = Product::with(['images', 'productlines'])
                        ->join('productcategories', 'products.id', '=', 'productcategories.product_id')
                        ->where('productcategories.category_id', $categoryId)
                        ->select('products.*', DB::raw('MIN(productlines.price) as price'))
                        ->leftJoin('productlines', 'products.id', '=', 'productlines.product_id')
                        ->groupBy('products.id');
        $selcetd_brands = explode(',', $brands);
        $brands = Mark::join('products', 'marks.id', '=', 'products.mark_id')
                            ->join('productcategories', 'products.id', '=', 'productcategories.product_id')
                            ->where('productcategories.category_id', $categoryId)
                            ->select('marks.*')
                            ->distinct()
                            ->get();
       //filter by brand;
        if ($selcetd_brands) {
            $query->whereIn('mark_id', $selcetd_brands);
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
        $countProducts = $products->total();
        return view('filtered-products-by-brands', compact('products', 'countProducts', 'category', 'categories','selcetd_brands','brands', 'randomCategories', 'nbr_cartitem', 'cartitems', 'total', 'sortBy'));

}


public function categoryParentProducts($slug){
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
    $category = Category::where('slug',$slug)->first();
    $subcategories = Category::where('parent_id',$category->id)->get();
    $randomCategories = Category::withCount('productCategories')
                                ->whereNotNull('parent_id')
                                ->inRandomOrder()
                                ->take(5)
                                ->get();
    $subCategories = Category::where('parent_id', $category->id)->pluck('id');
    $paginated_products = ProductCategory::whereIn('category_id', $subCategories)
        ->with('product')
        ->paginate(15);

    $countProducts = $paginated_products->total();
    return view('category-parent-products',compact('paginated_products','category','countProducts','nbr_cartitem'
                                            ,'cartitems','total','categories','randomCategories','subcategories'));

}

public function filterProductsBySubcategories($slug,$categoryId, $subcategories, Request $request)
{
    if (Auth::user()) {
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $cart_session = session('cart_id');
        if ($cart_session) {
            $cartitems_session = Cartitem::where('cart_id', $cart_session)->get();
            foreach ($cartitems_session as $cartitem_session) {
                $existingCartItem = $cart->cartitems()->where('productline_id', $cartitem_session->productline_id)->first();
                if ($existingCartItem) {
                    $existingCartItem->qte += $cartitem_session->qte;
                    $existingCartItem->save();
                } else {
                    $cartitem_session->cart_id = $cart->id;
                    $cartitem_session->save();
                }
            }
        }
        session()->forget('cart');
        $cartitems = $cart->cartitems;
        $nbr_cartitem = $cart->cartitems->count();
        $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id', $cart->id)->first();
    } else {
        $cart = session('cart_id');
        $cartitems = Cartitem::where('cart_id', $cart)->get();
        $nbr_cartitem = Cartitem::where('cart_id', $cart)->count();
        $total = Cartitem::selectRaw('sum(total) as sum')->where('cart_id', $cart)->first();
    }

    $category = Category::find($categoryId);
    $subcategories_selected = explode(',', $subcategories);
    $categories = Category::where('parent_id', NULL)->get();
    $randomCategories = Category::withCount('productCategories')
                                ->whereNotNull('parent_id')
                                ->inRandomOrder()
                                ->take(5)
                                ->get();
    $sortBy = $request->input('sort_by', 'new');
    $subcategories = Category::where('parent_id', $categoryId)->get();

    $query = Product::with(['images', 'productlines'])
        ->select('products.*', DB::raw('MIN(productlines.price) as price'))
        ->leftJoin('productlines', 'products.id', '=', 'productlines.product_id');

    if (!empty($subcategories_selected) && $subcategories_selected[0] != '0') {
        $query->whereHas('categoryProducts', function ($query) use ($subcategories_selected) {
            $query->whereIn('category_id', $subcategories_selected);
        });
    } else {
        $allSubCategories = $subcategories->pluck('id')->toArray();
        if (!empty($allSubCategories)) {
            $query->whereHas('categoryProducts', function ($query) use ($allSubCategories) {
                $query->whereIn('category_id', $allSubCategories);
            });
        } else {
            $query->whereHas('categoryProducts', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }
    }

    $query->groupBy('products.id');

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

    $products = $query->paginate(15);
    $countProducts = $products->total();

    return view('filtered-products-by-subCategories', compact('products', 'countProducts', 'subcategories', 'subcategories_selected', 'category', 'categories', 'randomCategories', 'nbr_cartitem', 'cartitems', 'total', 'sortBy'));
}
}
