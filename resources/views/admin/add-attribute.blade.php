@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
 <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Attributes</a></li>
					</ol>
                </div>

                <div class="row d-flex ">
                    <div class="col-xl-8 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ajouter Un Attribut</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{url('dashboard-admin/attributes')}}" method="POST" enctype="multipart/form-data">
                                         @csrf
                                        <div class="mb-3">
                                        <label>Type* :</label>
                                        <input type="text" class="form-control input-default  @error('type') is-invalid @enderror"  name="type" placeholder="type" required>
                                            @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div id = "dynamicAddRemove">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Attribut*:</label>
                                                    <input type="text" class="form-control" name="attr[0]" placeholder="rouge">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <div class="d-flex">
                                                        <button type="button" id="add-attribute" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-plus"></i></button>
                                                    </div>	
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit"  class="btn btn-primary mt-3">Ajouter</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                </div>

 </div>
</div>

@endsection

@push('add-attribute')
<script type="text/javascript">
		var i = 0;
		$("#add-attribute").click(function () {
			
			++i;
			$html = '<span><div class="row " >'+
					'<div class="mb-3 col-md-6" >'+
					'<label for="" style="  display: block;">Attribut</label>'+
					' <input type="text" class="form-control" name="attr['+i+']" placeholder="rouge">'
					+'</div>'+
                    '<div class="mb-3 col-md-6">'+
                    ' <button type="button" id="delete-attribute" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>'+
                    '</div></div></span>';

			$("#dynamicAddRemove").append($html);
			

		$(document).on('click', '#delete-attribute', function () {
			$(this).parents('span').remove();
		});


		});
</script>

@endpush