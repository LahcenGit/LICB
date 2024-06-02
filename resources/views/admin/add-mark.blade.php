@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
 <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="{{ asset('/') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Brands</a></li>
					</ol>
                </div>

                <div class="row d-flex ">
                    <div class="col-xl-8 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{url('admin/marks')}}" method="POST" enctype="multipart/form-data">
                                         @csrf
                                         <div class="row">
                                            <div class="mb-3 col-md-8">
                                                <label>Désignation* :</label>
                                                    <input type="text" class="form-control input-default  @error('designation') is-invalid @enderror"  name="designation" placeholder="designation" required>
                                                        @error('designation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                            </div>
                                         </div>


                                        <button type="submit"  class="btn btn-primary mt-3">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                </div>

 </div>
</div>

@endsection


