<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="pointModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier statut</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
            <div class="card-body">
                    <div class="basic-form">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label>Statut :</label>
                            <select class="form-control" id="status"  class="selectpicker" data-live-search="true" name="status">
                                <option value="0" @if( $point->status == 0 ) selected @endif >En attente</option>
                                <option value="1" @if( $point->status == 1 ) selected @endif >Validé</option>
                                <option value="2" @if( $point->status == 2 ) selected @endif >Annuler</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" value="{{ $point->id }}" id="point">
                    </div>
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary updateStatus">Envoyer</button>
            </div>
        </div>
    </div>
</div>
