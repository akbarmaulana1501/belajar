                    <!-- Bootstrap modal  modal_form_upload_peldik-->
                    <div class="modal fade bs-example-modal-xl" id="modal_form_upload_peldik" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header badge-primary">
                                    <h4 class="modal-title mt-0"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body form">
                                    <form action="#" id="form_upload_peldik" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <!-- DATA PEGAWAI -->
                                                <div class="col-md-6 id_pegawai" style="display:none;">
                                                    <div class="form-group">
                                                        <label  for="Name">ID Pegawai<span class="text-danger">*</span></label>
                                                        <input type="text" name="id_pegawai" parsley-trigger="change" required
                                                        placeholder="Masukkan ID Pegawai" class="form-control" id="id_pegawai" readonly>
                                                        <span class="help-block text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 nik">
                                                    <div class="form-group">
                                                     <label for="Name">NIK Pegawai<span class="text-danger">*</span></label>
                                                     <input type="text" name="nik" parsley-trigger="change" required
                                                     placeholder="Masukkan NIK Pegawai"  class="form-control number-only" id="nik">
                                                     <span class="help-block text-danger"></span> 
                                                     <span id="errmsg" class="text-danger">  </span>
                                                 </div>
                                             </div>
                                             <div class="col-md-6 nama">
                                                <div class="form-group">
                                                    <label for="Name">Nama Pegawai<span class="text-danger">*</span></label>
                                                    <input type="text" name="nama" parsley-trigger="change" required
                                                    placeholder="Masukkan Nama Pegawai" class="form-control" id="nama">
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                                    <!-- <div class="col-md-6 no_kk">
                                                        <div class="form-group">
                                                             <label for="Name">Nomor kartu Keluarga<span class="text-danger">*</span></label>
                                                            <input type="text" name="no_kk" parsley-trigger="change" required
                                                                    placeholder=""  class="form-control number-only" id="no_kk">
                                                            <span class="help-block text-danger"></span> 
                                                            <span id="errmsg" class="text-danger">  </span>
                                                        </div>
                                                    </div> -->
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div id="AddPeldik" class="card collapse">
                                                            <div class="card-header bg-info">
                                                                <h4 class="card-title text-white mb-0">Tambah peldik Pegawai</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type='hidden' name='id_pegawai_peldik' id='id_pegawai_peldik'>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="userName">Nama Penyelenggara<span class="text-danger">*</span></label>
                                                                            <select name="namaPenyelenggara" id='namaPenyelenggara' class="form-control select2" required>
                                                                                <!-- <option disabled="disabled"  value="" selected>Pilih</option> -->
                                                                                <option value="-">Pilih</option>
                                                                            </select>
                                                                            <span class="help-block text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="userName">Nama Pelatihan dan Diklat<span class="text-danger">*</span></label>
                                                                            <input type="text" name="namaPeldik" id="namaPeldik" class='form-control'>
                                                                            <span class="help-block text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <!-- <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="userName">Tanggal Mulai<span class="text-danger">*</span></label>
                                                                                <input type="date" name="tglMulai" id="tglMulai" parsley-trigger="change" required 
                                                                                placeholder="Masukkan Tanggal Mulai" class="form-control datepicker number-only">
                                                                                <span class="help-block text-danger"></span>
                                                                        </div>
                                                                    </div> -->


                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="Name">Tanggal Mulai<span class="text-danger">* </span></label>
                                                                            <input type="text" name="tglMulai" parsley-trigger="change" required
                                                                            placeholder="Masukkan Tanggal Mulai" class="form-control datepicker  number-only">
                                                                            <span id="" class="text-danger">  </span>
                                                                            <span class="help-block text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                    <!-- --------- -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="Name">Tanggal Selesai<span class="text-danger">* </span></label>
                                                                            <input type="text" name="tglSelesai" parsley-trigger="change" required
                                                                            placeholder="Masukkan Tanggal Selesai" class="form-control datepicker  number-only">
                                                                            <span id="" class="text-danger">  </span>
                                                                            <span class="help-block text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="userName">Tanggal Selesai<span class="text-danger">*</span></label>
                                                                                <input type="date" name="tglSelesai" id="tglSelesai" class='form-control'>
                                                                                <span class="help-block text-danger"></span>
                                                                        </div>
                                                                    </div> -->
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="userName">Waktu<span class="text-danger">*</span></label>
                                                                            <!-- <input type="number" maxlength='4' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" min='1' max='9999' name="waktu" id="waktu" class='form-control'> -->
                                                                            <input type="time" name="waktu" id="waktu" class='form-control'>
                                                                            <span class="help-block text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 peldikPegawai">
                                                                        <div class="form-group">
                                                                            <label for="Name">Upload<span class="text-danger">*</span></label>
                                                                            <div class='custom-file'>
                                                                              <input type="file" class="custom-file-input" id="peldikPegawai" name='peldikPegawai'>
                                                                              <label class="custom-file-label" id='peldikName' for="customFile">Choose file...</label>
                                                                          </div>
                                                                          <span class="help-block text-danger"></span>
                                                                          <span class="help-block text-danger"></span>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="card-footer border-primary pb-2">
                                                            <button type="button" id="btnSavepeldik" name='btnSavepeldik' onclick="simpan_data_upload_peldik('add_upload_peldik')" class="btn btn-primary"><i class="fe-save"></i>Simpan</button>
                                                            <button type="button" style='display:none;' id="btnUpdatepeldik" name='btnUpdatepeldik' onclick="simpan_data_upload_peldik()" class="btn btn-primary"><i class="fe-save"></i>Update</button>
                                                            <button type="button" name="btnCancelpeldik" id="btnCancelpeldik" class="btn btn-danger" onclick="cancel_input_peldik()">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card card-border">
                                                        <div class="card-header text-right border-primary pb-0">
                                                            <button type="button"data-toggle="collapse"onclick="add_peldik()"class="btn btn-sm btn-primary"><i class="fe-plus"> </i> Tambah</button>
                                                        </div>
                                                        <div class="card-body table-responsive">
                                                            <table class="table table-striped table-bordered dt-responsive nowrap" id="upload_peldik_list_table_json">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="2%">No</th>
                                                                        <th>Action</th>
                                                                        <th>Nama Peldik</th>
                                                                        <th>Penyelenggara</th>
                                                                        <th>Tanggal Mulai</th>
                                                                        <th>Tanggal Selesai</th>
                                                                        <th>Waktu</th>
                                                                        <th>Upload Berkas</th>              
                                                                    </tr>                   
                                                                </thead>
                                                                <tbody> 

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bootstrap modal  modal_form_upload_peldik--> 
                    <!-- Bootstrap modal  modal_form_upload_berkas-->
                    <div class="modal fade bs-example-modal-xl" id="modal_form_upload_berkas" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header badge-primary">
                                    <h4 class="modal-title mt-0"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body form">
                                    <form action="#" id="form_upload_berkas" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <!-- DATA PEGAWAI -->
                                                <div class="col-md-6 id_pegawai" style="display:none;">
                                                    <div class="form-group">
                                                        <label  for="Name">ID Pegawai<span class="text-danger">*</span></label>
                                                        <input type="text" name="id_pegawai" parsley-trigger="change" required
                                                        placeholder="Masukkan ID Pegawai" class="form-control" id="id_pegawai" readonly>
                                                        <span class="help-block text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 nik">
                                                    <div class="form-group">
                                                     <label for="Name">NIK Pegawai<span class="text-danger">*</span></label>
                                                     <input type="text" name="nik" parsley-trigger="change" required
                                                     placeholder="Masukkan NIK Pegawai" class="form-control number-only" id="nik">
                                                     <span class="help-block text-danger"></span> 
                                                     <span id="errmsg" class="text-danger">  </span>
                                                 </div>
                                             </div>
                                             <div class="col-md-6 nama">
                                                <div class="form-group">
                                                    <label for="Name">Nama Pegawai<span class="text-danger">*</span></label>
                                                    <input type="text" name="nama" parsley-trigger="change" required
                                                    placeholder="Masukkan Nama Pegawai" class="form-control" id="nama">
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                                    <!-- <div class="col-md-6 nama">
                                                        <div class="form-group">
                                                            <label for="Name">Nomor Kartu Keluarga<span class="text-danger">*</span></label>
                                                            <input type="text" name="no_kk" parsley-trigger="change" required
                                                                    placeholder="" class="form-control" id="no_kk">
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div> -->
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div id="AddBerkas" class="card collapse">
                                                            <div class="card-header bg-info">
                                                                <h4 class="card-title text-white mb-0">Tambah Berkas Pegawai</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type='hidden' name='id_berkas_pegawai' id='id_berkas_pegawai'>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="userName">Nama Berkas<span class="text-danger">*</span></label>
                                                                            <select name="namaBerkas" id='namaBerkas' class="form-control select2" required>
                                                                                <!-- <option disabled="disabled"  value="" selected>Pilih</option> -->
                                                                                <option value="-">Pilih</option>
                                                                            </select>
                                                                            <span class="help-block text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 BerkasPegawai">
                                                                        <div class="form-group">
                                                                            <label for="Name">Upload<span class="text-danger">*</span></label>
                                                                            <div class='custom-file'>
                                                                              <input type="file" class="custom-file-input" id="berkasPegawai" name='berkasPegawai'>
                                                                              <label class="custom-file-label" id='berkasName' for="customFile">Choose file...</label>
                                                                          </div>
                                                                          <span class="help-block text-danger"></span>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="card-footer border-primary pb-2">
                                                            <button type="button" id="btnSaveBerkas" name='btnSaveBerkas' onclick="simpan_data_upload_berkas('add_upload_berkas')" class="btn btn-primary"><i class="fe-save"></i>Simpan</button>
                                                            <button type="button" style='display:none;' id="btnUpdateBerkas" name='btnUpdateBerkas' onclick="simpan_data_upload_berkas()" class="btn btn-primary"><i class="fe-save"></i>Update</button>
                                                            <button type="button" class="btn btn-danger" id="btnCancelBerkas" name='btnCancelBerkas' onclick="cancel_input_berkas()">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card card-border">
                                                        <div class="card-header text-right border-primary pb-0">
                                                            <button type="button"data-toggle="collapse"onclick="add_berkas()"class="btn btn-sm btn-primary"><i class="fe-plus"> </i> Tambah</button>
                                                        </div>
                                                        <div class="card-body table-responsive">
                                                            <table class="table table-striped table-bordered dt-responsive nowrap" id="upload_berkas_list_table_json">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="2%">No</th>
                                                                        <th>Action</th>
                                                                        <th>Nama Berkas</th>
                                                                        <th>Upload Berkas</th>              
                                                                    </tr>                   
                                                                </thead>
                                                                <tbody> 

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bootstrap modal  modal_form_upload_berkas-->       

                    <!-- Bootstrap modal  modal_form_jjp_pegawai-->
                    <div class="modal fade bs-example-modal-xl" id="modal_form_jjp_pegawai" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header badge-primary">
                                    <h4 class="modal-title mt-0"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body form">
                                    <form action="#" id="form_jjp_pegawai" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <!-- DATA PEGAWAI -->
                                                <div class="col-md-6 id_pegawai">
                                                    <div class="form-group">
                                                        <label for="Name">ID Pegawai<span class="text-danger">*</span></label>
                                                        <input type="text" name="id_pegawai" parsley-trigger="change" required
                                                        placeholder="Masukkan ID Pegawai" class="form-control" id="id_pegawai" readonly>
                                                        <span class="help-block text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 nik">
                                                    <div class="form-group">
                                                     <label for="Name">NIK Pegawai<span class="text-danger">*</span></label>
                                                     <input type="text" name="nik" parsley-trigger="change" required
                                                     placeholder="Masukkan NIK Pegawai" class="form-control number-only" id="nik">
                                                     <span class="help-block text-danger"></span> 
                                                     <span id="errmsg" class="text-danger">  </span>
                                                 </div>
                                             </div>
                                             <div class="col-md-6 nama">
                                                <div class="form-group">
                                                    <label for="Name">Nama Pegawai<span class="text-danger">*</span></label>
                                                    <input type="text" name="nama" parsley-trigger="change" required
                                                    placeholder="Masukkan Nama Pegawai" class="form-control" id="nama">
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                                        <!-- <div class="col-md-6 no_kk">
                                                            <div class="form-group">
                                                                <label for="Name">Nomor Kartu Keluarga<span class="text-danger">*</span></label>
                                                                <input type="text" name="no_kk" parsley-trigger="change" required
                                                                        placeholder="Masukkan Nama Pegawai" class="form-control" id="no_kk">
                                                                <span class="help-block text-danger"></span>
                                                            </div>
                                                        </div> -->
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div id="AddJJP" class="card collapse">
                                                                <div class="card-header bg-info">
                                                                    <h4 class="card-title text-white mb-0">Tambah Jenjang Pendidikan</h4>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userName">Jenjang<span class="text-danger">*</span></label>
                                                                                <select name="jenjang_pendidikan"  class="form-control select2" required>
                                                                                    <!-- <option disabled="disabled"  value="" selected>Pilih</option> -->
                                                                                    <option value="">Pilih</option>
                                                                                    <option value="SD" selected>SD</option>
                                                                                    <option value="SMP" selected>SMP</option>
                                                                                    <option value="SMA" selected>SMA</option>
                                                                                    <option value="D1" selected>D1</option>
                                                                                    <option value="D2" selected>D2</option>
                                                                                    <option value="D3" selected>D3</option>
                                                                                    <option value="D4" selected>D4</option>
                                                                                    <option value="S1" selected>S1</option>
                                                                                    <option value="S2" selected>S2</option>
                                                                                    <option value="S3" selected>S3</option>
                                                                                </select>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 id_pegawai_jjg_pddk">
                                                                            <div class="form-group">
                                                                                <label for="Name">Nama Sekolah<span class="text-danger">*</span></label>
                                                                                <input type="text" name="id_pegawai_jjg_pddk" parsley-trigger="change" required placeholder="Masukkan Nama Sekolah" class="form-control" id="id_pegawai_jjg_pddk">
                                                                                <span class="help-block text-danger"></span>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 nm_jenjang_pendidikan">
                                                                            <div class="form-group">
                                                                                <label for="Name">Nama Sekolah<span class="text-danger">*</span></label>
                                                                                <input type="text" name="nm_jenjang_pendidikan" parsley-trigger="change" required placeholder="Masukkan Nama Sekolah" class="form-control" id="nm_jenjang_pendidikan">
                                                                                <span class="help-block text-danger"></span>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 jurusan">
                                                                            <div class="form-group">
                                                                                <label for="Name">Jurusan<span class="text-danger">*</span></label>
                                                                                <input type="text" name="jurusan" parsley-trigger="change" required placeholder="Masukkan Jurusan" class="form-control" id="jurusan">
                                                                                <small class="text-muted"> Isi dengan - Jika tidak ada </small>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 tahun_lulus">
                                                                            <div class="form-group">
                                                                                <label for="Name">Tahun Lulus<span class="text-danger">*</span></label>
                                                                                <input type="number" min="1900" name="tahun_lulus" parsley-trigger="change" required placeholder="Masukkan Tahun Lulus" class="form-control number-only" id="tahun_lulus">
                                                                                <span id="err_tahun_lulus" class="text-danger">  </span>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 jurusan">
                                                                            <div class="form-group">
                                                                                <label for="Name">Nomor Ijazah<span class="text-danger">*</span></label>
                                                                                <input type="text" name="no_ijazah" parsley-trigger="change" required placeholder="Masukkan Nomor Ijazah" class="form-control" id="no_ijazah">
                                                                                <span class="help-block text-danger"></span>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer border-primary pb-2">
                                                                    <!-- <?= $button ?> -->
                                                                    <button type="button" id="btnSaveJJP" name='btnSaveJJP' onclick="simpan_data_jjp_pegawai()" class="btn btn-primary"><i class="fe-save"></i>Simpan</button>
                                                                    <button type="button" style='display:none;' id="btnUpdateJJP" name='btnUpdateJJP' onclick="simpan_data_jjp_pegawai()" class="btn btn-primary"><i class="fe-save"></i>Update</button>
                                                                    <button type="button" class="btn btn-danger" id="btnCancelJJP" name='btnCancelJJP' onclick="cancel_data_jjp_pegawai()">Cancel</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="card card-border">
                                                                <div class="card-header text-right border-primary pb-0">
                                                                    <button type="button"data-toggle="collapse"onclick="add_jjp()"class="btn btn-sm btn-primary"><i class="fe-plus"> </i>Tambah</button>
                                                                </div>
                                                                <div class="card-body table-responsive">
                                                                    <table class="table table-striped table-bordered dt-responsive nowrap" id="list_table_json">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="2%">No</th>
                                                                                <th>Action</th>
                                                                                <th>Jenjang</th>
                                                                                <th>Nama Sekolah</th>
                                                                                <th>Jurusan</th>
                                                                                <th>Tahun Lulus</th>              
                                                                                <th>No Ijazah</th>              
                                                                            </tr>                   
                                                                        </thead>
                                                                        <tbody> 

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Bootstrap modal  modal_form_jjp_pegawai-->

                            <!-- Bootstrap modal  modal_form_data_tanggungan-->
                            <div class="modal fade bs-example-modal-xl" id="modal_form_data_tanggungan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header badge-primary">
                                            <h4 class="modal-title mt-0"></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body form">
                                            <form action="#" id="form_data_tanggungan" class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <!-- DATA PEGAWAI -->
                                                        <div class="col-md-6 id_pegawai">
                                                            <div class="form-group">
                                                                <label for="Name">ID Pegawai<span class="text-danger">*</span></label>
                                                                <input type="text" name="id_pegawai" parsley-trigger="change" required
                                                                placeholder="Masukkan ID Pegawai" class="form-control" id="id_pegawai" readonly>
                                                                <span class="help-block text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 nik">
                                                            <div class="form-group">
                                                             <label for="Name">NIK Pegawai<span class="text-danger">*</span></label>
                                                             <input type="text" name="nik" parsley-trigger="change" required
                                                             placeholder="Masukkan NIK Pegawai" class="form-control number-only" id="nik">
                                                             <span class="help-block text-danger"></span> 
                                                             <span id="errmsg" class="text-danger">  </span>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 nama">
                                                        <div class="form-group">
                                                            <label for="Name">Nama Pegawai<span class="text-danger">*</span></label>
                                                            <input type="text" name="nama" parsley-trigger="change" required
                                                            placeholder="Masukkan Nama Pegawai" class="form-control" id="nama">
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 no_kk">
                                                        <div class="form-group">
                                                            <label for="Name">kartu Keluarga<span class="text-danger">*</span></label>
                                                            <input type="text" name="no_kk" parsley-trigger="change" required
                                                            placeholder="" class="form-control" id="no_kk">
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>
                                                        <!-- <div class="col-md-6 no_kk">
                                                            <div class="form-group">
                                                                <label for="Name">kartu Keluarga<span class="text-danger">*</span></label>
                                                                <input type="text" name="no_kk" parsley-trigger="change" required placeholder="Masukkan Nomor Kartu Keluarga" class="form-control" id="no_kk">
                                                                <span class="help-block text-danger"></span>
                                                                <span class="help-block text-danger"></span>
                                                            </div>
                                                        </div> -->
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div id="AddTanggungan" class="card collapse">
                                                                <div class="card-header bg-info">
                                                                    <h4 class="card-title text-white mb-0">Tambah Tanggungan</h4>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6 nama_tanggungan">
                                                                            <div class="form-group">
                                                                                <label for="Name">Nama<span class="text-danger">*</span></label>
                                                                                <input type="text" name="nama_tanggungan" parsley-trigger="change" required placeholder="Masukkan Nama Tanggungan" class="form-control" id="nama_tanggungan">
                                                                                <input type="hidden" name="id_tanggungan" id="id_tanggungan" value="">
                                                                                <span class="help-block text-danger"></span>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userName">Hubungan<span class="text-danger">*</span></label>
                                                                                <select name="hubungan"  class="form-control select2" required>
                                                                                    <!-- <option disabled="disabled"  value="" selected>Pilih</option> -->
                                                                                    <option value="">Pilih</option>
                                                                                    <option value="Suami">Suami</option>
                                                                                    <option value="Istri">Istri</option>
                                                                                    <option value="Anak">Anak</option>
                                                                                </select>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 no_ktp">
                                                                            <div class="form-group">
                                                                                <label for="Name">No KTP<span class="text-danger">*</span></label>
                                                                                <input type="text" name="no_ktp" parsley-trigger="change" required placeholder="Masukkan Nomor KTP" class="form-control" id="no_ktp">
                                                                                <span class="help-block text-danger"></span>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div>

                                                                        <!-- <div class="col-md-6 no_kk">
                                                                            <div class="form-group">
                                                                                <label for="Name">kartu Keluarga<span class="text-danger">*</span></label>
                                                                                <input type="text" name="no_kk" parsley-trigger="change" required placeholder="Masukkan Nomor Kartu Keluarga" class="form-control" id="no_kk">
                                                                                <span class="help-block text-danger"></span>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div> -->

                                                                        <div class="col-md-6 tempat_lahir">
                                                                            <div class="form-group">
                                                                                <label for="Name">Tempat Lahir<span class="text-danger">*</span></label>
                                                                                <input type="text" name="tempat_lahir" parsley-trigger="change" required placeholder="Masukkan Tempat Lahir" class="form-control" id="tempat_lahir">
                                                                                <!-- <small class="text-muted"> Isi dengan - Jika tidak ada </small> -->
                                                                                <span class="help-block text-danger"></span>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="Name">Tanggal Lahir<span class="text-danger">* </span></label>
                                                                                <input type="text" name="tgl_lahir" parsley-trigger="change" required
                                                                                placeholder="Masukkan Tanggal Lahir" class="form-control datepicker  number-only">
                                                                                <span id="err_tgl_lahir" class="text-danger">  </span>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div>

                                                                        <!-- ----------------------------------------------------------------------------- Tanggungan-->

                                                                        <!-- <div class="col-md-6 agama">
                                                                            <div class="form-group">
                                                                                <label for="Name">Agama<span class="text-danger">*</span></label>
                                                                                <input type="text" name="agama" parsley-trigger="change" required placeholder="Masukkan Agama" class="form-control" id="agama">
                                                                                <span class="help-block text-danger"></span>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div> -->
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userName">Agama<span class="text-danger">*</span></label>
                                                                                <select name="agama_tanggungan"  class="form-control select2" required>
                                                                                    <option value="">Pilih</option>
                                                                                    <option value="Islam">Islam</option>
                                                                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                                                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                                                                    <option value="Hindu">Hindu</option>
                                                                                    <option value="Budha">Budha</option>
                                                                                    <option value="Konghucu">Konghucu</option>
                                                                                </select>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div>
                                                                        <!-- <option disabled="disabled"  value="" selected>Pilih</option> tidak di pakai-->

                                                                        <!-- ------------------------------------------------------------   tanggungan             -->

                                                                        <!-- <div class="col-md-6 pendidikan">
                                                                            <div class="form-group">
                                                                                <label for="Name">Pendidikan<span class="text-danger">*</span></label>
                                                                                <input type="text" name="pendidikan" parsley-trigger="change" required placeholder="Masukkan Pendidikan" class="form-control" id="pendidikan">
                                                                                <span class="help-block text-danger"></span>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div> -->
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userName">Jenjang Pendidikan<span class="text-danger">*</span></label>
                                                                                <select name="pendidikan"  class="form-control select2" required>
                                                                                    <!-- <option disabled="disabled"  value="" selected>Pilih</option> -->
                                                                                    <option value="">Pilih</option>
                                                                                    <option value="SD" >SD</option>
                                                                                    <option value="SMP" >SMP</option>
                                                                                    <option value="SMA" >SMA</option>
                                                                                    <option value="D1" >D1</option>
                                                                                    <option value="D2" >D2</option>
                                                                                    <option value="D3" >D3</option>
                                                                                    <option value="D4" >D4</option>
                                                                                    <option value="S1" >S1</option>
                                                                                    <option value="S2" >S2</option>
                                                                                    <option value="S3" >S3</option>
                                                                                </select>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 pekerjaan">
                                                                            <div class="form-group">
                                                                                <label for="Name">Pekerjaan<span class="text-danger">*</span></label>
                                                                                <input type="text" name="pekerjaan" parsley-trigger="change" required placeholder="Masukkan Pekerjaan" class="form-control" id="pekerjaan">
                                                                                <span class="help-block text-danger"></span>
                                                                                <span class="help-block text-danger"></span>
                                                                                <small class="text-muted"> Isi dengan - Jika tidak ada </small>
                                                                            </div>
                                                                        </div>


                                                                        <!-- <div class="col-md-6 golongan_darah">
                                                                            <div class="form-group">
                                                                                <label for="Name">Golongan Darah<span class="text-danger">*</span></label>
                                                                                <input type="text" name="golongan_darah" parsley-trigger="change" required placeholder="Masukkan Golongan Darah" class="form-control" id="golongan_darah">
                                                                                <span class="help-block text-danger"></span>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div> -->
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="golongan_darah" class="control-label">Golongan Darah<span class="text-danger">* </span></label>
                                                                                <select name="golongan_darah" class="form-control select2" required>
                                                                                    <option value="">Pilih</option>
                                                                                    <option value="A">A</option>
                                                                                    <option value="B">B</option>
                                                                                    <option value="AB">AB</option>
                                                                                    <option value="O">O</option>
                                                                                    <option value="A+">A+</option>
                                                                                    <option value="A-">A-</option>
                                                                                    <option value="B+">B+</option>
                                                                                    <option value="B-">B-</option>
                                                                                    <option value="AB-">AB-</option>
                                                                                    <option value="AB+">AB+</option>
                                                                                    <option value="O+">O+</option>
                                                                                    <option value="O-">O-</option>
                                                                                </select>
                                                                                <span class="help-block text-danger"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer border-primary pb-2">
                                                                    <!-- <?= $button ?> -->
                                                                    <button type="button" id="btnSaveTanggungan" name='btnSaveTanggungan' onclick="simpan_data_tanggungan_pegawai()" class="btn btn-primary"><i class="fe-save"></i>Simpan</button>
                                                                    <button type="button" style='display:none;' id="btnUpdateTanggungan" name='btnUpdateTanggungan' onclick="simpan_data_tanggungan_pegawai()" class="btn btn-primary"><i class="fe-save"></i>Update</button>
                                                                    <button type="button" class="btn btn-danger" onclick="cancel_input_tanggungan()">Cancel</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="card card-border">
                                                                <div class="card-header text-right border-primary pb-0">
                                                                    <button type="button"data-toggle="collapse"onclick="add_tanggungan()"class="btn btn-sm btn-primary"><i class="fe-plus"> </i>Tambah</button>
                                                                </div>
                                                                <div class="card-body table-responsive">
                                                                    <table class="table table-striped table-bordered dt-responsive nowrap" id="tanggungan_list_table_json">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="2%">No</th>
                                                                                <th>Action</th>
                                                                                <th>Nama</th>
                                                                                <th>Hubungan</th>
                                                                                <th>Nomor KTP</th>
                                                                                <th>Tempat Lahir</th>
                                                                                <th>Tanggal Lahir</th>
                                                                                <th>Agama</th>
                                                                                <th>Pendidikan</th>
                                                                                <th>Pekerjaan</th>
                                                                                <th>Golongan Darah</th>
                                                                            </tr>                   
                                                                        </thead>
                                                                        <tbody> 

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Bootstrap modal  modal_form_tanggungan_pegawai-->

                            <!-- Bootstrap modal  modal_form_penempatan-->
                            <div class="modal fade bs-example-modal-xl" id="modal_form_keluarga_pegawai" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header badge-primary">
                                            <h4 class="modal-title mt-0"></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body form">
                                            <form action="#" id="form_keluarga_pegawai" class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <!-- DATA PEGAWAI -->
                                                        <div class="col-md-4 id_pegawai">
                                                            <div class="form-group">
                                                                <label for="Name">ID Pegawai<span class="text-danger">*</span></label>
                                                                <input type="text" name="id_pegawai" parsley-trigger="change" required
                                                                placeholder="Masukkan ID Pegawai" class="form-control" id="id_pegawai" readonly>
                                                                <span class="help-block text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 nik">
                                                            <div class="form-group">
                                                             <label for="Name">NIK<span class="text-danger">*</span></label>
                                                             <input type="text" name="nik" parsley-trigger="change" required
                                                             placeholder="Masukkan NIK" class="form-control number-only" id="nik">
                                                             <span class="help-block text-danger"></span> 
                                                             <span id="errmsg" class="text-danger">  </span>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-4 nik_lama">
                                                        <div class="form-group">
                                                         <label for="Name">NIK Lama<span class="text-danger">*</span></label>
                                                         <input type="text" name="nik_lama" parsley-trigger="change" required
                                                         placeholder="Masukkan NIK Lama" class="form-control number-only" id="nik_lama">
                                                         <span class="help-block text-danger"></span> 
                                                         <span id="errmsg" class="text-danger">  </span>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 nama">
                                                    <div class="form-group">
                                                        <label for="Name">Nama Pegawai<span class="text-danger">*</span></label>
                                                        <input type="text" name="nama" parsley-trigger="change" required
                                                        placeholder="Masukkan Nama Pegawai" class="form-control" id="nama">
                                                        <span class="help-block text-danger"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 nama_ibu">
                                                    <div class="form-group">
                                                        <label for="Name">Nama Ibu<span class="text-danger">*</span></label>
                                                        <input type="text" name="nama_ibu" parsley-trigger="change" required
                                                        placeholder="Masukkan Nama Ibu" class="form-control" id="nama_ibu">
                                                        <span class="help-block text-danger"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 nama_ayah">
                                                    <div class="form-group">
                                                        <label for="Name">Nama Ayah<span class="text-danger">*</span></label>
                                                        <input type="text" name="nama_ayah" parsley-trigger="change" required
                                                        placeholder="Masukkan Nama Ayah" class="form-control" id="nama_ayah">
                                                        <span class="help-block text-danger"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 pekerjaan_ibu">
                                                    <div class="form-group">
                                                        <label for="Name">Pekerjaan Ibu<span class="text-danger">*</span></label>
                                                        <input type="text" name="pekerjaan_ibu" parsley-trigger="change" required
                                                        placeholder="Masukkan Pekerjaan Ibu" class="form-control" id="pekerjaan_ibu">
                                                        <span class="help-block text-danger"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 pekerjaan_ayah">
                                                    <div class="form-group">
                                                        <label for="Name">Pekerjaan Ayah<span class="text-danger">*</span></label>
                                                        <input type="text" name="pekerjaan_ayah" parsley-trigger="change" required
                                                        placeholder="Masukkan Pekerjaan Ayah" class="form-control" id="pekerjaan_ayah">
                                                        <span class="help-block text-danger"></span>
                                                    </div>
                                                </div>

                                                    <!-- <div class="col-md-6 pasangan">
                                                        <div class="form-group">
                                                            <label for="Name">Suami / Istri<span class="text-danger">*</span></label>
                                                            <input type="text" name="pasangan" parsley-trigger="change" required
                                                                    placeholder="Masukkan Suami / Istri" class="form-control" id="pasangan">
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 anak_pertama">
                                                        <div class="form-group">
                                                            <label for="Name">Nama Anak Pertama<span class="text-danger">*</span></label>
                                                            <input type="text" name="anak_pertama" parsley-trigger="change" required
                                                                    placeholder="Masukkan Nama Anak Pertama" class="form-control" id="anak_pertama">
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 anak_kedua">
                                                        <div class="form-group">
                                                            <label for="Name">Nama Anak Kedua<span class="text-danger">*</span></label>
                                                            <input type="text" name="anak_kedua" parsley-trigger="change" required
                                                                    placeholder="Masukkan Nama Anak Kedua" class="form-control" id="anak_kedua">
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 anak_ketiga">
                                                        <div class="form-group">
                                                            <label for="Name">Nama Anak Ketiga<span class="text-danger">*</span></label>
                                                            <input type="text" name="anak_ketiga" parsley-trigger="change" required
                                                                    placeholder="Masukkan Nama Anak Ketiga" class="form-control" id="anak_ketiga">
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="btnSaveKeluarga" onclick="simpan_data_keluarga_pegawai()" class="btn btn-primary"><i class="fe-save"> </i> Save</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Bootstrap modal modal_form_penempatan -->    

                        <!-- Bootstrap modal Form Nonaktif-->
                        <div class="modal fade bs-example-modal-xl" id="modal_form_nonaktif" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header badge-danger">
                                        <h4 class="modal-title mt-0"></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body form">
                                        <form action="#" id="form_nonaktif" class="form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6 id_pegawai">
                                                        <div class="form-group">
                                                            <label for="Name">ID Pegawai<span class="text-danger">*</span></label>
                                                            <input type="text" name="id_pegawai" parsley-trigger="change" required
                                                            placeholder="Masukkan ID Pegawai" class="form-control" id="id_pegawai" readonly>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 nik">
                                                        <div class="form-group">
                                                         <label for="Name">NIK<span class="text-danger">*</span></label>
                                                         <input type="text" name="nik" parsley-trigger="change" required
                                                         placeholder="Masukkan NIK" class="form-control number-only" id="nik">
                                                         <span class="help-block text-danger"></span> 
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6 nik_lama">
                                                    <div class="form-group">
                                                     <label for="Name">NIK Lama<span class="text-danger">*</span></label>
                                                     <input type="text" name="nik_lama" parsley-trigger="change" required
                                                     placeholder="Masukkan NIK Lama" class="form-control number-only" id="nik_lama">

                                                     <span class="help-block text-danger"></span>
                                                 </div>
                                             </div>
                                             <div class="col-md-6 nama">
                                                <div class="form-group">
                                                    <label for="Name">Nama Pegawai<span class="text-danger">*</span></label>
                                                    <input type="text" name="nama" parsley-trigger="change" required
                                                    placeholder="Masukkan Nama Pegawai" class="form-control" id="nama">

                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="alasan_keluar" class="control-label">Alasan Keluar</label>

                                                    <select name="alasan_keluar" class="form-control select2" required>
                                                        <option value="">Pilih</option>
                                                        <option value="Mengundurkan Diri">Mengundurkan Diri</option>
                                                        <option value="Pensiun Normal">Pensiun Normal</option>
                                                        <option value="Pensiun Dini">Pensiun Dini</option>
                                                        <option value="Sakit Berkepanjangan">Sakit Berkepanjangan</option>
                                                        <option value="Pelanggaran Berat">Pelanggaran Berat</option>
                                                        <option value="Habis Kontrak">Habis Kontrak</option>
                                                    </select>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Name">Tanggal Pengajuan<span class="text-danger">* </span></label>
                                                    <input type="text" name="tgl_pengajuan" parsley-trigger="change" required
                                                    placeholder="Masukkan Tanggal Pengajuan" class="form-control datepicker  number-only">
                                                    <span id="err_tgl_pengajuan" class="text-danger">  </span>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Name">Tanggal Keluar<span class="text-danger">* </span></label>
                                                    <input type="text" name="tgl_keluar" parsley-trigger="change" required
                                                    placeholder="Masukkan Tanggal Keluar" class="form-control datepicker  number-only">
                                                    <span id="err_tgl_keluar" class="text-danger">  </span>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="ket_keluar" class="control-label">Keterangan Keluar</label>
                                                    <textarea required class="form-control" rows="3" name="ket_keluar" id="ket_keluar" placeholder="Keterangan Keluar"></textarea>

                                                    <span class="help-block text-danger"></span>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" id="btnSave" onclick="nonaktif_proses()" class="btn btn-primary"><i class="fe-save"> </i> Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Bootstrap modal Form Nonaktif -->   

                <!-- Bootstrap modal  modal_form_penempatan-->
                <div class="modal fade bs-example-modal-xl" id="modal_form_penempatan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header badge-primary">
                                <h4 class="modal-title mt-0"></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body form">
                                <form action="#" id="form_penempatan" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <!-- DATA PEGAWAI -->
                                            <div class="col-md-4 id_pegawai">
                                                <div class="form-group">
                                                    <label for="Name">ID Pegawai<span class="text-danger">*</span></label>
                                                    <input type="text" name="id_pegawai" parsley-trigger="change" required
                                                    placeholder="Masukkan ID Pegawai" class="form-control" id="id_pegawai" readonly>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 nik">
                                                <div class="form-group">
                                                 <label for="Name">NIK<span class="text-danger">*</span></label>
                                                 <input type="text" name="nik" parsley-trigger="change" required
                                                 placeholder="Masukkan NIK" class="form-control number-only" id="nik">
                                                 <span class="help-block text-danger"></span> 
                                                 <span id="errmsg" class="text-danger">  </span>
                                             </div>
                                         </div>
                                         <div class="col-md-4 nik_lama">
                                            <div class="form-group">
                                             <label for="Name">NIK Lama<span class="text-danger">*</span></label>
                                             <input type="text" name="nik_lama" parsley-trigger="change" required
                                             placeholder="Masukkan NIK Lama" class="form-control number-only" id="nik_lama">
                                             <span class="help-block text-danger"></span> 
                                             <span id="errmsg" class="text-danger">  </span>
                                         </div>
                                     </div>
                                     <div class="col-md-4 nama">
                                        <div class="form-group">
                                            <label for="Name">Nama Pegawai<span class="text-danger">*</span></label>
                                            <input type="text" name="nama" parsley-trigger="change" required
                                            placeholder="Masukkan Nama Pegawai" class="form-control" id="nama">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <!-- KODE A -->
                                    <div class="col-md-4" id="cari_unit_level">
                                        <div class="form-group">
                                            <label for="userName">Cari Unit Level<span class="text-danger">*</span></label>
                                            <select name="cari_unit_level"  class="form-control select2 cari_unit_level" required>
                                                <!-- <option disabled="disabled"  value="" selected>Pilih</option> -->
                                                <option disabled="disabled"  value="" selected>Pilih</option>
                                            </select>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 id_unit_level">
                                        <div class="form-group">
                                            <label for="Name">ID Unit Level<span class="text-danger">*</span></label>
                                            <input type="text" name="id_unit_level" parsley-trigger="change" required
                                            placeholder="Masukkan ID Unit Level" class="form-control" id="id_unit_level" readonly>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 nm_unit_level">
                                        <div class="form-group">
                                            <label for="Name">Nama Unit Level<span class="text-danger">*</span></label>
                                            <input type="text" name="nm_unit_level" parsley-trigger="change" required
                                            placeholder="Masukkan Nama Unit Usaha" class="form-control" id="nm_unit_level" readonly>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- KODE B -->
                                    <div class="col-md-4" id="cari_unit_bisnis">
                                        <div class="form-group">
                                            <label for="userName">Cari Unit Bisnis<span class="text-danger">*</span></label>
                                            <select name="cari_unit_bisnis"  class="form-control select2 cari_unit_bisnis" required>
                                                <!-- <option disabled="disabled"  value="" selected>Pilih</option> -->
                                                <option disabled="disabled"  value="" selected>Pilih</option>
                                            </select>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 id_unit_bisnis">
                                        <div class="form-group">
                                            <label for="Name">ID Unit Bisnis<span class="text-danger">*</span></label>
                                            <input type="text" name="id_unit_bisnis" parsley-trigger="change" required
                                            placeholder="Masukkan ID Unit Bisnis" class="form-control" id="id_unit_bisnis" readonly>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 nm_unit_bisnis">
                                        <div class="form-group">
                                            <label for="Name">Nama Unit Bisnis<span class="text-danger">*</span></label>
                                            <input type="text" name="nm_unit_bisnis" parsley-trigger="change" required
                                            placeholder="Masukkan Nama Unit Bisnis" class="form-control" id="nm_unit_bisnis" readonly>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- LOKASI -->
                                    <div class="col-md-4" id="cari_unit_lokasi">
                                        <div class="form-group">
                                            <label for="userName">Cari Lokasi Unit Bisnis<span class="text-danger">*</span></label>
                                            <select name="cari_unit_lokasi"  class="form-control select2 cari_unit_lokasi" required>
                                                <!-- <option disabled="disabled"  value="" selected>Pilih</option> -->
                                                <option disabled="disabled"  value="" selected>Pilih</option>
                                            </select>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 id_unit_lokasi">
                                        <div class="form-group">
                                            <label for="Name">ID Lokasi Unit Bisnis<span class="text-danger">*</span></label>
                                            <input type="text" name="id_unit_lokasi" parsley-trigger="change" required
                                            placeholder="Masukkan ID Lokasi Unit Bisnis" class="form-control" id="id_unit_lokasi" readonly>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 nm_unit_lokasi">
                                        <div class="form-group">
                                            <label for="Name">Nama Lokasi Unit Bisnis<span class="text-danger">*</span></label>
                                            <input type="text" name="nm_unit_lokasi" parsley-trigger="change" required
                                            placeholder="Masukkan Nama Lokasi Unit Bisnis" class="form-control" id="nm_unit_lokasi" readonly>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- KODE C -->
                                    <div class="col-md-4" id="cari_unit_usaha">
                                        <div class="form-group">
                                            <label for="userName">Cari Unit Usaha<span class="text-danger">*</span></label>
                                            <select name="cari_unit_usaha"  class="form-control select2 cari_unit_usaha" required>
                                                <!-- <option disabled="disabled"  value="" selected>Pilih</option> -->
                                                <option disabled="disabled"  value="" selected>Pilih</option>
                                            </select>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 id_unit_usaha">
                                        <div class="form-group">
                                            <label for="Name">ID Unit Usaha<span class="text-danger">*</span></label>
                                            <input type="text" name="id_unit_usaha" parsley-trigger="change" required
                                            placeholder="Masukkan ID Unit Usaha" class="form-control" id="id_unit_usaha" readonly>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 nm_unit_usaha">
                                        <div class="form-group">
                                            <label for="Name">Nama Unit Usaha<span class="text-danger">*</span></label>
                                            <input type="text" name="nm_unit_usaha" parsley-trigger="change" required
                                            placeholder="Masukkan Nama Unit Usaha" class="form-control" id="nm_unit_usaha" readonly>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- KODE D -->
                                    <div class="col-md-4" id="cari_unit_organisasi">
                                        <div class="form-group">
                                            <label for="userName">Cari Unit Organisasi<span class="text-danger">*</span></label>
                                            <select name="cari_unit_organisasi"  class="form-control select2 cari_unit_organisasi" required>
                                                <!-- <option disabled="disabled"  value="" selected>Pilih</option> -->
                                                <option disabled="disabled"  value="" selected>Pilih</option>
                                            </select>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 id_unit_organisasi">
                                        <div class="form-group">
                                            <label for="Name">ID Unit Organisasi<span class="text-danger">*</span></label>
                                            <input type="text" name="id_unit_organisasi" parsley-trigger="change" required
                                            placeholder="Masukkan ID Unit Organisasi" class="form-control" id="id_unit_organisasi" readonly>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 nm_unit_organisasi">
                                        <div class="form-group">
                                            <label for="Name">Nama Unit Organisasi<span class="text-danger">*</span></label>
                                            <input type="text" name="nm_unit_organisasi" parsley-trigger="change" required
                                            placeholder="Masukkan Nama Unit Organisasi" class="form-control" id="nm_unit_organisasi" readonly>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- KODE E -->
                                    <div class="col-md-4" id="cari_unit_kerja">
                                        <div class="form-group">
                                            <label for="userName">Cari Unit Kerja<span class="text-danger">*</span></label>
                                            <select name="cari_unit_kerja"  class="form-control select2 cari_unit_kerja" required>
                                                <!-- <option disabled="disabled"  value="" selected>Pilih</option> -->
                                                <option disabled="disabled"  value="" selected>Pilih</option>
                                            </select>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 id_unit_kerja">
                                        <div class="form-group">
                                            <label for="Name">ID Unit Kerja<span class="text-danger">*</span></label>
                                            <input type="text" name="id_unit_kerja" parsley-trigger="change" required
                                            placeholder="Masukkan ID Unit Kerja" class="form-control" id="id_unit_kerja" readonly>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 nm_unit_usaha">
                                        <div class="form-group">
                                            <label for="Name">Nama Unit Kerja<span class="text-danger">*</span></label>
                                            <input type="text" name="nm_unit_kerja" parsley-trigger="change" required
                                            placeholder="Masukkan Nama Unit Kerja" class="form-control" id="nm_unit_kerja" readonly>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- KODE F -->
                                    <div class="col-md-4" id="cari_unit_kerja_sub">
                                        <div class="form-group">
                                            <label for="userName">Cari Unit Sub Kerja<span class="text-danger">*</span></label>
                                            <select name="cari_unit_kerja_sub"  class="form-control select2 cari_unit_kerja_sub" required>
                                                <!-- <option disabled="disabled"  value="" selected>Pilih</option> -->
                                                <option disabled="disabled"  value="" selected>Pilih</option>
                                            </select>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 id_unit_kerja_sub">
                                        <div class="form-group">
                                            <label for="Name">ID Unit Sub Kerja<span class="text-danger">*</span></label>
                                            <input type="text" name="id_unit_kerja_sub" parsley-trigger="change" required
                                            placeholder="Masukkan ID Unit Sub Kerja" class="form-control" id="id_unit_kerja_sub" readonly>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 nm_unit_usaha">
                                        <div class="form-group">
                                            <label for="Name">Nama Unit Sub Kerja<span class="text-danger">*</span></label>
                                            <input type="text" name="nm_unit_kerja_sub" parsley-trigger="change" required
                                            placeholder="Masukkan Nama Unit Sub Kerja" class="form-control" id="nm_unit_kerja_sub" readonly>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnSave" onclick="simpan_data_penempatan()" class="btn btn-primary"><i class="fe-save"> </i> Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bootstrap modal modal_form_penempatan -->       

        <!-- Bootstrap modal modal_form_data_pegawai-->
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
                                        <div class="col-md-6 id_pegawai">
                                            <div class="form-group">
                                                <label for="Name">ID Pegawai<span class="text-danger">*</span></label>
                                                <input type="text" name="id_pegawai" parsley-trigger="change" required
                                                placeholder="Masukkan ID Pegawai" class="form-control" id="id_pegawai" readonly>
                                                <span class="help-block text-danger"></span>
                                            </div>
                                        </div>



                                        <div class="col-md-6 nik">
                                            <div class="form-group">
                                             <label for="Name">NIK<span class="text-danger">*</span></label>
                                             <input type="text" maxlength="8" name="nik" parsley-trigger="change" required
                                             placeholder="Masukkan NIK" class="form-control number-only" id="nik">
                                             <span class="help-block text-danger" id="nik-block"></span> 
                                             <span class="help-block text-danger" id="nik-block"></span> 
                                             <span id="err_nik" class="text-danger">  </span>
                                         </div>
                                     </div>
                                     <div class="col-md-6 nik_lama">
                                        <div class="form-group">
                                         <label for="Name">NIK Lama<span class="text-danger">*</span></label>
                                         <input type="text" maxlength="8" name="nik_lama" parsley-trigger="change" required
                                         placeholder="Masukkan NIK Lama" class="form-control number-only" id="nik_lama">
                                         <span class="help-block text-danger"></span>
                                         <span id="err_nik_lama" class="text-danger">  </span>
                                     </div>
                                 </div>
                                 <div class="col-md-6 nama">
                                    <div class="form-group">
                                        <label for="Name">Nama Pegawai<span class="text-danger">*</span></label>
                                        <input type="text" name="nama" parsley-trigger="change" required
                                        placeholder="Masukkan Nama Pegawai" class="form-control" id="nama">
                                        <span class="help-block text-danger"></span>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 nama">
                                    <div class="form-group">
                                        <label for="Name">Nama Panggilan<span class="text-danger">*</span></label>
                                        <input type="text" name="nm_pgl" parsley-trigger="change" required
                                        placeholder="Masukkan Nama Pegawai" class="form-control" id="nm_pgl">
                                        <span class="help-block text-danger"></span>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Name">Gelar</label>
                                        <input type="text" name="gelar1" parsley-trigger="change" required
                                        placeholder="Masukkan Gelar" class="form-control" id="gelar1">
                                        <span class="text-primary">*<i>Gelar Pertama Jika ada</i></span>
                                        <span class="help-block text-danger"></span>
                                        <span class="help-block text-danger"></span>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Name">Gelar Kedua</label>
                                        <input type="text" name="gelar2" parsley-trigger="change" required
                                        placeholder="Masukkan Gelar Kedua" class="form-control" id="gelar2">
                                        <span class="text-primary">*<i>Gelar Kedua Jika ada</i></span>
                                        <span class="help-block text-danger"></span>
                                        <span class="help-block text-danger"></span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_kelamin" class="control-label">Jenis Kelamin<span class="text-danger">* </span></label>

                                        <select name="jenis_kelamin" class="form-control select2" required>
                                            <option value="">Pilih</option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Name">Tempat Lahir<span class="text-danger">* </span></label>
                                        <input type="text" name="tpt_lahir" parsley-trigger="change" required
                                        placeholder="Masukkan Tempat Lahir" class="form-control" id="tpt_lahir">
                                        <span class="help-block text-danger"></span>
                                        <span class="help-block text-danger"></span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Name">Tanggal Lahir<span class="text-danger">* </span></label>
                                        <input type="text" name="tgl_lahir" parsley-trigger="change" required
                                        placeholder="Masukkan Tanggal Lahir" class="form-control datepicker  number-only">
                                        <span id="err_tgl_lahir" class="text-danger">  </span>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gol_dar" class="control-label">Golongan Darah<span class="text-danger">* </span></label>
                                        <select name="gol_dar" class="form-control select2" required>
                                            <option value="">Pilih</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB-">AB-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>

                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Name">Tinggi Badan<span class="text-danger">* </span></label>
                                        <input type="text" name="tinggi" parsley-trigger="change" required
                                        placeholder="Masukkan Tinggi Badan" class="form-control  number-only" id="tinggi">
                                        <span class="text-primary">*<i>Satuan centimeter</i></span>
                                        <span class="help-block text-danger" id="tinggi-block"></span>
                                        <span id="err_tinggi" class="text-danger">  </span>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Name">Berat Badan<span class="text-danger">* </span></label>
                                        <input type="text" name="berat" parsley-trigger="change" required
                                        placeholder="Masukkan Berat Badan" class="form-control number-only" id="berat">
                                        <span class="text-primary">*<i>Satuan kilogram</i></span>
                                        <span class="help-block text-danger" id="berat-block"></span>
                                        <span id="err_berat" class="text-danger">  </span>
                                        <span class="help-block text-danger"></span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userName" class="control-label">Agama<span class="text-danger">* </span></label>
                                        <select name="agama_data_pegawai" class="form-control select2" required>
                                            <option value="">Pilih</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen Protestan">Kristen Protestan</option>
                                            <option value="Kristen Katolik">Kristen Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userName" class="control-label">Pendidikan Terakhir<span class="text-danger">* </span></label>
                                        <select name="pend_terakhir" class="form-control select2" required>
                                            <option value="">Pilih</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP/MTS">SMP/MTS</option>
                                            <option value="SMA/SMK">SMA/SMK</option>
                                            <option value="D1">D1</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="D4">D4</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                                                    <!-- <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Name">Pendidikan Terakhir<span class="text-danger">* </span></label>
                                                            <input type="text" name="pend_terakhir" parsley-trigger="change" required
                                                                    placeholder="Masukkan Pendidikan Terakhir" class="form-control  number-only" id="pend_terakhir">
                                                            <span id="err_pend_terakhir" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Name">Nomor KTP<span class="text-danger">* </span></label>
                                                            <input maxlength="16" type="text" name="no_ktp" parsley-trigger="change" required
                                                            placeholder="Masukkan Nomor KTP" class="form-control  number-only" id="no_ktp">
                                                            <span id="err_no_ktp" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Name">kartu Keluarga<span class="text-danger">* </span></label>
                                                            <input maxlength="16" type="text" name="no_kk" parsley-trigger="change" required
                                                            placeholder="Masukkan Nomor Kartu Keluarga" class="form-control  number-only" id="no_kk">
                                                            <span id="err_no_kk" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Alamat KTP" class="control-label">Alamat KTP<span class="text-danger">* </span></label>

                                                            <textarea required class="form-control" rows="3" name="alamat_ktp" id="alamat_ktp" placeholder="Alamat KTP"></textarea>                                                      
                                                            <span class="help-block text-danger"></span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Alamat KTP" class="control-label">Alamat Domisili<span class="text-danger">* </span></label>

                                                            <textarea required class="form-control" rows="3" name="alamat_dom" id="alamat_dom" placeholder="Alamat Domisili"></textarea>                                                      
                                                            <span class="help-block text-danger"></span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Name">Nomor Telp Keluarga<span class="text-danger">* </span></label>
                                                            <input maxlength="13" type="text" name="no_telp_keluarga" parsley-trigger="change" required
                                                            placeholder="Masukkan Nomor Telepon Keluarga" class="form-control  number-only" id="no_telp_keluarga">
                                                            <span id="err_no_telp_keluarga" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Name">Telepon Utama<span class="text-danger">* </span></label>
                                                            <input type="text" name="telpon1" parsley-trigger="change" required
                                                            placeholder="Masukkan Telepon" class="form-control number-only" id="telpon1">
                                                            <span class="help-block text-danger"></span>
                                                            <span class="help-block text-danger" id="telpon1-block"></span>
                                                            <span id="err_telepon1" class="text-danger">  </span>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Name">Telepon Kedua<span class="text-danger">* </span></label>
                                                            <input type="text" name="telpon2" parsley-trigger="change" required
                                                            placeholder="Masukkan Telepon" class="form-control number-only" id="telpon2">
                                                            <span class="help-block text-danger"></span>
                                                            <span class="help-block text-danger" id="telpon2-block"></span>
                                                            <span id="err_telepon2" class="text-danger">  </span>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Name">Email<span class="text-danger">* </span></label>
                                                            <input type="text" name="email" parsley-trigger="change" required
                                                            placeholder="Masukkan email" class="form-control" id="email">
                                                            <span class="help-block text-danger"></span>
                                                            <span class="help-block text-danger"></span>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 status_aktif">
                                                        <div class="form-group">
                                                            <label for="Name">Aktifkan<span class="text-danger">* </span></label>
                                                            <input type="text" name="status_aktif" parsley-trigger="change" required
                                                            placeholder="Masukkan Status Aktif" class="form-control" id="status_aktif">
                                                            <span class="help-block text-danger"></span>
                                                            <span class="help-block text-danger"></span>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="status_pegawai" class="control-label">Status Pegawai<span class="text-danger">* </span></label>
                                                            <select name="status_pegawai" class="form-control select2" required onchange="if(this.value=='PWTT'){$('#nomorSK').val('').removeAttr('readonly');}else{$('#nomorSK').val('-').attr('readonly',true);}">
                                                                <option value="">Pilih</option>
                                                                <option value="Mitra">Mitra</option>
                                                                <option value="Pegawai Perbantuan">Pegawai Perbantuan</option>
                                                                <option value="PWT">PWT</option>
                                                                <option value="PWT Project">PWT Project</option>
                                                                <option value="PWTT">PWTT</option>
                                                            </select>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nomorSK" class="control-label">Nomor SK<span class="text-danger">* </span></label>
                                                            <input type="text" name="nomorSK" id="nomorSK" value='-' class='form-control number-only' parsley-trigger="change" readonly>
                                                            <span id="err_nosk" class="text-danger"></span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="fungsi" class="control-label">Fungsi<span class="text-danger">* </span></label>
                                                            <select name="fungsi" class="form-control select2" required>
                                                                <option value="">Pilih</option>
                                                                <option value="Manajemen">Manajemen</option>
                                                                <option value="Medis">Medis</option>
                                                                <option value="Keperawatan">Keperawatan</option>
                                                                <option value="Penunjang Medis">Penunjang Medis</option>
                                                                <option value="Non Medis / Umum">Non Medis / Umum</option>
                                                            </select>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="status_kwn" class="control-label">Status Kawin<span class="text-danger">* </span></label>
                                                            <select name="status_kwn" class="form-control select2" required>
                                                                <option value="">Pilih</option>
                                                                <option value="Kawin">Kawin</option>
                                                                <option value="Tidak Kawin">Tidak Kawin</option>
                                                                <option value="Cerai Hidup">Cerai Hidup</option>
                                                                <option value="Cerai Mati">Cerai Mati</option>
                                                            </select>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="no_bpjs_kes">No BPJS Kesehatan<span class="text-danger">* </span></label>
                                                            <input type="text" name="no_bpjs_kes" parsley-trigger="change" required
                                                            placeholder="Masukkan No BPJS Kesehatan" class="form-control" id="no_bpjs_kes">
                                                            <span class="help-block text-danger"></span>
                                                            <span class="help-block text-danger"></span>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="no_bpjs_tkerja">No BPJS Ketenagakerjaan<span class="text-danger">* </span></label>
                                                            <input type="text" name="no_bpjs_tkerja" parsley-trigger="change" required
                                                            placeholder="Masukkan No BPJS Ketenagakerjaan" class="form-control" id="no_bpjs_tkerja">
                                                            <span class="help-block text-danger"></span>
                                                            <span class="help-block text-danger"></span>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tgl_kerja">Tanggal Mulai Kerja<span class="text-danger">* </span></label>
                                                            <input type="text" name="tgl_kerja" parsley-trigger="change" required
                                                            placeholder="Masukkan Tanggal Kerja" class="form-control datepicker  number-only">
                                                            <span id="err_tgl_kerja" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tgl_diangkat_pwtt">Tanggal Diangkat PWTT<span class="text-danger">* </span></label>
                                                            <input type="text" name="tgl_diangkat_pwtt" parsley-trigger="change" required
                                                            placeholder="Masukkan Tanggal Diangkat" class="form-control datepicker  number-only">
                                                            <span id="err_tgl_diangkat_pwtt" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tgl_cuti">Tanggal Cuti<span class="text-danger">* </span></label>
                                                            <input type="text" name="tgl_cuti" parsley-trigger="change" required
                                                            placeholder="Masukkan Tanggal Cuti" class="form-control datepicker  number-only">
                                                            <span id="err_tgl_cuti" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="masa_kerja_pwtt">Masa Kerja PWTT<span class="text-danger">* </span></label>
                                                            <input type="text" name="masa_kerja_pwtt" parsley-trigger="change" required
                                                                    placeholder="Masukkan Masa Kerja" class="form-control datepicker  number-only">
                                                            <span id="err_tgl_cuti" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="masa_kerja">Masa Kerja<span class="text-danger">* </span></label>
                                                            <input type="text" name="masa_kerja" parsley-trigger="change" required
                                                                    placeholder="Masukkan Masa Kerja" class="form-control datepicker  number-only">
                                                            <span id="err_tgl_cuti" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div> -->

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="id_medis" class="control-label">Nama Medis<span class="text-danger">* </span></label>
                                                            <select name="id_medis" class="form-control select2" id='id_medis' required>
                                                                <option value="">Pilih</option>
                                                            </select>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="" class="control-label">ID Medis <span class="text-danger">* </span></label>
                                                            <input type="text" required readonly name="nm_medis" id="nm_medis" class='form-control'>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="col-md-6" id='strsip' style='display:none;'>
                                                        <div class="form-group">
                                                            <label for="" class="control-label">STR & SIP <span class="text-danger">* </span></label>
                                                            <input type="text" required  name="strsip" id="strsip" class='form-control'>
                                                            <span id="err_strsip" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="col-md-6" id='strsip2' style='display:none;'>
                                                        <div class="form-group">
                                                            <label for="" class="control-label">Berlaku sampai <span class="text-danger">* </span></label>
                                                            <input type="date" required name="datestrsip" id="datestrsip" class='form-control'>
                                                        </div>
                                                    </div> -->

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="" class="control-label">Nomor DPLK <span class="text-danger">* </span></label>
                                                            <input type="text" required name="noDPLK" id="noDPLK" class='form-control number-only'>
                                                            <span id="err_dplk" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="datestrsip">Berlaku Sampai<span class="text-danger">* </span></label>
                                                            <input type="text" name="datestrsip" parsley-trigger="change" required
                                                            placeholder="Pilih Tanggal" class="form-control datepicker  number-only">
                                                            <span id="err_tgl_diangkat_pwtt" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="gol" class="control-label">Golongan<span class="text-danger">* </span></label>
                                                            <select name="gol" class="form-control select2" required>
                                                                <option value="">Pilih</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                                <option value="13">13</option>
                                                                <option value="14">14</option>
                                                                <option value="15">15</option>
                                                                <option value="16">16</option>
                                                                <option value="17">17</option>
                                                            </select>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tmt_gol">TMT Golongan<span class="text-danger">* </span></label>
                                                            <input type="text" name="tmt_gol" parsley-trigger="change" required
                                                            placeholder="Masukkan TMT Golongan" class="form-control datepicker  number-only">
                                                            <span id="err_tmt_gol" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sgt" class="control-label">SGT<span class="text-danger">* </span></label>
                                                            <select name="sgt" class="form-control select2" required>
                                                                <option value="">Pilih</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                                <option value="13">13</option>
                                                                <option value="14">14</option>
                                                                <option value="15">15</option>
                                                                <option value="16">16</option>
                                                                <option value="17">17</option>
                                                                <option value="18">18</option>
                                                                <option value="19">19</option>
                                                                <option value="20">20</option>
                                                                <option value="21">21</option>
                                                                <option value="22">22</option>
                                                                <option value="23">23</option>
                                                                <option value="24">24</option>
                                                                <option value="25">25</option>
                                                                <option value="26">26</option>
                                                                <option value="27">27</option>
                                                                <option value="28">28</option>
                                                                <option value="29">29</option>
                                                                <option value="30">30</option>
                                                                <option value="31">31</option>
                                                                <option value="32">32</option>
                                                                <option value="33">33</option>
                                                                <option value="34">34</option>
                                                                <option value="35">35</option>
                                                                <option value="36">36</option>
                                                            </select>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tmt_sgt">TMT SGT<span class="text-danger">* </span></label>
                                                            <input type="text" name="tmt_sgt" parsley-trigger="change" required
                                                            placeholder="Masukkan TMT SGT" class="form-control datepicker  number-only">
                                                            <span id="err_tmt_sgt" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="id_eselon" class="control-label">ID Eselon<span class="text-danger">* </span></label>
                                                            <select name="id_eselon" class="form-control select2" required>
                                                                <option value="">Pilih</option>
                                                                <option value="STKL">STKL</option>
                                                                <option value="FUNG">FUNG</option>
                                                                <option value="-">-</option>
                                                            </select>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tmt_eselon">TMT Eselon<span class="text-danger">* </span></label>
                                                            <input type="text" name="tmt_eselon" parsley-trigger="change" required
                                                            placeholder="Masukkan TMT Eselon" class="form-control datepicker number-only">
                                                            <span id="err_tmt_eselon" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="stat_pajak" class="control-label">Status Pajak<span class="text-danger">* </span></label>
                                                            <select name="stat_pajak" class="form-control select2" required>
                                                                <option value="">Pilih</option>
                                                                <option value="KOM">KOM</option>
                                                                <option value="PT">PT</option>
                                                                <option value="TA">TA</option>
                                                            </select>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tk_pajak" class="control-label">TK Pajak<span class="text-danger">* </span></label>
                                                            <select name="tk_pajak" class="form-control select2" required>
                                                                <option value="">Pilih</option>
                                                                <option value="K0">K0</option>
                                                                <option value="K1">K1</option>
                                                                <option value="K2">K2</option>
                                                                <option value="K3">K3</option>
                                                                <option value="TK0">TK0</option>
                                                                <option value="TK1">TK1</option>
                                                                <option value="TK2">TK2</option>
                                                                <option value="TK3">TK3</option>
                                                            </select>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="pjk_mulai" class="control-label">Pajak Mulai<span class="text-danger">* </span></label>
                                                            <select name="pjk_mulai" class="form-control select2" required>
                                                                <option value="">Pilih</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="pjk_akhir" class="control-label">Pajak Akhir<span class="text-danger">* </span></label>
                                                            <select name="pjk_akhir" class="form-control select2" required>
                                                                <option value="">Pilih</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="npwp">NPWP<span class="text-danger">* </span></label>
                                                            <input maxlength="16" type="text" name="npwp" parsley-trigger="change" required
                                                            placeholder="Masukkan NPWP" class="form-control number-only">
                                                            <span id="err_npwp" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tgl_npwp">Tanggal NPWP<span class="text-danger">* </span></label>
                                                            <input type="text" name="tgl_npwp" parsley-trigger="change" required
                                                            placeholder="Masukkan Tanggal NPWP" class="form-control datepicker  number-only">
                                                            <span id="err_tgl_npwp" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="bank">Pilih Bank<span class="text-danger">* </span></label>
                                                            <select name="s_bank" id="s_bank" class="form-control select2">
                                                                <option value="">-</option>
                                                            </select>
                                                            <span class="help-block text-danger"></span>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="npwp">No. Rekening<span class="text-danger">* </span></label>
                                                            <input  type="text" name="noRek" id="noRek" parsley-trigger="change" required
                                                            placeholder="Masukkan No.Rekening" class="form-control number-only">
                                                            <span id="err_noRek" class="text-danger"></span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="npwp">Atas Nama<span class="text-danger">* </span></label>
                                                            <input  type="text" name="anRek" id="anRek" required
                                                            placeholder="Atas Nama Rekening" class="form-control">
                                                            <span id="err_anRek" class="text-danger"></span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 jth_cuti">
                                                        <div class="form-group">
                                                            <label for="Name">Jatah Cuti Pegawai<span class="text-danger">*</span></label>
                                                            <input type="text" name="jth_cuti" parsley-trigger="change" required
                                                            placeholder="Masukkan Jatah Cuti Pegawai" class="form-control" id="jth_cuti" number-only>
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
                           </div><!-- /.modal -->
                           <!-- End Bootstrap modal modal_form_data_pegawai -->   