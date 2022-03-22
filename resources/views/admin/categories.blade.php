@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Categories</a></li>
					</ol>
                </div>

                <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Table des catégories</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Designation</th>
                                                <th>Parent Catégorie</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($categories))
                                            <?php $_SESSION['i'] = 0; ?>
                                            @foreach($categories as $category)
                                                <?php $_SESSION['i']=$_SESSION['i']+1; ?>
                                                <tr id="{{$category->id}}">
                                                    <?php $dash=''; ?>
                                                    <td>{{$_SESSION['i']}}</td>
                                                    <td>{{$category->designation}}</td>
                                                   
                                                    <td>
                                                        @if(isset($category->parent_id))
                                                            {{$category->childCategories->name}}
                                                        @else
                                                            None
                                                        @endif
                                                    </td>
                                                     <td>
                                                    <form action="{{url('dashboard-admin/categories/'.$category->id)}}" method="post">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                    <div class="d-flex">
                                                        <a href="{{url('dashboard-admin/categories/'.$category->id.'/edit')}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    </form>												
                                                </td>	
                                                        </tr>
                                                    @if(count($category->childCategories))
                                                        @include('sub-category-list',['subcategories' => $category->childCategories])
                                                    @endif

                                                @endforeach
                                                <?php unset($_SESSION['i']); ?>
                                                @endif
                                        </tbody>
                               </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection