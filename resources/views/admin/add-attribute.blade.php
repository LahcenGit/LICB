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
                                         <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label>Attribut* :</label>
                                                    <input type="text" class="form-control input-default  @error('attr') is-invalid @enderror"  name="attr" placeholder="attribut" required>
                                                        @error('attr')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label>Code :</label>
                                                    <input type="text" class="form-control input-default  @error('code') is-invalid @enderror"  name="code" placeholder="#fff" >
                                                        @error('code')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                            </div>
                                         </div>

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">type:</label>
                                                <select class="form-control " id="sel1"  class="selectpicker" data-live-search="true" name="type">
                                                    <option value=0>Nothing selected</option>
                                                    @foreach($attributes as $attribute)
                                                    <option value="{{$attribute->id}}" @if (old('attribute') == $attribute->id ) selected @endif >{{$attribute->value}}</option>
                                                    @endforeach
                                                </select>
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


