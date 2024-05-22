@extends('layouts.front')
@section('content')
<style>
    .bg-licb {
    background-color: #BC221A !important;
    }
</style>
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ asset('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
                <span></span> Suivi de la commande <span></span>
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            @if(!$response_array)

            <div class="row  d-flex justify-content-center">
                <div class="col-lg-6 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                            <h5 class="section-title style-1 mb-30" style="color: #BC221A">{{$code}}</h5>
                              <div class="single-post clearfix">
                                <div class="heading_s1">
                                   <p>Aucune donnée pour ce code de suivi !</p>
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
                            <h5 class="section-title style-1 mb-30" style="color: #BC221A">{{$code}}</h5>
                            @foreach($response_array as $response)
                            <div class="single-post clearfix">
                                <div class="heading_s1">
                                    <h5> {{$response['commune_name']}} </h5> <span class="badge bg-licb ">{{$response['status']}}</span>
                                    <p>Date : <b>{{$response['date_status']}}</b> </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
        </div>
    </div>
</main>
@endsection
