@extends('layouts.front')
@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Checkout</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">Il y a <span class="text-brand">3</span> produit(s) dans votre panier</h6>
                </div>
            </div>
        </div>
        <form action="{{asset('/redirection')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <div class="row mb-50">
                    <div class="col-lg-6">
                            <form method="post" class="apply-coupon">
                                <input type="text" placeholder="Entrer code coupon...">
                                <button class="btn  btn-md" name="login">Valider</button>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <h4 class="mb-30">Détails de la facturation</h4>
                        <form method="post">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" required name="first_name" placeholder="Nom *">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" required name="last_name" placeholder="Prénom *">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="email" required placeholder="Email *">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" name="phone" required placeholder="Téléphone">
                                </div>
                            </div>
                            <div class="row shipping_calculator">
                                <div class="form-group col-lg-6">
                                    <div class="custom_select">
                                        <select class="form-control select-active" id="wilayas" name="wilaya">
                                            <option value="">Wilayas...</option>
                                            @foreach ($wilayas as $wilaya)
                                                <option value="{{$wilaya->wilaya}}">{{$wilaya->wilaya}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="custom_select">
                                        <select class="form-control select-active" id="communes" name="commune">
                                            <option value="">Communes...</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row shipping_calculator">
                                <div class="form-group col-lg-6">
                                    <div class="custom_select">
                                        <select class="form-control select-active" id="centers" name="center">
                                            <option value="">Centres...</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input required type="text" name="address" placeholder="Adresse *">
                                </div>
                            </div>

                            <div class="form-group mb-30">
                                <textarea rows="5" placeholder="Ajouter une remarque" name="ordernote"></textarea>
                            </div>


                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="border p-40 cart-totals ml-30 mb-50">
                        <div class="d-flex align-items-end justify-content-between mb-30">
                            <h4>Détail de la commande</h4>
                        </div>
                        <div class="divider-2 mb-30"></div>
                        <div class="table-responsive order_table checkout">
                            <table class="table no-border">
                                <tbody>
                                    @foreach($cartitems as $cartitem)
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{ asset('storage/images/products/'.$cartitem->productline->product->images[0]->lien) }}" alt="#"></td>
                                            <td>
                                                <h6 class="w-160 mb-5"><a href="shop-product-full.html" class="text-heading">{{ $cartitem->productline->product->designation }}</a></h6></span>
                                                <div class="product-rate-cover">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width:90%">
                                                        </div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="text-muted pl-20 pr-20">x {{ $cartitem->qte }}</h6>
                                            </td>
                                            <td>
                                                <h4 class="text-brand">{{$cartitem->total }} Da</h4>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><h4 class="w-160 mb-5">Total</h4></td>
                                        <td><h4 class="text-brand ">{{ $total->sum }} Da</h4></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4 class="mb-30">Livraison</h4>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <ul class="shipping-type">
                                                <li>
                                                    <div class="custome-radio">
                                                        <input class="form-check-input shipping-redio" id="bureau" value="bureau" type="radio" name="shipping" checked>
                                                        <label class="form-check-label" for="bureau" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">bureau : <span id="bureau-cost" >0</span> da</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custome-radio">
                                                        <input class="form-check-input shipping-redio"  type="radio" name="shipping" id="domicile" value="domicile" >
                                                        <label class="form-check-label" for="domicile" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">à domicile : <span id="domicile-cost" >0</span>  da</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><h4 class="w-160 mb-5">Total</h4></td>
                                        <td><h4 class="text-brand total-price">{{$total->sum}} Da</h4></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="payment ml-30">
                        <h4 class="mb-30">Paiement</h4>
                        <div class="payment_option">
                            <div class="custome-radio">
                                <input class="form-check-input" required type="radio" name="payment_option" id="exampleRadios3" checked>
                                <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">Paiement à la livraison</label>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-fill-out btn-block mt-30">Commander<i class="fi-rs-sign-out ml-15"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

@endsection
@push('shipping-script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $( "#wilayas" ).change(function() {
        var name = $(this).val();
        var data ="";
        var datacenter ="";
        $.ajax({
			url: '/get-communes/'+name ,
			type: 'GET',

        success: function (res) {
                $.each(res, function(i, res) {
                    data = data + '<option value="'+ res.commune+ '" >'+ res.commune+ '</option>';
                });
                $('#communes').html(data);
                $('#communes').niceSelect('update');
            }

        });

        $.ajax({
			url: '/get-centers/'+name ,
			type: 'GET',

        success: function (center) {
                $.each(center, function(i, center) {
                    datacenter = datacenter + '<option value="'+ center.center_id+ '" >'+ center.name+ '</option>';
                });
                $('#centers').html(datacenter);
                $('#centers').niceSelect('update');
            }

        });
    });



$( "#communes" ).change(function() {
        var wilaya = $('#wilayas').val();
        var commune = $(this).val();
        var total = '{{$total->sum}}';
        check = $('input[name="shipping"]:checked', '.shipping-type').val();

       $.ajax({
			url: '/get-cost/'+wilaya+'/'+ commune ,
			type: 'GET',

        success: function (res) {

                $('#bureau-cost').html(res.price_b);
                $('#domicile-cost').html(res.price_a + res.supp);
                if(check == 'bureau'){
                    total_final = parseFloat(total) + parseFloat(res.price_b);
                    $('.total-price').html(total_final +'Da');
                }
                if(check == 'domicile'){
                    total_final = parseFloat(total) + parseFloat(res.price_a) + parseFloat(res.supp) ;
                    $('.total-price').html(total_final +'Da');
                }

            }

        });
    });

</script>
<script>
$('.shipping-redio').on('click', function() {
      var wilaya = $('#wilayas').val();
      var commune = $('#communes').val();
      var total = '{{$total->sum}}';
      check = $('input[name="shipping"]:checked', '.shipping-type').val();
      $.ajax({
			url: '/get-cost/'+wilaya+'/'+ commune ,
			type: 'GET',

        success: function (res) {

                if(check == "bureau"){
                    total = parseFloat(total) + parseFloat(res.price_b);
                    $('.total-price').html(total + ' Da');
                }
                if(check == "domicile"){
                    total = parseFloat(total) + parseFloat(res.price_a) + parseFloat(res.supp) ;
                    $('.total-price').html(total + ' Da');
                }

            }

        });

    });

    $('#coupon-btn').on('click', function() {
        if($('input[name=coupon]').val() == 'cosmekarn100'){
            $('.total-price').text(100 + ' Da');
        }
        else{
            alert('coupon incorrect');
        }

    });
    $( ".btn-submit" ).click(function(e) {
    if(terms.checked) {
     $(this).parents("form:first").submit();
    }
    else{
        e.preventDefault();
        $(".alert-condition").css("display", "block");
    }
});
</script>
@endpush
