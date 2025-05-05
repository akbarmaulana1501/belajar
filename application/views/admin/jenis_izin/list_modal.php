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

                                <div class="col-md-6 id_jenis_izin">
                                    <div class="form-group">
                                        <label for="id_bank">ID Jenis Izin<span class="text-danger">*</span></label>
                                        <input type="text" name="id_jenis_izin" parsley-trigger="change" required
                                        placeholder="Masukkan ID Jenis Izin" class="form-control" id="id_jenis_izin" readonly>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 namaJenis_izin">
                                    <div class="form-group">
                                        <label for="addNamajenis_izin">Nama Jenis Izin<span class="text-danger">*</span></label>
                                        <input type="text" name="addNamajenis_izin" parsley-trigger="change" required
                                        placeholder="Masukkan Nama Jenis Izin" class="form-control" id="addNamajenis_izin">
                                        <span class="help-block text-danger"></span>
                                        <span class="help-block text-danger"></span>
                                        <span id="err_nBank" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 lamaJenis_izin">
                                    <div class="form-group">
                                        <label for="addLamajenis_izin">Lama Izin<span class="text-danger">*</span></label>
                                        <input type="number" name="addLamajenis_izin" parsley-trigger="change" required
                                        placeholder="Masukkan Lama Jenis Izin" class="form-control" id="addLamajenis_izin">
                                        <span class="text-primary">*<i>Dalam hari</i></span>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->                            
                <div class="modal-footer">
                   <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><i class="fe-save"> </i> Save</button>
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
               </div>
           </div><!-- /.modal-dialog -->
       </div>                    
