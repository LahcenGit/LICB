<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Licb+ - Leader Informatique, Communication</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dashboard/images/favicon.png')}}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/vendors/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front/assets/css/main.css?v=5.5')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
</head>
<style>
    .primary-color{
        color: #BC221A !important;
    }

    .li-color-selected{
        border: 1px solid red!important;
    }
    .color-categories li:hover{
        border: 1px solid #000!important;
        border-radius: 15%;
    }
    .alert-success-licb{
        color: #BC221A;
        background-color: #ffffff;
        border-color: #BC221A;
    }
</style>
<body>
    <!-- Modal -->

    <!-- Quick view -->
    <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="{{asset('front/assets/imgs/shop/product-16-2.jpg')}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('front/assets/imgs/shop/product-16-1.jpg')}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('front/assets/imgs/shop/product-16-3.jpg')}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('front/assets/imgs/shop/product-16-4.jpg')}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('front/assets/imgs/shop/product-16-5.jpg')}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('front/assets/imgs/shop/product-16-6.jpg')}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('front/assets/imgs/shop/product-16-7.jpg')}}" alt="product image" />
                                    </figure>
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails">
                                    <div><img src="{{asset('front/assets/imgs/shop/thumbnail-3.jpg')}}" alt="product image" /></div>
                                    <div><img src="{{asset('front/assets/imgs/shop/thumbnail-4.jpg')}}" alt="product image" /></div>
                                    <div><img src="{{asset('front/assets/imgs/shop/thumbnail-5.jpg')}}" alt="product image" /></div>
                                    <div><img src="{{asset('front/assets/imgs/shop/thumbnail-6.jpg')}}" alt="product image" /></div>
                                    <div><img src="{{asset('front/assets/imgs/shop/thumbnail-7.jp')}}g" alt="product image" /></div>
                                    <div><img src="{{asset('front/assets/imgs/shop/thumbnail-8.jpg')}}" alt="product image" /></div>
                                    <div><img src="{{asset('front/assets/imgs/shop/thumbnail-9.jpg')}}" alt="product image" /></div>
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <span class="stock-status out-stock"> Sale Off </span>
                                <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">Seeds of Change Organic Quinoa, Brown</a></h3>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">$38</span>
                                        <span>
                                            <span class="save-price font-md color3 ml-15">26% Off</span>
                                            <span class="old-price font-md ml-15">$52</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="detail-extralink mb-30">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <input type="text" name="quantity" class="qty-val" value="1" min="1">
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                                <div class="font-xs">
                                    <ul>
                                        <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                        <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2022</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="header-area header-style-1 header-height-2">
        <div class="mobile-promotion">
            <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
        </div>
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li><a href="#">Livraison</a></li>
                                <li><a href="#">Mon compte</a></li>
                                <li><a href="#">Favoris</a></li>
                                <li><a href="#">Suivi de commande</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>100% Secure delivery without contacting the courier</li>
                                    <li>Supper Value Deals - Save more with coupons</li>
                                    <li>Trendy 25silver jewelry, save up 35% off today</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>
                                <li>Besoin d'aide ? : <strong class="text-brand"> 043 267 669</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="#"><img src="{{asset('front/logo.png')}}" alt="logo" /></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="#">
                                <select class="select-active">
                                    @foreach($categories as $category)
                                    <option>{{ $category->designation }}</option>
                                    @endforeach
                                </select>
                                <input type="text" placeholder="Je cherche sur..." />
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                             <div class="header-action-icon-2">
                                    <a href="#">
                                        <img class="svgInject" alt="Nest" src="{{asset('front/assets/imgs/theme/icons/icon-heart.svg')}}" />
                                        <span class="pro-count blue">6</span>
                                    </a>
                                    <a href="#"><span class="lable">Favoris</span></a>
                                </div>

                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{ asset('/carts') }}">
                                        <img alt="Nest" src="{{asset('front/assets/imgs/theme/icons/icon-cart.svg')}}" />
                                        <span class="pro-count blue nbr_product">{{$nbr_cartitem}}</span>
                                    </a>
                                    <a href="{{ asset('/carts') }}"><span class="lable">Panier</span></a>
                                    @if($nbr_cartitem > 0)
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2  ">
                                            <ul class="cart-list">
                                            @foreach($cartitems as $cartitem)
                                                <li  id="list{{$cartitem->id}}">
                                                    <div class="shopping-cart-img">
                                                        <a href="shop-product-right.html"><img alt="Nest" src="{{asset('storage/images/products/'.$cartitem->getImage()->lien)}}" /></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="shop-product-right.html"></a>{{$cartitem->productline->product->designation}}</h4>
                                                        <h4><span class="qte">{{$cartitem->qte}} × </span> {{number_format($cartitem->price)}} Da</h4>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                    </div>
                                                </li>
                                            @endforeach
                                            </ul>
                                            <div class="shopping-cart-footer">
                                                <div class="shopping-cart-total">
                                                    <h4>Total <span class="total">{{number_format($total->sum)}} Da</span></h4>
                                                </div>
                                                <div class="shopping-cart-button">
                                                    <a href="{{asset('/carts')}}" class="outline">Voir le panier</a>
                                                    <a href="shop-checkout.html">Validation</a>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 cart-empty ">
                                            <div class="d-flex justify-content-center">
                                               <p style="font-size: 20px;">Votre panier est vide </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="header-action-icon-2">
                                    <a href="{{ asset('/admin') }}">
                                        <img class="svgInject" alt="Nest" src="{{asset('front/assets/imgs/theme/icons/icon-user.svg')}}" />
                                    </a>
                                    @if(Auth::user())
                                    <a href="{{ asset('/admin') }}l"><span class="lable ml-0">Compte</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                <a href="{{ asset('/admin') }}"><i class="fi fi-rs-user mr-10"></i>Mon Compte</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fi fi-rs-location-alt mr-10"></i>Suivi de commande</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fi fi-rs-label mr-10"></i>Mon bon</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fi fi-rs-heart mr-10"></i>Mes favoris</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fi fi-rs-settings-sliders mr-10"></i>Paramètres</a>
                                            </li>
                                            <li>
                                                <a href="{{route('logout')}}" class="dropdown-item ai-icon" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fi fi-rs-sign-out mr-10"></i>Déconnexion</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>

                                    @else
                                    <a href="{{ asset('/login') }}"><span class="lable ml-0">Connexion</span></a>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="#"><img src="{{ asset('front/logo.png') }}" alt="logo" /></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categories-button-active" href="#">
                                <span class="fi-rs-apps"></span> <span class="et">Catégories</span>
                                <i class="fi-rs-angle-down"></i>
                            </a>
                            <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        @foreach($first_part_categories as $first_part_category)
                                        <li>
                                            <a href="#">{{ $first_part_category->designation }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <ul class="end">
                                        @foreach($last_part_categories as $last_part_category)
                                        <li>
                                            <a href="#"> {{ $last_part_category->designation }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Voir plus...</span></div>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>
                                    <li class="hot-deals"><img src="{{asset('front/assets/imgs/theme/icons/icon-hot.svg')}}" alt="hot deals" /><a href="#">Promo</a></li>
                                    <li>
                                        <a  href="{{ asset('/login') }}">Accueil </a>

                                    </li>
                                    <li>
                                        <a href="#">Qui sommes-nous?</a>
                                    </li>
                                    <li>
                                        <a href="#">Atelier LICB+</a>
                                    </li>
                                    <li>
                                        <a href="{{ asset('/tracking') }}">Tracking</a>
                                    </li>
                                    <li>
                                        <a href="#">Tutoriel Licb+</a>
                                    </li>
                                    <li>
                                    <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-flex">
                        <img src="{{asset('front/assets/imgs/theme/icons/icon-headphone.svg')}}" alt="hotline" />
                        <p>043 267 669<span>Appelez-Nous</span></p>
                    </div>
                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="#">
                                    <img alt="Nest" src="{{ asset('front/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                    <span class="pro-count white">4</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{ asset('/carts') }}">
                                    <img alt="Nest" src="{{ asset('front/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count white">{{$nbr_cartitem}}</span>
                                </a>
                                @if($nbr_cartitem > 0)
                                <div class="cart-dropdown-wrap cart-dropdown-hm2  ">
                                    <ul class="cart-list">
                                    @foreach($cartitems as $cartitem)
                                        <li  id="list{{$cartitem->id}}">
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Nest" src="{{asset('storage/images/products/'.$cartitem->getImage()->lien)}}" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html"></a>{{$cartitem->productline->product->designation}}</h4>
                                                <h4><span class="qte">{{$cartitem->qte}} × </span> {{number_format($cartitem->price)}} Da</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span class="total">{{number_format($total->sum)}} Da</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{asset('/carts')}}" class="outline">Voir le panier</a>
                                            <a href="shop-checkout.html">Validation</a>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2  ">
                                        <div class="d-flex justify-content-center">
                                        <p style="font-size: 20px;">Votre panier est vide </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="#"><img src="{{asset('front/logo.png')}}" alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Je cherche sur…" />
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li>
                                <a  href="{{ asset('/login') }}">Accueil </a>

                            </li>
                            <li>
                                <a href="#">Qui sommes-nous?</a>
                            </li>
                            <li>
                                <a href="#">Atelier LICB+</a>
                            </li>
                            <li>
                                <a href="#">Tracking</a>
                            </li>
                            <li>
                                <a href="#">Tutoriel Licb+</a>
                            </li>
                            <li>
                            <a href="#">Contact</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-marker"></i>location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-user"></i>Connexion / Inscription </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-headphones"></i>043 267 669 </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-15">Follow Us</h6>
                    <a href="#"><img src="{{asset('front/assets/imgs/theme/icons/icon-facebook-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{asset('front/assets/imgs/theme/icons/icon-instagram-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{asset('front/assets/imgs/theme/icons/icon-youtube-white.svg')}}" alt="" /></a>
                </div>
                <div class="site-copyright">Copyright 2022 © LICB+. </div>
            </div>
        </div>
    </div>
    <!--End header-->
    @yield('content')
    <footer class="main">
        <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="position-relative newsletter-inner">
                            <div class="newsletter-content">
                                <h2 class="mb-20">
                                    Inscrivez-vous  <br />à notre newsletter !

                                </h2>
                                <p class="mb-45">Inscrivez-vous gratuitement à la Newsletter pour bénéficier d'offres spéciales, être informé des nouveautés de  <span class="text-brand">LICB+</span></p>
                                <form class="form-subcriber d-flex">
                                    <input type="email" placeholder="Votre email" />
                                    <button class="btn" type="submit">S'inscrir</button>
                                </form>
                            </div>
                            <img src="{{asset('front/assets/imgs/banner/banner-9.png')}}" alt="newsletter" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="featured section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <div class="banner-icon">
                                <img src="{{asset('front/assets/imgs/theme/icons/icon-1.svg')}}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Best prices & offers</h3>
                                <p>Orders $50 or more</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <div class="banner-icon">
                                <img src="{{asset('front/assets/imgs/theme/icons/icon-2.svg')}}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Free delivery</h3>
                                <p>24/7 amazing services</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            <div class="banner-icon">
                                <img src="{{asset('front/assets/imgs/theme/icons/icon-3.svg')}}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Great daily deal</h3>
                                <p>When you sign up</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                            <div class="banner-icon">
                                <img src="{{asset('front/assets/imgs/theme/icons/icon-4.svg')}}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Wide assortment</h3>
                                <p>Mega Discounts</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <div class="banner-icon">
                                <img src="{{asset('front/assets/imgs/theme/icons/icon-5.svg')}}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Easy returns</h3>
                                <p>Within 30 days</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                            <div class="banner-icon">
                                <img src="{{asset('front/assets/imgs/theme/icons/icon-6.svg')}}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Safe delivery</h3>
                                <p>Within 30 days</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col">
                        <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <div class="logo mb-30">
                                <a href="index.html" class="mb-15"><img src="{{asset('front/logo.png')}}" alt="logo" /></a>

                            </div>
                            <ul class="contact-infor">
                                <li><img src="{{asset('front/assets/imgs/theme/icons/icon-location.svg')}}" alt="" /><span>B1 N°1 Salef el Adraa En face Djezzy (Kiffane)
                                    Tlemcen, Algérie</span></li>
                                <li><img src="{{asset('front/assets/imgs/theme/icons/icon-contact.svg')}}" alt="" /><span>043 267 669</span></li>
                                <li><img src="{{asset('front/assets/imgs/theme/icons/icon-email-2.svg')}}" alt="" />service.marketing@licbplus.com</span></li>
                                <li><img src="{{asset('front/assets/imgs/theme/icons/icon-clock.svg')}}" alt="" /><span>Du samedi au mercredi: de 9h30 à 18h
                                    Jeudi : de 9h30 à 13h30</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <h4 class="widget-title">Services</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="#">Accueil</a></li>
                            <li><a href="#">Qui somme-nous</a></li>
                            <li><a href="#">Atelier licb+</a></li>
                            <li><a href="#">Tracking</a></li>
                            <li><a href="#">Tutoriel licb+</a></li>

                        </ul>
                    </div>
                    <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <h4 class="widget-title">Catégories</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="#">Pc</a></li>
                            <li><a href="#">Composants Pc</a></li>
                            <li><a href="#">Périphérique PC</a></li>
                            <li><a href="#">Imprimante, Scanner et Fax</a></li>
                            <li><a href="#">Consommable</a></li>
                            <li><a href="#">Logiciels</a></li>
                            <li><a href="#">Téléphonie</a></li>
                        </ul>
                    </div>
                </div>
        </section>
        <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
            <div class="row align-items-center">
                <div class="col-12 mb-30">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <p class="font-sm mb-0">&copy; 2022, <strong class="text-brand">LICB+</strong> </p>
                </div>
                <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                    <div class="hotline d-lg-inline-flex mr-30">
                        <img src="{{asset('front/assets/imgs/theme/icons/phone-call.svg')}}" alt="hotline" />
                        <p>043 267 669<span>Du samedi au jeudi <br>de 9h30 à 18h </span></p>
                    </div>

                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                    <div class="mobile-social-icon">
                        <h6>Suivez-nous !</h6>
                        <a href="#"><img src="{{asset('front/assets/imgs/theme/icons/icon-facebook-white.svg')}}" alt="" /></a>
                        <a href="#"><img src="{{asset('front/assets/imgs/theme/icons/icon-instagram-white.svg')}}" alt="" /></a>
                        <a href="#"><img src="{{asset('front/assets/imgs/theme/icons/icon-youtube-white.svg')}}" alt="" /></a>
                    </div>
                    <p class="font-sm">Jusqu'à 15% de réduction sur votre premier abonnement</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Preloader Start -->
    <!--  <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{asset('front/assets/imgs/theme/loading.gif')}}" alt="" />
                </div>
            </div>
        </div>
    </div>-->
    <!-- Vendor JS-->
    <script src="{{asset('front/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('front/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('front/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('front/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/slick.j')}}s"></script>
    <script src="{{asset('front/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/waypoints.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/wow.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/counterup.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/images-loaded.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/isotope.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/jquery.elevatezoom.js')}}"></script>
    <!-- Template  JS -->
    <script src="{{asset('front/assets/js/main.js?v=5.5')}}"></script>
    <script src="{{asset('front/assets/js/shop.js?v=5.5')}}"></script>
    <script src="{{asset('front/assets/js/jquery.number.min.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.number.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @stack('get-price-script')
    @stack('add-cart-scripts')
    @stack('delete-item')
    @stack('select-color-indice')
    @stack('get-price-product-added-script')
    @stack('shipping-script')
</body>

</html>
