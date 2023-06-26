@extends('layouts.front')
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
                <span></span> Tracking <span></span>
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-10 col-md-12 m-auto">
                    <div class="row d-flex justify-content-center">
                       <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h2 class="mb-7">Suivi votre commande</h2>
                                    </div>
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
