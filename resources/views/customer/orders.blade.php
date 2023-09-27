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
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ asset('customer/order-detail/'.$order->id) }}" class="btn btn-primary shadow btn-xs sharp me-1 order-details"><i class="fas fa-eye"></i></a>
                                                    @if($order->status == 0)
                                                        <button class="btn btn-warning shadow btn-xs sharp me-1" ><i class="fas fa-pencil-alt" style="color: #000;"></i></button>
                                                        <a href="{{ asset('customer/cancel-order/'.$order->id) }}" class="btn btn-danger shadow btn-xs sharp me-1" onclick="return confirm('Vous voulez vraiment annuler la commande?')"><i class="fa fa-trash"></i></a>
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
