@extends('layouts.front')
@section('content')

<main class="main">
        <section class="home-slider position-relative mb-30">
            <div class="container">
                <div class="home-slide-cover mt-30">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                        <div class="single-hero-slider single-animation-wrap" style="background-image: url(front/assets/imgs/slider/slider-0.jpg)">
                            <div class="slider-content">
                                <h1 class="text-white" style="font-size: 50px; line-height:40px">
                                     GAMING ACCESSORIES
                                </h1>
                                <h1 class=" mb-40 mt-3 text-white" style="font-size: 30px;">
                                    Promo with free shipping
                                </h1>
                                    <button class="btn" type="submit">Enjoy !</button>
                            </div>
                        </div>

                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </div>
        </section>
        <!--End hero slider-->
        <section class="popular-categories section-padding">
            <div class="container wow animate__animated animate__fadeIn">
                <div class="section-title">
                    <div class="title">
                        <h3>Categories</h3>
                    </div>
                    <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
                </div>
                <div class="carausel-10-columns-cover position-relative">
                    <div class="carausel-10-columns" id="carausel-10-columns">
                        @foreach($categories as $category)
                            <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="shop-grid-right.html"><img src="{{ asset('front/assets/imgs/shop/cat-13.png') }}" alt="" /></a>
                                </figure>
                                <h6><a href="shop-grid-right.html">{{ $category->designation }}</a></h6>
                                <span>10 produits</span>
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
                        <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <img src="{{ asset('front/assets/imgs/banner/banner-1.png') }}" alt="" />
                            <div class="banner-text">
                                <h4 class="text-white">
                                    LICB+ <br />
                                    Gaming PC
                                </h4>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            <img src="{{ asset('front/assets/imgs/banner/banner-2.png') }}" alt="" />
                            <div class="banner-text">
                                <h4 class="text-white">
                                    LICB+ <br />
                                    Gaming PC
                                </h4>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <img src="{{ asset('front/assets/imgs/banner/banner-3.png') }}" alt="" />
                            <div class="banner-text">
                                <h4 class="text-white">
                                    LICB+ <br />
                                    Gaming PC
                                </h4>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
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
                    <h3>Nouveautés</h3>
                    <ul class="nav nav-tabs links" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Périphérique PC</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Composants PC</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">PC</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-four" data-bs-toggle="tab" data-bs-target="#tab-four" type="button" role="tab" aria-controls="tab-four" aria-selected="false">Connectique</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-five" data-bs-toggle="tab" data-bs-target="#tab-five" type="button" role="tab" aria-controls="tab-five" aria-selected="false">Projection</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-six" data-bs-toggle="tab" data-bs-target="#tab-six" type="button" role="tab" aria-controls="tab-six" aria-selected="false">Téléphonie</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-seven" data-bs-toggle="tab" data-bs-target="#tab-seven" type="button" role="tab" aria-controls="tab-seven" aria-selected="false">Logiciels</button>
                        </li>
                    </ul>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @foreach($last_products as $last_product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ asset('product/'.$last_product->slug) }}">
                                                @if($last_product->images)
                                                <img class="default-img" src="{{ asset('storage/images/products/'.$last_product->images[0]->lien) }}" alt="" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Ajouter au favoris" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Voir le produit" class="action-btn" data-bs-toggle="modal" href="{{ asset('product/'.$last_product->slug) }}" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">New</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">

                                        <h2><a href="{{ asset('product/'.$last_product->slug) }}">{{ $last_product->designation }}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                @if($last_product->getPricePromo())
                                                <span>{{ number_format($last_product->getPricePromo() ,2) }} Da</span>
                                                <span class="old-price">{{ number_format($last_product->getPrice() ,2) }} Da</span>
                                                @else
                                                <span>{{ number_format($last_product->getPrice(),2) }} Da</span>
                                                @endif
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="{{ asset('product/'.$last_product->slug) }}">Voir plus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab one-->
                    <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                        <div class="row product-grid-4">
                            @foreach($last_products as $last_product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ asset('product/'.$last_product->slug) }}">
                                                @if($last_product->images)
                                                <img class="default-img" src="{{ asset('storage/images/products/'.$last_product->images[0]->lien) }}" alt="" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Ajouter au favoris" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Voir le produit" class="action-btn" data-bs-toggle="modal" href="{{ asset('product/'.$last_product->slug) }}" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">New</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">

                                        <h2><a href="{{ asset('product/'.$last_product->slug) }}">{{ $last_product->designation }}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                @if($last_product->getPricePromo())
                                                <span>{{ number_format($last_product->getPricePromo() ,2) }} Da</span>
                                                <span class="old-price">{{ number_format($last_product->getPrice() ,2) }} Da</span>
                                                @else
                                                <span>{{ number_format($last_product->getPrice(),2) }} Da</span>
                                                @endif
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="{{ asset('product/'.$last_product->slug) }}">Voir plus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab two-->
                    <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                        <div class="row product-grid-4">
                            @foreach($last_products as $last_product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ asset('product/'.$last_product->slug) }}">
                                                @if($last_product->images)
                                                <img class="default-img" src="{{ asset('storage/images/products/'.$last_product->images[0]->lien) }}" alt="" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Ajouter au favoris" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Voir le produit" class="action-btn" data-bs-toggle="modal" href="{{ asset('product/'.$last_product->slug) }}" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">New</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">

                                        <h2><a href="{{ asset('product/'.$last_product->slug) }}">{{ $last_product->designation }}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                @if($last_product->getPricePromo())
                                                <span>{{ number_format($last_product->getPricePromo() ,2) }} Da</span>
                                                <span class="old-price">{{ number_format($last_product->getPrice() ,2) }} Da</span>
                                                @else
                                                <span>{{ number_format($last_product->getPrice(),2) }} Da</span>
                                                @endif
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="{{ asset('product/'.$last_product->slug) }}">Voir plus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab three-->
                    <div class="tab-pane fade" id="tab-four" role="tabpanel" aria-labelledby="tab-four">
                        <div class="row product-grid-4">
                            @foreach($last_products as $last_product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ asset('product/'.$last_product->slug) }}">
                                                @if($last_product->images)
                                                <img class="default-img" src="{{ asset('storage/images/products/'.$last_product->images[0]->lien) }}" alt="" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Ajouter au favoris" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Voir le produit" class="action-btn" data-bs-toggle="modal" href="{{ asset('product/'.$last_product->slug) }}" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">New</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">

                                        <h2><a href="{{ asset('product/'.$last_product->slug) }}">{{ $last_product->designation }}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                @if($last_product->getPricePromo())
                                                <span>{{ number_format($last_product->getPricePromo() ,2) }} Da</span>
                                                <span class="old-price">{{ number_format($last_product->getPrice() ,2) }} Da</span>
                                                @else
                                                <span>{{ number_format($last_product->getPrice(),2) }} Da</span>
                                                @endif
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="{{ asset('product/'.$last_product->slug) }}">Voir plus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab four-->
                    <div class="tab-pane fade" id="tab-five" role="tabpanel" aria-labelledby="tab-five">
                        <div class="row product-grid-4">
                            @foreach($last_products as $last_product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ asset('product/'.$last_product->slug) }}">
                                                @if($last_product->images)
                                                <img class="default-img" src="{{ asset('storage/images/products/'.$last_product->images[0]->lien) }}" alt="" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Ajouter au favoris" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Voir le produit" class="action-btn" data-bs-toggle="modal" href="{{ asset('product/'.$last_product->slug) }}" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">New</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">

                                        <h2><a href="{{ asset('product/'.$last_product->slug) }}">{{ $last_product->designation }}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                @if($last_product->getPricePromo())
                                                <span>{{ number_format($last_product->getPricePromo() ,2) }} Da</span>
                                                <span class="old-price">{{ number_format($last_product->getPrice() ,2) }} Da</span>
                                                @else
                                                <span>{{ number_format($last_product->getPrice(),2) }} Da</span>
                                                @endif
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="{{ asset('product/'.$last_product->slug) }}">Voir plus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab five-->
                    <div class="tab-pane fade" id="tab-six" role="tabpanel" aria-labelledby="tab-six">
                        <div class="row product-grid-4">
                            @foreach($last_products as $last_product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ asset('product/'.$last_product->slug) }}">
                                                @if($last_product->images)
                                                <img class="default-img" src="{{ asset('storage/images/products/'.$last_product->images[0]->lien) }}" alt="" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Ajouter au favoris" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Voir le produit" class="action-btn" data-bs-toggle="modal" href="{{ asset('product/'.$last_product->slug) }}" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">New</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">

                                        <h2><a href="{{ asset('product/'.$last_product->slug) }}">{{ $last_product->designation }}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                @if($last_product->getPricePromo())
                                                <span>{{ number_format($last_product->getPricePromo() ,2) }} Da</span>
                                                <span class="old-price">{{ number_format($last_product->getPrice() ,2) }} Da</span>
                                                @else
                                                <span>{{ number_format($last_product->getPrice(),2) }} Da</span>
                                                @endif
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="{{ asset('product/'.$last_product->slug) }}">Voir plus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab six-->
                    <div class="tab-pane fade" id="tab-seven" role="tabpanel" aria-labelledby="tab-seven">
                        <div class="row product-grid-4">
                            @foreach($last_products as $last_product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ asset('product/'.$last_product->slug) }}">
                                                @if($last_product->images)
                                                <img class="default-img" src="{{ asset('storage/images/products/'.$last_product->images[0]->lien) }}" alt="" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Ajouter au favoris" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Voir le produit" class="action-btn" data-bs-toggle="modal" href="{{ asset('product/'.$last_product->slug) }}" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">New</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">

                                        <h2><a href="{{ asset('product/'.$last_product->slug) }}">{{ $last_product->designation }}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                @if($last_product->getPricePromo())
                                                <span>{{ number_format($last_product->getPricePromo() ,2) }} Da</span>
                                                <span class="old-price">{{ number_format($last_product->getPrice() ,2) }} Da</span>
                                                @else
                                                <span>{{ number_format($last_product->getPrice(),2) }} Da</span>
                                                @endif
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="{{ asset('product/'.$last_product->slug) }}">Voir plus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab seven-->
                </div>
                <!--End tab-content-->
            </div>
        </section>
        <!--Products Tabs-->
        <section class="section-padding pb-5">
            <div class="container">
                <div class="section-title wow animate__animated animate__fadeIn">
                    <h3 class="">Produits</h3>
                    <ul class="nav nav-tabs links" id="myTab-2" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one-1" data-bs-toggle="tab" data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Populaire</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-two-1" data-bs-toggle="tab" data-bs-target="#tab-two-1" type="button" role="tab" aria-controls="tab-two" aria-selected="false">nouveau ajouté</button>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                        <div class="banner-img style-2">
                            <div class="banner-text">
                                <h2 class="mb-100 text-white">Discover new Redragon products</h2>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                        <div class="tab-content" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                                <div class="carausel-4-columns-cover arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                        @foreach($products as $product)
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html">

                                                        <img class="default-img" src="{{ asset('storage/images/products/'.$product->images[0]->lien) }}" alt="" />
                                                        <img class="hover-img" src="{{ asset('storage/images/products/'.$product->images[0]->lien) }}" alt="" />

                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                @if($product->mark)
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">{{ $product->mark->designation }}</a>
                                                </div>
                                                @endif
                                                <h2><a href="shop-product-right.html">{{ $product->designation }}</a></h2>
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 80%"></div>
                                                </div>
                                                <div class="product-price mt-10">
                                                    @if($last_product->getPricePromo())
                                                    <span>{{ number_format($last_product->getPricePromo() ,2) }} Da</span>
                                                    <span class="old-price">{{ number_format($last_product->getPrice() ,2) }} Da</span>
                                                    @else
                                                    <span>{{ number_format($last_product->getPrice(),2) }} Da</span>
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
                                                <a href="shop-cart.html" class="btn w-100 hover-up">Voir le produit</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--End tab-pane-->
                            <div class="tab-pane fade" id="tab-two-1" role="tabpanel" aria-labelledby="tab-two-1">
                                <div class="carausel-4-columns-cover arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-2-arrows"></div>
                                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-2">
                                        @foreach($products as $product)
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html">

                                                        <img class="default-img" src="{{ asset('storage/images/products/'.$product->images[0]->lien) }}" alt="" />
                                                        <img class="hover-img" src="{{ asset('storage/images/products/'.$product->images[0]->lien) }}" alt="" />

                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                @if($product->mark)
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">{{ $product->mark->designation }}</a>
                                                </div>
                                                @endif
                                                <h2><a href="shop-product-right.html">{{ $product->designation }}</a></h2>
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 80%"></div>
                                                </div>
                                                <div class="product-price mt-10">
                                                    @if($last_product->getPricePromo())
                                                    <span>{{ number_format($last_product->getPricePromo() ,2) }} Da</span>
                                                    <span class="old-price">{{ number_format($last_product->getPrice() ,2) }} Da</span>
                                                    @else
                                                    <span>{{ number_format($last_product->getPrice(),2) }} Da</span>
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
                                                <a href="shop-cart.html" class="btn w-100 hover-up">Voir le produit</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
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
                                        <a href="#">
                                            <img src="{{ asset('storage/images/products/'.$last_product->images[0]->lien) }}" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="shop-product-right.html">{{$last_product->designation}}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
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
                                        <a href="shop-product-right.html"><img src="{{ asset('storage/images/products/'.$last_product->images[0]->lien) }}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="#">{{$last_product->designation}}</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
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
                                    <a href="shop-product-right.html"><img  src="{{ asset('storage/images/products/'.$last_product->images[0]->lien) }}" alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">{{ $new_product->designation }}</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
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
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                        <div class="product-list-small animated animated">
                            @foreach($new_products as $new_product)
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img  src="{{ asset('storage/images/products/'.$last_product->images[0]->lien) }}" alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">{{ $new_product->designation }}</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
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
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <h4 class="section-title style-1 mb-30 animated animated">Top Rated</h4>
                        <div class="product-list-small animated animated">
                            @foreach($new_products as $new_product)
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img  src="{{ asset('storage/images/products/'.$last_product->images[0]->lien) }}"  alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">{{ $new_product->designation }}</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
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
                </div>
            </div>
        </section>
        <!--End 4 columns-->
    </main>
@endsection
