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
use App\Traits\CartManagementTrait;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    use CartManagementTrait;
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
        $cartData = $this->fetchCartData();
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

        $parent_categories = Category::select('categories.id', 'categories.designation', 'categories.slug', 'categories.icone')
                                    ->leftJoin('categories as children', 'children.parent_id', '=', 'categories.id')
                                    ->leftJoin('categories as grandchildren', 'grandchildren.parent_id', '=', 'children.id')
                                    ->leftJoin('productcategories as pc1', 'pc1.category_id', '=', 'categories.id')
                                    ->leftJoin('productcategories as pc2', 'pc2.category_id', '=', 'children.id')
                                    ->leftJoin('productcategories as pc3', 'pc3.category_id', '=', 'grandchildren.id')
                                    ->selectRaw('categories.id, categories.designation, COUNT(DISTINCT pc1.product_id) + COUNT(DISTINCT pc2.product_id) + COUNT(DISTINCT pc3.product_id) as product_count')
                                    ->whereNull('categories.parent_id')
                                    ->groupBy('categories.id', 'categories.designation', 'categories.slug', 'categories.icone')
                                    ->get();
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $search_term = NULL;
        return view('welcome',compact('cartData','categories'
                ,'last_products','products','new_products','parent_categories',
                'categoriesWithNewProducts','recentProductsByCategory','search_term'));
    }

    public function checkAuth() {
        $isLoggedIn = Auth::check();
        return response()->json(['isLoggedIn' => $isLoggedIn]);
    }

    public function categoryProducts($slug) {
        // Check if user is authenticated
        $cartData = $this->fetchCartData();

        // Retrieve top-level categories
        $categories = Category::where('parent_id', NULL)->get();

        // Find the category based on the slug
        $category = Category::where('slug', $slug)->first();
        //$latest_products = $category->products()->orderBy('created_at', 'desc')->take(10)->get();
        // Retrieve products associated with the specified category
        $products = ProductCategory::where('category_id', $category->id)->with('product')->paginate(15);
        $countProducts = $products->total();

        // Retrieve random categories with associated products
        $randomCategories = Category::withCount('productCategories')
            ->whereNotNull('parent_id')
            ->has('productCategories')
            ->inRandomOrder()
            ->take(5)
            ->get();

        // Retrieve brands associated with products in the specified category
        $brands = Mark::join('products', 'marks.id', '=', 'products.mark_id')
            ->join('productcategories', 'products.id', '=', 'productcategories.product_id')
            ->where('productcategories.category_id', $category->id)
            ->select('marks.*')
            ->distinct()
            ->get();

        // Initialize search term as NULL
        $search_term = NULL;

        // Return the view with necessary data
        return view('category-products', compact('products', 'category', 'countProducts'
                                          , 'cartData', 'categories'
                                          , 'randomCategories', 'brands'
                                          , 'search_term'));
    }

    public function filterProducts($slug, $categoryId, $brands, Request $request)
{
    // Handle user's cart items if authenticated
    $cartData = $this->fetchCartData();

    // Retrieve top-level categories for navigation
    $categories = Category::where('parent_id', NULL)->get();

    // Retrieve category based on the provided slug
    $category = Category::find($categoryId);

    // Retrieve random categories with associated products for display
    $randomCategories = Category::withCount('products')
        ->whereNotNull('parent_id')
        ->has('products')
        ->inRandomOrder()
        ->take(5)
        ->get();

    // Determine sorting order (default is by 'newest')
    $sortBy = $request->input('sort_by', 'new');

    // Build query to retrieve products based on category and optional brands filter
    $query = Product::with(['images', 'productlines'])
        ->whereHas('categories', function($q) use ($categoryId) {
            $q->where('categories.id', $categoryId);
        })
        ->leftJoin('productlines', 'products.id', '=', 'productlines.product_id')
        ->select('products.*', DB::raw('MIN(productlines.price) as price'))
        ->groupBy('products.id');

    // Apply brand filter if brands are selected
    if ($brands != 0) {
        $selected_brands = explode(',', $brands);
        $query->whereIn('mark_id', $selected_brands);
    } else {
        $selected_brands = NULL;
    }

    // Apply sorting based on selected criteria
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

    // Paginate the query results and append sorting criteria in pagination links
    $products = $query->paginate(15)->appends(['sort_by' => $sortBy]);
    $countProducts = $products->total(); // Total count of products

    // Retrieve brands available for the specified category
    $brands = Mark::join('products', 'marks.id', '=', 'products.mark_id')
                        ->join('productcategories', 'products.id', '=', 'productcategories.product_id')
                        ->where('productcategories.category_id', $categoryId)
                        ->select('marks.*')
                        ->distinct()
                        ->get();

    // Initialize search term as NULL
    $search_term = NULL;

    // Return the view with necessary data
    return view('filtered-products-by-brands', compact('products', 'countProducts', 'category', 'categories', 'brands', 'randomCategories', 'cartData', 'sortBy', 'search_term', 'selected_brands'));
}


public function categoryParentProducts($slug)
{
    // Handle user's cart items if authenticated
    $cartData = $this->fetchCartData();

    // Retrieve top-level categories for navigation
    $categories = Category::whereNull('parent_id')->get();

    // Retrieve category based on the provided slug
    $category = Category::where('slug', $slug)->first();

    // Retrieve random categories with associated products for display
    $randomCategories = Category::withCount('productCategories')
                                ->whereNotNull('parent_id')
                                ->has('productCategories')
                                ->inRandomOrder()
                                ->take(5)
                                ->get();

    // Retrieve all subcategory IDs including the parent category
    $subCategoryIds = $category->getAllSubCategoryIds(); // Assuming this method exists in your Category model
    $subCategoryIds[] = $category->id; // Include the parent category ID itself

    // Retrieve direct subcategories of the parent category
    $subcategories = Category::where('parent_id', $category->id)->get();

    // Query products that belong to the parent category and its subcategories
    $paginated_products = ProductCategory::whereIn('category_id', $subCategoryIds)
        ->with('product')
        ->paginate(15);

    $countProducts = $paginated_products->total(); // Total count of products
    $search_term = NULL; // Initialize search term as NULL

    // Return the view with necessary data
    return view('category-parent-products', compact(
        'paginated_products',
        'category',
        'countProducts',
        'cartData',
        'categories',
        'randomCategories',
        'search_term',
        'subcategories'
    ));
}

public function filterProductsBySubcategories($slug, $categoryId, $subcategories, Request $request)
{
    // Handle user's cart items if authenticated
    $cartData = $this->fetchCartData();

    // Retrieve category based on the provided category ID
    $category = Category::find($categoryId);

    // Parse selected subcategories from the request
    $subcategories_selected = explode(',', $subcategories);

    // Retrieve top-level categories for navigation
    $categories = Category::whereNull('parent_id')->get();

    // Retrieve random categories with associated products for display
    $randomCategories = Category::withCount('productCategories')
                                ->whereNotNull('parent_id')
                                ->has('productCategories')
                                ->inRandomOrder()
                                ->take(5)
                                ->get();

    // Retrieve all subcategory IDs including the parent category
    $allSubCategoryIds = $category->getAllSubCategoryIds();
    $allSubCategoryIds[] = $categoryId;

    // Initialize the product query
    $query = Product::with(['images', 'productlines'])
        ->select('products.*', DB::raw('MIN(productlines.price) as price'))
        ->leftJoin('productlines', 'products.id', '=', 'productlines.product_id');

    // Check if specific subcategories are selected
    if (!empty($subcategories_selected) && $subcategories_selected[0] != '0') {
        // Retrieve all subcategories of the selected categories
        $selectedSubCategoryIds = [];
        foreach ($subcategories_selected as $selectedSubCategoryId) {
            $selectedCategory = Category::find($selectedSubCategoryId);
            if ($selectedCategory) {
                $selectedSubCategoryIds = array_merge($selectedSubCategoryIds, $selectedCategory->getAllSubCategoryIds());
            }
            $selectedSubCategoryIds[] = $selectedSubCategoryId;
        }

        // Filter products based on selected subcategories
        $query->whereHas('categories', function ($query) use ($selectedSubCategoryIds) {
            $query->whereIn('category_id', $selectedSubCategoryIds);
        });
    } else {
        // Filter products based on all subcategories of the parent category
        $query->whereHas('categories', function ($query) use ($allSubCategoryIds) {
            $query->whereIn('category_id', $allSubCategoryIds);
        });
    }

    $query->groupBy('products.id');

    // Sort products based on the selected sorting method
    $sortBy = $request->input('sort_by', 'new');
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

    // Paginate the query results
    $products = $query->paginate(15)->appends(['sort_by' => $sortBy]);
    $countProducts = $products->total(); // Total count of products

    // Retrieve direct subcategories of the parent category
    $subcategories = Category::where('parent_id', $categoryId)->get();

    $search_term = NULL; // Initialize search term as NULL

    // Return the view with necessary data
    return view('filtered-products-by-subCategories', compact(
        'products',
        'countProducts',
        'subcategories',
        'subcategories_selected',
        'category',
        'categories',
        'randomCategories',
        'cartData',
        'sortBy',
        'search_term'
    ));
}

public function search(Request $request)
{
    // Handle user's cart items if authenticated
    $cartData = $this->fetchCartData();

    // Retrieve random categories with associated products for display
    $randomCategories = Category::withCount('productCategories')
                                ->whereNotNull('parent_id')
                                ->has('productCategories')
                                ->inRandomOrder()
                                ->take(5)
                                ->get();

    // Retrieve top-level categories for navigation
    $categories = Category::where('parent_id', NULL)->get();

    // Retrieve search term and sorting method from request
    $search_term = $request->input('search_term');
    $sortBy = $request->input('sort_by', 'new');

    // Initialize the product query
    $query = Product::query()
                    ->select('products.*', DB::raw('MIN(productlines.price) as min_price'))
                    ->leftJoin('productlines', 'products.id', '=', 'productlines.product_id')
                    ->groupBy('products.id');

    // Apply search filters if search term is provided
    if ($search_term) {
        $query->where('designation', 'LIKE', '%' . $search_term . '%') // Search in product designation
              ->orWhereHas('categoryProducts.category', function ($query) use ($search_term) {
                  $query->where('designation', 'LIKE', '%' . $search_term . '%'); // Search in category designation
              })
              ->orWhereHas('mark', function ($query) use ($search_term) {
                  $query->where('designation', 'LIKE', '%' . $search_term . '%'); // Search in mark designation
              });

        // Check for parent category and its subcategories
        $parent_category = Category::where('designation', 'LIKE', '%' . $search_term . '%')->first();
        if ($parent_category) {
            $subCategory_Ids = $parent_category->childrenCategories->pluck('id')->toArray();
            $query->orWhereHas('categoryProducts', function ($query) use ($subCategory_Ids) {
                $query->whereIn('category_id', $subCategory_Ids); // Include products from subcategories
            });
        }
    }

    // Sort products based on the selected sorting method
    switch ($sortBy) {
        case 'price_low_high':
            $query->orderBy('min_price', 'asc');
            break;
        case 'price_high_low':
            $query->orderBy('min_price', 'desc');
            break;
        case 'new':
        default:
            $query->orderBy('products.created_at', 'desc');
            break;
    }

    // Paginate the query results
    $products = $query->with(['images', 'productlines', 'categoryProducts.category', 'mark'])->paginate(15);
    $countProducts = $products->total(); // Total count of products

    // Return the view with necessary data
    return view('search-results', compact(
        'products',
        'countProducts',
        'randomCategories',
        'cartData',
        'categories',
        'search_term'
    ));
}


}
