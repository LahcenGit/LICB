@extends('layouts.front')
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ asset('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
                <span></span> Succèss <span></span>
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-10 col-md-12 m-auto">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <div class="alert alert-success-licb text-center"   role="alert">
                                <p class="mt-3" style="font-size: 15px;"> Votre commande a bien été prise en compte,
                                 nous vous remercions pour votre commande. </p>
                                 <a  href="{{url('/')}}" type="button" style="margin-top:20px;" class="btn btn-cart2">Page d'acceuil</a>
                             </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
