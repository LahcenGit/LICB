@extends('layouts.front')
@section('content')

<style>
    .carre {
    width: 40px;
    height: 40px;
    }


    .border {
        border: 1px solid #000000 !important;
    }

    .border:hover{
        border: 1px solid #BC221A !important;
    }

    .li-color-selected{
        border: 1px solid #BC221A !important;
    }

     .summernote-container {
        max-height: auto; /* Définir une hauteur maximale pour le div */
        max-width: auto; /* Définir une largeur maximale pour le div */
        overflow: auto; /* Ajouter des barres de défilement si le contenu dépasse les limites */
        box-sizing: border-box; /* Inclure le padding et la bordure dans les dimensions de l'élément */
    }

    .dropdown-menu .show{
        z-index: 99!important;
    }

    .zoomContainer{
        z-index: 1!important;
    }

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

    .rounded-image {
        border-radius: 10px;
    }

</style>


<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ asset('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    @foreach ($categoryHierarchy as $category)
                        <span></span>
                        <a href="{{ $category->parent ? url('category/' . $category->slug) : url('global-category/' . $category->slug) }}">
                            {{ $category->designation }}
                        </a>
                    @endforeach
                    <span></span>{{ $product->designation }}
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row product-data">
                <div class="col-xl-11 col-lg-12 m-auto">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="product-detail accordion-detail">
                                <div class="row mb-50 mt-30">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                        <div class="detail-gallery">
                                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                            <!-- MAIN SLIDES -->
                                            <div class="product-image-slider">
                                                @if($first_image)
                                                    <figure class="border-radius-10">
                                                    <img src="{{asset('storage/images/products/'.$first_image->lien)}}" alt="product image" />
                                                    </figure>
                                                @endif
                                                @if($variations)
                                                    @if($variations[0]->attribute_image)
                                                        @foreach($variations as $variation)
                                                            <figure class="border-radius-10">
                                                            <img src="{{asset('storage/images/productlines/'.$variation->attribute_image)}}" alt="{{ $variation->attributeLine->value }}" />
                                                            </figure>
                                                        @endforeach
                                                    @endif

                                                    @foreach($secondary_images as $secondary_image)
                                                    <figure class="border-radius-10">
                                                    <img src="{{asset('storage/images/products/'.$secondary_image->lien)}}" alt="product image" />
                                                    </figure>
                                                    @endforeach
                                                @else
                                                    @foreach($secondary_images as $secondary_image)
                                                    <figure class="border-radius-10">
                                                    <img src="{{asset('storage/images/products/'.$secondary_image->lien)}}" alt="product image" />
                                                    </figure>
                                                    @endforeach
                                                @endif

                                            </div>
                                            <!-- THUMBNAILS -->
                                            <div class="slider-nav-thumbnails">
                                                @if($first_image)
                                                    <div ><img src="{{asset('storage/images/products/'.$first_image->lien)}}" alt="product image" /></div>
                                                @endif
                                                @if($variations)
                                                    @if($variations[0]->attribute_image)
                                                        @foreach($variations as $variation)
                                                        <div id="{{'related-img-'.$variation->id}}"><img src="{{asset('storage/images/productlines/'.$variation->attribute_image)}}" alt="product image" /></div>
                                                        @endforeach
                                                   @endif

                                                    @foreach($secondary_images as $img)
                                                    <div id="{{'related-img-'.$img->id}}"><img src="{{asset('storage/images/products/'.$img->lien)}}" alt="product image" /></div>
                                                    @endforeach
                                                @else
                                                  @if($product->images->count() > 1)
                                                    @foreach($secondary_images as $img)
                                                    <div><img src="{{asset('storage/images/products/'.$img->lien)}}" alt="product image" /></div>
                                                    @endforeach
                                                  @endif
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Gallery -->
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="detail-info pr-30 pl-30">
                                            {!! \App\Helpers\ProductHelper::getProductBadge($product) !!}

                                            <h2 class="title-detail">{{$product->designation}}</h2>
                                            <div class="product-detail-rating">
                                                <div class="product-rate-cover text-end">
                                                    <div class="product-average-rating d-inline-block">

                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> ({{ $count_comments }} reviews)</span>
                                                </div>
                                            </div>
                                            <div class="clearfix product-price-cover">
                                                <div class="product-price primary-color float-left" >
                                                    @if($min_price)
                                                     @if($min_price_promo)
                                                        <span class="current-price text-brand origin-price-promo" >{{number_format($min_price_promo)}} Da</span>
                                                        <span>
                                                            <span class="save-price font-md color3 ml-15">26% Off</span>
                                                            <span class="old-price font-md ml-15 origin-price">{{number_format($min_price)}} DA</span>
                                                        </span>
                                                     @else
                                                     <span class="current-price text-brand origin-price" >{{number_format($min_price)}} Da</span>
                                                     @endif
                                                    @else
                                                    @if($product_line->promo_price)
                                                    <span class="current-price text-brand origin-price-promo">{{number_format($product_line->promo_price)}} Da</span>
                                                    <span>
                                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                                        <span class="old-price font-md ml-15 origin-price">{{number_format($product_line->price)}} DA</span>
                                                    </span>
                                                    @else
                                                    <span class="current-price text-brand origin-price">{{number_format($product_line->price)}} Da</span>
                                                    @endif
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="short-desc mb-30">
                                                <p class="font-lg">{!! $product->short_description !!}</p>
                                            </div>
                                            @if($productlines)
                                                {{--if product has color--}}
                                                @if($has_color)
                                                    <div class="attr-detail attr-size mb-10 ">
                                                        <ul class="font-small attribut-color-section" id="list-line" >
                                                            <div class="mb-4">
                                                                <strong >Color : <span class="attribut-title"></span></strong>
                                                            </div>
                                                            @foreach($productlines as $productline)
                                                                @foreach($productline as $item)
                                                                    @if($item[0])
                                                                    <li value-id="{{$item->id}}"  id="{{'li-'.$item->id}}"  style=" border: 1px solid #000!important; border-radius: 15% !important;" class="border">
                                                                        <a  href="javascript:void(0)" class="select-attribut getAttribute" style="background-color: {{$item->attributeLine->code}}; margin:2px!important;" title="{{$item->attributeLine->value}}"  id="{{$item->id}}"></a>
                                                                    </li>
                                                                    @else
                                                                        <li value-id="{{$item->id}}"  id="{{'li-'.$item->id}}"  class="border">
                                                                            <a  href="javascript:void(0)" class="select-attribut getAttribute" style="background-color: {{$item->attributeLine->code}}; margin:2px!important;" title="{{$item->attributeLine->value}}"  id="{{$item->id}}"></a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        </ul>
                                                   </div>
                                                @else
                                                    <div class="attr-detail attr-size mb-10 ">
                                                        <ul class="font-small attribut-section" id="list-line" >
                                                            <div class="mb-4">
                                                                <strong > {{$variations->first()->attribute->value}}  : <span class="attribut-title"></span></strong>
                                                            </div>
                                                            @foreach($productlines as $productline)
                                                                @foreach($productline as $item)
                                                                    @if($productline->count() == 1)
                                                                    <li value-id="{{$item->id}}"  id="{{'li-'.$item->id}}"  style=" border: 1px solid #000!important; border-radius: 15% !important;">
                                                                        <a  href="javascript:void(0)" class="select-attribut getAttribute" style=" margin:2px!important;" title="{{$item->attributeLine->value}}"  id="{{$item->id}}">{{$item->attributeLine->value}}</a>
                                                                    </li>
                                                                    @else
                                                                        <li value-id="{{$item->id}}"  id="{{'li-'.$item->id}}" >
                                                                            <a  href="javascript:void(0)" class="select-attribut getAttribute"  style="margin:2px!important;" title="{{$item->attributeLine->value}}"  id="{{$item->id}}" >
                                                                                {{$item->attributeLine->value}}
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        </ul>
                                                  </div>
                                                @endif

                                            @else
                                                <ul class="list-filter size-filter font-small color-categories " style=" display:none; " id="list-line-li">
                                                    <li value-id="{{$product_line->id}}"  class="li-selected active ">
                                                        <a href="#"  class="getAttribute"  id="{{$product_line->id}}" > <br></a>
                                                    </li>
                                                </ul>
                                            @endif
                                            @if(count($added_products) != 0)
                                                <div class="attr-detail attr-size mb-30 color-option">
                                                    <ul class="list-filter size-filter font-small list-option">
                                                        <div class="mb-4 attribut-section">
                                                            <strong > <span class="product-text" style="color:#BC221A "> Recommended add-ons !</span></strong>
                                                        </div>

                                                        @foreach($added_products as $added_product)
                                                            <li value-id="{{$added_product->productLine->id}}"  class="recommended-product">
                                                                <div class="d-flex flex-row p-1" style="border: 1px solid #BC221A; border-radius: 5px;">
                                                                    <a style="height: auto; line-height: 23px;" href="#" title="{{ $added_product->productLine->product->designation }}" class="added-product" data-added="{{$added_product->id}}" data-product="{{$product->id}}" >  {{ $added_product->productLine->product->designation }}
                                                                        <strong style="color: #BC221A">@if($added_product->productLine->price_promo){{ number_format($added_product->productLine->price_promo) }} Da @else {{ number_format($added_product->productLine->price) }} Da @endif</strong>
                                                                    </a>

                                                                    <img src="{{asset('storage/images/products/'.$added_product->productLine->product->images[0]->lien)}}" alt="Description of Image" width="60" height="60">
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <div class="detail-extralink mb-50">
                                                <div class="detail-qty border radius">

                                                    <input type="hidden" value="{{$product->id}}" class="product_id">
                                                    <input type="hidden" value="{{$product_line->id}}" class="product_line_id">
                                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                    <input type="text" name="quantity" class="qty-val" value="1" min="1">
                                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                                </div>
                                                <div class="product-extra-link2">
                                                    <button type="submit" class="button button-add-to-cart addToCartBtn"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                                    <!-- <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#"><i class="fi-rs-heart"></i></a>!-->

                                                </div>
                                            </div>
                                            <!--
                                            <div class="font-xs">
                                                <ul class="mr-50 float-start">
                                                    <li class="mb-5">Type: <span class="text-brand">{{$category_product->category->designation}}</span></li>
                                                    <li class="mb-5">MFG:<span class="text-brand"> 2023</span></li>
                                                    <li>LIFE: <span class="text-brand">70 days</span></li>
                                                </ul>
                                                <ul class="float-start">
                                                    <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                                    <li class="mb-5">Tags: <a href="#" rel="tag">M2</a></li>
                                                    <li>Stock:<span class="in-stock text-brand ml-5">8 Items In Stock</span></li>
                                                </ul>
                                            </div>
                                            !-->
                                        </div>
                                        <!-- Detail Info -->
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="tab-style3">
                                        <ul class="nav nav-tabs text-uppercase">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Informations</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link count-comment" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Comments ({{ $count_comments }})</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content shop_info_tab entry-main-content">
                                            <div class="tab-pane fade show active" id="Description">
                                                <div class="summernote-container ">
                                                    <hr class="wp-block-separator is-style-dots" />
                                                    <p>{!! $product->long_description !!}</p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="Additional-info">
                                                <table class="font-md">
                                                    <tbody>
                                                        @if($productlines)
                                                            @foreach($productlines as $productline)
                                                            <tr class="stand-up">
                                                                <th>{{ $productline[$loop->iteration]->attribute->value }}</th>
                                                                <td>
                                                                    <p> @foreach($productline as $item)
                                                                        {{$item->attributeLine->value}},
                                                                        @endforeach
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="tab-pane fade" id="Reviews">
                                                <!--Comments-->
                                                <div class="comments-area">
                                                    <div class="row">
                                                        <div class="col-lg-8 " id="comment-section">
                                                            <h4 class="mb-30 customer_reviews">@if($count_comments > 0)Customer Reviews @endif</h4>
                                                            @foreach($comments as $comment)
                                                                <div class="comment-list">
                                                                    <div class="single-comment justify-content-between d-flex mb-30">
                                                                        <div class="user justify-content-between d-flex">
                                                                            <div class="thumb text-center">
                                                                                <img src="{{asset('dashboard/logo-customer.png')}}" alt="" />
                                                                                <a href="#" class="font-heading text-brand">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</a>
                                                                            </div>
                                                                            <div class="desc">
                                                                                <div class="d-flex justify-content-between mb-10">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <span class="font-xs text-muted">{{$comment->created_at->format('Y-m-d H:m')}}</span>
                                                                                    </div>
                                                                                    <div class="d-inline-block comment-rating"  data-rating="{{ $comment->rating }}">

                                                                                    </div>
                                                                                </div>
                                                                                <p class="mb-10">{{ $comment->comment }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="col-lg-4">

                                                            <div class="d-flex mb-30">
                                                                <div class="product-average-rating d-inline-block mr-15">

                                                                </div>

                                                                <h6 class="avg-rating">@if($count_comments > 0){{ $average_rating }} sur 5 @endif</h6>

                                                            </div>
                                                            {{--
                                                            <div class="progress">
                                                                <span>5 star</span>
                                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                            </div>
                                                            <div class="progress">
                                                                <span>4 star</span>
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                            </div>
                                                            <div class="progress">
                                                                <span>3 star</span>
                                                                <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                                            </div>
                                                            <div class="progress">
                                                                <span>2 star</span>
                                                                <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                                            </div>
                                                            <div class="progress mb-30">
                                                                <span>1 star</span>
                                                                <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                                            </div>
                                                            <a href="#" class="font-xs text-muted">Comment les notes sont-elles calculées ?</a>
                                                            --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--comment form-->
                                                @Auth
                                                @if($nbr_comment == 0)
                                                <div class="comment-form">
                                                    <h4 class="mb-15">Add a comment</h4>
                                                    <div class="d-inline-block mb-30 my-rating"></div>
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-12">
                                                            <form class="form-contact comment_form" action="#" id="commentForm">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Commentaire"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="product" value="{{ $product->id }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="button" class="button button-contactForm add-comment">Send</button>
                                                                </div>
                                                            </form>
                                                            <div id="show_comment_msg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @else
                                                <h6 style="color: #BC221A">You have already provided feedback on this product!</h6>
                                                @endif
                                                @else
                                                <p>Please log in to post a comment.</p>
                                                <a href="{{asset('/login')}}"class="btn btn-sqr mt-3">Log In</a>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-60">
                                    <div class="col-12">
                                        <h2 class="section-title style-1 mb-30">Similar products</h2>
                                    </div>
                                    <div class="col-12">
                                        <div class="row related-products">
                                            @foreach($similar_products as $similar_product)
                                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                                <div class="product-cart-wrap hover-up">
                                                    <div class="product-img-action-wrap">
                                                        <div class="product-img product-img-zoom">
                                                            <a href="{{ asset('product/'.$similar_product->product->slug) }}" tabindex="0">
                                                                @if($similar_product->product->images->first())
                                                                <img class="default-img" src="{{ asset('storage/images/products/'.$similar_product->product->images->first()->lien) }}" alt="" />
                                                            @endif
                                                            </a>
                                                        </div>

                                                        <div class="product-badges product-badges-position product-badges-mrg">

                                                            {!! \App\Helpers\ProductHelper::getProductBadge($similar_product->product) !!}
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <h2><a href={{ asset('product/'.$similar_product->product->slug) }}>{{$similar_product->product->designation}}</a></h2>
                                                        <h2><a href={{ asset('product/'.$similar_product->product->slug) }}>{{$similar_product->product->created_at}}</a></h2>
                                                        {{--  <div class="rating-result" title="90%">
                                                            <span> </span>
                                                        </div> --}}

                                                        <div class="product-price">
                                                            @if($similar_product->getPricePromo())
                                                            <span>{{number_format($similar_product->getPricePromo())}} Da</span>
                                                            <span class="old-price">{{number_format($similar_product->getPrice())}} Da</span>
                                                            @else
                                                            <span>{{number_format($similar_product->getPrice())}} Da</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 primary-sidebar sticky-sidebar mt-30">
                           {{-- <div class="sidebar-widget widget-category-2 mb-30">
                                <h5 class="section-title style-1 mb-30">Categories</h5>
                                <ul>
                                    @foreach($randomCategories as $category)
                                    <li>
                                        <a href="{{ asset('category/'.$category->slug) }}">{{$category->designation}}</a><span class="count" style="color: #fff">{{ $category->product_categories_count }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>--}}
                            <!-- Fillter By Price -->

                            <!-- Product sidebar Widget -->

                            <div class="banner-slider sidebar-widget product-sidebar mb-30  bg-grey border-radius-10">
                                <div >
                                    <img class="rounded-image" src="{{ asset('front/assets/ads/pc-builder.jpg') }}" alt="" />
                                </div>
                                <div >
                                    <img class="rounded-image" src="{{ asset('front/assets/ads/order-track.jpg') }}" alt="" />
                                </div>
                                <div >
                                    <img class="rounded-image" src="{{ asset('front/assets/ads/google-reviews.jpg') }}" alt="" />
                                </div>
                                <!-- Ajoutez plus d'images si nécessaire -->
                            </div>


                            <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                                <h5 class="section-title style-1 mb-30">Latest {{$category->designation}}</h5>
                                @foreach($new_products as $new_product)
                                <div class="single-post clearfix">
                                    <div class="image">
                                        @if(optional($new_product->images->first())->lien)
                                        <img src="{{asset('storage/images/products/'.$new_product->images[0]->lien)}}" alt="#" />
                                        @endif
                                    </div>
                                    <div class="content pt-10">
                                        <h6><a href={{asset('product/'.$new_product->slug) }}>{{$new_product->designation}}</a></h6>
                                        <p class="price mb-0 mt-5">{{number_format($new_product->minPrice())}} Da</p>
                                        {{-- <div class="product-average-rating">

                                        </div> --}}
                                    </div>
                                </div>
                               @endforeach
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection

@push('get-price-script')
<script>
    $( ".getAttribute" ).click(function() {

        var id = $(this).attr("id");
        $.ajax({
			url: '/get-price/' + id ,
			type: "GET",
            success: function (res) {

                if(res.promo != '0'){

                    var price_promo = $.number(res.promo_price);
                    var price = $.number(res.price);

                    $(".price-promo").text(price_promo +' Da');
                    $(".current-price").text(price + ' Da');
                }
                else{
                    $(".current-price").text(res.price +' Da');
                }


			}
		});
});
</script>
@endpush
@push('get-price-product-added-script')
<script>
    var origin_price = $(".origin-price").text();
    var origin_price_promo = $(".origin-price-promo").text();

    $( ".added-product").click(function() {

        if($(this).parent().hasClass("active")){
            $(".product-text").text('Recommended add-ons !');
            $(".origin-price").text(origin_price);
            $(".origin-price-promo").text(origin_price_promo);
        }

        else{
            var product_id = $(this).data("product");
            var product_added = $(this).data("added");
            $(".product-text").text($(this).attr('title'));

            $.ajax({
                url: '/get-price-product-added/' + product_added +'/'+product_id,
                type: "GET",
                success: function (res) {
                if(res.productline.price_promo){
                    $(".origin-price-promo").text(res.price +' Da');
                }
                else{
                    $(".origin-price").text(res.price +' Da');
                }
                }
            });
        }

    });


    var color_test = "{{ $has_color }}";
    if(!color_test){

        $( ".select-attribut").click(function() {

            var product_id = $(this).data("product");
            var product_added = $(this).data("added");

            $.ajax({
                url: '/get-price-product-added/' + product_added +'/'+product_id,
                type: "GET",
                success: function (res) {
                if(res.productline.price_promo){
                    $(".origin-price-promo").text(res.price +' Da');
                }
                else{
                    $(".origin-price").text(res.price +' Da');
                }
                }
            });
        });
    }
</script>


@endpush
@push('add-cart-scripts')
<script>
 $(document).ready(function() {
    // Configuration AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Gestion de l'ajout de produits au panier
    $(".addToCartBtn").click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product-data').find('.product_id').val();
        var qte = $(this).closest('.product-data').find('.qty-val').val();

        $.ajax({
            url: '/get-product/' + product_id,
            type: "GET",
            success: function(res) {
                var id;
                if (res.countproductlines > 1) {
                    id = $('#list-line li.li-color-selected').attr('value-id');
                } else {
                    id = res.productlines.id;
                }


                // Vérifier et ajouter les produits recommandés sélectionnés au panier
                $('.d-flex.active').each(function() {
                    var recommendedId = $('.recommended-product').attr('value-id');
                    var recommendedQte = 1; // Quantité par défaut pour les produits recommandés
                    addToCart(recommendedId, recommendedQte);
                });
                 addToCart(id, qte);
            }
        });
    });

    // Gestion de la sélection des produits recommandés
    $('.list-line').on('click', '.recommended-product', function(e) {
        e.preventDefault();
        $(this).find('.d-flex').toggleClass('active'); // Bascule la classe active sur le div parent
    });

    // Fonction pour ajouter des produits au panier
    function addToCart(id, qte) {
        $.ajax({
            url: '/carts',
            type: "POST",
            data: {
                'id': id,
                'qte': qte,
            },
            success: function(res) {
                toastr.success('Product added successfully');
                $(".nbr_product").text(res.nbr_cart);

                if (res.qtes == 0) {
                    var $path = '{{asset("storage/images/products/")}}';
                    var $data = '<li>' +
                        '<div class="shopping-cart-img">' +
                        '<a href="shop-product-right.html"><img src="' + $path + '/' + res.image + '" alt="product"></a>' +
                        '</div>' +
                        '<div class="shopping-cart-title">' +
                        '<h4><a href="shop-product-right.html">' + res.name + '</a></h4>' +
                        '<h4><span>' + res.qte + ' × </span>' + res.price + ' Da</h4>' +
                        '</div>' +
                        '<div class="shopping-cart-delete">' +
                        '<a href="#"><i class="fi-rs-cross-small"></i></a>' +
                        '</div>' +
                        '</li>';
                    $(".cart-empty").css("display", "none");
                    $('.cart-list').append($data);
                } else {
                    alert("The product already exists in your cart");
                }
                $(".total").text(res.total + ' Da');
            }
        });
    }
});
</script>
@endpush
@push('select-color-indice')
<script>
    $(".select-attribut").click(function() {
        var title = $(this).attr('title');
        $('.attribut-title').html(title);
        id = $(this).attr('id');

        $('.attribut-color-section li').removeAttr('class');
        $('.attribut-section li').removeAttr('class');
        $('li[id^="li-"]').addClass('border');

        $("#li-"+id).addClass("li-color-selected");


        $('#related-img-'+id).trigger('click');
    });
</script>
@endpush


@push('comment-scripts')
<script>
    $(document).ready(function() {
        var averageRating = {{ $average_rating }};
        var averageRating = parseFloat(averageRating);


        $('.product-average-rating').starRating({
            initialRating: averageRating,
            readOnly: true,
            // Autres options du plugin...
        });
    });
</script>

<script>
    $(document).ready(function() {
      // Récupérer la valeur de la note depuis l'attribut data-rating
      var initialRating = parseFloat($('#product-rating').data('rating'));

      // Initialiser le plugin StarRatingSvg avec la valeur récupérée
      $('.comment-rating').starRating({
        initialRating: initialRating,
        readOnly: true, // Optionnel : définir à true si vous ne voulez pas que les utilisateurs puissent modifier la note
        // Autres options du plugin...
      });
    });
</script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".add-comment").on("click", function (e) {
    e.preventDefault();

    $('#show_comment_msg').html('<div>En cours....</div>');

    var comment = $('#comment').val();
    var product = $('#product').val();
    var rating = $('.my-rating').starRating('getRating');

    var data = {
        "_token": "{{ csrf_token() }}",
        comment: comment,
        product: product,
        rating: rating
    };

    $.ajax({
    url: "/comment",
    type: "POST",
    data: data,
    success: function (res) {
        // Récupérer la valeur de la note depuis la réponse AJAX
        var initialRating = parseFloat(res.rating);
        var averageRating = parseFloat(res.average_rating);
        // Initialiser le plugin StarRatingSvg avec la valeur récupérée


        // Ajouter le contenu du commentaire à #comment-section avec les étoiles
        $('#comment-section').append(
            '<div class="comment-list">' +
            '<div class="single-comment justify-content-between d-flex mb-30">' +
            '<div class="user justify-content-between d-flex">' +
            '<div class="thumb text-center">' +
            '<img src="{{asset('dashboard/logo-customer.png')}}" alt="" />' +
            '<a href="#" class="font-heading text-brand">' + res.name + '</a>' +
            '</div>' +
            '<div class="desc">' +
            '<div class="d-flex justify-content-between mb-10">' +
            '<div class="d-flex align-items-center">' +
            '<span class="font-xs text-muted">' + res.date + '</span>' +
            '</div>' +
            '<div class="d-inline-block comment-rating"></div>' + // Ajouter ici la classe pour les étoiles
            '</div>' +
            '<p class="mb-10">' + res.comment + '</p>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>'
        );
        $('.comment-rating').starRating({
            initialRating: initialRating,
            readOnly: true, // Optionnel : définir à true si vous ne voulez pas que les utilisateurs puissent modifier la note
            // Autres options du plugin...
        });
        $('.product-average-rating').starRating({
            initialRating: averageRating,
            readOnly: true,
            // Autres options du plugin...
        });
        $('.avg-rating').text(res.average_rating + ' sur 5');
        $('.customer_reviews').text('Customer Reviews');
        $('.count-comment').text('Comments('+res.count_comments+')');
        // Afficher un message de succès
        $('#show_comment_msg').html('<div class="alert alert-success mt-2 flash-alert" id="form-success" role="alert" style="color:#fff; background-color:#BC221A; border-color:#BC221A;">Thank you for your comment!</div>');
        $(".flash-alert").slideDown(200, function () {
            setTimeout(function () {
                $(".flash-alert").slideUp(200, function () {
                    $(".comment-form").hide();
                });
            }, 2000);
        });
    },
    error: function (xhr, status, error) {
        // Afficher un message d'erreur en cas d'échec de la requête AJAX
        $('#show_comment_msg').html('<div class="alert alert-danger mt-2 flash-alert" id="form-error" role="alert" style="color:#fff; background-color:#BC221A; border-color:#BC221A;">You have already commented on this product.</div>');
        $(".flash-alert").slideDown(200, function () {
            setTimeout(function () {
                $(".flash-alert").slideUp(200);
            }, 2000);
        });
    }
});
});
</script>
@endpush
