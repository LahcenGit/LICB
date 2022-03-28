@extends('layouts.dashboard-customer')
@section('content')

<style>
     .send-order{
        color:aliceblue;
        background-color:#34804a;
    }
</style>
<div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Commandes</a></li>
					</ol>
                </div>
                <div class="row">
                             <div class="col-xl-4 col-sm-4">
								<div class="card">
									<div class="card-body px-4">
										<h4 class="fs-18 font-w600 mb-5 text-nowrap">Total Commandes</h4>
										<div class="progress default-progress">
											<div class="progress-bar progress-animated" style="width: 40%; height:10px;" role="progressbar">
												<span class="sr-only">45% Complete</span>
											</div>
										</div>
										<div class="d-flex align-items-end mt-1 justify-content-between">
											<span><small class="text-primary">76</small> Points</span>
											<h4 class="mb-0 fs-32 font-w800">42</h4>
										</div>
									</div>
								</div>
				             </div>
                             <div class="col-xl-8">
								<div class="card bg-progradient manage-project">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-xl-6 col-12">
												<h4 class="fs-24 font-w700 text-white">Manage your project in one touch</h4>
												<span class="fs-16 text-white d-block">Let Wokrload manage your project automatically with our best AI systems </span>
											</div>
											<div class="col-xl-6 col-12 text-end">
												<a href="javascript:void(0);" class="btn  bg-white fs-18 btn-rounded">Try Free Now</a>
											</div>
										</div>
									</div>
								</div>
							</div>
                </div>

                <div class="row">
                        <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Table des commandes</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example3" class="display" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th>Montant</th>
                                                        <th>Tracking</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Mohammed Abdellah</td>
                                                        <td>18-03-2022</td>
                                                        <td>20000.00 DA</td>
                                                        <td>YAL-17362</td>
                                                        <td><span class="badge bg-warning text-dark">En Attente</span></td>
                                                        <td>
                                                            <form action="" method="post">
                                                                {{csrf_field()}}
                                                                {{method_field('DELETE')}}
                                                            <div class="d-flex">
                                                            <button class="btn btn-warning shadow btn-xs sharp me-1" ><i class="fas fa-map-marker-alt" style="color: #000;"></i></button>
                                                            <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                            </form>												
                                                        </td>	
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Ahmed Kissi</td>
                                                        <td>20-03-2022</td>
                                                        <td>30000.00 DA</td>
                                                        <td>YAL-21332</td>
                                                        <td><span class="badge send-order">Envoyé</span></td>
                                                        <td>
                                                            <form action="" method="post">
                                                                {{csrf_field()}}
                                                                {{method_field('DELETE')}}
                                                            <div class="d-flex">
                                                            <button class="btn btn-warning shadow btn-xs sharp me-1" ><i class="fas fa-map-marker-alt" style="color: #000;"></i></button>
                                                            <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                            </form>												
                                                        </td>	
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Karim Abdellah</td>
                                                        <td>20-03-2022</td>
                                                        <td>2500.00 DA</td>
                                                        <td>YAL-14326</td>
                                                        <td><span class="badge bg-danger">Annulé</span></td>
                                                        <td>
                                                            <form action="" method="post">
                                                                {{csrf_field()}}
                                                                {{method_field('DELETE')}}
                                                            <div class="d-flex">
                                                            <button class="btn btn-warning shadow btn-xs sharp me-1" ><i class="fas fa-map-marker-alt" style="color: #000;"></i></button>
                                                            <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                            </form>												
                                                        </td>	
                                                    </tr>
                                                </tbody>

                                    </table>
                                        </div>
                                    </div>
                                </div>
                        
                        </div>
                   </div>

        </div>
</div>
@endsection