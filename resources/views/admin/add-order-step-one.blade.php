@extends('layouts.dashboard-admin')

@section('content')
<style>
.select2-selection {
  min-height: 3.5rem !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height: 3.2rem !important;
}
.select2-container--default .select2-selection--single .select2-selection__arrow b {
    margin-top: 7px !important;
}
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Welcome!</h4>
                    <span>Add a commande</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Add</a></li>
                </ol>
            </div>
        </div>
       <form action="{{url('/admin/add-order-step-two')}}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="row ">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add a commande</h4>
                    </div>
                    <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>First name* :</label>
                                        <input class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="Nom" required>
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class=" col-md-3">
                                        <label>last name* :</label>
                                        <input class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Prenom" required>
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class=" col-md-3">
                                        <label>Phone* :</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="xx xx xx xx" required>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class=" col-md-3">
                                        <label>Address* :</label>
                                        <input class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Adresse" required>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class=" col-md-3">
                                        <label>Wilaya* :</label>
                                        <select class="multi-select" id="wilaya" name="wilaya" required>
                                            <option>selectionner la wilaya...</option>
                                            @foreach($wilayas as $wilaya)
                                                <option value="{{$wilaya->wilaya}}"> {{$wilaya->wilaya}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class=" col-md-3">
                                        <label>Commune* :</label>
                                        <select class="multi-select"  id="commune" name="commune"  required>

                                        </select>

                                    </div>
                                    <div class=" col-md-3">
                                        <label>Centre : </label>
                                        <select class="multi-select" name="center" id="center">

                                        </select>

                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <label>Delivery :</label> <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="shipping" id="inlineRadio1" value="bureau" checked  >
                                            <label class="form-check-label" for="inlineRadio1">At the office</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="shipping" id="inlineRadio2" value="domicile" >
                                            <label class="form-check-label" for="inlineRadio2">At home</label>
                                        </div>
                                    </div>
                                </div>

                    </div>
                </div>
            </div>
     </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Order details </h4>
                    </div>
                    <div class="card-body " id="variation" >
                       <div class="basic-form d-flex justify-content-center" >
                            <div class="col-md-8">
                                <table id="tblattribute" class="table table-bordered mt-3 ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product - attribute</th>
                                            <th scope="col">Qte</th>
                                            <th scope="col">#</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dynamicAddRemove" >
                                            <tr>
                                                <td style="width: 30%">
                                                    <div class="input-group">
                                                        <select name="product[]" id="select-product" class="multi-select">
                                                            @foreach ($productlines as $line)
                                                              <option value="{{$line->id}}">{{$line->product->designation }}  &nbsp;&nbsp;   @if($line->attributeLine){{$line->attributeLine->value}}@endif </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </td>

                                                <td  style="width: 10%">
                                                    <div class="input-group">
                                                       <input type="number" value="1" class="form-control" name='qte[]'>
                                                    </div>
                                                </td >

                                                <td style="width: 5%">
                                                    <button type="button" id="add-productline" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                             </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                <div class="card-body text-center">
                    <button type="submit" class="btn btn-primary mt-3">View Details</button>
                    </form>
                </div>
               </div>
            </div>
        </div>
        </form>
    </div>
</div>

<div id="modal-add-attribute">
</div>

@endsection

@push('add-order-script')

<script>
    $( "#wilaya" ).change(function() {

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
                $('#commune').html(data);

            }

        });

        $.ajax({
			url: '/get-centers/'+name ,
			type: 'GET',

        success: function (center) {
                $.each(center, function(i, center) {
                    datacenter = datacenter + '<option value="'+ center.center_id+ '" >'+ center.name+ '</option>';
                });
                $('#center').html(datacenter);

            }

        });
    });

</script>
<script type="text/javascript">
$(document).on('click', '#add-productline', function () {
    var data = $('#select-product').html();
    var newRow = $('<tr>' +
                '<td style="width: 30%">' +
                '<div class="input-group">' +
                '<select name="product[]" class="single-select">' +
                data +
                '</select>' +
                '</div>' +
                '</td>' +
                '<td style="width: 10%">' +
                '<div class="input-group">' +
                '<input type="number" value="1" class="form-control" name="qte[]">' +
                '</div>' +
                '</td>' +
                '<td>' +
                '<button type="button" class="btn btn-danger shadow btn-xs sharp delete-product"><i class="fa fa-trash"></i></button>' +
                '</td>' +
                '</tr>');

    $("#dynamicAddRemove").append(newRow);

    // Réinitialiser Select2 pour le nouveau select élément
    newRow.find('select.single-select').select2();

    $(document).on('click', '.delete-product', function () {
        $(this).parents('tr').remove();
    });
});
</script>
@endpush



