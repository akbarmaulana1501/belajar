<div class="modal fade bs-example-modal-xl" id="modal_form" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <!-- <div class="modal-dialog modal-lg"> -->
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header badge-primary">
                    <h4 class="modal-title mt-0"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal">
                        <div class="form-body">
                            <div class="row">
                                
                                <div class="col-md-6 id_bank">
                                    <div class="form-group">
                                        <label for="id_bank">ID Bank<span class="text-danger">*</span></label>
                                        <input type="text" name="id_bank" parsley-trigger="change" required
                                                placeholder="Masukkan ID Bank" class="form-control" id="id_bank" readonly>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 namaBank">
                                    <div class="form-group">
                                        <label for="addNamabank">Nama Bank<span class="text-danger">*</span></label>
                                        <input type="text" name="addNamabank" parsley-trigger="change" required
                                                placeholder="Masukkan Nama Bank" class="form-control" id="addNamabank">
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 cabangBank">
                                    <div class="form-group">
                                        <label for="addCabangbank">Cabang Bank<span class="text-danger">*</span></label>
                                        <input type="text" name="addCabangbank" parsley-trigger="change" required
                                                placeholder="Masukkan Cabang Bank" class="form-control" id="addCabangbank">
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 kotaBank">
                                    <div class="form-group">
                                        <label for="addKotabank">Kota Bank<span class="text-danger">*</span></label>
                                        <input type="text" name="addKotabank" parsley-trigger="change" required
                                                placeholder="Masukkan Kota Bank" class="form-control" id="addKotabank">
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                                
                            </div>
                    </form>
                </div>
        </div><!-- /.modal-content -->                            
        <div class="modal-footer">
           <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><i class="fe-save"> </i> Save</button>
           <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
    </div><!-- /.modal-dialog -->
</div>                    
