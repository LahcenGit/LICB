@extends('layouts.front')
@section('content')

<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
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
                                                <figure class="border-radius-10">
                                                <img src="{{asset('storage/images/products/'.$first_image->lien)}}" alt="product image" />
                                                </figure>
                                                @foreach($product->secondaryImages() as $img)
                                                <figure class="border-radius-10">
                                                <img src="{{asset('storage/images/products/'.$img->lien)}}" alt="product image" />
                                                </figure>
                                                @endforeach
                                                
                                            </div>
                                            <!-- THUMBNAILS -->
                                            <div class="slider-nav-thumbnails">
                                                @foreach($product->images as $img)
                                                <div><img src="{{asset('storage/images/products/'.$img->lien)}}" alt="product image" /></div>
                                                @endforeach
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
                                                        <span class="current-price text-brand price-promo" >{{number_format($min_price_promo)}} Da</span>
                                                        <span>
                                                            <span class="save-price font-md color3 ml-15">26% Off</span>
                                                            <span class="old-price font-md ml-15 price">{{number_format($min_price)}} DA</span>
                                                        </span>
                                                     @else
                                                     <span class="current-price text-brand price-promo" >{{number_format($min_price)}} Da</span>
                                                     @endif
                                                    @else
                                                    @if($product_line->promo_price)
                                                    <span class="current-price text-brand promo">{{number_format($product_line->promo_price)}} Da</span>
                                                    <span>
                                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                                        <span class="old-price font-md ml-15 price">{{number_format($product_line->price)}} DA</span>
                                                    </span>
                                                    @else
                                                    <span class="current-price text-brand pricep">{{number_format($product_line->price)}} Da</span>
                                                    @endif
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="short-desc mb-30">
                                                <p class="font-lg">{!! $product->long_description !!}</p>
                                            </div>
                                            @if($productlines)
                                            @foreach($productlines as $productline)
                                            <div class="attr-detail attr-size mb-30">
                                                
                                                <ul class="list-filter size-filter font-small" id="list-line">
                                                    @foreach($productline as $item)
                                                       
                                                            @if($loop->iteration == 1)
                                                            <strong class="mr-10">{{$item->attribute->value}}: </strong>
                                                            @endif
                                                            <li value-id="{{$item->id}}">
                                                            <a style="height: auto; line-height: 20px;" href="#"  class="getAttribute" data-id="{{$item->attributeline_id}}" id="{{$item->id}}" >{{$item->attributeLine->value}} <br> 
                                                                <strong class="price-related" >{{$item->price}} Da </strong> 
                                                                </a>
                                                            </li>
                                                        
                                                    @endforeach
                                                </ul>
                                              
                                            </div>
                                            @endforeach
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
                                                    <button type="submit" class="button button-add-to-cart addToCartBtn"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
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
                                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Vendor</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
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
                                                        <tr class="stand-up">
                                                            <th>Stand Up</th>
                                                            <td>
                                                                <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="folded-wo-wheels">
                                                            <th>Folded (w/o wheels)</th>
                                                            <td>
                                                                <p>32.5″L x 18.5″W x 16.5″H</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="folded-w-wheels">
                                                            <th>Folded (w/ wheels)</th>
                                                            <td>
                                                                <p>32.5″L x 24″W x 18.5″H</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="door-pass-through">
                                                            <th>Door Pass Through</th>
                                                            <td>
                                                                <p>24</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="frame">
                                                            <th>Frame</th>
                                                            <td>
                                                                <p>Aluminum</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="weight-wo-wheels">
                                                            <th>Weight (w/o wheels)</th>
                                                            <td>
                                                                <p>20 LBS</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="weight-capacity">
                                                            <th>Weight Capacity</th>
                                                            <td>
                                                                <p>60 LBS</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="width">
                                                            <th>Width</th>
                                                            <td>
                                                                <p>24″</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="handle-height-ground-to-handle">
                                                            <th>Handle height (ground to handle)</th>
                                                            <td>
                                                                <p>37-45″</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="wheels">
                                                            <th>Wheels</th>
                                                            <td>
                                                                <p>12″ air / wide track slick tread</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="seat-back-height">
                                                            <th>Seat back height</th>
                                                            <td>
                                                                <p>21.5″</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="head-room-inside-canopy">
                                                            <th>Head room (inside canopy)</th>
                                                            <td>
                                                                <p>25″</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="pa_color">
                                                            <th>Color</th>
                                                            <td>
                                                                <p>Black, Blue, Red, White</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="pa_size">
                                                            <th>Size</th>
                                                            <td>
                                                                <p>M, S</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>    
                                            <div class="tab-pane fade" id="Vendor-info">
                                                <div class="vendor-logo d-flex mb-30">
                                                    <img src="assets/imgs/vendor/vendor-18.svg" alt="" />
                                                    <div class="vendor-name ml-15">
                                                        <h6>
                                                            <a href="vendor-details-2.html">Noodles Co.</a>
                                                        </h6>
                                                        <div class="product-rate-cover text-end">
                                                            <div class="product-rate d-inline-block">
                                                                <div class="product-rating" style="width: 90%"></div>
                                                            </div>
                                                            <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="contact-infor mb-50">
                                                    <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                                                    <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Contact Seller:</strong><span>(+91) - 540-025-553</span></li>
                                                </ul>
                                                <div class="d-flex mb-55">
                                                    <div class="mr-30">
                                                        <p class="text-brand font-xs">Rating</p>
                                                        <h4 class="mb-0">92%</h4>
                                                    </div>
                                                    <div class="mr-30">
                                                        <p class="text-brand font-xs">Ship on time</p>
                                                        <h4 class="mb-0">100%</h4>
                                                    </div>
                                                    <div>
                                                        <p class="text-brand font-xs">Chat response</p>
                                                        <h4 class="mb-0">89%</h4>
                                                    </div>
                                                </div>
                                                <p>
                                                    Noodles & Company is an American fast-casual restaurant that offers international and American noodle dishes and pasta in addition to soups and salads. Noodles & Company was founded in 1995 by Aaron Kennedy and is headquartered in Broomfield, Colorado. The company went public in 2013 and recorded a $457 million revenue in 2017.In late 2018, there were 460 Noodles & Company locations across 29 states and Washington, D.C.
                                                </p>
                                            </div>
                                            <div class="tab-pane fade" id="Reviews">
                                                <!--Comments-->
                                                <div class="comments-area">
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <h4 class="mb-30">Customer questions & answers</h4>
                                                            <div class="comment-list">
                                                                <div class="single-comment justify-content-between d-flex mb-30">
                                                                    <div class="user justify-content-between d-flex">
                                                                        <div class="thumb text-center">
                                                                            <img src="assets/imgs/blog/author-2.png" alt="" />
                                                                            <a href="#" class="font-heading text-brand">Sienna</a>
                                                                        </div>
                                                                        <div class="desc">
                                                                            <div class="d-flex justify-content-between mb-10">
                                                                                <div class="d-flex align-items-center">
                                                                                    <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                                                                </div>
                                                                                <div class="product-rate d-inline-block">
                                                                                    <div class="product-rating" style="width: 100%"></div>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="single-comment justify-content-between d-flex mb-30 ml-30">
                                                                    <div class="user justify-content-between d-flex">
                                                                        <div class="thumb text-center">
                                                                            <img src="assets/imgs/blog/author-3.png" alt="" />
                                                                            <a href="#" class="font-heading text-brand">Brenna</a>
                                                                        </div>
                                                                        <div class="desc">
                                                                            <div class="d-flex justify-content-between mb-10">
                                                                                <div class="d-flex align-items-center">
                                                                                    <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                                                                </div>
                                                                                <div class="product-rate d-inline-block">
                                                                                    <div class="product-rating" style="width: 80%"></div>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="single-comment justify-content-between d-flex">
                                                                    <div class="user justify-content-between d-flex">
                                                                        <div class="thumb text-center">
                                                                            <img src="assets/imgs/blog/author-4.png" alt="" />
                                                                            <a href="#" class="font-heading text-brand">Gemma</a>
                                                                        </div>
                                                                        <div class="desc">
                                                                            <div class="d-flex justify-content-between mb-10">
                                                                                <div class="d-flex align-items-center">
                                                                                    <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                                                                </div>
                                                                                <div class="product-rate d-inline-block">
                                                                                    <div class="product-rating" style="width: 80%"></div>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <h4 class="mb-30">Customer reviews</h4>
                                                            <div class="d-flex mb-30">
                                                                <div class="product-rate d-inline-block mr-15">
                                                                    <div class="product-rating" style="width: 90%"></div>
                                                                </div>
                                                                <h6>4.8 out of 5</h6>
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
                                                            <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--comment form-->
                                                <div class="comment-form">
                                                    <h4 class="mb-15">Add a review</h4>
                                                    <div class="product-rate d-inline-block mb-30"></div>
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-12">
                                                            <form class="form-contact comment_form" action="#" id="commentForm">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <input class="form-control" name="name" id="name" type="text" placeholder="Name" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <input class="form-control" name="email" id="email" type="email" placeholder="Email" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-control" name="website" id="website" type="text" placeholder="Website" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" class="button button-contactForm">Submit Review</button>
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
                                                            <a href="shop-product-right.html" tabindex="0">
                                                                <img class="default-img" src="{{asset('storage/images/products/'.$related_product->getImage()->lien)}}" alt="" />
                                                                
                                                            </a>
                                                        </div>
                                                        <div class="product-action-1">
                                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                            <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                            <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                                        </div>
                                                        <div class="product-badges product-badges-position product-badges-mrg">
                                                         
                                                            <span class="new">New</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <h2><a href="shop-product-right.html" tabindex="0">{{$related_product->product->designation}}</a></h2>
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
                                        <a href="shop-grid-right.html"> <img src="" alt="" />{{$category->designation}}</a><span class="count">30</span>
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
                                        <img src="{{asset('storage/images/products/'.$new_product->images[0]->lien)}}" alt="#" />
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a href="shop-product-detail.html">{{$new_product->designation}}</a></h5>
                                        <p class="price mb-0 mt-5">{{number_format($new_product->minPrice())}} Da</p>
                                        <div class="product-rate">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                    </div>
                                </div>
                               @endforeach
                               
                            </div>
                            <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                                <img src="assets/imgs/banner/banner-11.png" alt="" />
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
                 
                    $(".price-promo").text(res.price +' Da');
                }
               
				
			}
		});
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