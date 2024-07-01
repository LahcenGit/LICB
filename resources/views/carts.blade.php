@extends('layouts.front')
@section('content')
<style>
    .nav-tabs .nav-link:first-child{
        padding-left: 24px!important;
    }
    .nav-tabs .nav-link.active {
        color: #ffff;
        background-color: #BC221A;
    }
    .nav-tabs .nav-link:hover {
        color: #ffff;
        background-color: #BC221A;
    }
</style>



<main class="main">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ asset('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Cart
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <form action="{{url('carts/'.$cartData['cart_id'])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
        @csrf
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Your cart</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">You have <span class="text-brand nbr-cartitem"> {{$cartData['nbr_cartitem']}} </span>item(s) in your cart</h6>
                    <h6 class="text-body"><a href="{{url('/delete-cartitems')}}" class="text-muted"><i class="fi-rs-trash mr-5"></i>Empty the cart</a></h6>
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
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qte</th>
                                <th scope="col">Total</th>
                                <th scope="col" class="end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartData['cartitems'] as $item)
                            <tr class="pt-30" id="item{{$item->id}}">
                                <td class="custome-checkbox pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                    <label class="form-check-label" for="exampleCheckbox1"></label>
                                </td>
                                <td class="image product-thumbnail pt-40"><img src="{{asset('storage/images/products/'.$item->productline->product->images[0]->lien)}}" alt="#"></td>
                                <td class="product-des product-name">
                                    <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="shop-product-right.html">{{$item->productline->product->designation}} @if($item->productline->attributeLine)-{{ $item->productline->attributeLine->value }}@endif</a></h6>
                                    {{-- <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                         --}}

                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-body">{{number_format($item->price)}} Da</h4>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    <div class="detail-extralink mr-15">
                                        <div class="detail-qty border radius">
                                            <a href="#" class="qty-down" data-item-id="{{$item->id}}"><i class="fi-rs-angle-small-down"></i></a>
                                            <input type="text" name="qtes[]" class="qty-val" value="{{$item->qte}}" min="1" data-item-id="{{$item->id}}">
                                            <a href="#" class="qty-up" data-item-id="{{$item->id}}"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="item[]" value="{{$item->id}}">
                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-brand" id="total-{{$item->id}}">{{number_format($item->total)}} Da</h4>
                                </td>

                                <td class="action text-center" data-title="Remove"><a class="text-body delete-item" data-id="{{$item->id}}"><i class="fi-rs-trash"></i></a></td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="cart-action d-flex justify-content-between">
                    <a href="{{asset('/')}}">
                    <button class="btn mr-10 mb-sm-15"><i class="fi-rs-arrow-left mr-10"></i>Continue shopping</button>
                    </a>
                </div>
            </form>
            </div>
            <div class="col-lg-4">
                <div class="border p-md-4 cart-totals ml-30">
                    <form action="{{url('checkout')}}" id="form-checkout"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Total</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end" id="cart-total">{{ number_format($cartData['total']->sum,2) }} Da</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" value="{{ $cartData['cart_id'] }}" name="cart_id">
                      <button type="submit" class="btn mb-20 w-100">Payer<i class="fi-rs-sign-out ml-15"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered justify-content-center">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="nav nav-tabs" id="myTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="connexion-tab" data-bs-toggle="tab" href="#connexion" role="tab" aria-controls="connexion" aria-selected="true">Se Connecter</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="inscription-tab" data-bs-toggle="tab" href="#inscription" role="tab" aria-controls="inscription" aria-selected="false">S'Inscrire</a>
                    </li>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenu des onglets -->
                <div class="tab-content" id="myTabsContent">
                    <div class="tab-pane fade show active" id="connexion" role="tabpanel" aria-labelledby="connexion-tab">
                        <div class="mb-3 p-2 ">
                            <b style="font-weight: 500">Connectez-vous dès maintenant pour accéder à toutes les fonctionnalités</b>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                               <div class="form-group">
                                   <input type="text" required name="username" placeholder="Email ou Nom d'utilisateur  *" />
                               </div>
                               <div class="form-group">
                                   <input required="" type="password" name="password" placeholder="Mot de passe*" />
                               </div>
                               <div class="form-group ">
                                  <p class="text-center"> <a href="#" >Mot de passe oublié?</a></p>
                               </div>
                               <div class="d-flex justify-content-center">
                                    <input  type="hidden" name="routeToCheckout" value="1" />
                                    <button type="submit" class="btn btn-primary ">Connexion</button>
                                </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="inscription" role="tabpanel" aria-labelledby="inscription-tab">
                            <div class="mb-3 p-2 ">
                                <b style="font-weight: 500">Créer un compte pour accéder à toutes les fonctionnalités</b>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                   <div class="form-group">
                                       <input type="text"  name="first_name" placeholder="Nom*" required/>
                                   </div>
                                   <div class="form-group">
                                    <input type="text"  name="last_name" placeholder="Prénom*" required/>
                                   </div>
                                   <div class="form-group">
                                    <input type="text"  name="email" placeholder="Email*" required/>
                                   </div>
                                   <div class="form-group">
                                    <input type="text"  name="username" placeholder="Nom d'utilisateur*" required/>
                                   </div>
                                   <div class="form-group">
                                    <input type="text"  name="phone" placeholder="Numéro de téléphone*" required/>
                                   </div>
                                   <div class="form-group">
                                       <input  type="password" name="password" placeholder="Mot de passe*" required />
                                   </div>
                                   <div class="form-group">
                                    <input type="password" name="password_confirmation" placeholder="Confirm password" required />
                                   </div>
                                   <div class="d-flex justify-content-center">
                                        <input  type="hidden" name="routeToCheckout" value="1" />
                                        <button type="submit" class="btn btn-primary ">S'inscrire</button>
                                   </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



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
                    $(".nbr-cartitem").text(res.nbr_cartitem + ' ');
                    $("#cart-total").text(res.total +' Da');


             }
		});
});
</script>
@endpush
{{--

@push('checkout-registration')
<script>
     $('#form-checkout').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var form = this;
        $('#monBouton').prop('disabled', true);
        $.ajax({
            url: '/check-auth',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.isLoggedIn) {
                    form.submit();
                } else {
                    $('#exampleModal').modal('show');
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
</script>
@endpush
 --}}
@push('update-cart')
<script>
   $(document).ready(function() {
    function updateTotalPrice(itemId) {
        var quantity = parseInt($('input.qty-val[data-item-id="' + itemId + '"]').val());

        $.ajax({
            url: '/update-cart/' + itemId,
            type: 'POST',
            data: {
                qtes: [quantity],
                item: [itemId],
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#total-' + itemId).text(response.newTotal + ' Da');
                $('#cart-total').text(response.cartTotal + ' Da');
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }

    $('.qty-up').off('click').on('click', function(event) {
        event.preventDefault();
        var itemId = $(this).data('item-id');
        var qtyInput = $('input.qty-val[data-item-id="' + itemId + '"]');
        var currentVal = parseInt(qtyInput.val());
        qtyInput.val(currentVal + 1);
        updateTotalPrice(itemId);
    });

    $('.qty-down').off('click').on('click', function(event) {
        event.preventDefault();
        var itemId = $(this).data('item-id');
        var qtyInput = $('input.qty-val[data-item-id="' + itemId + '"]');
        var currentVal = parseInt(qtyInput.val());
        if (currentVal > 1) {
            qtyInput.val(currentVal - 1);
            updateTotalPrice(itemId);
        }
    });

    $('.qty-val').on('change', function() {
        var itemId = $(this).data('item-id');
        updateTotalPrice(itemId);
    });

    // Détecte aussi les entrées clavier et les mets à jour de manière appropriée
    $('.qty-val').on('keyup', function(event) {
        var itemId = $(this).data('item-id');
        var qtyInput = $(this);
        var currentVal = parseInt(qtyInput.val());
        if (!isNaN(currentVal) && currentVal >= 1) {
            updateTotalPrice(itemId);
        } else {
            qtyInput.val(1); // Définit une valeur minimale par défaut
        }
    });
});
</script>
@endpush
