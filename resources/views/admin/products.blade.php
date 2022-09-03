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

                <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tous les produits</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Photo</th>
                                                <th>Designation</th>
                                                <th>Prix</th>
                                                <th>Prix promo</th>
                                                <th>Qte</th>
                                                <th>Attribut</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img  style="width:100%; height:auto" src="{{asset('storage/images/products/'.$product->getImage()->lien)}}" alt=""></td>
												<td>{{$product->getProduct()->designation}}</td>
                                                <td>{{$product->price}}</td>
                                                <td>{{$product->promo_price}}</td>
                                                <td>{{$product->qte}}</td>
                                                @if($product->getValue()!= Null)
												<td>{{$product->getValue()->value}}</td>
                                                @else
                                                <td><strong><i class="fas fa-minus"></i></td>
                                                @endif
                                                <form action="{{url('dashboard-admin/products/'.$product->getProduct()->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
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