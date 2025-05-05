<!-- Modal tiket -->
<div class="modal fade" id="modal_form" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="myModalLabel"></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body form">
                <form id="form" class="form-horizontal">
                    <div class="form-body">
                        <div class="row">

                            <!-- ID Tiket -->
                            <div class="col-md-6 id_tiket">
                                <div class="form-group">
                                    <label for="id_tiket">ID Tiket <span class="text-danger">*</span></label>
                                    <input type="text" name="id_tiket" id="id_tiket" class="form-control" placeholder="Masukkan ID tiket" readonly required>
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>

                            <!-- Unit Kerja -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addid_unit">Unit Kerja <span class="text-danger">*</span></label>
                                    <select name="addid_unit" id="addid_unit" class="form-control select2" required>
                                        <option value="">Pilih</option>
                                    </select>
                                    <span class="help-block text-danger" id="error_addid_unit"></span>
                                </div>
                            </div>

                            <!-- Tanggal Tiket -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addtgl_tiket">Tanggal Tiket <span class="text-danger">*</span></label>
                                    <input type="text" name="addtgl_tiket" id="addtgl_tiket" class="form-control datepicker" placeholder="Masukkan tanggal tiket" required>
                                    <span class="help-block text-danger" id="error_addtgl_tiket"></span>
                                </div>
                            </div>

                            <!-- Masalah -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="addmasalah">Masalah <span class="text-danger">*</span></label>
                                    <textarea name="addmasalah" id="addmasalah" class="form-control" rows="3" placeholder="Masukkan masalah" required></textarea>
                                    <span class="help-block text-danger" id="error_addmasalah"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer Modal -->
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-window-close"></i> Cancel
                </button>
            </div>
        </div>
    </div>
</div>
