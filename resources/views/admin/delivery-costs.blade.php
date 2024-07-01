@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="{{ asset('/admin') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Delivery fee</a></li>
					</ol>
                </div>
            <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Delivery fee</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Code</th>
                                                <th>Wilaya</th>
                                                <th>Domicile</th>
                                                <th>Stopdesk</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($delivery_costs as $delivery_cost)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$delivery_cost->code_wilaya}}</td>
                                                    <td>{{$delivery_cost->wilaya}}</td>
                                                    <td  style="width: 10%">
                                                        <div class="input-group">
                                                        <input type="text"  value="{{ $delivery_cost->domicile }}" class="form-control" id="domicile_{{ $delivery_cost->id }}" name='domicile' >
                                                        </div>
                                                    </td >
                                                    <td  style="width: 10%">
                                                        <div class="input-group">
                                                        <input type="text" value="{{ $delivery_cost->stopdesk }}" class="form-control" id="stopdesk_{{ $delivery_cost->id }}" name='stopdesk'>
                                                        </div>
                                                    </td >
                                                    <td>
                                                        <div class="d-flex">
                                                            <button data-id="{{ $delivery_cost->id }}" class="btn btn-primary shadow btn-xs sharp check-price" ><i class="fa fa-check"></i></button>
                                                        </div>
                                                        </form>
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
@endsection
@push('check-delivery-cost-script')

<script>
 $("body").on('click','.check-price',function() {

        var id = $(this).data('id');
        var domicile = $('#domicile_'+id).val();
        var stopdesk = $('#stopdesk_'+id).val();
        $.ajax({
			url: '/update-delivery-cost/'+id+'/'+domicile+'/'+stopdesk ,
			type: 'GET',

        success: function (res) {
            toastr.success("Price successfully updated", "Success", {
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-top-right",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1

            })
            $('#domicile_'+id).val(price_b);
            $('#stopdesk_'+id).val(price_a);
            }

        });
    });
</script>
@endpush
