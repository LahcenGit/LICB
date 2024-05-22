@extends('layouts.front')
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ asset('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
                <span></span> Tracking <span></span>
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-10 col-md-12 m-auto">
                    <div class="row  d-flex justify-content-center">
                        <div class="col-lg-6 primary-sidebar sticky-sidebar">
                            <div class="widget-area">
                                <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                                    <h4 class="section-title style-1 mb-30" >Suivi votre commande</h4>
                                      <form method="POST" aaction="{{asset('/tracking')}}">
                                        @csrf
                                           <div class="form-group mt-3">
                                               <input type="text" required name="codetrack" placeholder="Entrer votre code de suivi  *" />
                                           </div>
                                           <div class="form-group">
                                               <button type="submit" class="btn btn-heading btn-block hover-up" style="background-color: #BC221A;">Suivi</button>
                                           </div>
                                       </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
