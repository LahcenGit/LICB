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
                        <h4 class="card-title">Gestion des points</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Client</th>
                                        <th>Points</th>
                                        <th>Date</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($points as $point)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$point->user->first_name}} {{$point->user->last_name}}</td>
                                        <td>{{$point->point}}</td>
                                        <td>{{$point->created_at->format('Y-m-d')}}</td>
                                        @if($point->status == 0)
                                        <td><span class="badge light badge-warning">En attente</span></td>
                                        @elseif($point->status == 1)
                                        <td><span class="badge badge-success light">Validé</span></td>
                                        @elseif($point->status == 3)
                                        <td><span class="badge light badge-danger">Annulé</span></td>
                                        @endif
                                        <td>
                                            <div class="d-flex">
                                                @if($point->status == 1)
                                                    @if($point->countCoupon())
                                                    <button data-id="{{ $point->id }}" class="btn btn-success shadow btn-xs sharp me-1 add-coupon"><i class="fas fa-plus"></i></button>
                                                    @endif
                                                @endif
                                                <button data-id="{{ $point->id }}" class="btn btn-warning shadow btn-xs sharp me-1 edit-status"><i class="fas fa-pencil-alt"></i></button>
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
<div id="modal-add-coupon">

</div>
<div id="modal-point">

</div>

@endsection
@push('point-scripts')
<script>
$(".edit-status").click(function() {
  var id = $(this).data('id');
 $.ajax({
        url: '/edit-status/'+id ,
        type: "GET",
        success: function (res) {
        $('#modal-point').html(res);
        $("#pointModal").modal('show');
        }
    });
});

$("#modal-point").on('click','.updateStatus',function(e){
   e.preventDefault();
   var id = $('#point').val();
   var status = $('#status').val();
   $.ajax({
     url: '/update-status/'+id+'/'+status,
     type:"GET",
     success:function(response){
     $('#modal-point').modal('hide');
       console.log(response);
       location.reload();
     }
});

});
</script>
@endpush

@push('coupon-script')
<script>
$(".add-coupon").click(function() {
    var id = $(this).data('id');
    $.ajax({
          url: '/add-coupon/'+id ,
          type: "GET",
          success: function (res) {
          $('#modal-add-coupon').html(res);
          $("#addCouponModal").modal('show');
          }
      });
  });
$("#modal-add-coupon").on('click','.storeCoupon',function(e){
   e.preventDefault();
   let code = $('#code').val();
   let value =  $('#value').val();
   let date =  $('#date').val();
   let point =  $('#point').val();
   $.ajax({
            type:"Post",
            url: '/store-coupon',
            data:{
              "_token": "{{ csrf_token() }}",
              code:code,
              value:value,
              date:date,
              point:point,
            },
            success:function(res){
             $('#modal-add-coupon').modal('hide');
             console.log(res);
             location.reload();
            },

        });

});
</script>
@endpush
