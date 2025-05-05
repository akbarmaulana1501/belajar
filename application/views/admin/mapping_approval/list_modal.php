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

                                                    <!-- <div class="col-md-12 addApproval">
                                                        <div class="form-group">
                                                            <label for="addApproval">Nama Approval<span class="text-danger">*</span></label>
                                                            <input type="text" name="addApproval" parsley-trigger="change" required
                                                                    placeholder="Masukkan Nama Jenis Izin" class="form-control" id="addApproval">
                                                            <span class="help-block text-danger"></span>
                                                            <span id="err_Nbank" class="text-danger"></span>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-md-12 ">
                                                        <div class="form-group">
                                                            <label for="addApproval" class="control-label">Nama Approval<span class="text-danger">* </span></label>
                                                                <select name="addApproval" id="addApproval" class="form-control select2" required>
                                                                    <option value="">-</option>
                                                                </select>
                                                                <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 addPengajuan">
                                                        <div class="form-group">
                                                            <label for="addPengajuan" class="control-label">Nama Pengajuan<span class="text-danger">* </span></label>
                                                         
                                                                <select name="addPengajuan" id="addPengajuan"  multiple="multiple" class="form-control select2 select2-multiple" required>
                                                                    <option value="">-</option>
                                                                </select>
                                                                <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="col-md-12 addPengajuan">
                                                        <div class="form-group">
                                                            <label for="addPengajuan">Nama Pengajuan<span class="text-danger">*</span></label>
                                                            <input type="text" name="addPengajuan" parsley-trigger="change" required
                                                                    placeholder="" class="form-control" id="addPengajuan">
                                                            <span class="help-block text-danger"></span>
                                                            <span id="err_cBank" class="text-danger"></span>
                                                        </div>
                                                    </div> -->
                                                    
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
