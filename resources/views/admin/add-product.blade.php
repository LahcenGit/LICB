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

                <div class="row ">
                        <div class="col-xl-8 col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ajouter Produit</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="{{url('dashboard-admin/products')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                         
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Designation*:</label>
                                                    <input type="text" class="form-control" placeholder="FORGE 12-3 RX65" name="designation" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Prix*:</label>
                                                    <input type="number" class="form-control" placeholder="0.00" name="price" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label>Promo:</label>
                                                    <input type="number" class="form-control" placeholder="0.00" name="promo">
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Qte*:</label>
                                                    <input type="number" class="form-control" placeholder="0" name="qte" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label>Points:</label>
                                                    <input type="number" class="form-control" placeholder="0" name="point">
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
                                                    <input name="date" class="datepicker-default form-control" id="datepicker">
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
                                        <div class="basic-form">
                                            <form>
                                                <div class="mb-3">
                                                <div class="categories overflow-auto" style="max-width: 260px; max-height:300px;">
                                                    @include('categories')
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            </div>
                        </div>
                </div>
                <div class="row ">
                        <div class="col-xl-8 col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Produits Associés </h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                         <div class="row">
                                                <div class="mb-3 col-md-6">
                                                <label class="form-label">Produits:</label>
                                                <select class="select2" name="relatedproducts[]" class="form-control" multiple="multiple">
                                                    <option >1</option>
                                                    <option >2</option>
                                                    <option >3</option>
                                                    <option >4</option>
                                                </select>
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
                                    <label>L'image principale du produit :</label>
                                    <div class="basic-form custom_file_input">
                                        <div class="input-group mb-3">

                                            <label for="file-upload" class="custom-file-upload">
                                                <i class="fa fa-cloud-upload"></i> Ajouter l'image
                                            </label>
                                            <input id="file-upload" class="upload-image" type="file" onchange="loadFile(event)" name="lien_photo" />
                                        </div>
                                        <img id="output">
                                    
                                    </div>
                            </div>
                            </div>
                        </div>
                </div>
                <div class="row ">
                        <div class="col-xl-8 col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Variation</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form" >
                                        <div id="dynamicAddRemove">
                                          <div  class="row">
                                                <div class="mb-3 col-md-3">
                                                <label class="form-label">Attribut:</label>
                                                <select  id="select-content"  class="default-select form-control wide " name="attributes[0]"  >
                                                    <option value="0">Nothing Selected</option>
                                                    @foreach($attributes as $attr)
                                                    <option value="{{$attr->id}}">{{$attr->value}}</option>
                                                    @endforeach
                                                </select>
                                                </div> 
                                                <div class="mb-3 col-md-3">
                                                <label class="form-label">Valeur:</label>
                                                <select  id="select-value" class="default-select form-control wide " name="values[0]"  >
                                                    
                                                </select>
                                                </div> 
                                                <div class="mb-3 col-md-2">
                                                    <label class="form-label">Qte:</label>
                                                    <input type="number" class="form-control" placeholder="0" name="qtes[0]">
                                                </div>
                                                <div class="mb-3 col-md-2">
                                                    <label class="form-label">Prix:</label>
                                                    <input type="number" class="form-control" placeholder="0.00" name="prices[0]">
                                                </div>
                                                <div class="form-group col-md-2">
                                                 <div class="d-flex">
                                                    <button type="button" id="add-attribute" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-plus"></i></button>
                                                 </div>	
                                               </div>
                                         </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Photos</h4>
                                </div>
                                <div class="card-body">
                                <label>L'image principale du produit :</label>
                                    <div class="basic-form custom_file_input">
                                            <div class="input-group mb-3">
                                                    <input type="file"  name="photo" accept="image/*" multiple >
                                            </div>
                                    </div>
                            </div>
                            </div>
                        </div>

                </div>
                <div class="row ">
                        <div class="col-xl-8 col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Description Courte: </h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                         <div class="row">
                                                <div class="mb-3 col-md-12">
                                                <textarea  class="form-control" name="description"></textarea>
                                             </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Brouillon </h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                         <div class="row">
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" id="check1" value="" >
                                                <label class="form-check-label" for="check1">Oui</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" id="check1" value="" >
                                                <label class="form-check-label" for="check1">Non</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-xxl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Description longue</h4>
                            </div>
                            <div class="card-body custom-ekeditor">
								<input name="description" id="ckeditor" ></input>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                        <div class="card-body text-center">
                            <button type="submit"  class="btn btn-primary mt-3">Ajouter</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
     </div>
</div>


@endsection
@push('add-attribute-scripts')
<script type="text/javascript">
		var i = 0;
		$("#add-attribute").click(function () {
			var options = $('#select-content').html();
			++i;
			$html = '<span><div class="row">'+
					'<div class="mb-3 col-md-3">'+
					'<label for="" >Attribute:</label>'+
					'<select  name="attributes['+i+']" id="select-attribute" class="default-select form-control wide " >'+
					 options +
					'</select>'+
					'</div>'+
                    '<div class="mb-3 col-md-3">'+
					'<label for="">Valeur:</label>'+
					'<select name="choices['+i+']" id="select-attr'+i+'" class="default-select form-control wide ">'+
					'</select>'+
					'</div>'+
                    '<div class="mb-2 col-md-2">'+
						'<label>Qte:</label>'+
						'<input type="number" class="form-control" placeholder="0" name="qtes['+i+']">'+
				    '</div>'+
                    '<div class="mb-2 col-md-2">'+
						'<label>Prix:</label>'+
						'<input type="number" class="form-control" placeholder="0" name="qtes['+i+']">'+
				    '</div>'+
                    '<div class="mb-2 col-md-2">'+
                    ' <button type="button" id="delete-attribute" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>'+
                    '</div>	</div><span>';

			$("#dynamicAddRemove").append($html);
			$('select').niceSelect();

		$(document).on('click', '#delete-attribute', function () {
                $(this).parents('span').remove();
            });

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




