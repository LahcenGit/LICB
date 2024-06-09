@extends('layouts.dashboard-admin')

<style>


.custom-file-upi {
  display: inline-block;
  position: relative;
}

.file-input-button {
  background-color: red;
  border: 1px solid gray;
  border-radius: 5px;
  color: white;
  cursor: pointer;
  display: inline-block;
  padding: 10px 20px;
}

#fileInput {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  opacity: 0;
  width: 100%;
  height: 100%;
}


.delete {
  background-color: transparent;
  border: none;
  color: red;
  font-size: 16px;
  cursor: pointer;

}

.delete::before {
  content: "×";
}

.img-container img {
  width: 100px;
  height: 100px;
  object-fit: cover;
}

.img-container {
  display: inline-block;
  margin-right: 10px;
  border: 1px dotted gray;
}

.browse-btn {
  background-color: #202020;
  border: 1px solid #BC221A;
  border-radius: 10px;
  color: #BC221A;
  display: inline-block;
  font-size: 14px;
  cursor: pointer;
  padding: 10px 20px;

}

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
@section('content')


<div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Products</a></li>
					</ol>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                       Svp ! Corrigez les erreurs suivantes :
                       <div class="mb-2"></div>
                    <div class="error">
                        <ul class="ml-2">
                            @foreach ($errors->all() as $error)
                                <li style="font-weight:100; ">- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    </div>
                @endif

                <form action="{{url('admin/products')}}" id="addProduct"  method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="row ">
                   <div class="col-xl-8 col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Product</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Designation*:</label>
                                                    <input type="text" class="form-control" placeholder="FORGE 12-3 RX65" name="designation" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label>Points:</label>
                                                    <input type="text" class="form-control" placeholder="0" name="point">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-3">
                                                    <label class="form-label">Price:</label>
                                                    <input type="text" class="form-control"  placeholder="0.00" name="price">
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label>Promo:</label>
                                                    <input type="text" class="form-control" placeholder="0.00" name="promo">
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label class="form-label">Qte:</label>
                                                    <input type="number" class="form-control" placeholder="0" name="qte" id="qte" >
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label class="form-label">Weight:</label>
                                                    <input type="text" class="form-control" placeholder="1" name="weight" >
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label class="form-label">Brand *:</label>
                                                    <select class="multi-select" name="brand" id="brand">
                                                        <option value="">Nothing selected</option>
                                                        @foreach($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->designation }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label class="form-label">Status:</label>
                                                        <select id="inputState" class="default-select form-control wide" name="status">
                                                            <option value="">Nothing selected</option>
                                                            <option value="1">New</option>
                                                            <option value="2">SOON</option>
                                                            <option value="2">MAKE TO ORDER</option>
                                                            <option value="2">IT'S BACK</option>
                                                        </select>
                                                    </div>
                                                <div class="mb-3 col-md-4">
                                                    <label>Date:</label>
                                                    <input name="date" class="form-control" type="date">
                                                </div>
                                            </div>

                                    </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Categories</h4>
                                </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                                <div class="categories overflow-auto" style="max-width: 260px; max-height:300px;">
                                                    @include('categories')
                                                </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Short Description : </h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                         <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <textarea class="summernote" class="form-control " style="background-color: #202020; color:##202020" name="short_description" >{{old('short_description')}}</textarea>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Main Photo</h4>
                                </div>
                                <div class="card-body">
                                    <div class="input-photoPrincipale-add">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-xxl-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Long Description</h4>
                                </div>
                                <div class="card-body custom-ekeditor">
                                <textarea class="summernote" class="form-control " style="background-color: #202020; color:##202020" name="long_description" >{{old('description')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Secondary Photos</h4>
                                </div>
                                <div class="card-body">
                                    <div class="input-photos">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Associated Products</h4>
                                </div>
                                <div class="card-body">
                                    <label>Select products :</label>
                                    <select class="multi-select"  name="relatedproducts[]" multiple="multiple">
                                            @foreach($productlines as $productline)
                                            <option value="{{ $productline->id }}">{{ $productline->product->designation }}@if($productline->attributeLine)-{{ $productline->attributeLine->value }}@endif</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Variation ?</h4>
                                    <input type="checkbox" class="form-check-input" id="check" value="oui" name="check" >
                                </div>
                                <div class="card-body " id="variation" style="display: none;">
                                    <div class="basic-form d-flex justify-content-center" >
                                        <div class="col-md-10">
                                            <table class="table table-bordered mt-3 ">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Attribut</th>
                                                        <th scope="col">Valeur</th>
                                                        <th scope="col">Qte</th>
                                                        <th scope="col">Prix</th>
                                                        <th scope="col">Promo</th>
                                                        <th scope="col">Icon</th>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">#</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="dynamicAddRemove"  >
                                                        <tr>
                                                            <td style="width: 15%">
                                                                <select  id="select-content"  class="default-select form-control wide " name="as[0]"  >
                                                                    <option value="0">Nothing Selected</option>
                                                                    @foreach($attributes as $a)
                                                                    <option value="{{$a->id}}">{{$a->value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td style="width: 15%">
                                                                <select  id="select-value" class="default-select form-control wide " name="values[0]"  >
                                                                </select>
                                                            </td>
                                                            <td style="width:  10%">
                                                                <input type="text" class="form-control" placeholder="0" name="qtes[0]">
                                                            </td>
                                                            <td  style="width: 15%">
                                                                <input type="text" class="form-control price" placeholder="0.00" name="prices[0]">
                                                            </td>
                                                            <td style="width: 15%">
                                                                <input type="text" class="form-control price" placeholder="0.00" name="promos[0]">
                                                            </td>
                                                            <td>
                                                                <label for="icon-0" style="cursor: pointer;">
                                                                    <img id="icon-show-0" src="{{asset('image-upload.png')}}" width="50" height="50" alt="" >
                                                                </label>
                                                                <input type="file" class="input-image" id="icon-0" name="icons[]" accept="image/png, image/jpeg" style="display: none; visibility:none;">
                                                            </td>
                                                            <td>
                                                                <label for="image-0" style="cursor: pointer;">
                                                                    <img id="image-show-0" src="{{asset('image-upload.png')}}" width="70" height="70" alt="" >
                                                                </label>
                                                                <input type="file" class="input-image" id="image-0" name="images[]" accept="image/png, image/jpeg" style="display: none; visibility:none;">
                                                            </td>
                                                            <td>
                                                                <button type="button" id="add-attribute" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-plus"></i></button>
                                                            </td>
                                                        </tr>

                                                </tbody>
                                            </table>
                                         </div>
                                     {{-- <div class="row mt-4">
                                                <div style="width: 200px; margin-right:10px;">
                                                <label class="form-label">Attribut:</label>
                                                <select  id="select-content"  class="default-select form-control wide " name="as[0]"  >
                                                    <option value="0">Nothing Selected</option>
                                                    @foreach($attributes as $a)
                                                    <option value="{{$a->id}}">{{$a->value}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                                <div style="width: 200px; margin-right:10px;">
                                                <label class="form-label">Valeur:</label>
                                                <select  id="select-value" class="default-select form-control wide " name="values[0]"  >

                                                </select>
                                                </div>
                                                <div style="width: 200px; margin-right:10px;">
                                                    <label class="form-label">Qte:</label>
                                                    <input type="number" class="form-control" placeholder="0" name="qtes[0]">
                                                </div>
                                                <div style="width: 200px; margin-right:10px;">
                                                    <label class="form-label">Prix:</label>
                                                    <input type="number" class="form-control price" placeholder="0.00" name="prices[0]">
                                                </div>
                                                <div style="width: 200px; margin-right:10px;">
                                                    <label class="form-label">Promo:</label>
                                                    <input type="number" class="form-control price" placeholder="0.00" name="promos[0]">
                                                </div>
                                                <div style="width: 100px; ">
                                                    <label >icon : </label> <br>
                                                    <label for="icon-0" style="cursor: pointer;">
                                                        <img id="icon-show-0" src="{{asset('image-upload.png')}}" width="50" height="50" alt="" >
                                                    </label>
                                                    <input type="file" class="input-image" id="icon-0" name="icons[]" accept="image/png, image/jpeg" style="display: none; visibility:none;">
                                                </div>
                                                <div style="width: 100px; margin-right:10px;">
                                                    <label >image : </label> <br>
                                                    <label for="image-0" style="cursor: pointer;">
                                                        <img id="image-show-0" src="{{asset('image-upload.png')}}" width="100" height="100" alt="" >
                                                    </label>
                                                    <input type="file" class="input-image" id="image-0" name="images[]" accept="image/png, image/jpeg" style="display: none; visibility:none;">
                                                </div>
                                                <div style="width: 50px; margin-right:10px;">
                                                    <button type="button" id="add-attribute" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-plus"></i></button>
                                                </div>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Compatibility</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                          <label for="p_TYPE" class="form-label">Processor TYPE:</label>
                                          <select class="default-select form-control wide" name="p_TYPE" id="p_TYPE">
                                            <option value="">Nothing selected</option>
                                            <option value="intel">INTEL</option>
                                            <option value="amd">AMD</option>
                                          </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                          <label for="p_GEN" class="form-label">Processor GEN:</label>
                                          <select class="default-select form-control wide" name="p_GEN" id="select-result">
                                            <option value="">Nothing selected</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Motherboard TYPE:</label>
                                            <select  class="default-select form-control wide" name="m_TYPE" id="m_TYPE">
                                                <option value="">Nothing selected</option>
                                                <option value="intel">INTEL</option>
                                                <option value="amd">AMD</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="m_GEN" class="form-label">Motherboard GEN:</label>
                                            <select class="multi-select" name="m_GEN[]" id="m_GEN" multiple="multiple">
                                              <option value="">Nothing selected</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                        <label class="form-label">Motherboard DDR:</label>
                                        <select class="default-select form-control wide"  name="m_DDR" placeholder="Nothing selected">
                                                <option value="">Nothing selected</option>
                                                <option value="DDR4">DDR4</option>
                                                <option value="DDR5">DDR5</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">RAM DDR:</label>
                                            <select class="default-select form-control wide" name="r_DDR">
                                                <option value="">Nothing selected</option>
                                                <option value="DDR4">DDR4</option>
                                                <option value="DDR5">DDR5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check mb-2">
                                            <label class="form-check-label" for="check1">Draft ?</label>
                                            <input type="checkbox" class="form-check-input" id="check1" value="1" name="draft">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check mb-2">
                                                <label class="form-check-label" for="check1">Free shipping ?</label>
                                                <input type="checkbox" class="form-check-input" id="check1" value="1" name="free_shipping">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                        <div class="card-body text-center">
                            <button type="submit"  class="btn btn-primary mt-3">Add Product</button>
                            </form>
                        </div>
                       </div>
                    </div>
                </div>

     </div>
</div>
<div id="modal-add-attribute">
</div>
<div id="modal-add-mark">
</div>

@endsection
@push('compatibility-script')
<script>
$(document).ready(function() {
  $('#p_TYPE').change(function() {
    var selectedType = $(this).val();

    $('#p_GEN').empty();

    if (selectedType === "intel") {
      var options = '<option value="">Nothing selected</option>' +
                    '<option value="10">10</option>' +
                    '<option value="11">11</option>' +
                    '<option value="12">12</option>' +
                    '<option value="13">13</option>' +
                    '<option value="14">14</option>';
    } else if (selectedType === "amd") {
      var options = '<option value="">Nothing selected</option>' +
                    '<option value="1000">1000</option>' +
                    '<option value="2000">2000</option>' +
                    '<option value="3000">3000</option>' +
                    '<option value="4000">4000</option>'+
                    '<option value="5000">5000</option>'+
                    '<option value="6000">6000</option>'+
                    '<option value="7000">7000</option>'+
                    '<option value="8000">8000</option>'+
                    '<option value="9000">9000</option>'+
                    '<option value="10000">10000</option>';
    }

    if (options) {
      $('#select-result').html(options);
      $('#select-result').niceSelect('update');

    }
  });
});
</script>

<script>
    $(document).ready(function() {
      $('#m_TYPE').change(function() {
        var selectedType = $(this).val();

        $('#m_GEN').empty();

        if (selectedType === "intel") {
          var options = '<option value="">Nothing selected</option>' +
                        '<option value="10">10</option>' +
                        '<option value="11">11</option>' +
                        '<option value="12">12</option>' +
                        '<option value="13">13</option>' +
                        '<option value="14">14</option>';
        } else if (selectedType === "amd") {
          var options = '<option value="">Nothing selected</option>' +
                        '<option value="1">1</option>' +
                        '<option value="2">2</option>' +
                        '<option value="3">3</option>' +
                        '<option value="4">4</option>';
        }

        if (options) {
          $('#m_GEN').html(options);
          $('#m_GEN').niceSelect('update');

        }
      });
    });
    </script>
@endpush
@push('add-attribute-scripts')

<script>
    $('.input-photoPrincipale-add').imageUploader({
		maxFiles: 1,
        imagesInputName: 'photoPrincipale',
	});
</script>

<script>
    $( "#check" ).prop( "checked", false );
    $("#check").on('change',function(){

     if(this.checked) {
         $("#variation").css("display", "block");
         $("#select-content").prop('required',true);
     }
     else{
         $("#select-content").prop('required',false);
         $("#variation").css("display", "none");
         $('.tradded').remove();
         }
     });
</script>


<script type="text/javascript">
		var i = 0;
		$("#add-attribute").click(function () {
			var options = $('#select-content').html();
			++i;
            $html = '<tr class="tradded">'+
                        '<td style="width: 15%">'+
                            '<select   class="default-select form-control wide select-attribute " name="as['+i+']">'+
                                options +
                            '</select>'+
                        '</td>'+
                        '<td style="width: 15%">'+
                            '<select   id="select-attr'+i+'" class="default-select form-control wide " name="values['+i+']">'+
                            '</select>'+
                        '</td>'+
                        '<td style="width:  10%">'+
                            '<input type="text" class="form-control" placeholder="0" name="qtes['+i+']">'+
                        '</td>'+
                        '<td  style="width: 15%">'+
                            '<input type="text" class="form-control price" placeholder="0.00" name="prices['+i+']">'+
                        '</td>'+
                        '<td style="width: 15%">'+
                            '<input type="text" class="form-control price" placeholder="0.00" name="promos['+i+']">'+
                        '</td>'+
                        '<td>'+
                            '<label for="icon-'+i+'" style="cursor: pointer;">'+
                               '<img id="icon-show-'+i+'" src="{{asset('image-upload.png')}}" width="50" height="50" alt="" >'+
                            '</label>'+
                            '<input type="file" class="input-image" id="icon-'+i+'" name="icons[]" accept="image/png, image/jpeg" style="display: none; visibility:none;">'+
                        '</td>'+
                        '<td>'+
                           ' <label for="image-'+i+'" style="cursor: pointer;">'+
                                '<img id="image-show-'+i+'" src="{{asset('image-upload.png')}}" width="70" height="70" alt="" >'+
                           ' </label>'+
                            '<input type="file" class="input-image" id="image-'+i+'" name="images[]" accept="image/png, image/jpeg" style="display: none; visibility:none;">'+
                        '</td>'+
                        '<td>'+
                           ' <button type="button" id="delete-attribute" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>'+
                        '</td>'+
                    '</tr>';

			$html_temp = '<span><div class="row">'+
					'<div style="width: 200px; margin-right:10px;">'+
					'<label for="" >Attribute:</label>'+
					'<select  name="as['+i+']" id="select-attribute" class="default-select form-control wide " >'+
					 options +
					'</select>'+
					'</div>'+
                    '<div style="width: 200px; margin-right:10px;">'+
					'<label for="">Valeur:</label>'+
					'<select name="values['+i+']" id="select-attr'+i+'" class="default-select form-control wide ">'+
					'</select>'+
					'</div>'+
                    '<div style="width: 200px; margin-right:10px;">'+
						'<label>Qte:</label>'+
						'<input type="number" class="form-control" placeholder="0" name="qtes['+i+']">'+
				    '</div>'+
                    '<div style="width: 200px; margin-right:10px;">'+
						'<label>Prix:</label>'+
						'<input type="number" class="form-control " placeholder="0" name="prices['+i+']">'+
				    '</div>'+
                    '<div style="width: 200px; margin-right:10px;">'+
						'<label>Promo:</label>'+
						'<input type="number" class="form-control " placeholder="0" name="promos['+i+']">'+
				    '</div>'+
                    ' <div style="width: 100px; ">'+
                    '<label >icon : </label> <br>'+
                    '<label for="icon-'+i+'" style="cursor: pointer;">'+
                    '<img id="icon-show-'+i+'" src="{{asset('image-upload.png')}}" width="50" height="50" alt="" >'+
                    '</label>'+
                    '<input type="file" class="input-image" id="icon-'+i+'" name="icons[]" accept="image/png, image/jpeg" style="display: none; visibility:none;">'+
                    '</div>'+
                    '<div style="width: 100px; margin-right:10px;">'+
                    '<label >image : </label> <br>'+
                    '<label for="image-'+i+'" style="cursor: pointer;">'+
                    '<img id="image-show-'+i+'" src="{{asset('image-upload.png')}}" width="100" height="100" alt="" >'+
                    '</label>'+
                    '<input type="file" class="input-image" id="image-'+i+'" name="images[]" accept="image/png, image/jpeg" style="display: none; visibility:none;">'+
                    '</div>'+
                    '<div style="width: 50px; margin-right:10px;">'+
                    ' <button type="button" id="delete-attribute" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>'+
                    '</div>	</div><span>';

			$("#dynamicAddRemove").append($html);
			$('select').niceSelect();

		$(document).on('click', '#delete-attribute', function () {
                $(this).parents('tr').remove();
            });

        $(document).on('change', '.select-attribute', function () {
                var id = $(this).val();
                var data ="";

                $.ajax({
                    url: '/get-attribute/' + id,
                    type: "GET",

                    success: function (res) {

                        $.each(res, function(i, res) {
                        data = data + '<option value="'+ res.id+ '" >'+ res.value + '</option>';
                        });

                        $('#select-attr'+i).html(data);
                        $('#select-attr'+i).niceSelect('update');
                        $('#select-attr'+i).niceSelect('update');

                    }
                });
		});


		});
	</script>


@endpush
@push('add-image-scripts')

<script>
    var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    var b = document.querySelector("button");
    output.setAttribute("style", "width: 200px; height: 200px;");

    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
    };
</script>
@endpush


@push('generate-attribute-scripts')
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
 });

	$("#select-content").change(function() {

		var id = $(this).val();
		var data ="";

		$.ajax({
			url: '/get-attribute/' + id,
			type: "GET",

			success: function (res) {

				$.each(res, function(i, res) {
				data = data + '<option value="'+ res.id+ '" >'+ res.value + '</option>';
				});

				$('#select-value').html(data);
				$('#select-value').niceSelect('update');
				$('#select-value').niceSelect('update');

			}
		});

	});
</script>
@endpush

@push('set-required')
<script>
    $(document).ready(function() {
        $.validator.addMethod("notEqual", function(value, element, param) {
            return this.optional(element) || value != param;
        }, "Please select a valid option.");

        $("#addProduct").validate({
            rules: {
                designation: "required",
                'categories[]': {
                    required: true,
                    maxlength: 1
                },
                brand: {
                    required: true,
                    notEqual: ""
                }
            },
            messages: {
                designation: {
                    required: "Designation is required",
                },
                'categories[]': {
                    required: "Select a category",
                },
                brand: {
                    required: "Brand is required",
                    notEqual: "Please select a valid brand"
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "brand") {
                    error.insertAfter(element);
                } else {
                    error.insertAfter(element);
                }
            }
        });
    });
</script>
 @endpush
@push('show-variation-scripts')
<script>

   $("#check").on('change',function(){
    if(this.checked) {
        $("#variation").css("display", "block");
    }
    else{
        $("#variation").css("display", "none");
       }
    });

 </script>
@endpush

@push('add-image-icone-scripts')
<script>

    var storedFiles = [];

    $(document).ready(function () {
        $("body").on('change','.input-image',handleFileSelect);

    });

    function handleFileSelect(e) {
      id=  $(this).parent().find('img').attr("id");
      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      filesArr.forEach(function (f) {
        if (!f.type.match("image.*")) {
          return;
        }
        storedFiles.push(f);
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#'+ id).attr('src', e.target.result);
        };
        reader.readAsDataURL(f);
      });
    }

</script>
@endpush

@push('show-modal-scripts')
<script>
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(".add-attribute").on('click',function() {

    $.ajax({
      url: '/show-modal',
      type: "GET",
      success: function (res) {

        $('#modal-add-attribute').html(res);
        $('#modal-add-attribute').find("#type").niceSelect();
        $("#exampleModal").modal('show');
      }
    });

  });
  </script>
@endpush

@push('store-attribute-scripts')
<script>
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $("#modal-add-attribute").on('click','.storeAttribute',function(e){
          e.preventDefault();
          let attr = $('#attr').val();
          let type = $('#type').val();
          let code = $('#code').val();
          $.ajax({
            type:"Post",
            url: '/admin/attributes',
            data:{
              "_token": "{{ csrf_token() }}",
              attr:attr,
              type:type,
              code:code,
            },
            success:function(res){

              $('#exampleModal').modal('hide');
              toastr.success("Attribut ajouté avec succès", "Succès", {
                positionClass: "toast-bottom-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1

            }

        )
             },

            });

     });
  </script>
@endpush

@push('show-modal-add-mark-scripts')
<script>
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(".add-mark").on('click',function() {

    $.ajax({
      url: '/show-modal-add-mark',
      type: "GET",
      success: function (res) {

        $('#modal-add-mark').html(res);
        $("#exampleModal1").modal('show');
      }
    });

  });
  </script>
@endpush
@push('store-mark-scripts')
<script>
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $("#modal-add-mark").on('click','.storeMark',function(e){
          e.preventDefault();

          let designation = $('#designation').val();
          $.ajax({
            type:"Post",
            url: '/admin/marks',
            data:{
              "_token": "{{ csrf_token() }}",
              designation:designation,

            },
            success:function(res){

              $('#exampleModal1').modal('hide');

                toastr.success("Marque ajouté avec succès", "Succès", {
                    timeOut: 500000000,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-top-right",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1

            }

        )
             },

            });

     });
  </script>
@endpush


