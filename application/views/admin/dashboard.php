                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?= base_url('templates/') ?>javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    <!-- <h4 class="page-title">Seelamat datang <?= $this->App->aplikasi()['nama']; echo ' anda login sebagai ' .$this->App->aplikasi()['role'];?> ! </h4>  -->
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        
                        <div class="row">
                            <div class="col-xl-5">

                                <div class="row">
                                  <div class="col-md-12">

                                    <div class="card card-border">
                                        <div class="card-header border-primary pb-0">
                                            <div class="card-body text-center mt-2 mb-2">
                                                <h4 class="page-title">Selamat datang akbar <span class="text-primary"><?= $this->App->aplikasi()['nama']; echo ' ! </span></h4> <span>Anda login sebagai</span> <br> <br> <strong class="text-primary">' .$this->App->aplikasi()['nm_unit_level'].' '.$this->App->aplikasi()['nm_unit_kerja_sub'].' '.$this->App->aplikasi()['nm_unit_usaha'].'</strong>';?>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card card-border">
                                        <div class="card-header border-primary pb-0">
                                            <div class="card-body">
                                                <div class="text-center member-box">
                                                <!-- <div class="dropdown float-right <?php if ($this->App->aplikasi()['role_id'] == 4 ) { echo "d-none" ;} ?> " >
                                                    <a class="dropdown-toggle card-drop" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-dots-horizontal"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#" onclick='$("#filefoto").trigger("click")' class="dropdown-item">Upload Foto</a></li>
                                                        <form id="formProfile">
                                                            <input type="hidden" name="idpwg" value='<?= encrypt_url($this->session->userdata('id_pegawai')); ?>'>
                                                            <input class="form-control-file invisible" accept="image/*" type="file" name="filefoto" id="filefoto">
                                                        </form>
                                                    </ul>
                                                </div> -->
                                                <div class="clearfix"></div>
                                                <div class="member-card">
                                                    <?php if ($this->App->aplikasi()['image']): ?>

                                                        <div class="member-avatar avatar-xl mx-auto d-block" style="width: 200px;height: 200px;border-radius: 50%;overflow: hidden;">
                                                            <img src="<?= base_url('image/') ?>profileuser/<?php echo $this->App->aplikasi()['image']; ?>" class="rounded-circle img-thumbnail" alt="profile-image" style="width: 100%;height: 100%;object-fit: cover;">
                                                            <i class="mdi mdi-star-circle member-star text-muted" title="Unverified user"></i>
                                                        </div>
                                                        <?php else: ?>
                                                           <div class="member-avatar avatar-xl mx-auto d-block">
                                                            <img src="<?= base_url('image/') ?>profileuser/default/avatar-2.png" class="rounded-circle img-thumbnail" alt="profile-image">
                                                            <i class="mdi mdi-star-circle member-star text-muted" title="unverified user"></i>
                                                        </div>   
                                                    <?php endif ?>

                                                    <br>

                                                    <div class="">
                                                        <h4 class="mb-1"> <?= ucwords($this->App->aplikasi()['nama']) ?> </h4>
                                                        <p class="text-muted mb-3"><?= $this->App->aplikasi()['email_user'] ?> <span> <br> </span> <span> <a href="#" class="text-pink"><?= $this->App->aplikasi()['role'] ?> ID : <?= $this->App->aplikasi()['role_id'] ?></a> </span></p>
                                                    </div>

                                                    <form action="<?php //echo $create_action ?>" method="POST" id="cek_pasienbaru">
                                                    </form>       
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <!-- <div class="button-list">
                                                <button type="button" href="javascript:void(0)" title="Update" onclick="update('<?= encrypt_url($this->App->aplikasi()['id_pegawai']) ?>')" class="btn btn-block btn-primary waves-effect waves-light">Update Data Pegawai</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="row">
                          <div class="col-md-12">                                    
                            <div class="card card-border">
                                <div class="card-header border-primary pb-0">                                
                                    <div class="card-body text-center">                   
                                        <h4><?= $this->App->aplikasi()['nm_application']; ?></h4>
                                        <span>
                                            <?php echo 'Alamat '.$this->App->aplikasi()['alamat'].'<br> Kel '.$this->App->aplikasi()['kec'].' Kec. '.$this->App->aplikasi()['kec'].' Kota '.$this->App->aplikasi()['kab_kota'].' Prov. '.$this->App->aplikasi()['prov'] ?></span> <br><br>
                                            <strong>Develope By : IT PT BTM</strong> 
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="card card-border">
                                <div class="card-header border-primary pb-0">
                                    <!-- <h4 class="card-title text-black mb-0"><?php echo ucwords($m) ?></h4> -->
                                </div>
                                <!-- <div class="card-body row"> -->
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                    <!-- <div class="dropdown float-right">
                                                        <a class="dropdown-toggle card-drop" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="javascript:void(0)" title="Update Data Pegawai" onclick="update('<?= encrypt_url($this->App->aplikasi()['id_pegawai']) ?>')" class="dropdown-item text-primary"><i class="fe-edit"></i> Update Data Pegawai</a></li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="table-responsive">
                                                                <table class="table table-centered table-borderless mt-0 data-pegawai">

                                                                    <tbody">
                                                                    <tr>
                                                                        <td width="40%">NIK Pegawai</td>
                                                                        <td width="2%">:</td>
                                                                        <td width="58%" name="td_nik"></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td width="40%">Nama Lengkap</td>
                                                                        <td width="2%">:</td>
                                                                        <td width="58%" name="td_nama"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="40%">Nama panggilan</td>
                                                                        <td width="2%">:</td>
                                                                        <td width="58%" name="td_nama_panggilan"></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td width="40%">Nama Unit Bisnis</td>
                                                                        <td width="2%">:</td>
                                                                        <td width="58%" name="td_nm_unit_bisnis"><?= $this->App->aplikasi()['nm_unit_bisnis'] ?></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td width="40%">Nama Unit Kerja</td>
                                                                        <td width="2%">:</td>
                                                                        <td width="58%" name="td_nm_unit_kerja"><?= $this->App->aplikasi()['nm_unit_kerja'] ?></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td width="40%">Nama unit Level</td>
                                                                        <td width="2%">:</td>
                                                                        <td width="58%" name="td_nm_unit_level"><?= $this->App->aplikasi()['nm_unit_level'] ?></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td width="40%">Nama Unit Organisasi</td>
                                                                        <td width="2%">:</td>
                                                                        <td width="58%" name="td_nm_unit_organisasi"><?= $this->App->aplikasi()['nm_unit_organisasi'] ?></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td width="40%">Nama Unit Usaha</td>
                                                                        <td width="2%">:</td>
                                                                        <td width="58%" name="td_nm_unit_usaha"><?= $this->App->aplikasi()['nm_unit_usaha'] ?></td>
                                                                    </tr>

                                                                        <!-- <tr>
                                                                                <td width="40%">Tanggal Lahir</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="58%" name="td_tgl_lahir"></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td width="40%">Status Kawin</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="58%" name="td_status_kwn"></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td width="40%">Pendidikan terakhir</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="58%" name="td_pend_terakhir"></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td width="40%">Golongan Darah</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="58%" name="td_gol_dar"></td>
                                                                        </tr>

                                                                        <tr>
                                                                                <td width="40%">Tinggi Badan</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="58%" name="td_tinggi"></td>
                                                                        </tr>

                                                                        <tr>
                                                                                <td width="40%">Berat Badan</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="58%" name="td_berat"></td>
                                                                        </tr>

                                                                        <tr>
                                                                                <td width="40%">Agama</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="58%" name="td_agama"></td>
                                                                        </tr>

                                                                        <tr>
                                                                                <td width="40%">Nomor KTP</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="58%" name="td_no_ktp"></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td width="40%">Nomor KK</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="58%" name="td_no_kk"></td>
                                                                        </tr>

                                                                        <tr>
                                                                                <td width="40%">Alamat KTP</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="58%" name="td_alamat_ktp"></td>
                                                                        </tr>

                                                                        <tr>
                                                                                <td width="40%">Alamat Domisili</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="58%" name="td_alamat_dom"></td>
                                                                        </tr>

                                                                        <tr>
                                                                                <td width="40%">Telepon Utama</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="58%" name="td_telpon1"></td>
                                                                        </tr>

                                                                        <tr>
                                                                                <td width="40%">Telepon Kedua</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="58%" name="td_telpon2"></td>
                                                                        </tr>

                                                                        <tr>
                                                                                <td width="40%">Nomor Telp Keluarga</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="58%" name="td_no_telp_keluarga"></td>
                                                                        </tr>

                                                                        <tr>
                                                                                <td width="40%">Email</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="58%" name="td_email"></td>
                                                                            </tr> -->

                                                                        </tbody>

                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->       
                                            <!-- </div>                                        -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-purple">
                                    <div class="card-body">
                                        <div class="float-right avatar-lg rounded-circle bg-soft-light mt-2">
                                        </div>
                                        <div class="wigdet-two-content">
                                            <p class="m-0 text-uppercase text-white">POLI UMUM HARI INI</p>
                                            <h2 class="text-white"><span data-plugin="counterup">65841</span></h2>
                                            <p class="text-white m-0">12 Des 2019</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-info">
                                    <div class="card-body">
                                        <div class="float-right avatar-lg rounded-circle bg-soft-light mt-2">
                                        </div>
                                        <div class="wigdet-two-content">
                                            <p class="m-0 text-uppercase text-white">POLI GIGI HARI INI</p>
                                            <h2 class="text-white"><span data-plugin="counterup">65841</span></h2>
                                            <p class="text-white m-0">12 Des 2019</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-pink">
                                    <div class="card-body">
                                        <div class="float-right avatar-lg rounded-circle bg-soft-light mt-2">
                                        </div>
                                        <div class="wigdet-two-content">
                                            <p class="m-0 text-uppercase text-white">POLI UMUM HARI INI</p>
                                            <h2 class="text-white"><span data-plugin="counterup">65841</span></h2>
                                            <p class="text-white m-0">12 Des 2019</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-success">
                                    <div class="card-body">
                                        <div class="float-right avatar-lg rounded-circle bg-soft-light mt-2">
                                            <i class=" mdi mdi-account-multiple-outline  font-22 avatar-title text-white""></i>
                                        </div>
                                        <div class="wigdet-two-content">
                                            <p class="m-0 text-uppercase text-white">LABOR INI</p>
                                            <h2 class="text-white"><span data-plugin="counterup">65841</span></h2>
                                            <p class="text-white m-0">12 Des 2019</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                        </div> -->
                        <!-- end row -->

                        <!-- <div class="row">
                            <div class="col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Last 30 days statistics</h4>
    
                                        <div dir="ltr">
                                            <div id="donut-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Total Revenue share</h4>
                                        <div dir="ltr">
                                            <div id="combine-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Total Revenue share</h4>
                                        <div dir="ltr">
                                            <div id="roated-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">
                                            
                                               
                                           </h4>
                                        <div dir="ltr">
                                            <div id="roated-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> -->
                        <!-- end row -->


                        <!-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Recent Projects</h4>
    
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Project Name</th>
                                                    <th>Start Date</th>
                                                    <th>Due Date</th>
                                                    <th>Status</th>
                                                    <th>Assign</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Codefox Admin v1</td>
                                                        <td>01/01/2017</td>
                                                        <td>26/04/2017</td>
                                                        <td><span class="badge badge-info">Released</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Codefox Frontend v1</td>
                                                        <td>01/01/2017</td>
                                                        <td>26/04/2017</td>
                                                        <td><span class="badge badge-success">Released</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Codefox Admin v1.1</td>
                                                        <td>01/05/2017</td>
                                                        <td>10/05/2017</td>
                                                        <td><span class="badge badge-pink">Pending</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Codefox Frontend v1.1</td>
                                                        <td>01/01/2017</td>
                                                        <td>31/05/2017</td>
                                                        <td><span class="badge badge-purple">Work in Progress</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Codefox Admin v1.3</td>
                                                        <td>01/01/2017</td>
                                                        <td>31/05/2017</td>
                                                        <td><span class="badge badge-warning">Coming soon</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Codefox Admin v1</td>
                                                        <td>01/01/2017</td>
                                                        <td>26/04/2017</td>
                                                        <td><span class="badge badge-info">Released</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>Codefox Frontend v1</td>
                                                        <td>01/01/2017</td>
                                                        <td>26/04/2017</td>
                                                        <td><span class="badge badge-success">Released</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card widget-box-three">
                                            <div class="card-body">
                                                <div class="bg-icon float-left avatar-lg text-center bg-light rounded-circle">
                                                    <i class="fe-database h2 text-muted m-0 avatar-title"></i>
                                                </div>
                                                <div class="text-right">
                                                    <p class="text-uppercase">Statistics</p>
                                                    <h2 class="mb-0"><span data-plugin="counterup">2,562</span></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card widget-box-three">
                                            <div class="card-body">
                                                <div class="bg-icon float-left avatar-lg text-center bg-light rounded-circle">
                                                    <i class="fe-briefcase h2 text-muted m-0 avatar-title"></i>
                                                </div>
                                                <div class="text-right">
                                                    <p class="text-uppercase">User Today</p>
                                                    <h2 class="mb-0"><span data-plugin="counterup">8,542</span></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card widget-box-three">
                                            <div class="card-body">
                                                <div class="bg-icon float-left avatar-lg text-center bg-light rounded-circle">
                                                    <i class="fe-download h2 text-muted m-0 avatar-title"></i>
                                                </div>
                                                <div class="text-right">
                                                    <p class="text-uppercase">Request Per Minute</p>
                                                    <h2 class="mb-0"><span data-plugin="counterup">6,254</span></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card widget-box-three">
                                            <div class="card-body">
                                                <div class="bg-icon float-left avatar-lg text-center bg-light rounded-circle">
                                                    <i class="fe-bar-chart-2 h2 text-muted m-0 avatar-title"></i>
                                                </div>
                                                <div class="text-right">
                                                    <p class="text-uppercase">New Downloads</p>
                                                    <h2 class="mb-0"><span data-plugin="counterup">7,524</span></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card widget-user">
                                            <div class="card-body">
                                                <img src="<?= base_url('templates/') ?>assets/images/users/avatar-3.jpg" class="img-fluid d-block rounded-circle avatar-md" alt="user">
                                                <div class="wid-u-info">
                                                    <h5 class="mt-3 mb-1">Chadengle</h5>
                                                    <p class="text-muted mb-0">coderthemes@gmail.com</p>
                                                    <div class="user-position">
                                                        <span class="text-warning">Admin</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card widget-user">
                                            <div class="card-body">
                                                <img src="<?= base_url('templates/') ?>assets/images/users/avatar-2.jpg" class="img-fluid d-block rounded-circle avatar-md" alt="user">
                                                <div class="wid-u-info">
                                                    <h5 class="mt-3 mb-1">Michael Zenaty</h5>
                                                    <p class="text-muted mb-0">coderthemes@gmail.com</p>
                                                    <div class="user-position">
                                                        <span class="text-info">User</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- end row -->
                            </div>

                            <!-- </div> -->
                            <!-- end row -->

                        </div> <!-- end container-fluid -->

                    </div> <!-- end content -->


                    <!-- Bootstrap modal -->
                    <div class="modal fade bs-example-modal-lg" id="modal_form" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
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
                                                <div class="col-md-6 nama">
                                                    <div class="form-group">
                                                        <label for="Name">Nama Lengkap<span class="text-danger">*</span></label>
                                                        <input type="text" name="nama" parsley-trigger="change" required
                                                        placeholder="Masukkan Nama Pegawai" class="form-control" id="nama">
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
                                               <div class="col-md-6 nik_baru">
                                                <div class="form-group">
                                                   <label for="Name">NIK Pegawai Baru<span class="text-danger">*</span></label>
                                                   <input type="text" name="nik_baru" parsley-trigger="change" required
                                                   placeholder="Masukkan NIK Baru Pegawai" class="form-control number-only" id="nik_baru">
                                                   <span class="help-block text-danger"></span>
                                               </div>
                                           </div>

                                           <div class="col-md-6 nm_pgl">
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
                                                <label for="Name">Gelar Pertama</label>
                                                <input type="text" name="gelar1" parsley-trigger="change" required
                                                placeholder="Masukkan Gelar" class="form-control" id="gelar1">
                                                <span class="text-primary">*<i>Masukan gelar jika ada</i></span>
                                                <span class="help-block text-danger"></span>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="Name">Gelar Kedua</label>
                                                <input type="text" name="gelar2" parsley-trigger="change" required
                                                placeholder="Masukkan Gelar Kedua" class="form-control" id="gelar2">
                                                <span class="text-primary">*<i>Masukan gelar kedua jika ada</i></span>
                                                <span class="help-block text-danger"></span>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jenis_kelamin" class="control-label">Jenis Kelamin</label>

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

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Tanggal Lahir<span class="text-danger">* </span></label>
                                                <input type="text" name="tgl_lahir" parsley-trigger="change" required
                                                placeholder="Masukkan Tanggal Lahir" class="form-control datepicker  number-only">
                                                <span id="err_tgl_lahir" class="text-danger">  </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gol_dar" class="control-label">Golongan Darah</label>

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
                                                <span class="text-primary">*<i>Masukan dalam satuan centimeter</i></span>
                                                <span class="help-block text-danger"></span>
                                                <span id="err_tinggi" class="text-danger">  </span>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="Name">Berat Badan<span class="text-danger">* </span></label>
                                                <input type="text" name="berat" parsley-trigger="change" required
                                                placeholder="Masukkan Berat Badan" class="form-control number-only" id="berat">
                                                <span class="text-primary">*<i>Masukan dalam satuan kilogram</i></span>
                                                <span class="help-block text-danger"></span>
                                                <span id="err_berat" class="text-danger">  </span>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="agama" class="control-label">Agama</label>
                                                <select name="agama" class="form-control select2" required>
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
                                                <label for="pend_terakhir" class="control-label">Pendidikan Terakhir<span class="text-danger">* </span></label>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Nomor KTP<span class="text-danger">* </span></label>
                                                <input type="text" name="no_ktp" parsley-trigger="change" required
                                                placeholder="Masukkan Nomor KTP" class="form-control  number-only" id="no_ktp">
                                                <span class="help-block text-danger"></span>
                                                <span id="err_no_ktp" class="text-danger">  </span>

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
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Alamat KTP" class="control-label">Alamat Domisili<span class="text-danger">* </span></label>

                                                <textarea required class="form-control" rows="3" name="alamat_dom" id="alamat_dom" placeholder="Alamat Domisili"></textarea>                                                      
                                                <span class="help-block text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Nomor Telp Keluarga<span class="text-danger">* </span></label>
                                                <input type="text" name="no_telp_keluarga" parsley-trigger="change" required
                                                placeholder="Masukkan Nomor Telepon Keluarga" class="form-control  number-only" id="no_telp_keluarga">
                                                <span class="help-block text-danger"></span>
                                                <span id="err_no_telp_keluarga" class="text-danger">  </span>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Telepon Utama<span class="text-danger">* </span></label>
                                                <input type="text" name="telpon1" parsley-trigger="change" required
                                                placeholder="Masukkan Telepon" class="form-control number-only" id="telpon1">
                                                <span class="help-block text-danger"></span>
                                                <span id="err_telpon1" class="text-danger">  </span>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Telepon Kedua<span class="text-danger">* </span></label>
                                                <input type="text" name="telpon2" parsley-trigger="change" required
                                                placeholder="Masukkan Telepon" class="form-control number-only" id="telpon2">
                                                <span class="help-block text-danger"></span>
                                                <span id="err_telpon2" class="text-danger">  </span>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Email<span class="text-danger">* </span></label>
                                                <input type="text" name="email" parsley-trigger="change" required
                                                placeholder="Masukkan email" class="form-control" id="email">
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
                                                            <label for="id_medis" class="control-label">ID Medis<span class="text-danger">* </span></label>
                                                            <select name="id_medis" class="form-control select2" id='id_medis' required>
                                                                <option value="">Pilih</option>
                                                            </select>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="" class="control-label">Nama Medis <span class="text-danger">* </span></label>
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
                                                            <label for="datestrsip">Berlaku Sampai<span class="text-danger">* </span></label>
                                                            <input type="text" name="datestrsip" parsley-trigger="change" required
                                                            placeholder="Pilih Tanggal" class="form-control datepicker  number-only">
                                                            <span id="err_tgl_diangkat_pwtt" class="text-danger">  </span>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>
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
                                                            <label for="tgl_npwp">Pilih Bank<span class="text-danger">* </span></label>
                                                            <select name="s_bank" id="s_bank" class="form-control select2">
                                                                <option value="">-</option>
                                                            </select>
                                                            <span id="err_pilih_bank" class="text-danger">  </span>
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
                            <!-- End Bootstrap modal -->   

                            <div id="accordion-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content p-0">

                                        <div class="accordion" id="accordion-test">
                                            <div class="card mb-0">
                                                <div class="card-header">
                                                    <h4 class="card-title font-14 mb-0">
                                                        <a href="#" class="text-dark collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                            Collapsible Group Item #1
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="collapse" data-parent="#accordion-test">
                                                    <div class="card-body">
                                                        <p class="mb-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh, craft beer labore sapiente ea proident. Ad vegan excepteur butcher vice lomo leggings occaecat.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mb-0">
                                                <div class="card-header">
                                                    <h4 class="card-title font-14 mb-0">
                                                        <a href="#" class="text-dark" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                            Collapsible Group Item #2
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="collapse show" data-parent="#accordion-test">
                                                    <div class="card-body">
                                                        <p class="mb-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh, craft beer labore sapiente ea proident. Ad vegan excepteur butcher vice lomo leggings occaecat.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mb-0">
                                                <div class="card-header">
                                                    <h4 class="card-title font-14 mb-0">
                                                        <a href="#" class="text-dark collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            Collapsible Group Item #3
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseThree" class="collapse" data-parent="#accordion-test">
                                                    <div class="card-body">
                                                        <p class="mb-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh, craft beer labore sapiente ea proident. Ad vegan excepteur butcher vice lomo leggings occaecat.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <div id="card-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content p-0 b-0">
                                        <div class="card mb-0">
                                            <div class="card-header bg-primary">
                                                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="card-title text-white mb-0">Card Primary</h4>

                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->




                            <!-- ============================================================== -->
                            <!-- End Page content -->
                            <!-- ============================================================== -->
                        </div>

                        <?php $this->load->view('templates/includes/footer') ?>


                        <script type="text/javascript">

                            $(document).ready(() => {
                                $.ajax({
                                    url: "<?= site_url('pegawai/get_list_medis') ?>",
                                    method: "GET",
                                    dataType: "json",
                                    success: function(res) {
                                        var options = '';
                                        for (var i = 0; i < res.length; i++) {
                                            options += '<option value="' + res[i].id_medis + '">' + res[i].id_medis +
                                            '</option>';
                                        }
                                        $('#id_medis').append(options);
                                    }
                                });
                                $.ajax({
                                    url: "<?= site_url('pegawai/get_list_bank') ?>",
                                    method: "GET",
                                    dataType: "json",
                                    success: function(res) {
                                        var options2 = '';
                                        for (var i = 0; i < res.length; i++) {
                                            options2 += '<option  value="' + res[i].id_bank + '">' + res[i].nm_bank +
                                            '</option>';
                                        }
                                        $('#s_bank').append(options2);
                                    }
                                });
                            });

                            $("#id_medis").on('change', () => {
                                $.ajax({
                                    url: "<?= site_url('pegawai/get_list_medis') ?>",
                                    method: "GET",
                                    dataType: "json",
                                    success: function(res) {
                                        var opt = '';
                                        for (var i = 0; i < res.length; i++) {
                                            if (res[i].id_medis == $("#id_medis").val()) {
                                                opt = res[i].nm_medis;
                                            }
                                        }
                                        if (opt == '' || opt == 'Non Medis / Umum') {
                                            $("#strsip").val("-");
                                            $("#strsip2").val(null);
                                            $("#strsip").hide();
                                            $("#strsip2").hide();
                                        } else {
                                            $("#strsip").show();
                                            $("#strsip2").show();
                                        }
                                        $('#nm_medis').val(opt);
                                    }
                                });
                            });

                            $(document).ready(function() {

                                table =  $.ajax({
                                    url : "<?php echo site_url('dashboard/get_by_id/'.encrypt_url($this->App->aplikasi()['id_pegawai']))?>/",
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

                            // update('<?= encrypt_url($this->App->aplikasi()['id_pegawai']) ?>');                            

                         //    Swal.fire({
                         //        icon : "info",  
                         //        backdrop:true,
                         //        allowOutsideClick: false,
                         //        title:"<strong class='text-danger'> Data Tidak Lengkap... </span>",
                         //        html:"Selamat datang "+panggilan+" <strong class='text-primary'>"+data.nama+"</strong> Silahkan dilengkapi terlebih dahulu. Terimakasih",
                         //        type:"warning",
                         //        showCancelButton: 0,
                         //        confirmButtonText: "OKE",
                         //    });

                         //    $('.swal2-confirm').click(function(){
                         //     update('<?= encrypt_url($this->App->aplikasi()['id_pegawai']) ?>');

                         // });
                     }

                     $('[name="td_id_pegawai"]').html(id_pegawai);
                     $('[name="td_nik"]').html(data.nik);
                     $('[name="td_nik_baru"]').html(data.nik_baru);
                     $('[name="td_nama"]').html(data.nama);
                     $('[name="td_nama_panggilan"]').html(data.nm_pgl);

                     $('[name="td_nm_unit_bisnis"]').html(data.nm_unit_bisnis);
                     $('[name="td_nm_unit_kerja"]').html(data.nm_unit_kerja);
                     $('[name="td_nm_unit_level"]').html(data.nm_unit_level);
                     $('[name="td_nm_unit_organisasi"]').html(data.nm_unit_organisasi);
                     $('[name="td_nm_unit_usaha"]').html(data.nm_unit_usaha);

                        // if (data.gelar1=='') {
                        //         $('[name="td_gelar1"]').html('-');
                        //     } else {
                        //         $('[name="td_gelar1"]').html(data.gelar1);
                        //     }
                        
                        // if (data.gelar2=='') {
                        //         $('[name="td_gelar2"]').html('-');
                        //     } else {
                        //         $('[name="td_gelar2"]').html(data.gelar2);
                        //     }

                        // $('[name="td_berat"]').html(data.berat+ " Kilogram");
                        // $('[name="td_agama"]').html(data.agama);
                        // $('[name="td_status_kwn"]').html(data.status_kwn);
                        // $('[name="td_pend_terakhir"]').html(data.pend_terakhir);
                        // $('[name="td_no_ktp"]').html(data.no_ktp);
                        // $('[name="td_no_kk"]').html(data.no_kk);
                        // $('[name="td_alamat_ktp"]').html(data.alamat_ktp);
                        // $('[name="td_alamat_dom"]').html(data.alamat_dom);
                        // $('[name="td_telpon1"]').html(data.telpon1);
                        // $('[name="td_telpon2"]').html(data.telpon2);
                        // $('[name="td_no_telp_keluarga"]').html(data.no_telp_keluarga);
                        // $('[name="td_email"]').html(data.email); 


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





                        function reload() {
                            $.ajax({
                                url : "<?php echo site_url('dashboard/get_by_id/'.encrypt_url($this->App->aplikasi()['id_pegawai']))?>/",
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
                                        html:"Selamat datang "+panggilan+" <strong class='text-primary'>"+data.nama+"</strong> Silahkan dilengkapi terlebih dahulu. Terimakasih",
                                        type:"warning",
                                        showCancelButton: 0,
                                        confirmButtonText: "OKE",
                                    });

                                    $('.swal2-confirm').click(function(){
                                     update('<?= encrypt_url($this->App->aplikasi()['id_pegawai']) ?>');

                                 });
                                }

                                $('[name="td_id_pegawai"]').html(id_pegawai);
                                $('[name="td_nik"]').html(data.nik);
                                $('[name="td_nik_baru"]').html(data.nik_baru);
                                $('[name="td_nama"]').html(data.nama);
                                $('[name="td_nama_panggilan"]').html(data.nm_pgl);

                                if (data.gelar1=='') {
                                    $('[name="td_gelar1"]').html('-');
                                } else {
                                    $('[name="td_gelar1"]').html(data.gelar1);
                                }

                                if (data.gelar2=='') {
                                    $('[name="td_gelar2"]').html('-');
                                } else {
                                    $('[name="td_gelar2"]').html(data.gelar2);
                                }
                                $('[name="td_jenis_kelamin"]').html(data.jenis_kelamin);
                                $('[name="td_tpt_lahir"]').html(data.tpt_lahir);
                                $('[name="td_tgl_lahir"]').html(data.tgl_lahir);
                                $('[name="td_status_kwn"]').html(data.status_kwn);
                                $('[name="td_pend_terakhir"]').html(data.pend_terakhir);
                                $('[name="td_gol_dar"]').html(data.gol_dar);
                                $('[name="td_tinggi"]').html(data.tinggi+" Centimeter");
                                $('[name="td_berat"]').html(data.berat+ " Kilogram");
                                $('[name="td_agama"]').html(data.agama);
                                $('[name="td_no_ktp"]').html(data.no_ktp);
                                $('[name="td_no_kk"]').html(data.no_kk);
                                $('[name="td_alamat_ktp"]').html(data.alamat_ktp);
                                $('[name="td_alamat_dom"]').html(data.alamat_dom);
                                $('[name="td_telpon1"]').html(data.telpon1);
                                $('[name="td_telpon2"]').html(data.telpon2);
                                $('[name="td_no_telp_keluarga"]').html(data.no_telp_keluarga);
                                $('[name="td_email"]').html(data.email); 
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
                        $('[name="tgl_lahir"]').keypress(function (e) {
                           if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                              $("#err_tgl_lahir").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                              return false;
                          } 
                      });

                        $('[name="pend_terakhir"]').keypress(function (e) {
                           if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                              $("#err_pend_terakhir").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                              return false;
                          } 
                      });

                        $('[name="no_ktp"]').keypress(function (e) {
                           if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                              $("#err_no_ktp").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                              return false;
                          } 
                      });

                        $('[name="no_kk"]').keypress(function (e) {
                           if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                              $("#err_no_kk").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
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
            $('.nik_baru').hide();
            $('[name="nik"]').prop('readonly', true);

            $.ajax({
                url : "<?php echo site_url('dashboard/get_by_id')?>/" + id_pegawai,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="id_pegawai"]').val(id_pegawai);
                    $('[name="nik"]').val(data.nik);
                    $('[name="nik_lama"]').val(data.nik_lama);
                    $('[name="nama"]').val(data.nama);
                    $('[name="nm_pgl"]').val(data.nm_pgl);
                    $('[name="gelar1"]').val(data.gelar1);
                    $('[name="gelar2"]').val(data.gelar2);
                    $('[name="jenis_kelamin"]').val(data.jenis_kelamin).change();
                    $('[name="tpt_lahir"]').val(data.tpt_lahir);
                    $('[name="tgl_lahir"]').datepicker('update', data.tgl_lahir);
                    $('[name="gol_dar"]').val(data.gol_dar).change();
                    $('[name="tinggi"]').val(data.tinggi);
                    $('[name="berat"]').val(data.berat);
                    $('[name="agama"]').val(data.agama).change();
                    $('[name="pend_terakhir"]').val(data.pend_terakhir).change();
                    $('[name="no_ktp"]').val(data.no_ktp);
                    $('[name="no_kk"]').val(data.no_kk);
                    $('[name="alamat_ktp"]').val(data.alamat_ktp);
                    $('[name="alamat_dom"]').val(data.alamat_dom);
                    $('[name="telpon1"]').val(data.telpon1);
                    $('[name="telpon2"]').val(data.telpon2);
                    $('[name="no_telp_keluarga"]').val(data.no_telp_keluarga);
                    $('[name="email"]').val(data.email);
                    $('[name="status_pegawai"]').val(data.status_pegawai).trigger('change');
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
            $('[name="noDPLK"]').val(data.no_dplk);
            // $('[name="tgl_diangkat"]').val(data.tgl_diangkat);
            $('[name="tgl_diangkat_pwtt"]').val(data.tgl_diangkat_pwtt);
            $('[name="tgl_cuti"]').val(data.tgl_cuti);
            $('[name="masa_kerja"]').val(data.masa_kerja);
            $('[name="id_medis"]').val(data.id_medis).change();
            $('[name="strsip"]').val(data.no_strsip).change();
            $('[name="datestrsip"]').val(data.tgl_strsip).change();            
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
            // $('[name="nm_pgl"]').val(data.nm_pgl);
            // $('#pend_terakhir').val(data.pend_terakhir);
            $('[name="status_pegawai"]').val(data.status_pegawai).trigger('change');
            $('[name="nomorSK"]').val(data.no_SK);
            $('[name="s_bank"]').val(data.id_bank).trigger('change');
            $('[name="noRek"]').val(data.no_rek);
            $('[name="anRek"]').val(data.atas_nm);

            $('#modal_form').modal('show'); 
            $('.modal-title').text('Updata Data Pegawai'); 

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
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled',true); //set button disable 
            var url;
            url = "<?php echo site_url('dashboard/update')?>";       

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
                            //select parent twice to select div form-group class and add has-error class
                            $('[name="'+data.inputerror[i]+'"]').next().next().text(data.error_string[i]); 
                            //select span help-block class set text error string
                            
                        }
                        // console.log(data.inputerror);
                    }
                    $('#btnSave').html('<i class="fe-save"> </i> Save'); //change button text
                    $('#btnSave').attr('disabled',false); //set button enable 


                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Session anda habis, silahkan login ulang!');
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled',false); //set button enable 

                }
            });
        }

        var defaultImages = '<?php if ($this->App->aplikasi()['image_user']){ echo $this->App->aplikasi()['image_user'];}else{echo "default/avatar-2.png";} ?>';

        $('#filefoto').change( function(event) {
            var formData = new FormData($('#formProfile')[0]);
    //untuk mentrigger saat input file memiliki file foto, maka akan mempreview photo tersebut
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $(".img-thumbnail").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
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
                    url: "<?= site_url('profile/changePhoto') ?>",
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
                $(".img-thumbnail").fadeIn("fast").attr('src',"<?= base_url('image/') ?>profileuser/"+defaultImages);
            }
        })
    }, 1500);
});
</script>


</body>
</html>