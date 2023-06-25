@extends('layouts.front')
@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Cart
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        @if(Auth::user())
            <form action="{{url('carts/'.$cart->id)}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @csrf
        @else
            <form action="{{url('carts/'.$cart)}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @csrf
        @endif

        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Votre panier</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">Vous avez <span class="text-brand"> {{$nbr_cartitem}} </span> produit(s) dans votre panier</h6>
                    <h6 class="text-body"><a href="{{url('/delete-cartitems')}}" class="text-muted"><i class="fi-rs-trash mr-5"></i>Vider le panier</a></h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <th class="custome-checkbox start pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                    <label class="form-check-label" for="exampleCheckbox11"></label>
                                </th>
                                <th scope="col" colspan="2">Produit</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Qte</th>
                                <th scope="col">Total</th>
                                <th scope="col" class="end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartitems as $item)
                            <tr class="pt-30" id="item{{$item->id}}">
                                <td class="custome-checkbox pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                    <label class="form-check-label" for="exampleCheckbox1"></label>
                                </td>
                                <td class="image product-thumbnail pt-40"><img src="{{asset('storage/images/products/'.$item->productline->product->images[0]->lien)}}" alt="#"></td>
                                <td class="product-des product-name">
                                    <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="shop-product-right.html">{{$item->productline->product->designation}} @if($item->productline->attributeLine)-{{ $item->productline->attributeLine->value }}@endif</a></h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-body">{{number_format($item->price)}} Da</h4>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    <div class="detail-extralink mr-15">
                                        <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <input type="text" name="qtes[]" class="qty-val" value="{{$item->qte}}" min="1">
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="item[]" value="{{$item->id}}">
                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-brand">{{number_format($item->total)}} Da</h4>
                                </td>

                                <td class="action text-center" data-title="Remove"><a class="text-body delete-item" data-id="{{$item->id}}"><i class="fi-rs-trash"></i></a></td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="cart-action d-flex justify-content-between">
                    <a class="btn "><i class="fi-rs-arrow-left mr-10"></i>Continuer vos achats</a>
                    <button type="submit" class="btn  mr-10 mb-sm-15"><i class="fi-rs-refresh mr-10"></i>Mettre à jour le panier</button>
                </div>
            </form>

            </div>
            <div class="col-lg-4">
                <div class="border p-md-4 cart-totals ml-30">
                    <form action="{{url('checkout')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Total</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">{{ number_format($total->sum,2) }} Da</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden"value="{{ $cart_id }}" name="cart_id">
                      <button type="submit" class="btn mb-20 w-100">Procéder au paiement<i class="fi-rs-sign-out ml-15"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('delete-item')
<script>
    $( ".delete-item" ).click(function() {
        var id = $(this).attr("data-id");
        var item = $('#item'+id).val();
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
			url: '/carts/'+id ,
			type: 'DELETE',
            data: {
            "id": id,
            "_token": token,
        },
            success: function (res) {

              $("#item"+id).css("display", "none");

                    $("#list"+id).css("display", "none");
                    $(".nbr_product").text(res.nbr_cartitem);
                    $(".total").text(res.total +' Da');


             }
		});
});
</script>
@endpush
