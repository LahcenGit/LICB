<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="orderModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
            <div class="card-body">
                    <div class="basic-form">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label>First name*:</label>
                            <input type="text"  class="form-control input-default" value="{{ $order->first_name }}" id="name" disabled >
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Last_name*:</label>
                            <input type="text"  class="form-control input-default " value="{{ $order->last_name }}" id="name" disabled>
                        </div>
                      </div>
                      <div class="row">
                        <div class="mb-3 col-md-6">
                            <label>Phone*:</label>
                            <input type="text"  class="form-control input-default " value="{{ $order->phone }}" id="phone" disabled>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Address*:</label>
                            <input type="text"  class="form-control input-default " value="{{ $order->address }}" id="address" disabled>
                        </div>
                      </div>
                      <div class="row">
                        <div class="mb-3 col-md-6">
                            <label>Wilaya*:</label>
                            <input type="text"  class="form-control input-default " value="{{ $order->wilaya }}" id="address" disabled>
                        </div>
                      </div>


                      <div class="row">
                        <div class="mb-3 col-md-6">
                           <label>Status :</label>
                           <select class="form-control" id="status"  class="selectpicker" data-live-search="true" name="status">
                            <option value="0" @if( $order->status == 0 ) selected @endif >Pending</option>
                            <option value="1" @if( $order->status == 1 ) selected @endif >Delivery...</option>
                            <option value="2" @if( $order->status == 2 ) selected @endif >Delivered</option>
                            <option value="3" @if( $order->status == 3 ) selected @endif >Cancelled</option>
                            <option value="4" @if( $order->status == 4 ) selected @endif >Payment pending</option>
                         </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Delivery :</label> <br>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" @if($order->is_stopdesk) checked @else disabled @endif>
                                <label class="form-check-label" for="inlineRadio1">Stopdesk</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" @if($order->is_stopdesk) disabled @else checked @endif>
                                <label class="form-check-label" for="inlineRadio2">At Home</label>
                              </div>
                        </div>
                     </div>
                     <input type="hidden" value="{{ $order->id }}" id="order">
                    </div>
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary storeOrder">Send</button>
            </div>
        </div>
    </div>
</div>
