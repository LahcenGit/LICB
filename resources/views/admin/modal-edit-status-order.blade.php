<div class="modal fade bd-example-modal-lg" id="editStatusModal">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="basic-form">
                      <div class="form-row">
                        <div class="col-md-12">
                           <label>Statut :</label>
                           <select class="form-control" id="status"  class="selectpicker" data-live-search="true" name="status">
                                <option value="0" @if( $order->status == 0 ) selected @endif >Pending</option>
                                <option value="1" @if( $order->status == 1 ) selected @endif >Delivery...</option>
                                <option value="2" @if( $order->status == 2 ) selected @endif >Delivered</option>
                                <option value="3" @if( $order->status == 3 ) selected @endif >Cancelled</option>
                                <option value="4" @if( $order->status == 4 ) selected @endif >Payment pending</option>
                            </select>
                        </div>
                     </div>
                     <input type="hidden" value="{{ $order->id }}" id="order">
                    </div>
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button"  class="btn btn-primary editStatus">Save</button>
            </div>
        </div>
    </div>
</div>
