@extends('layouts.dashboard-customer')

<style>
    .image-preview{
      border : 1px solid #29324C !important;
      margin: 10px 10px 10px 0px;
      margin-left: auto;
      margin-right: auto;
      display : flex;
      align-items: center;
      justify-content: center;
      overflow:hidden;
      border-radius:100px;
      width:150px;
      height:150px;
}

    .image-preview-image{
     width: 100%;
     height: 100%;
     border-radius:50px;

     border-radius:50px;
}
</style>
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Profil</a></li>
                </ol>
        </div>
        <div class="row d-flex justify-content-center ">
            <div class=" col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Détails de votre compte</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form ">
                        <div class="image-preview ">
                        <img id="image-preview"  src="{{asset('/dashboard/images/user.jpg')}}" class="image-preview-image"lt="profile">
                        </div>
                            <form class="form-horizontal form-material" action="{{url('/dashboard-professionel/profil/'.$user->id)}}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                                <div class="wrapper user mb-4 mt-2 d-flex justify-content-center">
                                    <input type="file" id="input-photo" name="image" class="my-file" >
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label>Nom* :</label>
                                        <input type="text" class="form-control input-default"  name="first_name" value="{{ $user->first_name }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label>Prénom* :</label>
                                        <input type="text" class="form-control input-default"  name="last_name" value="{{ $user->last_name }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label>Email* :</label>
                                        <input type="text" class="form-control input-default"  name="email" value="{{ $user->email }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="password">
                                            Un nouveau mot de passe ? <p style="font-size: 13px; font-weight:350; margin-bottom : -2px;">(Laissez le champ vide si vous ne souhaitez pas changer votre mot de passe)</p></label>
                                            <div>
                                                <input id="password" placeholder="Enter new password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary mt-3 text-center" >Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('image-script')
<script>
    $(document).ready(function () {
        // Lorsque le champ de fichier change
        $('#input-photo').change(function () {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image-preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        });
    });
</script>
@endpush
