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
                                                <th>Wilaya</th>
                                                <th>Adresse</th>
                                                <th>Téléphone</th>
                                                <th>Code Tracking</th>
                                                <th>Statut</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$order->first_name}} {{ $order->last_name }}</td>
                                                <td>{{ $order->wilaya }}</td>
                                                <td>{{ $order->address }}</td>
                                                <td>{{ $order->phone }}</td>
                                                @if($order->tracking_code)
                                                <td>{{ $order->tracking_code }}</td>
                                                @else
                                                <td><i class="fas fa-minus"></i></td>
                                                @endif
                                                @if($order->status == 0)
                                                <td><span class="badge light badge-warning">En attente</span></td>
                                                @elseif($order->status == 1)
                                                <td><span class="badge badge-primary light">Livraison...</span></td>
                                                @elseif($order->status == 2)
                                                <td><span class="badge light badge-success">Livré</span></td>
                                                @elseif($order->status == 3)
                                                <td><span class="badge light badge-danger">Annulé</span></td>
                                                @else
                                                <td><span class="badge badge-dark light">En attente de paiement</span></td>
                                                @endif
                                                <td>
                                                   <div class="d-flex">
                                                        <a href="{{ asset('admin/order-detail/'.$order->id) }}" class="btn btn-primary shadow btn-xs sharp me-1 order-details"><i class="fas fa-eye"></i></a>
                                                        @if($order->status == 0)
                                                        <button data-id="{{ $order->id }}" class="btn btn-success shadow btn-xs sharp me-1 add-order-to-yalidine"><i class="fas fa-plus"></i></button>
                                                        @endif
                                                        <a href="#" data-id="{{ $order->id }}" class="btn btn-warning shadow btn-xs sharp me-1 edit-status"><i class="fas fa-pencil-alt"></i></a>
                                                        <form action="{{url('admin/orders/'.$order->id)}}" method="post">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}
                                                            <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
                                                       </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            </div>
</div>
<div id="modal-order">

</div>
<div id="modal-edit-status-order">

</div>
@endsection

@push('order-scripts')
<script>
$(".add-order-to-yalidine").click(function() {
  var id = $(this).data('id');
 $.ajax({
        url: '/add-order-to-yalidine/'+id ,
        type: "GET",
        success: function (res) {
        $('#modal-order').html(res);
        $("#orderModal").modal('show');
        }
    });

});

$("#modal-order").on('click','.storeOrder',function(e){
   e.preventDefault();
   var id = $('#order').val();

   $.ajax({
     url: '/store-parcel/'+id,
     type:"GET",
     success:function(response){

       $('#orderModal').modal('hide');

       console.log(response);
       location.reload();
     }

     });

});

$("body").on('click','.edit-status',function() {
  var id = $(this).data('id');
 $.ajax({
        url: '/edit-status-order/'+id ,
        type: "GET",
        success: function (res) {
        $('#modal-edit-status-order').html(res);
        $("#editStatusModal").modal('show');
        }
    });

});

$("#modal-edit-status-order").on('click','.editStatus',function(e){
   e.preventDefault();
   let status = $('#status').val();
   let order =  $('#order').val();
   $.ajax({
            type:"Post",
            url: '/update-status',
            data:{
              "_token": "{{ csrf_token() }}",
              status:status,
              order:order,
            },
            success:function(res){
             $('#editStatusModal').modal('hide');
             console.log(res);
             location.reload();
            },

        });


});
</script>
@endpush
