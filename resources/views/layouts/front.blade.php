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


    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/5.0.0/css/fixedColumns.dataTables.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/2.0.0/css/select.dataTables.css"/>
    <link rel="stylesheet" href="{{ asset('plugins/star-rating-svg.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />


</head>
<style>
    .primary-color{
        color: #CE0000 !important;
    }

    .li-color-selected{
        border: 1px solid red!important;
    }
    .color-categories li:hover{
        border: 1px solid #000!important;
        border-radius: 15%;
    }
    .alert-success-licb{
        color: #CE0000;
        background-color: #ffffff;
        border-color: #CE0000;
    }

    .account-drap{
        height: 50px!important;
    }

    .btn-signin{
        font-size: 14px!important;
    }
    .banner-icon img{
        max-width: 60px ! important;
    }

    .dropdown-hover-all .dropdown-menu, .dropdown-hover > .dropdown-menu.dropend { margin-left:-1px !important }

    .dropdown-item{
        padding: .6rem 1rem !important;
    }

    .btn-primary:focus{
        border: solid 1px #CE0000 !important;
        background-color: #CE0000!important;
    }

    .btn-primary:hover{
        border: solid 1px #e70000 !important;
        background-color: #e70000!important;
    }

    .banner-slider .banner-img {
            position: relative;
        }
        .banner-slider .banner-img img {
            width: 100%;
            display: block;
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
        <div class="header-top header-top-ptb-1 d-none d-lg-block " style="background-color: #CE0000">
            <div class="container">
                <div class="row align-items-center d-flex justify-content-center">
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block" style="color: #ffffff">
                                <ul>
                                    <li>Welcome to our new platform !</li>
                                    <li>Earn points with every purchase, unique loyalty system</li>
                                    <li>Experience real-time order tracking, a first for IT platforms</li>
                                    <li>Our intelligent PC builder ensures guaranteed compatibility</li>
                                    <li>Support available 24/7, 7 days a week</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{asset('/')}}"><img src="{{asset('front/logo-white.png')}}" alt="logo" /></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2 d-flex justify-content-start">
                            <form method="GET" action="{{ route('search') }}">
                            <input type="text"  name="search_term" value="{{ $search_term }}" placeholder="Search a product, brand, category..." />
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">

                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{ asset('/carts') }}">
                                        <img alt="Nest" src="{{asset('front/assets/imgs/theme/icons/icon-cart.png')}}" />
                                        <span class="pro-count blue nbr_product">{{$cartData['nbr_cartitem']}}</span>
                                    </a>
                                    <a href="{{ asset('/carts') }}"><span class="lable">Cart</span></a>
                                    @if($cartData['nbr_cartitem'] > 0)
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2  ">
                                            <ul class="cart-list">
                                            @foreach($cartData['cartitems'] as $cartitem)
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
                                                    <h4>Total <span class="total">{{number_format($cartData['total']->sum)}} Da</span></h4>
                                                </div>
                                                <div class="shopping-cart-button">
                                                    <a href="{{asset('/carts')}}" class="outline">Voir le panier</a>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 cart-empty ">
                                            <div class="d-flex justify-content-center">
                                               <p style="font-size: 20px;"> your cart is empty </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="header-action-icon-2">
                                    @if(Auth::user())
                                        @if(Auth::user()->type == 'customer')
                                        <a href="{{ asset('/customer') }}">
                                            <img class="svgInject" alt="Nest" src="{{asset('front/assets/imgs/theme/icons/icon-user.png')}}" />
                                        </a>
                                        <a href="{{ asset('/customer') }}"><span class="lable ml-0">{{ucfirst(Auth::user()->last_name)}}</span></a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="{{ asset('/customer') }}"><i class="fi fi-rs-user mr-10"></i>Dashboard</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/tracking') }}"><i class="fi fi-rs-location-alt mr-10"></i>Suivi de commande</a>
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
                                        @elseif(Auth::user()->type == 'admin')
                                        <a href="{{ asset('/customer') }}">
                                            <img class="svgInject" alt="Nest" src="{{asset('front/assets/imgs/theme/icons/icon-user.png')}}" />
                                        </a>
                                        <a href="{{ asset('/customer') }}"><span class="lable ml-0">{{ucfirst(Auth::user()->last_name)}}</span></a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="{{ asset('/admin') }}"><i class="fi fi-rs-user mr-10"></i>Dashboard</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fi fi-rs-settings-sliders mr-10"></i>Paramètres</a>
                                                </li>
                                            </ul>
                                        </div>
                                        @endif
                                    @else
                                    <a href="{{ asset('/login') }}">
                                        <img class="svgInject" alt="Nest" src="{{asset('front/assets/imgs/theme/icons/icon-user.png')}}" />
                                    </a>
                                    <a href="{{ asset('/login') }}"><span class="lable ml-0">Account</span></a>

                                    <div class="cart-dropdown-wrap ">
                                        <div class="text-center mb-4">
                                            <p>Already have an account?</p>
                                        </div>

                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                              <input type="text" class="form-control account-drap" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                                            </div>
                                            <div class="form-group">
                                              <input type="password" class="form-control account-drap" name="password" id="exampleInputPassword1" placeholder="Password" required>
                                            </div>
                                            <div class="text-center">
                                                <a href="#"> <small> Forgot your password? </small></a>
                                            </div>
                                            <div class="d-flex justify-content-center mt-2">
                                                <button type="submit" class="btn btn-primary btn-signin">Sign in</button>
                                            </div>

                                        </form>

                                        <div class="text-center mt-2">
                                            <p>new customer ? <a href="#"> create an account </a></p>
                                        </div>
                                    </div>

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

                        <div class="dropdown me-4">
                            <button class="btn btn-primary dropdown-toggle" style="font-size: 18px" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fi-rs-apps "></span>
                                Categories
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach ($categories as $category)

                                    @if ($category->children->isNotEmpty())
                                        <div class="dropdown dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->designation }}</a>
                                            <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                                @include('children', ['children' => $category->children])
                                            </div>
                                        </div>
                                    @else
                                        <a class="dropdown-item" href="{{ asset('category/'.$category->slug) }}">{{ $category->designation }}</a>
                                    @endif

                                @endforeach
                            </div>
                        </div>

                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>
                                    <li class="hot-deals"><img src="{{asset('front/assets/imgs/theme/icons/icon-hot.png')}}" alt="hot deals" /><a href="#">Promo</a></li>
                                    <li class="hot-deals"><img src="{{asset('front/assets/imgs/theme/icons/icon-builder.png')}}" alt="hot deals" /><a href="#">PC Builder</a></li>
                                    <li class="hot-deals"><img src="{{asset('front/assets/imgs/theme/icons/icon-tracking.png')}}" alt="hot deals" /><a href="{{ asset('/tracking') }}">Tracking</a></li>
                                    <li class="hot-deals"><img src="{{asset('front/assets/imgs/theme/icons/icon-tutoriel.png')}}" alt="hot deals" /><a href="#">Tutoriel</a></li>
                                    <li class="hot-deals"><img src="{{asset('front/assets/imgs/theme/icons/icon-about.png')}}" alt="hot deals" /><a href="#">About Us</a></li>
                                    <li class="hot-deals"><img src="{{asset('front/assets/imgs/theme/icons/icon-help.png')}}" alt="hot deals" /><a href="#">Help Center</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-flex">
                        <img src="{{asset('front/assets/imgs/theme/icons/icon-headphone.png')}}" alt="hotline" />
                        <p>0797 428 910<span style="color: #797979">Need help? Call Us </span></p>
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
                                    <span class="pro-count white">{{$cartData['nbr_cartitem']}}</span>
                                </a>
                                @if($cartData['nbr_cartitem'] > 0)
                                <div class="cart-dropdown-wrap cart-dropdown-hm2  ">
                                    <ul class="cart-list">
                                    @foreach($cartData['cartitems'] as $cartitem)
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
                                            <h4>Total <span class="total">{{number_format($cartData['total']->sum)}} Da</span></h4>
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
        <section class="featured section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <div class="banner-icon">
                                <img src="{{asset('front/assets/imgs/theme/icons/icon-1.png')}}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Competitive Prices</h3>
                                <p>Save big on all your tech needs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <div class="banner-icon">
                                <img src="{{asset('front/assets/imgs/theme/icons/icon-2.png')}}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Fast <br> Delivery</h3>
                                <p>Anywhere in Algeria</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            <div class="banner-icon">
                                <img src="{{asset('front/assets/imgs/theme/icons/icon-3.png')}}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Loyalty Rewards</h3>
                                <p>Earn points with every purchase </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                            <div class="banner-icon">
                                <img src="{{asset('front/assets/imgs/theme/icons/icon-4.png')}}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Customer Service</h3>
                                <p>From start to finish.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <div class="banner-icon">
                                <img src="{{asset('front/assets/imgs/theme/icons/icon-5.png')}}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Easy <br> returns</h3>
                                <p>Exchanges or refunds</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
       <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row ">
                    <div class="col d-flex justify-content-center">
                        <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <div class="logo ">
                                <a href="#" ><img src="{{asset('front/logo.png')}}" alt="logo" /></a> <br>

                            </div>
                           {{-- <ul class="contact-infor">
                                <li><span>B1 N°1 Salef el Adraa En face Djezzy (Kiffane)Tlemcen, Algérie</span></li>
                                <li><span>0797 428 910</span></li>
                                <li>contactg@licbplus.com</span></li>

                            </ul>--}}
                        </div>




                    </div>

                </div>

                <div class="row d-flex justify-content-center">
                     <div class="col-md-8 text-center">
                        <p>"LICB, a leading provider in information technology, communication, and office equipment, offers a comprehensive range of computer hardware solutions. With a focus on quality and innovation, we strive to meet the diverse needs of our customers in the ever-evolving technological landscape."</p>
                     </div>
                </div>
        </section>

        <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
            <div class="row align-items-center">
                <div class="col-12 mb-30">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <p class="font-sm mb-0">&copy; 2024, <strong class="text-brand">LICB+</strong> Dev team </p>
                </div>
                <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                    <div class="hotline d-lg-inline-flex mr-30" style="min-width: 250px;">
                        <img src="{{asset('front/assets/imgs/theme/icons/phone-call.svg')}}" alt="hotline" />
                        <p>0797 428 910<span>Need help? Call Us now ! </span></p>
                    </div>

                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                    <div class="mobile-social-icon">
                        <h6>Follow us !</h6>
                        <a href="#"><img src="{{asset('front/assets/imgs/theme/icons/icon-facebook-white.svg')}}" alt="" /></a>
                        <a href="#"><img src="{{asset('front/assets/imgs/theme/icons/icon-instagram-white.svg')}}" alt="" /></a>
                        <a href="#"><img src="{{asset('front/assets/imgs/theme/icons/icon-youtube-white.svg')}}" alt="" /></a>
                    </div>
                    <p class="font-sm">Stay connected with our latest updates and exciting content</p>
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
    <script src="{{ asset('front/assets/js/plugins/slider-range.js') }}"></script>
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


    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.0/js/dataTables.fixedColumns.js"></script>
    <script src="https://cdn.datatables.net/select/2.0.0/js/dataTables.select.js"></script>

    <script type="text/javascript" src="{{ asset('plugins/jquery.star-rating-svg.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

   <script>
    $('.banner-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true, // Désactivez temporairement l'effet de transition
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 2000,
    });
   </script>

	<script>
        $(".my-rating").starRating({
			starSize: 25,
			initialRating: 3.5,
		});

		let rate =$('#rate-result').val();

		$(".rating-result").starRating({
			starSize: 25,
			initialRating: rate,
            readOnly: true
		});
    </script>


</script>


<script>
    (function($bs) {
    const CLASS_NAME = 'has-child-dropdown-show';
    $bs.Dropdown.prototype.toggle = function(_orginal) {
        return function() {
            document.querySelectorAll('.' + CLASS_NAME).forEach(function(e) {
                e.classList.remove(CLASS_NAME);
            });
            let dd = this._element.closest('.dropdown').parentNode.closest('.dropdown');
            for (; dd && dd !== document; dd = dd.parentNode.closest('.dropdown')) {
                dd.classList.add(CLASS_NAME);
            }
            return _orginal.call(this);
        }
    }($bs.Dropdown.prototype.toggle);

    document.querySelectorAll('.dropdown').forEach(function(dd) {
        dd.addEventListener('hide.bs.dropdown', function(e) {
            if (this.classList.contains(CLASS_NAME)) {
                this.classList.remove(CLASS_NAME);
                e.preventDefault();
            }
            e.stopPropagation(); // do not need pop in multi level mode
        });
    });

    // for hover
    document.querySelectorAll('.dropdown-hover, .dropdown-hover-all .dropdown').forEach(function(dd) {
        dd.addEventListener('mouseenter', function(e) {
            let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
            if (!toggle.classList.contains('show')) {
                $bs.Dropdown.getOrCreateInstance(toggle).toggle();
                dd.classList.add(CLASS_NAME);
                $bs.Dropdown.clearMenus();
            }
        });
        dd.addEventListener('mouseleave', function(e) {
            let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
            if (toggle.classList.contains('show')) {
                $bs.Dropdown.getOrCreateInstance(toggle).toggle();
            }
        });
    });
})(bootstrap);

</script>




    @stack('get-price-script')
    @stack('add-cart-scripts')
    @stack('delete-item')
    @stack('select-color-indice')
    @stack('get-price-product-added-script')
    @stack('shipping-script')
    @stack('checkout-registration')
    @stack('pc-builder-scripts')
    @stack('filter-product')
    @stack('comment-scripts')
    @stack('filter-product-by-subcategories')
</body>

</html>
