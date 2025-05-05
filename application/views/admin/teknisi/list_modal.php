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
                                
                                <div class="col-md-6 id_teknisi">
                                    <div class="form-group">
                                        <label for="id_teknisi">ID Teknisi<span class="text-danger">*</span></label>
                                        <input type="text" name="id_teknisi" parsley-trigger="change" required
                                                placeholder="Masukkan ID teknisi" class="form-control" id="id_teknisi" readonly>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 nm_teknisi">
                                    <div class="form-group">
                                        <label for="addnm_teknisi">Nama Teknisi<span class="text-danger">*</span></label>
                                        <input type="text" name="addnm_teknisi" parsley-trigger="change" required
                                                placeholder="Masukkan Nomor teknisi" class="form-control" id="addnm_teknisi">
                                        <span class="help-block text-danger" id="error_addnm_teknisi"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 spesialisasi">
                                    <div class="form-group">
                                        <label for="addspesialisasi">Spesialisasi<span class="text-danger">*</span></label>
                                        <input type="text" name="addspesialisasi" parsley-trigger="change" required
                                                placeholder="Masukkan No Ineventaris" class="form-control" id="addspesialisasi">
                                        <span class="help-block text-danger" id="error_addspesialisasi"></span>
                                    </div>
                                </div>
                                
                            </div>
                    </form>
                </div>
        </div><!-- /.modal-content -->                            
        <div class="modal-footer">
           <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><i class="fas fa-save"> </i> Save </button>
           <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"> </i> Cancel</button>
        </div>
    </div><!-- /.modal-dialog -->
</div>                    
