@extends('layouts.dashboard-customer')
@section('content')

<style>
     .send-order{
        color:aliceblue;
        background-color:#34804a;
    }
</style>
<div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Commandes</a></li>
					</ol>
                </div>
                <div class="row">
                        <div class="col-xl-4 col-sm-4">
                        <div class="card">
                            <div class="card-body px-4">
                                <h4 class="fs-18 font-w600 mb-5 text-nowrap">Total Commandes</h4>
                                <div class="progress default-progress">
                                    <div class="progress-bar progress-animated" style="width: 40%; height:10px;" role="progressbar">
                                        <span class="sr-only">45% Complete</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end mt-1 justify-content-between">
                                    <span><small class="text-primary">76</small> Points</span>
                                    <h4 class="mb-0 fs-32 font-w800">{{ $count_orders }}</h4>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-xl-8">
                        <div class="card bg-progradient manage-project">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-xl-6 col-12">
                                        <h4 class="fs-24 font-w700 text-white">Manage your project in one touch</h4>
                                        <span class="fs-16 text-white d-block">Let Wokrload manage your project automatically with our best AI systems </span>
                                    </div>
                                    <div class="col-xl-6 col-12 text-end">
                                        <a href="javascript:void(0);" class="btn  bg-white fs-18 btn-rounded">Try Free Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Table des commandes</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example3" class="display" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>Montant</th>
                                                        <th>Tracking</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                                            <td>{{ number_format($order->total_f) }} DA</td>
                                                            <td>@if($order->tracking_code){{ $order->tracking_code }}@else <i class="fa fa-minus"></i></td>
                                                            @if($order->status == 0)
                                                            <td><span class="badge badge-warning">En attente</span></td>
                                                            @elseif($order->status == 1)
                                                            <td><span class="badge badge-info">Livraison...</span></td>
                                                            @elseif($order->status == 2)
                                                            <td><span class="badge badge-success">Livré</span></td>
                                                            @elseif($order->status == 3)
                                                            <td><span class="badge badge-danger">Annulé</span></td>
                                                            @else
                                                            <td><span class="badge badge-primary">En attente de paiement</span></td>
                                                            @endif
                                                            </td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="{{ asset('customer/order-detail/'.$order->id) }}" class="btn btn-primary shadow btn-xs sharp me-1 order-details"><i class="fas fa-eye"></i></a>
                                                                    @if($order->status == 0)
                                                                        <button class="btn btn-warning shadow btn-xs sharp me-1" ><i class="fas fa-pencil-alt" style="color: #000;"></i></button>
                                                                        <a href="{{ asset('customer/cancel-order/'.$order->id) }}" onclick="return confirm('Vous voulez vraiment annuler la commande?')"><i class="fa fa-trash"></i></a>
                                                                    @endif
                                                                </div>
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
