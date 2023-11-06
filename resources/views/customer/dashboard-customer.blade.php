@extends('layouts.dashboard-customer')

@section('content')

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-12">
								<div class="row">
                                    <div class="col-xl-12 col-sm-12">
                                        <div class="card">
                                            @if($points)
                                            <div class="card-body d-flex px-4  justify-content-between">
                                                <div>
                                                    <div class="">
                                                        <h2 class="fs-32 font-w700">{{ $points }}</h2>
                                                        <span class="fs-18 font-w500 d-block">Total Points que vous avez</span>
                                                    </div>
                                                </div>
                                                <div id="NewCustomers"></div>
                                                <button  class="btn btn-primary mt-3 convert-points">Convertir vos points</button>
                                            </div>
                                            @else
                                            <div class="card-body d-flex px-4  justify-content-between">
                                                <div>
                                                    <div class="">
                                                       <span class="fs-18 font-w500 d-block"><b>{{ Auth::user()->last_name }}</b>, vous n'avez actuellement aucun point à votre compte.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
                <div class="row">
                    <div class="col-xl-4">
						<div class="row">
							<div class="col-xl-12">
								<div class="card bg-progradient manage-project">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-xl-8 col-12">
												<h4 class="fs-24 font-w700 text-white">ABDF5145</h4>
												<span class="fs-14 text-white d-block">Du 01.09.2023 au 01.10.2023</span>
												<span class="fs-14 text-white d-block">pour tous achat > 20.000 Da</span>
											</div>
											<div class="col-xl-4 col-12 text-end">
												<a href="javascript:void(0);" class="btn  bg-white fs-18" style="background: #6EB704 !important;">Valide</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Dèrnières commandes</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;"><strong>#</strong></th>
                                                <th><strong>Date</strong></th>
                                                <th><strong>Montant</strong></th>
                                                <th><strong>Tracking</strong></th>
                                                <th><strong>Status</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td><strong>{{ $loop->iteration }}</strong></td>
                                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                                    <td>{{ number_format($order->total_f) }} DA</td>
                                                    <td>@if($order->tracking_code){{ $order->tracking_code }}@else <i class="fa fa-minus"></i>@endif</td>
                                                    @if($order->status == 0)
                                                    <td><span class="badge light badge-warning">En attente</span></td>
                                                    @elseif($order->status == 1)
                                                    <td><span class="badge badge-primary light">Livraison...</span></td>
                                                    @elseif($order->status == 2)
                                                    <td><span class="badge light badge-success">Livré</span></td>
                                                    @elseif($order->status == 3)
                                                    <td><span class="badge light badge-danger">Annulé</span></td>
                                                    @else
                                                    <td><span class="badge badge-dark light">En attente de paiement</span></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                         </tbody>
                                    </table>
                                    <a href="{{ asset('customer/orders') }}"><h5>Voir plus <i class="fa fa-arrow-right"></i></h5></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
<div id="modal-convert-points">
</div>
@endsection
@push('convert-points')
<script>
    $(".convert-points").click(function() {
     $.ajax({
            url: '/modal-convert-points',
            type: "GET",
            success: function (res) {
            $('#modal-convert-points').html(res);
            $("#convert-points").modal('show');
            }
        });

    });
    $("#modal-convert-points").on('click','.convert',function(e){
        e.preventDefault();
        var point = $('#point').val();
        $.ajax({
            url: '/convert-point/'+point,
            type:"GET",
            success:function(response){
            $('#convert-points').modal('hide');
            console.log(response);
            location.reload();
            }

});

});
</script>
@endpush
