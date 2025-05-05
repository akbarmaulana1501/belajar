                        
                        <?php
                            foreach ($user_id->result_array() as $a) {                           
                                        $name    =$a['name'];
                                        $email   =$a['email'];
                                        $role   =$a['role'];
                                        $image   =$a['image'];
                                        $date_created   =$a['date_created'];
                        } ?>
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h4 class="card-title text-white mb-0"><?php echo ucwords($m) ?></h4>
                                    </div>
                                    <div class="card-body row">
                                        <div class="col-lg-4">
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
                                                            <div class="member-avatar avatar-xl mx-auto d-block">
                                                                <img src="<?= base_url('image/') ?>profileuser/<?php echo($image) ?>" class="rounded-circle img-thumbnail" alt="profile-image">
                                                                <i class="mdi mdi-star-circle member-star text-muted" title="unverified user"></i>
                                                            </div>

                                                            <div class="">
                                                                <h4 class="mb-1"> <?= ucwords($name) ?> </h4>
                                                                <p class="text-muted mb-3"><?= $email ?> <span> | </span> <span> <a href="#" class="text-pink"><?= $role ?></a> </span></p>
                                                            </div>

                                                            <form action="<?php //echo $create_action ?>" method="POST" id="cek_pasienbaru">
                                                                

                                                                    
                                                            </form>       
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end col --> 
                                        <div class="col-lg-6"> 
                                            <div class="pt-4">   
                                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                        <td width="30%">Nama Lengkap</td>
                                                                        <td width="2%">:</td>
                                                                        <td width="68%"><?= $name ; ?></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                        <td width="30%">E-mail</td>
                                                                        <td width="2%">:</td>
                                                                        <td width="68%"><?= $email ; ?></td>
                                                                </tr>
                                                                <tr>
                                                                        <td width="30%">Role</td>
                                                                        <td width="2%">:</td>
                                                                        <td width="68%"><?= $role ?></td>
                                                                </tr>
                                                                <tr>
                                                                        <td width="30%">Date Created</td>
                                                                        <td width="2%">:</td>
                                                                                                                               
                                                                        <td width="68%"><?php 
                                                                            $timestamp = $date_created;
                                                                            $myfomat = date('d - M - Y H:i:s', $timestamp);
                                                                            echo $myfomat; 
                                                                        ?> </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>        
                                        </div>                                       
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

