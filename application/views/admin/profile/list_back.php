                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo ucwords($m) ?></a></li>
                                            <li class="breadcrumb-item active"><?php echo ucwords($ml) ?></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                      
                        <div class="row">  
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header bg-default">
                                        <!-- <h4 class="card-title text-white mb-0"><?php echo ucwords($m) ?></h4> -->
                                    </div>
                                    <!-- <div class="card-body row"> -->
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center member-box">
                                                        <div class="dropdown float-right">
                                                            <a class="dropdown-toggle card-drop" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li><a href="#" class="dropdown-item">Edit</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="member-card">
                                                            <?php if ($this->App->aplikasi()['image_user']): ?>
                                                            
                                                                <div class="member-avatar avatar-xl mx-auto d-block">
                                                                    <img src="<?= base_url('image/') ?>profileuser/<?php echo $this->App->aplikasi()['image_user']; ?>" class="rounded-circle img-thumbnail" alt="profile-image">
                                                                    <i class="mdi mdi-star-circle member-star text-muted" title="Unverified user"></i>
                                                                </div>
                                                                <?php else: ?>
                                                                 <div class="member-avatar avatar-xl mx-auto d-block">
                                                                    <img src="<?= base_url('image/') ?>profileuser/default/avatar-2.png" class="rounded-circle img-thumbnail" alt="profile-image">
                                                                    <i class="mdi mdi-star-circle member-star text-muted" title="unverified user"></i>
                                                                </div>   
                                                            <?php endif ?>
                                                            <div class="">
                                                                <h4 class="mb-1"> <?= ucwords($this->App->aplikasi()['nama_user']) ?> </h4>
                                                                <p class="text-muted mb-3"><?=$this->App->aplikasi()['email_user'] ?> <span> <br> </span> <span> <a href="#" class="text-pink"><?= $this->App->aplikasi()['role'] ?></a> </span></p>
                                                            </div>

                                                            <form action="<?php //echo $create_action ?>" method="POST" id="cek_pasienbaru">
                                                            </form>       
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="card-footer">
                                                    <div class="button-list">
                                                        <a href="<?php echo site_url('pegawai/detail/') . encrypt_url($this->session->userdata('id_pegawai')); ?>" class="btn btn-block btn-danger waves-effect waves-light">Update Data</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->       
                                    <!-- </div>-->
                                </div>
                                    <!-- end row -->
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header bg-default">
                                        <!-- <h4 class="card-title text-black mb-0"><?php echo ucwords($m) ?></h4> -->
                                    </div>
                                    <!-- <div class="card-body row"> -->
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="table-responsive">
                                                                <table class="table table-centered table-borderless mt-1">
                                                                    <thead>
                                                                        <tr>
                                                                                <td width="30%">Nama Lengkap</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="68%"><?= ucwords($this->App->aplikasi()['nama']) ?></td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                                <td width="30%">E-mail</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="68%"><?= ucwords($this->App->aplikasi()['email']) ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td width="30%">Role</td>
                                                                                <td width="2%">:</td>
                                                                                <td width="68%"><?= ucwords($this->App->aplikasi()['role']) ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td width="30%">Date Created</td>
                                                                                <td width="2%">:</td>
                                                                                                                                       
                                                                                <td width="68%"><?= $this->App->aplikasi()['date_created_user'];?> </td> 

                                                                                <!-- <td width="68%">
                                                                                    <?php 
                                                                                    $timestamp = $this->App->aplikasi()['date_created'];
                                                                                    $myfomat = date('d - M - Y H:i:s', $timestamp);
                                                                                    echo $myfomat; ?> 
                                                                                </td>
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
                                    <!-- end row -->
                            </div>
                        </div>   

                              
                        </div>             
                            
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->



                <!-- <?php 
                    // echo '<pre>';
                    // echo print_r($dokter);
                    // echo '</pre>';
                ?>
                -->


    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
    </div>

        <?php $this->load->view('templates/includes/footer') ?>
 
        
        <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
            }, 16000);
        </script>
       

    </body>
</html>

