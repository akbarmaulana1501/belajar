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
                                
                                <div class="col-md-6 id_berkas">
                                    <div class="form-group">
                                        <label for="id_berkas">ID berkas<span class="text-danger">*</span></label>
                                        <input type="text" name="id_berkas" parsley-trigger="change" required
                                                placeholder="Masukkan ID berkas" class="form-control" id="id_berkas" readonly>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 namaberkas">
                                    <div class="form-group">
                                        <label for="addNamaberkas">Nama Berkas<span class="text-danger">*</span></label>
                                        <input type="text" name="addNamaberkas" parsley-trigger="change" required
                                                placeholder="Masukkan Nama berkas" class="form-control" id="addNamaberkas">
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

