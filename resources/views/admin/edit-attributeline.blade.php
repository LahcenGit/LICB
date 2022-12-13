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
                                <h4 class="card-title">Modifier Un Attribut</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{url('admin/attributelines/'.$attributeline->id)}}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PUT">
                                         @csrf
                                         <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label>Attribut* :</label>
                                                    <input type="text" class="form-control input-default " value="{{$attributeline->value}}"  name="attr"  required>

                                            </div>
                                         </div>

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">type:</label>
                                                <select class="form-control " id="sel1"  class="selectpicker" data-live-search="true" name="type">
                                                    <option value=0>Nothing selected</option>
                                                    @foreach($attributes as $attr)
                                                    <option value="{{$attr->id}}" @if( $attr->id == $attributeline->attribute_id ) selected @endif >{{$attr->value}}</option>
                                                    @endforeach
                                                </select>
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


