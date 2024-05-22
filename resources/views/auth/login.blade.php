@extends('layouts.front')
@section('content')
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
<main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ asset('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
                    <span></span> Connexion
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <img class="border-radius-15" src="{{asset('front/assets/imgs/login-img.jpg')}}" alt="" />
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Connexion</h1>
                                            <p class="mb-30">Vous n'avez pas de compte ? <a href="{{ asset('/register') }}">Créer un compte maintenant</a></p>
                                        </div>
                                        <form method="POST" action="{{ route('login') }}">
                                         @csrf
                                            <div class="form-group">
                                                <input type="text" required name="username" placeholder="Email ou Nom d'utilisateur  *" />
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password" placeholder="Mot de passe*" />
                                            </div>

                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                                        <label class="form-check-label" for="exampleCheckbox1"><span>Se souvenir de moi</span></label>
                                                    </div>
                                                </div>
                                                <a class="text-muted" href="#">Mot de passe oublié?</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-heading btn-block hover-up" style="background-color: #BC221A;" name="login">Connectez</button>
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
