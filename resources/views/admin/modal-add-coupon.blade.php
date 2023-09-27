<div class="modal fade" id="addCouponModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un coupon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="basic-form">
                      <div class="form-row">
                        <div class="col-md-12">
                            <label>Code*:</label>
                            <input type="text"  class="form-control input-default " id="code" placeholder="ABC123">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-12 mt-2">
                            <label>Valeur*:</label>
                            <input type="text"  class="form-control input-default " id="value" placeholder="2000">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-12 mt-2">
                            <label>Date d'éxpiration*:</label>
                            <input type="date"  class="form-control input-default " id="date" >
                        </div>
                      </div>
                      <input type="hidden"  class="form-control input-default " id="point" value="{{ $point->id }}">
                    </div>
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary storeCoupon">Ajouter</button>
            </div>
        </div>
    </div>
</div>
