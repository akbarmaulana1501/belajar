                        <!-- start page title -->
                        <div class="row">
                        	<div class="col-12">
                        		<div class="page-title-box">
                        			<div class="page-title-right">
                        				<ol class="breadcrumb m-0">
                        					<li class="breadcrumb-item"><a href="<?= base_url('pegawai'); ?>"><?php echo ucwords($m) ?></a></li>
                        					<li class="breadcrumb-item active"><?php echo ucwords($ml) ?></li>
                        				</ol>
                        			</div>
                        			<?= $back ?>
                        		</div>
                        	</div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">  
                        	<div class="col-lg-6">
                        		<div class="card card-border">
                                    <div class="card-header border-primary pb-0">
                                        <!-- <h4 class="card-title text-white mb-0"><?php echo ucwords($m) ?></h4> -->
                                    </div>
                                    <!-- <div class="card-body row"> -->
                                        <div class="col-lg-12">
                                         <div class="card">
                                          <div class="card-body">
                                           <div class="text-center member-box">
                                            <div class="dropdown float-right">
                                             <a class="dropdown-toggle card-drop" title="Action" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-horizontal"></i> 
                                          </a>
                                          <ul class="dropdown-menu dropdown-menu-right">
                                              <li><a href="#" onclick='$("#filefoto").trigger("click")' class="dropdown-item">Upload Foto</a></li>
                                              <form id="formProfile">
                                               <input type="hidden" name="idpwg" value='<?= encrypt_url($id_pegawai); ?>'>
                                               <input class="form-control-file invisible" accept="image/*" type="file" name="filefoto" id="filefoto">
                                           </form>
                                       </ul>
                                   </div>
                                   <div class="clearfix"></div>
                                   <div class="member-card">
                                     <?php if ($dt_peg->image): ?>
                                      <div class="member-avatar avatar-xl mx-auto d-block" 
                                      style="
                                      width: 200px;
                                      height: 200px;
                                      border-radius: 50%;
                                      overflow: hidden;
                                      ">
                                      <img src="<?= base_url('image/') ?>image_pegawai/<?php echo $dt_peg->image; ?>" class="rounded-circle img-thumbnail img-pegawai" alt="profile-image" 
                                      style="
                                      width: 100%;
                                      height: 100%;
                                      object-fit: cover;">
                                      <i class="mdi mdi-star-circle member-star text-muted" title="Unverified user"></i>
                                  </div>
                                  <?php else: ?>
                                      <div class="member-avatar avatar-xl mx-auto d-block">
                                       <img src="<?= base_url('image/') ?>image_pegawai/default/avatar-2.png" class="rounded-circle img-thumbnail img-pegawai" alt="profile-image">
                                       <i class="mdi mdi-star-circle member-star text-muted" title="unverified user"></i>
                                   </div>   
                               <?php endif ?>
                               <?php
                               $birthDate = $dt_peg->tgl_lahir;
                               $date = new DateTime($birthDate);
                               $now = new DateTime();
                               $interval = $now->diff($date);
                               $umur = $interval->y . " Tahun, " . $interval->m . " Bulan";
                               ?>
                               <br>
                               <div class="">           
                                  <h4 class="mb-1"> <?= ucwords($dt_peg->nama) ?> </h4>
                                  <p class="mb-3"> <span class="text-primary"><?=$dt_peg->email ?> </span>  ||  <span> <a href="#" class="text-pink"><?= $dt_peg->nik ?></a> </span><span> <br> <a href="#" class="text-muted"><?= ucwords($dt_peg->tpt_lahir).', '. date_indo($dt_peg->tgl_lahir) ?></a> <br> <a href="#" class="text-muted"><?= $umur ?></a> </span></p>
                              </div>

                              <form action="<?php //echo $create_action ?>" method="POST" id="cek_pasienbaru">
                              </form>

                          </div>

                      </div>
                  </div>
              </div>
          </div> <!-- end col -->       
          <!-- </div>-->
      </div>
      <!-- end row -->
  </div>
  <div class="col-lg-6">
   <div class="card card-border">
    <div class="card-header border-primary pb-0">
       <!-- <h4 class="card-title text-black mb-0"><?php echo ucwords($m) ?></h4> -->
   </div>
   <!-- <div class="card-body row"> -->
       <div class="col-lg-12">
          <div class="card">
             <div class="card-body">
                <div class="row">
                   <div class="col-md-12">
                      <div class="button-list">

                         <div id="pp_pegawai"></div>

                         <?php if ($this->App->aplikasi()['role_id']==1): ?>
                            <div id="data_pegawai"></div>
                            <div id="jjp_pegawai"></div>
                            <?php elseif ($this->App->aplikasi()['role_id'] == 2): ?>
                                <div id="data_pegawai"></div>
                                <div id="jjp_pegawai"></div>
                            <?php endif ?>


                                                                    <!-- <div id="data_pegawai"></div>
                                                                        <div id="jjp_pegawai"></div> -->

                                                                        <div id="keluarga_pegawai"></div>
                                                                        <div id="upload_berkas"></div>
                                                                        <div id='upload_peldik'></div>
                                                                        <div id="data_tanggungan"></div>


                                                                        <!-- <?= $penempatan_pegawai ?> -->
                                                                        <!-- <?= $data_pegawai ?> -->
                                                                        <!--  <a href="javascript:void(0)" title="Update Data Pegawai" onclick="update('<?= encrypt_url($dt_peg->id_pegawai) ?>')" class="btn btn-block btn-primary waves-effect waves-light"><i class="fe-edit"></i> Data Pegawai</a> -->
                                                                <!-- <button type="button" class="btn btn-block btn-primary waves-effect waves-light">Data Pegawai</button>
                                                                <button type="button" class="btn btn-block btn-primary waves-effect waves-light">Data Pendidikan</button>
                                                                <button type="button" class="btn btn-block btn-primary waves-effect waves-light">Data Keluarga</button>
                                                                <button type="button" class="btn btn-block btn-primary waves-effect waves-light">Data Pelatihan</button> -->
                                                            </div>
                                                        </div>
                                                            <!-- <?php 
                                                                echo '<pre>';
                                                                echo print_r($jjp_pegawai);
                                                                echo '</pre>';
                                                                ?> --> 

                                                            </div>
                                                        </div>
                                                    </div> <!-- end col -->       
                                                    <!-- </div>-->
                                                </div>
                                                <!-- end row -->
                                            </div>
                                        </div>                                 
                                    </div> 

                                    <div class="row">  
                                    	<div class="col-lg-12">
                                    		<div class="card">
                                    			<div class="card-header bg-info" style="margin-bottom: 10px">
                                    				<h4 class="card-title text-white mb-0"><?php echo ucwords('Data '.$m) ?></h4>
                                    			</div>

                                    			<!-- <div class="card-body row"> -->
                                    				<div class="col-lg-12">
                                    					<div class="card">
                                    						<div class="card-body"><!-- <h4 class="card-title text-black mb-0">Penempatan</h4> -->
                                                    <!-- <div class="dropdown float-right">
                                                        <a class="dropdown-toggle card-drop" title="Action" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal"></i> 
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#" class="dropdown-item">Edit</a></li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="clearfix"></div>
                                                    <div class="row">
                                                    	<div class="col-md-12">
                                                    		<div class="table-responsive">
                                                    			<table class="table table-centered table-borderless mt-2 data-pegawai"  style="font-weight: normal">
                                                    				<tbody>
                                                    					<tr>
                                                    						<td width="20%">Unit Level</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_nm_unit_level"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Unit Bisnis</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_nm_unit_bisnis"></td>

                                                    						<td width="20%">Lokasi Unit Bisnis</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_nm_unit_lokasi"></td>

                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Unit Usaha</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_nm_unit_usaha"></td>

                                                    						<td width="20%">Unit Organisasi</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_nm_unit_organisasi"></td>

                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Unit Kerja</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_nm_unit_kerja"></td>

                                                    						<td width="20%">Unit Sub Kerja</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_nm_unit_kerja_sub"></td>
                                                    					</tr>

                                                    				</tbody>
                                                    			</table>
                                                    		</div>
                                                    	</div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->       
                                        </div>
                                        <!-- end row -->

                                        <!-- <div class="card-body row"> -->
                                        	<div class="col-lg-12">
                                        		<div class="card">
                                        			<div class="card-body">
                                                    <!-- <div class="dropdown float-right">
                                                        <a class="dropdown-toggle card-drop" title="Action" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal"></i> 
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#" class="dropdown-item">Edit</a></li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="clearfix"></div>
                                                    <div class="row">
                                                    	<div class="col-md-12">
                                                    		<div class="table-responsive">
                                                    			<table class="table table-centered table-borderless mt-2 data-pegawai" id='dataPegawai' style="font-weight: normal">

                                                    				<tbody>
                                                    					<tr>
                                                    						<td width="20%">NIK Pegawai</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_nik"></td>

                                                    						<td width="20%">Nama Lengkap</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_nama"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Gelar</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_gelar1"></td>

                                                    						<td width="20%">Gelar Kedua</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_gelar2"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Kartu Keluarga</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_no_kk"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Jenis Kelamin</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_jenis_kelamin"></td>

                                                    						<td width="20%">Tempat & Tanggal Lahir</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_tpt_lahir"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Golongan Darah</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_gol_dar"></td>

                                                    						<td width="20%">Tinggi Badan</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_tinggi"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Berat Badan</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_berat"></td>

                                                    						<td width="20%">Agama</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_agama_pegawai"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Nomor KTP</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_no_ktp"></td>

                                                    						<td width="20%">Alamat KTP</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_alamat_ktp"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Alamat Domisili</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_alamat_dom"></td>

                                                    						<td width="20%">Telepon Utama</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_telpon1"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Telepon Kedua</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_telpon2"></td>

                                                    						<td width="20%">Nomor Telp Keluarga</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_no_telp_keluarga"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Email</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_email"></td>

                                                    						<td width="20%">Status Pegawai</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_status_pegawai"></td>                  
                                                    					</tr>

                                                    					<tr>

                                                    						<td width="20%">No BPJS Kesehatan</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_no_bpjs_kesehatan"></td>

                                                    						<td width="20%">No BPJS Ketenagakerjaan</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_no_bpjs_ketenagakerjaan"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Tanggal Kerja</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_tanggal_kerja"></td>

                                                    						<td width="20%">Lama Kerja</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_lama_kerja"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Tanggal diangkat PWTT</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_tanggal_diangkat_pwtt"></td>

                                                    						<td width="20%">Tanggal Cuti</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_tanggal_cuti"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">ID Medis</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_id_medis"></td>

                                                    						<td width="20%">Fungsi</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_fungsi"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">SGT</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_sgt"></td>

                                                    						<td width="20%">TMT SGT</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_tmt_sgt"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Golongan</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_gol"></td>

                                                    						<td width="20%">TMT Golongan</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_tmt_gol"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Eselon</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_eselon"></td>

                                                    						<td width="20%">TMT Eselon</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_tmt_eselon"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Status Pajak</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_stat_pajak"></td>

                                                    						<td width="20%">TK Pajak</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_tk_pajak"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">Pajak Mulai</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_pajak_mulai"></td>

                                                    						<td width="20%">Pajak Akhir</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_pajak_akhir"></td>
                                                    					</tr>

                                                    					<tr>
                                                    						<td width="20%">NPWP</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_npwp"></td>

                                                    						<td width="20%">Tanggal NPWP</td>
                                                    						<td width="1%">:</td>
                                                    						<td width="36%" name="td_tgl_npwp"></td>
                                                    					</tr>
                                                    				</tbody>
                                                    			</table>
                                                    		</div>
                                                    	</div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->       
                                        </div>
                                        <!-- end row -->

                                        <!-- <div class="card-body row"> -->
                                        <!-- div class="col-lg-12">
                                            <div class="card">
                                            	<div class="card-body"> -->
                                                    <!-- <div class="dropdown float-right">
                                                        <a class="dropdown-toggle card-drop" title="Action" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal"></i> 
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#" class="dropdown-item">Edit</a></li>
                                                        </ul>
                                                    </div> -->
                                                    <!-- <div class="clearfix"></div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="table-responsive">
                                                                <table class="table table-centered table-borderless mt-2 data-pegawai">

                                                                    <tbody>
                                                                        <tr colspan="2">
                                                                            <td width="20%">Status Pegawai</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_status_pegawai"></td>                  
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            
                                                                            <td width="20%">No BPJS Kesehatan</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_no_bpjs_kesehatan"></td>

                                                                            <td width="20%">No BPJS Ketenagakerjaan</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_no_bpjs_ketenagakerjaan"></td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td width="20%">Tanggal Kerja</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_tanggal_kerja"></td>

                                                                            <td width="20%">Lama Kerja</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_lama_kerja"></td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td width="20%">Tanggal diangkat PWTT</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_tanggal_diangkat_pwtt"></td>
                                                                            
                                                                            <td width="20%">Tanggal Cuti</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_tanggal_cuti"></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td width="20%">ID Medis</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_id_medis"></td>

                                                                            <td width="20%">Fungsi</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_fungsi"></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td width="20%">SGT</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_sgt"></td>

                                                                            <td width="20%">TMT SGT</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_tmt_sgt"></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td width="20%">Golongan</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_gol"></td>
                                                                            
                                                                            <td width="20%">TMT Golongan</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_tmt_gol"></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td width="20%">Eselon</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_eselon"></td>
                                                                            
                                                                            <td width="20%">TMT Eselon</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_tmt_eselon"></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td width="20%">Status Pajak</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_stat_pajak"></td>

                                                                            <td width="20%">TK Pajak</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_tk_pajak"></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td width="20%">Pajak Mulai</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_pajak_mulai"></td>

                                                                            <td width="20%">Pajak Akhir</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_pajak_akhir"></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td width="20%">NPWP</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_npwp"></td>

                                                                            <td width="20%">Tanggal NPWP</td>
                                                                            <td width="1%">:</td>
                                                                            <td width="36%" name="td_tgl_npwp"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!--  </div>  --><!-- end col -->       
                                                <!-- </div> -->
                                                <!-- end row -->

                                                <!-- keluarga -->
                                                <!-- <div class="card-body row"> -->
                                                	<div id="keluarga_pegawai_tampil"></div>

                                        <!-- <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="clearfix"></div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            
                                                            <div id="keluarga_pegawai_tampil"></div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                        <!-- end row -->

                                        <div class="col-lg-12">
                                        	<div class="card">
                                        		<div class="card-body">
                                                    <!-- <div class="dropdown float-right">
                                                        <a class="dropdown-toggle card-drop" title="Action" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal"></i> 
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#" class="dropdown-item">Edit</a></li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="clearfix"></div>
                                                    <div class="row">
                                                    	<div class="col-md-12">

                                                    		<table class="table table-responsive" id="list_tanggungan">
                                                    			<thead>
                                                    				<tr>
                                                    					<th width="2%">No</th>
                                                    					<th>Nama </th>
                                                    					<th>hubungan</th>
                                                    					<th>No KTP</th>
                                                    					<th>Tempat Lahir</th>
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
                                            </div> <!-- end col -->       
                                        </div>


                                        <!-- <div class="card-body row"> -->
                                        	<div class="col-lg-12">
                                        		<div class="card">
                                        			<div class="card-body">
                                                    <!-- <div class="dropdown float-right">
                                                        <a class="dropdown-toggle card-drop" title="Action" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal"></i> 
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#" class="dropdown-item">Edit</a></li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="clearfix"></div>
                                                    <div class="row">
                                                    	<div class="col-md-12">

                                                    		<table class="table table-responsive" id="jenjang_pendidikan_tampil">
                                                    			<thead>
                                                    				<tr>
                                                    					<th width="2%">No</th>
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
                                            </div> <!-- end col -->       
                                        </div>
                                        <!-- end row -->

                                        <!-- <div class="card-body row"> -->
                                        	<div class="col-lg-12">
                                        		<div class="card">
                                        			<div class="card-body">
                                                    <!-- <div class="dropdown float-right">
                                                        <a class="dropdown-toggle card-drop" title="Action" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal"></i> 
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#" class="dropdown-item">Edit</a></li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="clearfix"></div>
                                                    <div class="row">
                                                    	<div class="col-md-12">

                                                    		<table class="table table-responsive" id="list_berkas_pegawai">
                                                    			<thead>
                                                    				<tr>
                                                    					<th width="2%">No</th>
                                                    					<th>Nama Berkas</th>
                                                    					<th>Berkas</th>                         
                                                    				</tr>                   
                                                    			</thead>
                                                    			<tbody> 

                                                    			</tbody>
                                                    		</table>

                                                    	</div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->       
                                        </div>
                                        <!-- end row -->

                                        <!-- <div class="card-body row"> -->
                                        	<div class="col-lg-12">
                                        		<div class="card">
                                        			<div class="card-body">
                                                    <!-- <div class="dropdown float-right">
                                                        <a class="dropdown-toggle card-drop" title="Action" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal"></i> 
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#" class="dropdown-item">Edit</a></li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="clearfix"></div>
                                                    <div class="row">
                                                    	<div class="col-md-12">

                                                    		<table class="table table-responsive" id="list_peldik">
                                                    			<thead>
                                                    				<tr>
                                                    					<th width="2%">No</th>
                                                    					<th>Nama Pelatihan dan Diklat</th>
                                                    					<th>Penyelenggara</th>
                                                    					<th>Tanggal Mulai</th>
                                                    					<th>Tanggal Selesai</th>
                                                    					<th>Waktu</th>
                                                    					<th>Berkas</th>                         
                                                    				</tr>                   
                                                    			</thead>
                                                    			<tbody> 

                                                    			</tbody>
                                                    		</table>

                                                    	</div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->       
                                        </div>


                                        <!-- end row -->
                                        <!-- end row -->
                                    </div>
                                </div>                                 
                            </div> 

                            <!-- Load modal -->
                            <?php $this->load->view('admin/pegawai/list_modal') ?>
                            <!-- Load modal -->

                        </div> <!-- end container-fluid -->

                    </div> <!-- end content -->






                    <!-- ============================================================== -->
                    <!-- End Page content -->
                    <!-- ============================================================== -->
                </div>

                <?php $this->load->view('templates/includes/footer') ?>


                <script type="text/javascript">
                	$(document).ready(function() {
                		table =  $.ajax({
                			url : "<?php echo site_url('pegawai/get_by_id/'.encrypt_url($id_pegawai))?>/",
                			type: "GET",
                			dataType: "JSON",
                			success: function(data)
                			{
                				if (data.jenis_kelamin=='' || data.tpt_lahir=='' || data.tgl_lahir=='' || data.gol_dar=='' || data.tinggi==0 || data.berat==0 || data.agama=='' || data.no_ktp=='' || data.alamat_ktp=='' || data.alamat_dom=='' || data.telpon1=='' ||data.telpon2==0 || data.telpon2=='' || data.no_telp_keluarga=='' || data.email=='') {

                					if (data.jenis_kelamin=='Wanita'){
                						panggilan = 'Ibu ';
                					} else {
                						panggilan = 'Bapak ';
                					}

                                // update('<?= encrypt_url($id_pegawai) ?>');                            
                                $('.btn_data_pegawai').removeClass('btn-primary').addClass('btn-danger');
                                Swal.fire({
                                	icon : "info",  
                                	backdrop:true,
                                	allowOutsideClick: false,
                                	title:"<strong class='text-danger'> Data Tidak Lengkap... </span>",
                                	html:"Data "+panggilan+" <strong class='text-primary'>"+data.nama+"</strong> Tidak Lengkap, silahkan dilengkapi terlebih dahulu. Terimakasih",
                                	type:"warning",
                                	showCancelButton: 0,
                                	confirmButtonText: "OKE",
                                });

                                $('.swal2-confirm').click(function(){
                                	update('<?= encrypt_url($id_pegawai) ?>');

                                });

                            } else {
                            	$('.btn_data_pegawai').removeClass('btn-primary').addClass('btn-success');
                            }

                            $('[name="td_id_pegawai"]').html(id_pegawai);
                            $('[name="td_nik"]').html(data.nik);
                            $('[name="td_nik_lama"]').html(data.nik_lama);
                            $('[name="td_nama"]').html(data.nama);
                            $('[name="td_gelar1"]').html(data.gelar1);
                            $('[name="td_gelar2"]').html(data.gelar2);
                            $('[name="td_jenis_kelamin"]').html(data.jenis_kelamin);
                            $('[name="td_tpt_lahir"]').html(data.tpt_lahir);
                            $('[name="td_tgl_lahir"]').html(data.tgl_lahir);
                            $('[name="td_gol_dar"]').html(data.gol_dar);
                            $('[name="td_tinggi"]').html(data.tinggi+" Centimeter");
                            $('[name="td_berat"]').html(data.berat+ " Kilogram");
                            $('[name="td_agama_pegawai"]').html(data.agama);
                            $('[name="td_no_ktp"]').html(data.no_ktp);
                            $('[name="td_no_kk"]').html(data.no_kk);
                            $('[name="td_alamat_ktp"]').html(data.alamat_ktp);
                            $('[name="td_alamat_dom"]').html(data.alamat_dom);
                            $('[name="td_telpon1"]').html(data.telpon1);
                            $('[name="td_telpon2"]').html(data.telpon2);
                            $('[name="td_no_telp_keluarga"]').html(data.no_telp_keluarga);
                            $('[name="td_email"]').html(data.email); 
                            $('[name="td_status_pegawai"]').html(data.status_pegawai); 
                            $('[name="td_fungsi"]').html(data.fungsi); 
                            $('[name="td_status_kawin"]').html(data.status_kwn); 
                            $('[name="td_no_bpjs_kesehatan"]').html(data.no_bpjs_kes); 
                            $('[name="td_no_bpjs_ketenagakerjaan"]').html(data.no_bpjs_tkerja); 
                            $('[name="td_tanggal_kerja"]').html(data.tgl_kerja); 

                            dob = new Date(data.tgl_kerja); 
                            var today = new Date();
                            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                            $('[name="td_lama_kerja"]').html(age+" Tahun");

                            $('[name="td_tanggal_diangkat_pwtt"]').html(data.tgl_diangkat_pwtt); 
                            $('[name="td_tanggal_cuti"]').html(data.tgl_cuti); 
                            $('[name="td_id_medis"]').html(data.id_medis); 
                            $('[name="td_sgt"]').html(data.sgt); 
                            $('[name="td_tmt_sgt"]').html(data.tmt_sgt); 
                            $('[name="td_gol"]').html(data.gol); 
                            $('[name="td_tmt_gol"]').html(data.tmt_gol); 
                            $('[name="td_eselon"]').html(data.id_eselon); 
                            $('[name="td_tmt_eselon"]').html(data.tmt_eselon); 
                            $('[name="td_stat_pajak"]').html(data.stat_pajak); 
                            $('[name="td_tk_pajak"]').html(data.tk_pajak); 
                            $('[name="td_pajak_mulai"]').html(data.pjk_mulai); 
                            $('[name="td_pajak_akhir"]').html(data.pjk_akhir); 
                            $('[name="td_npwp"]').html(data.npwp); 
                            $('[name="td_tgl_npwp"]').html(data.tgl_npwp);

                            $('[name="pend_terakhir"]').val(data.pend_terakhir);

                            $('[name="nomorSK"]').val(data.no_SK);
                            $('[name="noDPLK"]').val(data.no_dplk);
                            $('[name="nm_pgl"]').val(data.nm_pgl);

                            $('[name="jth_cuti"]').val(data.jatah_cuti);


                            $.ajax({
                            	url : "<?php echo site_url('pegawai/jjp_ajax_list/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data){
                            		var event_data = '';
                            		$.each(data.data, function(index, value){
                            			/*console.log(value);*/
                            			event_data += '<tbody>';
                            			event_data += '<tr>';
                            			event_data += '<td>'+value.no+'</td>';
                            			event_data += '<td>'+value.jenjang_pendidikan+'</td>';
                            			event_data += '<td>'+value.nm_jenjang_pendidikan+'</td>';
                            			event_data += '<td>'+value.jurusan+'</td>';
                            			event_data += '<td>'+value.tahun_lulus+'</td>';
                            			event_data += '<td>'+value.no_ijazah+'</td>';
                            			event_data += '<tr>';
                            			event_data += '</tbody>';
                            		});
                            		$("#jenjang_pendidikan_tampil tbody").empty().append();
                            		$("#jenjang_pendidikan_tampil").append(event_data);
                            	},
                            });

                            $.ajax({
                            	url : "<?php echo site_url('pegawai/upload_berkas_ajax_list/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data){
                                        // console.log(data.data);
                                        var event_data = '';
                                        $.each(data.data, function(index, value){
                                        	/*console.log(value);*/
                                        	event_data += '<tbody>';
                                        	event_data += '<tr>';
                                        	event_data += '<td>'+value.no+'</td>';
                                        	event_data += '<td>'+value.nm_berkas+'</td>';
                                        	event_data += '<td><a class="btn btn-primary btn-square" href="<?php echo site_url('/image/berkas_pegawai/'); ?>'+value.upload_berkas+'" target="_blank"><i class="mdi mdi-file-pdf-box"></i>Download </a></td>';
                                        	event_data += '<tr>';
                                        	event_data += '</tbody>';
                                        });
                                        $("#list_berkas_pegawai tbody").empty().append();
                                        $("#list_berkas_pegawai").append(event_data);
                                    },
                                });
                            
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/upload_peldik_ajax_list/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data){
                                        // console.log(data.data);
                                        var event_data = '';
                                        $.each(data.data, function(index, value){
                                        	/*console.log(value);*/
                                        	event_data += '<tbody>';
                                        	event_data += '<tr>';
                                        	event_data += '<td>'+value.no+'</td>';
                                        	event_data += '<td>'+value.nm_peldik+'</td>';
                                        	event_data += '<td>'+value.nm_penyelenggara+'</td>';
                                        	event_data += '<td>'+value.mulai+'</td>';
                                        	event_data += '<td>'+value.selesai+'</td>';
                                        	event_data += '<td>'+value.waktu+'</td>';
                                        	event_data += '<td><a class="btn btn-primary btn-square" href="<?php echo site_url('/image/berkas_peldik/'); ?>'+value.upload_berkas+'" target="_blank"><i class="mdi mdi-file-pdf-box"></i>Download </a></td>';
                                        	event_data += '<tr>';
                                        	event_data += '</tbody>';
                                        });
                                        $("#list_peldik tbody").empty().append();
                                        $("#list_peldik").append(event_data);
                                    },
                                });

                            
                            // Button Jenjang Pendidikan Pegawai
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_cek_jjp_by_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                            		if (data.cek_jjp_by_id) {
                            			$('#jjp_pegawai').html('<a href="javascript:void(0)" title="Jenjang Pendidikan Pegawai" id="add_jjp_pegawai" class="btn btn-block btn-success waves-effect waves-light" onclick="add_jjp_pegawai('+"'"+data.id_pegawai+"'"+')"><i class="fas fa-edit"></i> Jenjang Pendidikan </a>'); 
                            		} else {
                            			$('#jjp_pegawai').html('<a href="javascript:void(0)" title="Jenjang Pendidikan Pegawai" id="add_jjp_pegawai" class="btn btn-block btn-danger waves-effect waves-light" onclick="add_jjp_pegawai('+"'"+data.id_pegawai+"'"+')"><i class="fe-plus-square"></i> Jenjang Pendidikan </a>'); 
                            		}

                                        // console.log(data);
                                    }
                                });

                            
                            // Button Pegawai
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_cek_pegawai_by_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                            		if (data.cek_pegawai_by_id) {
                            			$('#data_pegawai').html('<a href="javascript:void(0)" title="Update Data Pegawai" class="btn btn-block btn-success waves-effect waves-light" onclick="update('+"'"+data.id_pegawai+"'"+')"><i class="fas fa-edit"></i> Data Pegawai </a>'); 
                            		} 

                                        // console.log(data);
                                    }
                                });


                            // Button Penempatan Pegawai
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_cek_pp_by_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                            		if (data.cek_pp_by_id === true) {
                            			$('#pp_pegawai').html('<a href="javascript:void(0)" title="Penempatan Pegawai" id="add_pp_pegawai" class="btn btn-block btn-success waves-effect waves-light" onclick="update_penempatan('+"'"+data.id_pegawai+"'"+')"><i class="fas fa-edit"></i> Penempatan Pegawai</a>'); 

                            		} else if (data.cek_pp_by_id === false){
                            			$('#pp_pegawai').html('<a href="javascript:void(0)" title="Penempatan Pegawai" id="add_pp_pegawai" class="btn btn-block btn-danger waves-effect waves-light" onclick="add_penempatan('+"'"+data.id_pegawai+"'"+')"><i class="fe-plus-square"></i> Penempatan Pegawai</a>'); 
                            		}  

                                        // console.log(data);
                                    }
                                });

                            // Button Tanggungan
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_cek_tanggungan_by_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                            		if (data.cek_tanggungan_by_id) {
                            			$('#data_tanggungan').html('<a href="javascript:void(0)" title="Data tanggungan Pegawai" id="add_data_tanggungan" class="btn btn-block btn-success waves-effect waves-light" onclick="add_data_tanggungan('+"'"+data.id_pegawai+"'"+')"><i class="fas fa-edit"></i> Data tanggungan Pegawai</a>'); 

                            		} else {
                            			$('#data_tanggungan').html('<a href="javascript:void(0)" title="Data tanggungan Pegawai" id="add_data_tanggungan" class="btn btn-block btn-danger waves-effect waves-light" onclick="add_data_tanggungan('+"'"+data.id_pegawai+"'"+')"><i class="fe-plus-square"></i> Data tanggungan Pegawai</a>'); 
                            		}  

                                        // console.log(data);
                                    }
                                });   

                            // Button Keluarga Pegawai
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_cek_keluarga_by_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                            		if (data.cek_keluarga_by_id === true) {
                            			$('#keluarga_pegawai').html('<a href="javascript:void(0)" title="Data Keluarga Pegawai" id="update_keluarga_pegawai" class="btn btn-block btn-success waves-effect waves-light" onclick="update_keluarga_pegawai('+"'"+data.id_pegawai+"'"+')"><i class="fas fa-edit"></i> Data Keluarga Pegawai</a>'); 

                            		} else if (data.cek_keluarga_by_id === false){
                            			$('#keluarga_pegawai').html('<a href="javascript:void(0)" title="Data Keluarga Pegawai" id="add_keluarga_pegawai" class="btn btn-block btn-danger waves-effect waves-light" onclick="add_keluarga_pegawai('+"'"+data.id_pegawai+"'"+')"><i class="fe-plus-square"></i> Data Keluarga Pegawai</a>'); 
                            		}  

                                        // console.log(data);
                                    }
                                });   

                            
                            // Button Upload Berkas Pegawai
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_cek_upload_berkas_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                            		if (data.cek_upload_berkas_id) {
                            			$('#upload_berkas').html('<a href="javascript:void(0)" title="Upload Berkas Pegawai" id="add_upload_berkas" class="btn btn-block btn-success waves-effect waves-light" onclick="add_upload_berkas('+"'"+data.id_pegawai+"'"+')"><i class="fas fa-edit"></i> Berkas </a>'); 
                            		} else {
                            			$('#upload_berkas').html('<a href="javascript:void(0)" title="Upload Berkas Pegawai" id="add_upload_berkas" class="btn btn-block btn-danger waves-effect waves-light" onclick="add_upload_berkas('+"'"+data.id_pegawai+"'"+')"><i class="fe-plus-square"></i> Berkas </a>'); 
                            		}

                                        // console.log(data);
                                    }
                                });


                            // Tabel Penempatan Pegawai

                            // Button Upload Peldik
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_cek_upload_peldik/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                            		if (data.cek_upload_peldik_id) {
                            			$('#upload_peldik').html('<a href="javascript:void(0)" title="Upload Peldik" id="add_upload_peldik" class="btn btn-block btn-success waves-effect waves-light" onclick="add_upload_peldik('+"'"+data.id_pegawai+"'"+')"><i class="fas fa-edit"></i> Pelatihan dan Diklat </a>'); 
                            		} else {
                            			$('#upload_peldik').html('<a href="javascript:void(0)" title="Upload Peldik" id="add_upload_peldik" class="btn btn-block btn-danger waves-effect waves-light" onclick="add_upload_peldik('+"'"+data.id_pegawai+"'"+')"><i class="fe-plus-square"></i> Pelatihan dan Diklat </a>'); 
                            		}

                                        // console.log(data);
                                    }
                                });


                            // Tabel Peldik
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_pp_by_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                                        // console.log(data);
                                        $('[name="td_nm_unit_level"]').html(data.nm_unit_level);
                                        $('[name="td_nm_unit_bisnis"]').html(data.nm_unit_bisnis);
                                        $('[name="td_nm_unit_lokasi"]').html(data.nm_unit_lokasi);
                                        $('[name="td_nm_unit_usaha"]').html(data.nm_unit_usaha);
                                        $('[name="td_nm_unit_organisasi"]').html(data.nm_unit_organisasi);
                                        $('[name="td_nm_unit_kerja"]').html(data.nm_unit_kerja);
                                        $('[name="td_nm_unit_kerja_sub"]').html(data.nm_unit_kerja_sub);
                                    }
                                });  

                            // Tabel Jenjang Pendidikan Pegawai
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_jjp_by_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                                        // console.log(data);
                                        $('[name="td_jenjang_pendidikan"]').html(data.jenjang_pendidikan);
                                        $('[name="td_nm_jenjang_pendidikan"]').html(data.nm_jenjang_pendidikan);
                                        $('[name="td_jurusan"]').html(data.jurusan);
                                        $('[name="td_tahun_lulus"]').html(data.tahun_lulus);
                                        $('[name="td_no_ijazah"]').html(data.no_ijazah);
                                    }
                                });

                            // Tabel Keluarga Pegawai
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_pegawai_keluarga_by_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                            		var event_data = '';

                            		event_data += '<div class="col-lg-12">';
                            		event_data += '<div class="card">';
                            		event_data += '<div class="card-body">';
                            		event_data += '<div class="clearfix"></div>';
                            		event_data += '<div class="row">';
                            		event_data += '<div class="col-md-12">';
                            		event_data += '<table class="table table-responsive table-centered table-borderless mt-2" style="font-weight: normal">';

                            		event_data += '<tbody>';
                            		event_data += '<tr>';

                            		if (data.nama_ibu===null){
                                        data.nama_ibu = "(Belum Diisi)";
                                    }
                                    if (data.nama_ayah===null){
                                        data.nama_ayah = "(Belum Diisi)";
                                    }
                                    if (data.pekerjaan_ibu===null){
                                        data.pekerjaan_ibu = "(Belum Diisi)";
                                    }
                                    if (data.pekerjaan_ayah===null){
                                        data.pekerjaan_ayah = "(Belum Diisi)";
                                    }
                                    if (data.status_kwn===null){
                                        data.status_kwn = "(Belum Diisi)";
                                    }
                                    if (data.no_kk==0){
                                        data.no_kk = "(Belum Diisi)";
                                    }

                                    event_data += '<td width="20%">'+'Nama Ibu'+'</td>';  
                                    event_data += '<td width="1%">'+':'+'</td>';  
                                    event_data += '<td width="36%">'+data.nama_ibu+'</td>';

                                    event_data += '<td width="20%">'+'Pekerjaan Ibu'+'</td>';  
                                    event_data += '<td width="1%">'+':'+'</td>';  
                                    event_data += '<td width="36%">'+data.pekerjaan_ibu+'</td>';

                                    event_data += '</tr>'

                                    event_data += '<tr>';

                                    event_data += '<td width="20%">'+'Nama Ayah'+'</td>';  
                                    event_data += '<td width="1%">'+':'+'</td>';  
                                    event_data += '<td width="36%">'+data.nama_ayah+'</td>';

                                    event_data += '<td width="20%">'+'Pekerjaan Ayah'+'</td>';  
                                    event_data += '<td width="1%">'+':'+'</td>';  
                                    event_data += '<td width="36%">'+data.pekerjaan_ayah+'</td>';

                                    event_data += '</tr>';

                                    event_data += '<tr>';

                                    event_data += '<td width="20%">'+'Status Kawin'+'</td>';  
                                    event_data += '<td width="1%">'+':'+'</td>';  
                                    event_data += '<td width="36%">'+data.status_kwn+'</td>';

                                    event_data += '<td width="20%">'+'No. Kartu Keluarga'+'</td>'; 
                                    event_data += '<td width="1%">'+':'+'</td>';  
                                    event_data += '<td width="36%">'+data.no_kk+'</td>';

                                    event_data += '</tr>';

                                    event_data += '</tbody>';
                                    event_data += '</div>';
                                    event_data += '</div>';
                                    event_data += '</div>';
                                    event_data += '</div>';
                                    event_data += '</div>';

                                        // console.log(data);
                                        // $('[name="td_nama_ibu"]').html(data.nama_ibu);
                                        // $('[name="td_pekerjaan_ibu"]').html(data.pekerjaan_ibu);
                                        // $('[name="td_nama_ayah"]').html(data.nama_ayah);
                                        // $('[name="td_pekerjaan_ayah"]').html(data.pekerjaan_ayah);
                                        // $('[name="td_pasangan"]').html(data.pasangan);

                                        $("#keluarga_pegawai_tampil tbody").empty().append();
                                        $("#keluarga_pegawai_tampil").append(event_data);
                                    }
                                });                 

                            //Tabel Tanggungan
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/tanggungan_ajax_list/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data){

                            		var event_data = '';
                            		$.each(data.data, function(index, value){
                            			event_data += '<tbody>';
                            			event_data += '<tr>';
                            			event_data += '<td>'+value.no+'</td>';
                            			event_data += '<td>'+value.button+'</td>';
                            			event_data += '<td>'+value.nama_tanggungan+'</td>';
                            			event_data += '<td>'+value.hubungan+'</td>';
                            			event_data += '<td>'+value.no_ktp+'</td>';
                            			event_data += '<td>'+value.tempat_lahir+'</td>';
                            			event_data += '<td>'+value.agama+'</td>';
                            			event_data += '<td>'+value.pendidikan+'</td>';
                            			event_data += '<td>'+value.pekerjaan+'</td>';
                            			event_data += '<td>'+value.golongan_darah+'</td>';
                            			event_data += '<tr>';
                            			event_data += '</tbody>';
                            		});
                            		$("#tanggungan_list_table_json tbody").empty().append();
                            		$("#tanggungan_list_table_json").append(event_data);
                            	},
                            }); 

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                        // alert('Error get data from ajax');
                        Swal.fire({
                        	icon : "error",
                        	title:"Oops...",
                        	text:"Gagal mengambil data!"
                        });
                    }
                });


                    });

                        function reload(){
                        	$.ajax({
                        		url : "<?php echo site_url('pegawai/get_by_id/'.encrypt_url($id_pegawai))?>/",
                        		type: "GET",
                        		dataType: "JSON",
                        		success: function(data)
                        		{

                        			if (data.jenis_kelamin=='' || data.tpt_lahir=='' || data.tgl_lahir=='' || data.gol_dar=='' || data.tinggi==0 || data.berat==0 || data.agama=='' || data.no_ktp=='' || data.alamat_ktp=='' || data.alamat_dom=='' || data.telpon1=='' ||data.telpon2==0 || data.telpon2=='' || data.no_telp_keluarga=='' || data.email=='') {

                        				if (data.jenis_kelamin=='Wanita'){
                        					panggilan = 'Ibu ';
                        				} else {
                        					panggilan = 'Bapak ';
                        				}

                        				$('.btn_data_pegawai').removeClass('btn-primary').addClass('btn-danger');
                        				Swal.fire({
                        					icon : "info",  
                        					backdrop:true,
                        					allowOutsideClick: false,
                        					title:"<strong class='text-danger'> Data Tidak Lengkap... </span>",
                        					html:"Data "+panggilan+" <strong class='text-primary'>"+data.nama+"</strong> Tidak Lengkap, silahkan dilengkapi terlebih dahulu. Terimakasih",
                        					type:"warning",
                        					showCancelButton: 0,
                        					confirmButtonText: "OKE",
                        				});

                        				$('.swal2-confirm').click(function(){
                        					update('<?= encrypt_url($id_pegawai) ?>');

                        				});
                        			}

                        			$('[name="td_id_pegawai"]').html(id_pegawai);
                        			$('[name="td_nik"]').html(data.nik);
                        			$('[name="td_nik_lama"]').html(data.nik_lama);
                        			$('[name="td_nama"]').html(data.nama);
                        			$('[name="td_gelar1"]').html(data.gelar1);
                        			$('[name="td_gelar2"]').html(data.gelar2);
                        			$('[name="td_jenis_kelamin"]').html(data.jenis_kelamin);
                        			$('[name="td_tpt_lahir"]').html(data.tpt_lahir);
                        			$('[name="td_tgl_lahir"]').html(data.tgl_lahir);
                        			$('[name="td_gol_dar"]').html(data.gol_dar);
                        			$('[name="td_tinggi"]').html(data.tinggi+" Centimeter");
                        			$('[name="td_berat"]').html(data.berat+ " Kilogram");
                        			$('[name="td_agama_pegawai"]').html(data.agama);
                        			$('[name="td_no_ktp"]').html(data.no_ktp);
                        			$('[name="td_no_kk"]').html(data.no_kk);
                        			$('[name="td_alamat_ktp"]').html(data.alamat_ktp);
                        			$('[name="td_alamat_dom"]').html(data.alamat_dom);
                        			$('[name="td_telpon1"]').html(data.telpon1);
                        			$('[name="td_telpon2"]').html(data.telpon2);
                        			$('[name="td_no_telp_keluarga"]').html(data.no_telp_keluarga);
                        			$('[name="td_email"]').html(data.email);


                            // $('[name="nama_tanggungan"]').html(data.nama_tanggungan);
                            // $('[name="hubungan"]').html(data.hubungan);
                            // $('[name="no_ktp"]').html(data.no_ktp);
                            // $('[name="no_kk"]').html(data.no_kk);
                            // $('[name="tempat_lahir"]').html(data.tempat_lahir);
                            // $('[name="agama"]').html(data.agama);
                            // $('[name="pendidikan"]').html(data.pendidikan);
                            // $('[name="pekerjaan"]').html(data.pekerjaan);
                            // $('[name="golongan_darah"]').html(data.golongan_darah);

                            $('[name="td_status_pegawai"]').html(data.status_pegawai); 
                            $('[name="td_fungsi"]').html(data.fungsi); 
                            $('[name="td_status_kawin"]').html(data.status_kwn); 
                            $('[name="td_no_bpjs_kesehatan"]').html(data.no_bpjs_kes); 
                            $('[name="td_no_bpjs_ketenagakerjaan"]').html(data.no_bpjs_tkerja); 
                            $('[name="td_tanggal_kerja"]').html(data.tgl_kerja); 

                            dob = new Date(data.tgl_kerja); 
                            var today = new Date();
                            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                            $('[name="td_lama_kerja"]').html(age+" Tahun");

                            $('[name="td_tanggal_diangkat_pwtt"]').html(data.tgl_diangkat_pwtt); 
                            $('[name="td_tanggal_cuti"]').html(data.tgl_cuti); 
                            $('[name="td_id_medis"]').html(data.id_medis); 
                            $('[name="td_sgt"]').html(data.sgt); 
                            $('[name="td_tmt_sgt"]').html(data.tmt_sgt); 
                            $('[name="td_gol"]').html(data.gol); 
                            $('[name="td_tmt_gol"]').html(data.tmt_gol); 
                            $('[name="td_eselon"]').html(data.id_eselon); 
                            $('[name="td_tmt_eselon"]').html(data.tmt_eselon); 
                            $('[name="td_stat_pajak"]').html(data.stat_pajak); 
                            $('[name="td_tk_pajak"]').html(data.tk_pajak); 
                            $('[name="td_pajak_mulai"]').html(data.pjk_mulai); 
                            $('[name="td_pajak_akhir"]').html(data.pjk_akhir); 
                            $('[name="td_npwp"]').html(data.npwp); 
                            $('[name="td_tgl_npwp"]').html(data.tgl_npwp); 


                            //tabel jenjang pendidikan
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/jjp_ajax_list/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data){
                                        // console.log(data.data);
                                        var event_data = '';
                                        $.each(data.data, function(index, value){
                                        	/*console.log(value);*/
                                        	event_data += '<tbody>';
                                        	event_data += '<tr>';
                                        	event_data += '<td>'+value.no+'</td>';
                                        	event_data += '<td>'+value.jenjang_pendidikan+'</td>';
                                        	event_data += '<td>'+value.nm_jenjang_pendidikan+'</td>';
                                        	event_data += '<td>'+value.jurusan+'</td>';
                                        	event_data += '<td>'+value.tahun_lulus+'</td>';
                                        	event_data += '<td>'+value.no_ijazah+'</td>';
                                        	event_data += '<tr>';
                                        	event_data += '</tbody>';
                                        });
                                        $("#jenjang_pendidikan_tampil tbody").empty().append();
                                        $("#jenjang_pendidikan_tampil").append(event_data);
                                    },
                                });

                            // Tabel upload berkas
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/upload_berkas_ajax_list/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data){
                                        // console.log(data.data);
                                        var event_data = '';
                                        $.each(data.data, function(index, value){
                                        	/*console.log(value);*/
                                        	event_data += '<tbody>';
                                        	event_data += '<tr>';
                                        	event_data += '<td>'+value.no+'</td>';
                                        	event_data += '<td>'+value.nm_berkas+'</td>';
                                        	event_data += '<td><a class="btn btn-primary btn-square" href="<?php echo site_url('/image/berkas_pegawai/'); ?>'+value.upload_berkas+'" target="_blank"><i class="mdi mdi-file-pdf-box"></i>Download </a></td>';
                                        	event_data += '<tr>';
                                        	event_data += '</tbody>';
                                        });
                                        $("#list_berkas_pegawai tbody").empty().append();
                                        $("#list_berkas_pegawai").append(event_data);
                                    },
                                });
                            
                            //tabel tanggungan                              
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/tanggungan_ajax_list/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data){
                            		console.log(data.data);
                            		var event_data = '';
                            		$.each(data.data, function(index, value){
                            			event_data += '<tbody>';
                            			event_data += '<tr>';
                            			event_data += '<td>'+value.no+'</td>';
                            			event_data += '<td>'+value.nama_tanggungan+'</td>';
                            			event_data += '<td>'+value.hubungan+'</td>';
                            			event_data += '<td>'+value.no_ktp+'</td>';
                            			event_data += '<td>'+value.tempat_lahir+'</td>';
                            			event_data += '<td>'+value.agama+'</td>';
                            			event_data += '<td>'+value.pendidikan+'</td>';
                            			event_data += '<td>'+value.pekerjaan+'</td>';
                            			event_data += '<td>'+value.golongan_darah+'</td>';
                            			event_data += '<tr>';
                            			event_data += '</tbody>';
                            		});
                            		$("#list_tanggungan tbody").empty().append();
                            		$("#list_tanggungan").append(event_data);
                            	},
                            }); 

                            //tabel peldik
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/upload_peldik_ajax_list/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data){
                                        // console.log(data.data);
                                        var event_data = '';
                                        $.each(data.data, function(index, value){
                                        	/*console.log(value);*/
                                        	event_data += '<tbody>';
                                        	event_data += '<tr>';
                                        	event_data += '<td>'+value.no+'</td>';
                                        	event_data += '<td>'+value.nm_peldik+'</td>';
                                        	event_data += '<td>'+value.nm_penyelenggara+'</td>';
                                        	event_data += '<td>'+value.mulai+'</td>';
                                        	event_data += '<td>'+value.selesai+'</td>';
                                        	event_data += '<td>'+value.waktu+'</td>';
                                        	event_data += '<td><a class="btn btn-primary btn-square" href="<?php echo site_url('/image/berkas_peldik/'); ?>'+value.upload_berkas+'" target="_blank"><i class="mdi mdi-file-pdf-box"></i>Download </a></td>';
                                            // event_data += '<td>'+value.time_upload+'</td>';
                                            event_data += '<tr>';
                                            event_data += '</tbody>';
                                        });
                                        $("#list_peldik tbody").empty().append();
                                        $("#list_peldik").append(event_data);
                                    },
                                });

                            
                            // Button Jenjang Pendidikan Pegawai
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_cek_jjp_by_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                            		if (data.cek_jjp_by_id) {
                            			$('#jjp_pegawai').html('<a href="javascript:void(0)" title="Jenjang Pendidikan Pegawai" id="add_jjp_pegawai" class="btn btn-block btn-success waves-effect waves-light" onclick="add_jjp_pegawai('+"'"+data.id_pegawai+"'"+')"><i class="fas fa-edit"></i> Jenjang Pendidikan </a>'); 
                            		} else {
                            			$('#jjp_pegawai').html('<a href="javascript:void(0)" title="Jenjang Pendidikan Pegawai" id="add_jjp_pegawai" class="btn btn-block btn-danger waves-effect waves-light" onclick="add_jjp_pegawai('+"'"+data.id_pegawai+"'"+')"><i class="fe-plus-square"></i> Jenjang Pendidikan </a>'); 
                            		}

                                        // console.log(data);
                                    }
                                });

                            
                            // Button Pegawai
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_cek_pegawai_by_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                            		if (data.cek_pegawai_by_id) {
                            			$('#data_pegawai').html('<a href="javascript:void(0)" title="Update Data Pegawai" class="btn btn-block btn-success waves-effect waves-light" onclick="update('+"'"+data.id_pegawai+"'"+')"><i class="fas fa-edit"></i> Data Pegawai </a>'); 
                            		} 

                                        // console.log(data);
                                    }
                                });

                            //button tanggungan

                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_cek_tanggungan_by_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                            		if (data.cek_tanggungan_by_id) {
                            			$('#data_tanggungan').html('<a href="javascript:void(0)" title="Data tanggungan Pegawai" id="add_data_tanggungan" class="btn btn-block btn-success waves-effect waves-light" onclick="add_data_tanggungan('+"'"+data.id_pegawai+"'"+')"><i class="fas fa-edit"></i> Data tanggungan Pegawai</a>'); 

                            		} else {
                            			$('#data_tanggungan').html('<a href="javascript:void(0)" title="Data tanggungan Pegawai" id="add_data_tanggungan" class="btn btn-block btn-danger waves-effect waves-light" onclick="add_data_tanggungan('+"'"+data.id_pegawai+"'"+')"><i class="fe-plus-square"></i> Data tanggungan Pegawai</a>'); 
                            		}  

                                        // console.log(data);
                                    }
                                });


                            // Button Penempatan Pegawai
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_cek_pp_by_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                            		if (data.cek_pp_by_id === true) {
                            			$('#pp_pegawai').html('<a href="javascript:void(0)" title="Penempatan Pegawai" id="add_pp_pegawai" class="btn btn-block btn-success waves-effect waves-light" onclick="update_penempatan('+"'"+data.id_pegawai+"'"+')"><i class="fas fa-edit"></i> Penempatan Pegawai</a>'); 

                            		} else if (data.cek_pp_by_id === false){
                            			$('#pp_pegawai').html('<a href="javascript:void(0)" title="Penempatan Pegawai" id="add_pp_pegawai" class="btn btn-block btn-danger waves-effect waves-light" onclick="add_penempatan('+"'"+data.id_pegawai+"'"+')"><i class="fe-plus-square"></i> Penempatan Pegawai</a>'); 
                            		}  

                                        // console.log(data);
                                    }
                                });   


                            // Button Keluarga Pegawai
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_cek_keluarga_by_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                            		if (data.cek_keluarga_by_id === true) {
                            			$('#keluarga_pegawai').html('<a href="javascript:void(0)" title="Data Keluarga Pegawai" id="update_keluarga_pegawai" class="btn btn-block btn-success waves-effect waves-light" onclick="update_keluarga_pegawai('+"'"+data.id_pegawai+"'"+')"><i class="fas fa-edit"></i> Data Keluarga Pegawai</a>'); 

                            		} else if (data.cek_keluarga_by_id === false){
                            			$('#keluarga_pegawai').html('<a href="javascript:void(0)" title="Data Keluarga Pegawai" id="add_keluarga_pegawai" class="btn btn-block btn-danger waves-effect waves-light" onclick="add_keluarga_pegawai('+"'"+data.id_pegawai+"'"+')"><i class="fe-plus-square"></i> Data Keluarga Pegawai</a>'); 
                            		}  

                                        // console.log(data);
                                    }
                                });   

                            // Button Upload Berkas
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_cek_upload_berkas_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                            		if (data.cek_upload_berkas_id) {
                            			$('#upload_berkas').html('<a href="javascript:void(0)" title="Upload Berkas Pegawai" id="add_upload_berkas" class="btn btn-block btn-success waves-effect waves-light" onclick="add_upload_berkas('+"'"+data.id_pegawai+"'"+')"><i class="fas fa-edit"></i> Berkas </a>'); 
                            		} else {
                            			$('#upload_berkas').html('<a href="javascript:void(0)" title="Upload Berkas Pegawai" id="add_upload_berkas" class="btn btn-block btn-danger waves-effect waves-light" onclick="add_upload_berkas('+"'"+data.id_pegawai+"'"+')"><i class="fe-plus-square"></i> Berkas </a>'); 
                            		}

                                        // console.log(data);
                                    }
                                });

                            // Button Upload Peldik
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_cek_upload_peldik/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                            		if (data.cek_upload_peldik_id) {
                            			$('#upload_peldik').html('<a href="javascript:void(0)" title="Upload Peldik" id="add_upload_peldik" class="btn btn-block btn-success waves-effect waves-light" onclick="add_upload_peldik('+"'"+data.id_pegawai+"'"+')"><i class="fas fa-edit"></i> Pelatihan dan Diklat </a>'); 
                            		} else {
                            			$('#upload_peldik').html('<a href="javascript:void(0)" title="Upload Peldik" id="add_upload_peldik" class="btn btn-block btn-danger waves-effect waves-light" onclick="add_upload_peldik('+"'"+data.id_pegawai+"'"+')"><i class="fe-plus-square"></i> Pelatihan dan Diklat </a>'); 
                            		}

                                        // console.log(data);
                                    }
                                });

                            // Tabel Penempatan Pegawai
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_pp_by_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                                        // console.log(data);
                                        $('[name="td_nm_unit_level"]').html(data.nm_unit_level);
                                        $('[name="td_nm_unit_bisnis"]').html(data.nm_unit_bisnis);
                                        $('[name="td_nm_unit_lokasi"]').html(data.nm_unit_lokasi);
                                        $('[name="td_nm_unit_usaha"]').html(data.nm_unit_usaha);
                                        $('[name="td_nm_unit_organisasi"]').html(data.nm_unit_organisasi);
                                        $('[name="td_nm_unit_kerja"]').html(data.nm_unit_kerja);
                                        $('[name="td_nm_unit_kerja_sub"]').html(data.nm_unit_kerja_sub);
                                    }
                                });  

                            // Tabel Jenjang Pendidikan Pegawai
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_jjp_by_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                                        // console.log(data);
                                        $('[name="td_jenjang_pendidikan"]').html(data.jenjang_pendidikan);
                                        $('[name="td_nm_jenjang_pendidikan"]').html(data.nm_jenjang_pendidikan);
                                        $('[name="td_jurusan"]').html(data.jurusan);
                                        $('[name="td_tahun_lulus"]').html(data.tahun_lulus);
                                        $('[name="td_no_ijazah"]').html(data.no_ijazah);
                                    }
                                });

                            // Tabel Tanggungan
                            $.ajax({
                            	url : "<?php echo site_url('pegawai/get_tanggungan_by_id/'.encrypt_url($id_pegawai))?>/",
                            	type: "GET",
                            	dataType: "JSON",
                            	success: function(data)
                            	{
                                        // console.log(data);
                                        $('[name="td_nama_tanggungan"]').html(data.nama_tanggungan);
                                        $('[name="td_hubungan"]').html(data.hubungan);
                                        $('[name="td_no_ktp"]').html(data.no_ktp);
                                        $('[name="td_tempat_lahir"]').html(data.tempat_lahir);
                                        $('[name="td_tgl_lahir"]').html(data.tgl_lahir);
                                        $('[name="td_agama"]').html(data.agama);
                                        $('[name="td_pendidikan"]').html(data.pendidikan);
                                        $('[name="td_pekerjaan"]').html(data.pekerjaan);
                                        $('[name="td_golongan_darah"]').html(data.golongan_darah);
                                    }
                                });

                        },

                        error: function (jqXHR, textStatus, errorThrown)
                        {
                        	Swal.fire({
                        		icon : "error",
                        		title:"Oops...",
                        		text:"Gagal mengambil data!"
                        	});

                            // alert('Error adding / update data');
                            $('#btnSave').html('<i class="fe-save"> </i> Update'); 
                            $('#btnSave').attr('disabled',false); 

                        }
                    });
                    }

                    $(function() {
                    	$('[name="nik"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_nik").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});

                    	$('[name="no_kk"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_no_kk").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});


                    	$('[name="nik_lama"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_nik_lama").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});

                    	$('[name="tgl_lahir"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_tgl_lahir").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});

                    	$('[name="tinggi"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_tinggi").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});

                    	$('[name="berat"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_berat").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});

                    	$('[name="no_ktp"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_no_ktp").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});

                    	$('[name="no_telp_keluarga"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_no_telp_keluarga").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});

                    	$('[name="telpon1"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_telpon1").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});

                    	$('[name="telpon2"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_telpon2").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});

                    	$('[name="tahun_lulus"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_tahun_lulus").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});

                    	$('[name="tgl_keluar"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_tgl_keluar").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});

                    	$('[name="tgl_pengajuan"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_tgl_pengajuan").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});

                    	$('[name="nomorSK"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_nosk").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});

                    	$('[name="noRek"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_noRek").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});

                    	$('[name="noDPLK"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_dplk").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});

                    	$('[name="strsip"]').keypress(function (e) {
                    		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    			$("#err_strsip").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                    			return false;
                    		} 
                    	});

                    });

                        var save_method; 
                        var table;
                        var base_url = '<?= base_url();?>';

                        $(document).ready(function() {
                    //datepicker
                    $('.datepicker').datepicker({
                    	autoclose: true,
                    	format: "yyyy-mm-dd",
                    	todayHighlight: true,
                    	orientation: "top auto",
                    	todayBtn: true,
                    	todayHighlight: true,  
                    	locale: 'id', 
                    });


                });

                        function update(id_pegawai)
                        {
                        	save_method = 'update';
                $('#form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('.id_pegawai').hide();
                $('.status_aktif').hide();
                $('.jth_cuti').hide();
                // $('.nik_lama').hide();
                // $('[name="nik"]').prop('readonly', true);

                $.ajax({
                	url : "<?php echo site_url('pegawai/get_by_id')?>/" + id_pegawai,
                	type: "GET",
                	dataType: "JSON",
                	success: function(data)
                	{
                		$('[name="id_pegawai"]').val(id_pegawai);
                		$('[name="nik"]').val(data.nik);
                		$('[name="nik_lama"]').val(data.nik_lama);
                		$('[name="nama"]').val(data.nama);
                		$('[name="gelar1"]').val(data.gelar1);
                		$('[name="gelar2"]').val(data.gelar2);
                		$('[name="jenis_kelamin"]').val(data.jenis_kelamin).change();
                		$('[name="tpt_lahir"]').val(data.tpt_lahir);
                		$('[name="tgl_lahir"]').datepicker('update', data.tgl_lahir);
                		$('[name="gol_dar"]').val(data.gol_dar).change();
                		$('[name="tinggi"]').val(data.tinggi);
                		$('[name="berat"]').val(data.berat);
                		$('[name="agama_data_pegawai"]').val(data.agama).change();
                		$('[name="no_ktp"]').val(data.no_ktp);
                		$('[name="no_kk"]').val(data.no_kk);
                		$('[name="alamat_ktp"]').val(data.alamat_ktp);
                		$('[name="alamat_dom"]').val(data.alamat_dom);
                		$('[name="telpon1"]').val(data.telpon1);
                		$('[name="telpon2"]').val(data.telpon2);
                		$('[name="no_telp_keluarga"]').val(data.no_telp_keluarga);
                		$('[name="email"]').val(data.email); 
                        // $('[name="status_aktif"]').val(data.status_aktif).change();  
                        $('[name="tgl_pengajuan"]').val(data.tgl_pengajuan);  
                        $('[name="tgl_keluar"]').val(data.tgl_keluar);  
                        $('[name="alasan_keluar"]').val(data.alasan_keluar);  
                        $('[name="ket_keluar"]').val(data.ket_keluar);  
                        $('[name="fungsi"]').val(data.fungsi).change();    
                        $('[name="status_kwn"]').val(data.status_kwn).change();  
                        $('[name="no_bpjs_kes"]').val(data.no_bpjs_kes);  
                        $('[name="no_bpjs_tkerja"]').val(data.no_bpjs_tkerja);  
                        $('[name="tgl_kerja"]').val(data.tgl_kerja);  
                        $('[name="tgl_diangkat"]').val(data.tgl_diangkat);  
                        $('[name="tgl_cuti"]').val(data.tgl_cuti);  

                        $('[name="tgl_diangkat_pwtt"]').val(data.tgl_diangkat_pwtt);
                        $('[name="strsip"]').val(data.no_strsip);
                        $('[name="datestrsip"]').val(data.tgl_strsip);

                        $('[name="masa_kerja"]').val(data.masa_kerja);  
                        $('[name="id_medis"]').val(data.id_medis).change();  
                        $('[name="gol"]').val(data.gol).change();  
                        $('[name="sgt"]').val(data.sgt).change();  
                        $('[name="id_eselon"]').val(data.id_eselon).change();  
                        $('[name="tmt_sgt"]').val(data.tmt_sgt);  
                        $('[name="tmt_gol"]').val(data.tmt_gol);  
                        $('[name="tmt_eselon"]').val(data.tmt_eselon);  
                        $('[name="stat_pajak"]').val(data.stat_pajak).change();  
                        $('[name="tk_pajak"]').val(data.tk_pajak).change();  
                        $('[name="pjk_mulai"]').val(data.pjk_mulai).change();  
                        $('[name="pjk_akhir"]').val(data.pjk_akhir).change();  
                        $('[name="npwp"]').val(data.npwp);  
                        $('[name="tgl_npwp"]').val(data.tgl_npwp);
                        $('[name="nm_pgl"]').val(data.nm_pgl);
                        $('[name="pend_terakhir"]').val(data.pend_terakhir).trigger('change');
                        $('[name="status_pegawai"]').val(data.status_pegawai).trigger('change');
                        $('[name="nomorSK"]').val(data.no_SK);
                        $('[name="noDPLK"]').val(data.no_dplk);
                        $('[name="s_bank"]').val(data.id_bank).trigger('change');
                        $('[name="noRek"]').val(data.no_rek);
                        $('[name="anRek"]').val(data.atas_nm); 

                        $('[name=jth_cuti').val(data.jatah_cuti);

                        $('#modal_form').modal('show'); 
                        $('.modal-title').text('Update Data Pegawai'); 

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        // alert('Error get data from ajax');
                        Swal.fire({
                        	icon : "error",
                        	title:"Oops...",
                        	text:"Gagal mengambil data!"
                        });
                    }
                });
                    }

                    function save() {
                    	$('#btnSave').text('saving...');
                $('#btnSave').attr('disabled',true); //set button disable 
                var url;
                url = "<?php echo site_url('pegawai/update')?>";       

                // ajax adding data to database
                var formData = new FormData($('#form')[0]);
                $.ajax({
                	url : url,
                	type: "POST",
                	data: formData,
                	contentType: false,
                	processData: false,
                	dataType: "JSON",
                	success: function(data)
                	{

                        if(data.status) //if success close modal and reload ajax table
                        {
                        	$('#modal_form').modal('hide');
                        	reload();

                        	$('.btn_data_pegawai').removeClass('btn-danger').addClass('btn-success');
                        	$("#dataPegawai").load(self);
                        	$.toast({
                        		text: "Data berhasil disimpan", 
                        		heading: 'Success', 
                        		icon: 'success', 
                        		showHideTransition: 'fade', 
                        		allowToastClose: false, 
                        		hideAfter: 3000, 
                        		stack: 5, 
                        		position: 'bottom-right', 
                        		textAlign: 'left',
                                            // loader: true, 
                                            // bgColor: '#0040e0',
                                        });
                        }
                        else
                        {
                        	for (var i = 0; i < data.inputerror.length; i++) 
                        	{

                        		$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 

                        		$('[name="'+data.inputerror[i]+'"]').next().next().text(data.error_string[i]); 


                        	}
                            // console.log(data.inputerror);
                        }
                        $('#btnSave').html('<i class="fe-save"> </i> Save');
                        $('#btnSave').attr('disabled',false); //set button enable 

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                    	alert('Session anda habis, silahkan login ulang!');
                    	$('#btnSave').text('save');
                    	$('#btnSave').attr('disabled',false);

                    }
                });
            }
        </script>

        
        <script type="text/javascript"> 
        	function add_penempatan(id_pegawai){
        		save_method = 'add_penempatan';
        		$('#form_penempatan')[0].reset(); 
        		$('.form-group').removeClass('has-error');
        		$('.help-block').empty();
        		$('.id_pegawai').hide();
        		$('[name="id_pegawai"]').prop('readonly', true);
        		$('[name="nik"]').prop('readonly', true);
        		$('[name="nik_lama"]').prop('readonly', true);
        		$('.nik_lama').hide();
        		$('[name="nama"]').prop('readonly', true);

        		$.ajax({
        			url : "<?php echo site_url('pegawai/get_pp_by_id')?>/" + id_pegawai,
        			type: "GET",
        			dataType: "JSON",
        			success: function(data)
        			{
        				$('[name="id_pegawai"]').val(id_pegawai);
        				$('[name="nik"]').val(data.nik);
        				$('[name="nik_lama"]').val(data.nik_lama);
        				$('[name="nama"]').val(data.nama);


        				$(".cari_unit_level").trigger("change.select2");  
        				$(".cari_unit_bisnis").trigger("change.select2");
        				$(".cari_unit_usaha").trigger("change.select2"); 
        				$(".cari_unit_organisasi").trigger("change.select2");
        				$(".cari_unit_kerja").trigger("change.select2");
        				$(".cari_unit_kerja_sub").trigger("change.select2");
        				$(".cari_unit_lokasi").trigger("change.select2");

        				$('#modal_form_penempatan').modal('show'); 
        				$('.modal-title').text('Add Penempatan Pegawai'); 

        			},
        			error: function (jqXHR, textStatus, errorThrown)
        			{
        				alert('Error get data from ajax');
        			}
        		});
        	}

        	function update_penempatan(id_pegawai){
        		save_method = 'update_penempatan';
        		$('#form_penempatan')[0].reset(); 

        		$('.form-group').removeClass('has-error'); 
        		$('.help-block').empty(); 

        		$('.id_pegawai').hide();
        		$('[name="id_pegawai"]').prop('readonly', true);            
        		$('[name="nik"]').prop('readonly', true);
        		$('[name="nik_lama"]').prop('readonly', true);
        		$('.nik_lama').hide();
        		$('[name="nama"]').prop('readonly', true);

                //Ajax Load data from ajax
                $.ajax({
                	url : "<?php echo site_url('pegawai/get_pp_by_id')?>/" + id_pegawai,
                	type: "GET",
                	dataType: "JSON",
                	success: function(data)
                	{
                		$('[name="id_pegawai"]').val(id_pegawai);
                		$('[name="nik"]').val(data.nik);
                		$('[name="nik_lama"]').val(data.nik_lama);
                		$('[name="nama"]').val(data.nama);


                		$(".cari_unit_level").trigger("change.select2");
                		$('[name="id_unit_level"]').val(data.id_unit_level).change();  
                		$('[name="nm_unit_level"]').val(data.nm_unit_level).change();  

                		$(".cari_unit_bisnis").trigger("change.select2");
                		$('[name="id_unit_bisnis"]').val(data.id_unit_bisnis).change();  
                		$('[name="nm_unit_bisnis"]').val(data.nm_unit_bisnis).change();

                		$(".cari_unit_usaha").trigger("change.select2");
                		$('[name="id_unit_usaha"]').val(data.id_unit_usaha).change();  
                		$('[name="nm_unit_usaha"]').val(data.nm_unit_usaha).change();  

                		$(".cari_unit_organisasi").trigger("change.select2");
                		$('[name="id_unit_organisasi"]').val(data.id_unit_organisasi).change();  
                		$('[name="nm_unit_organisasi"]').val(data.nm_unit_organisasi).change();

                		$(".cari_unit_kerja").trigger("change.select2");
                		$('[name="id_unit_kerja"]').val(data.id_unit_kerja).change();  
                		$('[name="nm_unit_kerja"]').val(data.nm_unit_kerja).change(); 

                		$(".cari_unit_kerja_sub").trigger("change.select2");
                		$('[name="id_unit_kerja_sub"]').val(data.id_unit_kerja_sub).change();  
                		$('[name="nm_unit_kerja_sub"]').val(data.nm_unit_kerja_sub).change(); 

                		$(".cari_unit_lokasi").trigger("change.select2");
                		$('[name="id_unit_lokasi"]').val(data.id_unit_lokasi).change();  
                		$('[name="nm_unit_lokasi"]').val(data.nm_unit_lokasi).change(); 


                        $('#modal_form_penempatan').modal('show'); // show bootstrap modal when complete loaded
                        $('.modal-title').text('Update Penempatan Pegawai'); // Set title to Bootstrap modal title

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                    	alert('Error get data from ajax');
                    }
                });
            }

            function simpan_data_penempatan(){
            	$('#btnSave').text('sedang meyimpan...');
                $('#btnSave').attr('disabled',true); //set button disable 
                var url;  

                if(save_method == 'add_penempatan') {
                	url = "<?php echo site_url('pegawai/insert_data_penempatan')?>";
                } else {
                	url = "<?php echo site_url('pegawai/update_data_penempatan')?>";
                }       
                
                var formData = new FormData($('#form_penempatan')[0]);
                $.ajax({
                	url : url,
                	type: "POST",
                	data: formData,
                	contentType: false,
                	processData: false,
                	dataType: "JSON",
                	success: function(data)
                	{

                        if(data.status) //if success close modal and reload ajax table
                        {
                        	$('#modal_form_penempatan').modal('hide');
                        	reload();
                        	$.toast({
                        		text: "Data berhasil disimpan", 
                        		heading: 'Success', 
                        		icon: 'success', 
                        		showHideTransition: 'fade', 
                        		allowToastClose: false, 
                        		hideAfter: 3000, 
                        		stack: 5, 
                        		position: 'bottom-right', 
                        		textAlign: 'left',
                                            // loader: true, 
                                            // bgColor: '#0040e0',
                                        });
                        }
                        else
                        {
                        	for (var i = 0; i < data.inputerror.length; i++) 
                        	{

                        		$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 


                        		$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); 


                        	}
                            // console.log(data.inputerror);
                        }
                        $('#btnSave').html('<i class="fe-save"> </i> Save');
                        $('#btnSave').attr('disabled',false);


                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                    	alert('error');
                    	$('#btnSave').html('<i class="fe-save"> </i> Save');
                    	$('#btnSave').attr('disabled',false);

                    }
                });
            }
        </script>
        <script type="text/javascript">
        	$(document).ready(function(){
        		$(".cari_pegawai").select2({
        			width: '100%',
        			dropdownAutoWidth: true,
        			minimumInputLength: 3,
        			ajax: { 
        				url: "<?= base_url(); ?>pegawai/get_pegawai_like",
        				type: "post",
        				dataType: 'json',
        				delay: 250,
        				data: function (params) {
        					return {
        						searchTermPegawai: params.term
        					};
        				},
        				processResults: function (response) {
        					return {
        						results: response
        					};
        				},
        				cache: true
        			}
        		});


        		$(document).ready(function(){
        			$('.cari_pegawai').on('change',function(){

        				var nik=$(this).val();
        				$.ajax({
        					type : "POST",
        					url  : "<?php echo base_url('pegawai/get_pegawai')?>",
        					dataType : "JSON",
        					data : {nik: nik},
        					cache:false,
        					success: function(data){
        						$.each(data,function(id_pegawai, nik, nama){
        							$('[name="id_pegawai"]').val(data.id_pegawai);
        							$('[name="nik"]').val(data.nik);
        							$('[name="nama"]').val(data.nama);
        							$('[name="email"]').val(data.email);
        							$('.nik').show();
        							$('.nama').show();

        						});

        					}
        				});
        				return false;
        			});
        		});


        	});
        </script>

        <!-- KODE A -->
        <script type="text/javascript">
        	$(document).ready(function(){

        		$(".cari_unit_level").select2({
        			width: '100%',
        			dropdownAutoWidth: true,
        			minimumInputLength: 1,
        			ajax: { 
        				url: "<?= base_url(); ?>pegawai/get_unit_level_like",
        				type: "post",
        				dataType: 'json',
        				delay: 250,
        				data: function (params) {
        					return {
        						searchTermunit_level: params.term
        					};
        				},
        				processResults: function (response) {
        					return {
        						results: response
        					};
        				},
        				cache: true
        			}
        		});


        		$(document).ready(function(){
        			$('.cari_unit_level').on('change',function(){

        				var id_unit_level=$(this).val();
        				$.ajax({
        					type : "POST",
        					url  : "<?php echo base_url('pegawai/get_unit_level')?>",
        					dataType : "JSON",
        					data : {id_unit_level: id_unit_level},
        					cache:false,
        					success: function(data){
        						$.each(data,function(id_unit_level, nm_unit_level){
        							$('[name="id_unit_level"]').val(data.id_unit_level);
        							$('[name="nm_unit_level"]').val(data.nm_unit_level);
        							$('.id_unit_level').show();
        							$('.nm_unit_level').show();

        						});

        					}
        				});
        				return false;
        			});
        		});

        	});
        </script>

        <!-- KODE B -->
        <script type="text/javascript">
        	$(document).ready(function(){

        		$(".cari_unit_bisnis").select2({
        			width: '100%',
        			dropdownAutoWidth: true,
        			minimumInputLength: 1,
        			ajax: { 
        				url: "<?= base_url(); ?>pegawai/get_unit_bisnis_like",
        				type: "post",
        				dataType: 'json',
        				delay: 250,
        				data: function (params) {
        					return {
        						searchTermunit_bisnis: params.term
        					};
        				},
        				processResults: function (response) {
        					return {
        						results: response
        					};
        				},
        				cache: true
        			}
        		});


        		$(document).ready(function(){
        			$('.cari_unit_bisnis').on('change',function(){

        				var id_unit_bisnis=$(this).val();
        				$.ajax({
        					type : "POST",
        					url  : "<?php echo base_url('pegawai/get_unit_bisnis')?>",
        					dataType : "JSON",
        					data : {id_unit_bisnis: id_unit_bisnis},
        					cache:false,
        					success: function(data){
        						$.each(data,function(id_unit_bisnis, nm_unit_bisnis){
        							$('[name="id_unit_bisnis"]').val(data.id_unit_bisnis);
        							$('[name="nm_unit_bisnis"]').val(data.nm_unit_bisnis);
        							$('.id_unit_bisnis').show();
        							$('.nm_unit_bisnis').show();

        						});

        					}
        				});
        				return false;
        			});
        		});

        	});
        </script>

        <!-- KODE C -->
        <script type="text/javascript">
        	$(document).ready(function(){

        		$(".cari_unit_usaha").select2({
        			width: '100%',
        			dropdownAutoWidth: true,
        			minimumInputLength: 1,
        			ajax: { 
        				url: "<?= base_url(); ?>pegawai/get_unit_usaha_like",
        				type: "post",
        				dataType: 'json',
        				delay: 250,
        				data: function (params) {
        					return {
        						searchTermunit_usaha: params.term
        					};
        				},
        				processResults: function (response) {
        					return {
        						results: response
        					};
        				},
        				cache: true
        			}
        		});


        		$(document).ready(function(){
        			$('.cari_unit_usaha').on('change',function(){

        				var id_unit_usaha=$(this).val();
        				$.ajax({
        					type : "POST",
        					url  : "<?php echo base_url('pegawai/get_unit_usaha')?>",
        					dataType : "JSON",
        					data : {id_unit_usaha: id_unit_usaha},
        					cache:false,
        					success: function(data){
        						$.each(data,function(id_unit_usaha, nm_unit_usaha){
        							$('[name="id_unit_usaha"]').val(data.id_unit_usaha);
        							$('[name="nm_unit_usaha"]').val(data.nm_unit_usaha);
        							$('.id_unit_usaha').show();
        							$('.nm_unit_usaha').show();

        						});

        					}
        				});
        				return false;
        			});
        		});

        	});
        </script>

        <!-- KODE D -->
        <script type="text/javascript">
        	$(document).ready(function(){

        		$(".cari_unit_organisasi").select2({
        			width: '100%',
        			dropdownAutoWidth: true,
        			minimumInputLength: 1,
        			ajax: { 
        				url: "<?= base_url(); ?>pegawai/get_unit_organisasi_like",
        				type: "post",
        				dataType: 'json',
        				delay: 250,
        				data: function (params) {
        					return {
        						searchTermunit_organisasi: params.term
        					};
        				},
        				processResults: function (response) {
        					return {
        						results: response
        					};
        				},
        				cache: true
        			}
        		});


        		$(document).ready(function(){
        			$('.cari_unit_organisasi').on('change',function(){

        				var id_unit_organisasi=$(this).val();
        				$.ajax({
        					type : "POST",
        					url  : "<?php echo base_url('pegawai/get_unit_organisasi')?>",
        					dataType : "JSON",
        					data : {id_unit_organisasi: id_unit_organisasi},
        					cache:false,
        					success: function(data){
        						$.each(data,function(id_unit_organisasi, nm_unit_organisasi){
        							$('[name="id_unit_organisasi"]').val(data.id_unit_organisasi);
        							$('[name="nm_unit_organisasi"]').val(data.nm_unit_organisasi);
        							$('.id_unit_organisasi').show();
        							$('.nm_unit_organisasi').show();

        						});

        					}
        				});
        				return false;
        			});
        		});

        	});
        </script>

        <!-- KODE E -->
        <script type="text/javascript">
        	$(document).ready(function(){

        		$(".cari_unit_kerja").select2({
        			width: '100%',
        			dropdownAutoWidth: true,
        			minimumInputLength: 1,
        			ajax: { 
        				url: "<?= base_url(); ?>pegawai/get_unit_kerja_like",
        				type: "post",
        				dataType: 'json',
        				delay: 250,
        				data: function (params) {
        					return {
        						searchTermunit_kerja: params.term
        					};
        				},
        				processResults: function (response) {
        					return {
        						results: response
        					};
        				},
        				cache: true
        			}
        		});


        		$(document).ready(function(){
        			$('.cari_unit_kerja').on('change',function(){

        				var id_unit_kerja=$(this).val();
        				$.ajax({
        					type : "POST",
        					url  : "<?php echo base_url('pegawai/get_unit_kerja')?>",
        					dataType : "JSON",
        					data : {id_unit_kerja: id_unit_kerja},
        					cache:false,
        					success: function(data){
        						$.each(data,function(id_unit_kerja, nm_unit_kerja){
        							$('[name="id_unit_kerja"]').val(data.id_unit_kerja);
        							$('[name="nm_unit_kerja"]').val(data.nm_unit_kerja);
        							$('.id_unit_kerja').show();
        							$('.nm_unit_kerja').show();

        						});

        					}
        				});
        				return false;
        			});
        		});

        	});
        </script>

        <!-- KODE F -->
        <script type="text/javascript">


        	$(document).ready(function(){

        		$(".cari_unit_kerja_sub").select2({
        			width: '100%',
        			dropdownAutoWidth: true,
        			minimumInputLength: 1,
        			ajax: { 
        				url: "<?= base_url(); ?>pegawai/get_unit_kerja_sub_like",
        				type: "post",
        				dataType: 'json',
        				delay: 250,
        				data: function (params) {
        					return {
        						searchTermunit_kerja_sub: params.term
        					};
        				},
        				processResults: function (response) {
        					return {
        						results: response
        					};
        				},
        				cache: true
        			}
        		});


        		$(document).ready(function(){
        			$('.cari_unit_kerja_sub').on('change',function(){

        				var id_unit_kerja_sub=$(this).val();
        				$.ajax({
        					type : "POST",
        					url  : "<?php echo base_url('pegawai/get_unit_kerja_sub')?>",
        					dataType : "JSON",
        					data : {id_unit_kerja_sub: id_unit_kerja_sub},
        					cache:false,
        					success: function(data){
        						$.each(data,function(id_unit_kerja_sub, nm_unit_kerja_sub){
        							$('[name="id_unit_kerja_sub"]').val(data.id_unit_kerja_sub);
        							$('[name="nm_unit_kerja_sub"]').val(data.nm_unit_kerja_sub);
        							$('.id_unit_kerja_sub').show();
        							$('.nm_unit_kerja_sub').show();

        						});

        					}
        				});
        				return false;
        			});
        		});

        	});
        </script>

        <!-- Lokasi Unit Usaha -->
        <script type="text/javascript">
        	$(document).ready(function(){

        		$(".cari_unit_lokasi").select2({
        			width: '100%',
        			dropdownAutoWidth: true,
        			minimumInputLength: 1,
        			ajax: { 
        				url: "<?= base_url(); ?>pegawai/get_unit_lokasi_like",
        				type: "post",
        				dataType: 'json',
        				delay: 250,
        				data: function (params) {
        					return {
                                        searchTermunit_lokasi: params.term // search term
                                    };
                                },
                                processResults: function (response) {
                                	return {
                                		results: response
                                	};
                                },
                                cache: true
                            }
                        });


        		$(document).ready(function(){
        			$('.cari_unit_lokasi').on('change',function(){

        				var id_unit_lokasi=$(this).val();
        				$.ajax({
        					type : "POST",
        					url  : "<?php echo base_url('pegawai/get_unit_lokasi')?>",
        					dataType : "JSON",
        					data : {id_unit_lokasi: id_unit_lokasi},
        					cache:false,
        					success: function(data){
        						$.each(data,function(id_unit_lokasi, nm_unit_lokasi){
        							$('[name="id_unit_lokasi"]').val(data.id_unit_lokasi);
        							$('[name="nm_unit_lokasi"]').val(data.nm_unit_lokasi);
        							$('.id_unit_lokasi').show();
        							$('.nm_unit_lokasi').show();

        						});

        					}
        				});
        				return false;
        			});
        		});

        	});

        	$(document).ready(()=>{
        		$.ajax({
        			url:"<?= site_url('pegawai/get_list_medis') ?>",
        			method:"GET",
        			dataType:"json",
        			success:function(res){
        				var options = '';
        				for(var i=0;i<res.length;i++){
        					options += '<option value="'+res[i].id_medis+'">'+res[i].id_medis+'</option>';
        				}
        				$('#id_medis').append(options);
        			}
        		});
        		$.ajax({
        			url:"<?= site_url('pegawai/get_list_bank') ?>",
        			method:"GET",
        			dataType:"json",
        			success:function(res){
        				var options2 = '';
        				for(var i=0;i<res.length;i++){
        					options2 += '<option  value="'+res[i].id_bank+'">'+res[i].nm_bank+'</option>';
        				}
        				$('#s_bank').append(options2);
        			}
        		});
        	});

        	$("#id_medis").on('change',()=>{ 
        		$.ajax({
        			url:"<?= site_url('pegawai/get_list_medis') ?>",
        			method:"GET",
        			dataType:"json",
        			success:function(res){
        				var opt = '';
        				for(var i=0;i<res.length;i++){
        					if(res[i].id_medis == $("#id_medis").val()){
        						opt = res[i].nm_medis;
        					}
        				}
        				if(opt == '' || opt == 'Non Medis / Umum'){
        					$("#strsip").val("-");
        					$("#strsip2").val(null);
        					$("#strsip").hide();
        					$("#strsip2").hide();
        				}else{
        					$("#strsip").show();
        					$("#strsip2").show();
        				}
        				$('#nm_medis').val(opt);
        			}
        		});
        	});


        </script>

        <script type="text/javascript"> 

        	function reload_jjp() {
        		var id_pegawai = "<?= encrypt_url($id_pegawai) ?>";
        		$.ajax({
        			url : "<?php echo site_url('pegawai/get_jjp_by_id')?>/" + id_pegawai,
        			type: "GET",
        			dataType: "JSON",
        			success: function(data)
        			{

        				$.ajax({
        					url: "<?= site_url('pegawai/jjp_ajax_list/')?>"+ id_pegawai,
        					dataType: 'json',
        					type: 'POST',
        					cache:false,
        					success: function(data){

        						var event_data = '';
        						$.each(data.data, function(index, value){
        							/*console.log(value);*/
        							event_data += '<tbody>';
        							event_data += '<tr>';
        							event_data += '<td>'+value.no+'</td>';
        							event_data += '<td>'+value.button+'</td>';
        							event_data += '<td>'+value.jenjang_pendidikan+'</td>';
        							event_data += '<td>'+value.nm_jenjang_pendidikan+'</td>';
        							event_data += '<td>'+value.jurusan+'</td>';
        							event_data += '<td>'+value.tahun_lulus+'</td>';
        							event_data += '<td>'+value.no_ijazah+'</td>';
        							event_data += '<tr>';
        							event_data += '</tbody>';
        						});
        						$("#list_table_json tbody").empty().append();
        						$("#list_table_json").append(event_data);
        					},
        					error: function(d){
        						/*console.log("error");*/
        						alert("404. Please wait until the File is Loaded.");
        					}
        				});


        			},
        			error: function (jqXHR, textStatus, errorThrown)
        			{
        				alert('Error get data from ajax');
        			}
        		});
        	}

        	function add_jjp_pegawai(id_pegawai){
        		save_method = 'add_jjp_pegawai';
        		$('#form_jjp_pegawai')[0].reset(); 
        		$('.form-group').removeClass('has-error');
        		$('.help-block').empty();
        		$('.id_pegawai').hide();
        		$('#btnSaveUpdate').hide();
        		$('[name="id_pegawai"]').prop('readonly', true);
        		$('[name="nik"]').prop('readonly', true);
        		$('[name="nama"]').prop('readonly', true);
        		$('[name="no_kk"]').prop('readonly', true);
        // $('[name="no_kk"]').prop('readonly', true);
        $('#AddJJP').collapse('hide'); 

        $.ajax({
        	url : "<?php echo site_url('pegawai/get_jjp_by_id')?>/" + id_pegawai,
        	type: "GET",
        	dataType: "JSON",
        	success: function(data)
        	{
        		$('[name="id_pegawai"]').val(id_pegawai);
        		$('[name="nik"]').val(data.nik);
        		$('[name="nik_lama"]').val(data.nik_lama);
        		$('[name="nama"]').val(data.nama);
        		$('[name="no_kk"]').val(data.no_kk);
        		$('[name="jenjang_pendidikan"]').trigger("change.select2");            
        		$('[name="nm_jenjang_pendidikan"]').val('');
        		$('[name="jurusan"]').val('');
        		$('[name="tahun_lulus"]').val('');
        		$('[name="no_ijazah"]').val('');



        		$('#modal_form_jjp_pegawai').modal('show'); 
        		$('.modal-title').text('Jenjang Pendidikan').addClass('text-white'); 

        		reload_jjp();
                // reload();


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
            	alert('Error get data from ajax');
            }
        });
    }

    function add_jjp(){
    	save_method = 'add_jjp_pegawai';
    	$('.card-title').text('Tambah Jenjang Pendidikan').addClass('text-white'); 
    	$('#AddJJP').collapse('show');
        // $('#AddJJP').collapse('show').collapse('hide');
        $('.help-block').empty();
        $("select[name='jenjang_pendidikan']").val('').removeClass('has-error');
        $("select[name='jenjang_pendidikan']").val('').trigger('change');
        $(".id_pegawai_jjg_pddk").hide();
        $("#nm_jenjang_pendidikan").val('');
        $("#jurusan").val('');
        $("#no_ijazah").val('');
        $("#tahun_lulus").val('');
        $("#btnSaveAdd").show();
        $("#btnSaveUpdate").hide();
    }

    function update_jjp(id){
    	$.ajax({
    		type: "POST",
    		url: "<?= site_url('Pegawai/get_DataEdit_JJP_by_id/') ?>"+id,
    		data: {
    			id:id
    		},
    		dataType:"JSON",
    		success: function (data) {
    			$('#AddJJP').collapse('show');
                // $('#AddJJP').collapse('show').collapse('hide');
                $(".id_pegawai_jjg_pddk").hide();
                $("#id_pegawai_jjg_pddk").val(data.id_pegawai_jjg_pddk);
                $("select[name='jenjang_pendidikan']").val(data.jenjang_pendidikan).trigger('change');
                $("#nm_jenjang_pendidikan").val(data.nm_jenjang_pendidikan);
                $("#jurusan").val(data.jurusan);
                $("#tahun_lulus").val(data.tahun_lulus);
                $("#no_ijazah").val(data.no_ijazah);
                $("#btnSaveAdd").hide();
                $("#btnSaveUpdate").show();
                $('.card-title').text('Update Jenjang Pendidikan').addClass('text-white'); 

                save_method = 'update_jjp_pegawai';

            }
        });
    } 

    function update_jjp_pegawai(id_pegawai){
    	save_method = 'update_jjp_pegawai';
    	$('#form_jjp_pegawai')[0].reset(); 

    	$('.form-group').removeClass('has-error'); 
    	$('.help-block').empty(); 

    	$('.id_pegawai').hide();
    	$('[name="id_pegawai"]').prop('readonly', true);            
    	$('[name="nik"]').prop('readonly', true);
    	$('[name="nik_lama"]').prop('readonly', true);
    	$('[name="nama"]').prop('readonly', true);

        //Ajax Load data from ajax
        $.ajax({
        	url : "<?php echo site_url('pegawai/get_pp_by_id')?>/" + id_pegawai,
        	type: "GET",
        	dataType: "JSON",
        	success: function(data)
        	{
        		$('[name="id_pegawai_jjg_pddk"]').val(id_pegawai_jjg_pddk);
        		$('[name="id_pegawai"]').val(id_pegawai);
        		$('[name="nik"]').val(data.nik);
        		$('[name="nik_lama"]').val(data.nik_lama);
        		$('[name="nama"]').val(data.nama);


        		$('#modal_form_jjp_pegawai').modal('show');
        		$('.modal-title').text('Update Jenjang Pendidikan');        


        	},
        	error: function (jqXHR, textStatus, errorThrown)
        	{
        		alert('Error get data from ajax');
        	}
        });
    }

    function simpan_data_jjp_pegawai(){
    	$('#btnSave').text('sedang meyimpan...');
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;  

        if(save_method == 'add_jjp_pegawai') {
        	url = "<?php echo site_url('pegawai/insert_data_jjp_pegawai')?>";
        } else {
        	url = "<?php echo site_url('pegawai/update_data_jjp_pegawai')?>";
        }       
        
        var formData = new FormData($('#form_jjp_pegawai')[0]);
        $.ajax({
        	url : url,
        	type: "POST",
        	data: formData,
        	contentType: false,
        	processData: false,
        	dataType: "JSON",
        	success: function(data)
        	{

                if(data.status) //if success close modal and reload ajax table
                {
                    // $('#modal_form_jjp_pegawai').modal('hide');
                    reload_jjp();
                    reload();

                    // $('#AddJJP').collapse('show').collapse('hide');
                    $('select[name="jenjang_pendidikan"]').val('').trigger("change.select2");            
                    $('[name="nm_jenjang_pendidikan"]').val('');
                    $('[name="jurusan"]').val('');
                    $('[name="tahun_lulus"]').val('');
                    $('[name="no_ijazah"]').val('');
                    
                    $.toast({
                    	text: "Data berhasil disimpan", 
                    	heading: 'Success', 
                    	icon: 'success', 
                    	showHideTransition: 'fade', 
                    	allowToastClose: false, 
                    	hideAfter: 3000, 
                    	stack: 5, 
                    	position: 'bottom-right', 
                    	textAlign: 'left',
                                    // loader: true, 
                                    // bgColor: '#0040e0',
                                });
                    $('#AddJJP').collapse('hide');

                }
                else
                {
                	for (var i = 0; i < data.inputerror.length; i++) 
                	{

                		$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); 


                		$('[name="'+data.inputerror[i]+'"]').next().next().text(data.error_string[i]); 


                	}
                    // console.log(data.inputerror);
                }
                $('#btnSave').html('<i class="fe-save"> </i> Save');
                $('#btnSave').attr('disabled',false);


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
            	alert('error');
            	$('#btnSave').html('<i class="fe-save"> </i> Save');
            	$('#btnSave').attr('disabled',false);

            }
        });
    }

    //delete
    function delete_jjp(id){

    	Swal.fire({
    		title: 'Apa kamu yakin?',
    		text: "Anda tidak akan dapat mengembalikan ini!",
    		icon: 'question',
    		showCancelButton: true,
    		confirmButtonColor: '#3085d6',
    		cancelButtonColor: '#d33',
    		confirmButtonText: 'Ya, hapus!',
    		cancelButtonText: 'Batal'
    	}).then((result) => {

    		if (result.value) {

    			$.ajax ({
    				url:"<?php echo site_url('pegawai/delete_jjp/');?>",
    				type:"POST",
    				data:"id="+id,
    				cache:false,
    				dataType: 'json',
    				success:function(respone) {
    					if (respone.status === true) {
    						reload_jjp();
    						reload();
    						$.toast({
    							text: "Data berhasil dihapus", 
    							heading: 'Success', 
    							icon: 'success', 
    							showHideTransition: 'fade', 
    							allowToastClose: false, 
    							hideAfter: 3000, 
    							stack: 5, 
    							position: 'bottom-right', 
    							textAlign: 'left',
                                                // loader: true, 
                                                // bgColor: '#0040e0',
                                            });
    					} else {
    						$.toast({
    							text: "Data gagal dihapus", 
    							heading: 'Error', 
    							icon: 'error',
    						});
    					}
    				}
    			});

    		} else if (result.dismiss === swal.DismissReason.cancel) {
    			reload_jjp();
    			$.toast({
    				text: "Data batal dihapus", 
    				heading: 'Note', 
    				icon: 'info',
    				showHideTransition: 'fade', 
    				allowToastClose: false, 
    				hideAfter: 3000, 
    				stack: 5, 
    				position: 'bottom-left', 
    			});
    		}
    	})

    }  

    function cancel_data_jjp_pegawai(){
    	$('#AddJJP').collapse('hide');
    }

</script>

<script type="text/javascript">

	function reload_keluarga() {
		var id_pegawai = "<?= encrypt_url($id_pegawai) ?>";

		$.ajax({
			url : "<?php echo site_url('pegawai/get_pegawai_keluarga_by_id/'.encrypt_url($id_pegawai))?>/",
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
				var event_data = '';

				event_data += '<div class="col-lg-12">';
				event_data += '<div class="card">';
				event_data += '<div class="card-body">';
				event_data += '<div class="clearfix"></div>';
				event_data += '<div class="row">';

				event_data += '<div class="col-md-12">';
				event_data += '<table class="table table-responsive table-centered table-borderless mt-2" style="font-weight: normal">';

				event_data += '<tbody>';
				event_data += '<tr>';

				if (data.nama_ibu===null){
                    data.nama_ibu = "(Belum Diisi)";
                }
                if (data.nama_ayah===null){
                    data.nama_ayah = "(Belum Diisi)";
                }
                if (data.pekerjaan_ibu===null){
                    data.pekerjaan_ibu = "(Belum Diisi)";
                }
                if (data.pekerjaan_ayah===null){
                    data.pekerjaan_ayah = "(Belum Diisi)";
                }
                if (data.status_kwn===null){
                    data.status_kwn = "(Belum Diisi)";
                }
                if (data.no_kk==0){
                    data.no_kk = "(Belum Diisi)";
                }

                event_data += '<td width="20%">'+'Nama Ibu'+'</td>';  
                event_data += '<td width="1%">'+':'+'</td>';  
                event_data += '<td width="36%">'+data.nama_ibu+'</td>';

                event_data += '<td width="20%">'+'Pekerjaan Ibu'+'</td>';  
                event_data += '<td width="1%">'+':'+'</td>';  
                event_data += '<td width="36%">'+data.pekerjaan_ibu+'</td>';

                event_data += '</tr>'

                event_data += '<tr>';

                event_data += '<td width="20%">'+'Nama Ayah'+'</td>';  
                event_data += '<td width="1%">'+':'+'</td>';  
                event_data += '<td width="36%">'+data.nama_ayah+'</td>';

                event_data += '<td width="20%">'+'Pekerjaan Ayah'+'</td>';  
                event_data += '<td width="1%">'+':'+'</td>';  
                event_data += '<td width="36%">'+data.pekerjaan_ayah+'</td>';

                event_data += '</tr>';

                event_data += '<tr>';

                event_data += '<td width="20%">'+'Status Kawin'+'</td>';  
                event_data += '<td width="1%">'+':'+'</td>';  
                event_data += '<td width="36%">'+data.status_kwn+'</td>';

                event_data += '<td width="20%">'+'No. Kartu Keluarga'+'</td>'; 
                event_data += '<td width="1%">'+':'+'</td>';  
                event_data += '<td width="36%">'+data.no_kk+'</td>';

                event_data += '</tr>';

                event_data += '</tbody>';
                event_data += '</tabel>';

                event_data += '</div>';
                event_data += '</div>';
                event_data += '</div>';
                event_data += '</div>';
                event_data += '</div>';

                                        // console.log(data);
                                        // $('[name="td_nama_ibu"]').html(data.nama_ibu);
                                        // $('[name="td_pekerjaan_ibu"]').html(data.pekerjaan_ibu);
                                        // $('[name="td_nama_ayah"]').html(data.nama_ayah);
                                        // $('[name="td_pekerjaan_ayah"]').html(data.pekerjaan_ayah);
                                        // $('[name="td_pasangan"]').html(data.pasangan);

                                        $("#keluarga_pegawai_tampil").empty().append();
                                        $("#keluarga_pegawai_tampil").append(event_data);
                                    }
                                });                   
	}

	function add_keluarga_pegawai(id_pegawai){
		save_method = 'add_keluarga_pegawai';
		$('#form_keluarga_pegawai')[0].reset(); 
		$('.form-group').removeClass('has-error');
		$('.help-block').empty();
		$('[name="id_pegawai"]').prop('readonly', true);
		$('.id_pegawai').hide();
		$('[name="nik"]').prop('readonly', true);
		$('.nik').removeClass('col-md-4').addClass('col-md-6');
		$('.nama').removeClass('col-md-4').addClass('col-md-6');
		$('[name="nik_lama"]').prop('readonly', true);
		$('.nik_lama').hide();
		$('[name="nama"]').prop('readonly', true);

		$.ajax({
			url : "<?php echo site_url('pegawai/get_by_id')?>/" + id_pegawai,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
				$('[name="id_pegawai"]').val(id_pegawai);
				$('[name="nik"]').val(data.nik);
				$('[name="nik_lama"]').val(data.nik_lama);
				$('[name="nama"]').val(data.nama);

                    // if (data.status_kwn==='Tidak Kawin') {

                    // $('.pasangan').hide();
                    // $('.anak_pertama').hide();
                    // $('.anak_kedua').hide();
                    // $('.anak_ketiga').hide();

                    // }



                    $('#modal_form_keluarga_pegawai').modal('show'); 
                    $('.modal-title').text('Add Data Keluarga Pegawai'); 

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                	alert('Error get data from ajax');
                }
            });
	}

	function update_keluarga_pegawai(id_pegawai){
		save_method = 'update_keluarga_pegawai';
		$('#form_keluarga_pegawai')[0].reset(); 

		$('.form-group').removeClass('has-error'); 
		$('.help-block').empty(); 

		$('.id_pegawai').hide();
		$('[name="id_pegawai"]').prop('readonly', true);            
		$('[name="nik"]').prop('readonly', true);
		$('.nik').removeClass('col-md-4').addClass('col-md-6');
		$('.nama').removeClass('col-md-4').addClass('col-md-6');
		$('[name="nik_lama"]').prop('readonly', true);
		$('.nik_lama').hide();
		$('[name="nama"]').prop('readonly', true);

            //Ajax Load data from ajax
            $.ajax({
            	url : "<?php echo site_url('pegawai/get_pegawai_keluarga_by_id')?>/" + id_pegawai,
            	type: "GET",
            	dataType: "JSON",
            	success: function(data)
            	{
            		$('[name="id_pegawai"]').val(id_pegawai);
            		$('[name="nik"]').val(data.nik);
            		$('[name="nik_lama"]').val(data.nik_lama);
            		$('[name="nama"]').val(data.nama);

            		$('[name="nama_ibu"]').val(data.nama_ibu);
            		$('[name="pekerjaan_ibu"]').val(data.pekerjaan_ibu);
            		$('[name="nama_ayah"]').val(data.nama_ayah);
            		$('[name="pekerjaan_ayah"]').val(data.pekerjaan_ayah);

                    // if (data.status_kwn==='Tidak Kawin') {

                    //     $('.pasangan').hide();
                    //     $('.anak_pertama').hide();
                    //     $('.anak_kedua').hide();
                    //     $('.anak_ketiga').hide();


                    // } else {

                    //     $('[name="pasangan"]').val(data.pasangan);
                    //     $('[name="anak_pertama"]').val(data.anak_pertama);
                    //     $('[name="anak_kedua"]').val(data.anak_kedua);
                    //     $('[name="anak_ketiga"]').val(data.anak_ketiga);
                    // }

                    $('#modal_form_keluarga_pegawai').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Update Data Keluarga Pegawai'); // Set title to Bootstrap modal title

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                	alert('Error get data from ajax');
                }
            });
        }

        function simpan_data_keluarga_pegawai(){
        	$('#btnSave').text('sedang meyimpan...');
            $('#btnSave').attr('disabled',true); //set button disable 
            var url;  

            if(save_method == 'add_keluarga_pegawai') {
            	url = "<?php echo site_url('pegawai/insert_data_pegawai_keluarga')?>";
            } else {
            	url = "<?php echo site_url('pegawai/update_data_pegawai_keluarga')?>";
            }       
            
            var formData = new FormData($('#form_keluarga_pegawai')[0]);
            $.ajax({
            	url : url,
            	type: "POST",
            	data: formData,
            	contentType: false,
            	processData: false,
            	dataType: "JSON",
            	success: function(data)
            	{

                    if(data.status) //if success close modal and reload ajax table
                    {
                    	$('#modal_form_keluarga_pegawai').modal('hide');
                    	reload();
                    	reload_keluarga();
                    	$.toast({
                    		text: "Data berhasil disimpan", 
                    		heading: 'Success', 
                    		icon: 'success', 
                    		showHideTransition: 'fade', 
                    		allowToastClose: false, 
                    		hideAfter: 3000, 
                    		stack: 5, 
                    		position: 'bottom-right', 
                    		textAlign: 'left',
                                        // loader: true, 
                                        // bgColor: '#0040e0',
                                    });
                    }
                    else
                    {
                    	for (var i = 0; i < data.inputerror.length; i++) 
                    	{

                    		$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 


                    		$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); 


                    	}
                        // console.log(data.inputerror);
                    }
                    $('#btnSave').html('<i class="fe-save"> </i> Save');
                    $('#btnSave').attr('disabled',false);


                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                	alert('error');
                	$('#btnSave').html('<i class="fe-save"> </i> Save');
                	$('#btnSave').attr('disabled',false);

                }

            });

        }
    </script>


    <!-- xxxxxxxxx -->
    <script type="text/javascript"> 
    	function reload_upload_berkas() {
    		var id_pegawai = "<?= encrypt_url($id_pegawai) ?>";
    		$.ajax({
    			url : "<?php echo site_url('pegawai/get_upload_berkas_by_id')?>/" + id_pegawai,
    			type: "GET",
    			dataType: "JSON",
    			success: function(data)
    			{
    				$.ajax({
    					url: "<?= site_url('pegawai/upload_berkas_ajax_list/')?>"+ id_pegawai,
    					dataType: 'json',
    					type: 'POST',
    					cache:false,
    					success: function(data){

    						var event_data = '';
    						$.each(data.data, function(index, value){
    							/*console.log(value);*/
    							event_data += '<tbody>';
    							event_data += '<tr>';
    							event_data += '<td>'+value.no+'</td>';
    							event_data += '<td>'+value.button+'</td>';
    							event_data += '<td>'+value.nm_berkas+'</td>';
    							event_data += '<td><a class="btn btn-primary btn-square" href="<?php echo site_url('/image/berkas_pegawai/'); ?>'+value.upload_berkas+'" target="_blank"><i class="mdi mdi-file-pdf-box"></i>Download </a></td>';
    							event_data += '<tr>';
    							event_data += '</tbody>';
    						});
    						$("#upload_berkas_list_table_json tbody").empty().append();
    						$("#upload_berkas_list_table_json").append(event_data);
    					},
    					error: function(d){
    						/*console.log("error");*/
    						alert("404. Please wait until the File is Loaded.");
    					}
    				});
    			},
    			error: function (jqXHR, textStatus, errorThrown)
    			{
    				alert('Error get data from ajax');
    			}
    		});
    	}

    	function reload_upload_peldik() {
    		var id_pegawai = "<?= encrypt_url($id_pegawai) ?>";
    		$.ajax({
    			url : "<?php echo site_url('pegawai/get_upload_peldik_by_id')?>/" + id_pegawai,
    			type: "GET",
    			dataType: "JSON",
    			success: function(data)
    			{
    				$.ajax({
    					url: "<?= site_url('pegawai/upload_peldik_ajax_list/')?>"+ id_pegawai,
    					dataType: 'json',
    					type: 'POST',
    					cache:false,
    					success: function(data){

    						var event_data = '';
    						$.each(data.data, function(index, value){
    							/*console.log(value);*/
    							event_data += '<tbody>';
    							event_data += '<tr>';
    							event_data += '<td>'+value.no+'</td>';
    							event_data += '<td>'+value.button+'</td>';
    							event_data += '<td>'+value.nm_peldik+'</td>';
    							event_data += '<td>'+value.nm_penyelenggara+'</td>';
    							event_data += '<td>'+value.mulai+'</td>';
    							event_data += '<td>'+value.selesai+'</td>';
    							event_data += '<td>'+value.waktu+'</td>';
    							event_data += '<td><a class="btn btn-primary btn-square" href="<?php echo site_url('/image/berkas_peldik/'); ?>'+value.upload_peldik+'" target="_blank"><i class="mdi mdi-file-pdf-box"></i>Download</a></td>';
    							event_data += '<tr>';
    							event_data += '</tbody>';
    						});
    						$("#upload_peldik_list_table_json tbody").empty().append();
    						$("#upload_peldik_list_table_json").append(event_data);
    					},
    					error: function(d){
    						/*console.log("error");*/
    						alert("404. Please wait until the File is Loaded.");
    					}
    				});
    			},
    			error: function (jqXHR, textStatus, errorThrown)
    			{
    				alert('Error get data from ajax');
    			}
    		});
    	}

    	function add_upload_berkas(id_pegawai){
    		save_method = 'add_upload_berkas';
    		$('#form_upload_berkas')[0].reset(); 
    		$('.form-group').removeClass('has-error');
    		$('.help-block').empty();
            // $('.id_pegawai').hide();
            // $('#btnSaveUpdate').hide();
            $('[name="id_pegawai"]').prop('readonly', true);
            $('[name="nik"]').prop('readonly', true);
            $('[name="nama"]').prop('readonly', true);
            $('[name="no_kk"]').prop('readonly', true);
            $('#AddBerkas').collapse('hide'); 

            $.ajax({
            	url : "<?php echo site_url('pegawai/get_upload_berkas_by_id')?>/" + id_pegawai,
            	type: "GET",
            	dataType: "JSON",
            	success: function(data)
            	{
            		$('[name="id_pegawai"]').val(id_pegawai);
            		$('[name="nik"]').val(data.nik);
            		$('[name="nik_lama"]').val(data.nik_lama);
            		$('[name="nama"]').val(data.nama);
            		$('[name="no_kk"]').val(data.no_kk);
            		$('[name="jenjang_pendidikan"]').trigger("change.select2");            
            		$('[name="nm_jenjang_pendidikan"]').val('');
            		$('[name="jurusan"]').val('');
            		$('[name="tahun_lulus"]').val('');
            		$('[name="no_ijazah"]').val('');



            		$('#modal_form_upload_berkas').modal('show'); 
            		$('.modal-title').text('Berkas Pegawai').addClass('text-white'); 

                    // reload();
                    reload_upload_berkas();
                    //hilangkan form tambah
                    // $('#modal_form_upload_berkas').modal('hide');

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                	alert('Error get data from ajax');
                }
            });
        }

        function add_upload_peldik(id_pegawai){
        	save_method = 'add_upload_peldik';
        	$('#form_upload_peldik')[0].reset(); 
        	$('.form-group').removeClass('has-error');
        	$('.help-block').empty();
        	$('.id_pegawai').hide();
        	$('#btnSaveUpdate').hide();
        	$('[name="id_pegawai"]').prop('readonly', true);
        	$('[name="nik"]').prop('readonly', true);
        	$('[name="nama"]').prop('readonly', true);
        	$('[name="no_kk"]').prop('readonly', true);
        	$('#AddPeldik').collapse('hide'); 

        	$.ajax({
        		url : "<?php echo site_url('pegawai/get_upload_peldik_by_id')?>/" + id_pegawai,
        		type: "GET",
        		dataType: "JSON",
        		success: function(data)
        		{
        			$('[name="id_pegawai"]').val(id_pegawai);
        			$('[name="nik"]').val(data.nik);
        			$('[name="nik_lama"]').val(data.nik_lama);
        			$('[name="nama"]').val(data.nama);
        			$('[name="no_kk"]').val(data.no_kk);
        			$('[name="namaPenyelenggara"]').trigger("change.select2");            
        			$('[name="namaPeldik"]').val('');
        			$('[name="tglMulai"]').val('');
        			$('[name="tglSelesai"]').val('');
        			$('[name="waktu"]').val('');

        			$('#modal_form_upload_peldik').modal('show'); 
        			$('.modal-title').text('Pelatihan dan Diklat Pegawai').addClass('text-white'); 

        			reload_upload_peldik();
                    // reload();
                    // $('#modal_form_upload_peldik').hide();

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                	alert('Error get data from ajax');
                }
            });
        }

        function add_berkas(id_pegawai) {
        	save_method = 'add_upload_berkas';
        	$('.card-title').text('Tambah Berkas').addClass('text-white');
        	$('#AddBerkas').collapse('show');
    	// $('#AddJJP').collapse('show').collapse('hide');
    	$('.help-block').empty();
    	$("select[name='namaberkas']").val('').removeClass('has-error');
    	$("select[name='namaBerkas']").val('').trigger('change');
    	// $(".id_pegawai_jjg_pddk").hide();
    	// $("#nm_jenjang_pendidikan").val('');
    	// $("#jurusan").val('');
    	// $("#tahun_lulus").val('');
    	$("#btnSaveBerkas").show();
    	$("#btnUpdateBerkas").hide();
    }

    function add_peldik() {
    	save_method = 'add_upload_peldik';
    	$('.card-title').text('Tambah Data Pelatihan dan Diklat').addClass('text-white');
    	$('#AddPeldik').collapse('show');
            // $('#AddJJP').collapse('show').collapse('hide');
            $('.help-block').empty();
            $(".id_pegawai_peldik").hide();
            $("select[name='namaPenyelenggara'").val('').removeClass('has-error');
            $("select[name='namaPenyelenggara'").val('').trigger('change');
            $("#namaPeldik").val('');
            $("[name='tglMulai']").val('');
            $("[name='tglSelesai']").val('');
            $("#waktu").val('');
            $("#btnUpdatepeldik").hide();
            $("#btnSavepeldik").show();
            $("#peldikPegawai").val('');
            // $("#btnSaveAdd").show();
            // $("#btnSaveUpdate").hide();
            // $("select[name='jenjang_pendidikan']").val('').removeClass('has-error');
            // $("select[name='jenjang_pendidikan']").val('').trigger('change');

            // $("#nm_jenjang_pendidikan").val('');
            // $("#jurusan").val('');
            // $("#tahun_lulus").val('');

        }

        function update_berkas(id){
        	$.ajax({
        		type: "POST",
        		url: "<?= site_url('Pegawai/get_DataEdit_JJP_by_id/') ?>"+id,
        		data: {
        			id:id
        		},
        		dataType:"JSON",
        		success: function (data) {
        			$('#AddJJP').collapse('show');
                    // $('#AddJJP').collapse('show').collapse('hide');
                    $(".id_pegawai_jjg_pddk").hide();
                    $("#id_pegawai_jjg_pddk").val(data.id_pegawai_jjg_pddk);
                    $("select[name='jenjang_pendidikan']").val(data.jenjang_pendidikan).trigger('change');
                    $("#nm_jenjang_pendidikan").val(data.nm_jenjang_pendidikan);
                    $("#jurusan").val(data.jurusan);
                    $("#tahun_lulus").val(data.tahun_lulus);
                    $("#no_ijazah").val(data.no_ijazah);
                    $("#btnSaveAdd").hide();
                    $("#btnSaveUpdate").show();
                    $('.card-title').text('Update Jenjang Pendidikan').addClass('text-white'); 

                    save_method = 'update_upload_berkas';

                }
            });
        } 

        function update_upload_berkas(id_pegawai){
        	save_method = 'update_upload_berkas';
        	$('#form_upload_berkas')[0].reset(); 

        	$('.form-group').removeClass('has-error'); 
        	$('.help-block').empty(); 

        	$('.id_pegawai').hide();
        	$('[name="id_pegawai"]').prop('readonly', true);            
        	$('[name="nik"]').prop('readonly', true);
        	$('[name="nik_lama"]').prop('readonly', true);
        	$('[name="nama"]').prop('readonly', true);

            //Ajax Load data from ajax
            $.ajax({
            	url : "<?php echo site_url('pegawai/get_pp_by_id')?>/" + id_pegawai,
            	type: "GET",
            	dataType: "JSON",
            	success: function(data)
            	{
            		$('[name="id_pegawai_jjg_pddk"]').val(id_pegawai_jjg_pddk);
            		$('[name="id_pegawai"]').val(id_pegawai);
            		$('[name="nik"]').val(data.nik);
            		$('[name="nik_lama"]').val(data.nik_lama);
            		$('[name="nama"]').val(data.nama);


            		$('#modal_form_upload_berkas').modal('show');
            		$('.modal-title').text('Update Jenjang Pendidikan');        


            	},
            	error: function (jqXHR, textStatus, errorThrown)
            	{
            		alert('Error get data from ajax');
            	}
            });
        }

        function simpan_data_upload_berkas(save_method){
        	$('#btnSave').text('sedang meyimpan...');
            $('#btnSave').attr('disabled',true); //set button disable 
            var url;  

            if(save_method == 'add_upload_berkas') {
            	url = "<?php echo site_url('pegawai/tambah_data_berkas')?>";
            } else {
            	url = "<?php echo site_url('pegawai/update_data_upload_berkas')?>";
            }       
            
            var formData = new FormData($('#form_upload_berkas')[0]);
            $.ajax({
            	url : url,
            	type: "POST",
            	data: formData,
            	contentType: false,
            	processData: false,
            	dataType: "JSON",
            	success: function(data)
            	{

                    if(data.status) //if success close modal and reload ajax table
                    {
                        // $('#modal_form_upload_berkas').modal('hide');
                        reload_upload_berkas();
                        reload();

                        // $('#AddJJP').collapse('show').collapse('hide');
                        $('#namaBerkas').val('-').trigger('change');
                        $("#berkasPegawai").val(null);
                        $("#berkasName").html('Choose file...');

                        $("#btnSaveBerkas").show();
                        $("#btnUpdateBerkas").hide();
                        $.toast({
                        	text: "Data berhasil disimpan", 
                        	heading: 'Success', 
                        	icon: 'success', 
                        	showHideTransition: 'fade', 
                        	allowToastClose: false, 
                        	hideAfter: 3000, 
                        	stack: 5, 
                        	position: 'bottom-right', 
                        	textAlign: 'left',
                                        // loader: true, 
                                        // bgColor: '#0040e0',
                                    });
                        $('#AddBerkas').collapse('hide');
                    }
                    else
                    {
                    	for (var i = 0; i < data.inputerror.length; i++) 
                    	{

                    		$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); 


                    		$('[name="'+data.inputerror[i]+'"]').next().next().text(data.error_string[i]); 


                    	}
                        // console.log(data.inputerror);
                    }
                    $('#btnSave').html('<i class="fe-save"> </i> Save');
                    $('#btnSave').attr('disabled',false);


                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                	alert('error');
                	$('#btnSave').html('<i class="fe-save"> </i> Save');
                	$('#btnSave').attr('disabled',false);

                }
            });
        }

        function simpan_data_upload_peldik(save_method){
        	$('#btnSave').text('sedang meyimpan...');
            $('#btnSave').attr('disabled',true); //set button disable 
            var url;  

            if(save_method == 'add_upload_peldik') {
            	url = "<?php echo site_url('pegawai/tambah_data_peldik')?>";
            } else {
            	url = "<?php echo site_url('pegawai/update_data_upload_peldik')?>";
            }       
            
            var formData = new FormData($('#form_upload_peldik')[0]);
            $.ajax({
            	url : url,
            	type: "POST",
            	data: formData,
            	contentType: false,
            	processData: false,
            	dataType: "JSON",
            	success: function(data)
            	{

                    if(data.status) //if success close modal and reload ajax table
                    {
                        // $('#modal_form_upload_berkas').modal('hide');
                        reload_upload_peldik();
                        reload();

                        // $('#AddJJP').collapse('show').collapse('hide');
                        $('#namaPenyelenggara').val('-').trigger('change');
                        $("#peldikPegawai").val(null);
                        $("#tglMulai").val(null);
                        $("#tglSelesai").val(null);
                        $("#waktu").val(null);
                        $("#peldikName").html('Choose file...');

                        $("#btnSaveBerkas").show();
                        $("#btnUpdateBerkas").hide();
                        $.toast({
                        	text: "Data berhasil disimpan", 
                        	heading: 'Success', 
                        	icon: 'success', 
                        	showHideTransition: 'fade', 
                        	allowToastClose: false, 
                        	hideAfter: 3000, 
                        	stack: 5, 
                        	position: 'bottom-right', 
                        	textAlign: 'left',
                                        // loader: true, 
                                        // bgColor: '#0040e0',
                                    });
                    }
                    else
                    {
                    	for (var i = 0; i < data.inputerror.length; i++) 
                    	{

                    		$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); 


                    		$('[name="'+data.inputerror[i]+'"]').next().next().text(data.error_string[i]); 


                    	}
                        // console.log(data.inputerror);
                    }
                    $('#btnSave').html('<i class="fe-save"> </i> Save');
                    $('#btnSave').attr('disabled',false);

                    $('#AddPeldik').collapse('hide');


                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                	alert('error');
                	$('#btnSave').html('<i class="fe-save"> </i> Save');
                	$('#btnSave').attr('disabled',false);

                }
            });
        }

        //delete
        function delete_jjp(id){

        	Swal.fire({
        		title: 'Apa kamu yakin?',
        		text: "Anda tidak akan dapat mengembalikan ini!",
        		icon: 'question',
        		showCancelButton: true,
        		confirmButtonColor: '#3085d6',
        		cancelButtonColor: '#d33',
        		confirmButtonText: 'Ya, hapus!',
        		cancelButtonText: 'Batal'
        	}).then((result) => {

        		if (result.value) {

        			$.ajax ({
        				url:"<?php echo site_url('pegawai/delete_jjp/');?>",
        				type:"POST",
        				data:"id="+id,
        				cache:false,
        				dataType: 'json',
        				success:function(respone) {
        					if (respone.status === true) {
        						reload_jjp();
        						reload();
        						$.toast({
        							text: "Data berhasil dihapus", 
        							heading: 'Success', 
        							icon: 'success', 
        							showHideTransition: 'fade', 
        							allowToastClose: false, 
        							hideAfter: 3000, 
        							stack: 5, 
        							position: 'bottom-right', 
        							textAlign: 'left',
                                                    // loader: true, 
                                                    // bgColor: '#0040e0',
                                                });
        					} else {
        						$.toast({
        							text: "Data gagal dihapus", 
        							heading: 'Error', 
        							icon: 'error',
        						});
        					}
        				}
        			});

        		} else if (result.dismiss === swal.DismissReason.cancel) {
        			reload_jjp();
        			$.toast({
        				text: "Data batal dihapus", 
        				heading: 'Note', 
        				icon: 'info',
        				showHideTransition: 'fade', 
        				allowToastClose: false, 
        				hideAfter: 3000, 
        				stack: 5, 
        				position: 'bottom-left', 
        			});
        		}
        	})

        }

        $('#berkasPegawai').on('change',function(){
                //Untuk Munculkan nama File
                var fileName = $(this).val();
                $(this).next('#berkasName').html(fileName);
            });

        $('#peldikPegawai').on('change',function(){
                //Untuk Munculkan nama File
                var fileName = $(this).val();
                $(this).next('#peldikName').html(fileName);
            });


        $(document).ready(function(){
        	$.ajax({
        		url: '<?= site_url('pegawai/get_berkas_list'); ?>',
        		type: 'GET',
        		dataType:'json',
        		success: function (res) {
        			var opt = '';
        			for(var i=0;i<res.length;i++){
        				opt += '<option value="'+res[i].id_berkas+'">'+res[i].nm_berkas+'</option>';
        			}
        			$("[name='namaBerkas']").append(opt);
        		}
        	});

        	$.ajax({
        		url: '<?= site_url('pegawai/get_penyelenggara_list'); ?>',
        		type: 'GET',
        		dataType:'json',
        		success: function (res) {
        			var opt = '';
        			for(var i=0;i<res.length;i++){
        				opt += '<option value="'+res[i].id_penyelenggara_peldik_list+'">'+res[i].nm_penyelenggara_peldik_list+'</option>';
        			}
        			$("[name='namaPenyelenggara']").append(opt);
        		}
        	});
        });

        function delete_upload_berkas(id){
        	Swal.fire({
        		title: 'Apa kamu yakin?',
        		text: "Anda tidak akan dapat mengembalikan ini!",
        		icon: 'question',
        		showCancelButton: true,
        		confirmButtonColor: '#3085d6',
        		cancelButtonColor: '#d33',
        		confirmButtonText: 'Ya, hapus!',
        		cancelButtonText: 'Batal'
        	}).then((result) => {

        		if (result.value) {

        			$.ajax ({
        				url:"<?php echo site_url('pegawai/delete_upload_berkas/');?>",
        				type:"POST",
        				data:"id="+id,
        				cache:false,
        				dataType: 'json',
        				success:function(respone) {
        					if (respone.status === true) {
        						reload_upload_berkas();
        						reload();
        						$.toast({
        							text: "Data berhasil dihapus", 
        							heading: 'Success', 
        							icon: 'success', 
        							showHideTransition: 'fade', 
        							allowToastClose: false, 
        							hideAfter: 3000, 
        							stack: 5, 
        							position: 'bottom-right', 
        							textAlign: 'left',
                                                    // loader: true, 
                                                    // bgColor: '#0040e0',
                                                });
        					} else {
        						$.toast({
        							text: "Data gagal dihapus", 
        							heading: 'Error', 
        							icon: 'error',
        						});
        					}
        				}
        			});

        		} else if (result.dismiss === swal.DismissReason.cancel) {
        			reload_upload_berkas();
        			$.toast({
        				text: "Data batal dihapus", 
        				heading: 'Note', 
        				icon: 'info',
        				showHideTransition: 'fade', 
        				allowToastClose: false, 
        				hideAfter: 3000, 
        				stack: 5, 
        				position: 'bottom-left', 
        			});
        		}
        		reload_upload_berkas();
        		reload();
        	})

        }


        function delete_upload_peldik(id){
        	Swal.fire({
        		title: 'Apa kamu yakin?',
        		text: "Anda tidak akan dapat mengembalikan ini!",
        		icon: 'question',
        		showCancelButton: true,
        		confirmButtonColor: '#3085d6',
        		cancelButtonColor: '#d33',
        		confirmButtonText: 'Ya, hapus!',
        		cancelButtonText: 'Batal'
        	}).then((result) => {

        		if (result.value) {

        			$.ajax ({
        				url:"<?php echo site_url('pegawai/delete_upload_peldik/');?>",
        				type:"POST",
        				data:"id="+id,
        				cache:false,
        				dataType: 'json',
        				success:function(respone) {
        					if (respone.status === true) {
        						reload_upload_peldik();
        						reload();
        						$.toast({
        							text: "Data berhasil dihapus", 
        							heading: 'Success', 
        							icon: 'success', 
        							showHideTransition: 'fade', 
        							allowToastClose: false, 
        							hideAfter: 3000, 
        							stack: 5, 
        							position: 'bottom-right', 
        							textAlign: 'left',
                                                    // loader: true, 
                                                    // bgColor: '#0040e0',
                                                });
        					} else {
        						$.toast({
        							text: "Data gagal dihapus", 
        							heading: 'Error', 
        							icon: 'error',
        						});
        					}
        				}
        			});

        		} else if (result.dismiss === swal.DismissReason.cancel) {
        			reload_upload_peldik();
        			$.toast({
        				text: "Data batal dihapus", 
        				heading: 'Note', 
        				icon: 'info',
        				showHideTransition: 'fade', 
        				allowToastClose: false, 
        				hideAfter: 3000, 
        				stack: 5, 
        				position: 'bottom-left', 
        			});
        		}
        	})

        }


        function update_upload_berkas(id){
        	$.ajax({
        		url: "<?= site_url('pegawai/getUploadBerkasbyID/'); ?>" + id,
        		type: 'post',
        		dataType:'json',
        		data: {id:id},
        		beforeSend:function(){
        			$("#AddBerkas").collapse('show');
        		},
        		success: function (data) {
        			if(data.status_dt == "true"){
        				$("select[name='namaBerkas']").val(data.id_berkas).trigger('change');
        				$("[name='id_berkas_pegawai']").val(data.id_pegawai_berkas);
                                // $("[name='berkasPegawai']").val(data.upload_berkas);
                                $("[name='btnUpdateBerkas']").show();
                                $("[name='btnSaveBerkas']").hide();
                                $('.card-title').text('Update Upload Berkas').addClass('text-white');
                            }
                        }
                    });
        }

            // function update_upload_peldik(id){
            //     $.ajax({
            //             url: '<?= site_url('pegawai/getUploadPeldikbyID/'); ?>',
            //             type: 'post',
            //             dataType:'json',
            //             data: {id:id},
            //             beforeSend:function(){
            //                 $("#AddPeldik").collapse('show');
            //             },
            //             success: function (data) {
            //                 if(data.status_dt == "true"){
            //                     $("select[name='namaPenyelenggara']").val(data.id_penyelenggara_peldik_list).trigger('change');
            //                     $("[name='id_pegawai_peldik']").val(data.id_pegawai_peldik);
            //                     $("#tglMulai").val(data.tgl_peldik_mulai);
            //                     $("#tglSelesai").val(data.tgl_peldik_selesai);
            //                     $('#waktu').val(data.jml_jam_peldik);
            //                     $("#namaPeldik").val(data.nm_peldik);
            //                     $("#btnUpdatepeldik").show();
            //                     $("#btnSavepeldik").hide();
            //                 }
            //             }
            //         });
            // }
            function update_upload_peldik(id) {
            	$.ajax({
            		url: "<?= site_url('pegawai/getUploadPeldikbyID/'); ?>" + id,
            		type: 'post',
            		dataType: 'json',
            		data: {
            			id: id
            		},
            		beforeSend: function() {
            			$("#AddPeldik").collapse('show');
            		},
            		success: function(data) {
            			if (data.status_dt == "true") {
            				$("select[name='namaPenyelenggara']").val(data.id_penyelenggara_peldik_list).trigger('change');
            				$("[name='id_pegawai_peldik']").val(data.id_pegawai_peldik);
            				$("[name='tglMulai']").val(data.tgl_peldik_mulai);
            				$("[name='tglSelesai']").val(data.tgl_peldik_selesai);
            				$('#waktu').val(data.jml_jam_peldik);
            				$("#namaPeldik").val(data.nm_peldik);
            				$("#btnUpdatepeldik").show();
            				$("#btnSavepeldik").hide();
            				$('.card-title').text('Update Pelatihan dan Diklat').addClass('text-white');
            			}
            		}
            	});
            }



        //         $('#form_jjp_pegawai').on('hidden.bs.modal', function () {
        //                 if (!$('#form_jjp_pegawai').hasClass('no-reload')) {
        //                     location.reload();
        //                 }
        // });
        // $('#form_jjp_pegawai').on('hidden.bs.modal', function () {
             // location.reload();
        // });
        // function delete_jjp(id){
        //     Swal.fire({
        //         title:'Apa anda yakin',
        //         text:'Menghapus data ini ?',
        //         icon:'warning',
        //         showCancelButton:true,
        //         confirmButtonColor:'#3085d6',
        //         cancelButtonColor:'#d33',
        //         confirmButtonText:'Yes'
        //     }).then((result)=>{
        //         if(result.isConfirmed){
        //             $.ajax({
        //                 url: '<?php echo site_url('pegawai/delete_jjp')?>',
        //                 type: 'post',
        //                 dataType:'json',
        //                 data: {
        //                     id:id
        //                 },
        //                 success:function(res){
        //                     if(res.status == 'sukses'){
        //                         Swal({
        //                             position:'mid-end',
        //                             icon:'success',
        //                             title:'Data berhasil dihapus',
        //                             timer:1500
        //                         });
        //                         $("#list_table_json").DataTable().ajax.reload();
        //                     }
        //                 }
        //             });
        //         }
        //     });
        // }
        // 
        function reload_tanggungan() {
        	var id_pegawai = "<?= encrypt_url($id_pegawai) ?>";
        	$.ajax({
        		url : "<?php echo site_url('pegawai/get_tanggungan_by_id')?>/" + id_pegawai,
        		type: "GET",
        		dataType: "JSON",
        		success: function(data)
        		{

        			$.ajax({
        				url: "<?= site_url('pegawai/tanggungan_ajax_list/')?>"+ id_pegawai,
        				dataType: 'json',
        				type: 'POST',
        				cache:false,
        				success: function(data){

        					var event_data = '';
        					$.each(data.data, function(index, value){
        						/*console.log(value);*/
        						event_data += '<tbody>';
        						event_data += '<tr>';
        						event_data += '<td>'+value.no+'</td>';
        						event_data += '<td>'+value.button+'</td>';
        						event_data += '<td>'+value.nama_tanggungan+'</td>';
        						event_data += '<td>'+value.hubungan+'</td>';
        						event_data += '<td>'+value.no_ktp+'</td>';
        						event_data += '<td>'+value.tempat_lahir+'</td>';
        						event_data += '<td>'+value.tgl_lahir+'</td>';
        						event_data += '<td>'+value.agama+'</td>';
        						event_data += '<td>'+value.pendidikan+'</td>';
        						event_data += '<td>'+value.pekerjaan+'</td>';
        						event_data += '<td>'+value.golongan_darah+'</td>';
        						event_data += '<tr>';
        						event_data += '</tbody>';
        					});
        					$("#tanggungan_list_table_json tbody").empty().append();
        					$("#tanggungan_list_table_json").append(event_data);
        				},
        				error: function(d){
        					/*console.log("error");*/
        					alert("404. Please wait until the File is Loaded.");
        				}
        			});


        		},
        		error: function (jqXHR, textStatus, errorThrown)
        		{
        			alert('Error get data from ajax');
        		}
        	});
        }


    // function add_data_tanggungan(id_pegawai){
    //     save_method = 'add_data_tanggungan';
    //     $('#form_data_tanggungan')[0].reset(); 
    //     $('.form-group').removeClass('has-error');
    //     $('.help-block').empty();
    //     $('.id_pegawai').hide();
    //     $('#btnSaveUpdate').hide();
    //     $('[name="id_pegawai"]').prop('readonly', true);
    //     $('[name="nik"]').prop('readonly', true);
    //     $('[name="nama"]').prop('readonly', true);
    //     $('#AddTanggungan').collapse('hide'); 

    //     $.ajax({
    //         url : "<?php echo site_url('pegawai/get_tanggungan_by_id')?>/" + id_pegawai,
    //         type: "GET",
    //         dataType: "JSON",
    //         success: function(data)
    //         {
    //             $('[name="id_pegawai"]').val(id_pegawai);
    //             $('[name="nik"]').val(data.nik);
    //             $('[name="nik_lama"]').val(data.nik_lama);
    //             $('[name="nama"]').val(data.nama);
    //             $('[name="nama_tanggungan"]').val('');
    //             $('[name="hubungan"]').val('');
    //             $('[name="no_ktp"]').val('');
    //             $('[name="no_kk"]').val('');
    //             $('[name="tempat_lahir"]').val('');
    //             $('[name="tgl_lahir"]').val('');
    //             $('[name="agama"]').val('');
    //             $('[name="pendidikan"]').val('');
    //             $('[name="pekerjaan"]').val('');
    //             $('[name="golongan_darah"]').val('');

    //             $('#modal_form_data_tanggungan').modal('show'); 
    //             $('.modal-title').text('Data Tanggungan').addClass('text-white'); 

    //             reload_tanggungan();
    //             // reload();
    //         },
    //         error: function (jqXHR, textStatus, errorThrown)
    //         {
    //             alert('Error get data from ajax');
    //         }
    //     });
    // }
    function add_data_tanggungan(id_pegawai) {
    	save_method = 'add_data_tanggungan';
    	$('#form_data_tanggungan')[0].reset();
    	$('.form-group').removeClass('has-error');
    	$('.help-block').empty();
    	$('.id_pegawai').hide();
    	$('#btnUpdateTanggungan').hide();
    	$('[name="id_pegawai"]').prop('readonly', true);
    	$('[name="nik"]').prop('readonly', true);
    	$('[name="nama"]').prop('readonly', true);
    	$('[name="no_kk"]').prop('readonly', true);
    	$('#AddTanggungan').collapse('hide');

    	$.ajax({
    		url: "<?php echo site_url('pegawai/get_tanggungan_by_id')?>/" + id_pegawai,
    		type: "GET",
    		dataType: "JSON",
    		success: function(data) {
    			$('[name="id_pegawai"]').val(id_pegawai);
    			$('[name="nik"]').val(data.nik);
    			$('[name="nik_lama"]').val(data.nik_lama);
    			$('[name="nama"]').val(data.nama);
    			$('[name="no_kk"]').val(data.no_kk);
    			$('[name="nama_tanggungan"]').val(data.nama_tanggungan);
    			$('[name="hubungan"]').trigger('change.select2');
    			$('[name="no_ktp"]').val('');
    			$('[name="tempat_lahir"]').val('');
    			$('[name="tgl_lahir"]').trigger('change');
    			$('[name="agama_tanggungan"]').trigger('change.select2');
    			$('[name="pendidikan"]').trigger('change.select2');
    			$('[name="pekerjaan"]').val('');
    			$('[name="golongan_darah"]').trigger('change.select2');

    			$('#modal_form_data_tanggungan').modal('show');
    			$('.modal-title').text('Data Tanggungan').addClass('text-white');

    			reload_tanggungan();
                // reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
            	alert('Error get data from ajax');
            }
        });
    }
    
    function add_tanggungan() {
    	save_method = 'add_data_tanggungan';
    	$('.card-title').text('Tambah Tanggungan Pegawai').addClass('text-white');
    	$('#AddTanggungan').collapse('show');
        // $('#AddJJP').collapse('show').collapse('hide');
        $('.help-block').empty();
        // $("select[name='jenjang_pendidikan']").val('').removeClass('has-error');
        // $("select[name='jenjang_pendidikan']").val('').trigger('change');
        // $("#nm_jenjang_pendidikan").val('');
        // $("#jurusan").val('');
        // $("#tahun_lulus").val('');
        $(".id_tanggungan").hide();
        $("#nama_tanggungan").val('');
        $("select[name='hubungan'").val('').removeClass('has-error');
        $("select[name='hubungan'").val('').trigger('change');
        $("#no_ktp").val('');
        $("#tempat_lahir").val('');
        $("[name='tgl_lahir']").val(null);
        $("select[name='agama_tanggungan'").val('').removeClass('has-error');
        $("select[name='agama_tanggungan'").val('').trigger('change');
        $("select[name='pendidikan'").val('').removeClass('has-error');
        $("select[name='pendidikan'").val('').trigger('change');
        $("#pekerjaan").val('');
        $("select[name='golongan_darah'").val('').removeClass('has-error');
        $("select[name='golongan_darah'").val('').trigger('change');

        $("#btnSaveTanggungan").show();
        $("#btnUpdateTanggungan").hide();
    }


    function update_tanggungan(id) {
    	$.ajax({
    		type: "POST",
    		url: "<?= site_url('Pegawai/get_DataEdit_Tanggungan_by_id/') ?>" + id,
    		data: {
    			id: id
    		},
    		dataType: "JSON",
    		success: function(data) {
    			$('#AddTanggungan').collapse('show');
            // $('#AddJJP').collapse('show').collapse('hide');
            //$(".id_pegawai_jjg_pddk").hide();

            // $("#id_pegawai_jjg_pddk").val(data.id_pegawai_jjg_pddk);
            // $("select[name='jenjang_pendidikan']").val(data.jenjang_pendidikan).trigger('change');
            // $("#nm_jenjang_pendidikan").val(data.nm_jenjang_pendidikan);
            // $("#jurusan").val(data.jurusan);
            // $("#tahun_lulus").val(data.tahun_lulus);
            // $("#no_ijazah").val(data.no_ijazah);

            $("#id_tanggungan").val(data.id_tanggungan);

            $("#nama_tanggungan").val(data.nama_tanggungan);
            $("select[name='hubungan']").val(data.hubungan).trigger('change');
            $("#no_ktp").val(data.no_ktp);
            $("#tempat_lahir").val(data.tempat_lahir);
            $("[name='tgl_lahir']").val(data.tgl_lahir);
            // $("select[name='agama']").val(data.agama).trigger('change');
            $("select[name='agama_tanggungan']").val(data.agama).trigger('change');
            $("select[name='pendidikan'").val(data.pendidikan).trigger('change');
            $("#pekerjaan").val(data.pekerjaan);
            $("select[name='golongan_darah']").val(data.golongan_darah).trigger('change');


            $("#btnSaveTanggungan").hide();
            $("#btnUpdateTanggungan").show();
            $('.card-title').text('Update Data Tanggungan').addClass('text-white');

            save_method = 'update_tanggungan_pegawai';




        }
    });
    }

    function simpan_data_tanggungan_pegawai(){
    	$('#btnSave').text('sedang meyimpan...');
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;  

        if(save_method == 'add_data_tanggungan') {
        	url = "<?php echo site_url('pegawai/insert_data_tanggungan_pegawai')?>";
        } else {
        	url = "<?php echo site_url('pegawai/update_data_tanggungan')?>";
        }       
        
        var formData = new FormData($('#form_data_tanggungan')[0]);
        $.ajax({
        	url : url,
        	type: "POST",
        	data: formData,
        	contentType: false,
        	processData: false,
        	dataType: "JSON",
        	success: function(data)
        	{

                if(data.status) //if success close modal and reload ajax table
                {
                    // $('#modal_form_tanggungan_pegawai').modal('hide');
                    reload_tanggungan();
                    reload();

                    // $('#AddJJP').collapse('show').collapse('hide');
                    // $('select[name="jenjang_pendidikan"]').val('').trigger("change.select2");            
                    $('[name="nama_tanggungan"]').val('');
                    $('[name="hubungan"]').val('');
                    $('[name="no_ktp"]').val('');
                    $('[name="tempat_lahir"]').val('');
                    $('[name="tgl_lahir"]').val('');
                    $('[name="agama"]').val('');
                    $('[name="pendidikan"]').val('');
                    $('[name="pekerjaan"]').val('');
                    $('[name="golongan_darah"]').val('');
                    
                    $.toast({
                    	text: "Data berhasil disimpan", 
                    	heading: 'Success', 
                    	icon: 'success', 
                    	showHideTransition: 'fade', 
                    	allowToastClose: false, 
                    	hideAfter: 3000, 
                    	stack: 5, 
                    	position: 'bottom-right', 
                    	textAlign: 'left',
                                    // loader: true, 
                                    // bgColor: '#0040e0',
                                });

                    $('#AddTanggungan').collapse('hide');

                }
                else
                {
                	for (var i = 0; i < data.inputerror.length; i++) 
                	{

                		$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); 


                		$('[name="'+data.inputerror[i]+'"]').next().next().text(data.error_string[i]); 


                	}
                    // console.log(data.inputerror);
                }
                $('#btnSave').html('<i class="fe-save"> </i> Save');
                $('#btnSave').attr('disabled',false);



            },
            error: function (jqXHR, textStatus, errorThrown)
            {
            	alert('error');
            	$('#btnSave').html('<i class="fe-save"> </i> Save');
            	$('#btnSave').attr('disabled',false);

            }
        });
    }

    function delete_tanggungan(id){

    	Swal.fire({
    		title: 'Apa kamu yakin?',
    		text: "Anda tidak akan dapat mengembalikan ini!",
    		icon: 'question',
    		showCancelButton: true,
    		confirmButtonColor: '#3085d6',
    		cancelButtonColor: '#d33',
    		confirmButtonText: 'Ya, hapus!',
    		cancelButtonText: 'Batal'
    	}).then((result) => {

    		if (result.value) {

    			$.ajax ({
    				url:"<?php echo site_url('pegawai/delete_tanggungan/');?>",
    				type:"POST",
    				data:"id="+id,
    				cache:false,
    				dataType: 'json',
    				success:function(respone) {
    					if (respone.status === true) {
    						reload_tanggungan();
    						reload();
    						$.toast({
    							text: "Data berhasil dihapus", 
    							heading: 'Success', 
    							icon: 'success', 
    							showHideTransition: 'fade', 
    							allowToastClose: false, 
    							hideAfter: 3000, 
    							stack: 5, 
    							position: 'bottom-right', 
    							textAlign: 'left',
                                                // loader: true, 
                                                // bgColor: '#0040e0',
                                            });
    					} else {
    						$.toast({
    							text: "Data gagal dihapus", 
    							heading: 'Error', 
    							icon: 'error',
    						});
    					}
    				}
    			});

    		} else if (result.dismiss === swal.DismissReason.cancel) {
    			reload_tanggungan();
    			$.toast({
    				text: "Data batal dihapus", 
    				heading: 'Note', 
    				icon: 'info',
    				showHideTransition: 'fade', 
    				allowToastClose: false, 
    				hideAfter: 3000, 
    				stack: 5, 
    				position: 'bottom-left', 
    			});
    		}
    	})

    }
</script>

<script type="text/javascript">
	var defaultImages = '<?php if ($this->App->aplikasi()['image_pegawai']){ echo $this->App->aplikasi()['image_pegawai'];}else{echo "default/avatar-2.png";} ?>';

	$('#filefoto').change( function(event) {
		var formData = new FormData($('#formProfile')[0]);
            //untuk mentrigger saat input file memiliki file foto, maka akan mempreview photo tersebut
            var tmppath = URL.createObjectURL(event.target.files[0]);
            $(".img-pegawai").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
            setTimeout(() => {
            	Swal.fire({
            		title: 'Simpan Perubahan ?',
            		icon: 'question',
            		showCancelButton: true,
            		confirmButtonColor: '#3085d6',
            		cancelButtonColor: '#d33',
            		confirmButtonText: 'Ya',
            		cancelButtonText: 'Batal'
            	}).then((result) => {
            		if(result.value){
            			$.ajax({
            				url: "<?= site_url('pegawai/changePhoto') ?>",
            				data: formData,
            				method:"POST",
            				dataType: "json",
            				processData: false,
            				contentType: false,
            				success: function (data) {
            					if(data.status === "sukses"){
            						$.toast({
            							text: "Berhasil ganti foto", 
            							heading: 'Success', 
            							icon: 'success', 
            							showHideTransition: 'fade', 
            							allowToastClose: false, 
            							hideAfter: 3000, 
            							stack: 5, 
            							position: 'bottom-right', 
            							textAlign: 'left',
                                                    // loader: true, 
                                                    // bgColor: '#0040e0',
                                                });
            					}else{
            						$.toast({
            							text: data.msg, 
            							heading: 'Error', 
            							icon: 'error',
            						});
            					}
            				}
            			});
            		}else{
            			$(".img-pegawai").fadeIn("fast").attr('src',"<?= base_url('image/') ?>image_pegawai/"+defaultImages);
            		}
            	})
            }, 1500);
        }); 

	$(document).ready(()=>{
		$.ajax({
			url : "<?php echo site_url('pegawai/tanggungan_ajax_list/'.encrypt_url($id_pegawai))?>/",
			type: "GET",
			dataType: "JSON",
			success: function(data){

				var event_data = '';
				$.each(data.data, function(index, value){
					event_data += '<tbody>';
					event_data += '<tr>';
					event_data += '<td>'+value.no+'</td>';
					event_data += '<td>'+value.nama_tanggungan+'</td>';
					event_data += '<td>'+value.hubungan+'</td>';
					event_data += '<td>'+value.no_ktp+'</td>';
					event_data += '<td>'+value.tempat_lahir+'</td>';
					event_data += '<td>'+value.agama+'</td>';
					event_data += '<td>'+value.pendidikan+'</td>';
					event_data += '<td>'+value.pekerjaan+'</td>';
					event_data += '<td>'+value.golongan_darah+'</td>';
					event_data += '<tr>';
					event_data += '</tbody>';
				});
				$("#list_tanggungan tbody").empty().append();
				$("#list_tanggungan").append(event_data);
			},
		}); 
	});
</script>

<script type="text/javascript">
	function cancel_input_tanggungan(){
		$('#AddTanggungan').collapse('hide');
	}
	function cancel_input_peldik(){
		$('#AddPeldik').collapse('hide');
	}
	function cancel_input_berkas(){
		$('#AddBerkas').collapse('hide');
	}
</script>

</body>
</html>

