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
                                
                                <div class="col-md-6 id_memo">
                                    <div class="form-group">
                                        <label for="id_memo">ID Memo<span class="text-danger">*</span></label>
                                        <input type="text" name="id_memo" parsley-trigger="change" required
                                                placeholder="Masukkan ID Memo" class="form-control" id="id_memo" readonly>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 no_memo">
                                    <div class="form-group">
                                        <label for="addno_memo">Nomor Memo<span class="text-danger">*</span></label>
                                        <input type="text" name="addno_memo" parsley-trigger="change" required
                                                placeholder="Masukkan Nomor Memo" class="form-control" id="addno_memo">
                                        <span class="help-block text-danger" id="error_addNoMemo"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 tgl_memo">
                                    <div class="form-group">
                                        <label for="addtgl_memo">Tanggal Memo<span class="text-danger">*</span></label>
                                        <input type="text" name="addtgl_memo" parsley-trigger="change" required
                                                placeholder="Masukkan No Ineventaris" class="form-control datepicker" id="addtgl_memo">
                                        <span class="help-block text-danger" id="error_addtgl_memo"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 perihal">
                                    <div class="form-group">
                                        <label for="addperihal">Perihal<span class="text-danger">*</span></label>
                                        <input type="text" name="addperihal" parsley-trigger="change" required
                                                placeholder="Masukkan perihal" class="form-control" id="addperihal">
                                        <span class="help-block text-danger" id="error_addperihal"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 deskripsi">
                                    <div class="form-group">
                                        <label for="adddeskripsi">Deskripsi<span class="text-danger">*</span></label>
                                        <textarea name="adddeskripsi" parsley-trigger="change" required
                                                  placeholder="Masukkan deskripsi" class="form-control" id="adddeskripsi" rows="3"></textarea>
                                        <span class="help-block text-danger" id="error_adddeskripsi"></span>
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
