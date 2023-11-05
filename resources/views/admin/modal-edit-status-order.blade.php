<div class="modal fade bd-example-modal-lg" id="editStatusModal">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier status</h5>
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
                                <option value="0" @if( $order->status == 0 ) selected @endif >En attente</option>
                                <option value="1" @if( $order->status == 1 ) selected @endif >En cours de livraison</option>
                                <option value="2" @if( $order->status == 2 ) selected @endif >Livré</option>
                                <option value="3" @if( $order->status == 3 ) selected @endif >Annuler</option>
                                <option value="4" @if( $order->status == 4 ) selected @endif >En attente de paiement</option>
                            </select>
                        </div>
                     </div>
                     <input type="hidden" value="{{ $order->id }}" id="order">
                    </div>
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fermer</button>
                <button type="button"  class="btn btn-primary editStatus">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
