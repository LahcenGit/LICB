<div class="row product-grid">
    @foreach($products as $product)
        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
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
                        <a aria-label="Ajouter au favoris" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                        <a aria-label="Voir le produit" class="action-btn" data-bs-toggle="modal" href="{{ asset('product/'.$product->slug) }}" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                    </div>
                    <div class="product-badges product-badges-position product-badges-mrg">
                        <span class="hot">New</span>
                    </div>
                </div>
                <div class="product-content-wrap">
                    <h2><a href="{{ asset('product/'.$product->slug) }}">{{ $product->designation }}</a></h2>
                    <div class="product-rate-cover">
                        <div class="product-rate d-inline-block">
                            <div class="product-rating" style="width: 90%"></div>
                        </div>
                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                    </div>
                    <div class="product-card-bottom">
                        <div class="product-price">
                            @if($product->getPricePromo())
                                <span>{{ number_format($product->getPricePromo() ,2) }} Da</span>
                                <span class="old-price">{{ number_format($product->getPrice() ,2) }} Da</span>
                            @else
                                <span>{{ number_format($product->getPrice(),2) }} Da</span>
                            @endif
                        </div>
                        <div class="add-cart">
                            <a class="add" href="{{ asset('product/'.$product->slug) }}">Voir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!-- Pagination Area -->
<div class="pagination-area mt-20 mb-20">
    <nav aria-label="Page navigation example">
        @include('vendor.pagination.custom-pagination', ['paginator' => $products])
    </nav>
</div>
