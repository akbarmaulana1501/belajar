<!-- Modal insident_report --> 
<div class="modal fade" id="modal_form" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="myModalLabel">Form Insident Report</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <form id="form" class="form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            <!-- ID insident_report -->
                            <div class="col-md-6" id="addid_insident_report_wrapper">
                                <div class="form-group">
                                    <label for="addid_insident_report">ID Insident Report <span class="text-danger">*</span></label>
                                    <input type="text" name="addid_insident_report" id="addid_insident_report" class="form-control" readonly required>
                                    <span class="help-block text-danger" id="error_addid_insident_report"></span>
                                </div>
                            </div>

                            <!-- Tanggal -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addtgl_insident">Tanggal Insident Report <span class="text-danger">*</span></label>
                                    <input type="text" name="addtgl_insident" id="addtgl_insident" class="form-control datepicker" required>
                                    <span class="help-block text-danger" id="error_addtgl_insident"></span>
                                </div>
                            </div>

                            <!-- Identifikasi -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="addidentifikasi">Identifikasi <span class="text-danger">*</span></label>
                                    <textarea name="addidentifikasi" id="addidentifikasi" class="form-control" rows="3" required></textarea>
                                    <span class="help-block text-danger" id="error_addidentifikasi"></span>
                                </div>
                            </div>

                            <!-- Solusi -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="addsolusi">Solusi</label>
                                    <textarea name="addsolusi" id="addsolusi" class="form-control" rows="3"></textarea>
                                    <span class="help-block text-danger" id="error_addsolusi"></span>
                                </div>
                            </div>

                            <!-- Rekomendasi -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="addrekomendasi">Rekomendasi</label>
                                    <textarea name="addrekomendasi" id="addrekomendasi" class="form-control" rows="3"></textarea>
                                    <span class="help-block text-danger" id="error_addrekomendasi"></span>
                                </div>
                            </div>

                            <!-- Hasil Perbaikan -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="addhasilperbaikan">Hasil Perbaikan</label>
                                    <textarea name="addhasilperbaikan" id="addhasilperbaikan" class="form-control" rows="3"></textarea>
                                    <span class="help-block text-danger" id="error_addhasilperbaikan"></span>
                                </div>
                            </div>

                            <!-- Teknisi -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addid_teknisi">Teknisi <span class="text-danger">*</span></label>
                                    <select name="addid_teknisi" id="addid_teknisi" class="form-control select2" required>
                                        <option value="">Pilih</option>
                                    </select>
                                    <span class="help-block text-danger" id="error_addid_teknisi"></span>
                                </div>
                            </div>

                            <!-- Tiket -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addid_tiket">ID Tiket</label>
                                    <select name="addid_tiket" id="addid_tiket" class="form-control select2">
                                        <option value="">Pilih</option>
                                    </select>
                                    <span class="help-block text-danger" id="error_addid_tiket"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer Modal -->
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-window-close"></i> Batal
                </button>
            </div>
        </div>
    </div>
</div>
