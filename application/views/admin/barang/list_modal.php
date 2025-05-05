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
                                
                                <div class="col-md-6 id_barang">
                                    <div class="form-group">
                                        <label for="id_barang">ID Barang<span class="text-danger">*</span></label>
                                        <input type="text" name="id_barang" parsley-trigger="change" required
                                                placeholder="Masukkan ID barang" class="form-control" id="id_barang" readonly>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 namabarang">
                                    <div class="form-group">
                                        <label for="addNamabarang">Nama Barang<span class="text-danger">*</span></label>
                                        <input type="text" name="addNamabarang" parsley-trigger="change" required
                                                placeholder="Masukkan Nama barang" class="form-control" id="addNamabarang">
                                        <span class="help-block text-danger" id="error_addNamabarang"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 cabangbarang">
                                    <div class="form-group">
                                        <label for="addnoinventaris">No Ineventaris<span class="text-danger">*</span></label>
                                        <input type="text" name="addnoinventaris" parsley-trigger="change" required
                                                placeholder="Masukkan No Ineventaris" class="form-control" id="addnoinventaris">
                                        <span class="help-block text-danger" id="error_addnoinventaris"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 kotabarang">
                                    <div class="form-group">
                                        <label for="addSatuan">Satuan<span class="text-danger">*</span></label>
                                        <input type="text" name="addSatuan" parsley-trigger="change" required
                                                placeholder="Masukkan Satuan" class="form-control" id="addSatuan">
                                        <span class="help-block text-danger" id="error_addSatuan"></span>
                                    </div>
                                </div>
                                
                            </div>
                    </form>
                </div>
        </div><!-- /.modal-content -->                            
        <div class="modal-footer">
           <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><i class="fas fa-save"> </i> Save</button>
           <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"> </i> Cancel</button>
        </div>
    </div><!-- /.modal-dialog -->
</div>                    
