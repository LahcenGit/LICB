@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="{{ asset('/admin') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Categories</a></li>
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
                                    <form action="{{url('admin/categories')}}" method="POST" enctype="multipart/form-data">
                                         @csrf
                                        <div class="mb-3">
                                            <label> Désignation*: </label>
                                            <input type="text" class="form-control input-default  @error('designation') is-invalid @enderror"  name="designation" placeholder="designation" required>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                        <label>Categories :</label>
                                        <select class="form-control " id="sel1"  class="selectpicker" data-live-search="true" name="category">

                                          <option value=0>Nothing selected</option>

                                           @foreach($categories as $category)

                                           <option value="{{$category->id}}" @if (old('category') == $category->id ) selected @endif >{{$category->designation}}</option>
                                           @foreach($category->childrenCategories as $sub)

                                           <option  value="{{$sub->id}}" @if (old('category') == $sub->id ) selected @endif> &nbsp &nbsp{{$sub->designation}}</option>
                                           @foreach($sub->childrenCategories as $subsub)
                                               <option value="{{$subsub->id}}"  @if (old('category') == $subsub->id ) selected @endif>  &nbsp  &nbsp  &nbsp &nbsp{{$subsub->designation}}</option>


                                           @foreach($subsub->childrenCategories as $subsubsub)
                                           <option value="{{$subsubsub->id}}"  @if (old('category') == $subsubsub->id ) selected @endif>  &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp{{$subsubsub->designation}}</option>
                                           @endforeach
                                           @endforeach
                                           @endforeach
                                           @endforeach

                                        </select>
                                        </div>
                                        <div class="mb-3">
                                        <label >Description : </label>
                                           <textarea class="form-control" name="description" rows="3"></textarea>
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
