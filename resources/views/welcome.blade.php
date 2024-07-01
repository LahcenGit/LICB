@extends('layouts.front')
@section('content')
<style>
    .stock-status.out-stock {
        color: #CE0000;
        background: #ffcece;
    }
    .stock-status.new-stock {
        color: #ffffff;
        background: #CE0000;
    }
    .stock-status.in-stock {
        color: #d6ffdf;
        background: #53b14f;
    }
    .stock-status.promo-stock {
        color: #ffc400;
        background: #000000;
    }
    .stock-status.back-stock {
        color: #fff5d2;
        background: hsl(231, 97%, 65%);
    }
    .stock-status.soon {
        color: #fff5d2;
        background: #ff8310;
    }
</style>
<main class="main">
    <section class="home-slider position-relative mb-30">
        <div class="container">
            <div class="home-slide-cover mt-30">
                <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                    <div class="single-hero-slider single-animation-wrap" style="background-image: url(front/assets/imgs/slider/slider-1.jpg)" >
                        {{--<div class="slider-content">
                                <button class="btn" type="submit">Buy it</button>
                        </div>--}}
                    </div>


                    <div class="single-hero-slider single-animation-wrap" style="background-image: url(front/assets/imgs/slider/slider-2.jpg)" >
                        {{--<div class="slider-content">
                                <button class="btn" type="submit">Buy it</button>
                        </div>--}}
                    </div>


                   {{-- <div class="single-hero-slider single-animation-wrap" style="background-image: url(assets/imgs/slider/slider-1.png)">
                        <div class="slider-content">
                            <h1 class="display-2 mb-40">
                                Fresh Vegetables<br />
                                Big discount
                            </h1>
                            <p class="mb-65">Save up to 50% off on your first order</p>
                            <form class="form-subcriber d-flex">
                                <input type="email" placeholder="Your emaill address" />
                                <button class="btn" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>--}}
                </div>
                <div class="slider-arrow hero-slider-1-arrow"></div>
            </div>

        </div>
    </section>
    <section class="popular-categories section-padding">
            <div class="container wow animate__animated animate__fadeIn">
                <div class="section-title">
                    <div class="title">
                        <h3>Featured Categories</h3>
                    </div>
                    <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
                </div>
                <div class="carausel-10-columns-cover position-relative">
                    <div class="carausel-10-columns" id="carausel-10-columns">
                        @foreach ($parent_categories as $parent_category )
                            <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="{{ asset('global-category/'.$parent_category->slug) }}"><img src="{{ asset('front/Licb-icons-categories/'.$parent_category->icone) }}" alt="" /></a>
                                </figure>
                                <h6><a href="{{ asset('global-category/'.$parent_category->slug) }}">{{ $parent_category->designation }}</a></h6>
                                <span>{{ $parent_category->product_count }} products</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!--End category slider-->
        <section class="banners mb-25">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            <img src="{{ asset('front/assets/imgs/banner/banner-2.png') }}" alt="" />
                            <div class="banner-text">
                                <h4 class="text-white">
                                    PC <br />
                                    Components
                                </h4>
                                <a href="{{ asset('global-category/pc-components') }}" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <img src="{{ asset('front/assets/imgs/banner/banner-3.png') }}" alt="" />
                            <div class="banner-text">
                                <h4 class="text-white">
                                    PC <br />
                                    peripherals
                                </h4>
                                <a href="{{ asset('/global-category/pc-peripherals') }}" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <img src="{{ asset('front/assets/imgs/banner/banner-1.png') }}" alt="" />
                            <div class="banner-text">
                                <h4 class="text-white">
                                    Office &  <br />
                                    Furniture
                                </h4>
                                <a href="{{ asset('/global-category/office-furniture') }}" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End banners-->
        <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>What's new !</h3>
                    <ul class="nav nav-tabs links" id="myTab" role="tablist">
                        @foreach ($categoriesWithNewProducts as $category)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if($loop->first) active @endif" id="nav-tab-{{ $category->id }}" data-bs-toggle="tab" data-bs-target="#tab-{{ $category->id }}" type="button" role="tab" aria-controls="tab-{{ $category->id }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $category->designation }}</button>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    @foreach ($categoriesWithNewProducts as $category)
                    <div class="tab-pane fade show @if($loop->first) active @endif" id="tab-{{ $category->id }}" role="tabpanel" aria-labelledby="nav-tab-{{ $category->id }}">
                        <div class="row product-grid-4">
                            @foreach ($recentProductsByCategory[$category->id] as $recentProduct)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ asset('product/'.$recentProduct->slug) }}">
                                                @if(optional($recentProduct->images->first())->lien)
                                                <img class="default-img" src="{{ asset('storage/images/products/'.$recentProduct->images[0]->lien) }}" alt="" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            {{-- <a aria-label="Add to Favorites" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="View Product" class="action-btn" data-bs-toggle="modal" href="{{ asset('product/'.$recentProduct->slug) }}" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                             --}}
                                            <a class="action-btn"  href="{{ asset('product/'.$recentProduct->slug) }}"><i class="fi-rs-eye"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            {!! \App\Helpers\ProductHelper::getProductBadge($recentProduct) !!}
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="{{ asset('product/'.$recentProduct->slug) }}">{{ $recentProduct->designation }}</a></h2>

                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                @if($recentProduct->getPricePromo())
                                                <span>{{ number_format($recentProduct->getPricePromo(), 2) }} Da</span>
                                                <span class="old-price">{{ number_format($recentProduct->getPrice(), 2) }} Da</span>
                                                @else
                                                <span>{{ number_format($recentProduct->getPrice(), 2) }} Da</span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--Products Tabs-->
        <section class="section-padding pb-5">
            <div class="container">
                <div class="section-title wow animate__animated animate__fadeIn">
                    <h3 class="">Gaming PC</h3>
               </div>
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                         <div class="banner-img style-2 d-flex align-items-end  justify-content-center" > 
                            <a href="{{asset('/category/pc-licb')}}" class="btn btn-xs mb-3">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                        <div class="tab-content" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                                <div class="carausel-4-columns-cover arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                        @foreach($products_licb as $product_licb)
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{ asset('product/'.$product_licb->slug) }}">
                                                        @if(optional($product_licb->images->first())->lien)
                                                        <img class="default-img" src="{{ asset('storage/images/products/'.$product_licb->images[0]->lien) }}" alt="" />
                                                        <img class="hover-img" src="{{ asset('storage/images/products/'.$product_licb->images[0]->lien) }}" alt="" />
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                    <!--
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    !-->
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    {!! \App\Helpers\ProductHelper::getProductBadge($product_licb) !!}
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="{{ asset('product/'.$product_licb->slug) }}">{{ $product_licb->designation }}</a></h2>

                                                <div class="product-price mt-10">
                                                    @if($product_licb->getPricePromo())
                                                    <span>{{ number_format($product_licb->getPricePromo() ,2) }} Da</span>
                                                    <span class="old-price">{{ number_format($product_licb->getPrice() ,2) }} Da</span>
                                                    @else
                                                    <span>{{ number_format($product_licb->getPrice(),2) }} Da</span>
                                                    @endif
                                                </div>
                                                <!--
                                                <div class="sold mt-15 mb-15">
                                                    <div class="progress mb-5">
                                                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span class="font-xs text-heading"> Sold: 90/120</span>
                                                </div>
                                                -->
                                              </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--End tab-pane-->

                         </div>
                        <!--End tab-content-->
                    </div>
                    <!--End Col-lg-9-->
                </div>
            </div>
        </section>
        <!--End Best Sales-->
        <section class="section-padding pb-5">
            <div class="container">
                <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
                    <h3 class="">Deals Of The Day</h3>
                    <a class="show-all" href="shop-grid-right.html">
                        All Deals
                        <i class="fi-rs-angle-right"></i>
                    </a>
                </div>
                <div class="row">

                    @foreach($last_products->take(4) as $last_product)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="{{ asset('product/'.$last_product->slug) }}">
                                            @if(optional($last_product->images->first())->lien)
                                            <img src="{{ asset('storage/images/products/'.$last_product->images[0]->lien) }}" alt="" />
                                            @endif

                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="{{ asset('product/'.$last_product->slug) }}">{{$last_product->designation}}</a></h2>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">LICB+</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>2.500 Da</span>
                                                <span class="old-price">3.500 Da</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Acheter </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!--End Deals-->
        <section class="section-padding mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <h4 class="section-title style-1 mb-30 animated animated">Top Selling</h4>
                        <div class="product-list-small animated animated">
                            @foreach ($last_products->take(3) as $last_product)
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="{{ asset('product/'.$last_product->slug) }}">
                                            @if(optional($last_product->images->first())->lien)
                                            <img src="{{ asset('storage/images/products/'.$last_product->images[0]->lien) }}" alt="" /></a>
                                            @endif
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="{{ asset('product/'.$last_product->slug) }}">{{$last_product->designation}}</a>
                                        </h6>
                                        <div class="product-price">
                                            @if($last_product->getPricePromo())
                                            <span>{{ number_format($last_product->getPricePromo() ,2) }} Da</span>
                                            <span class="old-price">{{ number_format($last_product->getPrice() ,2) }} Da</span>
                                            @else
                                            <span>{{ number_format($last_product->getPrice(),2) }} Da</span>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                                @endforeach

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <h4 class="section-title style-1 mb-30 animated animated">Trending Products</h4>
                        <div class="product-list-small animated animated">
                            @foreach($new_products as $new_product)
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="{{ asset('product/'.$new_product->slug) }}">
                                        @if(optional($new_product->images->first())->lien)
                                        <img src="{{ asset('storage/images/products/'.$new_product->images[0]->lien) }}" alt="" /></a>
                                        @endif

                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="{{ asset('product/'.$new_product->slug) }}">{{ $new_product->designation }}</a>
                                    </h6>

                                    <div class="product-price">
                                        @if($new_product->getPricePromo())
                                        <span>{{ number_format($new_product->getPricePromo() ,2) }} Da</span>
                                        <span class="old-price">{{ number_format($new_product->getPrice() ,2) }} Da</span>
                                        @else
                                        <span>{{ number_format($new_product->getPrice(),2) }} Da</span>
                                        @endif
                                    </div>
                                </div>
                            </article>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                        <div class="product-list-small animated animated">
                            @foreach($new_products as $new_product)
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="{{ asset('product/'.$new_product->slug) }}">
                                        @if(optional($new_product->images->first())->lien)
                                        <img src="{{ asset('storage/images/products/'.$new_product->images[0]->lien) }}" alt="" /></a>
                                        @endif

                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="{{ asset('product/'.$new_product->slug) }}">{{ $new_product->designation }}</a>
                                    </h6>

                                    <div class="product-price">
                                        @if($new_product->getPricePromo())
                                        <span>{{ number_format($new_product->getPricePromo() ,2) }} Da</span>
                                        <span class="old-price">{{ number_format($new_product->getPrice() ,2) }} Da</span>
                                        @else
                                        <span>{{ number_format($new_product->getPrice(),2) }} Da</span>
                                        @endif
                                    </div>
                                </div>
                            </article>
                            @endforeach


                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <h4 class="section-title style-1 mb-30 animated animated">Top Rated</h4>
                        <div class="product-list-small animated animated">
                            @foreach($new_products as $new_product)
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="{{ asset('product/'.$new_product->slug) }}">
                                        @if(optional($new_product->images->first())->lien)
                                        <img src="{{ asset('storage/images/products/'.$new_product->images[0]->lien) }}" alt="" /></a>
                                        @endif

                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="{{ asset('product/'.$new_product->slug) }}">{{ $new_product->designation }}</a>
                                    </h6>

                                    <div class="product-price">
                                        @if($new_product->getPricePromo())
                                        <span>{{ number_format($new_product->getPricePromo() ,2) }} Da</span>
                                        <span class="old-price">{{ number_format($new_product->getPrice() ,2) }} Da</span>
                                        @else
                                        <span>{{ number_format($new_product->getPrice(),2) }} Da</span>
                                        @endif
                                    </div>
                                </div>
                            </article>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End 4 columns-->
    </main>
@endsection
