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

                                <div class="col-md-6 id_pegawai" style="display:none;">
                                    <div class="form-group">
                                        <label for="Name">ID Pegawai<span class="text-danger">*</span></label>
                                        <input type="text" name="id_pegawai" parsley-trigger="change" required placeholder="Masukkan ID Pegawai" class="form-control" id="id_pegawai" readonly>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 id_berkas_pendukung">
                                    <div class="form-group">
                                        <label for="id_berkas_pendukung">ID berkas<span class="text-danger">*</span></label>
                                        <input type="text" name="id_berkas_pendukung" parsley-trigger="change" required placeholder="Masukkan ID berkas" class="form-control" id="id_berkas_pendukung" readonly>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 namaberkas">
                                    <div class="form-group">
                                        <label for="addNamaberkas">Nama Berkas<span class="text-danger">*</span></label>
                                        <input type="text" name="addNamaberkas" parsley-trigger="change" required placeholder="Masukkan Nama berkas" class="form-control" id="addNamaberkas">
                                        <span class="help-block text-danger"></span>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-12 BerkasPend">
                                    <div class="form-group">
                                        <label for="BerkasPend">Upload<span class="text-danger">*</span></label>
                                        <div class='custom-file'>
                                            <input type="file" class="custom-file-input" parsley-trigger="change" required id="BerkasPend" name='BerkasPend'>
                                            <label class="custom-file-label" id='berkasName' for="customFile">Choose file...</label>
                                        </div>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save('add_berkas')" class="btn btn-primary"><i class="fe-save"> </i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-dialog -->
        </div>