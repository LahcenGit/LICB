@extends('layouts.dashboard-admin')
@section('content')
<div class="content-body">
 <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Catégories</a></li>
					</ol>
                </div>

                <div class="row d-flex ">
            <div class="col-xl-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier Categorie</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('admin/categories/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">

                                @csrf
                                <div class="form-group">
                                    <label>Désignation:</label>
                                    <input type="text"  class="form-control input-default" value="{{$category->designation}}"  name="name" >

                                </div>
                                <div class="form-group">

                                    <label>Liste des catégories :</label>

                                    <select class="form-control  @error('category') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="category">

                                            <option value="0">Nothing selected</option>

                                            @foreach($categories as $cat)

                                            <option value="{{$cat->id}}" @if ( $cat->id == $category->parent_id  ) selected @endif>{{$cat->designation}}</option>
                                            @foreach($cat->childCategories as $sub)

                                            <option  value="{{$sub->id}}" @if ( $sub->id ==  $category->parent_id  ) selected @endif> &nbsp &nbsp{{$sub->designation}}</option>

                                            @foreach($sub->childCategories as $subsub)
                                                <option value="{{$subsub->id}}" @if ( $subsub->id ==  $category->parent_id ) selected @endif>  &nbsp  &nbsp  &nbsp &nbsp{{$subsub->designation}}</option>


                                            @foreach($subsub->childCategories as $subsubsub)
                                            <option value="{{$subsubsub->id}}"  @if ( $subsubsub->id ==  $category->parent_id  ) selected @endif>  &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp{{$subsubsub->designation}}</option>
                                            @endforeach
                                            @endforeach
                                            @endforeach
                                            @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label >Description : </label>
                                    <textarea class="form-control" name="description" rows="3">{{$category->description}}</textarea>
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
