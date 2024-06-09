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
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Produits</a></li>
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
                <form action="{{url('admin/products/'.$product->id)}}" id="addProduct"  method="POST"  enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @csrf

                <input type="hidden" id="preloaded-images" value="{{ $images_preload }}">
                <input type="hidden" id="preloaded-image-p" value="{{ $image_preload_p }}">

                <div class="row ">
                   <div class="col-xl-8 col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Produit</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Designation*:</label>
                                                    <input type="text" class="form-control" value="{{ $product->designation }}" name="designation" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label>Points:</label>
                                                    <input type="text" class="form-control" placeholder="0" value="{{ $product->point }}" name="point">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-3">
                                                    <label class="form-label">Price:</label>
                                                    @if($productlines->count() == 1)
                                                    <input type="text" class="form-control"  value="{{ $productlines[0]->price }}" placeholder="0.00" name="price">
                                                    @else
                                                    <input type="text" class="form-control"  value="" placeholder="0.00" name="price">
                                                    @endif
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label>Promo:</label>
                                                    @if($productlines->count() == 1)
                                                    <input type="text" class="form-control" value="{{  $productlines[0]->promo }}" placeholder="0.00" name="promo">
                                                    @else
                                                    <input type="text" class="form-control" placeholder="0.00" value="{{ $product->promo }}" name="promo">
                                                    @endif
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label class="form-label">Qte:</label>
                                                    <input type="number" class="form-control" value="{{ $product->qte }}" placeholder="0" name="qte" id="qte" >
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label class="form-label">Weight:</label>
                                                    <input type="text" class="form-control" placeholder="1" value="{{ $product->weight }}" name="weight" >
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label class="form-label">Brand *:</label>
                                                    <select class="multi-select" name="brand" id="brand">
                                                        <option value="">Nothing selected</option>
                                                        @foreach($brands as $brand)
                                                            <option value="{{ $brand->id }}" @if($product->mark_id == $brand->id) selected @endif>{{ $brand->designation }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label class="form-label">Status:</label>
                                                        <select id="inputState" class="default-select form-control wide" name="status">
                                                            <option value="">Nothing selected</option>
                                                            <option value="1" @if($product->status == "1") selected @endif>New</option>
                                                            <option value="2" @if($product->status == "2") selected @endif>SOON</option>
                                                            <option value="3" @if($product->status == "3") selected @endif>MAKE TO ORDER</option>
                                                            <option value="4" @if($product->status == "4") selected @endif>IT'S BACK</option>
                                                        </select>
                                                    </div>
                                                <div class="mb-3 col-md-4">
                                                    <label>Date:</label>
                                                    <input name="date" class="form-control" value="{{ $product->date }}" type="date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Catégories</h4>
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
                                                    <textarea class="summernote" class="form-control " style="background-color: #202020; color:##202020" name="short_description" >{{ $product->short_description }}</textarea>
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

                                    <div class="input-photoPrincipale">
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
                                <textarea class="summernote" class="form-control " style="background-color: #202020; color:##202020" name="long_description" >{{ $product->long_description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Secondary Photos</h4>
                                </div>
                                <div class="card-body">

                                    <div class="input-photos-pre">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Produits associés</h4>
                                </div>
                                <div class="card-body">
                                    <label>Séléctionnez des produits :</label>
                                    <select class="multi-select" id="search" name="relatedproducts[]" multiple="multiple">
                                        @foreach($all_productlines as $all_productline)
                                        <option value="{{ $all_productline->id }}"
                                            @if(in_array($all_productline->id, $relatedProductLines)) selected @endif>
                                            {{ $all_productline->product->designation }}
                                            @if($all_productline->attributeLine)
                                                - {{ $all_productline->attributeLine->value }}
                                            @endif
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Variation ?</h4>
                                    @if($productlines->count() >= 1 && $productlines[0]->attributeline_id != NULL )
                                    <input type="checkbox" class="form-check-input" id="check" value="oui" name="check" checked >
                                    @else
                                    <input type="checkbox" class="form-check-input" id="check" value="oui" name="check" >
                                    @endif
                                </div>
                                <div>

                            <div class="card-body " id="variation" @if($productlines->count() <= 1 && $productlines[0]->attributeline_id == NULL) style="display:none;" @endif>
                                <div class="basic-form d-flex justify-content-center" >
                                    <div class="col-md-10">
                                        <table class="table table-bordered mt-3">
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
                                                    <td>
                                                        <button type="button" id="add-attribute" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-plus"></i></button>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody id="dynamicAddRemove">
                                                @php
                                                $counter = 0;
                                                @endphp
                                                @if($productlines->count() >= 1 && $productlines[0]->attributeline_id != NULL)
                                                @foreach($productlines as $productline)
                                                    <tr>
                                                        <td style="width: 15%">
                                                            <select  id="select-content"  class="default-select form-control wide " name="as[]"  >
                                                                <option value="0">Nothing Selected</option>
                                                                @foreach($attributes as $a)
                                                                <option value="{{$a->id}}" @if($productline->attribute_id == $a->id) selected @endif>{{$a->value}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td style="width: 15%">
                                                            <select  id="select-value" class="default-select form-control wide " name="values[]"  >
                                                                @foreach($productline->attribute->attributelines as $attributeline)
                                                                    <option value="{{ $attributeline->id }}" @if($productline->attributeline_id == $attributeline->id)selected @endif>{{ $attributeline->value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td style="width:  10%">
                                                            <input type="text" class="form-control" value="{{ $productline->qte }}" placeholder="0" name="qtes[]">
                                                        </td>
                                                        <td  style="width: 15%">
                                                            <input type="text" class="form-control price" value="{{ $productline->price }}" placeholder="0.00" name="prices[]">
                                                        </td>
                                                        <td style="width: 15%">
                                                            <input type="text" class="form-control price" value="{{ $productline->promo_price }}" placeholder="0.00" name="promos[]">
                                                        </td>
                                                        <td>
                                                            <label for="icon-{{ $counter }}" style="cursor: pointer;">
                                                                @if($productline->attribute_icone)
                                                                <img id="icon-show-{{ $counter }}" src="{{asset('storage/icones/productlines/'.$productline->attribute_icone)}}" width="50" height="50" alt="" >
                                                                @else
                                                                <img id="icon-show-{{ $counter }}" src="{{asset('image-upload.png')}}" width="50" height="50" alt="" >
                                                                @endif
                                                            </label>
                                                            <input type="file" class="input-image" id="icon-0" name="icons[]" accept="image/png, image/jpeg" style="display: none; visibility:none;">
                                                        </td>
                                                        <td>
                                                            <label for="image-{{ $counter }}" style="cursor: pointer;">
                                                                @if($productline->attribute_image)
                                                                <img id="image-show-{{ $counter }}" src="{{asset('storage/images/productlines/'.$productline->attribute_image)}}" width="100" height="100" alt="" >
                                                                
                                                                @else
                                                                <img id="icon-show-{{ $counter }}" src="{{asset('image-upload.png')}}" width="70" height="70" alt="" >
                                                                
                                                                @endif
                                                            </label>
                                                            <input type="file"  class="input-image" id="image-{{ $counter }}" name="images[]" accept="image/png, image/jpeg" style="display: none; visibility:none;">
                                                            <input type="text"  value="{{$productline->attribute_image}}" class="input-image"  name="images_old[]" accept="image/png, image/jpeg" style="display: none; visibility:none;">
                                                        </td>

                                                        <td>
                                                            <button type="button" class="btn btn-danger shadow btn-xs sharp delete-attribute"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>

                                                    @php
                                                        $counter++;
                                                    @endphp
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
                                            <option value="intel" @if($product->p_TYPE == 'intel') selected @endif>INTEL</option>
                                            <option value="amd" @if($product->p_TYPE == 'amd') selected @endif>AMD</option>
                                          </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                          <label for="p_GEN" class="form-label">Processor GEN:</label>
                                          <select class="default-select form-control wide" name="p_GEN" id="select-result">
                                            <option value="">Nothing selected</option>
                                            @if($product->p_TYPE == 'intel')
                                                <option value="10" @if($product->p_GEN == '10') selected @endif>10</option>
                                                <option value="11" @if($product->p_GEN == '11') selected @endif>11</option>
                                                <option value="12" @if($product->p_GEN == '12') selected @endif>12</option>
                                                <option value="13" @if($product->p_GEN == '13') selected @endif>13</option>
                                                <option value="14 "@if($product->p_GEN == '14') selected @endif>14</option>

                                            @elseif($product->p_TYPE == 'amd')
                                                <option value="1" @if($product->p_GEN == '1') selected @endif>1</option>
                                                <option value="2" @if($product->p_GEN == '2') selected @endif>2</option>
                                                <option value="3" @if($product->p_GEN == '3') selected @endif>3</option>
                                                <option value="4" @if($product->p_GEN == '4') selected @endif>4</option>
                                            @endif
                                        </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Motherboard TYPE:</label>
                                            <select  class="default-select form-control wide" name="m_TYPE" id="m_TYPE">
                                                <option value="">Nothing selected</option>
                                                <option value="intel" @if($product->m_TYPE == 'intel')selected @endif >INTEL</option>
                                                <option value="amd" @if($product->m_TYPE == 'amd')selected @endif>AMD</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="m_GEN" class="form-label">Motherboard GEN:</label>
                                            <select class="multi-select" name="m_GEN[]" id="m_GEN" multiple="multiple">
                                                <option value="">Nothing selected</option>
                                                @if($product->m_TYPE == 'intel')
                                                  @php
                                                    $selected_gen = json_decode($product->m_GEN, true);
                                                  @endphp
                                                  <option value="10" @if(in_array('10', $selected_gen)) selected @endif>10</option>
                                                  <option value="11" @if(in_array('11', $selected_gen)) selected @endif>11</option>
                                                  <option value="12" @if(in_array('12', $selected_gen)) selected @endif>12</option>
                                                  <option value="13" @if(in_array('13', $selected_gen)) selected @endif>13</option>
                                                  <option value="14" @if(in_array('14', $selected_gen)) selected @endif>14</option>
                                                @elseif($product->m_TYPE == 'amd')
                                                  @php
                                                    $selected_gen = json_decode($product->m_GEN, true);
                                                  @endphp
                                                  <option value="1" @if(in_array('1', $selected_gen)) selected @endif>1</option>
                                                  <option value="2" @if(in_array('2', $selected_gen)) selected @endif>2</option>
                                                  <option value="3" @if(in_array('3', $selected_gen)) selected @endif>3</option>
                                                  <option value="4" @if(in_array('4', $selected_gen)) selected @endif>4</option>
                                                @endif
                                              </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                        <label class="form-label">Motherboard DDR:</label>
                                        <select class="default-select form-control wide"  name="m_DDR" placeholder="Nothing selected">
                                                <option value="">Nothing selected</option>
                                                <option value="DDR4" @if($product->m_DDR == 'DDR4') selected @endif>DDR4</option>
                                                <option value="DDR5" @if($product->m_DDR == 'DDR5') selected @endif>DDR5</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">RAM DDR:</label>
                                            <select class="default-select form-control wide" name="r_DDR">
                                                <option value="">Nothing selected</option>
                                                <option value="DDR4" @if($product->r_DDR == 'DDR4') selected @endif>DDR4</option>
                                                <option value="DDR5" @if($product->r_DDR == 'DDR5') selected @endif>DDR5</option>
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
                                            <label class="form-check-label" for="draft">Draft ?</label>
                                            <input type="checkbox" class="form-check-input" id="draft"  name="draft" @if($product->is_brouillon == 1) checked @endif>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check mb-2">
                                                <label class="form-check-label" for="free_shipping">Free shipping ?</label>
                                                <input type="checkbox" class="form-check-input" id="free_shipping"  name="free_shipping" @if($product->free_shipping == 1) checked @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                            <div class="card-body text-center">
                                <button type="submit" class="btn btn-primary mt-3">Save</button>
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
    $(document).on('click', '.delete-attribute', function () {
           $(this).parents('tr').remove();
       });
</script>
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
                    '<option value="1">1</option>' +
                    '<option value="2">2</option>' +
                    '<option value="3">3</option>' +
                    '<option value="4">4</option>';
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
          '<option value="1000">1000</option>' +
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
          $('#m_GEN').html(options);
          $('#m_GEN').niceSelect('update');

        }
      });
    });
    </script>
@endpush
@push('add-attribute-scripts')
<script>
     let category_checked ={!! $array_checked !!};

     $.each(category_checked, function (index, value) {
        $('input[value="'+value+'"]' ).prop( "checked", true );
    });

</script>

<script type="text/javascript">
      var elements = $("[id^='image-show-']");
            
            // Initialise une variable pour suivre la valeur maximale de l'ID
            var maxIdValue = -1;

            // Parcours chaque élément pour trouver le plus grand numéro
            elements.each(function(){
                // Récupère l'ID de l'élément actuel
                var id = $(this).attr('id');
                
                // Extrait la partie numérique de l'ID
                var idNumber = parseInt(id.replace('image-show-', ''), 10);
                
                // Compare et met à jour la valeur maximale de l'ID
                if (idNumber > maxIdValue) {
                    maxIdValue = idNumber;
                }
            });

            


    var i = maxIdValue;

    $("#add-attribute").click(function () {
        var options = $('#select-content').html();
        ++i;
        $html = '<tr class="tradded">'+
                    '<td style="width: 15%">'+
                        '<select   class="default-select form-control wide select-attribute " name="as[]">'+
                            options +
                        '</select>'+
                    '</td>'+
                    '<td style="width: 15%">'+
                        '<select   id="select-attr'+i+'" class="default-select form-control wide " name="values[]">'+
                        '</select>'+
                    '</td>'+
                    '<td style="width:  10%">'+
                        '<input type="text" class="form-control" placeholder="0" name="qtes[]">'+
                    '</td>'+
                    '<td  style="width: 15%">'+
                        '<input type="text" class="form-control price" placeholder="0.00" name="prices[]">'+
                    '</td>'+
                    '<td style="width: 15%">'+
                        '<input type="text" class="form-control price" placeholder="0.00" name="promos[]">'+
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
                       ' <button type="button"  class="btn btn-danger shadow btn-xs sharp delete-attribute"><i class="fa fa-trash"></i></button>'+
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
                '<select name="values[]" id="select-attr'+i+'" class="default-select form-control wide ">'+
                '</select>'+
                '</div>'+
                '<div style="width: 200px; margin-right:10px;">'+
                    '<label>Qte:</label>'+
                    '<input type="number" class="form-control" placeholder="0" name="qtes[]">'+
                '</div>'+
                '<div style="width: 200px; margin-right:10px;">'+
                    '<label>Prix:</label>'+
                    '<input type="number" class="form-control " placeholder="0" name="prices[]">'+
                '</div>'+
                '<div style="width: 200px; margin-right:10px;">'+
                    '<label>Promo:</label>'+
                    '<input type="number" class="form-control " placeholder="0" name="promos[]">'+
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
                ' <button type="button" class="delete-attribute" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>'+
                '</div>	</div><span>';

        $("#dynamicAddRemove").append($html);
        $('select').niceSelect();

    $(document).on('click', '.delete-attribute', function () {
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

<script>

    var images =  JSON.parse($('#preloaded-images').val());
    var image_p =  JSON.parse($('#preloaded-image-p').val());

    let preloaded_p = image_p;
    let preloaded = images;



	$('.input-photoPrincipale').imageUploader({
		preloaded: preloaded_p,
		imagesInputName: 'photoPrincipale',
        preloadedInputName: 'old',
		maxSize: 2 * 1024 * 1024,
		maxFiles: 1
	});


	$('.input-photos-pre').imageUploader({
		preloaded: preloaded,
		imagesInputName: 'photos',
        preloadedInputName: 'old',
		maxSize: 2 * 1024 * 1024,
		maxFiles: 10
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


@push('search-product-scripts')

    <script type="text/javascript">

     $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
        });
        $('#search').select2(function(){
            alert(1);
            var value=$(this).val();
            var data ="";
            $.ajax({
            type : 'get',
            url : '/search/'+ value,

            success:function(res){
            $.each(res, function(i, res) {
                data = data + '<option value="'+ res.id+ '" >'+ res.designation + '</option>';
                });
                $('#search').html(data);
            }
            });
        })
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

