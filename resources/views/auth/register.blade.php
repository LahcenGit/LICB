@extends('layouts.front')
@section('content')

<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">Créer un compte</h1>
                                        <p class="mb-30">Vous avez déjà un compte? <a href="{{ asset('/login') }}">S'identifier</a></p>
                                    </div>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text"  name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Nom" required/>
                                                @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Prénom" required/>
                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" required />
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required/>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="N° de téléphone" required/>
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input  type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required/>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input  type="password" name="password_confirmation" placeholder="Confirm password" required/>
                                        </div>


                                        <div class="login_footer form-group mb-50">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="" />
                                                    <label class="form-check-label" for="exampleCheckbox12"><span>J'accepte les conditions &amp; la politique.</span></label>
                                                </div>
                                            </div>
                                          {{-- <a href="#"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a> --}}
                                        </div>
                                        <div class="form-group mb-30">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">S'inscrir</button>
                                        </div>
                                        <p class="font-xs text-muted"><strong>Remarque:</strong>Vos données personnelles seront utilisées pour améliorer votre expérience sur ce site Web, pour gérer l'accès à votre compte et à d'autres fins décrites dans notre politique de confidentialité.</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <div class="card-login mt-115">
                                <a href="#" class="social-login facebook-login">
                                    <img src="{{ asset('/front/assets/imgs/theme/icons/logo-facebook.svg') }}" alt="" />
                                    <span>Continue with Facebook</span>
                                </a>
                                <a href="#" class="social-login google-login">
                                    <img src="{{ asset('/front/assets/imgs/theme/icons/logo-google.svg') }}" alt="" />
                                    <span>Continue with Google</span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
