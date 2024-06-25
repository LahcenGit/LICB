@extends('layouts.front')
@section('content')
<style>
.custome-checkbox input[type="checkbox"]:checked + .form-check-label::before {
    background-color: #BC221A !important;
    border-color: #BC221A !important;;
}
::selection {
    background: #BC221A !important;
    color: #fff!important ;
}
</style>
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ asset('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> {{ $category->designation }} <span></span> products
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row flex-row-reverse mt-4 " >
            <div class="col-lg-4-5">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        @if ($countProducts > 0)
                            <p>We found <strong class="text-brand">{{ $countProducts }}</strong> products for you!</p>
                        @else
                            <p>No products found for you!</p>
                        @endif
                    </div>
                    <div class="sort-by-product-area">
                         {{--
                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>

                                <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                    <li><a href="#">150</a></li>
                                    <li><a href="#">200</a></li>
                                    <li><a href="#">All</a></li>
                                </ul>
                            </div>


                        </div>
                        --}}
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span class="sort-by-text"> New <i class="fi-rs-angle-small-down "></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <ul>
                                        <li><a href="#" class="filter-link active" data-sort-by="new">New</a></li>
                                        <li><a href="#" class="filter-link" data-sort-by="price_low_high">Price: Low to High</a></li>
                                        <li><a href="#" class="filter-link" data-sort-by="price_high_low">Price: High to Low</a></li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row product-grid" id="product-list">
                    @foreach($paginated_products as $paginated_product)
                        @php $product = $paginated_product->product; @endphp
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ asset('product/'.$product->slug) }}">
                                            @if($product->images && $product->images->isNotEmpty())
                                                @if($product->images->first()->lien)
                                                    <img class="default-img" src="{{ asset('storage/images/products/'.$product->images->first()->lien) }}" alt="" />
                                                @endif
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                       {{-- <a aria-label="Ajouter au favoris" class="action-btn" href="#"><i class="fi-rs-heart"></i></a> --}}
                                        <a class="action-btn" href="{{ asset('product/'.$product->slug) }}"><i class="fi-rs-eye"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">New</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <h2><a href="{{ asset('product/'.$product->slug) }}">{{ $product->designation }}</a></h2>

                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            @if($product->getPricePromo())
                                                <span>{{ number_format($product->getPricePromo() ,2) }} Da</span>
                                                <span class="old-price">{{ number_format($product->getPrice() ,2) }} Da</span>
                                            @else
                                                <span>{{ number_format($product->getPrice(),2) }} Da</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination Area -->
                <div class="pagination-area mt-20 mb-20" id="pagination" data-pagination-type="global">
                    <nav aria-label="Page navigation example">
                        @include('vendor.pagination.custom-pagination', ['paginator' => $paginated_products])
                    </nav>
                </div>
                {{--
                <section class="section-padding pb-5">
                    <div class="section-title">
                        <h3 class="">Deals Of The Day</h3>
                        <a class="show-all" href="shop-grid-right.html">
                            All Deals
                            <i class="fi-rs-angle-right"></i>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="product-cart-wrap style-2">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="shop-product-right.html">
                                            <img src="assets/imgs/banner/banner-5.png" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="product-cart-wrap style-2">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="shop-product-right.html">
                                            <img src="assets/imgs/banner/banner-6.png" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2026/04/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="shop-product-right.html">Perdue Simply Smart Organics Gluten</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">Old El Paso</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>$24.85</span>
                                                <span class="old-price">$26.8</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 d-none d-lg-block">
                            <div class="product-cart-wrap style-2">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="shop-product-right.html">
                                            <img src="assets/imgs/banner/banner-7.png" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2027/03/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="shop-product-right.html">Signature Wood-Fired Mushroom</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (3.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">Progresso</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>$12.85</span>
                                                <span class="old-price">$13.8</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 d-none d-xl-block">
                            <div class="product-cart-wrap style-2">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="shop-product-right.html">
                                            <img src="assets/imgs/banner/banner-8.png" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2025/02/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="shop-product-right.html">Simply Lemonade with Raspberry Juice</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (3.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">Yoplait</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>$15.85</span>
                                                <span class="old-price">$16.8</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                 --}}
                <!--End Deals-->
            </div>
            
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar">

                {{--<div class="sidebar-widget widget-category-2 mb-30">
                    <h5 class="section-title style-1 mb-30">Categories</h5>
                    <ul>
                        @foreach($randomCategories as $randomcategory)
                            <li>
                                <a href="{{ asset('category/'.$randomcategory->slug) }}">{{$randomcategory->designation}}</a><span class="count" style="color: #fff">{{ $randomcategory->product_categories_count }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>--}}

                <div class="banner-slider sidebar-widget product-sidebar mb-30  bg-grey border-radius-10">
                    <div >
                        <img class="rounded-image" src="{{ asset('front/assets/ads/earn-points.jpg') }}" alt="" />
                    </div>
                    
                </div>

                <!-- Fillter By Price -->
                    <div class="sidebar-widget price_range range mb-30">
                    <h5 class="section-title style-1 mb-30">Filter</h5>

                            <div class="list-group">
                                <div class="list-group-item mb-10 mt-10">
                                    <label class="fw-900">Categories</label>
                                    <div class="custom-checkbox">
                                        @foreach($subcategories as $subcategorie)
                                        <input class="form-check-input subcategory-checkbox" type="checkbox" name="sub_categories[]" id="exampleCheckbox{{ $loop->iteration }}" value="{{ $subcategorie->id }}" />
                                        <label class="form-check-label" for="exampleCheckbox{{ $loop->iteration }}">
                                            <span>{{ $subcategorie->designation }}</span>
                                        </label>
                                        <br/>
                                        @endforeach
                                    </div>
                                    <input type="hidden" id="category_id" value="{{ $category->id }}" />
                                    <input type="hidden" id="category_slug" value="{{ $category->slug }}" />
                                </div>
                            </div>
                        <!-- Ajout de l'identifiant unique au bouton Filter -->
                        <button id="filter-button" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Filter</button>

                    <a href="{{ asset('category-parent-products/'.$category->slug) }}" class="btn btn-sm btn-default mt-3"> show all</a>
                </div>



                
            </div>
        </div>
    </div>
</main>
@endsection
@push('filter-product-by-subcategories')

<script>
$(document).ready(function() {
    $('#filter-button').on('click', function() {
        applyFilters();
    });

    $('.filter-link').on('click', function(e) {
        e.preventDefault();
        $('.filter-link').removeClass('active');
        $(this).addClass('active');
        applyFilters();
    });

    function applyFilters() {
        let categoryId = $('#category_id').val();
        let slug = $('#category_slug').val();
        let subCategories = [];
        let sortBy = $('.filter-link.active').data('sort-by');

        $('.subcategory-checkbox:checked').each(function() {
            subCategories.push($(this).val());
        });

        // Construire l'URL avec les paramètres
        let url = "/global-category/"+slug;
        url = url + '/' + categoryId + '/' + (subCategories.length > 0 ? subCategories.join(',') : '0');

        // Ajouter le paramètre de tri
        if (sortBy) {
            url += '?sort_by=' + sortBy;
        }

        window.location.href = url;
    }
});

</script>
@endpush
