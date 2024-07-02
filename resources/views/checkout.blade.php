@extends('layouts.front')
@section('content')

<style>
    .cost-text{
        font-weight: 800;
        color: #CE0000;
    }
</style>
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ asset('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>home</a>
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
                    <h6 class="text-body">You have <span class="text-brand nbr-cartitem"> {{$cartData['nbr_cartitem']}} </span>item(s) in your cart</h6>
                </div>
            </div>
        </div>
        <form action="{{asset('/redirection')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <h4 class="mb-30">Billing details</h4>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" required name="first_name" value="{{ Auth::user()->first_name }}" placeholder="First name *" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" required name="last_name" value="{{ Auth::user()->last_name }}" placeholder="last name *" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="email" required placeholder="Email *" value="{{ Auth::user()->email }}" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" name="phone" required placeholder="Phone" value="{{ Auth::user()->phone }}" required>
                                </div>
                            </div>
                            <div class="row shipping_calculator">
                                <div class="form-group col-lg-6">
                                    <div class="custom_select">
                                        <select class="form-control select-active" id="wilayas" name="wilayas" required>
                                            <option value="">Wilayas...</option>
                                            @foreach ($wilayas as $wilaya)
                                                <option value="{{$wilaya->id}}">{{$wilaya->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="custom_select">
                                        <select class="form-control select-active" id="communes" name="communes" required>
                                            <option value="">Communes...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input required type="text" name="address" placeholder="Adresse *" required>
                                </div>
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" placeholder="Add a note" name="ordernote"></textarea>
                            </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="border p-40 cart-totals ml-30 mb-50">
                        <div class="d-flex align-items-end justify-content-between mb-30">
                            <h4>Order details</h4>
                        </div>
                        <div class="divider-2 mb-30"></div>
                        <div class="table-responsive order_table checkout">
                            <table class="table no-border">
                                <tbody>
                                    @foreach($cartData['cartitems'] as $cartitem)
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{ asset('storage/images/products/'.$cartitem->productline->product->images[0]->lien) }}" alt="#"></td>
                                            <td>
                                                <h6 class="w-160 mb-5"><a href="shop-product-full.html" class="text-heading">{{ $cartitem->productline->product->designation }}</a></h6></span>
                                            </td>
                                            <td>
                                                <h6 class="text-muted pl-20 pr-20">x {{ $cartitem->qte }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="text-brand">{{$cartitem->total }} Da</h6>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td><h6 class="w-160 mb-5">Sub Total :</h6></td>
                                        <td><h6 class="text-brand ">{{$cartData['total']->sum }} Da</h6></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="mb-30">Delivery Cost :</h6>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <ul class="shipping-type">
                                                <li>
                                                    <div class="custome-radio">
                                                        <input class="form-check-input shipping-redio" id="bureau" value="bureau" type="radio" name="shipping" checked>
                                                        <label class="form-check-label" for="bureau" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">Stopdesk : <span class="cost-text" id="bureau-cost" >0 Da</span> </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custome-radio">
                                                        <input class="form-check-input shipping-redio"  type="radio" name="shipping" id="domicile" value="domicile" >
                                                        <label class="form-check-label" for="domicile" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">At home : <span class="cost-text" id="domicile-cost" >0 Da</span></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><h4 class="w-160 mb-5">Total :</h4></td>
                                        <td><h4 class="text-brand total-price">{{$cartData['total']->sum}} Da</h4></td>
                                    </tr>


                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-fill-out btn-block mt-30" style="width: 100%;">Order<i class="fi-rs-sign-out ml-15"></i></button>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </form>
    </div>
</main>

@endsection
@push('shipping-script')
<script>
$( "#wilayas" ).change(function() {
        var wilaya = $('#wilayas').val();
        var total = '{{$cartData['total']->sum}}';
        check = $('input[name="shipping"]:checked', '.shipping-type').val();
        var data ="";
        $.ajax({
			url: '/get-communes/'+wilaya ,
			type: 'GET',

            success: function (res) {
    var data = '';

    if (res && res.communes && Array.isArray(res.communes) && res.communes.length) {
        $.each(res.communes, function(i, commune) {
            data += '<option value="'+ commune.name + '">' + commune.name + '</option>';
        });
    } else {
        data += '<option value="In salah">In salah</option>';
    }

    $('#communes').html(data);
    // $('#communes').niceSelect('update');
}

        });
        $.ajax({
			url: '/get-cost/'+wilaya ,
			type: 'GET',
        success: function (res) {

                $('#bureau-cost').html(res.stopdesk);
                $('#domicile-cost').html(res.domicile);
                if(check == 'bureau'){
                    total_final = parseFloat(total) + parseFloat(res.stopdesk);
                    $('.total-price').html(total_final +'Da');
                }
                if(check == 'domicile'){
                    total_final = parseFloat(total) + parseFloat(res.domicile);
                    $('.total-price').html(total_final +'Da');
                }

            }

        });
    });
</script>
<script>
$('.shipping-redio').on('click', function() {
      var wilaya = $('#wilayas').val();
      var total = '{{$cartData['total']->sum}}';
      check = $('input[name="shipping"]:checked', '.shipping-type').val();
      $.ajax({
			url: '/get-cost/'+wilaya,
			type: 'GET',

        success: function (res) {
            if(check == 'bureau'){
                total_final = parseFloat(total) + parseFloat(res.stopdesk);
                $('.total-price').html(total_final +'Da');
                }
            if(check == 'domicile'){
                 total_final = parseFloat(total) + parseFloat(res.domicile);
                $('.total-price').html(total_final +'Da');
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
