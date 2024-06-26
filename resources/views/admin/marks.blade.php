@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="{{ asset('/admin') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Brands</a></li>
					</ol>
                </div>

                <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Brands</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Brand</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($marks as $mark)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$mark->designation}}</td>

                                                <td>
                                                    <form action="{{url('admin/marks/'.$mark->id)}}" method="post">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                    <div class="d-flex">
                                                        <a href="{{url('admin/marks/'.$mark->id.'/edit')}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    </form>
                                                </td>
                                            </tr>

                                            @endforeach
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
