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
                                    <label>Catégories de produits*:</label>
                                <select class="form-control " id="sel1"  class="selectpicker" data-live-search="true" name="category">
                                       
                                          <option value=0>Nothing selected</option>
                                     
                                           @foreach($categories as $category)
                                          
                                           <option value="{{$category->id}}" @if (old('category') == $category->id ) selected @endif >{{$category->designation}}</option>
                                           @foreach($category->childCategories as $sub)
                                          
                                           <option  value="{{$sub->id}}" @if (old('category') == $sub->id ) selected @endif> &nbsp &nbsp{{$sub->designation}}</option>
                                           @foreach($sub->childCategories as $subsub)
                                               <option value="{{$subsub->id}}"  @if (old('category') == $subsub->id ) selected @endif>  &nbsp  &nbsp  &nbsp &nbsp{{$subsub->designation}}</option>
                                          

                                           @foreach($subsub->childCategories as $subsubsub)
                                           <option value="{{$subsubsub->id}}"  @if (old('category') == $subsubsub->id ) selected @endif>  &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp{{$subsubsub->designation}}</option>
                                           @endforeach 
                                           @endforeach 
                                           @endforeach 
                                           @endforeach
 
                                        </select>
                                    </div>
                                       <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Prix*:</label>
                                                <input type="number"  class="form-control input-default @error('price') is-invalid @enderror"  name="price" placeholder="0.00">
                                                    @error('price')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Qte*:</label>
                                                <input type="number"  class="form-control input-default @error('qte') is-invalid @enderror"  name="qte" placeholder="0">
                                                    @error('qte')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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
                                                <h4 class="card-title">Description du produit</h4>
                                            </div>
                                            <div class="card-body custom-ekeditor">
                                                <div id="ckeditor"></div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
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