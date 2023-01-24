@extends('layouts.dashboard-admin')
@section('content')


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
                <form action="{{url('admin/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="row ">
                   <div class="col-xl-8 col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Modifier Produit</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Designation*:</label>
                                                    <input type="text" class="form-control" value="{{ $product->designation }}" name="designation" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Poids*:</label>
                                                    <input type="text" class="form-control" value="{{ $product->weight }}" name="weight" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Prix:</label>
                                                    <input type="number" class="form-control"  value="{{ $product->price }}" name="price">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label>Promo:</label>
                                                    <input type="number" class="form-control" value="{{ $product->promo }}" name="promo">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Qte:</label>
                                                    <input type="number" class="form-control" value="{{ $product->qte }}" name="qte" >
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label>Points:</label>
                                                    <input type="number" class="form-control" value="{{ $product->point }}" name="point">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                <label class="form-label">Statut:</label>
                                                    <select id="inputState" class="default-select form-control wide" name="status">
                                                        <option>Nothing selected</option>
                                                        <option>New</option>
                                                        <option>Non</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label>Date:</label>
                                                    <input name="date" class="datepicker-default form-control" value="{{ $product->date }}" id="datepicker">
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
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Produits associés</h4>
                                </div>
                                <div class="card-body">
                                    <label>Séléctionnez des produits :</label>
                                    <select class="multi-select" id="search" name="relatedproducts[]" multiple="multiple">
                                            @foreach($all_productlines as $all_productline)
                                            <option  value="{{ $all_productline->id }}">{{ $all_productline->product->designation }}@if($all_productline->attributeLine)-{{ $all_productline->attributeLine->value }}@endif</option>
                                            @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Marques</h4>
                                    <a style="cursor: pointer" class="btn btn-success add-mark  " style="background-color: #006e40; border-color:#006e40;">Ajouter</a>
                                </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                                <div class="categories overflow-auto" style="max-width: 260px; max-height:300px;">
                                                    <ul style="line-height: 1.69230769;">
                                                        @foreach ($marks as $mark)
                                                            <li>
                                                                <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="check1" value="{{$mark->id}}" name="mark" @if($product->mark_id == $mark->id) checked @endif>
                                                                <label class="form-check-label" for="check1">{{ $mark->designation }}</label>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    <ul>
                                                </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Description Courte: </h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                         <div class="row">
                                                <div class="mb-3 col-md-12">
                                                <textarea  class="form-control" name="short_description">{{ $product->short_description }}</textarea>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Photo principale</h4>
                                </div>
                                <div class="card-body">
                                <label>L'image' principale du produit :</label>
                                    <div class="basic-form custom_file_input">
                                            <div class="input-group mb-3">
                                                <input type="file" class="file" name="photoPrincipale" accept="image/*" >
                                                <img src="{{asset('storage/images/products/'.$product->images[0]->lien)}}" width="230px " height="120px">
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-xxl-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Description longue</h4>
                                </div>
                                <div class="card-body custom-ekeditor">
                                <textarea class="summernote" class="form-control " style="background-color: #202020; color:##202020"  name="long_description" >{{$product->long_description}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Photos secondaires</h4>
                                </div>
                                <div class="card-body">
                                <label>Les images secondaires du produit :</label>
                                    <div class="basic-form custom_file_input">
                                            <div class="input-group mb-3">
                                                <input type="file" class="file" name="photos[]" accept="image/*" multiple >
                                                @foreach($images as $image)
                                                <img src="{{asset('storage/images/products/'.$image->lien)}}" width="243px " height="126px">
                                                @endforeach
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Variation ?</h4>
                                    <input type="checkbox" class="form-check-input" id="check" value="oui" name="check" >
                                </div>
                                <div class="card-body " id="variation" >
                                    <div class="text-center">
                                        <a style="cursor: pointer" class="btn btn-success add-attribute  " style="background-color: #006e40; border-color:#006e40;">Gérer les attributs</a>
                                    </div>
                                    <div class="basic-form" >
                                            <div id="dynamicAddRemove" >
                                                @foreach($productlines as $productline)
                                                    <span>
                                                    <div class="row mt-4">
                                                        <div style="width: 200px; margin-right:10px;">
                                                        <label class="form-label">Attribut:</label>
                                                        <select  id="select-content"  class="default-select form-control wide " name="as[]"  >
                                                            <option value="0">Nothing Selected</option>
                                                            @foreach($attributes as $a)
                                                            <option value="{{$a->id}}" @if($productline->attribute_id == $a->id) selected @endif>{{$a->value}}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                        <div style="width: 200px; margin-right:10px;">
                                                        <label class="form-label">Valeur:</label>
                                                        <select  id="select-value" class="default-select form-control wide " name="values[]"  >
                                                            @foreach($productline->attribute->attributelines as $attributeline)
                                                            <option value="{{ $attributeline->id }}" @if($productline->attributeline_id == $attributeline->id)selected @endif>{{ $attributeline->value }}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                        <div style="width: 200px; margin-right:10px;">
                                                            <label class="form-label">Qte:</label>
                                                            <input type="number" class="form-control" value="{{ $productline->qte }}" name="qtes[]">
                                                        </div>
                                                        <div style="width: 200px; margin-right:10px;">
                                                            <label class="form-label">Prix:</label>
                                                            <input type="number" class="form-control price"value="{{ $productline->price }}" name="prices[]">
                                                        </div>
                                                        <div style="width: 200px; margin-right:10px;">
                                                            <label class="form-label">Promo:</label>
                                                            <input type="number" class="form-control price" value="{{ $productline->promo_price }}" name="promos[]">
                                                        </div>
                                                        <div style="width: 100px; ">
                                                            <label >icon : </label> <br>
                                                            <label for="icon-0" style="cursor: pointer;">
                                                                @if($productline->attribute_icone)
                                                                <img id="icon-show-0" src="{{asset('storage/icones/productlines/'.$productline->attribute_icone)}}" width="50" height="50" alt="" >
                                                                @else
                                                                <img id="icon-show-0" src="{{asset('image-upload.png')}}" width="50" height="50" alt="" >
                                                                @endif
                                                            </label>
                                                            <input type="file" class="input-image" id="icon-0" name="icons[]" accept="image/png, image/jpeg" style="display: none; visibility:none;">
                                                        </div>
                                                        <div style="width: 100px; margin-right:10px;">
                                                            <label >image : </label> <br>
                                                            <label for="image-0" style="cursor: pointer;">
                                                                <img id="image-show-0" src="{{asset('storage/images/productlines/'.$productline->attribute_image)}}" width="100" height="100" alt="" >
                                                            </label>
                                                            <input type="file" class="input-image" id="image-0" name="images[]" accept="image/png, image/jpeg" style="display: none; visibility:none;">
                                                        </div>
                                                        @if ($loop->last)
                                                        <div style="width: 50px; margin-right:10px;">
                                                            <button type="button" id="add-attribute" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-plus"></i></button>
                                                        </div>
                                                        @endif
                                                        <div style="width: 50px; margin-right:10px;">
                                                             <button type="button" class="btn btn-danger shadow btn-xs sharp delete-attribute"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </div>
                                                </span>
                                                @endforeach
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <div class="form-check mb-2">
                                        <label class="form-check-label" for="check1">Brouillon ?</label>
                                        <input type="checkbox" class="form-check-input" id="check1" @if($product->is_brouillon == 1)checked @endif value="1" name="brouillon">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                        <div class="card-body text-center">
                            <button type="submit"  class="btn btn-primary mt-3">Enregistrer</button>
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
@push('add-attribute-scripts')
<script type="text/javascript">

    $(document).on('click', '.delete-attribute', function () {
      $(this).parents('span').remove();
    });
		var i = 0;
		$("#add-attribute").click(function () {
			var options = $('#select-content').html();
			++i;
			$html = '<span><div class="row">'+
					'<div style="width: 200px; margin-right:10px;">'+
					'<label for="" >Attribute:</label>'+
					'<select  name="as[]" id="select-attribute" class="default-select form-control wide " >'+
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
                    ' <button type="button" " class="btn btn-danger shadow btn-xs sharp delete-attribute"><i class="fa fa-trash"></i></button>'+
                    '</div>	</div><span>';

			$("#dynamicAddRemove").append($html);
			$('select').niceSelect();



        $(document).on('change', '#select-attribute', function () {
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

