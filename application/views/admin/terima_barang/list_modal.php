<style>
    .table-bordered.table-primary-border {
      border: 2px solid #0d6efd; /* Bootstrap primary */
    }

    .table-bordered.table-primary-border th,
    .table-bordered.table-primary-border td {
      border: 1px solid #0d6efd; /* border inside the table */
    }
</style>
<!-- Modal Terima Barang -->
<div class="modal fade" id="modal_form" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="myModalLabel">Form Terima Barang</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body form">
                <form id="form" class="form-horizontal">
                    <div class="form-body">
                        <div class="row">

                            <!-- No TTB -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_ttb">No. TTB <span class="text-danger">*</span></label>
                                    <input type="text" name="no_ttb" id="no_ttb" class="form-control" placeholder="Nomor TTB Otomatis" readonly>
                                    <span class="help-block text-danger" id="error_no_ttb"></span>
                                </div>
                            </div>

                            <!-- Insident Repot -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addid_insident_report">ID Insident Repot <span class="text-danger">*</span></label>
                                    <select name="addid_insident_report" id="addid_insident_report" class="form-control select2" required>
                                        <option value="">Pilih</option>
                                    </select>
                                    <span class="help-block text-danger" id="error_addid_insident_report"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="text-primary">Daftar Insident Repot <span class="text-danger">*</span></label>
                                <table class="table table-bordered table-primary-border" id="table-insident-report">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Identifikasi</th>
                                            <th>Solusi</th>
                                            <th>Rekomendasi</th>
                                            <th>Hasil Perbaikan</th>
                                            <th>Teknisi</th>
                                            <th>ID Tiket</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr><td colspan="8">Silakan pilih Insident Report terlebih dahulu.</td></tr>
                                    </tbody>

                                </table>
                            </div>


                            <!-- Tanggal -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="addtgl">Tanggal <span class="text-danger">*</span></label>
                                    <input type="text" name="addtgl" id="addtgl" class="form-control datepicker" placeholder="<?= date('Y-m-d') ?>"  required>
                                    <span class="help-block text-danger" id="error_addtgl"></span>
                                </div>
                            </div>

                            <!-- Keterangan -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="addket">Keterangan <span class="text-danger">*</span></label>
                                    <textarea name="addket" id="addket" class="form-control" rows="3" placeholder="Masukkan keterangan" required></textarea>
                                    <span class="help-block text-danger" id="error_addket"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Daftar Barang <span class="text-danger">*</span></label>
                                <table class="table table-bordered" id="table-barang">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th><button type="button" class="btn btn-sm btn-success" id="addRow"><i class="fas fa-plus"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width: 70%;">
                                                <select name="id_barang[]" class="form-control select2 barang-select" required>
                                                    <option value="">Pilih</option>
                                                </select>
                                            </td>
                                            <td style="width: 30%;">
                                                <input type="number" name="jumlah[]" class="form-control" value="1" min="1" required>
                                            </td>
                                            <td style="white-space: nowrap;">
                                                <button type="button" class="btn btn-sm btn-danger removeRow"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
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
