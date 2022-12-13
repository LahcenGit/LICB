@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
 <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Marques</a></li>
					</ol>
                </div>

                <div class="row d-flex ">
                    <div class="col-xl-8 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ModifierUne Marque</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{url('admin/marks/'.$mark->id)}}" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="_method" value="PUT">

                                        @csrf
                                         <div class="row">
                                            <div class="mb-3 col-md-8">
                                                <label>Désignation* :</label>
                                                    <input type="text" class="form-control input-default "  name="designation" value="{{ $mark->designation }}" required>
                                            </div>
                                         </div>


                                        <button type="submit"  class="btn btn-primary mt-3">Enregistrer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                </div>

 </div>
</div>

@endsection


