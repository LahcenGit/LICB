@extends('layouts.front')
@section('content')
<style>
    .bg-licb {
    background-color: #BC221A !important;
    }

    b {
  font-weight: 700;
}
</style>


@php
    use Carbon\Carbon;
@endphp

{{-- Convertir la date en objet Carbon --}}
@php
    $date = Carbon::createFromFormat('Y-m-d\TH:i:s.u', $data['Colis'][0]['DateH_Action']);
@endphp


<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ asset('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Order tracking <span></span>
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            @if(!$data)

            <div class="row  d-flex justify-content-center">
                <div class="col-lg-6 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                            <h5 class="section-title style-1 mb-30" style="color: #BC221A">{{$code}}</h5>
                              <div class="single-post clearfix">
                                <div class="heading_s1">
                                   <p>No data for this tracking code !</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row  d-flex justify-content-center">
                <div class="col-lg-6 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                            <h5 class="section-title style-1 mb-30" style="color: #BC221A">{{$code}}</h5> <span class="badge bg-licb ">{{ $data['Colis'][0]['TypeLivraison'] == 1 ? 'StopDesk' : 'Home Delivery' }} </span>
                            <div class="single-post clearfix">
                                <div class="heading_s1 mt-2">
                                    <h5>Tracking status : {{$data['Colis'][0]['Situation']}} </h5> 
                                    <div class="mt-2">
                                        <p>Customer : <b>{{$data['Colis'][0]['Client']}}</b>  <br>
                                        Wilaya : <b>{{$data['Colis'][0]['Wilaya']}}</b> <br>
                                        Commune : <b>{{$data['Colis'][0]['Commune']}}</b>  <br>
                                        @if($data['Colis'][0]['Commentaire'])
                                        Comment : <b>{{$data['Colis'][0]['Commentaire']}}</b> <br>@endif
                                        Update : <b>{{$date}}</b> </p>

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        </div>
    </div>
</main>
@endsection
