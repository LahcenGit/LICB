@extends('layouts.dashboard-customer')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
              <button type="button" class="btn btn-primary mt-3 printMe" >
                <i class="btn-icon-prepend " data-feather="printer"></i>
                Imprimer
              </button>
            </div>
        </div>
    <div class="row mt-3">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body print-section" id="printable">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Produit</th>
                                <th scope="col">P.U</th>
                                <th scope="col">Qte</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($orderlines as $orderline)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$orderline->productline->product->designation}} @if($orderline->productline->attributeLine){{ $orderline->productline->attributeLine->value }} @endif</td>
                                    <td>{{$orderline->price}}</td>
                                    <td>{{$orderline->qte}}</td>
                                    <td>{{$orderline->total}} Da</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" style="text-align:right;"><b>Total</b> </td>
                                <td > <b >{{ number_format($order->total, 2) }}  Da</b> </td>

                            </tr>
                            <tr>
                                @if($order->value)
                                <td colspan="4" style="text-align:right;"><b>Promo</b> </td>
                                <td >  {{ $order->value }} Da</td>
                                @endif

                            </tr>
                            <tr>
                                <td colspan="4" style="text-align:right;"><b>Livraison</b> </td>
                                <td >  {{ $order->delivery_cost }} Da</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align:right;"><b>Total</b> </td>
                                <td > <b style="font-size: 17px">{{ number_format($order->total_f, 2) }}  Da</b> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

