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
            <h4 class="page-title">
                <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="add()"><i class="fe-plus-square"></i> Create </button>
                <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="reload_table()"><i class="fe-refresh-cw"></i> Reload </button>
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
                                    <label>Tanggal Mulai Izin</label>
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
                            <th>Jenis izin</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap modal izin-->
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Name">Nama<span class="text-danger">*</span></label>
                                    <input type="text" name="nama" parsley-trigger="change" required
                                        placeholder="Masukkan Nama" value='<?= $this->App->aplikasi()['nama']; ?>' class="form-control" id="nama" readonly>
                                    <span class="help-block text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="Name">NIK<span class="text-danger">*</span></label>
                                    <input type="text" name="nik" parsley-trigger="change" required
                                        placeholder="Masukkan NIK" class="form-control  number-only" value='<?= $this->App->aplikasi()['nik']; ?>' readonly  id="nik">
                                    <span class="help-block text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="Name">Unit Level<span class="text-danger">*</span></label>
                                    <input type="text" value='<?= $this->App->aplikasi()['nm_unit_level']; ?>' readonly name="unit_level" parsley-trigger="change" required
                                        placeholder="Masukkan Unit Level" class="form-control" id="unit_level">
                                    <span class="help-block text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="Name">Unit Kerja<span class="text-danger">*</span></label>
                                    <input type="text" value='<?= $this->App->aplikasi()['nm_unit_kerja']; ?>' readonly name="unit_kerja" parsley-trigger="change" required
                                        placeholder="Masukkan Unit Kerja" class="form-control" id="unit_kerja">
                                    <span class="help-block text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="Name">Sub Unit Kerja<span class="text-danger">*</span></label>
                                    <input type="text" value='<?= $this->App->aplikasi()['nm_unit_kerja_sub']; ?>' readonly name="sub_unit_kerja" required
                                        placeholder="Masukkan Unit Sub Kerja" class="form-control" id="sub_unit_kerja">
                                    <span class="help-block text-danger"></span>
                                    
                                </div>
                                <div class="form-group tgl_pengajuan" hidden>
                                    <label for="Name">Tanggal Pengajuan<span class="text-danger">*</span></label>
                                    <input type="text" name="tgl_pengajuan" parsley-trigger="change" required
                                        placeholder="Masukkan Tanggal Pengajuan"
                                        class="form-control datepicker  number-only" id="tgl_pengajuan" value="<?= date('Y-m-d') ?>" readonly>
                                    <span class="help-block text-danger"></span>
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group jns_izin">
                                    <label for="Name">Jenis izin<span class="text-danger">*</span></label>
                                    <select name="jns_izin" id="jns_izin" class="form-control select2">
                                        <option value="">-</option>
                                    </select>
                                    <span class="help-block text-danger"></span>
                                </div>
                                <div class="form-group lama">
                                    <label for="Name">Lama izin<span class="text-danger">*</span></label>
                                    <input type="number" id="lama" name="lama" class="form-control" placeholder="Lama" readonly>
                                        <span class="help-block text-danger"></span>
                                        <span class="help-block text-danger"></span>
                                </div>
                                <div class="form-group tgl_mulai">
                                    <label for="Name">Tanggal Mulai<span class="text-danger">*</span></label>
                                    <input type="text" name="tgl_mulai" parsley-trigger="change" required
                                        placeholder="Masukkan Tanggal Mulai"
                                        class="form-control datepicker  number-only" id="tgl_mulai">
                                    <span class="help-block text-danger"></span>
                                    <span class="help-block text-danger"></span>
                                </div>
                                <div class="form-group tgl_akhir">
                                    <label for="Name">Tanggal Akhir<span class="text-danger">*</span></label>
                                    <input type="text" name="tgl_akhir" parsley-trigger="change" required
                                        placeholder="Masukkan Tanggal Akhir"
                                        class="form-control datepicker  number-only" id="tgl_akhir">
                                    <span class="help-block text-danger"></span>
                                    <span class="help-block text-danger"></span>
                                </div>
                                
                            </div>
                            <div class="col-md-12">
                                <div class="form-group keterangan">
                                    <label for="Name">Alasan<span class="text-danger">*</span></label>
                                    <textarea name="keterangan" id="keterangan" class='form-control'></textarea>
                                    <span class="help-block text-danger"></span><span class="help-block text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        </div><!-- /.modal-content -->
        <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save();"  class="btn btn-primary"><i class="fe-save"> </i>
                Ajukan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<!-- End Bootstrap modal izin -->  


<!-- Bootstrap modal izin-->
<!-- /.modal -->
</div>
<!-- End Bootstrap modal izin ->  
-

<?php $this->load->view('templates/includes/footer') ?>

<?php $this->load->view('admin/izin/detail_izin'); ?>