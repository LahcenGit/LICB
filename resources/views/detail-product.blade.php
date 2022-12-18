@extends('layouts.front')
@section('content')

<style>
    .carre {
    width: 40px;
    height: 40px;
}
</style>
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
                    <span></span> <a href="shop-grid-right.html">Composants PC</a> <span></span> SSD
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
                                                @if($images_attributes)
                                                    @foreach($images_attributes as $image_attribute)
                                                    <figure class="border-radius-10">
                                                    <img src="{{asset('storage/images/productlines/'.$image_attribute->attribute_image)}}" alt="{{ $image_attribute->attributeLine->value }}" />
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
                                                @if($images_attributes)
                                                    @if($first_image)
                                                    <div><img src="{{asset('storage/images/products/'.$first_image->lien)}}" alt="product image" /></div>
                                                    @endif
                                                    @foreach($images_attributes as $image_attribute)
                                                    <div id="{{'related-img-'.$image_attribute->id}}"><img src="{{asset('storage/images/productlines/'.$image_attribute->attribute_image)}}" alt="product image" /></div>
                                                    @endforeach
                                                @else
                                                  @if($product->images->count() > 1)
                                                    @foreach($product->images as $img)
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
                                            <span class="stock-status out-stock"> Sale Off </span>
                                            <h2 class="title-detail">{{$product->designation}}</h2>
                                            <div class="product-detail-rating">
                                                <div class="product-rate-cover text-end">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 90%"></div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
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
                                                <p class="font-lg">{{ $product->short_description}}</p>
                                            </div>
                                            @if($productlines)
                                            @foreach($productlines as $productline)
                                            <div class="attr-detail attr-size mb-10 ">
                                                <ul class="font-small attribut-section" >
                                                    @foreach($productline as $item)
                                                        @if($loop->iteration == 1)
                                                            <div class="mb-4 ">
                                                                <strong >{{$item->attribute->value}}: @if($item->attribute->value == 'Couleur')<span class="color-title"> <b>{{ $item->attributeLine->value }} </b> </span><br>@endif </strong>
                                                            </div>
                                                        @endif

                                                        @if($item->attribute->value != 'Couleur')
                                                            <li value-id="{{$item->id}}" >
                                                                <a style="height: auto; line-height: 20px;" href="#" title="{{$item->attributeLine->value}}"  class="getAttribute" data-id="{{$item->attributeline_id}}" id="{{$item->id}}" >{{$item->attributeLine->value}} <br>
                                                                    <strong class="price-related" >{{$item->price}} Da </strong>
                                                                </a>
                                                            </li>
                                                        @else
                                                            @if($item[0])
                                                            <li value-id="{{$item->id}}"  id="{{'li-'.$item->id}}"  style=" border: 1px solid #000!important; border-radius: 15% !important;">
                                                                <a  href="#" class="select-color" style="background-color: {{$item->attributeLine->code}}; margin:2px!important; " title="{{$item->attributeLine->value}}"  id="{{$item->id}}"></a>
                                                            </li>
                                                            @else
                                                                <li value-id="{{$item->id}}"  id="{{'li-'.$item->id}}"  >
                                                                    <a  href="#" class="select-color" style="background-color: {{$item->attributeLine->code}}; margin:2px!important; " title="{{$item->attributeLine->value}}"  id="{{$item->id}}"></a>
                                                                </li>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endforeach
                                            @else
                                                <ul class="list-filter size-filter font-small color-categories " style=" display:none; " id="list-line-li">
                                                    <li value-id="{{$product_line->id}}"  class="li-selected active ">
                                                        <a href="#"  class="getAttribute"  id="{{$product_line->id}}" > <br></a>
                                                    </li>
                                                </ul>
                                            @endif
                                            
                                            @if($added_products)
                                                <div class="attr-detail attr-size mb-30 color-option">

                                                    <ul class="list-filter size-filter font-small list-option" id="list-line">
                                                        <div class="mb-4 attribut-section">
                                                            <strong >Options: <span class="product-text"></span></strong>
                                                        </div>
                                                        @foreach($added_products as $added_product)
                                                            <li value-id="{{$added_product->id}}">
                                                            <a style="height: auto; line-height: 23px;" href="#" title="{{ $added_product->productLine->product->designation }}" class="added-product" data-added="{{$added_product->id}}" data-product="{{$product->id}}" >  {{ $added_product->productLine->product->designation }} <br>
                                                                <strong >@if($added_product->productLine->price_promo){{ number_format($added_product->productLine->price_promo) }} Da @else {{ number_format($added_product->productLine->price) }} Da @endif</strong>
                                                            </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>

                                                </div>
                                            @endif
                                            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                                                <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                                                  <div class="toast-header">
                                                    <img src="..." class="rounded me-2" alt="...">
                                                    <strong class="me-auto">Bootstrap</strong>
                                                    <small>11 mins ago</small>
                                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                                  </div>
                                                  <div class="toast-body">
                                                    Hello, world! This is a toast message.
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="detail-extralink mb-50">
                                                <div class="detail-qty border radius">

                                                    <input type="hidden" value="{{$product->id}}" class="product_id">
                                                    <input type="hidden" value="{{$product_line->id}}" class="product_line_id">
                                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                    <input type="text" name="quantity" class="qty-val" value="1" min="1">
                                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                                </div>
                                                <div class="product-extra-link2">
                                                    <button type="submit" class="button button-add-to-cart addToCartBtn"><i class="fi-rs-shopping-cart"></i>Ajouter au panier</button>
                                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#"><i class="fi-rs-heart"></i></a>

                                                </div>
                                            </div>
                                            <div class="font-xs">
                                                <ul class="mr-50 float-start">
                                                    <li class="mb-5">Type: <span class="text-brand">SSD</span></li>
                                                    <li class="mb-5">MFG:<span class="text-brand"> 2022</span></li>
                                                    <li>LIFE: <span class="text-brand">70 days</span></li>
                                                </ul>
                                                <ul class="float-start">
                                                    <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                                    <li class="mb-5">Tags: <a href="#" rel="tag">M2</a>, <a href="#" rel="tag">PCIe </a>, <a href="#" rel="tag">NVMe</a></li>
                                                    <li>Stock:<span class="in-stock text-brand ml-5">8 Items In Stock</span></li>
                                                </ul>
                                            </div>
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
                                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Commentaires (3)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content shop_info_tab entry-main-content">
                                            <div class="tab-pane fade show active" id="Description">
                                                <div class="">
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
                                                        <div class="col-lg-8">
                                                            <h4 class="mb-30">Avis des clients</h4>
                                                            <div class="comment-list">
                                                                <div class="single-comment justify-content-between d-flex mb-30">
                                                                    <div class="user justify-content-between d-flex">
                                                                        <div class="thumb text-center">
                                                                            <img src="{{ asset('front/assets/imgs/blog/author-2.png') }}" alt="" />
                                                                            <a href="#" class="font-heading text-brand">NODHAR BOUCHAREB</a>
                                                                        </div>
                                                                        <div class="desc">
                                                                            <div class="d-flex justify-content-between mb-10">
                                                                                <div class="d-flex align-items-center">
                                                                                    <span class="font-xs text-muted">December 4, 2022 13h:15 </span>
                                                                                </div>
                                                                                <div class="product-rate d-inline-block">
                                                                                    <div class="product-rating" style="width: 100%"></div>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-10">Great shop..great costumer service..and most importently great interaction with content creators such as me..Very fast delivery and competitive prices. </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="single-comment justify-content-between d-flex mb-30">
                                                                    <div class="user justify-content-between d-flex">
                                                                        <div class="thumb text-center">
                                                                            <img src="{{ asset('front/assets/imgs/blog/author-2.png') }}" alt="" />
                                                                            <a href="#" class="font-heading text-brand">Abderahim</a>
                                                                        </div>
                                                                        <div class="desc">
                                                                            <div class="d-flex justify-content-between mb-10">
                                                                                <div class="d-flex align-items-center">
                                                                                    <span class="font-xs text-muted">Septembre 3, 2022 at 10h:20 </span>
                                                                                </div>
                                                                                <div class="product-rate d-inline-block">
                                                                                    <div class="product-rating" style="width: 100%"></div>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-10">I like the diversity of your products, also good communication. </p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="single-comment justify-content-between d-flex">
                                                                    <div class="user justify-content-between d-flex">
                                                                        <div class="thumb text-center">
                                                                            <img src="{{ asset('front/assets/imgs/blog/author-4.png') }}" alt="" />
                                                                            <a href="#" class="font-heading text-brand">zako </a>
                                                                        </div>
                                                                        <div class="desc">
                                                                            <div class="d-flex justify-content-between mb-10">
                                                                                <div class="d-flex align-items-center">
                                                                                    <span class="font-xs text-muted">juillet 14, 2022 at 17h:30</span>
                                                                                </div>
                                                                                <div class="product-rate d-inline-block">
                                                                                    <div class="product-rating" style="width: 80%"></div>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-10">Fast shipping and excellent prices with a great costumers services .Thanks licb </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">

                                                            <div class="d-flex mb-30">
                                                                <div class="product-rate d-inline-block mr-15">
                                                                    <div class="product-rating" style="width: 90%"></div>
                                                                </div>
                                                                <h6>4,8 sur 5</h6>
                                                            </div>
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--comment form-->
                                                <div class="comment-form">
                                                    <h4 class="mb-15">Ajouter un commentaire</h4>
                                                    <div class="product-rate d-inline-block mb-30"></div>
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-12">
                                                            <form class="form-contact comment_form" action="#" id="commentForm">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Commentaire"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <input class="form-control" name="name" id="name" type="text" placeholder="Nom et prenom" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <input class="form-control" name="email" id="email" type="email" placeholder="Email" />
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" class="button button-contactForm">Envoyer</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-60">
                                    <div class="col-12">
                                        <h2 class="section-title style-1 mb-30">Produits associés</h2>
                                    </div>
                                    <div class="col-12">
                                        <div class="row related-products">
                                            @foreach($related_products as $related_product)
                                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                                <div class="product-cart-wrap hover-up">
                                                    <div class="product-img-action-wrap">
                                                        <div class="product-img product-img-zoom">
                                                            <a href="{{ asset('product/'.$related_product->product->slug) }}" tabindex="0">
                                                                <img class="default-img" src="{{asset('storage/images/products/'.$related_product->product->images[0]->lien)}}" alt="" />

                                                            </a>
                                                        </div>

                                                        <div class="product-badges product-badges-position product-badges-mrg">

                                                            <span class="new">New</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <h2><a href={{ asset('product/'.$related_product->product->slug) }}>{{$related_product->product->designation}}</a></h2>
                                                        <div class="rating-result" title="90%">
                                                            <span> </span>
                                                        </div>
                                                        <div class="product-price">
                                                            @if($related_product->getPricePromo())
                                                            <span>{{number_format($related_product->getPricePromo())}} Da</span>
                                                            <span class="old-price">{{number_format($related_product->getPrice())}} Da</span>
                                                            @else
                                                            <span>{{number_format($related_product->getPrice())}} Da</span>
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
                            <div class="sidebar-widget widget-category-2 mb-30">
                                <h5 class="section-title style-1 mb-30">Catégories</h5>
                                <ul>
                                    @foreach($categories as $category)
                                    <li>
                                        <a href="#">{{$category->designation}}</a><span class="count" style="color: #fff">30</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Fillter By Price -->

                            <!-- Product sidebar Widget -->
                            <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                                <h5 class="section-title style-1 mb-30">Nouveaux produits</h5>
                                @foreach($new_products as $new_product)
                                <div class="single-post clearfix">
                                    <div class="image">
                                        <img src="{{asset('storage/images/products/')}}" alt="#" />
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a href={{asset('product/'.$new_product->slug) }}>{{$new_product->designation}}</a></h5>
                                        <p class="price mb-0 mt-5">{{number_format($new_product->minPrice())}} Da</p>
                                        <div class="product-rate">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                    </div>
                                </div>
                               @endforeach

                            </div>
                            <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                                <img src="{{ asset('front/assets/imgs/banner/banner-11.png') }}" alt="" />
                                <div class="banner-text">
                                    <span>Oganic</span>
                                    <h4>
                                        Save 17% <br />
                                        on <span class="text-brand">Oganic</span><br />
                                        Juice
                                    </h4>
                                </div>
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
        var attributeline_id = $(this).attr("data-id");
        var id = $(this).attr("id");
        $.ajax({
			url: '/get-price/' + id +'/'+attributeline_id,
			type: "GET",
            success: function (res) {

                if(res.promo != '0'){

                    var price_promo = $.number(res.promo_price);
                    var price = $.number(res.price);
                    $(".price-promo").text(price_promo +' Da');
                    $(".price").text(price + ' Da');
                }
                else{

                    $(".price").text(res.price +' Da');
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

    $( ".added-product" ).click(function() {

        if($(this).parent().hasClass("active")){
            $(".product-text").text('');
            $(".origin-price").text( origin_price );
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
</script>
@endpush
@push('add-cart-scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

    $( ".addToCartBtn" ).click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product-data').find('.product_id').val();
        var qte = $(this).closest('.product-data').find('.qty-val').val();

        $.ajax({
                url: '/get-product/' + product_id ,
                type: "GET",
                success: function (res) {

                if(res.countproductlines > 1){
                    var id = $('#list-line li.active').attr('value-id');
                    $.ajax({
                            url: '/carts',
                            type: "POST",
                            data:{
                                'id' : id,
                                'qte' :qte,
                            },
                            success: function (res) {

                                $("#liveToast").show();
                                $(".nbr_product").text(res.nbr_cart);

                                if(res.qtes == 0){
                                    $data =  '<li>'+
                                                '<div class="shopping-cart-img">'+
                                                    '<a href="shop-product-right.html"><img alt="Nest" src="{{asset('storage/images/products/'.'+res.image+')}}" /></a>'+
                                                '</div>'+
                                                '<div class="shopping-cart-title">'+
                                                    '<h4><a href="shop-product-right.html">'+res.name+'</a></h4>'+
                                                    '<h4><span>'+res.qte+' × </span>'+res.price+' Da</h4>'+
                                                '</div>'+
                                                '<div class="shopping-cart-delete">'+
                                                    '<a href="#"><i class="fi-rs-cross-small"></i></a>'+
                                                '</div>'+
                                        '</li>';

                                    $('.cart-list').append($data);
                                }
                                else{
                                    alert("Le produit existe déja dans votre panier");
                                }
                                $(".total").text(res.total +' Da');
                               }

                            });
                         }
                         else{
                            var id = res.productlines.id;

                            $.ajax({
                            url: '/carts',
                            type: "POST",
                            data:{
                                'id' : id,
                                'qte' :qte,
                            },
                            success: function (res) {

                                $("#liveToast").show();
                                $(".nbr_product").text(res.nbr_cart);
                                if(res.qtes == 0){
                                    $data =  '<li>'+
                                                '<div class="shopping-cart-img">'+
                                                    '<a href="shop-product-right.html"><img alt="Nest" src="{{asset('storage/images/products/'.'+res.image')}}" /></a>'+
                                                '</div>'+
                                                '<div class="shopping-cart-title">'+
                                                    '<h4><a href="shop-product-right.html">'+res.name+'</a></h4>'+
                                                    '<h4><span>'+res.qte+' × </span>'+res.price+' Da</h4>'+
                                                '</div>'+
                                                '<div class="shopping-cart-delete">'+
                                                    '<a href="#"><i class="fi-rs-cross-small"></i></a>'+
                                                '</div>'+
                                        '</li>';

                                    $('.cart-list').append($data);
                                }
                                else{
                                    alert("Le produit existe déja dans votre panier");
                                }
                                $(".total").text(res.total +' Da');

                            }
                            });
                         }


                }
            });

});
</script>
@endpush
@push('select-color-indice')
<script>
    $(".select-color").click(function() {
        var title = $(this).attr('title');
        $('.color-title b').html(title);
        id = $(this).attr('id');
        $('.color-categories li ').removeAttr('class');
        $("#li-"+id).addClass("li-selected");
        $('#related-img-'+id).trigger('click');
    });
</script>
@endpush
