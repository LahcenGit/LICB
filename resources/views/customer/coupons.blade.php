@extends('layouts.dashboard-customer')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Mes coupons</a></li>
            </ol>
        </div>
        <h6>Vous avez <b>3</b> coupons</h6>
        <div class="row">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card bg-progradient manage-project">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-xl-8 col-12">
                                        <h4 class="fs-24 font-w700 text-white">ABDF5145</h4>
                                        <span class="fs-14 text-white d-block">Du 01.09.2023 au 01.10.2023</span>
                                        <span class="fs-14 text-white d-block">pour tous achat > 20.000 Da</span>
                                    </div>
                                    <div class="col-xl-4 col-12 text-end">
                                        <a href="javascript:void(0);" class="btn  bg-white fs-18" style="background: #6EB704 !important;">Valide</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card bg-progradient manage-project">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-xl-8 col-12">
                                        <h4 class="fs-24 font-w700 text-white">ABDF5215</h4>
                                        <span class="fs-14 text-white d-block">Du 15.09.2023 au 15.10.2023</span>
                                        <span class="fs-14 text-white d-block">pour tous achat > 10.000 Da</span>
                                    </div>
                                    <div class="col-xl-4 col-12 text-end">
                                        <a href="javascript:void(0);" class="btn  bg-white fs-18" style="background: #6EB704 !important;">Valide</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card bg-progradient manage-project">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-xl-8 col-12">
                                        <h4 class="fs-24 font-w700 text-white">ABDF5365</h4>
                                        <span class="fs-14 text-white d-block">Du 25.09.2023 au 26.10.2023</span>
                                        <span class="fs-14 text-white d-block">pour tous achat > 30.000 Da</span>
                                    </div>
                                    <div class="col-xl-4 col-12 text-end">
                                        <a href="javascript:void(0);" class="btn  bg-white fs-18" style="background: #6EB704 !important;">Valide</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
