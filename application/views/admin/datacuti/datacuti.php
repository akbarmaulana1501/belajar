<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);"><?= $m ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?= $ml ?></li>
                </ol>
            </div>
            <h4 class="page-title"><button type="button" class="btn btn-sm btn-primary waves-effect waves-light" id="reload"><i class="fe-refresh-cw"></i> Reload </button>
                <button type="button" data-toggle="collapse" data-target="#list_filter"  class="btn btn-sm btn-primary waves-effect waves-light" id="filter"><i class="fas fa-filter"></i> Filter </button>
            </h4>
        </div>
    </div>
</div>


<div class="collapse" id="list_filter">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-border">
                <div class="card-header border-primary pb-0"></div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group mb-0">
                                    <label>Tanggal Mulai Cuti</label>
                                    <div>
                                        <div class="input-daterange input-group" data-provide="datepicker">
                                            <input type="text" class="form-control" name="start_date" id="start_date" />
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-primary text-white b-0">to</span>
                                            </div>
                                            <input type="text" class="form-control" name="end_date" id="end_date" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                    <label>Status</label>
                                <select name="status" id="filter_status" class="form-control select2" required>
                                    <option value="" selected>Pilih</option>
                                    <option value="1">Setujui</option>
                                    <option value="2">Tolak</option>
                                </select>
                            </div>
                            <div class="col-md-2" style="padding-top:30px" id="button_filter">
                                 <button type="button" id="btn-filter" class="btn btn-block btn-primary waves-effect waves-light"><i class="fas fa-filter"></i> Filter </button>
                            </div>
                            <div class="col-md-2" style="padding-top:30px" id="button_reset">
                                 <button type="button" id="reset" class="btn btn-block btn-danger"><i class="fas fa-undo"></i> Reset </button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-sm-12">
        <div class="card card-border">
            <div class="card-header border-primary pb-0"></div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse:collapse;border-spacing:0;width:100%">
                    <thead>
                        <tr>
                            <th width="2%">No</th>
                            <th>Action</th>
                            <th>Status</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Lama</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Akhir</th>
                            <th>Jenis Cuti</th>
                            <th>Keterangan</th>
                            <th>Sisa Cuti</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap modal cuti-->
<div class="modal fade bs-example-modal-xl" id="modal_approve" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <!-- <div class="modal-dialog modal-lg"> -->
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header badge-primary">
                <h4 class="modal-title mt-0">Approve Cuti</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="#" id="formApp" class="form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Name">Nama<span class="text-danger">*</span></label>
                                    <input type="text" name="nama_app" parsley-trigger="change" required
                                        placeholder="Masukkan Nama" class="form-control" id="nama_app" readonly>
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Name">NIK<span class="text-danger">*</span></label>
                                    <input type="text" name="nik_app" parsley-trigger="change" required
                                        placeholder="Masukkan nik" class="form-control" id="nik_app" readonly>
                                    <input type="hidden" name="idapp" id='idapp'>
                                    <input type="hidden" name="idp" id='idp'>
                                    <!-- <input type="hidden" name="lama_cuti" id='lama_cuti'> -->
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Name">Unit Level<span class="text-danger">*</span></label>
                                    <input type="text" name="unit_level_app" parsley-trigger="change" required
                                        placeholder="Masukkan unit_level" class="form-control" id="unit_level_app" readonly>
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Name">Unit Kerja<span class="text-danger">*</span></label>
                                    <input type="text" name="unit_kerja_app" parsley-trigger="change" required
                                        placeholder="Masukkan unit_kerja" class="form-control" id="unit_kerja_app" readonly>
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Name">Unit Organisasi<span class="text-danger">*</span></label>
                                    <input type="text" name="jatah_cuti_app" parsley-trigger="change" required
                                        placeholder="Masukkan unit_organisasi" class="form-control" id="unit_organisasi_app" readonly>
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Name">Lama Cuti<span class="text-danger">*</span></label>
                                    <input type="text" name="lama_cuti" parsley-trigger="change" required
                                        placeholder="Masukkan Jatah Cuti" class="form-control" id="lama_cuti" readonly>
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Name">Sisa Cuti<span class="text-danger">*</span></label>
                                    <input type="text" name="jatah_cuti_app" parsley-trigger="change" required
                                        placeholder="Masukkan Jatah Cuti" class="form-control" id="jatah_cuti_app" readonly>
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label for="userName">Setujui / Tolak<span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control select2" required>
                                        <option value="" selected>Pilih</option>
                                        <option value="1">Setujui</option>
                                        <option value="2">Tolak</option>
                                    </select>
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Name">Catatan<span class="text-danger">*</span></label>
                                    <textarea required class="form-control" rows="2" name="catatan_app" id="catatan_app"></textarea>
                                </div>
                            </div>  
                        </div>
                    </div>
                </form>
        </div><!-- /.modal-content -->
        <div class="modal-footer">
            <button type="button" id="btnSetuju" onclick="simpan_approve()"  class="btn btn-primary"><i class="fe-save"> </i>
                Simpan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-window-close"> </i>
                Cancel</button>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<!-- End Bootstrap modal cuti ->  
-

<?php $this->load->view('templates/includes/footer') ?>

<?php $this->load->view('admin/datacuti/detail_datacuti'); ?>