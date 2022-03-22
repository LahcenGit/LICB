@extends('layouts.dashboard-admin')
@section('content')

<style>
    .valid-order{
      color:aliceblue;
      background-color:#34804a;
    }
    .send-order{
      color:aliceblue;
      background-color:#2127d1;
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
                                                <th>Client</th>
                                                <th>Date</th>
                                                <th>Montant</th>
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
                                                <td><span class="badge bg-warning text-dark">En Attente</span></td>
                                                <td>
                                                    <form action="" method="post">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                    <div class="d-flex">
                                                        <a href="" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
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
                                                 <td><span class="badge send-order">Envoyé</span></td>
                                                <td>
                                                    <form action="" method="post">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                    <div class="d-flex">
                                                        <a href="" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
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
                                                 <td><span class="badge bg-danger">Annulé</span></td>
                                                <td>
                                                    <form action="" method="post">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                    <div class="d-flex">
                                                        <a href="" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    </form>												
                                                </td>	
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Meriem Benahbib</td>
                                                <td>21-03-2022</td>
                                                <td>40000.00 DA</td>
                                                 <td><span class="badge valid-order">Recu</span></td>
                                                <td>
                                                    <form action="" method="post">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                    <div class="d-flex">
                                                        <a href="" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
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